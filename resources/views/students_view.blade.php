@extends("master")

@section("content")
    <table class="table">
        <thead>
        <tr>
            <th>Username</th>
            <th>Password</th>
        </tr>
        </thead>
        <tbody>
            @if(!empty($students))
                @foreach ($students as $student)
                    <tr>
                        <td>{{ $student->username }}</td>
                        <td>{{ $student->password }}</td>
                    </tr>
                @endforeach
            @endif
        </tbody>
    </table>
@stop