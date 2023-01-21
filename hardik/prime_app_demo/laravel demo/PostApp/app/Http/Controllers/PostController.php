<?php

namespace App\Http\Controllers;

use App\Models\post;
use Illuminate\Http\Request;
use DataTables;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(post $post)
    {
        return $post->get();
    }

    public function getpost(Request $request)
    {
        if ($request->ajax()) {
            $data = post::latest()->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                    
                    $actionBtn = '<a href="editpost/'.$row->id.'" class="edit btn btn-success btn-sm">Edit</a> <button class="btn btn-danger btn-sm" onclick="deletepost('.$row->id.')" >Delete</button>';
                    return $actionBtn;
                })
                ->editColumn('created_at', function ($data){
                    
                    return date('m-d-Y', strtotime($data->created_at) );
                })
                ->rawColumns(['action'])
                ->make(true);
        }
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
    public function store(post $post,Request $request)
    {
        $delimiter = '-';
        $str=$request->title;

        $slug = strtolower(trim(preg_replace('/[\s-]+/', $delimiter, preg_replace('/[^A-Za-z0-9-]+/', $delimiter, preg_replace('/[&]/', 'and', preg_replace('/[\']/', '', iconv('UTF-8', 'ASCII//TRANSLIT', $str))))), $delimiter));
        
        
         
        $post->author = $request->author;
        $post->title = $request->title;
        $post->slug = $slug;
        $post->category = $request->category;
        $post->tag = $request->tag;
        $post->description = $request->description;
        $post->status	= $request->status;
        $data = $post->save();
        return $data;

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(post $post,$id)
    {
        $editpostdata = $post::find($id);
        
        return view('editpost',compact('editpostdata'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, post $post)
    {
        $updatepost = $post::find($request->id);
        
        $delimiter = '-';
        $str=$request->title;

        $slug = strtolower(trim(preg_replace('/[\s-]+/', $delimiter, preg_replace('/[^A-Za-z0-9-]+/', $delimiter, preg_replace('/[&]/', 'and', preg_replace('/[\']/', '', iconv('UTF-8', 'ASCII//TRANSLIT', $str))))), $delimiter));
        
        
         
        $updatepost->author = $request->author;
        $updatepost->title = $request->title;
        $updatepost->slug = $slug;
        $updatepost->category = $request->category;
        $updatepost->tag = $request->tag;
        $updatepost->description = $request->description;
        $updatepost->status	= $request->status;
        $data = $updatepost->save();
        return $data;

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(post $post,$id)
    {
       $post=$post::find($id);
       $data = $post->delete();
       return $data;
    }
}
