@extends ('layouts.admin')


@section ('content')

	<div class="col-sm-8 container">
		
		<div class="panel panel-default">
			
			<div class="panel-heading clearfix">
				<h4 class="panel-title pull-left" style="padding-top:7.5px; padding-right:20px;"><i class="fa fa-tags"></i> Assign Category to {{ $product->name }}</h4>
				<form action="/admin/product/{{ $product->id }}/assign_category/search" method="GET">
					{{ csrf_field() }}
					<div class="input-group">
						<input type="text" class="form-control search_filter_category" id="search_filter" name="search_filter" placeholder="Search Category">
							<div class="input-group-btn">
								<button class="btn btn-default" type="submit"><i class="fa fa-search"></i></button>
							</div>
					</div>
				</form>
			</div>

			<form action="/admin/product/{{ $product->id }}/assign_category/" method="POST">

				{{ csrf_field() }}

			<div class="panel-body">
				<div class="form-group">
					<label for="name">Current Category:</label> 

					<button type="submit" class="btn btn-primary pull-right">Save Changes</button>
					<a href="/admin/product/{{ $product->id }}/assign_category">
						<button type="button" class="btn btn-default pull-right margin-right">View All Categories</button>
					</a>
					@if ( $product->category_id == NULL)

						<input type="text" class="form-control assign-category-form" name="currentcategory" id="category" value="N/A" disabled>
					
					@else

						<input type="text" class="form-control assign-category-form" name="currentcategory" id="category" value="{{ $product->category->name }}" disabled>

					@endif


				</div>
			</div>

			<table class="table table-bordered table-striped table-hover table-responsive">

				<thead>
					<tr>
						<th class="table-radio"></th>
						<th>Category Name</th>
						<th>Description</th>
						<th>Product Count</th>
					</tr>
				</thead>
				<tbody>

					@if ( $product->category_id !== NULL )

						<tr>
							<td align="center">
								<input type="radio" id="permissionsRadio{{ $product->category_id }}" name="category" value="{{ $product->category_id }}" checked>
							</td>
							<td>{{ $product->category->name }}</td>

							<td>{{ $product->category->description }}</td>

							<td>
								{{ $product->category->product->count() }}
							</td>
						</tr>

					@endif

					@foreach ($categories as $category)
						<tr>
							<td align="center">
								<input type="radio" id="permissionsRadio{{ $category->id }}" name="category" value="{{ $category->id }}">
							</td>
							<td>{{ $category['name'] }}</td>

							<td>{{ $category['description'] }}</td>

							<td>
								{{ $category->product->count() }}
							</td>
						</tr>
					@endforeach

				</tbody>

			</table>

			</form>
				
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