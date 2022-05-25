<?php

namespace App\Http\Controllers;

use App\Models\ModelSurvey;
use Illuminate\Http\Request;
use Exception;

class VotesController extends Controller
{

    protected $objSurvey;

    public function __construct(){
        $this->objSurvey = new ModelSurvey();
    } 
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }


    /**
     * Show votes counted.
     *
     * @param  int  $id
     * @return JSON
     */
    public function show($id)
    {

        $answer = $this->objSurvey->find($id);

        $votes = (array) json_decode($answer->answers);

        $totalVotes = 0;
        foreach($votes as $key => $value){
            $totalVotes += $votes[$key]; 
        }

        return view('countvotes', compact('answer', 'votes', 'totalVotes'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        date_default_timezone_set('America/Sao_Paulo');

        $vote = $request->answer;

        $answers = $this->objSurvey->find($id);

        $arrAnswers = (array) json_decode($answers->answers);

        $arrAnswers[$vote] = (int) $arrAnswers[$vote] + 1;

        try {
            $this->objSurvey->where(['id' => $id])->update([
                'answers' => json_encode($arrAnswers, JSON_UNESCAPED_UNICODE),
                'updated_at' => date('Y-m-d H:i:s')
            ]);
            return redirect("/countvotes/{$id}");
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
        //
    }
}
