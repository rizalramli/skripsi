<?php

namespace App\Models;

use Eloquent as Model;
// use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Criterias
 * @package App\Models
 * @version January 4, 2021, 5:21 am UTC
 *
 * @property string $name
 * @property string $attribute
 * @property integer $weight
 */
class Criterias extends Model
{
    // use SoftDeletes;

    use HasFactory;

    public $table = 'criterias';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'name',
        'attribute',
        'weight'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'attribute' => 'string',
        'weight' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required|string|max:50',
        'attribute' => 'required|string|max:50',
        'weight' => 'required|integer',
        'created_at' => 'nullable',
        'updated_at' => 'nullable'
    ];
}
