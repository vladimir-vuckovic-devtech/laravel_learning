@extends("master")

@section("content")
    <div class="alert alert-danger fade in">
        <strong>Danger!</strong> {{ $error_message }}
    </div>
@stop