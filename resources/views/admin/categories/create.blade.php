@extends ('layouts.admin')

@section ('content')

	<div class="col-sm-5 col-sm-offset-1">
		
		<h1>Create a Product Category</h1>

		<form action="/admin/category/create" method="POST">

			{{ csrf_field() }}

			<div class="form-group">
				
				<label for="name">Name: <span style="color:red;">*</span></label>

				<input type="text" class="form-control" name="name" id="name" placeholder="Office Supplies" required>

			</div>

			<div class="form-group">
				
				<label for="description">Description: <span style="color:red;">*</span></label>
				
				<input type="text" class="form-control" name="description" id="description" placeholder="Materials used in offices" required>

			</div>

			<div class="form-group">
				
				<label for="image">Image URL:</label>
				
				<input type="text" class="form-control" name="image" id="image" placeholder="http://imgur.com/gallery/Ads32d">

			</div>

			<div class="form-group">
				
				<span class="text-muted"><span style="color:red;">*</span> Indicates required field</span>

			</div>

			<div class="form-group">
				
				<button type="submit" class="btn btn-primary">Submit</button>

			</div>

				@include ('layouts.partials.errors')

			
			
		</form>

	</div>

@endsection