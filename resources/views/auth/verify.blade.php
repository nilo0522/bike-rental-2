@extends('layouts.master', ['title' => __('Verify')])

@section('content')
<div class="container" style="height: auto;">
  <div class="row justify-content-center">
      <div class="col-lg-7 col-md-8">
          <div class="card card-login card-hidden mb-3">
            <div class="card-header card-header-primary text-center">
              <p class="card-title"><strong>{{ __('Waiting for Admin Confirmation or Approval') }}</strong></p>
            </div>
            <div class="card-body">
              <p class="card-description text-center"></p>
              <p>
                @if (session('resent'))
                    <div class="alert alert-success" role="alert">
                        {{ __('A fresh request has been sent to the admins please wait.') }}
                    </div>
                @endif
                
                {{ __('It takes 2 - 3 hours to confirm your newly made account please be back in a while.') }}
                
                @if (Route::has('verification.resend'))
                    {{ __('If it takes to long please resend request') }},  
                    <br>
                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit" class="btn btn-lg btn-primary">{{ __('click here to resend request') }}</button>.
                    </form>
                @endif
              </p>
            </div>
          </div>
      </div>
  </div>
</div>
@endsection
