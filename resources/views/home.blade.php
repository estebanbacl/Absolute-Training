@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">

                    <div class="panel-body text-center">
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
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection