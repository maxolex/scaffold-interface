@@extends('scaffold-interface.layouts.app')
@@section('title','Ajout {{$parser->real()}}')
@@section('content')
<section class="content">
    <div class="box box-primary">
        <div class="box-header">
            <h1>Ajout {{$parser->real()}}</h1>
        </div>
        <div class="box-body">
            <a href="@{!!url('{{$parser->singular()}}')!!}" class = 'btn btn-danger'><i class="fa fa-home"></i> Liste des {{$parser->real_plural()}}</a>
            <br>
            <form method = 'POST' action = '@{!!url("{{$parser->singular()}}")!!}'>
                <input type = 'hidden' name = '_token' value = '@{{Session::token()}}'>
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
                <?php $i = 0;?>
                @foreach($dataSystem->dataScaffold('v') as $value)
                    @if($dataSystem->dataScaffold('migration')[$i] == "date")
                    <div class="col-md-6 form-group">
                        <label for="{{str_singular(str_slug($value,'_'))}}">{{$value}}</label>
                        <input id="{{str_singular(str_slug($value,'_'))}}" name = "{{str_singular(str_slug($value,'_'))}}" type="date" class="form-control">
                    </div>
                    @elseif($dataSystem->dataScaffold('migration')[$i] == "longText")
                    <div class="col-md-6 form-group">
                        <label for="{{str_singular(str_slug($value,'_'))}}">{{$value}}</label>
                        <textarea id="{{str_singular(str_slug($value,'_'))}}" name = "{{str_singular(str_slug($value,'_'))}}" type="text" class="form-control"></textarea>
                    </div>
                    @elseif($dataSystem->dataScaffold('migration')[$i] == "integer")
                    <div class="col-md-6 form-group">
                        <label for="{{str_singular(str_slug($value,'_'))}}">{{$value}}</label>
                        <input id="{{str_singular(str_slug($value,'_'))}}" name = "{{str_singular(str_slug($value,'_'))}}" type="number" step="1" class="form-control">
                    </div>
                    @elseif($dataSystem->dataScaffold('migration')[$i] == "String(select)")
                    <div class="col-md-6 form-group">
                        <label for="{{str_singular(str_slug($value,'_'))}}">{{$value}}</label>
                        <select name = "{{str_singular(str_slug($value,'_'))}}" class = 'form-control'>
                            <option value=""></option>
                            <option value="ma_valeur">Ma valeur</option>
                        </select>
                    </div>
                    @else
                    <div class="col-md-6 form-group">
                        <label for="{{str_singular(str_slug($value,'_'))}}">{{$value}}</label>
                        <input id="{{str_singular(str_slug($value,'_'))}}" name = "{{str_singular(str_slug($value,'_'))}}" type="text" class="form-control">
                    </div>
                    @endif
                <?php $i = $i + 1;?>
                @endforeach
                <div class="col-md-12">
                    <button class = 'btn btn-success' type ='submit'> <i class="fa fa-floppy-o"></i> Sauvegarder</button>
                </div>
                
            </form>
        </div>
    </div>
        
</section>
@@endsection
