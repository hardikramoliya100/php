<?php

namespace App\Http\Controllers;

use App\Models\product;
use Illuminate\Http\Request;
use App\DataTables\UsersDataTable;
use App\DataTables\productDataTable;

use PDF;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function index(product $product)
    // {
    //     // dd($product->get());
    //     $productdata = $product->get();
    //     return view('showallproduct',compact(['productdata']));
    // }

    public function index(productDataTable $dataTable,product $product)
    {
        return $dataTable->render('users.index');
    }

    public function generatepdf() {
        // dd('called');
        $data = [
            'title' => 'Welcome to ItSolutionStuff.com',
            'date' => date('m/d/Y')
        ];
          
        $pdf = PDF::loadView('myPDF', $data);
    
        return $pdf->download('costom.pdf');
      }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // dd("test");
        $catagoriesdata = ['something'];
        return view('addproduct',compact(['catagoriesdata']));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,product $product)
    {
        // dd($request->all());
        // $product->title = $request->title;
        // $product->discription = $request->discription;
        // $product->price = $request->price;
        $data=$request->except(['_token','btn-save']);
        foreach ($data as $key => $value) {
            $product->$key = $value;
        }
        $product->save();
        return redirect("allproduct");

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\product  $product
     * @return \Illuminate\Http\Response
     */
    public function datatable(UsersDataTable $dataTable,product $product)
    {
        return $dataTable->render('users');
    }

    public function show(product $product)
    {
        //
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit($prodid,product $product)
    {
        $productdata=$product::find($prodid);
        // dd($product);
        return view('editproduct',compact(['productdata']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\product  $product
     * @return \Illuminate\Http\Response
     */
    public function update($prodid,Request $request, product $product)
    {
        // dd($request->all());
        $productdata=$product::find($prodid);
        $data=$request->except(['_token','btn-save']);
        foreach ($data as $key => $value) {
            $productdata->$key = $value;
        }
        $productdata->save();
        return redirect("allproduct");

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($prodid,product $product)
    {
        // dd($prodid);
        // $res=$product::where('id',$prodid)->delete();
        $product=$product::find($prodid);
        $product->delete(); //returns true/false
        return redirect("allproduct");

    }
}