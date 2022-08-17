@extends('connect.master')
@section('tittle','Login')


@section('content')
<div class="box box_login shadow">
	<div class="header">
		<a href="{{url('/')}}">
			<img src="{{url('/static/img/logo.png')}}" alt="">
		</a>
	</div>
	<div class="inside">
	{!!	Form::open(['url'=>'/Login']) !!}
	<label for="email">Correo electrónico:</label>
	<div class="input-group">
		<div class="input-group-preprend">
			<div class="input-group-text"><i class="fa-solid fa-envelope"></i></div>
		</div>	
		{!! Form::email('email', null, ['class'=>'form-control']) !!}
	</div>

	<label for="password">Contraseña</label>
	<div class="input-group"> 
		<div class="input-group-preprend">
			<div class="input-group-text"><i class="fa-solid fa-lock"></i></div>
		</div>	
		{!! Form::password('password', ['class'=>'form-control']) !!}
	</div>
	{!!Form::submit('Ingresar',	['class'=> 'btn btn-success mtop16'])!!}
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
	            </div>           }
	        </div>
	        @endif  
	<div class="footer mtop16">
		<a href="{{url('/register')}}">¿No tienes una cuenta?, Registrate Aqui.</a>
		<a href="{{url('/register')}}">¿Olvidaste tu contraseña?</a>
	</div>
	</div>

	</div>
@stop