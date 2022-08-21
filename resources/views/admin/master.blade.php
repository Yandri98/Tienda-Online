<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>@yield('title') - Panel de Control</title>
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<meta name="routeName" content="{{ Route::currentRouteName() }}">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">


	<link rel="stylesheet" href="{{ url('/static/css/admin.css?'.time()) }}">
	<link href="https://fonts.googleapis.com/css?family=Roboto:400,700&display=swap" rel="stylesheet">
	<script src="https://kit.fontawesome.com/b0d8aefb17.js" crossorigin="anonymous"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
	

	<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>
	<script src="https://cdn.ckeditor.com/4.15.0/standard/ckeditor.js"></script> 
	<script src="{{ url('/static/libs/ckeditor/ckditor.js') }}"></script>
	<script src="{{ url('/static/js/admin.js') }}"></script>


	<script>
		$(document).ready(function(){
			$('[data-toggle="tooltip"]').tooltip()
		})
		
	</script>
    
</head>
<body>
	<div class="wrapper">
		<div class="col1">@include('admin.sidebar')</div>
		<div class="col2">
			<nav class="navbar navbar-expand-lg shadow">
				<div class="collapse navbar-collapse">
					<ul class="navbar-nav">
					    <li class="nav-item">
					    	<a href="{{ url('/admin') }}"class="nav-link">
					    		<i class="fa-solid fa-house"></i> Dashboard
					    	</a>
					    </li>
					</ul>
				</div>
			</nav>

			<div class="page">

				<div class="container-fluid">
					<nav aria-label="breadcrumb shadow">
						<ol class="breadcrumb">
							<li class="breadcrumb-item">
								<a href="{{ url('/admin') }}"><i class="fa-solid fa-house"></i> Dashboard</a>
							</li>
							@section('breadcrumb')
							@show
						</ol>
						
					</nav>
				</div>
                   @if(Session::has('message'))
  <div class="container-fluid">
      <div class="alert alert-{{Session::get('typealert')}} mtop16" style="display:block; margin-bottom:16px;">
                    
           {{Session::get('message')}}
              @if ($errors->any())
                <ul>
                   @foreach($errors->all() as $error)
                     <li>{{$error}}</li>
                   @endforeach
                 </ul>
               @endif
             <script>
                $('.alert').slideDown();
                  setTimeout(function(){$('.alert').slideUp();}, 10000)
             </script>   
       </div>
  </div>
@endif

            
            @section('content')
            @show
			</div>
		</div>
	</div>
	
</body>
</html>