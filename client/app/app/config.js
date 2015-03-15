/**
 * INSPINIA - Responsive Admin Theme
 * Copyright 2014 Webapplayers.com
 *
 * Inspinia theme use AngularUI Router to manage routing and views
 * Each view are defined as state.
 * Initial there are written stat for all view in theme.
 *
 */

var config = {
    api: 'http://api.kactus.dev/api'
};

angular
    .module('inspinia')
    .config(function ($stateProvider, $urlRouterProvider, RestangularProvider) {
        RestangularProvider.setBaseUrl(config.api);

        $urlRouterProvider.otherwise("/");
        $stateProvider
            .state('dashboard', {
                url: "/",
                templateUrl: "views/dashboard.html",
                data: { pageTitle: 'Tableau de bord' }
            })
            .state('minor', {
                url: "/minor",
                templateUrl: "views/minor.html",
                data: { pageTitle: 'Example view' }
            });

    });

angular
    .module('inspinia')
    .run(function($rootScope, $state) {
        $rootScope.$state = $state;
    });

angular
    .module('inspinia')
    .run(function(Restangular, $rootScope) {
        Restangular.setErrorInterceptor(function(response) {
            if(response.status === 401) {
                $rootScope.$broadcast('event:auth-login-required');
                return false;
            }
            return true;
        });
    });
