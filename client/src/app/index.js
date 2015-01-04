'use strict';

angular.module('organizat', ['ngAnimate', 'ngCookies', 'ngTouch', 'ngSanitize', 'restangular', 'ngRoute', 'ngMaterial'])
  .config(function ($routeProvider) {
    $routeProvider
      .when('/', {
        templateUrl: 'partials/homepage/index.html',
        controller: 'HomeCtrl'
      })
      .when('/dashboard', {
        templateUrl: 'partials/dashboard/index.html',
        controller: 'DashboardCtrl'
      })
      .otherwise({
        redirectTo: '/'
      });
  })
;
