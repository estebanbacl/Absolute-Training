
var app = angular.module('training', [], function($interpolateProvider) {
    $interpolateProvider.startSymbol('<%');
    $interpolateProvider.endSymbol('%>');
});

app.controller('trainingController', function($scope, $http) {

    $scope.questions = [];
    $scope.answers = [];
    $scope.loading = false;

    $scope.init = function() {
        $scope.loading = true;
        $http.get('/api/v1/questions').
        success(function(data) {
            $scope.questions = data.data;
            console.log($scope.questions);

            questions(2);
        });
    }

    $scope.questions = function (id) {
        $scope.loading = true;
        $http.get('/api/v1/questions/id').
        success(function(data) {
            console.log('Answers : ');
            $scope.answers = data.data;
            console.log($scope.answers);
        });
    }

    $scope.init();

});

