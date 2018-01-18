@extends('main')

@section('title',' | Registration Form')

@section('header')
<!-- Page Header -->
<!-- Set your background image for this header on the line below. -->
<header class="intro-header" style="background-image: url('{{asset('images/port.jpg')}}')">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                <div class="site-heading">
                    <h1>Registration Page</h1>
                    <hr class="small">
                    <span class="subheading">Are you a new user!!</span>
                    
                </div>
            </div>
        </div>
    </div>
</header>
@endsection

@section('content')
	<div class="row">
		<div class="col-md-6 col-md-offset-3">
			{!! Form::open() !!}

				{{ Form::label('name','Name:')}}
				{{ Form::text('name', null, ['class'=>'form-control input-lg']) }}

				{{ Form::label('email','Email address:')}}
				{{ Form::email('email', null, ['class'=>'form-control input-lg']) }}

				{{ Form::label('password','Password:')}}
				{{ Form::password('password', ['class' => 'form-control input-lg'])}} {{-- doesen't need second paramater(null)				
 --}}			
				{{ Form::label('password_confirmation','Confirm Password:')}}
				{{ Form::password('password_confirmation',['class' => 'form-control input-lg'])}}

				{{Form::submit('Register',array('class'=>'btn btn-primary btn-lg btn-block','style'=>'margin-top:20px; border-radius:10px;'))}}
			{!! Form::close() !!}
		</div>
	</div>
@endsection