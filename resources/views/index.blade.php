@extends('templates.template')

@section('title', 'Teste Crud')

@section('content')

<div class="container">
    <h1 class="text-center py-1">Tayouza Surveys</h1>
    <table class="table">
        <thead>
            <tr>
                <th>Id</th>
                <th>Título</th>
                <th>Inicio</th>
                <th>Término</th>
            </tr>
        </thead>
        <tbody>
            @foreach($surveys as $survey)
            <tr>
                <td>{{$survey->id}}</td>
                <td>{{$survey->title}}</td>
                <td>{{$survey->created_at->format('d/m/Y H:i')}}</td>
                <td>{{$survey->end_at->format('d/m/Y H:i')}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection