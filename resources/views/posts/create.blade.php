@extends('main')
@section('title',' | create new post')
@section('stylesheets')
    {!! Html::style('css/parsley.css') !!}
@endsection
@section('header')
<!-- Page Header -->
<!-- Set your background image for this header on the line below. -->
<header class="intro-header" style="background-image: url('{{asset('images/preview.jpg')}}')">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                <div class="site-heading">
                    <h1 style="opacity:0.9">SoulSociety</h1>
                    <hr class="small">
                    <span class="subheading">Creating a new post!!</span>
                </div>
            </div>
        </div>
    </div>
</header>
@endsection
@section('content')
<div class="row">
	<div class="col-md-8 col-md-offset-2">
		<h1>Create new post</h1>
		<hr>
        {!! Form::open(['route' => 'posts.store','data-parsley-validate'=>'']) !!}<!--['url' => 'foo/bar']-->
             {{Form::label('title','Title:')}}
             {{Form::text('title',null,array('class'=>'form-control','required'=>'','maxlength'=>'255'))}}<!--null is the default value for placeholder-->

             {{Form::label('slug','Slug:') }}
             {{Form::text('slug',null,array('class'=>'form-control','required'=>'','minlength'=>'5','maxlength'=>'255'))}}

             {{Form::label('body','Post Body:')}}
             {{Form::textarea('body',null,array('class'=>'form-control','required'=>''))}}  {{-- The name of label and the input tag must be same (in this case 'body') --}}

             {{Form::submit('Create Post',array('class'=>'btn btn-success btn-lg btn-block','style'=>'margin-top:20px; border-radius:10px;'))}} 
        {!! Form::close() !!}
	</div>
</div>
@endsection
<!--for extra script only needed for form and hidden to other pages-->
@section('scripts')
{!! Html::script('js/parsley.min.js') !!}
@endsection