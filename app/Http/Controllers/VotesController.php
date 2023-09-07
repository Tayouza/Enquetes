<?php

namespace App\Http\Controllers;

use App\Models\Survey;
use App\Models\User;
use App\Models\Vote;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Exception;

class VotesController extends Controller
{
    public function __construct(
        readonly private Vote $vote,
        readonly private Survey $survey,
    ) {
    }

    public function show($id)
    {
        $survey = $this->survey->find($id);

        $answers = $survey->options;

        $maxVotes = $answers->map(
            fn($answer) => $answer->votes
                ->count()
        )
            ->max();

        $totalVotes = $answers->map(
            fn($answer) => $answer->votes
                ->count()
        )
            ->sum();

        return view('countvotes', compact('survey', 'answers', 'totalVotes', 'maxVotes'));
    }

    public function vote(Request $request): RedirectResponse
    {
        $vote = $request->input('vote');

        $vote = $this->vote->create([
            'survey_option_id' => $vote,
            'user_id' => 2
        ]);

        $id = $vote->surveyOption->survey->id;

        return redirect("countvotes/$id");
    }

    public function update(Request $request, $id)
    {
        $vote = $request->answer;

        $answers = $this->survey->find($id);

        $arrAnswers = (array) json_decode($answers->answers);

        $arrAnswers[$vote] = (int) $arrAnswers[$vote] + 1;

        try {
            $this->survey->where(['id' => $id])->update([
                'answers' => json_encode($arrAnswers, JSON_UNESCAPED_UNICODE),
                'updated_at' => date('Y-m-d H:i:s')
            ]);
            return redirect("/countvotes/$id");
        } catch (Exception $e) {
            $error = $e;
            return view('fail', compact('error'));
        }
    }

    public function destroy($id)
    {
        //
    }
}
