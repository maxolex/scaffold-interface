@@extends('scaffold-interface.layouts.semantic-ui.layouts.app')
@@section('title','Ajout {{$parser->real()}}')
@@section('content')
<h1>{{$parser->real_plural()}}</h1>
    <a class="ui green icon button" href="@{!!url('{{$parser->singular()}}')!!}"><i class="info circle icon"></i>
        Voir tous les {{ucfirst($parser->real_plural())}}</a>
    <div class="ui grid">
        <form class="ui eight wide column centered form" action='@{!!url("{{$parser->singular()}}")!!}' method="post">

            {{  csrf_field() }}

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
		                    <div class="ui left icon input">
		                        <!--i class="folder open icon"></i-->
		                        <input type="date" name="{{\Illuminate\Support\Str::singular(\Illuminate\Support\Str::slug($value,'_'))}}" placeholder="{{$value}}">
		                        <div class="ui error">
		                            @@if($errors->has('{{\Illuminate\Support\Str::singular(\Illuminate\Support\Str::slug($value,'_'))}}') || session()->has("{{\Illuminate\Support\Str::singular(\Illuminate\Support\Str::slug($value,'_'))}}."_error"))
		                                <p>{{ $errors->first(@{!!\Illuminate\Support\Str::singular(\Illuminate\Support\Str::slug($value,'_'))!!}') }}</p>
		                                <p>{{ session("@{!!\Illuminate\Support\Str::singular(\Illuminate\Support\Str::slug($value,'_'))!!}."_error") }}</p>
		                            @@endif
		                        </div>
		                    </div>
		                </div>
	                @elseif($dataSystem->dataScaffold('migration')[$i] == "longText")
	                	<div class="field">
		                    <div class="ui left icon input">
		                        <!--i class="folder open icon"></i-->
		                        <textarea name="{{\Illuminate\Support\Str::singular(\Illuminate\Support\Str::slug($value,'_'))}}" placeholder="{{$value}}"></textarea>
		                        <div class="ui error">
		                            @@if($errors->has('{{\Illuminate\Support\Str::singular(\Illuminate\Support\Str::slug($value,'_'))}}') || session()->has("{{\Illuminate\Support\Str::singular(\Illuminate\Support\Str::slug($value,'_'))}}."_error"))
		                                <p>{{ $errors->first(@{!!\Illuminate\Support\Str::singular(\Illuminate\Support\Str::slug($value,'_'))!!}') }}</p>
		                                <p>{{ session("@{!!\Illuminate\Support\Str::singular(\Illuminate\Support\Str::slug($value,'_'))!!}."_error") }}</p>
		                            @@endif
		                        </div>
		                    </div>
		                </div>
	                @elseif($dataSystem->dataScaffold('migration')[$i] == "integer")
	                	<div class="field">
		                    <div class="ui left icon input">
		                        <!--i class="folder open icon"></i-->
		                        <input type="number" name="{{\Illuminate\Support\Str::singular(\Illuminate\Support\Str::slug($value,'_'))}}" placeholder="{{$value}}">
		                        <div class="ui error">
		                            @@if($errors->has('{{\Illuminate\Support\Str::singular(\Illuminate\Support\Str::slug($value,'_'))}}') || session()->has("{{\Illuminate\Support\Str::singular(\Illuminate\Support\Str::slug($value,'_'))}}."_error"))
		                                <p>{{ $errors->first(@{!!\Illuminate\Support\Str::singular(\Illuminate\Support\Str::slug($value,'_'))!!}') }}</p>
		                                <p>{{ session("@{!!\Illuminate\Support\Str::singular(\Illuminate\Support\Str::slug($value,'_'))!!}."_error") }}</p>
		                            @@endif
		                        </div>
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
	                @else
	                	<div class="field">
		                    <div class="ui left icon input">
		                        <!--i class="folder open icon"></i-->
		                        <input type="text" name="{{\Illuminate\Support\Str::singular(\Illuminate\Support\Str::slug($value,'_'))}}" placeholder="{{$value}}">
		                        <div class="ui error">
		                            @@if($errors->has('{{\Illuminate\Support\Str::singular(\Illuminate\Support\Str::slug($value,'_'))}}') || session()->has("{{\Illuminate\Support\Str::singular(\Illuminate\Support\Str::slug($value,'_'))}}."_error"))
		                                <p>{{ $errors->first(@{!!\Illuminate\Support\Str::singular(\Illuminate\Support\Str::slug($value,'_'))!!}') }}</p>
		                                <p>{{ session("@{!!\Illuminate\Support\Str::singular(\Illuminate\Support\Str::slug($value,'_'))!!}."_error") }}</p>
		                            @@endif
		                        </div>
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

@section('scripts')
    <script>
        $('select.dropdown')
            .dropdown()
        ;
    </script>
@endsection