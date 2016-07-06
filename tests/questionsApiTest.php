<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class questionsApiTest extends TestCase
{
    use MakequestionsTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreatequestions()
    {
        $questions = $this->fakequestionsData();
        $this->json('POST', '/api/v1/questions', $questions);

        $this->assertApiResponse($questions);
    }

    /**
     * @test
     */
    public function testReadquestions()
    {
        $questions = $this->makequestions();
        $this->json('GET', '/api/v1/questions/'.$questions->id);

        $this->assertApiResponse($questions->toArray());
    }

    /**
     * @test
     */
    public function testUpdatequestions()
    {
        $questions = $this->makequestions();
        $editedquestions = $this->fakequestionsData();

        $this->json('PUT', '/api/v1/questions/'.$questions->id, $editedquestions);

        $this->assertApiResponse($editedquestions);
    }

    /**
     * @test
     */
    public function testDeletequestions()
    {
        $questions = $this->makequestions();
        $this->json('DELETE', '/api/v1/questions/'.$questions->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/questions/'.$questions->id);

        $this->assertResponseStatus(404);
    }
}
