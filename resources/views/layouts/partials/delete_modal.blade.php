<div class="modal fade" id="delete-modal" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Delete Product</h4>
			</div>

			<div class="modal-body">
				<div class="tab-content">

					<form action="/admin/product/{{ $product->id }}/delete" method="POST">

						{{ csrf_field() }}

						<h3 class="modal-text">Are you sure you want to delete this Product?</h3>

						<div class="form-group modal-text">
					
							<label for="name">Name:</label>

							<input type="text" class="form-control" name="name" id="name" placeholder="Pencil" value="{{ $product->name }}" disabled required>

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