@@extends('scaffold-interface.layouts.app')
@@section('title','Affichage {{$parser->singular()}}')
@@section('content')
<section class="content">
    <div class="box box-primary">
        <div class="box-header">
            <h1>Details {{$parser->singular()}}</h1>
        </div>
        <div class="box-body">
            <br>
       <a href='@{!!url("{{$parser->singular()}}")!!}' class = 'btn btn-primary'><i class="fa fa-home"></i>Liste des {{$parser->plural()}}</a>
    <br>
    <table class = 'table table-bordered'>
        <thead>
            <th>Clé</th>
            <th>Valeur</th>
        </thead>
        <tbody>
            @foreach($dataSystem->dataScaffold('v') as $value)
            <tr>
                <td>
                    <b>{{$value}}</b>
                </td>
                <td>@{!!${{$parser->singular()}}->{{$value}}!!}</td>
            </tr>
            @endforeach
            @if($dataSystem->getRelationAttributes() != null)
            @foreach($dataSystem->getRelationAttributes() as $key=>$value)
            @foreach($value as $key1 => $value1)
            <tr>
                <td>
                    <b><i>{{$value1}} : </i></b>
                </td>
                <td>@{!!${{$parser->singular()}}->{{str_singular($key)}}->{{$value1}}!!}</td>
            </tr>
            @endforeach
            @endforeach
            @endif
        </tbody>
    </table>
        </div>
    </div>
</section>
@@endsection
