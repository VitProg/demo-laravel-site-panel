/**
 * Created by user on 24.09.2015.
 */
(function (A) {
    "use strict";
    var app = A.module('MyApp', ['ngResource', 'ngCookie']);

    app.config(['$resourceProvider', function($resourceProvider){
        $resourceProvider.defaults.stripTrailingSlashes = false;
    }]);

    app.run(['$http', '$cookies', function($http, $cookies) {
        $http.defaults.headers.post['X-CSRFToken'] = $cookies.csrftoken;
        $http.defaults.headers.common['X-CSRFToken'] = $cookies.csrftoken;
    }]);

}(this.angular));

function AppController($scope) {

    var Site = $resource('/')

    $scope.create = function() {

    };

    $scope.edit = function() {

    };
}