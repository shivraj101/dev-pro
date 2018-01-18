@extends('main')
@section('title',' | Forgot My Password?')
@section('header')
	<br><br><br>
@endsection
@section('content')
	<div class="row">
		<div class="col-md-6 col-md-offset-3">
			
			<div class="panel panel-info">
				<div class="panel-heading">
					Reset Password
				</div>
				<div class="panel-body" style="background-color: black;">
					{!! Form::open(['url'=>'password/email','method'=>'POST'])!!}{{-- we can use 'url'=>'password/email' as well || method POST isn't needed to be specified --}}
					{{ Form::label('email','Enter your email address:')}}
					{{ Form::email('email',null, ['class'=>'form-control input-lg'])}}
					{{ Form::submit('Reset My Password',['class'=>'btn btn-primary btn-lg btn-block','style'=>'margin-top:20px; border-radius:10px;'])}}
					{!! Form::close()!!}
				</div>
			</div>
		</div>
		
	</div>
@endsection