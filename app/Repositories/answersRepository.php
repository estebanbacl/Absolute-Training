<?php

namespace App\Repositories;

use App\Models\answers;
use InfyOm\Generator\Common\BaseRepository;

class answersRepository extends BaseRepository
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
        return answers::class;
    }
}
