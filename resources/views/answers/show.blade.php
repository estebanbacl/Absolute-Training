@extends('layouts.app')

@section('content')
    @include('answers.show_fields')

    <div class="form-group">
           <a href="{!! route('answers.index') !!}" class="btn btn-default">Back</a>
    </div>
@endsection
