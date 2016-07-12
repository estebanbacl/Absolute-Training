
<div ng-app="training" ng-controller="trainingController">
    <h2 class="main-title">PROGRAMA DE ENTRENAMIENTO</h2>
    <br>
    <br>
    <div>
        <p class="inner-text"><% question.questions_es %></p>
        <br><br>
        <div style="text-align:left; padding-left: 30%;" ng-repeat="answers in answers_ID">

            <div ng-switch="question.type">
                <div ng-switch-when="1">
                    <div class="radio">
                        <label><input type="radio" name="optradio"><% answers.answer_es %></label>
                    </div>
                </div>
                <div ng-switch-when="2">
                    <div class="checkbox">
                        <label><input type="checkbox" name="optradio"><% answers.answer_es %></label>
                    </div>
                </div>
                <div ng-switch-when="3">
                    <p>En proceso</p>
                </div>
            </div>

        </div>
        <br>
        <div ng-switch="question.type">
            <p ng-switch-when="1">Pregunta de unica respuesta</p>
            <p ng-switch-when="2">Pregunta de multiple respuesta</p>
            <p ng-switch-when="3">Relacione la respuesta que corresponde</p>
        </div>
        <br>
    </div>

    <button class="btn-link-mod" style="width: 150px;">
        <a href="/resume">Siguiente Pregunta</a>
    </button>
</div>