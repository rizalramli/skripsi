<?php

namespace App\Repositories;

use App\Models\Criterias;
use App\Repositories\BaseRepository;

/**
 * Class CriteriasRepository
 * @package App\Repositories
 * @version January 4, 2021, 5:21 am UTC
*/

class CriteriasRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'attribute',
        'weight'
    ];

    /**
     * Return searchable fields
     *
     * @return array
     */
    public function getFieldsSearchable()
    {
        return $this->fieldSearchable;
    }

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Criterias::class;
    }
}
