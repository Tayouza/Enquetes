<?php

namespace App\Http\Controllers;

use App\Models\ModelSurvey;
use Exception;
use App\Http\Requests\SurveyRequest;

class SurveysController extends Controller
{
    private $objSurvey;

    public function __construct()
    {
        $this->objSurvey = new ModelSurvey();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $surveys = $this->objSurvey->all();

        return view('index', compact('surveys'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SurveyRequest $request)
    {
        try {
            date_default_timezone_set('America/Sao_Paulo');

            $answers = $request->answer;

            $toJSON = json_encode($this->surveyAnswersToJSON($answers), JSON_UNESCAPED_UNICODE);

            $this->objSurvey->create([
                'title' => $request->title,
                'answers' => $toJSON,
                'created_at' => date('Y-m-d H:i:s'),
                'uploaded_at' => date('Y-m-d H:i:s'),
                'ended_at' => str_replace('T', ' ', $request->ended_at)
            ]);
            return redirect('survey');
        } catch (Exception $e) {
            $errors = $e;
            return view('fail', compact('errors'));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $survey = $this->objSurvey->find($id);
        //make string coming from db in array
        $answers = json_decode($survey->answers);

        return view('show', compact('survey', 'answers'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $survey = $this->objSurvey->find($id);
        return view('create', compact('survey'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SurveyRequest $request, $id)
    {
        date_default_timezone_set('America/Sao_Paulo');

        $answers = $request->answer;

        $toJSON = $this->surveyAnswersToJSON($answers);

        try {
            $this->objSurvey->where(['id' => $id])->update([
                'title' => $request->title,
                'answers' => json_encode($toJSON, JSON_UNESCAPED_UNICODE),
                'updated_at' => date('Y-m-d H:i:s'),
                'ended_at' => str_replace('T', ' ', $request->ended_at)
            ]);
            return redirect('survey');
        } catch (Exception $e) {
            $error = $e;
            return view('fail', compact('error'));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $deleted = $this->objSurvey->destroy($id);
        return $deleted ? true : false;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return JSON
     */
    public function getAnswers($id)
    {
        $answers = $this->objSurvey->find($id);
        return json_encode($answers, JSON_UNESCAPED_UNICODE);
    }

    private function surveyAnswersToJSON($arr)
    {
        $iterator = new \ArrayIterator($arr);

        $newArrKeyValue = [];

        while ($iterator->valid()) {

            $newArrKeyValue[$iterator->current()] = "0";

            $iterator->next();
        }

        return $newArrKeyValue;
    }
}
