@extends('layouts.app')

@section('content')



    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">

                    <div class="panel-body text-center">


                        <h2 class="main-title">Crear nuevas preguntas</h2>
                        <div class="row panel-body">

                            @include('core-templates::common.errors')

                            {!! Form::open(['route' => 'questions.store']) !!}

                            @include('questions.fields')

                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
