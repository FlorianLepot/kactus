angular
    .module('inspinia')
    .controller('DashboardCtrl', function ($scope, Restangular) {

        $scope.projects = [];
        $scope.createProjectForm = true;
        $scope.projectForm = null;

        Restangular
            .all('projects')
            .getList()
            .then(function(projects) {
                $scope.projects = projects;
            });

        Restangular
            .oneUrl('projects', config.api + '/projects/new')
            .get()
            .then(function(projectForm) {
                $scope.projectForm = projectForm.children;
                console.log($scope.projectForm);
            });
    });