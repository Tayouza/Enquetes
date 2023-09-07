<?php

namespace App\Http\Controllers;

use App\Models\Survey;
use App\Models\SurveyOption;
use Exception;
use App\Http\Requests\SurveyRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class SurveysController extends Controller
{
    public function __construct(
        readonly private Survey $survey,
        readonly private SurveyOption $surveyOption,
    ) {
    }

    public function index(): View
    {
        $surveys = $this->survey->all();

        foreach ($surveys as $survey) {
            $end = $survey->finish_at;
            if (strtotime($end) <= time()) {
                $this->survey->destroy($survey->id);
            }
        }

        $surveys = $this->survey->all();

        return view('index', compact('surveys'));
    }

    public function create(): View
    {
        return view('create');
    }

    public function store(SurveyRequest $request): RedirectResponse|View
    {
        DB::beginTransaction();

        try {
            $answers = $request->input('answer');

            $survey = $this->survey->create([
                'title' => $request->input('title'),
                'creator_id' => 1,
                'finish_at' => str_replace('T', ' ', $request->input('finish_at'))
            ]);

            foreach ($answers as $answer) {
                $this->surveyOption->create([
                    'name' => $answer,
                    'survey_id' => $survey->id
                ]);
            }
            DB::commit();

            return redirect('survey');
        } catch (Exception $e) {
            $errors = $e;
            DB::rollBack();

            return view('fail', compact('errors'));
        }
    }

    public function show($id): View
    {
        $survey = $this->survey->find($id);
        $answers = $survey->options;

        return view('show', compact('survey', 'answers'));
    }

    public function edit($id): View
    {
        $survey = $this->survey->find($id);
        return view('create', compact('survey'));
    }

    public function update(SurveyRequest $request, int $id): RedirectResponse|View
    {
        DB::beginTransaction();

        try {
            $answers = $request->input('answer');

            $survey = $this->survey->find($id);
            $survey->finish_at = str_replace('T', ' ', $request->input('finish_at'));
            $survey->save();

            foreach ($answers as $answer) {
                $answer = $this->surveyOption
                    ->where('name', $answer)
                    ->first();

                if (! $answer) {
                    $this->surveyOption->create([
                        'name' => $answer,
                        'survey_id' => $survey->id
                    ]);
                }
            }
            DB::commit();

            return redirect('survey');
        } catch (Exception $e) {
            $errors = $e;
            DB::rollBack();

            return view('fail', compact('errors'));
        }
    }

    public function destroy($id): bool
    {
        return (bool) $this->survey->destroy($id);
    }
}
