<!DOCTYPE html>
<html>
<head>
   @include("layouts.head")
    <link rel="stylesheet" href="{{ URL::asset('/plugins/iCheck/square/blue.css') }}">
</head>
<body class="hold-transition login-page">
<div class="login-box">
    <div class="login-logo">
        <a href="{{ url('/') }}"><b>Sistem </b>Surat Tugas</a>
    </div>
    <!-- /.login-logo -->
    <div class="login-box-body">
        <p class="login-box-msg">Sign in to start your session</p>

        <form method="POST" action="{{ route('login') }}" aria-label="{{ __('Login') }}">
            @csrf

            <div class="form-group has-feedback">
                <input type="email" name="email" class="form-control" placeholder="Email" required>
                @if ($errors->has('email'))
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                @endif
                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
                <input id="password" type="password" class="form-control {{ $errors->has('password') ? ' is-invalid' : '' }}"
                       name="password" required placeholder="Password">
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                @if ($errors->has('password'))
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                @endif
            </div>
            <div class="row">
                <div class="col-xs-8">
                    <div class="checkbox icheck">
                        {{--<label>--}}
                            {{--<input type="checkbox"> Remember Me--}}
                        {{--</label>--}}
                        <label for="remember">
                            <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                            {{ __('Remember Me') }}
                        </label>
                    </div>
                </div>
                <!-- /.col -->
                <div class="col-xs-4">
                    <button type="submit" class="btn btn-primary">
                        {{ __('Login') }}
                    </button>
                </div>
                <!-- /.col -->
            </div>
        </form>

        {{--<div class="social-auth-links text-center">--}}
            {{--<p>- OR -</p>--}}
            {{--<a href="#" class="btn btn-block btn-social btn-facebook btn-flat"><i class="fa fa-facebook"></i> Sign in using--}}
                {{--Facebook</a>--}}
            {{--<a href="#" class="btn btn-block btn-social btn-google btn-flat"><i class="fa fa-google-plus"></i> Sign in using--}}
                {{--Google+</a>--}}
        {{--</div>--}}
        <!-- /.social-auth-links -->

        <a href="{{ route('password.request') }}">
            {{ __('Forgot Your Password?') }}
        </a>
        {{--<a href="#">I forgot my password</a><br>--}}
        {{--<a href="register.html" class="text-center">Register a new membership</a>--}}

    </div>
    <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<!-- jQuery 3 -->
{{--<script src="../../bower_components/jquery/dist/jquery.min.js"></script>--}}
{{--<!-- Bootstrap 3.3.7 -->--}}
{{--<script src="../../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>--}}
{{--<!-- iCheck -->--}}
{{--<script src="../../plugins/iCheck/icheck.min.js"></script>--}}
@include('layouts/script')
<script src="{{ URL::asset('/plugins/iCheck/icheck.min.js') }}"></script>
<script>
    $(function () {
        $('input').iCheck({
            checkboxClass: 'icheckbox_square-blue',
            radioClass: 'iradio_square-blue',
            increaseArea: '20%' /* optional */
        });
    });
</script>
</body>
</html>
