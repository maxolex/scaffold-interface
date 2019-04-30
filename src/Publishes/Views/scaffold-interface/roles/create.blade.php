@extends('scaffold-interface.layouts.app')
@section('content')
<section class="content">
	<div class="box box-primary">
		<div class="box-header">
			<h3>Créer un nouveau role</h3>
		</div>
		<div class="box-body">
			<form action="{{url('scaffold-roles/store')}}" method = "post">
				{!! csrf_field() !!}
				<div class="form-group">
				<label for="">Role</label>
					<input type="text" name = "name" class = "form-control" placeholder = "Nom">
				</div>
				<div class="box-footer">
					<button class = 'btn btn-primary' type = "submit">Valider</button>
				</div>
			</form>
		</div>
	</div>
</section>
@endsection
