<div class="modal fade" id="delete-modal" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Delete Product</h4>
			</div>

			<div class="modal-body">
				<div class="tab-content">

					@if (isset($product->id))

					<form action="/admin/product/{{ $product->id }}/delete" method="POST">

					@else

					<form action="" id="delete-form" method="POST">

					@endif

						{{ csrf_field() }}

						<h3 class="modal-text">Are you sure you want to delete this Product?</h3>

						<div class="form-group modal-text">
					
							<label for="name">Name:</label>

							@if (isset($product->id))

								<input type="text" class="form-control" name="name" id="delete-name" placeholder="Pencil" value="{{ $product->name }}" disabled required>

							@else

								<input type="text" class="form-control" name="name" id="delete-name" placeholder="Pencil" disabled required>

							@endif

						</div>

						<div class="form-group">
							<button type="button" id="delete-cancel" name="delete-cancel" class="btn btn-default modal-btn">No</button>
							<button type="submit" class="modal-btn btn btn-danger pull-right">Yes</button>
						</div>

					</form>
				</div>
			</div>
		</div>
	</div>
</div>