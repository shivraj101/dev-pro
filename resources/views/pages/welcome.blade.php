@extends('main')
@section('title',' | Forum')

@section('header')
<!-- Page Header -->
<!-- Set your background image for this header on the line below. -->
<header class="intro-header" style="background-image: url('images/rara1.jpg')">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                <div class="site-heading">
                    <h1>SoulSociety</h1>
                    <hr class="small">
                    <span class="subheading">A Simple Blog Theme with Bootstrap and Laravel</span>
                </div>
            </div>
        </div>
    </div>
</header>
@endsection

<!-- Main Content -->
@section('content')
<div class="row">
    <div class="col-md-8">
        @foreach($posts as $post)
        <div class="post-preview">
                <a href="{{ url('blog/'.$post->slug)}}">
                <h2 class="post-title">
                   {{ $post->title}}
                </h2>
                <h3 class="post-subtitle">{{-- for generating url we can also use route('blog.single','$post->slug')--}}
                   {{ substr($post->body, 0, 300)}}{{ strlen($post->body) > 300 ? "...":"" }}<br><br><div class="btn btn-success">Read more</div><hr>
                </h3>
                </a>
            <p class="post-meta">Posted by <a href="/" style="color:red;">soulSociety.com</a> on {{ date('M j, Y h:i a', strtotime($post->created_at)) }}</p>
        </div>
        @endforeach
        <hr>         
     </div>

     
    <div class="col-md-3 col-md-offset-1">
    <h3>sidebar</h3>
    </div>
    <hr>
       

     <!-- Pager -->
        

    
</div><!--end of row-->
<ul class="pager">
            <li class="next">
                <a href="{{ route('blog.index')}}">Older Posts &rarr;</a>
            </li>
        </ul>
@endsection
