<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    @include('layouts.core-sheets')
    
    <title>{{ config('app.name') }}</title>

  </head>
  <body>
    <section class="material-half-bg">
      <div class="cover"></div>
    </section>
    <section class="register-content">
      <div class="logo">
        <h1><a href="{{ url('/') }}">Mustang Sports</a></h1>
      </div>
      <div class="register-box">
        <form class="register-form" action="{{ route('register') }}" method="POST" >
          {{ csrf_field() }}
          <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
              <div class="form-group">
                <label class="control-label">
                    Fullname

                    @if ($errors->has('name'))
                        <span class="error-message">
                            {{ $errors->first('name') }}
                        </span>
                    @endif

                </label>
                <input class="form-control" name="name" type="text" placeholder="Fullname" autofocus>
              </div>
              <div class="form-group">
                <label class="control-label">Email
                  @if ($errors->has('email'))
                      <span class="error-message">
                          {{ $errors->first('email') }}
                      </span>
                  @endif

                </label>
                <input class="form-control" type="text" name="email" placeholder="Email" autofocus>
              </div>
              <div class="form-group">
                <label class="control-label">Matric No

                    @if ($errors->has('matricno'))
                        <span class="error-message">
                            {{ $errors->first('matricno') }}
                        </span>
                    @endif
                </label>
                <input class="form-control" type="text" name="matricno" placeholder="Matric no" autofocus>
              </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
              <div class="form-group">
                <label class="control-label">Password
                    @if ($errors->has('password'))
                        <span class="error-message">
                            {{ $errors->first('password') }}
                        </span>
                    @endif
                </label>
                <input class="form-control" name="password" type="password" placeholder="Password" autofocus>
              </div>
              <div class="form-group">
                <label class="control-label">Confirm Password</label>
                <input class="form-control" name="password_confirmation" type="password" placeholder="Confirm Password">
              </div>
            </div>
          </div>
          <div class="form-group btn-container">
            <br>
            <button class="btn btn-primary btn-block"><i class="fa fa-sign-in fa-lg fa-fw"></i>REGISTER</button>
          </div>
        </form>
        
      </div>
    </section>
    @include('layouts.external-footer')
  </body>
  @include('layouts.core-scripts')
</html>