@@extends('scaffold-interface.layouts.semantic-ui.layouts.app')
@@section('title','Ajout {{$parser->real()}}')
@@section('content')
<h1>{{$parser->real_plural()}}</h1>
    <a class="ui green icon button" href="@{!!url('{{$parser->singular()}}')!!}"><i class="info circle icon"></i>
        Voir tous les {{ucfirst($parser->real_plural())}}</a>
    <div class="ui grid">
        <form class="ui eight wide column centered form" action='@{!!url("{{$parser->singular()}}")!!}' method="post">

            @{{  csrf_field() }}

            <div class="ui stacked segment">

                <div class="ui error message">

                </div>

                @foreach($dataSystem->getForeignKeys() as $key)
                <div class="field">
                    <label>{{$key}}</label>
                    <select name="{{lcfirst(\Illuminate\Support\Str::singular($key))}}_id" class="ui fluid search dropdown">
                        @@foreach(${{\Illuminate\Support\Str::plural($key)}} as $key => $value)
                            <option value="@{{$key}}">@{{$value}}</option>
                        @@endforeach
                    </select>
                </div>
                @endforeach

                <?php $i = 0;?>
                @foreach($dataSystem->dataScaffold('v') as $value)
                    @if($dataSystem->dataScaffold('migration')[$i] == "date")
		                <div class="field">
		                	<label for="{{\Illuminate\Support\Str::singular(\Illuminate\Support\Str::slug($value,'_'))}}">{{$value}}</label>
		                    <div class="ui left icon input">
		                        <i class="calendar icon"></i>
		                        <input type="date" name="{{\Illuminate\Support\Str::singular(\Illuminate\Support\Str::slug($value,'_'))}}" placeholder="{{$value}}">
		                    </div>
		                </div>
	                @elseif($dataSystem->dataScaffold('migration')[$i] == "longText")
	                	<div class="field">
	                		<label for="{{\Illuminate\Support\Str::singular(\Illuminate\Support\Str::slug($value,'_'))}}">{{$value}}</label>
		                    <div class="ui left icon input">
		                        <textarea name="{{\Illuminate\Support\Str::singular(\Illuminate\Support\Str::slug($value,'_'))}}" placeholder="{{$value}}"></textarea>
		                    </div>
		                </div>
	                @elseif($dataSystem->dataScaffold('migration')[$i] == "integer")
	                	<div class="field">
	                		<label for="{{\Illuminate\Support\Str::singular(\Illuminate\Support\Str::slug($value,'_'))}}">{{$value}}</label>
		                    <div class="ui left icon input">
		                        <i class="sort numeric up icon"></i>
		                        <input type="number" name="{{\Illuminate\Support\Str::singular(\Illuminate\Support\Str::slug($value,'_'))}}" placeholder="{{$value}}">
		                    </div>
		                </div>
	                @elseif($dataSystem->dataScaffold('migration')[$i] == "String(select)")
	                	<div class="field">
		                    <label for="{{\Illuminate\Support\Str::singular(\Illuminate\Support\Str::slug($value,'_'))}}">{{$value}}</label>
		                    <select name="{{\Illuminate\Support\Str::singular(\Illuminate\Support\Str::slug($value,'_'))}}" class="ui fluid search dropdown">
		                        <option value=""></option>
                            	<option value="ma_valeur">Ma valeur</option>
		                    </select>
		                </div>
	                @elseif($dataSystem->dataScaffold('migration')[$i] == "datetime-local")
		                <div class="field">
		                	<label for="{{\Illuminate\Support\Str::singular(\Illuminate\Support\Str::slug($value,'_'))}}">{{$value}}</label>
		                    <div class="ui left icon input">
		                        <i class="calendar alternate icon"></i>
		                        <input type="datetime-local" name="{{\Illuminate\Support\Str::singular(\Illuminate\Support\Str::slug($value,'_'))}}" placeholder="{{$value}}">
		                    </div>
		                </div>
	                @elseif($dataSystem->dataScaffold('migration')[$i] == "email")
		                <div class="field">
		                	<label for="{{\Illuminate\Support\Str::singular(\Illuminate\Support\Str::slug($value,'_'))}}">{{$value}}</label>
		                    <div class="ui left icon input">
		                        <i class="envelope icon"></i>
		                        <input type="email" name="{{\Illuminate\Support\Str::singular(\Illuminate\Support\Str::slug($value,'_'))}}" placeholder="{{$value}}">
		                    </div>
		                </div>
	                @else
	                	<div class="field">
	                		<label for="{{\Illuminate\Support\Str::singular(\Illuminate\Support\Str::slug($value,'_'))}}">{{$value}}</label>
		                    <div class="ui left icon input">
		                        <i class="chevron circle right icon"></i>
		                        <input type="text" name="{{\Illuminate\Support\Str::singular(\Illuminate\Support\Str::slug($value,'_'))}}" placeholder="{{$value}}">
		                    </div>
		                </div>
	                @endif

         		<?php $i = $i + 1;?>
                @endforeach

                <div class="ui fluid large blue submit button">Enregistrer</div>
            </div>

        </form>
    </div>

@@endsection

@@section('scripts')
    <script>
        $('select.dropdown')
            .dropdown()
        ;

		$(document)
            .ready(function () {
                $('.ui.form').form({});
            })
        ;
    </script>
@@endsection