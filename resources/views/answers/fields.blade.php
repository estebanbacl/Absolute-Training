
<!-- Questions Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('questions_id', 'Pregunta Relacionada') !!}
    {!! Form::number('questions_id', null, ['class' => 'form-control']) !!}

</div>
<!-- Answer Es Field -->
<div class="form-group col-sm-6">
    {!! Form::label('answer_es', 'Respuesta') !!}
    {!! Form::text('answer_es', null, ['class' => 'form-control']) !!}
</div>

<!-- Response Field -->
<div class="form-group col-sm-6">
    {!! Form::label('response', '¿ Es respuesta ?') !!}
    {!! Form::select('response', array('0' => 'No', '1' => 'Si' ), ['class' => 'form-control']) !!}
</div>

<!-- Rel Response Field -->
<div class="form-group col-sm-6">
    {!! Form::label('rel_response', 'Respuesta Relacionada, solo tipo otros. ') !!}
    {!! Form::number('rel_response', null, ['class' => 'form-control']) !!}
</div>

<!-- Rel Response Field
<div class="form-group col-sm-6">
    {!! Form::label('rel_response', 'Respuesta Relacionada, solo tipo otros. ') !!}
    <select>
        <option name="rel_response" value="0"></option>
        @foreach($answers as $answers)
            <option value="{!! $answers->answers_id !!}">{!! $answers->answer_es !!}</option>
        @endforeach
        ?>
    </select>
</div>
 -->

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Guardar', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('answers.index') !!}" class="btn btn-default">Cancelar</a>
</div>
