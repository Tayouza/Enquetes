@extends('templates.template')

@section('title', 'Tayouza Survey')

@section('content')

<div>
    <div class="text-center py-2">
        <h2>{{$survey->title}}</h2>
    </div>
    <div class="d-flex flex-column justify-content-center align-items-center flex-wrap">
        <p>Criado em: {{date('d/m/Y H:i', strtotime($survey->created_at))}}</p>
        <p>Termina em: {{date('d/m/Y H:i', strtotime($survey->ended_at))}}</p>
    </div>
    <div class="flex flex-column justify-content-center align-items-center">
        <form action="" class="d-flex flex-column align-items-center justify-content-center form-votes">
            @csrf
            <table class="table-survey">
                <tbody>
                    @foreach($answers as $answer)
                    <tr>
                        <td>
                            <span>{{$answer}}</span>
                        </td>
                        <td>
                            <input type="radio" name="answer">
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