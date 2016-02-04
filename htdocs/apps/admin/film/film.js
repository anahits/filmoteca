/* globals define */

(function (factory) {

    'use strict';

    define([
            'angular',
            'admin/film/controllers/indexController',
            'admin/film/controllers/createController',
            'admin/film/controllers/showController',
            'admin/film/services/filmService',
            'admin/film/factories/filmFactory',
            'admin/film/factories/filmTransformer',
            'admin/film/configs/$route',
            'admin/film/constants/tinyMCEOptions',

            'ngTagsInput',
            'angular.filter',
            'ngRoute',
            'ngSanitize',
            'file-model',
            'tinyMCE',
            'uiTinyMCE'
        ],
        factory);
})(function (
    angular,
    indexController,
    createController,
    showController,
    filmService,
    filmFactory,
    filmTransformer,
    $routeConfig,
    tinyMCEOptions
) {

    'use strict';

    angular.module('admin.film', [
        'ngTagsInput',
        'angular.filter',
        'ngRoute',
        'ngSanitize',
        'FileModel',
        'ui.tinymce'
    ])
        .controller('admin.film.controllers.indexController', indexController)
        .controller('admin.film.controllers.createController', createController)
        .controller('admin.film.controllers.showController', showController)
        .service('filmService', filmService)
        .service('filmTransformer', filmTransformer)
        .factory('filmFactory', filmFactory)
        .config($routeConfig)
        .constant('tinyMCEOptions', tinyMCEOptions)
});
