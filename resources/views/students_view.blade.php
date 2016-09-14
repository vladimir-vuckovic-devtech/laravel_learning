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
                                        <button type="submit" data-toggle="modal" data-target="#confirmModal" onclick="prevent_def(event)" class="btn btn-danger btn-mini">Delete</button>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
            </tbody>
        </table>
        <div id="confirmModal" class="modal fade" role="dialog">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Modal Header</h4>
                    </div>
                    <div class="modal-body">
                        <p>Are you sure you want to delete selected user?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        {{ Form::open(array('action' => array('StudentController@destroy', $student->id), 'method' => 'delete', 'class' => 'inline-block')) }}
                        <button type="submit" class="btn btn-danger block">Delete</button>
                        {{ Form::close() }}
                    </div>
                </div>

            </div>
        </div>
        <script>
            function prevent_def(e){
                e.preventDefault()
            }
        </script>
    @else
        "There are no student records imported in the database yet."
    @endif
    <div class="container">
        <div class="row">
            <a href="{{ action('StudentController@create') }}" class="btn btn-default">Create student</a>

        </div>
    </div>
@stop