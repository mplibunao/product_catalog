@extends ('layouts.app')

@section ('content')

	<div class="col-sm-4 col-md-offset-4">
		
		<h1>Register</h1>

		<form action="/register" method="POST">

			{{ csrf_field() }}

			<div class="form-group">
				
				<label for="name">Name:</label>

				<input type="text" class="form-control" name="name" id="name" required>

			</div>

			<div class="form-group">
				
				<label for="email">Email:</label>
				
				<input type="email" class="form-control" name="email" id="email" required>

			</div>

			<div class="form-group">

				<label for="permissionsRadio">Role:</label>

				<div class="radio">

					<label>
						<input type="radio" id="permissionsRadio1" name="permissions" value="admin" checked>
						Admin
					</label>

				</div>

				<div class="radio">

					<label>
						<input type="radio" id="permissionsRadio2" name="permissions" value="user">
						User
					</label>

				</div>

			</div>

			<div class="form-group">
				
				<label for="password">Password:</label>

				<input type="password" class="form-control" name="password" id="password" required>

			</div>

			<div class="form-group">
				
				<label for="password_confirmation">Password Confirmation:</label>

				<input type="password" class="form-control" name="password_confirmation" id="password_confirmation" required>

			</div>

			<div class="form-group">
				
				<button type="submit" class="btn btn-primary">Register</button>

			</div>

			
				@include ('layouts.partials.errors')

			
			
		</form>

	</div>

@endsection