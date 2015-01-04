'use strict';

angular.module('organizat')
  .controller('SidebarCtrl', function ($scope, $timeout, $mdSidenav) {

    $scope.show = true;

    $scope.close = function() {
      $mdSidenav('menu').close();
    };

});