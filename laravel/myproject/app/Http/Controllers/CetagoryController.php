<?php

namespace App\Http\Controllers;

use App\Models\cetagory;
use Illuminate\Http\Request;

class CetagoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(cetagory $cetagory)
    {
        return $cetagory->get();
        dd($alldata);
        return "somthing";
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\cetagory  $cetagory
     * @return \Illuminate\Http\Response
     */
    public function show(cetagory $cetagory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\cetagory  $cetagory
     * @return \Illuminate\Http\Response
     */
    public function edit(cetagory $cetagory)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\cetagory  $cetagory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, cetagory $cetagory)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\cetagory  $cetagory
     * @return \Illuminate\Http\Response
     */
    public function destroy(cetagory $cetagory)
    {
        //
    }
}
