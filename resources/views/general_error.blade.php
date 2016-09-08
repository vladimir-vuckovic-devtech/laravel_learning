@extends("master")

@section("content")
<div class="alert alert-danger fade in">
    <strong>Danger!</strong> {{ $error->getMessage() }}
</div>
@stop