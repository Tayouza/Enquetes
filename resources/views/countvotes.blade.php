@extends("templates.template")

@section('title', 'Tayouza Survey')

@section('content')
<h2>{{$survey->title}}</h2>

@foreach($answers as $answer)
@php
if($totalVotes !== 0){
    $percentVotes = $answer->votes->count() / $maxVotes * 100;
}else{
    $percentVotes = 0;
}
@endphp

<label for="">{{$answer->name}}</label>

<div class="progress">
    <div class="progress-bar" role="progressbar" style="width: {{$percentVotes}}%" aria-valuenow="{{$percentVotes}}" aria-valuemin="0"
        aria-valuemax="100"></div>
</div>
<p>Votos: {{$answer->votes->count()}}</p>
@endforeach

<h4 class="text-center">Total de votos da enquete: {{$totalVotes}}</h4>

<div class="text-center mt-4">
    <a href="{{url("survey/{$survey->id}")}}" class="btn btn-warning">Votar novamente</a>
</div>

@endsection
