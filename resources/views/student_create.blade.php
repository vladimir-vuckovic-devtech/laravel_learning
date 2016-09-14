@extends("master")

@section("content")
    {!! Form::open(['action' => "StudentController@store"]) !!}
        @include("student_form")
    {!! Form::close() !!}
        @if($errors->any())
            @foreach($errors->all() as $error)
                <div class="alert alert-danger margin-top">
                    {{ $error }}
                </div>
            @endforeach
        @endif
@stop