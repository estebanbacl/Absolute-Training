
var app = angular.module('training', [], function($interpolateProvider) {
    $interpolateProvider.startSymbol('<%');
    $interpolateProvider.endSymbol('%>');
});

app.controller('trainingController', function($scope, $http) {

    $scope.questions = [];
    $scope.question = [];
    $scope.answers = [];
    $scope.answers_ID = [];
    $scope.loading = false;

    $scope.questions = function() {
        $scope.loading = true;
        $http.get('/api/v1/questions').
        success(function(data) {
            $scope.questions = data.data;
            console.log('Count Question :'+$scope.questions.length);
        });
    }

    $scope.questionsId = function (id) {
        $scope.loading = true;
        $http.get('/api/v1/questions/'+id).
        success(function(data) {
            $scope.question = data.data;
        });
    }

    $scope.answers = function (id) {
        $scope.loading = true;
        $http.get('/api/v1/answers/').
        success(function(data) {
            $scope.answers = data.data;

            console.log('ANSWERS : ');

            for( var i in $scope.answers ){

                console.log($scope.answers[i].questions_id);
                if ($scope.answers[i].questions_id == id ) {
                    $scope.answers_ID.push($scope.answers[i]);
                }
            }
            
            console.log($scope.answers_ID);


        });
    }

    $scope.questions();
    $scope.questionsId(2);

    $scope.answers(2);


});

