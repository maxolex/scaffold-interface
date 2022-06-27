@extends('scaffold-interface.layouts.app')
@section('content')
<section class="content">
	<div class="box box-primary">
		<div class="box-header">
			<h3>Create un nouveau utilisateur</h3>
		</div>
		<div class="box-body">
			<form action="{{url('scaffold-users/store')}}" method = "post">
				{!! csrf_field() !!}
				<input type="hidden" name = "user_id">
				<div class="form-group">
					<label for="">Email</label>
					<input type="email" name = "email" class = "form-control" placeholder = "Email">
				</div>
				<div class="form-group">
					<label for="">Nom</label>
					<input type="text" name = "name" class = "form-control" placeholder = "Nom">
				</div>
				<div class="form-group">
					<label for="">Mot de passe</label>
					<input type="password" name = "password" class = "form-control" placeholder = "Mot de passe">
				</div>
				<button class = "btn btn-primary" type="submit">Valider</button>
			</form>
		</div>
	</div>
</section>
@endsection
