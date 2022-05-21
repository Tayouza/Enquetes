<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\ModelSurvey;
use Exception;
use App\Http\Requests\SurveyRequest;

class SurveysController extends Controller
{

    private $objSurvey;

    public function __construct()
    {
        $this->objUser = new User();
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
            $this->objSurvey->create([
                'title' => $request->title,
                'answers' => json_encode($request->answer, JSON_UNESCAPED_UNICODE),
                'ended_at' => str_replace('T', ' ', $request->ended_at)
            ]);
            return redirect('survey');
        } catch (Exception $e) {
            return redirect('fail');
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
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
}
