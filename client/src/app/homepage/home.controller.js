'use strict';

angular.module('organizat')
  .controller('HomeCtrl', function ($scope) {

    $scope.user = {
       title:     "Technical Program Manager",
       email:     "ipsum@lorem.com",
       firstName: "Naomi",
       lastName:  "" ,
       company:   "Google" ,
       address:   "1600 Amphitheatre Pkwy" ,
       city:      "Mountain View" ,
       state:     "CA" ,
       country:   "USA" ,
       postalCode : "94043"
    };
  });
