<?php

namespace Maxolex\ScaffoldInterface;

/**
 * Class Scaffold.
 *
 * @author Maxolex Togolais <maxolex12@gmail.com>
 */
class Scaffold
{
    /**
     * Generator instance.
     *
     * @var \Maxolex\ScaffoldInterface\Generators\Generator
     */
    public $generator;

    /**
     * Create new scaffold instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->generator = app()->make('Generator');
    }

    /**
     * Scaffold Migration.
     *
     * @return \Maxolex\ScaffoldInterface\Scaffold
     */
    public function migration()
    {
        $this->generator->migration();

        return $this;
    }

    /**
     * Scaffold Model.
     *
     * @return \Maxolex\ScaffoldInterface\Scaffold
     */
    public function model()
    {
        $this->generator->model();

        return $this;
    }

    /**
     * Scaffold Views.
     *
     * @return \Maxolex\ScaffoldInterface\Scaffold
     */
    public function views()
    {
        $this->generator->dir();
        $this->generator->views();

        return $this;
    }

    /**
     * Scaffold Controller.
     *
     * @return \Maxolex\ScaffoldInterface\Scaffold
     */
    public function controller()
    {
        $this->generator->controller();

        return $this;
    }

    /**
     * Scaffold Route.
     *
     * @return \Maxolex\ScaffoldInterface\Scaffold
     */
    public function route()
    {
        $this->generator->route();

        return $this;
    }
}
