
var app = angular.module('training', [], function($interpolateProvider) {
    $interpolateProvider.startSymbol('<%');
    $interpolateProvider.endSymbol('%>');
});

app.controller('trainingController', function($scope, $http) {

    $scope.todos = [];
    $scope.loading = false;

    $scope.init = function() {
        $scope.loading = true;
        $http.get('/api/v1/questions/2').
        success(function(data, status, headers, config) {
            $scope.questions = data;
            $scope.loading = false;
            console.log(data);

           console.log(data);
        });
    }

    $scope.init();
});

    console.log("APP.JS");