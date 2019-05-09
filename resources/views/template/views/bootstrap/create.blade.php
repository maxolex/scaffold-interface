@@extends('scaffold-interface.layouts.app')
@@section('title','Ajout')
@@section('content')
<section class="content">
    <h1>Ajout {{$parser->singular()}}</h1>
        <a href="@{!!url('{{$parser->singular()}}')!!}" class = 'btn btn-danger'><i class="fa fa-home"></i> Liste des {{$parser->upperCaseFirst()}}</a>
    <br>
    <form method = 'POST' action = '@{!!url("{{$parser->singular()}}")!!}'>
        <input type = 'hidden' name = '_token' value = '@{{Session::token()}}'>
        <?php $i = 0;?>
        @foreach($dataSystem->dataScaffold('v') as $value)
            @if($dataSystem->dataScaffold('migration')[$i]}} == "date")
            <div class="form-group">
                <label for="{{$value}}">{{$value}}</label>
                <input id="{{$value}}" name = "{{$value}}" type="date" class="form-control">
            </div>
            @endif
        <div class="form-group">
            <label for="{{$value}}">{{$value}}</label>
            <input id="{{$value}}" name = "{{$value}}" type="text" class="form-control">
        </div>
        @endforeach
        @foreach($dataSystem->getForeignKeys() as $key)
        <div class="form-group">
            <label>{{$key}}</label>
            <select name = '{{lcfirst(str_singular($key))}}_id' class = 'form-control'>
                @@foreach(${{str_plural($key)}} as $key => $value)
                <option value="@{{$key}}">@{{$value}}</option>
                @@endforeach
            </select>
        </div>
        @endforeach
        <button class = 'btn btn-success' type ='submit'> <i class="fa fa-floppy-o"></i> Sauvegarder</button>
    </form>
</section>
@@endsection
