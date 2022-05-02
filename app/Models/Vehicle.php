<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Vehicle
 * @package App\Models
 * @version May 2, 2022, 4:13 pm UTC
 *
 * @property string $name
 * @property integer $type_id
 * @property integer $tires
 * @property number $power
 */
class Vehicle extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'vehicles';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'name',
        'type_id',
        'tires',
        'power'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'type_id' => 'integer',
        'tires' => 'integer',
        'power' => 'double'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required',
        'type_id' => 'required',
        'tires' => 'required',
        'power' => 'required'
    ];

    
}
