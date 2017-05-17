/**
 * This file use the array.prototype's reduce function that only is supported
 * by browser with ECMAScript 5. Internet explorer 7 and 8 not support this
 * function.
 */

/* globals angular, define, _ */

(function(factory)
{
	'use strict';

	if( typeof define == 'function' && define.amd )
	{
		define([
			'angular',
			'lodash',
            'moment',
			'angular-moment'
			],
			factory);
	}else{
		factory(angular,_);
	}
})(function(angular, _, moment)
{
	'use strict';

	var app = angular.module('pages.exhibition.services.ExhibitionService',['angularMoment']);

	app.factory('pages.exhibition.services.ExhibitionService',[
        '$window', 'moment',
        function($window, moment)
	{
        $window.exhibitions = $window.exhibitions;

        var format = 'YYYY-MM-DD HH:mm:ss';

		var filters = {

			'byAuditorium': function(exhibition, id)
			{
                if(!id) return true; // Any thing empty include zero.

                var result = _.find(exhibition.schedules, function(schedule){

                    return schedule.auditorium_id == id
                });

                return angular.isDefined(result);
			},
			'byIcon' : function(exhibition, id)
			{
                if(!id) return true;

				return exhibition.type_id === id;
			},
			'byDay': function(exhibition, value)
			{
				var foundIt =_.find( exhibition.schedules, function(schedule)
				{
					var selectedDate = moment(value);

					var filmDate = moment(schedule.entry, format);

					return selectedDate.date() === filmDate.date();
				});

				return angular.isDefined( foundIt );
			},
			'byWeek' : function(exhibition, value)
			{

				var foundIt =_.find( exhibition.schedules, function(schedule)
				{
					var selectedDate = moment(value);

					var date = moment(schedule.entry,format);

					return selectedDate.week() === date.week();
				});

				return angular.isDefined( foundIt );
			},
			'byMonth' : function(exhibition, date)
			{
                var month = moment(date).month();

                var result = _.find(exhibition.schedules, function(schedule){

                    var scheduleMonth   = moment(schedule.entry, format).month();

                    return month == scheduleMonth;
                });

                return angular.isDefined(result);
			},
			'titleOrDirector': function(item, value)
			{
				if( angular.isUndefined(value) || value === '') return true;
				
				var title = item.exhibition_film.film.title;

				var director = item.exhibition_film.film.director;

				return _.contains( title, value) || _.contains( director, value);
			}
		};

		return {
			all : function()
			{
				return  $window.exhibitions;
			},
            find : function(id)
            {
                return _.find($window.exhibitions, function(exhibition) {
                    return exhibition.id === id;
                });
            },
			filters : function()
			{
				return filters;
			},
			directors: function()
			{
				return _.map( $window.exhibitions, function(exhibition)
				{
					return exhibition.exhibition_film.film.director;
				});
			},
			titles : function()
			{
				return _.map( $window.exhibitions, function(exhibition)
				{
					return exhibition.exhibition_film.film.title;
				});
			},

			titlesAndDirectories  : function()
			{
				return _.map( $window.exhibitions, function(exhibition)
				{
					return { 
						id 		 : exhibition.id,
						title 	 : exhibition.exhibition_film.film.title,
						director : exhibition.exhibition_film.film.director,
						thumbnail: exhibition.exhibition_film.film.cover.medium
					};
				});
			},
            make : function(data){

                var parsedData = angular.copy(data);

                parsedData.schedules = _.map(parsedData.schedules, function(schedule){

                    schedule.entry = new Date(schedule.entry);

                    return schedule;
                });

                return new Exhibition(data);
            }
		};
	}]);


    /**
     * It wraps the data of a exhibition in a object with useful methods.
     * @param data
     * @constructor
     */
    var Exhibition = function(data){

        angular.extend(this, data);

        this.schedulesByDay = {};
    };

    /**
     * It returns a lists of the auditoriums where the film is exhibited.
     * @returns {Array}
     */
    Exhibition.prototype.getAuditoriums = function(){

        var tmp = _.uniq(this.schedules, 'auditorium_id');

        return _.pluck(tmp, 'auditorium');
    };

    /**
     * It return a list of schedules of a exhibition but only of auditorium with the id given.
     * @param auditoriumId
     * @returns {Array}
     */
    Exhibition.prototype.getSchedulesByAuditorium = function(auditoriumId){

        if( angular.isUndefined(this.schedulesByDay['id' + auditoriumId]) ) {

            var schedules = _.filter(this.schedules, function(schedule){

                return schedule.auditorium.id === auditoriumId
            });

            // Cache
            this.schedulesByDay['id' + auditoriumId] = this.groupSchedulesByDay(schedules);
        }

        return this.schedulesByDay['id' + auditoriumId];
    };

    Exhibition.prototype.groupSchedulesByDay = function(schedules){

        //------------------------
        // Group schedules by day.
        //------------------------
        var schedulesByDay = _.reduce(schedules, function(accum, schedule){

            var day = schedule.entry.split(' ')[0];

            if(angular.isUndefined(accum[day])){

                accum[day] = [];
            }

            accum[day].push(schedule);

            return accum;
        }, {});

        //------------------------------------
        // Sort schedules of each day by hour.
        //------------------------------------
        angular.forEach(schedulesByDay, function(schedules, key){

           schedulesByDay[key] = _.sortBy(schedules, function(schedule){
                return schedule.entry;
            });
        });

        return schedulesByDay;
    };

    Exhibition.prototype.getTechnicalCard = function(){

        var film = this.exhibition_film.film;

        return [
            {
                label : 'Título',
                value : film.original_title
            },
            {
                label : 'Género',
                value : angular.isObject(film.genre)? film.genre.name : undefined
            },
            {
                label : 'Paises',
                value : film.countries.length > 0? joinCountriesNames( film.countries): undefined
            },
            {
                label : 'Director',
                value : film.director
            },
            {
                label : 'Año',
                value : film.years.join(', ')
            },
            {
                label : 'Duración',
                value : film.duration + ' min'
            },
            {
                label : 'Guión',
                value : film.script
            },
            {
                label : 'Fotografía',
                value : film.photographic
            },
            {
                label : 'Música',
                value : film.music
            },
            {
                label : 'Edición',
                value : film.edition
            },
            {
                label : 'Producción',
                value : film.production
            },
            {
                label : 'Reparto',
                value : film.cast
            }
        ];
    };

    var joinCountriesNames = function(countries){

        return _.pluck(countries, 'name').join(', ');
    }
});