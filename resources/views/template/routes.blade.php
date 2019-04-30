//{{$parser->singular()}} Routes
Route::group(['middleware'=> 'web'],function(){
  Route::resource('@if(config('maxolex.config.prefixRoutes')){{config('maxolex.config.prefixRoutes')}}/@endif{{$parser->singular()}}','@if(config('maxolex.config.controllerNameSpace'))\{{config('maxolex.config.controllerNameSpace')}}\@endif{{ucfirst($parser->singular())}}Controller');
  Route::post('@if(config('maxolex.config.prefixRoutes')){{config('maxolex.config.prefixRoutes')}}/@endif{{$parser->singular()}}/{id}/update','@if(config('maxolex.config.controllerNameSpace'))\{{config('maxolex.config.controllerNameSpace')}}\@endif{{ucfirst($parser->singular())}}Controller@update');
  Route::get('@if(config('maxolex.config.prefixRoutes')){{config('maxolex.config.prefixRoutes')}}/@endif{{$parser->singular()}}/{id}/delete','@if(config('maxolex.config.controllerNameSpace'))\{{config('maxolex.config.controllerNameSpace')}}\@endif{{ucfirst($parser->singular())}}Controller@destroy');
  Route::get('@if(config('maxolex.config.prefixRoutes')){{config('maxolex.config.prefixRoutes')}}/@endif{{$parser->singular()}}/{id}/deleteMsg','@if(config('maxolex.config.controllerNameSpace'))\{{config('maxolex.config.controllerNameSpace')}}\@endif{{ucfirst($parser->singular())}}Controller@DeleteMsg');
});
