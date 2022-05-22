@extends('templates.template')

@section('title', 'Tayouza Survey')

@section('content')

<div class="container">
    @if(isset($errors) && count($errors)>0)
    <div class="text-center my-4 p-2 alert alert-danger">
        @foreach($errors->all() as $error)
        {{$error}}
        @endforeach
    </div>
    @endif
    <div class="text-center py-2">
        <h2>@if(isset($survey))Alterar Enquete @else Criar Enquete @endif</h2>
    </div>

    <div class="flex flex-column justify-content-center align-items-center">
        @if(isset($survey))
        <form action="{{url("survey/{$survey->id}")}}" method="POST" name="registerSurvey" id="editrSurvey"
            class="d-flex flex-column align-items-center justify-content-center">
            @method('PUT')
        @else
        <form action="{{url('survey')}}" method="POST" name="registerSurvey" id="registerSurvey"
            class="d-flex flex-column align-items-center justify-content-center">
        @endif
            @csrf
            <div class="title">
                <input type="text" value="{{$survey->title ?? ''}}" name="title" id="title" class="form-control my-2" placeholder="Titulo" key="{{$survey->id ?? ''}}" required>
            </div>
            <input type="button" value="Adicionar resposta" onclick="duplicateInput()" class="btn btn-primary mb-3">

            <div id="options"></div>

            <div class="date-end">
                <label for="ended_at">Este enquete deve terminar em: </label>
                <input type="datetime-local" value="{{isset($survey) ? str_replace(' ', 'T',$survey->ended_at) : ''}}" name="ended_at" id="ended_at" class="form-control" required>
            </div>
            <input type="submit" value="@if(isset($survey))Alterar @else Criar @endif" class="btn btn-success my-2">
        </form>
    </div>
</div>

<script src="/js/create.js"></script>
@endsection