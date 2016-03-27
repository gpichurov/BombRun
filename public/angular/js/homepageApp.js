var homepageApp = angular.module('homepageApp', []);

homepageApp.controller('HomepageController', function($scope) {
    $scope.class = '';
    $scope.hideButtons = function() {
        $scope.class = 'animated bounceOutUp';

    };
});

