@extends('main')

@section('title', ' | All posts')

@section('header')
<!-- Page Header -->
<!-- Set your background image for this header on the line below. -->
<header class="intro-header" style="background-image: url('{{asset('img/home-bg.jpg')}}')">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                <div class="site-heading">
                    <h1>ViewMyPosts</h1>
                    <hr class="small">
                    <span class="subheading">
                    	Displaying the posts that I have inserted into my blog!
                    </span>
                </div>
            </div>
        </div>
    </div>
</header>
@endsection

@section('content')
	
		<div class="row">
		 		<div class="col-md-8">
		 			<h1>All Post</h1>
		 		</div>

		 		<div class="col-md-4">
		 			<a href="{{ route('posts.create')}}" class="btn btn-lg btn-success col-xs-12">Add New Post</a>
		 		</div>
		 		<div class="col-md-12">
		 			<hr>
		 		</div>
		</div> 	{{--end of row--}}

		<div class="row">
			<div class="col-md-12">
				<table class="row">
					<tr>
						<th>S.N.</th>
						<th>Title</th>
						<th>Body</th>
						<th>Created At</th>
						<th></th>
					</tr>
					
					@foreach($posts as $post)
					<tr>			
							<td>{{ $post->id}}</td>
							<td>{{ substr($post->title, 0, 50)}}{{ strlen($post->title)>50 ? "...." : ""}}</td>
							<td>{{ substr($post->body, 0 ,50)}}{{ strlen($post->body)>50 ? "...." : ""}}</td>
							<td>{{ date('M j, Y h:i a', strtotime($post->created_at)) }}</td>
							<td>
								<a href="{{ route('posts.show',$post->id)}}" class="btn btn-default">View</a>
								{{-- &nbsp; --}}
								<a href="{{ route('posts.edit',$post->id)}}" class="btn btn-info">Edit</a>
								{{-- &nbsp; --}}
								{{-- <a href="{{ route('posts.destroy',$post->id)}}" class="btn btn-danger">Delete</a> --}}
								{!! Form::open(['method' => 'DELETE', 'route' => ['posts.destroy', $post->id]]) !!}                    
	                        	{!! Form::submit('Delete',['class' => 'btn btn-danger'])!!}	                        
	                        	{!! Form::close() !!}
                        	</td>	

					</tr>
					@endforeach
				</table>
				<div class="text-center">
					{!! $posts->links(); !!}
				</div>
			</div>
		</div>
	
@endsection