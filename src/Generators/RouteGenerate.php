<?php

namespace Maxolex\ScaffoldInterface\Generators;

/**
 * Class RouteGenerate.
 *
 * @author Maxolex Togolais <maxolex12@gmail.com>
 */
class RouteGenerate implements GeneratorInterface
{
    /**
     * The Parser instance.
     *
     * @var \Maxolex\ScaffoldInterface\Parsers\Parser
     */
    private $parser;

    /**
     * Create new RouteGenerate instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->parser = app()->make('Parser');
    }

    /**
     * Compile route template.
     *
     * @return string
     */
    public function generate()
    {
        return "\n".view('scaffold-interface::template.routes', ['parser' => $this->parser])->render();
    }
}
