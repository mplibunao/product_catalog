@extends ('layouts.admin')


@section ('content')

	<div class="col-sm-8 container">
		
		<div class="panel panel-default">
			
			<div class="panel-heading clearfix">
				<h4 class="panel-title pull-left" style="padding-top:7.5px; padding-right:20px;"><i class="fa fa-tags"></i> View All Categories</h4>
				<form action="/admin/category/search" method="GET">
					{{ csrf_field() }}
					<div class="input-group">
						<input type="text" class="form-control search_filter_category" id="search_filter" name="search_filter"placeholder="Search Product">
							<div class="input-group-btn">
								<button class="btn btn-default" type="submit"><i class="fa fa-search"></i></button>
							</div>
					</div>
				</form>
			</div>


			<div class="panel-body">
				<div class="form-group"> 

					<button type="submit" class="btn btn-primary pull-right">Add New Category</button>

				</div>
			</div>

			<table class="table table-bordered table-striped table-hover table-responsive">

				<thead>
					<tr>
						<th>Category Name</th>
						<th>Description</th>
						<th>Product Count</th>
						<th>Actions</th>
					</tr>
				</thead>
				<tbody>

					@foreach ($categories as $category)
						<tr>
							<td>{{ $category['name'] }}</td>

							<td>{{ $category['description'] }}</td>

							<td>
								{{ $category->product->count() }}
							</td>
							<td>
								<a href="/admin/product?category_id={{ $category->id }}">
									<button type="button" class="btn btn-default"><i class="fa fa-eye"></i> View Products</button>
								</a>
							</td>
						</tr>
					@endforeach

				</tbody>

			</table>
				
			<div class="text-center">
				<nav class="pagination" aria-label="Page navigation">
				  <ul class="pagination">
				    {!! $categories->links() !!}
				  </ul>
				</nav>
			</div>
			

		</div>

	</div>

	<script>

	  // Category Autocomplete
	  
	  var availableCategories = {!! json_encode($allCategories->toArray()) !!};

	  var categoryArray = availableCategories.map(category=>{
	    return category.name;
	  });

	  $('.search_filter_category').autocomplete({
	    source: categoryArray,
	    minLength: 0
	  });

	</script>


@endsection ('content')