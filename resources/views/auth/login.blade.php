@extends('layouts.app')

@section('content')
<style>
.loginform {
    width: 50%;
    margin: 0 auto;
    background: #e2c6c614;
    padding: 22px;
    border: 1px solid #ddd;
    box-shadow: 0px 0px 10px #ccc;
}
.innerform {
    padding: 20px;
    margin: 10px;
}
.form-control.emills {
    width: 96%;
    border-radius: 5px;
    padding: 10px;
}
button.btn.btn-primary.btnlogins {
    width: 100%;
    padding: 10px;
    border-radius: 5px;
    background: green;
    font-size: 18px;
}
label.col-md-4.col-form-label.userdets {
    color: #353535;
    font-size: 15px;
    font-weight: 500;
    line-height: 50px;
}
h2.ulofing {
    font-size: 22px;
    text-align: center;
    font-weight: bold;
}

p.regsuterer {
    text-align: right;
    margin-top: 10px;
    
}

</style>

<div class="container" style="margin-top:70px; margin-bottom:70px;">

    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="loginform">
            <h2 class="ulofing"> {{ __('Login') }} </h2>

                <div class="innerform">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group">
                            <label for="email" class="col-md-4 col-form-label userdets">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control emills @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password" class="col-md-4 col-form-label userdets">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control emills @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                       

                        <div class="form-group">
                            <div class="col-md-6">
                                <button type="submit" class="btn btn-primary btnlogins">
                                    {{ __('Login') }}
                                </button>

                                <p class="regsuterer"> <a style="color: #288fbd; font-weight: bold;" href="{{ route('register') }}"> Sign Up </a> </p>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
