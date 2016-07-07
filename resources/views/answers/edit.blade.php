@extends('layouts.app')

@section('content')
        <div class="row">
            <div class="col-sm-12">
                <h1 class="pull-left">Edit answers</h1>
            </div>
        </div>

        @include('core-templates::common.errors')

        <div class="row">
            {!! Form::model($answers, ['route' => ['answers.update', $answers->id], 'method' => 'patch']) !!}

            @include('answers.fields')

            {!! Form::close() !!}
        </div>
@endsection
