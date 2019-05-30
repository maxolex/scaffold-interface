@extends('scaffold-interface.layouts.app')
@section('content')
    <section class="content">
        <div class="box box-primary">
            <div class="box-header">
                <h3>Modifier un Role</h3>
            </div>
            <div class="box-body">
                <form action="{{url('scaffold-roles/update')}}" method="post">
                    {!! csrf_field() !!}
                    <input type="hidden" name="role_id" value="{{$role->id}}">
                    <div class="form-group">
                        <label for="">Role</label>
                        <input type="text" name="name" class="form-control" placeholder="Nom" value="{{$role->name}}">
                    </div>
                    <div class="box-footer">
                        <button class='btn btn-primary' type="submit">Modifier</button>
                    </div>
                </form>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="box box-primary">
                        <div class="box-header">
                            <h3>Permissions du Role {{$role->name}}</h3>
                        </div>
                        <div class="box-body">
                            <form action="{{url('scaffold-users/addPermission')}}" method="post">
                                {!! csrf_field() !!}
                                <input type="hidden" name="role_id" value="{{$role->id}}">
                                <div class="form-group">
                                    <select name="permission_name[]" id="permissions" class="form-control"
                                            multiple="multiple">
                                        @foreach($permissions as $permission)
                                            <option
                                                {{ $role->hasPermissionTo($permission)? "selected": "" }} value="{{$permission}}">{{$permission}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <button class='btn btn-primary'>Ajouter permission</button>
                                </div>
                            </form>
                            <table class='table'>
                                <thead>
                                <th>Permission</th>
                                <th>Action</th>
                                </thead>
                                <tbody>
                                @foreach($rolePermissions as $permission)
                                    <tr>
                                        <td>{{$permission->name}}</td>
                                        <td>
                                            <a href="{{url('scaffold-users/removePermission')}}/{{str_slug($permission->name,'-')}}/{{$role->id}}"
                                               class="removal btn btn-danger btn-sm"><i class="fa fa-trash-o"
                                                aria-hidden="true"></i></a></td>
                                    </tr>
                                @endforeach
                                </tbody>
                                <form id="remove-form" action="" method="GET" style="display: none;">
                                    {{ csrf_field() }}
                                    <input type="hidden" name="role_id" value="{{$role->id}}">
                                </form>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
