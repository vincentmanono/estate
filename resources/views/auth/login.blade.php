
@extends('auth.secure')

@section('content')
<div class="card-body">
    <form class="form-horizontal form-material" id="loginform" method="POST" action="{{ route('login') }}">
        @csrf
        <h3 class="text-center m-b-20">Sign In</h3>
        <div class="form-group ">
            <div class="col-xs-12">
                <input id="email" placeholder="Your email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
            </div>
        </div>
        <div class="form-group">
            <div class="col-xs-12">
                <input id="password" type="password" placeholder="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
             </div>
        </div>
        <div class="form-group row">
            <div class="col-md-12">
                <div class="d-flex no-block align-items-center">
                    <div class="custom-control custom-checkbox">
                        {{--  <input type="checkbox" class="custom-control-input" id="customCheck1">  --}}
                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                        <label class="custom-control-label" for="remember">Remember me</label>
                    </div>
                    <div class="ml-auto">
                        @if (Route::has('password.request'))
                                                    <a href="{{ route('password.request') }}" id="to-recover" class="text-muted"><i class="fas fa-lock m-r-5"></i> Forgot pwd?</a>

                        @endif
                    </div>
                </div>
            </div>
        </div>
        <div class="form-group text-center">
            <div class="col-xs-12 p-b-20">
                <button type="submit" class="btn btn-block btn-lg btn-info btn-rounded" type="submit">Log In</button>
            </div>
        </div>

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 m-t-10 text-center">
                <div class="social">
                    <button class="btn  btn-facebook" data-toggle="tooltip" title="Login with Facebook"> <i aria-hidden="true" class="fab fa-facebook-f"></i> </button>
                    <button class="btn btn-googleplus" data-toggle="tooltip" title="Login with Google"> <i aria-hidden="true" class="fab fa-google-plus-g"></i> </button>
                </div>
            </div>
        </div>

    </form>

</div>
@stop
