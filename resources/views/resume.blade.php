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
                        <p class="inner-text">Ha terminado con exito el programa de entrenamiento.
                            <br> Usted respondio corectamente el 60% de las preguntas.</p>
                        <br><br>

                            <div class="progress">
                                <div class="progress-bar progress-bar-warning" role="progressbar"
                                     aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"
                                     style="width: 60%">
                                    <span class="sr-only">60% completado (aviso)</span>
                                </div>
                            </div>

                        <button class="btn-link-mod" style="width: 150px;">
                            <a href="#">Ok</a>
                        </button>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection