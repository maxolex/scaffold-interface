@@extends('scaffold-interface.layouts.defaultMaterialize')
@@section('title','Ajout {{$parser->singular()}}')
@@section('content')
<div class = 'container'>
    <h1>Ajout {{$parser->singular()}}</h1>
    <form method = 'get' action = '@{!!url("{{$parser->singular()}}")!!}'>
        <button class = 'btn blue'>Liste des {{$parser->plural()}}</button>
    </form>
    <br>
    <form method = 'POST' action = '@{!!url("{{$parser->singular()}}")!!}'>
        <input type = 'hidden' name = '_token' value = '@{{ Session::token() }}'>
        <?php $i = 0;?>
        @foreach($dataSystem->dataScaffold('v') as $value)
            @if($dataSystem->dataScaffold('migration')[$i] == "date")
                <div class="input-field col s6">
                    <input id="{{$value}}" name = "{{$value}}" type="date" class="validate">
                    <label for="{{$value}}">{{$value}}</label>
                </div>
            @elseif($dataSystem->dataScaffold('migration')[$i] == "longText")
            <div class="input-field col s6">
              <textarea id="{{$value}}" name = "{{$value}}" class="materialize-textarea"></textarea>
              <label for="{{$value}}">{{$value}}</label>
            </div>
            @elseif($dataSystem->dataScaffold('migration')[$i] == "integer")
            <div class="input-field col s6">
                <input id="{{$value}}" name = "{{$value}}" type="number" step="1" class="validate">
                <label for="{{$value}}">{{$value}}</label>
            </div>
            @else
                <div class="input-field col s6">
                    <input id="{{$value}}" name = "{{$value}}" type="text" class="validate">
                    <label for="{{$value}}">{{$value}}</label>
                </div>
            @endif
        <?php $i = $i + 1;?>
        @endforeach
        @foreach($dataSystem->getForeignKeys() as $key)
        <div class="input-field col s12">
            <select name = '{{lcfirst(str_singular($key))}}_id'>
                @@foreach(${{str_plural($key)}} as $key => $value)
                <option value="@{{$key}}">@{{$value}}</option>
                @@endforeach
            </select>
            <label>{{$key}}</label>
        </div>
        @endforeach
        <button class = 'btn red' type ='submit'>Sauvegarder</button>
    </form>
</div>
@@endsection
