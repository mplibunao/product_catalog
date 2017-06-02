@extends ('layouts.admin')

@section ('content')

	<div class="col-sm-5 col-sm-offset-1">
		
		<h1>Add a New Product</h1>

		<form action="/admin/product/create" method="POST">
			
			{{ csrf_field() }}

			<div class="form-group">
				
				<label for="name">Name: <span style="color:red;">*</span></label>

				<input type="text" class="form-control" name="name" id="name" placeholder="Pencil" required>

			</div>

			<div class="form-group">
				
				<label for="description">Description: <span style="color:red;">*</span></label>
				
				<input type="text" class="form-control" name="description" id="description" placeholder="Used in writing or drawing" required>

			</div>

			<div class="form-group">
				
				<label for="stock">Stock:</label>
				
				<input type="number" class="form-control" name="stock" id="stock" value="0">

			</div>

			<div class="form-group">
				
				<label for="image">Image URL:</label>
				
				<input type="text" class="form-control" name="image" id="image" placeholder="http://imgur.com/gallery/Ads32d">

			</div>

			<div class="form-group">
				
				<label for="category-search">Category:</label>
				
				<input type="text" class="form-control" name="category-search" id="category-search" disabled>

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

	<script>
	
		// Autocomplete script
		var availableCategories = {!! json_encode($categories->toArray()) !!};

		var categoryArray =  availableCategories.map(function(category){
			return category.name;
		});

		$('#category-search').autocomplete({
			source: categoryArray,
			minLength: 0
		});

	</script>

	@endsection
