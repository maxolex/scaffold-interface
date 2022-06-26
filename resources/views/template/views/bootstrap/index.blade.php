@@extends('scaffold-interface.layouts.app')
@@section('title','Liste des {{ucfirst($parser->real_plural())}}')
@@section('content')
<section class="content">
    <h1>Liste des {{ucfirst($parser->real_plural())}}</h1>
    <a href='@{!!url("{{$parser->singular()}}")!!}/create' class = 'btn btn-success'><i class="fa fa-plus"></i> Ajouter</a>
    <br>
    @if($dataSystem->getRelationAttributes() != null)
    {{-- <div class="dropdown">
        <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
        Associé
        <span class="caret"></span>
        </button>
        <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
            @foreach($dataSystem->getRelationAttributes() as $key => $value)
            <li><a href="{{URL::to('/')}}/{{lcfirst(\Illuminate\Support\Str::singular($key))}}">{{ucfirst(\Illuminate\Support\Str::singular($key))}}</a></li>
            @endforeach
        </ul>
    </div> --}}
    @endif
    <br>
    <table class = "table table-striped table-bordered table-hover" style = 'background:#fff'>
        <thead>
            @if($dataSystem->getRelationAttributes() != null)
            @foreach($dataSystem->getRelationAttributes() as $key => $value)
            @foreach($value as $key1 => $value1)
            @if($loop->first)
            <th>{{\Illuminate\Support\Str::singular($key)}}</th>
            @endif
            @endforeach
            @endforeach
            @endif
            @foreach($dataSystem->dataScaffold('v') as $value)
            <th>{{$value}}</th>
            @endforeach
            <th>actions</th>
        </thead>
        <tbody>
            @@foreach(${{$parser->plural()}} as ${{lcfirst($parser->singular())}})
            <tr>
                @if($dataSystem->getRelationAttributes() != null)
                @foreach($dataSystem->getRelationAttributes() as $key=>$value)
                @foreach($value as $key1 => $value1)
                @if($loop->first)
                <td>@{!!${{$parser->singular()}}->{{\Illuminate\Support\Str::singular($key)}}->{{$value1}}!!}</td>
                @endif
                @endforeach
                @endforeach
                @endif
                @foreach($dataSystem->dataScaffold('v') as $value)
                <td>@{!!${{lcfirst($parser->singular())}}->{{\Illuminate\Support\Str::singular(\Illuminate\Support\Str::slug($value,'_'))}}!!}</td>
                @endforeach
                <td>
                    <a data-toggle="modal" data-target="#myModal" class = 'delete btn btn-danger btn-xs' data-link = "/{{$parser->singular()}}/@{!!${{$parser->singular()}}->id!!}/deleteMsg" ><i class = 'fa fa-trash'> supprimer</i></a>
                    <a href = '#' class = 'viewEdit btn btn-primary btn-xs' data-link = '/{{$parser->singular()}}/@{!!${{$parser->singular()}}->id!!}/edit'><i class = 'fa fa-edit'> modifier</i></a>
                    <a href = '#' class = 'viewShow btn btn-warning btn-xs' data-link = '/{{$parser->singular()}}/@{!!${{$parser->singular()}}->id!!}'><i class = 'fa fa-eye'> info</i></a>
                </td>
            </tr>
            @@endforeach
        </tbody>
    </table>
</section>
@@endsection
