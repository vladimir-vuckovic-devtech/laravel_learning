@extends("master")

@section("content")
    @if(!$students->isEmpty())
        <table class="table">
            <thead>
            <tr>
                <th>Username</th>
                <th>Password</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>

                    @foreach ($students as $student)
                        <tr>
                            <td><a href="{{ action("StudentController@show", [$student->id]) }} {{--{{ url("/student", $student->id) }}--}}">{{ $student->username }}</a></td>
                            <td>{{ $student->password }}</td>
                            <td><span><a href="{{ /*action('StudentController@edit')*/ }}" onclick="alert()">Edit</a>
								|
								<a href="{{ action('StudentController@edit', [$student->id]) }}" onclick="return false">Delete</a></span></td>
                        </tr>
                    @endforeach
            </tbody>
        </table>
        <div class="container">
            <div class="row">
                <a href="{{ action('StudentController@create') }}" class="btn btn-default">Create student</a>
                <a href="{{ action('StudentController@edit') }}" class="btn btn-default">Edit student</a>

            </div>
        </div>
        <script>
            function alert(){
                confirm("Are you sure you want to delete selected user?")
            }
        </script>
    @else
        "There are no student records imported in the database yet."
    @endif
@stop