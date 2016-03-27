/**
 * Created by maya on 20-Mar-16.
 */

var app = angular.module('myApp', ['ngRoute']);

app.config(function($routeProvider) {
    $routeProvider

        .when('/shop', {
            templateUrl : 'pages/shop.html',
            controller : 'ShopController'
        })

        .when('/login', {
            templateUrl : 'pages/login.html',
            controller  : 'LoginController'
        })

        .when('/register', {
            templateUrl : 'pages/register.html',
            controller  : 'RegisterController'
        })

        .otherwise({redirectTo: '/'});
});

/*app.controller('HomeController', function($scope) {
    $scope.message = 'Hello from HomeController';
});*/

app.controller('RegisterController', function($scope) {
    $scope.message = 'Hello from RegisterController';
});

app.controller('LoginController', function($scope) {
    $scope.message = 'Hello from LoginController';
});

app.controller('HomepageController', function($scope) {
    $scope.class = '';

    console.log($scope.homeBtns);
    $scope.flag = false;
    $scope.hideButtons = function() {
        $scope.class = 'animated zoomOut';
    };

});

app.controller('ShopController', function ($scope) {
   $scope.message = 'Hello from ShopController';
});