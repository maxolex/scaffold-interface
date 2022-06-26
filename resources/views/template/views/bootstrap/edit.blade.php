@@extends('scaffold-interface.layouts.app')
@@section('title','Edition {{$parser->real()}}')
@@section('content')
<section class="content">
    <div class="box box-primary">
        <div class="box-header">
            <h1>Editer {{$parser->real()}}</h1>
        </div>
        <div class="box-body">
            <a href="@{!!url('{{$parser->singular()}}')!!}" class = 'btn btn-primary'><i class="fa fa-home"></i> Liste des {{$parser->real_plural()}}</a>
            <br>
            <form method = 'POST' action = '@{!! url("{{$parser->singular()}}")!!}/@{!!${{$parser->singular()}}->id!!}/update'>
                <input type = 'hidden' name = '_token' value = '@{{Session::token()}}'>
                @foreach($dataSystem->getForeignKeys() as $key)
                <div class="col-md-6 form-group">
                    <label>{{$key}}</label>
                    <select name = '{{lcfirst(\Illuminate\Support\Str::singular($key))}}_id' class = "form-control">
                        @@foreach(${{\Illuminate\Support\Str::plural($key)}} as $key => $value)
                        <option value="@{{$key}}">@{{$value}}</option>
                        @@endforeach
                    </select>
                </div>
                @endforeach
                <?php $i = 0;?>
                @foreach($dataSystem->dataScaffold('v') as $value)
                    @if($dataSystem->dataScaffold('migration')[$i] == "date")
                        <div class="col-md-6 form-group">
                            <label for="{{\Illuminate\Support\Str::singular(\Illuminate\Support\Str::slug($value,'_'))}}">{{$value}}</label>
                            <input id="{{\Illuminate\Support\Str::singular(\Illuminate\Support\Str::slug($value,'_'))}}" name = "{{\Illuminate\Support\Str::singular(\Illuminate\Support\Str::slug($value,'_'))}}" type="date" class="form-control" value="@{!!${{$parser->singular()}}->{{\Illuminate\Support\Str::singular(\Illuminate\Support\Str::slug($value,'_'))}}!!}">
                        </div>
                    @elseif($dataSystem->dataScaffold('migration')[$i] == "longText")
                    <div class="col-md-6 form-group">
                        <label for="{{\Illuminate\Support\Str::singular(\Illuminate\Support\Str::slug($value,'_'))}}">{{$value}}</label>
                        <textarea id="{{\Illuminate\Support\Str::singular(\Illuminate\Support\Str::slug($value,'_'))}}" name = "{{\Illuminate\Support\Str::singular(\Illuminate\Support\Str::slug($value,'_'))}}" class="form-control">@{!!${{$parser->singular()}}->{{\Illuminate\Support\Str::singular(\Illuminate\Support\Str::slug($value,'_'))}}!!}
                        </textarea>
                    </div>
                    @elseif($dataSystem->dataScaffold('migration')[$i] == "integer")
                    <div class="col-md-6 form-group">
                        <label for="{{\Illuminate\Support\Str::singular(\Illuminate\Support\Str::slug($value,'_'))}}">{{$value}}</label>
                        <input id="{{\Illuminate\Support\Str::singular(\Illuminate\Support\Str::slug($value,'_'))}}" name = "{{\Illuminate\Support\Str::singular(\Illuminate\Support\Str::slug($value,'_'))}}" type="number" step="1" class="form-control" value="@{!!${{$parser->singular()}}->{{\Illuminate\Support\Str::singular(\Illuminate\Support\Str::slug($value,'_'))}}!!}">
                    </div>
                    @elseif($dataSystem->dataScaffold('migration')[$i] == "String(select)")
                    <div class="col-md-6 form-group">
                        <label for="{{\Illuminate\Support\Str::singular(\Illuminate\Support\Str::slug($value,'_'))}}">{{$value}}</label>
                        <select name = "{{\Illuminate\Support\Str::singular(\Illuminate\Support\Str::slug($value,'_'))}}" class = 'form-control'>
                            <option value=""></option>
                            <option @{!!${{$parser->singular()}}->{{\Illuminate\Support\Str::singular(\Illuminate\Support\Str::slug($value,'_'))}} == "ma_valeur" ? "selected":"" !!} value="ma_valeur">Ma Valeur</option>
                        </select>
                    </div>
                    @else
                        <div class="col-md-6 form-group">
                            <label for="{{\Illuminate\Support\Str::singular(\Illuminate\Support\Str::slug($value,'_'))}}">{{$value}}</label>
                            <input id="{{\Illuminate\Support\Str::singular(\Illuminate\Support\Str::slug($value,'_'))}}" name = "{{\Illuminate\Support\Str::singular(\Illuminate\Support\Str::slug($value,'_'))}}" type="text" class="form-control" value="@{!!${{$parser->singular()}}->{{\Illuminate\Support\Str::singular(\Illuminate\Support\Str::slug($value,'_'))}}!!}">
                        </div>
                    @endif
                <?php $i = $i + 1;?>
                @endforeach
                <div class="col-md-12">
                <button class = 'btn btn-success' type ='submit'><i class="fa fa-floppy-o"></i> Mettre à jour</button>
                </div>
            </form>
        </div>
    </div>

</section>
@@endsection
