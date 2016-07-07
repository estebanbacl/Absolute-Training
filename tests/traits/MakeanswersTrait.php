<?php

use Faker\Factory as Faker;
use App\Models\answers;
use App\Repositories\answersRepository;

trait MakeanswersTrait
{
    /**
     * Create fake instance of answers and save it in database
     *
     * @param array $answersFields
     * @return answers
     */
    public function makeanswers($answersFields = [])
    {
        /** @var answersRepository $answersRepo */
        $answersRepo = App::make(answersRepository::class);
        $theme = $this->fakeanswersData($answersFields);
        return $answersRepo->create($theme);
    }

    /**
     * Get fake instance of answers
     *
     * @param array $answersFields
     * @return answers
     */
    public function fakeanswers($answersFields = [])
    {
        return new answers($this->fakeanswersData($answersFields));
    }

    /**
     * Get fake data of answers
     *
     * @param array $postFields
     * @return array
     */
    public function fakeanswersData($answersFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'questions_id' => $fake->randomDigitNotNull,
            'answer_es' => $fake->word,
            'answer_en' => $fake->word,
            'response' => $fake->word,
            'rel_response' => $fake->randomDigitNotNull,
            'created_at' => $fake->word,
            'updated_at' => $fake->word,
            'deleted_at' => $fake->word
        ], $answersFields);
    }
}
