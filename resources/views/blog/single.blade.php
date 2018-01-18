@extends('main')
@section('title'," | $post->title"){{--  " " in php to add variables--}}
{{-- no header section extended for user viewing the posts--}}
@section('stylesheets')
	<style type="text/css">
		pre{
			font-family: comic sans ms;
		}
        
	</style>
@endsection
@section('header')
<!-- Page Header -->
<!-- Set your background image for this header on the line below. -->
<header class="intro-header" style="background-image: url('{{asset('images/highway.jpg')}}')">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                <div class="page-heading">
                    <h1>SoulSociety</h1>
                    <hr class="small">
                    <span class="subheading">Content of the post.</span>
                </div>
            </div>
        </div>
    </div>
</header>
@endsection
@section('content')
    <div class="row">
        <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
           	<h1>{{ $post->title}}</h1>
            

            <p>{{ $post->body}}</p>
        </div>

        
    </div>
@endsection