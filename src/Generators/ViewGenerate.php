<?php

namespace Maxolex\ScaffoldInterface\Generators;

/**
 * Class ViewGenerate.
 *
 * @author Maxolex Togolais <maxolex12@gmail.com>
 */
class ViewGenerate implements GeneratorInterface
{
    /**
     * The DataSystem instance.
     *
     * @var \Maxolex\ScaffoldInterface\Datasystem\Datasystem
     */
    private $dataSystem;

    /**
     * The NamesGenerate instance.
     *
     * @var \Maxolex\ScaffoldInterface\Parsers\Parser
     */
    private $parser;

    /**
     * The Indenter instance.
     *
     * @var \Gajus\Dindent\Indenter
     */
    private $indenter;

    /**
     * Views.
     *
     * @var array
     */
    private $views = ['index', 'create', 'edit', 'show'];

    /**
     * Create new ViewGenerate instance.
     *
     * @param $data Array
     * @param NamesGenerate
     *
     * @return void
     */
    public function __construct()
    {
        $this->dataSystem = app()->make('Datasystem');
        $this->parser = app()->make('Parser');
        $this->indenter = app()->make('Indenter');
    }

    /**
     * Generate View.
     *
     * @param string $view
     *
     * @return string
     */
    private function generateView($view)
    {
        return $this->indenter
            ->indent(view('scaffold-interface::template.views.'.$this->parser->getTemplate().'.'.$view,
                ['parser' => $this->parser, 'dataSystem' => $this->dataSystem])->render());
    }

    /**
     * Generate Views.
     *
     * @return mixed
     */
    public function generate()
    {
        $views = new \StdClass();

        foreach ($this->views as $view) {
            $views->{$view} = $this->generateView($view);
        }

        return $views;
    }
}
