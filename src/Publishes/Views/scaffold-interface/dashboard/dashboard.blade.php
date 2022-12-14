@extends('scaffold-interface.layouts.app')
@section('title','Dashboard')
@section('content')
<section class="content-header">
	<h1>
	Tableau de bord
	<small>Control panel</small>
	</h1>
	<ol class="breadcrumb">
		<li><a href="#"><i class="fa fa-dashboard"></i> Accueil</a></li>
		<li class="active">Tableau de bord</li>
	</ol>
</section>
<section class="content">
	<div class="row">
		<div class="col-lg-3 col-xs-6">
			<!-- small box -->
			<div class="small-box bg-aqua">
				<div class="inner">
					<h3>{{$users}}</h3>
					<p>Utilisateurs</p>
				</div>
				<div class="icon">
					<i class="ion ion-person-stalker"></i>
				</div>
				<a href="{{url('scaffold-users')}}" class="small-box-footer">Plus d'infos <i class="fa fa-arrow-circle-right"></i></a>
			</div>
		</div>
		<div class="col-lg-3 col-xs-6">
			<!-- small box -->
			<div class="small-box bg-red">
				<div class="inner">
					<h3>{{$roles}}</h3>
					<p>Roles</p>
				</div>
				<div class="icon">
					<i class="fa fa-user-plus"></i>
				</div>
				<a href="{{url('scaffold-roles')}}" class="small-box-footer">Plus d'infos <i class="fa fa-arrow-circle-right"></i></a>
			</div>
		</div>
		<div class="col-lg-3 col-xs-6">
			<!-- small box -->
			<div class="small-box bg-yellow">
				<div class="inner">
					<h3>{{$permissions}}</h3>
					<p>Permissions</p>
				</div>
				<div class="icon">
					<i class="fa fa-key"></i>
				</div>
				<a href="{{url('scaffold-permissions')}}" class="small-box-footer">Plus d'infos <i class="fa fa-arrow-circle-right"></i></a>
			</div>
		</div>
		<!-- list all entities, Development mode-->
		@foreach($entities as $entity)
		<div class="col-lg-3 col-xs-6">
			<!-- small box -->
			<div class="small-box bg-green">
				<div class="inner">
					<h3>{{$entity->tablename}}</h3>
					<p>{{$entity->tablename}}</p>
				</div>
				<div class="icon">
					<i class="fa fa-book"></i>
				</div>
				<a href="{{url('/')}}/{{lcfirst(\Illuminate\Support\Str::singular($entity->tablename))}}" class="small-box-footer">Plus d'infos <i class="fa fa-arrow-circle-right"></i></a>
			</div>
		</div>
		@endforeach
	</div>
</section>
@endsection
