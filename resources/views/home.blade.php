@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">

                    <div class="panel-body text-center">
                        @if (Auth::guest())
                        <h2 class="main-title">BIENVENIDO</h2>
                        <br><br>
                        <p class="inner-text">Está a punto de iniciar su proceso de certificación
                            en una de las plataformas más grandes del mundo.</p>
                        <br><br>
                        <button class="btn-link-mod">
                            <a href="/register">Registrarse</a>
                        </button>
                        <button class="btn-link-mod" >
                            <a href="/login">Iniciar</a>
                        </button>
                        @else
                        <h2 class="main-title">PROGRAMA DE ENTRENAMIENTO</h2>
                        <br><br>
                        <p class="inner-text">Tengo una gran cantidad de dispositivos que voy a retornar del contrato de arrendamiento. ¿Qué funciones Computrace debo usar?</p>
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

                        <button class="btn-link-mod" style="width: 150px;">
                            <a href="/resume">Siguiente Pregunta</a>
                        </button>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection