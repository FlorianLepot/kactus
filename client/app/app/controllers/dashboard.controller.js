angular
    .module('inspinia')
    .controller('DashboardCtrl', function ($scope, Restangular) {

        $scope.projects = [];

        Restangular
            .all('projects')
            .getList()
            .then(function(projects) {
                $scope.projects = projects;
            });


    });