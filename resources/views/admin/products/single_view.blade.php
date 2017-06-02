@extends ('layouts.admin')

@section ('content')

	@include ('layouts.partials.delete_modal')

	<div class="col-sm-5 col-sm-offset-1">
		
		<h1>View {{ $product->name }}</h1>

		<form action="/admin/product/{{ $product->id }}/edit" method="GET">
			
			{{ csrf_field() }}

			<div class="form-group">
				
				<label for="name">Name:</label>

				<input type="text" class="form-control" name="name" id="name" placeholder="Pencil" value="{{ $product->name }}" disabled required>

			</div>

			<div class="form-group">
				
				<label for="description">Description:</label>
				
				<input type="text" class="form-control" name="description" id="description" placeholder="Used in writing or drawing" value=" {{ $product->description }}" disabled required>

			</div>

			<div class="form-group">
				
				<label for="stock">Stock:</label>
				
				<input type="text" class="form-control" name="stock" id="stock" value="{{ $product->stock }}" disabled>

			</div>

			<div class="form-group">
				
				<label for="image">Image URL:</label>
				
				<input type="text" class="form-control" name="image" id="image" placeholder="http://imgur.com/gallery/Ads32d" value="{{ $product->image }}" disabled>

			</div>

			<div class="form-group">
				
				<label for="category-search">Category:</label>

				@if ($product->category_id == NULL)
					<input type="text" class="form-control" name="category-search" id="category-search" value="{{ $product->category_id }}" disabled>
				@else
					<input type="text" class="form-control" name="category-search" id="category-search" value="{{ $product->category->name }}" disabled>
				@endif

			</div>

			<div class="form-group">
				
				<button type="submit" class="btn btn-primary">Edit Product Details</button>

				<button type="button" id="delete" name="delete" class="btn btn-danger pull-right">Delete</button>

			</div>

				@include ('layouts.partials.errors')

		</form>

	</div>

	<script>

		// JS script for delete modal
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
