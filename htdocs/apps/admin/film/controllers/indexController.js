/* globals define */

(function (factory) {

    'use strict';

    define([], factory);

})(function () {

    'use strict';

    var controller = function ($scope, filmService) {

        $scope.films        = [];
        $scope.searchUrl    = '/admin/api/films';
        $scope.pagination   = {
            per_page : 0,
            total: 0,
            current_page: 1,
            last_page: 0,
            from : 0,
            to: 0,
            maxSize : 10
        };

        $scope.query = '';

        $scope.pageChanged = function () {

            filmService
                .paginate($scope.query, $scope.pagination.current_page)
                .then(function (response) {

                    angular.extend($scope.pagination, response.data);

                    $scope.films  = response.data.data;

                    $scope.pagination.data.data = null; //we do not save redundant data.
                });
        };

        $scope.destroy = function ($index) {

            if (!window.confirm("Confirma la accion de borrar")) {
                return;
            }

            filmService
                .destroy($scope.films[$index].id)
                .then(function (film) {

                    $scope.films.splice($index, 1);

                    $scope.$emit('alert', {
                        msg: 'La película "' + film.title + '" fue eliminada.',
                        type: 'success'
                    });
            });
        };

        $scope.pageChanged();

        $scope.$on('searchFinished', function (event, pagination) {

            angular.extend($scope.pagination, pagination);

            $scope.films  = pagination.data;

            $scope.pagination.data.data = null; //we do not save redundant data.
        });
    };

    controller.$inject = [
        '$scope',
        'filmService'
    ];

    return controller;
});
