@extends('layouts/form')


@section('form')

    <div class="panel panel-default">
    
        <div class="panel-body">
            <form class="form-horizontal" method="POST" action="{{ route('register') }}">
                {{ csrf_field() }}

                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                    <label for="name" class="control-label">Name</label>
                    
                    <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

                    @if ($errors->has('name'))
                        <span class="help-block">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                    @endif
                 
                </div>

                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                    <label for="email" class="control-label">E-Mail Address</label>
                    
                    <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                    @if ($errors->has('email'))
                        <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
      
                </div>

                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                    <label for="password" class="col-md-4 control-label">Password</label>

                    <input id="password" type="password" class="form-control" name="password" required>

                    @if ($errors->has('password'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                   
                </div>

                <div class="form-group">
                    <label for="password-confirm" class="control-label">Confirm Password</label>
          
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                  
                </div>

                <div class="form-group form-redirects">
                  
                    <button type="submit" class="btn btn-outline-warning">
                        Register
                    </button><br>
                    <a class='btn btn-link' href="{{ route('login') }}">Already got an account?</a>
                  
                </div>
            </form>
        </div>
    </div>


@endsection
