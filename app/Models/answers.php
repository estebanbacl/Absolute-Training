<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @SWG\Definition(
 *      definition="answers",
 *      required={},
 *      @SWG\Property(
 *          property="answers_id",
 *          description="answers_id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="questions_id",
 *          description="questions_id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="answer_es",
 *          description="answer_es",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="answer_en",
 *          description="answer_en",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="response",
 *          description="response",
 *          type="boolean"
 *      ),
 *      @SWG\Property(
 *          property="rel_response",
 *          description="rel_response",
 *          type="integer",
 *          format="int32"
 *      )
 * )
 */
class answers extends Model
{
    use SoftDeletes;

    public $table = 'answers';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];

    protected $primaryKey = 'answers_id';

    public $fillable = [
        'questions_id',
        'answer_es',
        'answer_en',
        'response',
        'rel_response',
        'deleted_at'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'answers_id' => 'integer',
        'questions_id' => 'integer',
        'answer_es' => 'string',
        'answer_en' => 'string',
        'response' => 'boolean',
        'rel_response' => 'integer',
        'deleted_at' => 'datetime'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];
}
