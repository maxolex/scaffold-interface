@@extends('scaffold-interface.layouts.app')
@@section('title','Ajout {{$parser->singular()}}')
@@section('content')
<section class="content">
    <div class="box box-primary">
        <div class="box-header">
            <h1>Ajout {{$parser->singular()}}</h1>
        </div>
        <div class="box-body">
            <a href="@{!!url('{{$parser->singular()}}')!!}" class = 'btn btn-danger'><i class="fa fa-home"></i> Liste des {{$parser->plural()}}</a>
            <br>
            <form method = 'POST' action = '@{!!url("{{$parser->singular()}}")!!}'>
                <input type = 'hidden' name = '_token' value = '@{{Session::token()}}'>
                <?php $i = 0;?>
                @foreach($dataSystem->dataScaffold('v') as $value)
                    @if($dataSystem->dataScaffold('migration')[$i] == "date")
                    <div class="col-md-6 form-group">
                        <label for="{{$value}}">{{$value}}</label>
                        <input id="{{$value}}" name = "{{$value}}" type="date" class="form-control">
                    </div>
                    @elseif($dataSystem->dataScaffold('migration')[$i] == "longText")
                    <div class="col-md-6 form-group">
                        <label for="{{$value}}">{{$value}}</label>
                        <textarea id="{{$value}}" name = "{{$value}}" type="text" class="form-control"></textarea>
                    </div>
                    @elseif($dataSystem->dataScaffold('migration')[$i] == "integer")
                    <div class="col-md-6 form-group">
                        <label for="{{$value}}">{{$value}}</label>
                        <input id="{{$value}}" name = "{{$value}}" type="number" step="1" class="form-control">
                    </div>
                    @else
                    <div class="col-md-6 form-group">
                        <label for="{{$value}}">{{$value}}</label>
                        <input id="{{$value}}" name = "{{$value}}" type="text" class="form-control">
                    </div>
                    @endif
                <?php $i = $i + 1;?>
                @endforeach
                @foreach($dataSystem->getForeignKeys() as $key)
                <div class="col-md-6 form-group">
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
        </div>
    </div>
        
</section>
@@endsection
