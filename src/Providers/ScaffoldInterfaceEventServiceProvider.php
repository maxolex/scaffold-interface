<?php

namespace Maxolex\ScaffoldInterface\Providers;

use Maxolex\ScaffoldInterface\Events\DeleteCrud;
use Maxolex\ScaffoldInterface\Models\Scaffoldinterface;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class ScaffoldInterfaceEventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings.
     *
     * @var array
     */
    protected $listen = [
        'Maxolex\ScaffoldInterface\Events\DeleteCrud' => [
            'Maxolex\ScaffoldInterface\Listeners\DeleteCrudFiles',
        ],
    ];

    /**
     * Bootstrap the application events.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        Scaffoldinterface::deleted(function ($scaffold) {
            event(new DeleteCrud($scaffold));
        });
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
    }
}
