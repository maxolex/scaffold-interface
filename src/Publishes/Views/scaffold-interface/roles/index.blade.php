@extends('scaffold-interface.layouts.app')
@section('content')
<section class="content">
	<div class="box box-primary">
		<div class="box-header">
			<h3>Les Roles</h3>
		</div>
		<div class="box-body">
			<a href="{{url('scaffold-roles/create')}}" class = "btn btn-success"><i class="fa fa-plus fa-md" aria-hidden="true"></i> Nouveau</a>
			<table class="table table-striped">
				<head>
					<th>Role</th>
                    <th>Permissions</th>
					<th>Actions</th>
				</head>
				<tbody>
					@foreach($roles as $role)
					<tr>
						<td>{{$role->name}}</td>
                        <td>
                            @if(!empty($role->permissions))
                                @foreach($role->permissions as $permission)
                                    <small class = 'label bg-orange'>{{$permission->name}}</small>
                                @endforeach
                            @else
                                <small class = 'label bg-red'>Pas de Permissions</small>
                            @endif
                        </td>
						<td>
							<a href="{{url('/scaffold-roles/edit')}}/{{$role->id}}" class = "btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
							<a href="{{url('/scaffold-roles/delete')}}/{{$role->id}}" class = "btn btn-danger btn-sm"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
						</td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
</section>
@endsection
