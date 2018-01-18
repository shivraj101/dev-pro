@extends('main')
@section('title',' | Edit Post')
@section('header')
<!-- Page Header -->
<!-- Set your background image for this header on the line below. -->
<header class="intro-header" style="background-image: url('{{asset('images/berry.jpg')}}')">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                <div class="site-heading">
                    <h1>EditMyPost</h1>
                    <hr class="small">
                    <p class="subheading" style="text-shadow: 2px 2px 2px black;">
                    	Edit my post data!
                    </p>
                </div>
            </div>
        </div>
    </div>
</header>
@endsection
@section('content')

	<div class="row">{!! Form::model($post, ['route' => ['posts.update',$post->id], 'method' => 'PUT'] )!!}

        <div class="col-md-8">
            {{ Form::label('title','Title:')}}
            {{ Form::text('title',null, ["class"=>'form-control input-lg']) }}
            
            {{ Form::label('slug','Slug:', ['class' => 'form-spacing-top'])}}
            {{ Form::text('slug',null,["class"=>'form-control'])}}

            {{ Form::label('body','Post Body:', ['class' => 'form-spacing-top'])}}
            {{ Form::textarea('body',null, ["class"=>'form-control'])}}
            
        </div>
        <div class="col-md-4">
            <div class="well alert alert-danger">
                <dl class="dl-horizontal">
                    <dt>Created at:</dt>
                    <dd>{{ date('M j, Y h:i a', strtotime($post->created_at)) }}</dd>
                </dl>
                <dl class="dl-horizontal">
                    <dt>Updated at:</dt>
                    <dd>{{ date('M j, Y h:i a', strtotime($post->updated_at)) }}</dd>
                </dl>
                <hr>
                <div class="row">
                    <div class="col-sm-6">
                        {!! Html::linkRoute('posts.show','Cancel',array($post->id), array('class' => 'btn btn-danger btn-block'))!!}
                        {{--<a href="#" class="btn btn-primary btn-block">Cancel</a>--}}       
                    </div>
                    <div class="col-sm-6">
                    
                        {{ Form::submit('Save',['class' => 'btn btn-primary btn-block'])}}
                    
                    </div>
                </div>
            </div>
        </div>
        {!! Form::close()!!}
    </div>{{-- end of row --}}
@endsection