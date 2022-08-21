@extends('connect.master')
@section('title','Login')


@section('content')
<div class="box box_register shadow">
	<div class="header">
		<a href="{{url('/')}}">
			<img src="{{url('/static/img/logo.png')}}" alt="">
		</a>
	</div>
	<div class="inside">
	{!!	Form::open(['url'=>'/register']) !!}

	<label for="name">Nombres:</label>
	<div class="input-group">
		<div class="input-group-preprend">
			<div class="input-group-text"><i class="fa-solid fa-user"></i></div>
		</div>	
		{!! Form::text('name', null, ['class'=>'form-control']) !!}
	</div>

	<label for="lastname"class="mtop16" >Apellidos:</label>
	<div class="input-group">
		<div class="input-group-preprend">
			<div class="input-group-text"><i class="fa-solid fa-user"></i></div>
		</div>	
		{!! Form::text('lastname', null, ['class'=>'form-control']) !!}
	</div>

	<label for="email" class="mtop16">Correo electrónico:</label>
	<div class="input-group">
		<div class="input-group-preprend">
			<div class="input-group-text"><i class="fa-solid fa-envelope"></i></div>
		</div>	
		{!! Form::email('email', null, ['class'=>'form-control']) !!}
	</div>

	<label for="password" class="mtop16">Contraseña:</label>
	<div class="input-group"> 
		<div class="input-group-preprend">
			<div class="input-group-text"><i class="fa-solid fa-lock"></i></div>
		</div>	
		{!! Form::password('password', ['class'=>'form-control']) !!}
	</div>

	<label for="cpassword" class="mtop16">Confirmar contraseña:</label>
	<div class="input-group"> 
		<div class="input-group-preprend">
			<div class="input-group-text"><i class="fa-solid fa-lock"></i></div>
		</div>	
		{!! Form::password('cpassword', ['class'=>'form-control']) !!}
	</div>
	{!!Form::submit('Registrarse',	['class'=> 'btn btn-success mtop16'])!!}
	{!!	Form::close() !!}

		 @if(Session::has('message'))
	        <div class="container">
	            <div class="mtop16 alert alert-{{ Session::get('typealert') }}" style="display: none;">
	                {{ Session::get('message') }}
	                @if ($errors->any())
	                <ul>
	                    @foreach($errors->all() as $error)
	                    <li>{{ $error }}</li>
	                    @endforeach
	                </ul>
	                @endif
	                <script>
	                    $('.alert').slideDown();
	                    setTimeout(function(){ $('.alert').slideUp(); }, 10000);
	                </script>
	            </div>           
	        </div>
	        @endif  
	<div class="footer mtop16">
		<a href="{{url('/login')}}">Tengo una cuenta, Iniciar Sesión.</a>
	</div>
	</div>

	</div>
@stop