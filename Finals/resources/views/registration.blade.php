@include('cdn')
@extends('welcome')
@section('content')
@yield('content')

<div class="row justify-content-center">
    <div class="col-md-4">
        <div class="card" style="background-color: #e5e5e5;">
        <div class="card-header"> REGISTRATION </div>
        <div class="card-body">
            <form action="{{ route('welcome.validate_registration') }}" method="post">
                @csrf
                <div class="form-group mb-3">
                    <input type="text" name="name" class="form-control" placeholder="Name"/>
                    @if($errors->has('name'))
                        <span class="text-danger">{{ $errors->first('name') }}</span>
                    @endif
                </div>
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
                    <button type="submit" class="btn" style="background-color: #451528; color: white;"> REGISTER </button>
            </form>
        </div>
    </div>
</div>
                
        

@endsection('content')