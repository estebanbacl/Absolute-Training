<?php

use App\Models\questions;
use App\Repositories\questionsRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class questionsRepositoryTest extends TestCase
{
    use MakequestionsTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var questionsRepository
     */
    protected $questionsRepo;

    public function setUp()
    {
        parent::setUp();
        $this->questionsRepo = App::make(questionsRepository::class);
    }

    /**
     * @test create
     */
    public function testCreatequestions()
    {
        $questions = $this->fakequestionsData();
        $createdquestions = $this->questionsRepo->create($questions);
        $createdquestions = $createdquestions->toArray();
        $this->assertArrayHasKey('id', $createdquestions);
        $this->assertNotNull($createdquestions['id'], 'Created questions must have id specified');
        $this->assertNotNull(questions::find($createdquestions['id']), 'questions with given id must be in DB');
        $this->assertModelData($questions, $createdquestions);
    }

    /**
     * @test read
     */
    public function testReadquestions()
    {
        $questions = $this->makequestions();
        $dbquestions = $this->questionsRepo->find($questions->id);
        $dbquestions = $dbquestions->toArray();
        $this->assertModelData($questions->toArray(), $dbquestions);
    }

    /**
     * @test update
     */
    public function testUpdatequestions()
    {
        $questions = $this->makequestions();
        $fakequestions = $this->fakequestionsData();
        $updatedquestions = $this->questionsRepo->update($fakequestions, $questions->id);
        $this->assertModelData($fakequestions, $updatedquestions->toArray());
        $dbquestions = $this->questionsRepo->find($questions->id);
        $this->assertModelData($fakequestions, $dbquestions->toArray());
    }

    /**
     * @test delete
     */
    public function testDeletequestions()
    {
        $questions = $this->makequestions();
        $resp = $this->questionsRepo->delete($questions->id);
        $this->assertTrue($resp);
        $this->assertNull(questions::find($questions->id), 'questions should not exist in DB');
    }
}
