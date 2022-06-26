    /**
     * {{\Illuminate\Support\Str::singular($model)}}.
     *
     * @return \Illuminate\Support\Collection;
     */
    public function {{\Illuminate\Support\Str::plural($model)}}()
    {
        return $this->belongsToMany('{{ config('maxolex.config.modelNameSpace') }}\{{ucfirst(\Illuminate\Support\Str::singular($model))}}');
    }

    /**
     * Assign a {{\Illuminate\Support\Str::singular($model)}}.
     *
     * @param ${{\Illuminate\Support\Str::singular($model)}}
     * @return mixed
     */
    public function assign{{ucfirst(\Illuminate\Support\Str::singular($model))}}(${{\Illuminate\Support\Str::singular($model)}})
    {
        return $this->{{\Illuminate\Support\Str::plural($model)}}()->attach(${{\Illuminate\Support\Str::singular($model)}});
    }
    /**
     * Remove a {{\Illuminate\Support\Str::singular($model)}}.
     *
     * @param ${{\Illuminate\Support\Str::singular($model)}}
     * @return mixed
     */
    public function remove{{ucfirst(\Illuminate\Support\Str::singular($model))}}(${{\Illuminate\Support\Str::singular($model)}})
    {
        return $this->{{\Illuminate\Support\Str::plural($model)}}()->detach(${{\Illuminate\Support\Str::singular($model)}});
    }
