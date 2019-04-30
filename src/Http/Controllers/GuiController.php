<?php

namespace Maxolex\ScaffoldInterface\Http\Controllers;

use URL;
use Session;
use AppController;
use Amranidev\Ajaxis\Ajaxis;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Artisan;
use Maxolex\ScaffoldInterface\Attribute;
use Maxolex\ScaffoldInterface\Models\Relation;
use Maxolex\ScaffoldInterface\Models\Scaffoldinterface;
use Maxolex\ScaffoldInterface\Datasystem\Database\DatabaseManager;

/**
 * Class GuiController.
 *
 * @author Maxolex Togolais <maxolex12@gmail.com>
 */
class GuiController extends AppController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $scaffold = Scaffoldinterface::paginate(6);
        $scaffoldList = DatabaseManager::tableNames();

        return view('scaffold-interface::scaffoldApp', compact('scaffold', 'scaffoldList'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        app()->make('Request')->setRequest($request->toArray());
        $scaffold = app()->make('Scaffold');
        $relations = app()->make('Datasystem');
        $scaffold->model()->views()->controller()->migration()->route();
        $paths = app()->make('Path');
        $names = app()->make('Parser');

        $scaffoldInterface = Scaffoldinterface::create([
            'migration'  => $paths->migrationPath,
            'model'      => $paths->modelPath(),
            'controller' => $paths->controllerPath(),
            'views'      => $paths->dirPath(),
            'tablename'  => $names->plural(),
            'package'    => config('maxolex.config.package'),
        ]);

        if ($relations->getForeignKeys()) {
            foreach ($relations->getForeignKeys() as $foreignKey) {
                $record = DB::table('scaffoldinterfaces')->where('tablename', $foreignKey)->first();
                Relation::create(['scaffoldinterface_id' => $scaffoldInterface->id,
                    'to'                                 => $record->id,
                    'having'                             => Relation::ONE_TO_MANY,
                ]);
            }
        }

        Session::flash('status', $names->singular().'Créé avec succès ');

        return redirect('scaffold');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $scaffoldInterface = Scaffoldinterface::FindOrFail($id);

        $scaffoldInterface->delete();

        Session::flash('status', 'Supprimé avec succès');

        return URL::to('scaffold');
    }

    /**
     * Delete confirmation message by ajaxis.
     *
     * @link https://github.com/amranidev/ajaxis
     *
     * @return \Illuminate\Http\Response
     */
    public function deleteMsg($id)
    {
        $scaffold = Scaffoldinterface::FindOrFail($id);
        if (Schema::hasTable($scaffold->tablename)) {
            $table = $scaffold->tablename;

            return view('scaffold-interface::template.DeleteMessage.delete', compact('table'))->render();
        }
        $msg = Ajaxis::Mtdeleting('Attention!!', "Voulez-vous supprimer les fichiers MVC de {$scaffold->tablename}??", '/scaffold/guirollback/'.$id);

        return $msg;
    }

    /**
     * Get attributes.
     *
     * @param string $table
     *
     * @return \Illuminate\Http\Response
     */
    public function getResult($table, Request $request)
    {
        $attributes = new Attribute($table);
        if ($request->ajax()) {
            return response()->json($attributes->getAttributes(), 200);
        }
    }

    /**
     * Migrate schema.
     *
     * @return \Illuminate\Http\Response
     */
    public function migrate()
    {
        try {
            Artisan::call('migrate', ['--path' => config('maxolex.config.database')]);
            exec('cd '.base_path().' && composer dump-autoload');
        } catch (\Exception $e) {
            Session::flash('status', $e->getMessage());

            return redirect('scaffold');
        }
        $Msg = str_replace("\n", '', Artisan::output());
        Session::flash('status', $Msg);

        return redirect('scaffold');
    }

    /**
     * Rollback schema.
     *
     * @throws Exception
     *
     * @return \Illuminate\Http\Response
     */
    public function rollback()
    {
        if (!Scaffoldinterface::all()->count()) {
            Session::flash('status', 'Pas de Rollback disponible');

            return redirect('scaffold');
        }

        try {
            Artisan::call('migrate:rollback');
        } catch (\Exception $e) {
            return $e->getMessage();
        }
        $Msg = str_replace("\n", '', Artisan::output());
        Session::flash('status', $Msg);

        return redirect('scaffold');
    }

    /**
     * ManyToMany form.
     *
     * @param \Illuminate\Http\Request
     *
     * @return \Illuminate\Http\Response
     */
    public function manyToManyForm(Request $request)
    {
        $dummyData = DatabaseManager::tableNames();
        $elements = Ajaxis::MtcreateFormModal([
            ['type' => 'select', 'name' => 'table1', 'key' => 'table1', 'value' => $dummyData],
            ['type' => 'select', 'name' => 'table2', 'key' => 'table2', 'value' => $dummyData], ], '/scaffold/manyToMany', 'Many To Many');

        return $elements;
    }

    /**
     * ManyToMany generate.
     *
     * @param \Illuminate\Http\Request
     *
     * @return \Illuminate\Http\Response
     */
    public function manyToMany(Request $request)
    {
        if ($this->check($request->toArray())) {
            Session::flash('status', 'Erreur! ne pourrait pas être lié');

            return redirect('scaffold');
        }
        $table1 = DB::table('scaffoldinterfaces')->where('tablename', $request->toArray()['table1'])->first();
        $table2 = DB::table('scaffoldinterfaces')->where('tablename', $request->toArray()['table2'])->first();
        $manytomany = new \Maxolex\ScaffoldInterface\ManyToMany\ManyToMany($request->except('_token'));
        $manytomany->burn();

        Relation::create([
            'scaffoldinterface_id' => $table1->id,
            'to'                   => $table2->id,
            'having'               => Relation::MANY_TO_MANY,
        ]);

        Session::flash('status', 'ManyToMany généré avec succès');

        return redirect('/scaffold');
    }

    /**
     * Check ManyToMany request if it is available to be used.
     *
     * @param array $request
     *
     * @return mixed
     */
    private function check(array $request)
    {
        return $request['table1'] == $request['table2'] ? true : false;
    }

    /**
     * Transform entities into a grahp.
     *
     * @return \Illuminate\Http\Response
     */
    public function graph()
    {
        $nodes = Scaffoldinterface::all()->map(function (Scaffoldinterface $entity) {
            return ['id' => $entity->id, 'label' => $entity->tablename];
        })->toJson();

        $edges = Relation::all()->map(function (Relation $relation) {
            return ['from' => $relation->scaffoldinterface_id, 'to' => $relation->to, 'label' => $relation->having];
        })->toJson();

        return view('scaffold-interface::graph', compact('nodes', 'edges'));
    }
}
