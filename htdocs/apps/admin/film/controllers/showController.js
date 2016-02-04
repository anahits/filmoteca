/* globals define */

(function (factory) {

    'use strict';

    define([], factory);

})(function () {

    'use strict';

    var controller = function ($scope, $sce, film) {

        $scope.film = film;

        $scope.film.trailer = $sce.trustAsHtml(film.trailer);
    };

    controller.$inject = [
        '$scope',
        '$sce',
        'film'
    ];

    return controller;
});
