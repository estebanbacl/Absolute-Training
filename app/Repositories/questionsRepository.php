<?php

namespace App\Repositories;

use App\Models\questions;
use InfyOm\Generator\Common\BaseRepository;

class questionsRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return questions::class;
    }
}
