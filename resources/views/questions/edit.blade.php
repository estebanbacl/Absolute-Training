@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">

                    <div class="panel-body text-center">


                        <h2 class="main-title">Editar Preguntas</h2>
                        <div class="row panel-body">

                            @include('core-templates::common.errors')

                            <div class="row">
                                {!! Form::model($questions, ['route' => ['questions.update', $questions->id], 'method' => 'patch']) !!}

                                @include('questions.fields')

                                {!! Form::close() !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection



