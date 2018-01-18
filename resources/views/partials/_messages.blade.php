@if(Session::has('success'))
	<div class="alert alert-success">
		<b>Success:</b> {{Session::get('success')}}
	</div>
@endif

@if(count($errors)>0)<!--$errors is default object for storing errors-->
	<div class="alert alert-danger" role="alert">
		<b>Errors:</b> 
		<ul>
			@foreach($errors->all() as $error)
				<li>{{$error}}</li>
			@endforeach
		</ul>
	</div>
@endif