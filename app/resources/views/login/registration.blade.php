@extends("base")

@section('title', 'Registration')

@section('content')

    <h2>registration</h2>

    @if($errors->any())

        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('registration.store') }}">
        @csrf

    <div class="form-group row">
        <div class="col-sm-10">
        <input type="text" name="name" class="form-control" id="inputName" placeholder="Name">
        </div>
     </div>
    <div class="form-group row">
        <div class="col-sm-10">
        <input type="text" name="email" class="form-control" id="inputEmail" placeholder="Email">
        </div>
    </div>
    <div class="form-group row">
        <div class="col-sm-10">
        <input type="password" name="password" class="form-control" id="inputPassword" placeholder="Password">
        </div>
    </div>
    <div class="form-group row">
        <div class="col-sm-10">
        <input type="password" name="password_confirmation" class="form-control" id="inputPasswordConfirmation" placeholder="password confirmation">
        </div>
    </div>

    <button type="submit" class="btn btn-primary mb-2">Registration</button>
    </form>

 @endsection
