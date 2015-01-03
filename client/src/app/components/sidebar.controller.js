'use strict';

angular.module('organizat')
  .controller('SidebarCtrl', function ($scope, $timeout, $mdSidenav, $log) {

  $scope.close = function() {
    $mdSidenav('menu').close()
      .then(function(){
        $log.debug('close LEFT is done');
      });
  };

});