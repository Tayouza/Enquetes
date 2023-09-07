@extends('templates.template')

@section('title', 'Tayouza Survey')

@section('content')
    <div>
        <div class="text-center py-2">
            <h2>{{ $survey->title }}</h2>
        </div>
        <div class="d-flex flex-column justify-content-center align-items-center flex-wrap">
            <p>Criado em: {{ date('d/m/Y H:i', strtotime($survey->created_at)) }}</p>
            <p>Termina em: {{ date('d/m/Y H:i', strtotime($survey->ended_at)) }}</p>
        </div>
        <div class="d-flex flex-column justify-content-center align-items-center">
            <form action="{{ url("votes") }}" method="POST"
                  class="d-flex flex-column align-items-center justify-content-center form-votes w-100">
                @csrf
                <table class="table-survey w-100">
                    <tbody>
                    @foreach($answers as $answer)
                        <tr class="w-100">
                            <td class="d-flex justify-content-between fs-5 w-100">
                                <label for="answer-{{ $answer->id}}">
                                    {{ $answer->name }}
                                </label>
                                <div class="d-flex gap-2">
                                    <input type="radio" id="answer-{{ $answer->id}}" name="vote"
                                           value="{{ $answer->id }}" required>
                                    <span class="fs-6 fw-light"><em>Total de votos: {{ $answer->votes->count() }}</em></span>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <input type="submit" value="Votar" class="btn btn-success my-4">
            </form>
        </div>
    </div>

@endsection
