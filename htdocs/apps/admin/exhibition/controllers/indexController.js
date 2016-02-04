/* globals require */

(function (factory) {

    'use strict';

    define([], factory);
})(function () {

    'use strict';

    var controller = function($scope, exhibitionService){

        $scope.pagination = {
            per_page : 0,
            total: 0,
            current_page: 1,
            last_page: 0,
            from : 0,
            to: 0,
            maxSize : 10
        };

        $scope.searchUrl = '/admin/api/exhibition';

        $scope.pageChanged = function () {

            exhibitionService.paginate($scope.query, $scope.pagination.current_page)
                .then(function (response) {

                    angular.extend($scope.pagination, response.data);

                    $scope.exhibitions  = response.data.data;

                    $scope.pagination.data.data = null; //we do not save redundant data.
            });
        };

        $scope.destroy = function ($index) {

            if (!window.confirm("Confirma la accion de borrar")) {
                return;
            }

            exhibitionService
                .destroy($scope.exhibitions[$index].id)
                .then(function () {

                    $scope.exhibitions.splice($index, 1);

                    $scope.$emit('alert', {
                        type: 'success',
                        msg: 'Exhibición borrada.'
                    });
                });
        };

        $scope.pageChanged();

        $scope.$on('searchFinished', function (event, pagination) {

            angular.extend($scope.pagination, pagination);

            $scope.exhibitions  = pagination.data;

            $scope.pagination.data.data = null; //we do not save redundant data.
        });
    };

    controller.$inject = ['$scope', 'exhibitionService'];

    return controller;
});
