@section('title', 'fail')

@section('content')

<div class="text-center my-4 p-2 alert alert-danger">
    @if(isset($errors))
        {{$errors}}
    @endif
</div>

@endsection