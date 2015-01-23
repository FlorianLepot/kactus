'use strict';

angular.module('organizat')
  .controller('HomeCtrl', function ($scope, Restangular) {

    $scope.user = { username: '', email: '', plainPassword: ''};

    $scope.submit = function() {
      console.log('submit');

      Restangular.all('projects').post($scope.user).then(function() {
        console.log('oui');
        //AuthenticationService.login({username: $scope.user.username, password: $scope.user.plainPassword});
      }, function() {
        //toastr.error('Tu n\'pas l\'air tout à fait prêt !', 'Oops !');
      });
    };
  });
