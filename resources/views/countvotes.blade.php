@extends("templates.template")

@section('title', 'Tayouza Survey')

@section('content')
<h2>{{$answer->title}}</h2>

@foreach($votes as $key => $value)
@php
$percentVotes = $value / $totalVotes * 100;
@endphp

<label for="">{{$key}}</label>

<div class="progress">
    <div class="progress-bar" role="progressbar" style="width: {{$percentVotes}}%" aria-valuenow="{{$percentVotes}}" aria-valuemin="0"
        aria-valuemax="100"></div>
</div>
<p>Votos: {{$value}}</p>
@endforeach

<h4 class="text-center">Total de votos da enquete: {{$totalVotes}}</h4>

<div class="text-center mt-4">
    <a href="{{url("/survey/{$answer->id}")}}" class="btn btn-warning">Votar novamente</a>
</div>

@endsection