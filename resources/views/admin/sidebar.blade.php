<div class="sidebar shadow">
	<div class="section-top">
		<div class="logo">
			<img src="{{ url('static/img/logo.png') }}" class="img-fluid">
		</div>

		<div class="user">
			<span class="subtitle">Hola:</span>
			<div class="name">
				{{ Auth::user()->name }} {{ Auth::user()->lastname }}
				<a href="{{ url('/logout') }}" data-toggle="tooltip" data-placement="top"
				tittle="Salir"><i class="fa-solid fa-right-from-bracket"></i></a>
			</div>

			<div class="email">{{ Auth::user()->email }}</div>
		</div>
	</div>

	<div class="main">
		<ul>
			<li>
				<a href="{{ url('/') }}"><i class="fa-solid fa-house"></i> Dashboard</a>
			</li>
			<li>	
				<a href="{{ url('admin/users') }}"><i class="fa-solid fa-users"></i> Usuarios</a>
				</li>
			<li>
				<a href="{{ url('admin/products') }}"><i class="fa-solid fa-boxes-stacked"></i> Productos</a>
			</li>
			<li>
				<a href="{{ url('admin/categories') }}"><i class="fa-solid fa-table-cells"></i></i> Categorías</a>
			</li>
		</ul>
	</div>
	
</div>