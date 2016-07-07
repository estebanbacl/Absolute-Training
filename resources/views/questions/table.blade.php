<table class="table table-responsive" id="questions-table">
    <thead>
        <th>Pregunta </th>
        <th>Tipo</th>
        <th>Estado</th>
        <th>Fecha de Creación</th>

        <th colspan="3">Action</th>
    </thead>
    <tbody>
    @foreach($questions as $questions)
        <tr>
            <td>{!! $questions->questions_es !!} </td>

            <td>{!! $questions->type !!}</td>
            <td>{!! $questions->state !!}</td>
            <td>{!! $questions->created_at !!}</td>

            <td>
                {!! Form::open(['route' => ['questions.destroy', $questions->questions_id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <!--a href="{!! route('questions.show', [$questions->questions_id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a-->
                    <a href="{!! route('questions.edit', [$questions->questions_id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Esta seguro de eliminar?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>



