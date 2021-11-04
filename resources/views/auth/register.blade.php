


@extends('layouts.app', ['class' => 'off-canvas-sidebar', 'activePage' => 'register', 'title' => __('Material Dashboard')])

@section('content')
<link rel="stylesheet" href="css/intlTelInput.css">

<div class="container" style="height: auto;">
  <div class="row align-items-center">
    <div class="col-lg-4 col-md-6 col-sm-8 ml-auto mr-auto">
      <form class="form" method="POST" action="{{ route('register') }}">
        @csrf

        <div class="card card-login card-hidden mb-3">
          <div class="card-header card-header-primary text-center">
            <h4 class="card-title"><strong>{{ __('Register') }}</strong></h4>
            <div class="social-line">
              <a href="#pablo" class="btn btn-just-icon btn-link btn-white">
                <i class="fa fa-facebook-square"></i>
              </a>
              <a href="#pablo" class="btn btn-just-icon btn-link btn-white">
                <i class="fa fa-twitter"></i>
              </a>
              <a href="#pablo" class="btn btn-just-icon btn-link btn-white">
                <i class="fa fa-google-plus"></i>
              </a>
            </div>
          </div>
          <div class="card-body ">
            <p class="card-description text-center">{{ __('Or Be Classical') }}</p>
          
           <!--FIRST NAME-->
            <div class="bmd-form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text">
                      <i class="material-icons">face</i>
                  </span>
                </div>
                <input type="text" name="fname" class="form-control" placeholder="{{ __('First Name...') }}" value="{{ old('fname') }}" required>
              </div>
              @if ($errors->has('fname'))
                <div id="fname-error" class="error text-danger pl-3" for="fname" style="display: block;">
                  <strong>{{ $errors->first('fname') }}</strong>
                </div>
              @endif
            </div>
 <!--LAST NAME-->
            <div class="bmd-form-group{{ $errors->has('lname') ? ' has-danger' : '' }} mt-3">
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text">
                    <i class="material-icons">people</i>
                  </span>
                </div>
                <input type="text" name="lname" class="form-control" placeholder="{{ __('Last Name...') }}" value="{{ old('lname') }}" required>
              </div>
              
            </div>





            <!--GENDER SELECT-->
            <div class="bmd-form-group{{ $errors->has('gender') ? ' has-danger' : '' }} mt-3">
              <div class="input-group">
                  <label class="pl-3" for="gender"><b></b></label><br>
                  <div class="form-check-inline pl-3">
                    <label class="form-check-label">
                      <input type="radio" class="form-check-input" id="gender" name="gender" value="male" >Male<i class="material-icons">male</i>
                    </label>
                  </div>
                  <div class="form-check-inline">
                    <label class="form-check-label">
                      <input type="radio" class="form-check-input" id="gender" name="gender" value="female">Female<i class="material-icons">female</i>
                    </label>
                  </div>
                </div>

 <!--EMAIL-->

            <div class="bmd-form-group{{ $errors->has('email') ? ' has-danger' : '' }} mt-3">
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text">
                    <i class="material-icons">email</i>
                  </span>
                </div>
                <input type="email" name="email" class="form-control" placeholder="{{ __('Email...') }}" value="{{ old('email') }}" required>
              </div>
              @if ($errors->has('email'))
                <div id="email-error" class="error text-danger pl-3" for="email" style="display: block;">
                  <strong>{{ $errors->first('email') }}</strong>
                </div>
              @endif
            </div>

           
 <!--PASSWORD-->
            <div class="bmd-form-group{{ $errors->has('password') ? ' has-danger' : '' }} mt-3">
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text">
                    <i class="material-icons">lock_outline</i>
                  </span>
                </div>
                <input type="password" name="password" id="password" class="form-control" placeholder="{{ __('Password...') }}" required>
              </div>
              @if ($errors->has('password'))
                <div id="password-error" class="error text-danger pl-3" for="password" style="display: block;">
                  <strong>{{ $errors->first('password') }}</strong>
                </div>
              @endif
            </div>


 <!--RE-PASSWORD-->
            <div class="bmd-form-group{{ $errors->has('password_confirmation') ? ' has-danger' : '' }} mt-3">
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text">
                    <i class="material-icons">lock_outline</i>
                  </span>
                </div>
                <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" placeholder="{{ __('Confirm Password...') }}" required>
              </div>
              @if ($errors->has('password_confirmation'))
                <div id="password_confirmation-error" class="error text-danger pl-3" for="password_confirmation" style="display: block;">
                  <strong>{{ $errors->first('password_confirmation') }}</strong>
                </div>
              @endif
            </div>
            


 <!--NUMBER-->

            <div class="bmd-form-group{{ $errors->has('number') ? ' has-danger' : '' }} mt-3">
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text">
                    <i class="material-icons">phone</i>
                  </span>
                </div>
                <input type="tel" name="number" id="number"  class="form-control" value = "+63"  required>
                </div>
              </div>





 <!--STREET-->
              <div class="bmd-form-group{{ $errors->has('street') ? ' has-danger' : '' }} mt-3">
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text">
                      <i class="material-icons">add_road</i>
                  </span>
                </div>
                <input type="text" name="street" id="street" class="form-control"  placeholder="{{ __('Street...') }}" value="{{ old('street') }}" required>
              </div>
            </div>

 <!--CITY-->
              <div class="bmd-form-group{{ $errors->has('city') ? ' has-danger' : '' }} mt-3">
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text">
                    <i class="material-icons">home</i>
                  </span>
                </div>
                <input type="city" name="city" id="city" class="form-control" placeholder="{{ __('City...') }}" value="{{ old('street') }}" required>
              </div>


            <div class="form-check mr-auto ml-3 mt-3">
              <label class="form-check-label">
                <input class="form-check-input" type="checkbox" id="policy" name="policy" {{ old('policy', 1) ? 'checked' : '' }} >
                <span class="form-check-sign">
                  <span class="check"></span>
                </span>
                {{ __('I agree with the ') }} <a href="#">{{ __('Privacy Policy') }}</a>
              </label>
            </div>
          </div>
          <div class="card-footer justify-content-center">
            <button type="submit" class="btn btn-primary btn-link btn-lg">{{ __('Create account') }}</button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>



@endsection
