@extends("base")

@section('title', 'Login')

@section('content')
       
    <h2>Login</h2>

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

    <form method="POST" action="{{ route('login.login') }}">
        @csrf
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

    <button type="submit" class="btn btn-primary mb-2">Login</button>
    </form>
    
 @endsection
  