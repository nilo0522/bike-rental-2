@extends('layouts.rentbike')
@section('title','Bike Listing')

@section('content')


@forelse ($BikeDetail as $key=>$data)
<br>
<section id="listing_img_slider">

<div><img src="../uploads/{{$data->bikepic}}" class="img-responsive" alt="image" width="950" height="600"></div>
<br>
<div><img src="../uploads/{{$data->bikepic}}" class="img-responsive" alt="image" width="950" height="600"></div>
<br>
<div><img src="../uploads/{{$data->bikepic}}" class="img-responsive" alt="image" width="950" height="600"></div>

<a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>

</section>
<!--/Listing-Image-Slider-->




<!--Listing-detail-->
<section class="listing-detail">
  <div class="container">
    <div class="listing_detail_head row">
      <div class="col-md-9">
        <h2>{{$data->bikename}}</h2>
      </div>
      <div class="col-md-3">
        <div class="price_info">
          <p>Pesos {{$data->bikeprice}}</p>Per Day
         
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-9">
        <div class="main_features">
          <ul>
          
            <li> <i class="fa fa-calendar" aria-hidden="true"></i>
              <h5>{{$data->bikemodel}}</h5>
              <p>Reg.Year</p>
            </li>
            <li> <i class="fa fa-cogs" aria-hidden="true"></i>
              <h5>{{$data->biketype}}</h5>
              <p>Bike Type</p>
            </li>
       
           <!-- <li> <i class="fa fa-user-plus" aria-hidden="true"></i>
              <h5>{{$data->carseats}}</h5>
              <p>Seats</p>
            </li> -->
          </ul>
        </div>
        <div class="listing_more_info">
          <div class="listing_detail_wrap"> 
            <!-- Nav tabs -->
            <ul class="nav nav-tabs gray-bg" role="tablist">
              <li role="presentation" class="active"><a href="#vehicle-overview " aria-controls="vehicle-overview" role="tab" data-toggle="tab">Vehicle Overview </a></li>
          
              <li role="presentation"><a href="#accessories" aria-controls="accessories" role="tab" data-toggle="tab">Vendor Details</a></li>
            </ul>
            
            <!-- Tab panes -->
            <div class="tab-content"> 
              <!-- vehicle-overview -->
              <div role="tabpanel" class="tab-pane active" id="vehicle-overview">
                
                <p>Address: {{$data->address}}</p>

              </div>
              
              
              <!-- Accessories -->
              <div role="tabpanel" class="tab-pane" id="accessories"> 
                <!--Accessories-->
                <table>
 
                  <tbody>

                  <p>Contact Number: {{$data->personnumber}}</p>
                  <p>Owner Address: {{$data->address}}</p>
                  <p>city: {{$data->location}}</p>
                </tbody>
               
                </table>
              </div>
            </div>
          </div>
          
        </div>

   
      </div>
      
      <!--Side-Bar-->
      <aside class="col-md-3">
      
        <div class="share_vehicle">
          <p>Share: <a href="#"><i class="fa fa-facebook-square" aria-hidden="true"></i></a> <a href="#"><i class="fa fa-twitter-square" aria-hidden="true"></i></a> <a href="#"><i class="fa fa-linkedin-square" aria-hidden="true"></i></a> <a href="#"><i class="fa fa-google-plus-square" aria-hidden="true"></i></a> </p>
        </div>
        <div class="sidebar_widget">
         
          

         
        <a href="../booking/{{$data->id}} " class="btn">Book Now! <span class="angle_arrow"><i class="fa fa-angle-right" aria-hidden="true"></i></span></a>
          
</i></h5>
          </div>
         
         

        </div>
      </aside>
      <!--/Side-Bar--> 
    </div>
    
    <div class="space-20"></div>
    <div class="divider"></div>

    
  </div>
</section>
<!--/Listing-detail--> 











@empty
            no data found
        @endforelse
@endsection