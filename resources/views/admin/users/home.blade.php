@extends('admin.master')
@section('tittle','Usuarios')
@section('breadcrumb')
<li class="breadcrumb-item">
	<a href="{{ url('/admin/users') }}"><i class="fa-solid fa-users"></i> Usuarios</a>
</li>
@endsection

@section('content')
<div class="container-fluid">
	<div class="panel shadow">
		<div class="header">
			<h2 class="titte"><i class="fa-solid fa-users"></i> Usuarios</h2>
		</div>
		<div class="inside">
			<table class="table">
				<thead>
					<tr>
						<td>ID</td>
						<td>Nombre</td>
						<td>Apellido</td>
						<td>Email</td> 

					</tr>
				</thead>
				<tbody>
					@foreach($users as $user) 
					<tr>
						<td>{{ $user->id }}</td>
						<td>{{ $user->name }}</td>
						<td>{{ $user->lastname }}</td>
						<td>{{ $user->email }}</td>
						<td>
							<div class="opts">
								<a href="{{ url('/admin/user/'.$user->id.'/edit') }}"
									data-placement="top" title="Editar">
								<i class="fa-solid fa-pen-to-square"></i>
							</a>
							<a href="{{ url('/admin/user/'.$user->id.'/delete') }}"
								data-placement="top" title="Editar">
								<i class="fa-solid fa-trash-can"></i>
							</a>
							</div>
							
						</td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
</div>
@endsection