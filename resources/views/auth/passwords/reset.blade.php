

@extends('auth.secure')

@section('content')
<div class="card-body">
    <form class="form-horizontal form-material" id="loginform" method="POST"  action="{{ route('password.update') }}">
        @csrf
        <h3 class="text-center m-b-20">{{ __('Reset Password') }}</h3>
        <div class="form-group ">
            <div class="col-xs-12">
                <input id="email" placeholder="Your email" type="email" value="{{ $email ?? old('email') }}" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
            </div>
        </div>
        <div class="form-group">
            <div class="col-xs-12">
                <input id="password" type="password" placeholder="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
             </div>
        </div>

        <div class="form-group">
            <div class="col-xs-12">
                <input id="password-confirm" placeholder="password confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
             </div>
        </div>

        <div class="form-group text-center">
            <div class="col-xs-12 p-b-20">
                <button type="submit" class="btn btn-block btn-lg btn-info btn-rounded">
                    {{ __('Reset Password') }}
                </button>
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
    <form class="form-horizontal" id="recoverform" method="POST" action="{{ route('password.email') }}">
        @csrf
        <div class="form-group ">
            <div class="col-xs-12">
                <h3>Recover Password</h3>
                <p class="text-muted">Enter your Email and instructions will be sent to you! </p>
            </div>
        </div>
        <div class="form-group ">
            <div class="col-xs-12">
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
        </div>
        <div class="form-group text-center m-t-20">
            <div class="col-xs-12">
                <button class="btn btn-primary btn-lg btn-block text-uppercase waves-effect waves-light" type="submit">Reset</button>
            </div>
        </div>
    </form>
</div>
@stop

