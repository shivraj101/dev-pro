<?php

namespace App\Http\Controllers;
use App\Post;
use Session;
use Illuminate\Http\Request;

class PostController extends Controller
{
    //calling the default constructor to lock down the postController
    public function __construct(){
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //create a variable and show all the posts from the database
        $posts=Post::orderBy('id','desc') -> paginate(10);// all()
        //return a view to show all the data by passing in the variable we created
        return view('posts.index')->withPosts($posts);


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
    public function store(Request $request)
    {
        //validating data
            $this->validate($request,array(
                    'title'=>'required|max:255',
                    'slug'=>'required|alpha_dash|min:5|max:255|unique:posts,slug',
                    'body'=>'required'
                ));
        //store data
           $post=new Post;
           $post->title = $request->title;
           $post->slug = $request->slug;
           $post->body = $request->body;
           $post->save();
        //session flash message 'put' for 120 minutes, 'flash' for next action 
           Session::flash('success','Your post has been recorded successfully!');//flash('key','vlaue')
        //redirect to the show route showing the saved post with flash message
           return redirect()->route('posts.show',$post->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post=Post::find($id);

        return view('posts.show')->with('post',$post);//with added later to be used in show.blade.php
        //shortcut ->withPost($post)
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //store the data from database into a variable
            $post = Post::find($id);
        //return the view and pass the variable
            return view('posts.edit')->withPost($post);
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
        //validation for slug
        $post = Post::find($id);
        if ($request->input('slug') == $post->slug) {
            $this->validate($request,array(
                    'title'=>'required|max:255',
                    'body'=>'required'
                ));
        }
        //validate the data
        else{
        $this->validate($request,array(
                    'title'=>'required|max:255',
                    'slug'=>'required|alpha_dash|min:5|max:255|unique:posts,slug',
                    'body'=>'required'
                ));
            }
        //save the data in the database
        $post = Post::find($id);
        $post->title = $request->input('title');//just "$post->title = $request->title;" works as well
        $post->slug = $request->input('slug');
        $post->body = $request->input('body');
        $post->save();
        //return a flash message(session)
        Session::flash('success','your post has been updated successfully!');
        //return a view posts.show with session flash message
        return redirect()->route('posts.show',$post->id);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);
        $post->delete();

        Session::flash('success','Your post has been deleted!!');
        return redirect()->route('posts.index');
    }
}
