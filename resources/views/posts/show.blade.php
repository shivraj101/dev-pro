@extends('main')

@section('title',' | View Posts')
@section('stylesheets')
<style type="text/css">
    
    .navbar{
        background-color: rgba(107,107,107,0.66) !important;
    }
    pre{
            font-family: comic sans ms;
        }
    
</style>

@endsection

@section('header')
<!-- Page Header -->
<!-- Set your background image for this header on the line below. -->
<header class="intro-header" style="background-image: url('{{asset('images/everest.jpg')}}')">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                <div class="site-heading">
                    <h1>ViewPost</h1>
                    <hr class="small">
                    <span class="subheading">Displaying a post!!</span>
                    
                </div>
            </div>
        </div>
    </div>
</header>
@endsection
@section('content')
    <div class="row">
        <div class="col-md-7">
            <h1>{{$post->title}}</h1>
            <div>
            <p class="lead"><p>{{$post->body}}</p></p>
            </div>
        </div>
        <div class="col-md-5">
            <div class="alert alert-success" >            
                <dl class="dl-horizontal" >
                    <dt>URL Slug:</dt>
                    <dd><a href="{{ url('blog/'.$post->slug) }}" >{{url('blog/'.$post->slug)}}</a></dd>
                </dl>            
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
                        {!! Html::linkRoute('posts.edit','Edit',array($post->id), array('class' => 'btn btn-primary btn-block'))!!}
                        {{--<a href="#" class="btn btn-primary btn-block">Edit</a>--}}       
                    </div>
                    <div class="col-sm-6">
                        {!! Form::open(['method' => 'DELETE', 'route' => ['posts.destroy', $post->id]]) !!}
                        
                        {!! Form::submit('Delete',['class' => 'btn btn-danger btn-block'])!!}
                        
                        {!! Form::close() !!}
                    </div>
                        
                    <div class="col-sm-12">
                        <hr>
                    <a href="{{route('posts.index')}}"><button class="btn btn-lg btn-block btn-success"><< show all posts</button></a>
                </div>
                </div>
                
            </div>
        </div>
    </div>
@endsection
