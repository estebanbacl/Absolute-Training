@extends('layouts.app')

@section('content')

        <div class="container">
                <div class="row">
                        <div class="col-md-10 col-md-offset-1">
                                <div class="panel panel-default">

                                        <div class="panel-body text-center">
                                                <h2 class="main-title">Respuestas</h2>
                                                <a class="btn btn-primary pull-right" style="margin-top: 25px" href="{!! route('answers.create') !!}">Nueva Respuesta</a>

                                                <div class="clearfix"></div>

                                                @include('flash::message')

                                                <div class="clearfix"></div>

                                                @include('answers.table')
                                        </div>
                                </div>
                        </div>
                </div>
        </div>

@endsection
