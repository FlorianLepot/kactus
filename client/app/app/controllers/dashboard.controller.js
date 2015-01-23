/**
 * DashboardCtrl - controller
 */
function DashboardCtrl() {

};


angular
    .module('inspinia')
    .controller('DashboardCtrl', function () {

        this.helloText = 'Welcome in SeedProject';
        this.descriptionText = 'It is an application skeleton for a typical AngularJS web app. You can use it to quickly bootstrap your angular webapp projects and dev environment for these projects.';

    });