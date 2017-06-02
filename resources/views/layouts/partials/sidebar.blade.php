<div class="col-sm-2 col-sm-offset-1 sidebar">
  <ul class="nav nav-sidebar">
    <li class="sidebar-header"><a href="#" class="sidebar-header">Product Categories</a></li>
    <li><a href="/admin/category/create">Add New Product Category</a></li>
    <li><a href="#">View All Product Categories ({{ $category_count }})</a></li>
  </ul>
  
  <ul class="nav nav-sidebar">

    @foreach ($categories as $category)

      <li><a href="/admin/product?category_id={{ $category['id'] }}">{{ $category['name'] }}</a></li>

    @endforeach
  </ul>
</div>