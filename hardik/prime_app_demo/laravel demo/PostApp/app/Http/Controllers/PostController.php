<?php
// require 'vendor/autoload.php';

namespace App\Http\Controllers;

use App\Models\post;
use Illuminate\Http\Request;
use DataTables;
use Illuminate\Support\Facades\DB;

// use PhpOffice\PhpSpreadsheet\Spreadsheet;
// use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

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
                ->addColumn('action', function ($row) {

                    $actionBtn = '<a href="editpost/' . $row->id . '" class="edit btn btn-success btn-sm">Edit</a> <button class="btn btn-danger btn-sm" onclick="deletepost(' . $row->id . ')" >Delete</button>';
                    return $actionBtn;
                })
                ->editColumn('created_at', function ($data) {

                    return date('m-d-Y', strtotime($data->created_at));
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
    public function store(post $post, Request $request)
    {
        $delimiter = '-';
        $str = $request->title;

        $slug = strtolower(trim(preg_replace('/[\s-]+/', $delimiter, preg_replace('/[^A-Za-z0-9-]+/', $delimiter, preg_replace('/[&]/', 'and', preg_replace('/[\']/', '', iconv('UTF-8', 'ASCII//TRANSLIT', $str))))), $delimiter));



        $post->author = $request->author;
        $post->title = $request->title;
        $post->slug = $slug;
        $post->category = $request->category;
        $post->tag = $request->tag;
        $post->description = $request->description;
        $post->status    = $request->status;
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
    public function edit(post $post, $id)
    {
        $editpostdata = $post::find($id);

        return view('editpost', compact('editpostdata'));
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
        $str = $request->title;

        $slug = strtolower(trim(preg_replace('/[\s-]+/', $delimiter, preg_replace('/[^A-Za-z0-9-]+/', $delimiter, preg_replace('/[&]/', 'and', preg_replace('/[\']/', '', iconv('UTF-8', 'ASCII//TRANSLIT', $str))))), $delimiter));



        $updatepost->author = $request->author;
        $updatepost->title = $request->title;
        $updatepost->slug = $slug;
        $updatepost->category = $request->category;
        $updatepost->tag = $request->tag;
        $updatepost->description = $request->description;
        $updatepost->status    = $request->status;
        $data = $updatepost->save();
        return $data;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(post $post, $id)
    {
        $post = $post::find($id);
        $data = $post->delete();
        return $data;
    }

    // public function exportf()
    // {

    //     //    echo "hello";
    //     $spreadsheet = new Spreadsheet();
    //     $sheet = $spreadsheet->getActiveSheet();
    //     $sheet->setCellValue('A1', 'Hello World !');

    //     $writer = new Xlsx($spreadsheet);
    //     return $writer->save('hello world.xlsx');
    // }

    public function exportdata(post $post)
    {

        $export = $post->get();
        // dd($export);

        $delimiter = ",";
        $filename = "members-data_" . date('Y-m-d') . ".csv";

        // Create a file pointer 
        ob_end_clean();
        $f = fopen('php://memory', 'w');

        // Set column headers 
        $fields = array('ID', 'author', 'title', 'slug', 'tag', 'category', 'description', 'status', 'created_at');
        fputcsv($f, $fields, $delimiter);

        // Output each row of the data, format line as csv and write to file pointer 
        foreach ($export as $row) {
            # code...
            // }
            // while ($row = $export->fetch_assoc()) {
            $lineData = array($row['id'], $row['author'], $row['title'], $row['slug'], $row['tag'], $row['category'], $row['description'], $row['status'], $row['created_at']);
            fputcsv($f, $lineData, $delimiter);
        }

        // Move back to beginning of file 
        fseek($f, 0);

        // Set headers to download file rather than displayed 
        header('Content-Type: text/csv');
        header('Content-Disposition: attachment; filename="' . $filename . '";');

        //output all remaining data on a file pointer 
        fpassthru($f);
        exit;
    }

    public function importdata(post $post, Request $request)
    {

        $csvMimes = array('text/x-comma-separated-values', 'text/comma-separated-values', 'application/octet-stream', 'application/vnd.ms-excel', 'application/x-csv', 'text/x-csv', 'text/csv', 'application/csv', 'application/excel', 'application/vnd.msexcel', 'text/plain');

        // Validate whether selected file is a CSV file
        if (!empty($request->file) && in_array($request->file->getClientMimeType(), $csvMimes)) {

            // If the file is uploaded
            if (is_uploaded_file($request->file)) {

                // Open uploaded CSV file with read-only mode
                $csvFile = fopen($request->file, 'r');

                // Skip the first line
                fgetcsv($csvFile);

                // Parse data from CSV file line by line
                while (($line = fgetcsv($csvFile)) !== FALSE) {

                    $author  = $line[0];
                    $title  = $line[1];
                    $slug = $line[2];
                    $category = $line[3];
                    $description = $line[4];
                    $status = $line[5];
                    $tag = $line[6];



                    // $this->query($query);
                    // $post->author = $author;
                    // $post->title = $title;
                    // $post->slug = $slug;
                    // $post->category = $category;
                    // $post->tag = $tag;
                    // $post->description = $description;
                    // $post->status  = $status;
                    // $post->save();
                    // dd($data);
                    DB::table('posts')->insert(
                        array(

                            'author' => $author,
                            'title' => $title,
                            'slug' => $slug,
                            'tag' => $tag,
                            'category' => $category,
                            'description' => $description,
                            'status' => $status,

                        )
                    );
                }

                fclose($csvFile);
            } else {
                $messege = "no_file";
                return redirect("post?messege=" . $messege . "");
            }
        } else {

            $messege = "no_csv";
            return redirect("post?messege=" . $messege . "");
        }

        $messege = "uploded";

        return redirect("post?messege=" . $messege . "");
    }
}
