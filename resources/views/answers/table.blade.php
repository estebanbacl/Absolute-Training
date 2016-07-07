<table class="table table-responsive" id="answers-table">
    <thead>
        <th>Respuesta Id</th>
        <th>Pregunta Rel </th>
        <th>Respuesta</th>
        <th>¿ Es Respuesta ?</th>
        <th>Created At</th>
        <th colspan="3">Action</th>
    </thead>
    <tbody>
    @foreach($answers as $answers)
        <tr>
            <th>{!! $answers->answers_id !!}</th>
            <td>{!! $answers->questions_id !!}</td>
            <td>{!! $answers->answer_es !!}</td>
            <td>{!! $answers->response !!}</td>
            <td>{!! $answers->created_at !!}</td>
            <td>
                {!! Form::open(['route' => ['answers.destroy', $answers->answers_id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('answers.show', [$answers->answers_id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('answers.edit', [$answers->answers_id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
