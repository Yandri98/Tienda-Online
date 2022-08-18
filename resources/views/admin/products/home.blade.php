@extends('admin.master')
@section('tittle','Productos')
@section('breadcrumb')
<li class="breadcrumb-item">
	<a href="{{ url('/admin/products') }}"><i class="fas fa-boxes"></i> Productos</a>
</li>
@endsection
@section('content')
<div class="container-fluid">
	<div class="panel shadow">
		<div class="header">
			<h2 class="titte"><i class="fas fa-boxes"></i> Productos</h2>
		</div>
		<div class="inside">

			<div class="btns">
				<a href="{{ url('/admin/product/add') }}"class="btn btn-primary"><i class="fa-solid fa-plus"></i> Agregar Producto</a>
			</div>
			<table class="table">
				
				
			</table>
		</div>
	</div>
</div>
@endsection