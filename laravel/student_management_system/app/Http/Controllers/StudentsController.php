<?php

namespace App\Http\Controllers;

use App\Models\students;
use Illuminate\Http\Request;

class StudentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(students $students)
    {
        $students=$students->get();
        return view('ShowAllStudents',compact(['students']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,students $students)
    {
        $students->name = $request->name;
        $students->phone = $request->phone;
        $students->course_id = $request->course_id;
        $students->save();
        return redirect('students');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\students  $students
     * @return \Illuminate\Http\Response
     */
    public function show(students $students)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\students  $students
     * @return \Illuminate\Http\Response
     */
    public function edit(students $students)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\students  $students
     * @return \Illuminate\Http\Response
     */
    public function update($studentsid,Request $request, students $students)
    {
        $students=$students::find($studentsid);
        $students->name = $request->name;
        $students->phone = $request->phone;
        $students->course_id = $request->course_id;
        $students->save();
        return redirect('students');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\students  $students
     * @return \Illuminate\Http\Response
     */
    public function destroy($studentsid,students $students)
    {
        // dd($studentsid);
        $students=$students::find($studentsid);
        $students->delete();
        return redirect('students');
       
    }
}
