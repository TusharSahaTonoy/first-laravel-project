<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
//for using query directly
use DB;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth',['except'=>['index','show']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $flights = App\Flight::where('active', 1)
        //        ->orderBy('name', 'desc')
        //        ->take(10)
        //        ->get();

        //$posts = Post::all();
        //$posts = Post::orderby('title','asc')->get();
        //$posts = Post::orderby('title','asc')->take(1)->get();
        $posts = Post::orderby('created_at','desc')->paginate(10);
        //$posts = DB::select('SELECT * FROM posts');
        // $id = auth()->user()->id;
        // $user = User::find($id);
        // return view('posts.indexPost')->with('posts',$user->posts);
        return view('posts.indexPost')->with('posts',$posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.createPost');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'title' => 'required',
            'body'  => 'required'
        ]);

        //create post
        $post = new Post();
        $post->title    = $request->input('title');
        $post->body     = $request->input('body');
        $post->userId   = auth()->user()->id;
        $post->save();

        return redirect('/posts')->with('success','Post is created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);
        //$post = Post::where('title','Post Two')->get();
        return view('posts.showPost')->with('post',$post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id);

        if(auth()->user()->id!=$post->user_id)
            return redirect('/posts')->with('error','You Are Unauthorized');

        return view('posts.editPost')->with('post',$post);
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
        $this->validate($request,[
            'title' => 'required',
            'body'  => 'required'
        ]);

        //create post
        $post =Post::find($id);
        
        if(auth()->user()->id!=$post->user_id)
            return redirect('/posts')->with('error','You Are Unauthorized');

        $post->title = $request->input('title');
        $post->body  = $request->input('body');
        $post->save();

        return redirect('/dashboard')->with('success','Post is Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post =Post::find($id);
        if(auth()->user()->id!=$post->user_id)
            return redirect('/posts')->with('error','You Are Unauthorized');
        $post->delete();
        return redirect('/dashboard')->with('success','Post is Delected');
    }
}
