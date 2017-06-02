
<nav class="navbar navbar-fixed-top navbar-inverse">
	<div class="container-fluid">
		<div class="navbar-header">
			<a class="navbar-brand" href="#">Product Catalog</a>
		</div>
		<!-- <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1"> -->
			<ul class="nav navbar-nav">
				
				@if ( \Auth::user() && \Auth::user()->permissions == 'admin')

				<li><a href="/admin">Dashboard</a></li>

				<li><a href="/admin/product/create">Add New Product</a></li>

				<li><a href="/admin/">View All Products</a></li>

				@endif


			</ul>
			<ul class="nav navbar-nav navbar-right">
				
				@if (Auth::guest())
					<li><a href="{{ url('/login') }}">Login</a></li>
					<li><a href="{{ url('/register') }}">Register</a></li>
				@else
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
							{{ Auth::user()->name }} <span class="caret"></span>
						</a>
						<ul class="dropdown-menu" role="menu">
                            <li>
								<a href="/logout">Logout</a>
                            </li>
                        </ul>
					</li>
				@endif
			</ul>

		<!-- </div> -->
	</div>
</nav>