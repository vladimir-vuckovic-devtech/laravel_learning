<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Student;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(!Schema::hasTable("students")) {
            throw new \Exception("Table does not exists in the database.");
        }

        $students = Student::all();
        $data["students"] = $students;
        $data["title"] = "Students";
        return View::make("students_view", $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['title'] = "Create student";
        return view("student_create", $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validateFields($request);
        Student::create($request->toArray());
        return redirect()->route("student.index");
        //echo "from store";
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        echo "from show";
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $student = Student::findOrFail($id);
        $data['title'] = "Student edit";
        $data['student'] = $student;
        return view("student_edit", $data);
        //echo "from edit";
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validateFields($request, $id);
        $student = Student::findOrFail($id);
        $student->username = $request->username;
        $student->password = $request->password;
        $student->save();
        return redirect("/student");
        //$student->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $student = Student::find($id);
        $student->delete();
        return redirect("/student");
        //echo "from destroy";
    }

    public function validateFields($request, $id = null){
        echo $id;
        $this->validate($request, [
            "username" => "required|unique:students,username," . $id,
            "password" => "required"
        ]);
    }
}
