<?php

namespace Maxolex\ScaffoldInterface\Datasystem\Database;

use Illuminate\Support\Facades\DB;

/**
 * class Database.
 *
 * @author Maxolex Togolais <maxolex12@gmail.com>
 */
abstract class Database implements DatabaseContractInterface
{
    /**
     * table names to be skipped in the result.
     *
     * @var array
     */
    protected $skips = [
        'migrations',
        'scaffoldinterfaces',
        'password_resets',
    ];

    /**
     * retrieve table names from database.
     *
     * @return \Illuminate\Support\Collection
     */
    public function tableNames()
    {
        return collect(DB::select($this->getQuery()))
                    ->pluck('name')->reject(function ($name) {
                        return $this->skips()->contains($name);
                    });
    }

    /**
     * Retrieve the database query for querying all tables.
     *
     * @return string
     */
    abstract public function getQuery();

    /**
     * Table names to be skipped in the result.
     *
     * @return \Illuminate\Support\Collection
     */
    public function skips()
    {
        return collect($this->skips)->merge($this->skipNames());
    }

    /**
     * Table names to be skipped in the result.
     *
     * @return \Illuminate\Support\Collection
     */
    abstract public function skipNames();
}
