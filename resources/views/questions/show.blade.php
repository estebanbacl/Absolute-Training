@extends('layouts.app')

@section('content')
    @include('questions.show_fields')

    <div class="form-group">
           <a href="{!! route('questions.index') !!}" class="btn btn-default">Back</a>
    </div>
@endsection
