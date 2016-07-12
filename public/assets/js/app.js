
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
        });
    }

    $scope.questionsId = function (id) {
        $scope.question = '';
        $scope.loading = true;
        $http.get('/api/v1/questions/'+id).
        success(function(data) {
            $scope.question = data.data;
        });
    }

    $scope.answersId = function (id) {
        $scope.answers_ID = [];
        $scope.loading = true;
        $http.get('/api/v1/answers/').
        success(function(data) {
            $scope.answers = data.data;
            for( var i in $scope.answers ){
                if ($scope.answers[i].questions_id == id ) {
                    $scope.answers_ID.push($scope.answers[i]);
                }
            }
        });
    }

    $scope.nextQuestions = function() {
        console.log('NextQuestion');
        $scope.questionsId(1);
        $scope.answersId(1);
    }

    $scope.questions();
    $scope.questionsId(2);
    $scope.answersId(2);

});

