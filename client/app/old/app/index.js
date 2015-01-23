'use strict';

var app = angular.module('organizat', ['ngAnimate', 'ngCookies', 'ngTouch', 'ngSanitize', 'restangular', 'ngRoute', 'ngMaterial']);

app.config(function ($routeProvider, RestangularProvider) {

  RestangularProvider.setBaseUrl('http://api.organizat.dev/app_dev.php/api');

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
});