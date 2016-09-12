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
                            <td style="width:150px;">
                                <div class="btn-group btn-group-justified" role="group">
                                    <div class="btn-group" role="group">
                                        <a href="{{ action('StudentController@edit', ["student" => $student->id]) }}" role="button" class="btn btn-default">Edit</a>
                                    </div>
                                    <div class="btn-group" role="group">
                                        {{ Form::open(array('action' => array('StudentController@destroy', $student->id), 'method' => 'delete')) }}
                                        <button type="submit" onclick="alert(event)" class="btn btn-danger btn-mini">Delete</button>
                                        {{ Form::close() }}
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
            </tbody>
        </table>
        <div class="container">
            <div class="row">
                <a href="{{ action('StudentController@create') }}" class="btn btn-default">Create student</a>

            </div>
        </div>
        <script>
            function alert(e){
                var conf = confirm("Are you sure you want to delete selected user?");
                if(!conf){
                    e.preventDefault()
                }
            }
        </script>
    @else
        "There are no student records imported in the database yet."
    @endif
@stop