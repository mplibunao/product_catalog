@extends ('layouts.app')


@section ('content')

	<div class="col-md-4 col-md-offset-4 nav-login">
		
		<h1>Sign In</h1>

		<form action="/login" method="POST">
			
			{{ csrf_field() }}

			<div class="form-group">
				
				<label for="email">Email Address:</label>

				<input type="text" class="form-control" name="email" id="email" required>

			</div>

			<div class="form-group">
				
				<label for="password">Password:</label>

				<input type="password" class="form-control" name="password" id="password" required>
			
			</div>

			<div class="form-group">
				
				<button type="submit" class="btn btn-primary">Login</button>

			</div>

			@include ('layouts.partials.errors')

		</form>

	</div>



@endsection