/* globals define */

(function (factory) {

    'use strict';

    define([
            'json!/api/countries',
            'json!/api/genres',
            'lodash'
        ],
        factory
    );

})(function (countries, genres, _) {

    'use strict';

    var controller = function ($scope, $filter, $location, $routeParams, filmService, filmFactory, tinyMCEOptions) {

        var YEARS_AVAILABLE = _.range(filmService.MIN_YEAR, filmService.MAX_YEAR);

        $scope.genres       = genres;
        $scope.film         = filmFactory.make();
        $scope.saving       = false;
        $scope.rawText      = "empty";

        $scope.tinymceOptions = tinyMCEOptions;

        $scope.searchYear = function ($query) {

            return _.filter(YEARS_AVAILABLE, function (year) {

                var stringYear = '' + year;

                return stringYear.indexOf($query) === 0;
            });
        };

        $scope.searchCountry = function ($query) {

            var cleanQuery = $filter('latinize')($query).toLowerCase()

            return _.filter(countries, function (country) {

                var cleanName = $filter('latinize')(country.name).toLowerCase();

                return cleanName.indexOf(cleanQuery) !== -1;
            });
        };

        $scope.save = function () {

            $scope.saving = true;

            var promise = typeof $scope.film.id === 'undefined'?
                filmService.store($scope.film):
                filmService.update($scope.film);

            promise
                .then(function () {

                    $location.path('/films');
                }).finally(function () {

                    $scope.saving = false;
                });
        };

        $scope.$on('$viewContentLoaded', function () {

            if (typeof $routeParams.id === 'undefined') {
                return;
            }

            filmService
                .load($routeParams.id)
                .then(function (rawFilm) {

                    angular.extend($scope.film, rawFilm);
                    $scope.rawText = 'filled';
                });
        });
    };

    controller.$inject = [
        '$scope',
        '$filter',
        '$location',
        '$routeParams',
        'filmService',
        'filmFactory',
        'tinyMCEOptions',
    ];

    return controller;
});
