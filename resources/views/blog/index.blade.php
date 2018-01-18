@extends('main')
@section('title',' | All Posts')

@section('header')
<!-- Page Header -->
<!-- Set your background image for this header on the line below. -->
<header class="intro-header" style="background-image: url('{{ asset('images/autumn.jpg') }}')">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                <div class="page-heading">
                    <h1>All My Posts</h1>
                    <hr class="small">
                    <span class="subheading">This is what I have done.</span>
                </div>
            </div>
        </div>
    </div>
</header>
@endsection
@section('content')
	<div class="row">
        <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
           	@foreach($posts as $post)
            <h2>{{ $post->title}}</h2>
			
			<h5>Published Date: {{date('M j , Y' , strtotime($post->created_at)) }}</h5>

            <p>{{ substr($post->body, 0, 500)}}{{ strlen($post->body)>500 ? "....":""}}</p>

            <a href="{{ route('blog.single',$post->slug)}}" class="btn btn-info">Read more</a>
            <hr>
            @endforeach
        </div>
        

        <div class="text-center col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
			{!! $posts->links(); !!}
		</div>
		
    </div>
@endsection