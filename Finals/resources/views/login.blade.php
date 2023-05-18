@extends('welcome')

@section('content')

@if($message = Session::get('success'))

<div class="alert alert-info"> 
    {{ $message }}
</div>

@endif

<div class="row justify-content-center">
    <div class="col-md-4">
        <div class="card" style="background-color: #e5e5e5;">
            <div class="card-header"> LOGIN </div>
            <div class="card-body"> 
                <form action="{{ route('welcome.validate_login') }}" method="post">
                    @csrf
                    <div class="form-group mb-3">
                        <input type="email" name="email" class="form-control" placeholder="Email"/>
                        @if($errors->has('email'))
                            <span class="text-danger">{{ $errors->first('email') }}</span>
                        @endif
                    </div>
                    <div class="form-group mb-3">
                        <input type="password" name="password" class="form-control" placeholder="Password"/>
                        @if($errors->has('password'))
                            <span class="text-danger">{{ $errors->first('password') }}</span>
                        @endif
                    </div>
                    <div class="d-grid max-auto">
                        <button type="submit" class="btn" style="background-color: #451528; color: white;">LOGIN</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection('content')