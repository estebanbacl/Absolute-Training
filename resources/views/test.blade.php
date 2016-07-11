
<div ng-app="training" ng-controller="trainingController">
    <h2 class="main-title">PROGRAMA DE ENTRENAMIENTO</h2>
    <br>
    <div ng-repeat='question in questions'>
        <p class="inner-text"><% question.questions_es %></p>
        <br><br>
        <div style="text-align:left; padding-left: 30%;">
            <div class="radio">
                <label><input type="radio" name="optradio">a. Eliminación de agente</label>
            </div>
            <div class="radio">
                <label><input type="radio" name="optradio">b. Bloqueo de dispositivo</label>
            </div>
            <div class="radio">
                <label><input type="radio" name="optradio">c. Barrido por sector para borrar datos</label>
            </div>
            <div class="radio">
                <label><input type="radio" name="optradio">d. Lista de archivos y luego archivo de recuperación</label>
            </div>
        </div>
        <br>
        <br>
    </div>

    <button class="btn-link-mod" style="width: 150px;">
        <a href="/resume">Siguiente Pregunta</a>
    </button>
</div>