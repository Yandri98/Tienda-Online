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
			<h2 class="title"><i class="fa-solid fa-pen-to-square"></i> Editar Producto</h2>
		</div>
		<div class="inside">
			{!! Form::open(['url'=>'admin/product/'.$product->id.'/edit', 'files'=> true]) !!}
			<div class="row">
				<div class="col-md-6">
					<label for="name"><b>Nombre del producto:</b></label>
					<div class="input-group">
						<div class="input-group-prepend">
							<span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-keyboard"></i></span>
						</div>
					{!! Form::text('name', $product->name, ['class'=>'form-control']) !!}
					</div>
				</div>

				<div class="col-md-3">
					<label for="category"><b>Categoría:</b></label>
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
					<label for="name"><b>Imagen del Producto:</b></label>
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
					<label for="price"><b>Precio:</b></label>
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
					<label for="indiscount"><b>¿En descuento?:</b></label>
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
					<label for="discount"><b>Descuento:</b></label>
					<div class="input-group">
						<div class="input-group-prepend">
							<span class="input-group-text" id="basic-addon1">		
								<i class="fa-solid fa-percent"></i>
							</span>
						</div>
					{!! Form::number('discount', $product->discount,  ['class'=> 'form-control','step','any']) !!}
					</div>
				</div>

				<div class="col-md-3">
					<label for="status"><b>Estado:</b></label>
					<div class="input-group">
						<div class="input-group-prepend">
							<span class="input-group-text" id="basic-addon1">		
								<i class="fa-solid fa-ban"></i>
							</span>
						</div>
					{!! Form::select('status', ['0' => 'Desactivado', '1' => 'Activado'], $product->status, ['class'=> 'custom-select']) !!}
					</div>
				</div>


			</div>
			
			<div class="row mtop16">
				<div class="col-md-12">
					<label for="content"><b>Descripción del producto:</b></label>
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
			<h2 class="title"><i class="fa-solid fa-image" style="color: black;"></i><b>Imagen Destacada</b></h2>
			<div class="inside">
				<img src="{{url('/uploads/'.$product->file_path.'/'.$product->image)}}"class="img-fluid">
			</div>
		</div>
		</div>
		<div class="panel shadow mtop16">
			<div class="header">

			<h2 class="title"><i class="fa-solid fa-images" style="color:black;"></i><b>Galeria</b></h2>
			</div>
			<div class="inside product_gallery">
				{!! Form::open(['url'=>'/admin/product/'.$product->id.'/gallery/add', 'files'=>true, 'id'=>'form_product_gallery']) !!}
				{!! Form::file('file_image',['id'=> 'product_file_image','accept'=> 'image/*',
				'style'=>'display: none;','required']) !!}
				{!! Form::close() !!}
				<div class="btn-submit">
					<a href="#" id="btn_product_file_image"><i class="fa-solid fa-circle-plus"></i></a>
				</div>

				<div class="tumbs">
					@foreach($product->getGallery as $img)
					<div class="tumb">
						<a href="{{ url('/admin/product/'.$product->id.'/gallery/'.$img->id.'/delete') }}" data-toggle="tooltip"
								data-placement="top" title="Eliminar">
								<i class="fa-solid fa-trash-can"></i>
						</a>
						<img src="{{ url('/uploads/'.$img->file_path.'/t_'.$img->file_name) }}">
					</div>
					@endforeach

				</div>
			</div> 
		</div>
	</div>
</div>
</div>
@endsection