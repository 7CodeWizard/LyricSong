@extends('layouts.app')

@section('content')
<div class="container " style=" display:flex;justify-content:center;align-items:center;height: 80vh;">
    <div class="panel panel-default" style="padding: 20px; width: 400px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);">
        <div class="text-center" style="font-size:30px;color:green; font-weight:800;">Sign in to continue</div>
        <div class="">
            <form class="" role="form" method="POST" action="{{ url('/login') }}" >
                {{ csrf_field() }}
                <div style="margin:20px 0px;">
                    <label for="email" class="form-label">Email:</label>
                    <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
                     @if ($errors->has('email'))
                        <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                </div>
                <div style="margin:20px 0px;">
                    <label for="password" class="form-label">Password:</label>
                    <input type="password" class="form-control" id="password" placeholder="Enter password" name="password">
                    @if ($errors->has('password'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-check mt-3">
                    <label class="form-check-label">
                    <input class="form-check-input" type="checkbox" name="remember"> Remember me
                    </label>
                </div>
              <!-- To make the button circular and control its size, avoid using `form-control` -->
                <button type="submit" class="btn btn-success form-control" style="margin:20px 0px;">Sign in with Email</button>
                <a href="{{ route('auth.google') }}" class="btn btn-primary form-control">Sign in with Google</a>
                <div class = "mb-3 text-center">
                    <label class="form-label">Don't have an account?</label>
                    <a href="/register" class="">Sign up now</a>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
