<?php

namespace Maxolex\ScaffoldInterface\Generators;

/**
 * Class ControllerGenerate.
 *
 * @author Maxolex Togolais <maxolex12@gmail.com>
 */
class ControllerGenerate implements GeneratorInterface
{
    /**
     * The DataSystem instance.
     *
     * @var \Maxolex\ScaffoldInterface\Datasystem\Datasystem
     */
    private $dataSystem;

    /**
     * The Parser instance.
     *
     * @var \Maxolex\ScaffoldInterface\Parsers\Parser
     */
    private $parser;

    /**
     * Create new ControllerGenerate instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->dataSystem = app()->make('Datasystem');
        $this->parser = app()->make('Parser');
    }

    /**
     * Compile controller template.
     *
     * @return string
     */
    public function generate()
    {
        return "<?php\n\n".view('scaffold-interface::template.controller.controller', ['parser' => $this->parser, 'dataSystem' => $this->dataSystem])->render();
    }
}
