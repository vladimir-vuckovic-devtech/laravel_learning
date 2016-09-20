<?php

namespace App\Http\Controllers;

use App\DatabaseLogger\UniLogger;
use App\DBLogger;
use App\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;

class StudentController extends Controller
{

    /**
     * @var Student
     */
    private $student;
    public $unilog;

    public function __construct(Student $student, UniLogger $unilog)
    {
        $this->unilog = $unilog;
        $this->student = $student;
    }

    /**
     * Display a listing of the resource.
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function index()
    {
        $this->unilog->logIntoDB("Index method called from StudentController");

        if(!Schema::hasTable("students")) {
            throw new \Exception("Table does not exists in the database.");
        }

        $students = $this->student->all();
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
        $this->unilog->logIntoDB("Create method called from StudentController");
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
        $this->unilog->logIntoDB("Store method called from StudentController");
        $this->validateFields($request);
        $this->student->create($request->toArray());
        return redirect()->route("student.index");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $this->unilog->logIntoDB("Show method called from StudentController");
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
        $this->unilog->logIntoDB("Edit method called from StudentController");
        $student = $this->student->findOrFail($id);
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
        $this->unilog->logIntoDB("Update method called from StudentController");
        $this->validateFields($request, $id);
        $student = $this->student->findOrFail($id);
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
        $this->unilog->logIntoDB("Destroy method called from StudentController");
        //dd($id);
        $student = $this->student->find($id);
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
