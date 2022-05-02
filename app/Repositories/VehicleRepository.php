<?php

namespace App\Repositories;

use App\Models\Vehicle;
use App\Repositories\BaseRepository;

/**
 * Class VehicleRepository
 * @package App\Repositories
 * @version May 2, 2022, 4:13 pm UTC
*/

class VehicleRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'type_id',
        'tires',
        'power'
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
        return Vehicle::class;
    }
}
