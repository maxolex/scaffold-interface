@@extends('scaffold-interface.layouts.semantic-ui.layouts.app')
@@section('title','Edition {{$parser->real()}}')
@@section('content')
<h1>{{ucfirst($parser->real_plural())}}</h1>
    <a class="ui green icon button" href="@{!!url('{{$parser->singular()}}')!!}"><i class="info circle icon"></i>
        Voir tous les {{ucfirst($parser->real_plural())}}</a>

<div class="ui card">
  <div class="content">
    <div class="header">Details {{$parser->real()}}</div>
  </div>
  <div class="content">
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
                <td>@{!!${{$parser->singular()}}->{{\Illuminate\Support\Str::singular(\Illuminate\Support\Str::slug($value,'_'))}}!!}</td>
            </tr>
            @endforeach
            @if($dataSystem->getRelationAttributes() != null)
            @foreach($dataSystem->getRelationAttributes() as $key=>$value)
            @foreach($value as $key1 => $value1)
            @if($loop->first)
            <tr>
                <td>
                    <b>{{\Illuminate\Support\Str::singular($key)}} : </b>
                </td>
                <td>@{!!${{$parser->singular()}}->{{\Illuminate\Support\Str::singular($key)}}->{{$value1}}!!}</td>
            </tr>
            @endif
            @endforeach
            @endforeach
            @endif
        </tbody>
    </table>
  </div>
  <div class="extra content">
    
  </div>
</div>
@@endsection