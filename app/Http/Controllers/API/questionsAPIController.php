<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreatequestionsAPIRequest;
use App\Http\Requests\API\UpdatequestionsAPIRequest;
use App\Models\questions;
use App\Repositories\questionsRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController as InfyOmBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use InfyOm\Generator\Utils\ResponseUtil;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class questionsController
 * @package App\Http\Controllers\API
 */

class questionsAPIController extends InfyOmBaseController
{
    /** @var  questionsRepository */
    private $questionsRepository;

    public function __construct(questionsRepository $questionsRepo)
    {
        $this->questionsRepository = $questionsRepo;
    }
    
    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/questions",
     *      summary="Get a listing of the questions.",
     *      tags={"questions"},
     *      description="Get all questions",
     *      produces={"application/json"},
     *      @SWG\Response(
     *          response=200,
     *          description="successful operation",
     *          @SWG\Schema(
     *              type="object",
     *              @SWG\Property(
     *                  property="success",
     *                  type="boolean"
     *              ),
     *              @SWG\Property(
     *                  property="data",
     *                  type="array",
     *                  @SWG\Items(ref="#/definitions/questions")
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function index(Request $request)
    {
        $this->questionsRepository->pushCriteria(new RequestCriteria($request));
        $this->questionsRepository->pushCriteria(new LimitOffsetCriteria($request));
        $questions = $this->questionsRepository->all();

        return $this->sendResponse($questions->toArray(), 'questions retrieved successfully');
    }


    /**
     * @param CreatequestionsAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/questions",
     *      summary="Store a newly created questions in storage",
     *      tags={"questions"},
     *      description="Store questions",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="questions that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/questions")
     *      ),
     *      @SWG\Response(
     *          response=200,
     *          description="successful operation",
     *          @SWG\Schema(
     *              type="object",
     *              @SWG\Property(
     *                  property="success",
     *                  type="boolean"
     *              ),
     *              @SWG\Property(
     *                  property="data",
     *                  ref="#/definitions/questions"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreatequestionsAPIRequest $request)
    {
        $input = $request->all();

        $questions = $this->questionsRepository->create($input);

        return $this->sendResponse($questions->toArray(), 'questions saved successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/questions/{id}",
     *      summary="Display the specified questions",
     *      tags={"questions"},
     *      description="Get questions",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of questions",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Response(
     *          response=200,
     *          description="successful operation",
     *          @SWG\Schema(
     *              type="object",
     *              @SWG\Property(
     *                  property="success",
     *                  type="boolean"
     *              ),
     *              @SWG\Property(
     *                  property="data",
     *                  ref="#/definitions/questions"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function show($id)
    {
        /** @var questions $questions */
        $questions = $this->questionsRepository->find($id);

        if (empty($questions)) {
            return Response::json(ResponseUtil::makeError('questions not found'), 404);
        }

        return $this->sendResponse($questions->toArray(), 'questions retrieved successfully');
    }

    /**
     * @param int $id
     * @param UpdatequestionsAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/questions/{id}",
     *      summary="Update the specified questions in storage",
     *      tags={"questions"},
     *      description="Update questions",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of questions",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="questions that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/questions")
     *      ),
     *      @SWG\Response(
     *          response=200,
     *          description="successful operation",
     *          @SWG\Schema(
     *              type="object",
     *              @SWG\Property(
     *                  property="success",
     *                  type="boolean"
     *              ),
     *              @SWG\Property(
     *                  property="data",
     *                  ref="#/definitions/questions"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdatequestionsAPIRequest $request)
    {
        $input = $request->all();

        /** @var questions $questions */
        $questions = $this->questionsRepository->find($id);

        if (empty($questions)) {
            return Response::json(ResponseUtil::makeError('questions not found'), 404);
        }

        $questions = $this->questionsRepository->update($input, $id);

        return $this->sendResponse($questions->toArray(), 'questions updated successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/questions/{id}",
     *      summary="Remove the specified questions from storage",
     *      tags={"questions"},
     *      description="Delete questions",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of questions",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Response(
     *          response=200,
     *          description="successful operation",
     *          @SWG\Schema(
     *              type="object",
     *              @SWG\Property(
     *                  property="success",
     *                  type="boolean"
     *              ),
     *              @SWG\Property(
     *                  property="data",
     *                  type="string"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function destroy($id)
    {
        /** @var questions $questions */
        $questions = $this->questionsRepository->find($id);

        if (empty($questions)) {
            return Response::json(ResponseUtil::makeError('questions not found'), 404);
        }

        $questions->delete();

        return $this->sendResponse($id, 'questions deleted successfully');
    }
}
