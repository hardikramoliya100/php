<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use DataTables;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
        $this->middleware('permission:post-list|post-create|post-edit|post-delete', ['only' => ['index', 'show']]);
        $this->middleware('permission:post-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:post-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:post-delete', ['only' => ['destroy']]);
    }

    public function index()
    {
        // $posts = Post::all();
        $id = Auth::user()->id;
        // dd(Auth::user()->can('post-edit'));                                                                               
        $posts =  DB::table('posts')
            ->select('posts.*','users.name')
            ->join('users', 'posts.user_id', '=', 'users.id')
            ->latest('posts.created_at')->paginate(5);
            // dd($posts);
            // $newdate = $posts->created_at->format('d/m/Y');
        return view('posts.index', compact('posts','id'))
        ->with('i', (request()->input('page', 1) - 1) * 5);
    }
    public function getpost(Request $request)
    {
        $id = Auth::user()->id;


        if ($request->ajax()) {
            // $data = post::latest()->get();
            
            $posts =  DB::table('posts')
            ->select('posts.*','users.name')
            ->join('users', 'posts.user_id', '=', 'users.id')
            ->latest('posts.created_at')->get();

            return Datatables::of($posts)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {

                    $actionBtn = '<a class="btn btn-info btn-sm" href="posts/' . $row->id . '">Show</a>  ';
                    
                    // For edit
                    if (Auth::user()->id == $row->user_id) {
                        $actionBtn .= '<a href="posts/' . $row->id . '/edit" class="edit btn btn-success btn-sm">Edit</a>';
                    }else{

                        if(Auth::user()->can('post-edit')){
                            $actionBtn .= '<a href="posts/' . $row->id . '/edit" class="edit btn btn-success btn-sm">Edit</a>';
                        }
                    }
                    // For delete
                    if (Auth::user()->id == $row->user_id) {
                        $actionBtn.= ' <button class="btn btn-danger btn-sm" onclick="deletepost(' . $row->id . ')" >Delete</button>';
                    }else{

                        if(Auth::user()->can('post-delete')){
                            $actionBtn.= ' <button class="btn btn-danger btn-sm" onclick="deletepost(' . $row->id . ')" >Delete</button>';
                        }
                    }

                    return $actionBtn;
                })
                ->editColumn('created_at', function ($posts) {

                    return date('m-d-Y', strtotime($posts->created_at));
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
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Post $post)
    {
        request()->validate([
            'title' => 'required',
            'category' => 'required',
            'tag' => 'required',
            'description' => 'required',
            // 'radio' => 'required'
        ]);

        $id = Auth::user()->id;
        // dd($id);

        $delimiter = '-';
        $str = $request->title;

        $slug = strtolower(trim(preg_replace('/[\s-]+/', $delimiter, preg_replace('/[^A-Za-z0-9-]+/', $delimiter, preg_replace('/[&]/', 'and', preg_replace('/[\']/', '', iconv('UTF-8', 'ASCII//TRANSLIT', $str))))), $delimiter));

        $post->user_id = $id;
        $post->title = $request->title;
        $post->slug = $slug;
        $post->category = $request->category;
        $post->tag = $request->tag;
        $post->description = $request->description;
        $post->status    = $request->status;

        $data = $post->save();


        return redirect()->route('posts.index')
            ->with('success', 'Posts created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $Post
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // $post = Post::find($id);
        // $post_auther = DB::table("users")
        // ->select('name')
        // ->where('id' , '=' , $post->user_id)
        // ->get();

        $post =  DB::table('posts')
            ->select('posts.*','users.name')
            ->join('users', 'posts.user_id', '=', 'users.id')
            ->where('posts.id',$id)
            ->get();

        // dd($post);
        
        return view('posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $Post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        // dd($post);
        // dd($post->id);
        return view('posts.edit',compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $Post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        request()->validate([
            'title' => 'required',
            'category' => 'required',
            'tag' => 'required',
            'description' => 'required',
        ]);
        
        $post = Post::find($id);

        $delimiter = '-';
        $str = $request->title;

        $slug = strtolower(trim(preg_replace('/[\s-]+/', $delimiter, preg_replace('/[^A-Za-z0-9-]+/', $delimiter, preg_replace('/[&]/', 'and', preg_replace('/[\']/', '', iconv('UTF-8', 'ASCII//TRANSLIT', $str))))), $delimiter));

        
        $post->title = $request->title;
        $post->slug = $slug;
        $post->category = $request->category;
        $post->tag = $request->tag;
        $post->description = $request->description;
        $post->status = $request->status;

        $data = $post->save();

        return redirect()->route('posts.index')
            ->with('success', 'Post updated successfully');
        // dd($post->title);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $Post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post,$id)
    {
        $post = $post->find($id);
        $data = $post->delete();
        return $data;
        // return redirect()->route('posts.index')
        //     ->with('success', 'post deleted successfully');
    }
}
