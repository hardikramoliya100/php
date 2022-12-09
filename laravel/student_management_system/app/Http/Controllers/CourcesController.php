<?php

namespace App\Http\Controllers;

use App\Models\courses;
use Illuminate\Http\Request;
 
class courcesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(courses $courses)
    {
        $courses=$courses->get();
        return view('ShowAllcourses',compact(['courses']));
    }
    
    public function showallcourse(courses $courses)
    {
        // $courses=$courses->get();
        return $courses->get();
        // return view('ShowAllcourses',compact(['courses']));
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
    public function store(Request $request,courses $courses)
    {
        $validated = $request->validate([
            'Course_Name' => 'required',
            'Teacher_name' => 'required',
            'Batch_Time' => 'required',
            'Teaching_Day' => 'required',
        ]);

        $courses->Course_Name = $request->Course_Name;
        $courses->Teacher_name = $request->Teacher_name;
        $courses->Batch_Time = $request->Batch_Time;
        $courses->Teaching_Day = $request->Teaching_Day;
        $courses->save();
        return redirect('courses');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\courses  $courses
     * @return \Illuminate\Http\Response
     */
    public function show(courses $courses)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\courses  $courses
     * @return \Illuminate\Http\Response
     */
    public function edit(courses $courses)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\courses  $courses
     * @return \Illuminate\Http\Response
     */
    public function update($courseid,Request $request, courses $courses)
    {
        $courses = $courses::find($courseid);
        // dd($courses);
        $courses->Course_Name = $request->Course_Name;
        $courses->Teacher_name = $request->Teacher_name;
        $courses->Batch_Time = $request->Batch_Time;
        $courses->Teaching_Day = $request->Teaching_Day;
        $courses->save();
        return redirect('courses');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\courses  $courses
     * @return \Illuminate\Http\Response
     */
    public function destroy($courseid,courses $courses)
    {
        $courses = $courses::find($courseid);
        $courses->delete();
        return redirect('courses');
    }
}
