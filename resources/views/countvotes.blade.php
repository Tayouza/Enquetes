@extends("templates.template")

@section('title', 'Tayouza Survey')

@section('content')
    {{dd((int)((array)json_decode($answers->answers))['Terça'])}}
@endsection