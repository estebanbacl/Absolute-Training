<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreatequestionsRequest;
use App\Http\Requests\UpdatequestionsRequest;
use App\Repositories\questionsRepository;
use App\Http\Controllers\AppBaseController as InfyOmBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class questionsController extends InfyOmBaseController
{
    /** @var  questionsRepository */
    private $questionsRepository;

    public function __construct(questionsRepository $questionsRepo)
    {
        $this->questionsRepository = $questionsRepo;
    }


    /**
     * Display a listing of the questions.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->questionsRepository->pushCriteria(new RequestCriteria($request));
        $questions = $this->questionsRepository->all();

        return view('questions.index')
            ->with('questions', $questions);
    }

    /**
     * Show the form for creating a new questions.
     *
     * @return Response
     */
    public function create()
    {
        return view('questions.create');
    }

    /**
     * Store a newly created questions in storage.
     *
     * @param CreatequestionsRequest $request
     *
     * @return Response
     */
    public function store(CreatequestionsRequest $request)
    {
        $input = $request->all();

        $questions = $this->questionsRepository->create($input);

        Flash::success('questions saved successfully.');

        return redirect(route('questions.index'));
    }

    /**
     * Display the specified questions.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $questions = $this->questionsRepository->findWithoutFail($id);

        if (empty($questions)) {
            Flash::error('questions not found');

            return redirect(route('questions.index'));
        }

        return view('questions.show')->with('questions', $questions);
    }

    /**
     * Show the form for editing the specified questions.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $questions = $this->questionsRepository->findWithoutFail($id);

        if (empty($questions)) {
            Flash::error('questions not found');

            return redirect(route('questions.index'));
        }

        return view('questions.edit')->with('questions', $questions);
    }

    /**
     * Update the specified questions in storage.
     *
     * @param  int              $id
     * @param UpdatequestionsRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatequestionsRequest $request)
    {
        $questions = $this->questionsRepository->findWithoutFail($id);

        if (empty($questions)) {
            Flash::error('questions not found');

            return redirect(route('questions.index'));
        }

        $questions = $this->questionsRepository->update($request->all(), $id);

        Flash::success('questions updated successfully.');

        return redirect(route('questions.index'));
    }

    /**
     * Remove the specified questions from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $questions = $this->questionsRepository->findWithoutFail($id);

        if (empty($questions)) {
            Flash::error('questions not found');

            return redirect(route('questions.index'));
        }

        $this->questionsRepository->delete($id);

        Flash::success('questions deleted successfully.');

        return redirect(route('questions.index'));
    }
}
