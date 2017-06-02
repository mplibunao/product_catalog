<div class="col-sm-2 col-sm-offset-1 sidebar">
  <ul class="nav nav-sidebar">
    <li class="sidebar-header"><a href="#" class="sidebar-header">Product Categories</a></li>
    <li><a href="/admin/category/create">Create New Product Category</a></li>
    <li><a href="/admin/category">View All Product Categories ({{ $category_count }})</a></li>
  </ul>
  
  <ul class="nav nav-sidebar">
      <li class="sidebar-header"><a href="#" class="sidebar-header margin-bot">Latest Categories</a></li>
      <form action="/admin/category/search" method="GET">
        {{ csrf_field() }}
        <div class="input-group">

          <input type="text" class="form-control search_filter_category" id="search_filter" name="search_filter" placeholder="Search Category">
          <div class="input-group-btn">
            <button class="btn btn-default" type="submit"><i class="fa fa-search"></i></button>
          </div>

        </div>
      </form>
    @foreach ($categories as $category)

      <li><a href="/admin/product?category_id={{ $category['id'] }}">{{ $category['name'] }}</a></li>

    @endforeach
  </ul>
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