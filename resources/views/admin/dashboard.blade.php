@extends('layouts.app', ['activePage' => 'dashboard', 'titlePage' => __('Dashboard')])

@section('content')
  <div class="content">
    <div class="container-fluid">


      <div class="row">
        <div class="col-lg-3 col-md-6 col-sm-6">
          <div class="card card-stats">
            <div class="card-header card-header-warning card-header-icon">
              <div class="card-icon">
                <i class="material-icons">content_copy</i>
              </div>
              <p class="card-category">Total Bikes</p>
              
              <h4 class="card-title">{{($bikecount)}}</h4>
          
            </div>
            <div class="card-footer">
            <div class="stats">
              Bikes
              </div>
              </div>
          </div>
        </div>




        <div class="col-lg-3 col-md-6 col-sm-6">
          <div class="card card-stats">
            <div class="card-header card-header-success card-header-icon">
              <div class="card-icon">
                <i class="material-icons">store</i>
              </div>
              <p class="card-category">Sales</p>
              @foreach($total as $total)
              <h4 class="card-title">₱ {{$total->total}}</h4>
           
              @endforeach
            </div>
            <div class="card-footer">
              <div class="stats">
                Monthly
              </div>
            </div>
          </div>
        </div>


        <div class="col-lg-3 col-md-6 col-sm-6">
          <div class="card card-stats">
            <div class="card-header card-header-danger card-header-icon">
              <div class="card-icon">
                <i class="material-icons">person</i>
              </div>
              <p class="card-category">No. users</p>
              <h3 class="card-title">{{($usercount)}}</h3>
            </div>
            <div class="card-footer">
              <div class="stats">
              </div>
            </div>
          </div>
        </div>


      
      
      <div class="col-lg-3 col-md-6 col-sm-6">
          <div class="card card-stats">
            <div class="card-header card-header-info card-header-icon">
              <div class="card-icon">
              <i class="fa fa-bicycle"></i>
              </div>
              <p class="card-category">Returned Bikes</p>
              <h4 class="card-title">{{($returncount)}}</h4>
            </div>
            <div class="card-footer">
              <div class="stats">
              </div>
            </div>
          </div>
        </div>

        <div class="col-md-4">
          <div class="card card-stats">
            <div class="card-header card-header-info card-header-icon">
              <div class="card-icon">
              <i class="fa fa-bicycle"></i>
              </div>
              <p class="card-category">Total Income</p>
              <h4 class="card-title">₱ {{($totalincome)}}</h4>
            </div>
            <div class="card-footer">
              <div class="stats">
              </div>
            </div>
          </div>
        </div>

       
      
@endsection

@push('js')
  <script>
    $(document).ready(function() {
      // Javascript method's body can be found in assets/js/demos.js
      md.initDashboardPageCharts();
    });
  </script>
@endpush