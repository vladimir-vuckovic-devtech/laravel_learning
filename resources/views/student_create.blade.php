@extends("master")

@section("content")
    {!! Form::open(['action' => "StudentController@store"]) !!}
    <div class="form-group">
    {!! Form::label("username") !!}
    {!! Form::text("username", null, ['class' => 'form-control']) !!}
    </div>
    <div class="form-group">
    {!! Form::label("password") !!}
    {!! Form::text("password", null, ['class' => 'form-control']) !!}
    </div>
    {!! Form::submit('Submit', ['class' => 'btn btn-default']) !!}
    {!! Form::close() !!}

@stop