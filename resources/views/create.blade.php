@extends('templates.template')

@section('title', 'Tayouza Survey')

@section('content')
    <div>
        @if(isset($errors) && count($errors)>0)
            <div class="text-center my-4 p-2 alert alert-danger">
                @foreach($errors->all() as $error)
                    {{$error}}
                @endforeach
            </div>
        @endif
        <div class="text-center py-2">
            <h2>
                @if(isset($survey))
                    Alterar Enquete
                @else
                    Criar Enquete
                @endif
            </h2>
        </div>

        <div class="flex flex-column justify-content-center align-items-center">
            @php
                $route = isset($survey) ? url("survey/$survey->id") : url("survey");
            @endphp
            <form action="{{ $route }}" method="POST" name="registerSurvey" id="registerSurvey"
                  class="d-flex flex-column align-items-center justify-content-center">
                @csrf
                <div class="title mb-2">
                    <input type="text" value="{{$survey->title ?? ''}}" name="title" id="title"
                           class="form-control my-2" placeholder="Titulo" key="{{$survey->id ?? ''}}" required>
                </div>

                <div id="options">
                    @if(isset($survey))
                        @foreach($survey->options as $answer)
                            <div class="answerWrapper">
                                <input type="text" name="answer[]" class="form-control my-1 inputAnswerText" value="{{ $answer->name }}" required>
                                <input type="button" value="X" onclick="removeInput(this)" class="remove-btn">
                            </div>
                        @endforeach
                    @endif
                </div>

                <input type="button" value="+" onclick="duplicateInput()"
                       class="btn btn-primary rounded-circle mt-3 add-btn">

                <div class="date-end">
                    <label for="finish_at">Este enquete deve terminar em: </label>
                    <input type="datetime-local" min="{{ str_replace(' ', 'T', date('Y-m-d H:i')) }}"
                           value="{{isset($survey) ? str_replace(' ', 'T',$survey->finish_at) : ''}}" name="finish_at"
                           id="finish_at" class="form-control" required>
                </div>
                <input type="submit" value="{{isset($survey) ? 'Alterar' : 'Criar' }}" class="btn btn-success my-2">
            </form>
        </div>
    </div>
@endsection
