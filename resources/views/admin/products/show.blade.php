@extends ('layouts.admin')


@section ('content')


	<div class="col-sm-8 container">
		
		<div class="panel panel-default">
			
			<div class="panel-heading clearfix">
				<h4 class="panel-title pull-left" style="padding-top:7.5px; padding-right:20px;">Product List</h4>
					<form action="/admin/product/search/" method="GET">
						<div class="input-group">
							<input type="text" class="form-control search_filter_product" id="search_filter" name="search_filter" placeholder="Search Product">
								<div class="input-group-btn">
									<button class="btn btn-default" type="submit"><i class="fa fa-search"></i></button>
								</div>
						</div>
					</form>
			</div>
				
			

			<table class="table table-bordered table-striped table-hover table-responsive">

				<thead>
					<tr>
						<th>Product Name</th>
						<th>Category</th>
						<th>Description</th>
						<th>Stock</th>
						<th>Actions</th>
					</tr>
				</thead>
				<tbody>
					@foreach ($products as $product)
						<tr>
							<td><a href="/admin/product/{{ $product->id }}/show">{{ $product['name'] }}</a></td>

								@if ($product['category_id'] != null)
									<td><a href="/admin/product?category_id={{ $product->category_id }}">{{ $product->category->name }}</a></td>
								@else
									<td>Null</td>
								@endif
							<td>{{ $product['description'] }}</td>

							<td>{{ $product['stock'] }}</td>

							<td>
								<a href="/admin/product/{{ $product['id'] }}/show" title="View"><i class="fa fa-eye"></i></a>
								<a href="/admin/product/{{ $product['id'] }}/edit" title="Edit"><i class="fa fa-edit"></i></a>
								<a href="/admin/product/{{ $product['id'] }}/assign_category" title="Assign Category"><i class="fa fa-tags"></i></a>
								<a href="/admin/product/{{ $product['id'] }}/delete" title="Delete"><i class="fa fa-trash-o"></i></a>

							</td>
						</tr>
					@endforeach

				</tbody>

			</table>

			<div class="text-center">
				<nav class="pagination" aria-label="Page navigation">
				  <ul class="pagination">
				    {!! $products->links() !!}
				  </ul>
				</nav>
			</div>
			

		</div>

	</div>

<script>

  // Category Autocomplete
  var availableProducts = {!! json_encode($allProducts->toArray()) !!};

  var productArray = availableProducts.map(product=>{
    return product.name;
  });

  $('.search_filter_product').autocomplete({
    source: productArray,
    minLength: 0
  });
  
</script>

@endsection ('content')