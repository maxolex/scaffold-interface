@extends('scaffold-interface.layouts.app')
@section('content')
<section class="content">
	<div class="box box-primary">
		<div class="box-header">
			<h3>Modifier un Role</h3>
		</div>
		<div class="box-body">
			<form action="{{url('scaffold-roles/update')}}" method = "post">
				{!! csrf_field() !!}
				<input type="hidden" name = "role_id" value = "{{$role->id}}">
				<div class="form-group">
				<label for="">Role</label>
					<input type="text" name = "name" class = "form-control" placeholder = "Nom" value = "{{$role->name}}">
				</div>
				<div class="box-footer">
					<button class = 'btn btn-primary' type = "submit">Modifier</button>
				</div>
			</form>
		</div>
	</div>
</section>
@endsection
