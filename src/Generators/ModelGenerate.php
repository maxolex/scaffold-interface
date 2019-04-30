<?php

namespace Maxolex\ScaffoldInterface\Generators;

/**
 * Class ModelGenerate.
 *
 * @author Maxolex Togolais <maxolex12@gmail.com>
 */
class ModelGenerate implements GeneratorInterface
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
     * Create new ModelGenerate instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->dataSystem = app()->make('Datasystem');
        $this->parser = app()->make('Parser');
    }

    /**
     * Compile model template.
     *
     * @return string
     */
    public function generate()
    {
        return "<?php\n\n".view('scaffold-interface::template.model.model', ['parser' => $this->parser, 'dataSystem' => $this->dataSystem])->render();
    }
}
