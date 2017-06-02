@extends ('layouts.admin')

@section ('content')

	@include ('layouts.partials.delete_modal')

	<div class="col-sm-5 col-sm-offset-1">
		
		<h1><i class="fa fa-edit"></i> Edit {{ $product->name }}</h1>

		<form action="/admin/product/{{ $product->id }}/edit" method="POST">
			
			{{ csrf_field() }}

			<div class="form-group">
				
				<label for="name">Name: <span style="color:red;">*</span></label>

				<input type="text" class="form-control" name="name" id="name" placeholder="Pencil" value="{{ $product->name }}" required>

			</div>

			<div class="form-group">
				
				<label for="description">Description: <span style="color:red;">*</span></label>
				
				<input type="text" class="form-control" name="description" id="description" placeholder="Used in writing or drawing" value=" {{ $product->description }}" required>

			</div>

			<div class="form-group">
				
				<label for="stock">Stock:</label>
				
				<input type="number" class="form-control" name="stock" id="stock" value="{{ $product->stock }}">

			</div>

			<div class="form-group">
				
				<label for="image">Image URL:</label>
				
				<input type="text" class="form-control" name="image" id="image" placeholder="http://imgur.com/gallery/Ads32d" value="{{ $product->image }}">

			</div>

			<div class="form-group">
				
				<label for="category-search">Category:</label>
				<div class="input-group">
					@if ($product->category_id == NULL)
						<input type="text" class="form-control" name="category-search" id="category-search" value="{{ $product->category_id }}" disabled>
					@else
						<input type="text" class="form-control" name="category-search" id="category-search" value="{{ $product->category->name }}" disabled>
					@endif
					<span class="input-group-btn">
						<a href="/admin/product/{{ $product->id }}/assign_category"><button class="btn btn-info" type="button">View Categories</button></a>
					</span>
				</div>

			</div>

			<div class="form-group">
				
				<span class="text-muted"><span style="color:red;">*</span> Indicates required field</span>

			</div>


			<div class="form-group">
				
				<button type="submit" class="btn btn-primary">Save Product</button>

				<button type="button" id="delete" name="delete" class="btn btn-danger pull-right">Delete</button>

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

		// Delete Modal
		var $delete = $('#delete');
		var $deleteCancel = $('#delete-cancel');
		var $deleteModal = $('#delete-modal');

		$delete.on('click', ()=>{
			$deleteModal.modal('show');
		});

		$deleteCancel.on('click', ()=>{
			$deleteModal.modal('hide');
		});

	</script>

	@endsection
