<?php

namespace Maxolex\ScaffoldInterface\Filesystem;

/**
 * Class Paths.
 *
 * @author Maxolex Togolais <maxolex12@gmail.com>
 */
class Path
{
    /**
     * The Parser instance.
     *
     * @var \Maxolex\ScaffoldInterface\Parsers\Parser
     */
    private $parser;

    /**
     * Migration file path.
     *
     * @var string
     */
    public $migrationPath;

    /**
     * Create new Paths instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->parser = app()->make('Parser');

        $this->migrationPath = $this->MigrationPath();
    }

    /**
     * Get model file path.
     *
     * @return string
     */
    public function modelPath()
    {
        return config('maxolex.config.model').'/'.ucfirst($this->parser->singular()).'.php';
    }

    /**
     * Get migration file path.
     *
     * @return string
     */
    private function migrationPath()
    {
        $FileName = date('Y').'_'.date('m').'_'.date('d').'_'.date('his').'_'.$this->parser->plural().'.php';

        return config('maxolex.config.migration').'/'.$FileName;
    }

    /**
     * Get controller file path.
     *
     * @return string
     */
    public function controllerPath()
    {
        $FileName = ucfirst($this->parser->singular()).'Controller.php';

        return config('maxolex.config.controller').'/'.$FileName;
    }

    /**
     * Get index file path.
     *
     * @return string
     */
    public function indexPath()
    {
        return config('maxolex.config.views').'/'.$this->parser->singular().'/'.'index.blade.php';
    }

    /**
     * Get create file path.
     *
     * @return string
     */
    public function createPath()
    {
        return config('maxolex.config.views').'/'.$this->parser->singular().'/'.'create.blade.php';
    }

    /**
     * Get show file path.
     *
     * @return string
     */
    public function showPath()
    {
        return config('maxolex.config.views').'/'.$this->parser->singular().'/'.'show.blade.php';
    }

    /**
     * Get edit file path.
     *
     * @return string
     */
    public function editPath()
    {
        return config('maxolex.config.views').'/'.$this->parser->singular().'/'.'edit.blade.php';
    }

    /**
     * Get route file path.
     *
     * @return string
     */
    public function routePath()
    {
        return config('maxolex.config.routes');
    }

    /**
     * Get views directory path.
     *
     * @return string
     */
    public function dirPath()
    {
        return config('maxolex.config.views').'/'.$this->parser->singular();
    }
}
