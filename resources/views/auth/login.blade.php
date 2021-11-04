@extends('layouts.app', ['class' => 'off-canvas-sidebar', 'activePage' => 'login', 'title' => __('Rent A Bike')])

@section('content')

<div class="container" style="height: auto;">
  <div class="row align-items-center">
    <div class="col-md-9 ml-auto mr-auto mb-3 text-center">
      <h3>{{ __('Log in to see more bikes  and more.') }} </h3>
      
    </div>
    <div class="col-lg-4 col-md-6 col-sm-8 ml-auto mr-auto">
      <form class="form" method="POST" action="{{ route('login') }}">
        @csrf
        <div class="card card-login card-hidden mb-3">
          <div class="card-header card-header-primary text-center">
            <h4 class="card-title"><strong>{{ __('Login') }}</strong></h4>
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
          <div class="card-body">
          <br>
            
          @if(count($errors) > 0 )
          <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
            <ul class="p-0 m-0" style="list-style: none;">
              @foreach($errors->all() as $error)
              <li>{{$error}}</li>
              @endforeach
            </ul>
          </div>
          @endif

            <br>
           
            <div class="bmd-form-group{{ $errors->has('email') ? ' has-danger' : '' }}">
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text">
                    <i class="material-icons">email</i>
                  </span>
                </div>
                <input type="email" name="email" class="form-control" placeholder="{{ __('Enter Email...') }}" value="{{ !$errors->has('email') ? " " : "" }}" >
              </div>
              @if ($errors->has('HERE'))

              @endif

            </div>
            <div class="bmd-form-group{{ $errors->has('password') ? ' has-danger' : '' }} mt-3">
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text">
                    <i class="material-icons">lock_outline</i>
                  </span>
                </div>
                <input type="password" name="password" id="password" class="form-control" placeholder="{{ __('Password...') }}" value="{{ !$errors->has('password') ? "" : "" }}" >
              </div>
              @if ($errors->has('password'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                @endif
                            </div>
            <div class="form-check mr-auto ml-3 mt-3">
              <label class="form-check-label">
                <input class="form-check-input" type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> {{ __('Remember me') }}
                <span class="form-check-sign">
                  <span class="check"></span>
                </span>
              </label>
            </div>
          </div>
          <div class="card-footer justify-content-center">
            <button type="submit" class="btn btn-primary btn-link btn-lg">{{ __('Lets Go') }}</button>
          </div>
        </div>
      </form>
      <div class="row">
        <div class="col-6">
            @if (Route::has('password.request'))
                <a href="{{ route('password.request') }}" class="text-light">
                    <small>{{ __('Forgot password?') }}</small>
                </a>
            @endif

           
        </div>
        <div class="col-6 text-right">
            <a href="{{ route('register') }}" class="text-light">
                <small>{{ __('Create new account') }}</small>
            </a>
        </div>
      </div>
    </div>
  </div>
</div>


<script src="js/app.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    
    const  Toast = Swal.mixin({
      toast: true,
      position: 'top',
      showConfirmButton: false,
      timer: 3000
    });
  const Login = async () =>
  {
    let email = $('#email').val()
    let password = $('#password').val()
    if(email === '')
    {
        Toast.fire({
        icon: 'error',
        title: ' <span class="text-danger ml-3">Email is required*</span>'
      })
        return false
    }
    if(password === '')
    {
        Toast.fire({
        icon: 'error',
        title: ' <span class="text-danger ml-3">Password is required*</span>'
      })
        return false
    }
    
    let data = new FormData()
     data.append('email',email)
     data.append('password',password)
     try{
      axios.post('api/login',data).then(response =>{
        window.localStorage.setItem(response.data.role,response.data.access_token)
        console.log(response.data.user)
        window.localStorage.setItem('getUser',JSON.stringify(response.data.user))
        Swal.fire(
                'Login Successfull',
                ' ',
                'success',
                )
               
        switch(response.data.role)
            {
                case 'Admin':
                  // console.log(response.data.user[0])
                 window.location.href="admin"
                case 'User':
                    window.location.hrf ="/"

            }
                
     }).catch(function(error){
        if (error.response) {
           if(error.response.status == 500)
           {
            Toast.fire({
                icon: 'error',
                title: ' <span class="text-danger ml-3">Ooops no connection</span>'
            }) 
            return false
           }
           
           Toast.fire({
                icon: 'error',
                title: ' <span class="text-danger ml-3">'+error.response.data.message+'</span>'
            })
    }
     })  
     }
     catch (error)
     {
        console.log(error.toJson.data)
     }
  }
    

</script>





@endsection
