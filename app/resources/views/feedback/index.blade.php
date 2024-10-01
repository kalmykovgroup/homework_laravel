@extends("base")

@section('title', 'Feedback')

@section('content')

    <h2>Форма обратной связи</h2>

    @if(session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif

    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('feedback.post') }}">
        @csrf
        <div class="form-group row">
            <div class="col-sm-10">
                <input type="text" name="email" class="form-control" id="inputEmail" placeholder="Email">
            </div>
            <div class="col-sm-10">
                <textarea name="text" id="inputText"  rows="10"  placeholder="Text"></textarea>
            </div>
        </div>
        <button type="submit" class="btn btn-primary mb-2">Отправить</button>
    </form>

@endsection
