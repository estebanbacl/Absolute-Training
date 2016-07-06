<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @SWG\Definition(
 *      definition="questions",
 *      required={},
 *      @SWG\Property(
 *          property="questions_id",
 *          description="questions_id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="questions_es",
 *          description="questions_es",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="questions_en",
 *          description="questions_en",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="type",
 *          description="type",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="state",
 *          description="state",
 *          type="boolean"
 *      ),
 *      @SWG\Property(
 *          property="created_at",
 *          description="created_at",
 *          type="string",
 *          format="date"
 *      )
 * )
 */
class questions extends Model
{
    use SoftDeletes;

    public $table = 'questions';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];

    protected $primaryKey = 'questions_id';

    public $fillable = [
        'questions_es',
        'questions_en',
        'type',
        'state'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'questions_id' => 'integer',
        'questions_es' => 'string',
        'questions_en' => 'string',
        'type' => 'string',
        'state' => 'boolean'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];
}
