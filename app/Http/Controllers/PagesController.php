<?php

namespace App\Http\Controllers;
use App\Post;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function getIndex(){
        $posts= Post::orderBy('created_at','desc')->limit(4)->get();//Post::select(*) is default if not used in the query build
    	return view('pages.welcome')->withPosts($posts);
    }
    public function getAbout(){
    	$first='Shivraj';
    	$last='Pandey';
    	$full=$first . " ".$last;
    	$email='shivraj.sp101@gmail.com';
    	$data=[];
    	$data['email']=$email;
    	$data['full']=$full;
    	 return view('pages.about')->withData($data);//withFullname($full)->withEmail($email);
    	 //with->("fullname",$full)->with("email",$email)
    }
    public function getContact(){
    	return view('pages.contact');
    }
    public function getSingle(){
        $post= Post::find(1);
        return view('pages.single')->withPost($post);
    }

}
