@extends ('layouts.admin')


@section ('content')

	<div class="col-sm-8 container">
		
		<div class="panel panel-default">
			
			<div class="panel-heading clearfix">
				<h4 class="panel-title pull-left" style="padding-top:7.5px; padding-right:20px;">Assign Category to {{ $product->name }}</h4>
				<form action="/admin/product/{{ $product->id }}/assign_category/search" method="GET">
					<div class="input-group">
						<input type="text" class="form-control" id="search_filter" name="search_filter"placeholder="Search Product">
							<div class="input-group-btn">
								<button class="btn btn-default" type="submit"><i class="fa fa-search"></i></button>
							</div>
					</div>
				</form>
			</div>
			<div class="panel-body">
				<div class="form-group">
					<label for="name">Current Category:</label>

					@if ( $product->category_id == NULL)

						<input type="text" class="form-control" name="category" id="category" value="N/A" disabled>
					
					@else

						<input type="text" class="form-control" name="category" id="category" value="{{ $product->category->name }}" disabled>

					@endif

				</div>
			</div>

			<table class="table table-bordered table-striped table-hover table-responsive">

				<thead>
					<tr>
						<th></th>
						<th>Category Name</th>
						<th>Description</th>
						<th>Actions</th>
					</tr>
				</thead>
				<tbody>
					@foreach ($categories as $category)
						<tr>
							<td class="radio">
								

									<label>
										<input type="radio" id="permissionsRadio{{ $category->id }}" name="category" value="{{ $category->id }}">
									</label>

								
							</td>
							<td>{{ $category['name'] }}</td>

							<td>{{ $category['description'] }}</td>

							<td>
								<a href="/admin/product/{{ $product['id'] }}/assign_category" title="Assign Category"><i class="fa fa-tags"></i></a>
							</td>
						</tr>
					@endforeach

				</tbody>

			</table>
				
			
			

		</div>

	</div>


@endsection ('content')