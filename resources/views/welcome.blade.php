@extends('layouts.noauth')

@section('content')
<style type="text/css">
    body {
  padding-top: 40px;
  padding-bottom: 40px;
  background-color: #eee;
}

.form-signin {
  max-width: 500px;
  padding: 15px;
  margin: 0 auto;
}

.form-signin .checkbox {
  margin-bottom: 10px;
}
.form-signin-heading {
    font-size:6em;
    margin-bottom:60px;
}


</style>
        <div class="container">
            <form class="form-horizontal form-signin" method="POST" action="{{ URL::to('/') }}/auth/login">
                <h1 class="form-signin-heading text-center">{{ trans("app.name") }}</h1>
                {!! csrf_field() !!}

                @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                
                <div class="form-group">
                    <label class="col-sm-3 control-label" for="user_name">E-mail</label>
                    <div class="col-sm-9">
                        <input class="form-control" type="email" name="email" id="email" value="{{ old('email') }}">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-3 control-label" for="password">Password</label>
                    <div class="col-sm-9">
                        <input class="form-control" type="password" name="password" id="password">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-offset-3 col-sm-9">
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" name="remember"> Remember Me
                            </label>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-offset-3 col-sm-9">
                        <button type="submit" class="btn btn-primary">Login</button>
                        <a class="btn btn-default" href="{{ URL::to('/') }}/auth/register">Register</a>
                    </div>
                </div>
            </form>
        </div>
    </body>
@endsection