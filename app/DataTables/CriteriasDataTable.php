<?php

namespace App\DataTables;

use App\Models\Criterias;

/**
 * Class CriteriasDataTable
 */
class CriteriasDataTable
{
    /**
     * @return Criterias
     */
    public function get()
    {
        /** @var Criterias $query */
        $query = Criterias::query()->select('criterias.*');

        return $query;
    }
}
