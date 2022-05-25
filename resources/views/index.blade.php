@extends('templates.template')

@section('title', 'Tayouza Survey')

@section('content')
<div>
    <div class="text-center py-2">
        <h1>Tayouza Surveys</h1>
        <a href="{{url("survey/create")}}" class="btn btn-success">Nova enquete</a>
    </div>
    <div class="d-flex justify-content-center align-itens-center flex-wrap">
        @csrf
        @foreach($surveys as $survey)
        <div class="card m-3" style="width: 18rem;">
            <div class="card-body">
                <h5 class="card-title">{{$survey->title}}</h5>
                <p class="card-text">
                    Criado em: {{date('d/m/Y H:i', strtotime($survey->created_at))}}
                    Termina em: {{date('d/m/Y H:i', strtotime($survey->ended_at))}}
                </p>
                <div class="actions">
                    <a href="{{url("survey/{$survey->id}/edit")}}"
                        class="btn btn-warning">Editar</a>
                    <a href="{{url("survey/{$survey->id}")}}"
                        class="btn btn-primary">Votar</a>
                    <a href="{{url("survey/{$survey->id}")}}"
                        class="btn btn-danger btn-delete">Deletar</a>
                    <br>
                    <div class="mt-2" >
                        <a href="{{url("countvotes/{$survey->id}")}}" class="viewVotes">Visualizar votos</a>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

@endsection