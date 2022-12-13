<?php

namespace App\Http\Controllers;

use App\Models\students;

use App\Models\mark;
use Illuminate\Http\Request;

class MarkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(mark $mark ,students $students)
    {
        $students = $students->get();
        $mark = $mark->get();
        return view('ShowAllMark', compact(['students', 'mark']));
    }
    
    public function showallmark(mark $mark ,students $students)
    {
        $students = $students->get();
        $mark = $mark->get();
        $markStudent=array();
        foreach ($mark as $m) {
            $markStudent[]= [
                'id'=>$m->id,
                'name'=> $m->mystudent[0]->name,
                'physics'=>$m->physics,
                'maths'=>$m->maths,
                'chemisty'=>$m->chemisty,
            ];
        }
        // dd($markStudent);
        // $markStudent=[$students->get(),$mark->get()];
        return $markStudent;
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
    public function store(Request $request,mark $mark)
    {
        $mark->physics = $request->physics;
        $mark->maths = $request->maths;
        $mark->chemisty = $request->chemisty;
        $mark->student_id = $request->student_id;
        $data=$mark->save();
        return $data;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\mark  $mark
     * @return \Illuminate\Http\Response
     */
    public function show(mark $mark)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\mark  $mark
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request,mark $mark)
    {
        // dd("called edit");
        //  $markid = $mark::find($request->id);
        // dd($markid);
        return $mark::find($request->id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\mark  $mark
     * @return \Illuminate\Http\Response
     */
    public function update($markid,Request $request, mark $mark)
    {
        $mark = $mark::find($markid);
        $mark->physics = $request->physics;
        $mark->maths = $request->maths;
        $mark->chemisty = $request->chemisty;
        $mark->student_id = $request->student_id;
        $data =$mark->save();
        return $data;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\mark  $mark
     * @return \Illuminate\Http\Response
     */
    public function destroy(mark $mark,$markid)
    {
        $mark = $mark::find($markid);
        $data=$mark->delete();
        return $data;
    }
}
