<?php

namespace Maxolex\ScaffoldInterface\Datasystem\Database;

/**
 * Interface DatabaseContract.
 *
 * @author Maxolex Togolais <maxolex12@gmail.com>
 */
interface DatabaseContractInterface
{
    /**
     * retrieve table names from database.
     *
     * @return \Illuminate\Support\Collection
     */
    public function tableNames();
}
