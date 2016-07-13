
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

    $scope.questionsAll = function() {
        $scope.loading = true;
        $http.get('/api/v1/questions').
        success(function(data) {
            $scope.questions = data.data;
            $scope.questionsId($scope.questions[0].questions_id);
            $scope.answersId($scope.questions[0].questions_id);
        });
        return $scope.questions;
    }

    $scope.questionsId = function (id) {
        console.log(id);
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

    var count = 1;
    $scope.nextQuestions = function() {

        if($scope.questions.length > count ){
            console.log('NextQuestion');
            console.log(count);
            $scope.questionsId($scope.questions[count].questions_id);
            $scope.answersId($scope.questions[count].questions_id);
            count = count+1;
        }else{
            console.log('Fin de las preguntas');
        }

    }

    $scope.questionsAll();


});

