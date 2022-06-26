@@extends('scaffold-interface.layouts.defaultMaterialize')
@@section('title','Edition {{$parser->singular()}}')
@@section('content')
<div class = 'container'>
    <h1>Editer {{$parser->singular()}}</h1>
    <form method = 'get' action = '@{!!url("{{$parser->singular()}}")!!}'>
        <button class = 'btn blue'>Liste des {{$parser->plural()}}</button>
    </form>
    <br>
    <form method = 'POST' action = '@{!! url("{{$parser->singular()}}")!!}/@{!!${{$parser->singular()}}->id!!}/update'>
        <input type = 'hidden' name = '_token' value = '@{{Session::token()}}'>
        <?php $i = 0;?>
        @foreach($dataSystem->dataScaffold('v') as $value)
            @if($dataSystem->dataScaffold('migration')[$i] == "date")
                <div class="input-field col s6">
                    <input id="{{$value}}" name = "{{$value}}" type="date" class="validate" value="@{!!${{$parser->singular()}}->{{$value}}!!}">
                    <label for="{{$value}}">{{$value}}</label>
                </div>
            @elseif($dataSystem->dataScaffold('migration')[$i] == "longText")
            <div class="input-field col s6">
              <textarea id="{{$value}}" name = "{{$value}}" class="materialize-textarea">@{!!${{$parser->singular()}}->{{$value}}!!}</textarea>
              <label for="{{$value}}">{{$value}}</label>
            </div>
            @elseif($dataSystem->dataScaffold('migration')[$i] == "integer")
                <div class="input-field col s6">
                    <input id="{{$value}}" name = "{{$value}}" type="number" step="1" class="validate" value="@{!!${{$parser->singular()}}->{{$value}}!!}">
                    <label for="{{$value}}">{{$value}}</label>
                </div>
            @else
                <div class="input-field col s6">
                    <input id="{{$value}}" name = "{{$value}}" type="text" class="validate" value="@{!!${{$parser->singular()}}->{{$value}}!!}">
                    <label for="{{$value}}">{{$value}}</label>
                </div>
            @endif
        <?php $i = $i + 1;?>
        @endforeach
        @foreach($dataSystem->getForeignKeys() as $key)
        <div class="input-field col s12">
            <select name = '{{lcfirst(\Illuminate\Support\Str::singular($key))}}_id'>
                @@foreach(${{\Illuminate\Support\Str::plural($key)}} as $key => $value)
                <option value="@{{$key}}">@{{$value}}</option>
                @@endforeach
            </select>
            <label>{{$key}}</label>
        </div>
        @endforeach
        <button class = 'btn red' type ='submit'>Mettre à jour</button>
    </form>
</div>
@@endsection
