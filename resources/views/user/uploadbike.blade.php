@extends('layouts.rentbike')
@section('title','Upload Post')

@section('content')

<!--Page Header-->
<section class="page-header contactus_page">
  <div class="container">
    <div class="page-header_wrap">
      <div class="page-heading">
        <h1>Upload Post</h1>
      </div>
      <ul class="coustom-breadcrumb">
        <li><a href="home">Home</a></li>
        <li>Upload Post</li>
      </ul>
    </div>
  </div>
  <!-- Dark Overlay-->
  <div class="dark-overlay"></div>
</section>
<!-- /Page Header--> 


<section>
<div class="uploadcontainer">  
  <form id="contact" action="{{route('bike_details.store')}}" method="POST" enctype=multipart/form-data>
     @csrf
    <h2><a>Upload Bike</a></h2>
    <h4><a>Provide The Details</a></h4>
    <fieldset>
      <input placeholder="Bike name" type="text" name="bikename"  required autofocus>
    </fieldset>
    <fieldset>
      <input placeholder="Bike Price Per Day" type="number" name="bikeprice"  required autofocus>
    </fieldset>

    <fieldset>
      <input placeholder="Bike Model" type="number" name="bikemodel"  required autofocus>
    </fieldset>

 <!-- <fieldset>   
    <input placeholder="Bike type" type="text" name="biketype"  required autofocus>
    </fieldset>
-->
    <fieldset>
    <select name="biketype" id="Location" required>
    <option value="" disabled selected>Select Bike Type</option>
    <option value="BMX">BMX</option>
    <option value="Mountain Bike">Mountain Bike</option>
    </select>
    </fieldset>

    <fieldset>
      <input placeholder="Address" name="address" type="text"  required>
    </fieldset>
    <fieldset>
      <input placeholder="Your Phone Number" value="{{ Auth::user()->number }}" name="personnumber" type="tel" required>
    </fieldset>
    <fieldset>
   <input id="bikepic" type="file" name="bikepic"  required autofocus>
    </fieldset>
  <input style="display:none"  value='{{ Auth::user()->id }}' name="user_id"/>
  
    <fieldset>
    <select name="location" id="Location" required>
    <option value="" disabled selected>Select The City</option>
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


@endsection