@extends('layouts.rentbike')
@section('title','Edit Bike')

@section('content')

@forelse ($BikeDetail as $key=>$data)


<!--Page Header-->
<section class="page-header contactus_page">
  <div class="container">
    <div class="page-header_wrap">
      <div class="page-heading">
        <h1>Edit Bike Details</h1>
      </div>
      <ul class="coustom-breadcrumb">
        <li><a href="home">Home</a></li>
        <li>Edit Bike Details</li>
      </ul>
    </div>
  </div>
  <!-- Dark Overlay-->
  <div class="dark-overlay"></div>
</section>
<!-- /Page Header--> 


<section>
<div class="uploadcontainer">  

  <form id="contact" action="../updatebike/{{$data->id}}" method="get">
     @csrf
     <h2 class = 'hidden'><a> {{$data->id}}</a></h2>
    <h2><a>{{$data->bikename}}</a></h2>
    <h4><a>Provide The Details</a></h4>
    <fieldset>
      <input placeholder="Bike name" type="text" name="bikename" value="{{$data->bikename}}">
    </fieldset>
    <fieldset>
      <input placeholder="Bike Price Per Day" type="number" name="bikeprice" value="{{$data->bikeprice}}" >
    </fieldset>

    <fieldset>
      <input placeholder="Bike Model" type="number" name="bikemodel" value="{{$data->bikemodel}}"  required autofocus>
    </fieldset>

    <fieldset>   
    <input placeholder="biketype" type="text" name="biketype" value="{{$data->biketype}}" disabled required autofocus>
    </fieldset>

<!--
<fieldset>
    <select name="biketype" type="biketype"  required>
    <option value="{{$data->biketype}}">{{$data->biketype}}</option>
    <option value="BMX">BMX</option>
    <option value="Mountain Bike" >Mountain Bike</option>
  </select>
    </fieldset>
-->
    
    <fieldset>
      <input placeholder="Address" name="address" type="text" value="{{$data->bikeprice}}"  required>
    </fieldset>
    <fieldset>
      <input placeholder="Your Phone Number" value="{{ Auth::user()->number }}" name="personnumber" type="tel" required>
    </fieldset>

    <input style="display:none"  value='{{ Auth::user()->id }}'  name="user_id"/>

 
    <fieldset>
    <select name="location" id="Location"  required>
    <option value="{{$data->location}}">{{$data->location}}</option>
    <option value="Cagayan De Oro City">Cagayan De Oro City</option>
    <option value="Iligan City" >Iligan City</option>
    <option value="Bukidnon">Bukidnon</option>
  </select>
    </fieldset>
    <fieldset>
    <div class="form-group">
              <button class="btn" type="submit" name="send" type="submit">Upload </button>
            </div>
    </fieldset>
   
  </form>
</div>

</section>
@empty
            no data found
        @endforelse

@endsection