<?php

use Faker\Factory as Faker;
use App\Models\questions;
use App\Repositories\questionsRepository;

trait MakequestionsTrait
{
    /**
     * Create fake instance of questions and save it in database
     *
     * @param array $questionsFields
     * @return questions
     */
    public function makequestions($questionsFields = [])
    {
        /** @var questionsRepository $questionsRepo */
        $questionsRepo = App::make(questionsRepository::class);
        $theme = $this->fakequestionsData($questionsFields);
        return $questionsRepo->create($theme);
    }

    /**
     * Get fake instance of questions
     *
     * @param array $questionsFields
     * @return questions
     */
    public function fakequestions($questionsFields = [])
    {
        return new questions($this->fakequestionsData($questionsFields));
    }

    /**
     * Get fake data of questions
     *
     * @param array $postFields
     * @return array
     */
    public function fakequestionsData($questionsFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'questions_es' => $fake->word,
            'questions_en' => $fake->word,
            'type' => $fake->word,
            'state' => $fake->word,
            'created_at' => $fake->word,
            'updated_at' => $fake->word,
            'deleted_at' => $fake->word
        ], $questionsFields);
    }
}
