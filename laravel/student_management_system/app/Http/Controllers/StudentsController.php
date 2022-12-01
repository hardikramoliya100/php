<?php

namespace App\Http\Controllers;

use App\Models\students;
use App\Models\courses;
use Illuminate\Http\Request;

class StudentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(students $students, courses $courses)
    {
        $students = $students->get();
        $courses = $courses->get();
        return view('ShowAllStudents', compact(['students', 'courses']));
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
    public function store(Request $request, students $students)
    {
        $validated = $request->validate([
            'name' => 'required',
            'phone' => 'required',
        ]);

        $imageName = 'noimg.png';

        if ($request->img) {
            $request->validate([
                'img' => 'nullable|file|image|mimes:jpeg,png,jpg|max:5000',
            ]);

            $imageName = date('mdYHis') . uniqid() . '.' . $request->img->extension();
            request()->img->move(public_path('uplode_img'), $imageName);
        }
        $students->name = $request->name;
        $students->img = $imageName;
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
    public function update($studentsid, Request $request, students $students)
    {
        $students = $students::find($studentsid);
        if ($request->img) {
            $request->validate([
                'img' => 'nullable|file|image|mimes:jpeg,png,jpg|max:5000',
            ]);
            if ($students->img != 'noimg.png') {
                unlink(public_path('uplode_img') . "/" . $students->img);
            }
            $imageName = date('mdYHis') . uniqid() . '.' . $request->img->extension();
            request()->img->move(public_path('uplode_img'), $imageName);
        } else {
            $imageName = $students->img;
        }
        $students->name = $request->name;
        $students->img = $imageName;
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
    public function destroy($studentsid, students $students)
    {
        // dd($students->img);
        $students = $students::find($studentsid);
        if ($students->img != 'noimg.png') {
            unlink(public_path('uplode_img') . "/" . $students->img);
        }
        $students->delete();
        return redirect('students');
    }
}
