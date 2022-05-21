<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SurveyRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'title'=>'required',
            'answer'=>'required',
            'ended_at'=>'required'
        ];
    }

    public function messages()
    {
        return [
            'title.required'=>'Sua enquete precisa de um Título',
            'ended_at.required'=>'Adicione uma data para encerar a enquete'
        ];
    }
}
