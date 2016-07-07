

<!-- Questions Es Field -->
<div class="form-group col-sm-6">
    {!! Form::label('questions_es', 'Pregunta :') !!}
    {!! Form::text('questions_es', null, ['class' => 'form-control']) !!}
</div>

<!-- Questions En Field
<div class="form-group col-sm-6">
    {!! Form::label('questions_en', 'Questions En:') !!}
    {!! Form::text('questions_en', null, ['class' => 'form-control']) !!}
</div>

<!-- Type Field -->
<div class="form-group col-sm-6">
    {!! Form::label('type', 'Tipo de pregunta:') !!}
    {!! Form::select('type', array('1' => 'Respuesta unica', '2' => 'Multiple respuesta', '3' => 'Otro'), ['class' => 'form-control']) !!}
</div>

<!-- State Field
<div class="form-group col-sm-6">
    {!! Form::label('state', 'Estado:') !!}
    {!! Form::text('state', null, ['class' => 'form-control']) !!}
</div>


<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Guardar', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('questions.index') !!}" class="btn btn-default">Cancelar</a>
</div>
