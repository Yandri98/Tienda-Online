@extends('admin.master')
@section('title','Editar Producto')
@section('breadcrumb')
<li class="breadcrumb-item">
	<a href="{{ url('/admin/products') }}"><i class="fas fa-boxes"></i> Productos</a>
</li>

@endsection
@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="col-md-9">	
			<div class="panel shadow">
		<div class="header">
			<h2 class="title"><i class="fas fa-plus"></i> Editar Producto</h2>
		</div>
		<div class="inside">
			{!! Form::open(['url'=>'admin/product/add', 'files'=> true]) !!}
			<div class="row">
				<div class="col-md-6">
					<label for="name">Nombre del producto:</label>
					<div class="input-group">
						<div class="input-group-prepend">
							<span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-keyboard"></i></span>
						</div>
					{!! Form::text('name', $product->name, ['class'=>'form-control']) !!}
					</div>
				</div>

				<div class="col-md-3">
					<label for="category">Categoría</label>
					<div class="input-group">
						<div class="input-group-prepend">
							<span class="input-group-text" id="basic-addon1">
								<i class="fa-solid fa-table-cells"></i>
							</span>
						</div>
					{!! Form::select('category',$cats, $product->category_id, ['class'=> 'custom-select']) !!}
					</div>	
				</div>
				<div class="col-md-3">
					<label for="name">Imagen del Producto</label>
					<div class="input-group">
					<div class="input-group-prepend" id="basic-addon1">	
						<span class="input-group-text" id="basic-addon1">	
							<i class="fa-solid fa-file-image" ></i>
						</span>
					</div>
					<div class="custom-file">
					{!! Form::file('img',['class'=>'custom-file-input', 'id'=>'customFile',
					'accept'=> 'image/*']) !!}
					<label class="custom-file-label" for="customFile">Cargar</label>
					</div>
					</div>
				</div>
			</div>

			<div class="row mtop16">
				<div class="col-md-3">
					<label for="price">Precio:</label>
					<div class="input-group">
					<div class="input-group-prepend" id="basic-addon1">	
						<span class="input-group-text" id="basic-addon1">	
							<i class="fa-solid fa-dollar-sign"></i>
						</span>
					</div>
					  	{!! Form::number('price', $product->price,['class'=> 'form-control', 'min'=> '0.00','step'=>'any']) !!}
				</div>
				</div>

				<div class="col-md-3">
					<label for="indiscount">¿En descuento?:</label>
					<div class="input-group">
						<div class="input-group-prepend">
							<span class="input-group-text" id="basic-addon1">		
								<i class="fa-solid fa-tag"></i>
							</span>
						</div>
					{!! Form::select('indiscount', ['0' => 'No', '1' => 'Si'], $product->in_discount, ['class'=> 'custom-select']) !!}
					</div>
				</div>


				<div class="col-md-3">
					<label for="discount">Descuento:</label>
					<div class="input-group">
						<div class="input-group-prepend">
							<span class="input-group-text" id="basic-addon1">		
								<i class="fa-solid fa-percent"></i>
							</span>
						</div>
					{!! Form::number('discount', $product->discount,  ['class'=> 'form-control','step','any']) !!}
					</div>
				</div>


			</div>	


		
			<div class="row mtop16">
				<div class="col-md-12">
					<label for="content">Descripción del producto:</label>
					{!! Form::textarea('content', $product->content, ['class'=> 'form-control'])
					 !!}
					 <script>CKEDITOR.replace( 'content' );</script>
				</div>
			</div>

			<div class="row mtop16">
				<div class="col-md-12">
					{!! Form::submit('Guardar',['class'=>'btn btn-success']) !!}
				</div>
			</div>

			{!! Form::close() !!}
			
		</div>    
		</div>
	</div>
	<div class="col-md-3">
		<div class="panel shadow">
			<div class="header">
			<h2 class="title"><i class="fa-solid fa-image" style="color: red;"></i>Imagen del Producto</h2>
			<div class="inside">
				<img src="{{url('/uploads/'.$product->file_path.'/'.$product->image)}}"class="img-fluid">
			</div>
		</div>
		</div>
	</div>
</div>
</div>
@endsection