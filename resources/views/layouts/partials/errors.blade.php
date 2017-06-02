@if (count($errors))
		<div class="form-group">
			<div class="alert alert-danger">
				<ul>
	<!-- $error will available to all views; Empty set if no errors but will contain value if you validate and fail -->
					@foreach ($errors->all() as $error)

					<li>{{ $error }}</li>

					@endforeach

				</ul>
			</div>
		</div>
@endif