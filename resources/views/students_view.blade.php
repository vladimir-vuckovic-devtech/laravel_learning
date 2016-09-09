@extends("master")

@section("content")
    @if(!$students->isEmpty())
        <table class="table">
            <thead>
            <tr>
                <th>Username</th>
                <th>Password</th>
            </tr>
            </thead>
            <tbody>

                    @foreach ($students as $student)
                        <tr>
                            <td>{{ $student->username }}</td>
                            <td>{{ $student->password }}</td>
                        </tr>
                    @endforeach
            </tbody>
        </table>
    @else
        "There are no student records imported in the database yet."
    @endif
@stop