@extends('layouts.rentbike')
@section('title','Profile')
@section('content')
<style>
  .btn-file {
    position: relative;
    overflow: hidden;
    cursor: pointer;
}
.btn-file input[type=file] {
   
    
    text-align: right;
    filter: alpha(opacity=0);
    opacity: 0;
    outline: none;
    background: white;
    cursor: inherit;
    display: block;
}
#img-upload{
    width: 15%;
}
.blogShort{ border-bottom:1px solid #ddd;}
.add{background: #333; padding: 10%; height: 300px;}
.nav-sidebar { 
    width: 100%;
    padding: 30px 0; 
    border-right: 1px solid #ddd;
}
.nav-sidebar a {
    color: #333;
    -webkit-transition: all 0.08s linear;
    -moz-transition: all 0.08s linear;
    -o-transition: all 0.08s linear;
    transition: all 0.08s linear;
}
.nav-sidebar .active a { 
    cursor: default;
    background-color: #0b56a8; 
    color: #fff; 
}
.nav-sidebar .active a:hover {
    background-color: #E50000;   
}
.nav-sidebar .text-overflow a,
.nav-sidebar .text-overflow .media-body {
    white-space: nowrap;
    overflow: hidden;
    -o-text-overflow: ellipsis;
    text-overflow: ellipsis; 
}
.btn-blog {
    color: #ffffff;
    background-color: #E50000;
    border-color: #E50000;
    border-radius:0;
    margin-bottom:10px
}
.btn-blog:hover,
.btn-blog:focus,
.btn-blog:active,
.btn-blog.active,
.open .dropdown-toggle.btn-blog {
    color: blue;
    background-color:#a80b28;
    border-color: #a80b28;
}
article h2{color:#333333;}
h2{color:#0b56a8;}
 .margin10{margin-bottom:10px; margin-right:10px;}
 
 .container .text-style
{
  text-align: justify;
  line-height: 23px;
  margin: 0 13px 0 0;
  font-size: 19px;
}
.table{
    width:82%;
    white-space: nowrap;
}
#rentals_filter{
  width:50%;
   float: right;
   text-align: right;
}
}
#rentals_paginate{
    
  width: 100%;
   float: center;
   text-align: center;
}

#return{
    width:100%;
    white-space: nowrap;
}
#return_filter{
  width:50%;
   float: right;
   text-align: right;
}
}
#return_paginate{
    
  width: 100%;
   float: center;
   text-align: center;
}


#earnings{
    width:100%;
    white-space: nowrap;
}
#earnings_filter{
  width:50%;
   float: right;
   text-align: right;
}
}
#earnings_paginate{
    
  width: 100%;
   float: center;
   text-align: center;
}


.label {
    display: inline-flex;
    margin-bottom: .5rem;
    margin-top: .5rem;
}

#map {
    margin-top:15px;
    margin-left: 65px;
    width: 925px;
    height: 550px;
 }
 body {
height: 100%;
margin: 0;
padding: 0;
}

</style>
<script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
<script src="{{asset('assets/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('assets/js/dataTables.bootstrap4.min.js')}}"></script>


<div class="container">
	<div class="col-sm-2">
    <nav class="nav-sidebar">
		<ul class="nav tabs">
          <li class="active"><a href="#tab1" data-toggle="tab">Profile</a></li>
          <li class=""><a href="#tab2" data-toggle="tab">My Bikes</a></li>
          <li class=""><a href="#tab3" data-toggle="tab">Upload Bikes</a></li>  
          <li class=""><a href="#tab4" data-toggle="tab">My Rentals</a></li>  
          <li class=""><a href="#tab6" data-toggle="tab">Returned Bikes</a></li>
          <hr>
          <li class=""><a href="#tab5" data-toggle="tab">Maps</a></li> 
          <li class=""><a href="#tab7" data-toggle="tab">My Earnigs</a></li>
		</ul>
	</nav>

</div>
<!-- tab content -->
<!--  PROFILE -->
 <!--  PROFILE -->
 <!--  PROFILE -->
<div class="tab-content">
<div class="tab-pane active text-style" id="tab1">
  <div class="col-sm-9 justify-content-center">
      <div class="col-sm-12">
        <h2 style="margin-top: 5%">Your Profile</h2>
          <div class="sidebar_widget" style="border:5px solid #337ab7">
            <div class="form-group col-sm-12">
              <div id="profile-container" class="float-right">
             
    <!-- KAILANGAN MUGANA PAG TUPLOKON -->   
             
                @php
                    $img = Auth::user()->prof_img ? : "uploads/1.jpg";
                @endphp
                <img id='img-upload'  src = '{{asset($img)}}' />
                <input type="hidden"
                   value="{{$img}}"
                   id = "img"/>
                </div>
                <div class="input-group">
                  <span class="input-group-btn">
                    <label class="btn-sm btn-danger btn-file" style=" width:100px;height:25px">
                      Change Picture 
                      <input type="file" id="imgInp" name="imgInp"  >
</label>
                  </span>
                
                </div>
            </div>
            <div class="form-group row">
              <div class="col-sm-6">
                  <label for="fname">First name</label>
                  <input type="text" 
                    class="form-control" 
                    name = "fname"
                    id="fname" 
                    value="{{ Auth::user()->fname }}"/>
              </div>
              <div class="col-sm-6">
                  <label for="lname">Last name</label>
                  <input type="text" 
                    class="form-control" 
                    name = "lname"
                    id="lname" 
                    value = "{{ Auth::user()->lname }}"/>
              </div>
            </div>
            <div class="form-group row">
              <div class="col-sm-6">
                  <label for="email">Email</label>
                  <input type="text" 
                    class="form-control" 
                    name = "email"
                    id="email" 
                    value="{{ Auth::user()->email }}"/>
              </div>
              <div class="col-md-6">
                  <label for="number">Number</label>
                  <input type="text" 
                    class="form-control" 
                    name = "number"
                    id="number" 
                    value=" {{ Auth::user()->number }}"/>
              </div>
          </div>
          <div class="form-group row">
            <div class="col-md-6">
                <label for="gender">Gender</label>
                <select name = "gender" id="gender" class="form-control">
                  <option value="Male" @if(Auth::user()->gender == "Male" ) selected @endif> 
                    Male
                  </option>
                  <option value="Female" @if(Auth::user()->gender == "Female" ) selected @endif>
                    Female
                  </option>
                </select>
               
            </div>
            <div class="col-sm-6">
                <label for="street">Street</label>
                <input type="text" 
                class="form-control" 
                name = "street"
                id="street" 
                value="{{ Auth::user()->street }}"/>
            </div>
            <div class="col-sm-6">
                <label for="city">City</label>
                <input type="text" 
                  class="form-control" 
                  name = "city"
                  id="city" 
                  value="{{ Auth::user()->city }}"/>
            </div>
            <div class="col-sm-6">
                <label for="submit"></label>
                <br>
                <button type="text" 
                  class="btn btn-info" 
                  name = "save_prof" 
                  id="save_prof">
    
                  Save Changes
              </button>
            </div>
          </div>
        </div>
      </div>
  </div>
</div>                    



<div class="tab-pane text-style" id="tab2">
  <h2>My Bikes</h2>
   <p>
   <section class="listing-page">
  <div class="container">
    <div class="row">
      <div class="col-md-9 col-md-push-1">
    @forelse ($BikeDetail as $key=>$data)
        <div class="product-listing-m gray-bg">
          <div class="product-listing-img"><img  src="../uploads/{{$data->bikepic}} " class="img-responsive" alt="Image" /> </a> 
          </div>
          <div class="product-listing-content">
            <h5><a href="">{{$data->bikename}} </a></h5>
            <p class="list-price">Price Per Day: ₱ {{$data->bikeprice}}  </p>
            <ul>
              <li><i class="fa fa-industry" aria-hidden="true"></i> {{$data->bikemodel}} Model</li>
             <li><i class="fa fa-bicycle" aria-hidden="true"> {{$data->biketype}}  <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Bike Type</i></li>
            </ul>
            <a href="../editbike/{{$data->id}} " class="btn">Edit Details <span class="fa fa-edit"></span></a>
            <a href="../deletebike/{{$data->id}} " class="btn">Delete<span class="fa fa-trash"></span></a></div>
            </div>
            @empty
               You have not Uploaded a Bike yet!.
            @endforelse
         </div>
   
</div>
</div>
   </p>
    <hr>   
</div>

<!--end POSTED Bike -->
 <!--end POSTED Bike -->
 <!--end POSTED Bike -->

 <!-- ----------------------------------------------------------------------------------------------------------------------------- -->   
 <!-- ----------------------------------------------------------------------------------------------------------------------------- -->   
 <!-- ----------------------------------------------------------------------------------------------------------------------------- -->   



 <!-- Upload Bike -->
 <!-- Upload Bike -->
 <!-- Upload Bike -->
<div class="tab-pane text-style" id="tab3">
 <h2>Upload Bikes</h2>

<div class="uploadcontainer ">  
  <form id="contact" action="{{route('bike_details.store')}}" method="POST" enctype=multipart/form-data>
     @csrf
    <h4><a>Provide The Details</a></h4>
    <fieldset>
      <input placeholder="Bike name" type="text" name="bikename"  required autofocus>
    </fieldset>
    <fieldset>
    <select name="bikeprice" id="Location" required>
    <option value="" disabled selected>Select Bike Price</option>
    <option value="300">300 - min</option>
    <option value="400">400</option>
    <option value="500">500</option>
    <option value="600">600</option>
    <option value="700">700</option>
    <option value="800">800 - max</option>
    </select>
    </fieldset>
    <fieldset>
      <input placeholder="Bike Model" type="number" name="bikemodel"  required autofocus>
    </fieldset>
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
    <hr>
    




  </div>




  <!--END Upload Bike -->
 <!-- END Upload Bike -->
 <!-- END Upload Bike -->

 <!-- ----------------------------------------------------------------------------------------------------------------------------- -->   
 <!-- ----------------------------------------------------------------------------------------------------------------------------- -->   
 <!-- ----------------------------------------------------------------------------------------------------------------------------- -->   



<!--RENTALS-->
 <!-- RENTALS  -->
 <!-- RENTALS  -->
  <div class="tab-pane text-style" id="tab4">
  <h2>My Rentals</h2>
  <div class="m-4">
    <div class="table-responsive"> 
    <table id="rentals"  class="table">
            <thead >
                <tr>
                <th class="text-center">Bike name</th>
                <th class="text-center">Owner Name</th>
                <th class="text-center">Pickup Date</th>
                <th class="text-center">Return Date</th>
                <th class="text-center">Total Paid</th>
                <th class="text-center">Confirmation</th>
                <th class="text-center">Actions</th>
                </tr>
            </thead>
            <tbody>
          <tr>
                @forelse ($rental as $key=>$data)
                  <td class="text-center">{{$data->bikename}}</td>
                  <td class="text-center">{{$data->fname}}&nbsp;{{$data->lname}} </td>
                  <td> {!! date('M-d-Y h:i:s', strtotime($data->rent_start_date)) !!} </td>
                  <td> {!! date('M-d-Y h:i:s', strtotime($data->rent_end_date)) !!}</td>
                  <td class="text-center">₱{{$data->total_amount}}</td>
                  <td class="text-center">
                  @forelse($confirm as $key=>$conf)
                  @if($conf->returned_status === 1 && $data->payment_id == $conf->payment_id)
                  <span class="badge badge-warning"style="background-color:#01ff24;">Confirmed</span>
                  @elseif($conf->returned_status === Null && $data->payment_id == $conf->payment_id)
                  <span class="badge badge-warning"style="background-color:#01ff24;">Standy</span>
                  asdasd
                  @endif
                @empty
                  @endforelse
                </td>
                
  	              
                 
        
               
                  
    
            <td>
            @if($data->rstatus == '0')
            <div style="margin:15px">
                  <button class="btn-sm btn-info"  type="button" id="rent{{$data->payment_id}}">
                  Return</button>
                <div>
                    @endif
</td>
                <!-- Return MODAL -->
                <!-- Return MODAL-->
                <!-- Return MODAL-->
                <div class="modal fade" id="Return" tabindex="-1" role="dialog" aria-labelledby="Return" aria-hidden="true">
                  <div class="modal-dialog modal-xs" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                      <div class="form-group">
                      <label for="issue">Report Issues:</label>
                      <textarea class="form-control" rows="3" id="issues" name="issues"></textarea>
                      <label for="meetup">Meet Up Location :</label>
                      <input class="form-control" type="text" id="meetup" /></input>
                      </div>
                      <input class="form-control" type="hidden" id="owner_id" name="owner_id" value ="{{$data->user_id}}"/>
                      <input class="form-control" type="hidden" id="fname" name="fname" value ="{{ Auth::user()->fname }}"/>
                      <input class="form-control" type="hidden" id="lname" name="lname" value ="{{ Auth::user()->lname }}"/>
                      
                      <input type="hidden" id="payment_id" />
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-primary" id = "submit-return">Return</button>
                      </div>
                    </div>
                  </div>
                </div>
              
            </tr>
            @empty
            @endforelse


            </tbody>
        </table>
    </div> 
    <p class="mt-4"><strong>Note:</strong> This table contains Customer Rental history.</p>
  </div>
</div>

<!--END RENTALS-->
 <!--END RENTALS  -->
 <!--END RENTALS  -->


 <!-- ----------------------------------------------------------------------------------------------------------------------------- -->   
 <!-- ----------------------------------------------------------------------------------------------------------------------------- -->   
 <!-- ----------------------------------------------------------------------------------------------------------------------------- -->   


 <!--MAPS-->
 <!--MAPS  -->
 <!--MAPS  -->
  <div class="tab-pane text-style" id="tab5">
  <h2>Maps</h2>
  <div class="container1">
  <div id="map"></div>
  </div>
  </div>
  <script
      src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBlIYYXEaZzs-6M9rSRgs-pGXlS0Mk9b64&callback=initMap&v=weekly"
      async
    ></script>
<script type="text/javascript">
    let map;
    function initMap() {
      var mapDiv = document.getElementById("map");
      var latlng = new google.maps.LatLng(8.477217, 124.645920);

      
    var options = {
        center: latlng,
        zoom:8, 
        scrollwheel: false,
      
        mapTypeControlOptions: {
        style: google.maps.MapTypeControlStyle.DROPDOWN_MENU,
        mapTypeIds: ["roadmap", "satellite"],
      },
      
       
        
}
    var map = new google.maps.Map(mapDiv, options);
    var marker = new google.maps.Marker({
      position: latlng,
      map: map,
      title: 'This is Me'


    });
    }
    
  </script>
  <!--END MAPS-->
 <!--END MAPS  -->
 <!--END MAPS  -->

 <!-- ----------------------------------------------------------------------------------------------------------------------------- -->   
 <!-- ----------------------------------------------------------------------------------------------------------------------------- -->   
 <!-- ----------------------------------------------------------------------------------------------------------------------------- -->   

<!--Returned-->
 <!--Returned  -->
 <!--Returned  -->
  <div class="tab-pane text-style" id="tab6">
  <h2>Returned Bikes</h2>
  <div class="m-4">
    <div class="table-responsive"> 
        <table id="return" class ="tabler" >
            <thead>
                <tr>
                    <th>Bike name</th>
                    <th>Renter Name</th>
                    <th>Issues</th>
                    <th>MeetUp Location</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
            @forelse ($return as $key=>$returned)
                <tr>
                    <td style = "text-align:center;">{{($returned->bikename)}}</td>
                    <td style = "text-align:center;">{{($returned->rentername)}} {{($returned->renterlname)}}</td>
                    <td style = "text-align:center;">{{($returned->issues)}}</td>
                    <td style = "text-align:center;">{{($returned->meetup)}}</td>
                    <td style = "text-align:center;">
                    <div style="margin:15px">
                      <button class="btn-sm btn-info"  type="button" id="returned{{($returned->returned_id)}}">Confirm</button>
                    <div>
                    </td>


                    <!--CONFIRM MODAL -->
<div class="modal fade" id="Confirm" tabindex="-1" role="dialog" aria-labelledby="Confirm" aria-hidden="true">
                  <div class="modal-dialog modal-xs"style="width:350px; text-align:center;" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        Please confirm that your bike has returned
                      </div>
                      <div class="modal-body" >
                      <div class="form-group">
                      <input type="hidden" class="form-control" rows="5" id="returned_status" name="returned_status" value="{{($returned->returned_status)}}">
                      <input type="hidden" name = "returned_id" id="returned_id" value ="{{($returned->returned_id)}}"/>
                      <input type="hidden" name = "bike_id" id="bike_id" value ="{{($returned->id)}}"/>
                      <button type="button" class="btn btn-primary btn-xs" id ="confirm-return">Confirm</button>
                      &nbsp;
                      <button type="button" class="btn btn-primary btn-xs"  data-dismiss="modal">Close</button>
                    </div>
                  </div>
                </div>

                </tr>
                @empty
                @endforelse

            </tbody>
        </table>
    </div> 
    <p class="mt-4"><strong>Note:</strong> This table contain returned bike from customer.</p>
</div>
  </div>





  <!--END Returned-->
 <!--END Returned  -->
 <!--END Returned  -->

 <!-- ----------------------------------------------------------------------------------------------------------------------------- -->   
 <!-- ----------------------------------------------------------------------------------------------------------------------------- -->   
 <!-- ----------------------------------------------------------------------------------------------------------------------------- -->   


  <!--EARNINGS-->
 <!--EARNINGS -->
 <!--EARNINGS -->
  <div class="tab-pane text-style" id="tab7">
  <h2>Earnigs</h2>
  <div class="m-4">
    <div class="table-responsive"> 
        <table  id =earnings class="tablee">
            <thead>
                <tr>
                    
                    <th>Date</th>
                    <th>Earnings</th>
                </tr>
            </thead>
            <tbody>
            @forelse ($earnings as $key=>$earn)
                <tr>
                    <td> {!! date('M-d-Y ', strtotime($earn->rent_start_date)) !!} <span> to </span> {!! date('M-d-Y ', strtotime($earn->rent_end_date)) !!} </td>
                    <td>₱ {{($earn->sub_total)}}</td>
                </tr>
                @empty
              
                @endforelse

            </tbody>
        </table>
    </div> 
    <p class="mt-4"><strong>Note:</strong>This table contain Customer Earnigs report.</p>
</div>
</div>

  <!--END EARNINGS-->
 <!--END EARNINGS -->
 <!--END EARNINGS -->


</div>
</div>
</div>  
    
</div>

<input type="hidden"
value="{{Auth::user()->id}}"
id="user_id"
/>

<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
   const  Toast = Swal.mixin({
      toast: true,
      position: 'top',
      showConfirmButton: false,
      timer: 3000
    });
  const url = 'http://127.0.0.1:8000/api'
   
    $('#save_prof').click(  function(){
      $('#save_prof').prop('disabled',true)
      let fname = $('#fname').val()
      let lname =  $('#lname').val()
      let email =  $('#email').val()
      let number =  $('#number').val()
      let street =  $('#street').val()
      let gender =  $('#gender').val()
      let img2 = $('#imgInp')[0].files[0]
      let img = $('#img').val()
      let id = $('#user_id').val()
      let city =  $('#city').val()
        
          const data = new FormData()
           data.append('fname',fname)
           data.append('lname',lname)
           data.append('email',email)
           data.append('number',number)
           data.append('street',street)
           data.append('city',city)
           data.append('prof_img2',img2)
           data.append('prof_img',img)
           data.append('gender',gender)
           data.append('id',id)
          axios.post(url+'/save-profile',data).then(response => {
            console.log(response)
            let data = response.data
            Swal.fire(
                data.message,
                ' PROFILE UPDATED SUCCESFULLY',
                'success',
                )
               
          })
          
          $('#save_prof').prop('disabled',false)
    })
</script>


<script>
  $(document).ready( function() {
    	$(document).on('change', '.btn-file :file', function() {
		var input = $(this),
			label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
		input.trigger('fileselect', [label]);
		});
		$('.btn-file :file').on('fileselect', function(event, label) {
		    
		    var input = $(this).parents('.input-group').find(':text'),
		        log = label;
		    
		    if( input.length ) {
		        input.val(log);
		    }else{
          $('#img').val('uploads/'+log)
        }
		});
		function readURL(input) {
		    if (input.files && input.files[0]) {
		        var reader = new FileReader();
		        
		        reader.onload = function (e) {
		            $('#img-upload').attr('src', e.target.result);
		        }
		        reader.readAsDataURL(input.files[0]);
		    }
		}
		$("#imgInp").change(function(){
		    readURL(this);
		}); 	
	});
  </script>
   
<!-- MY RENTAL TABLE-->
<!-- MY RENTAL TABLE-->
<!-- MY RENTAL TABLE-->
<script>
 $(document).ready(function() {
        $('#rentals').DataTable(
            {      
          "aLengthMenu": [[5, 10, 25, -1], [5, 10, 25, "All"]],
            "iDisplayLength": 5,
            "lengthChange": false,
            "info": false,
            "pagingType": "numbers",
          } 
            );
    } );
</script>
<!-- RETURN TABLE-->
<!-- RETURN TABLE-->
<!-- RETURN TABLE-->
<script>
$(document).ready(function() {
        $('#return').DataTable(
            {    
          "aLengthMenu": [[5, 10, 25, -1], [5, 10, 25, "All"]],
            "iDisplayLength": 5,
            "lengthChange": false,
            "info": false,
            "pagingType": "numbers",
          } 
            );
    } );
  </script>
<!-- EARNINGS SCRIPT-->
<!-- EARNINGS SCRIPT-->
<!-- EARNINGS SCRIPT-->
<script>
$(document).ready(function() {
        $('#earnings').DataTable(
            {     
          "aLengthMenu": [[5, 10, 25, -1], [5, 10, 25, "All"]],
            "iDisplayLength": 5,
            "lengthChange": false,
            "info": false,
            "pagingType": "numbers",
          } 
            );
    } );
  </script>

<!-- RENTAL RETURN SCRIPT-->
<!-- RENTAL RETURN SCRIPT-->
 <!-- RENTAL RETURN SCRIPT-->
<script> 
@foreach($rental as $key=>$data)
  $('#rent{{$data->payment_id}}').click(function(){
    $('#payment_id').val('{{$data->payment_id}}')
   $('#Return').modal('toggle')
  })
@endforeach
$('#submit-return').click(function(){
  let formdata = new FormData()
  formdata.append('payment_id',$('#payment_id').val())
  formdata.append('issues',$('#issues').val())
  formdata.append('meetup',$('#meetup').val())
  formdata.append('user_id',$('#user_id').val())
  formdata.append('owner_id',$('#owner_id').val())
  formdata.append('fname',$('#lname').val())
  formdata.append('lname',$('#lname').val())

  axios.post(url+'/submit-return',formdata).then(res =>{
    console.log(res)
    if(res.status === 200)
    {
      $('#Return').modal('toggle')
      Swal.fire(
                res.data.message,
  
                )
      $('#rent'+res.data.data.id).hide()
    }
  })
})
</script>  
<!-- END RENTAL RETURN SCRIPT-->
<!-- END RENTAL RETURN SCRIPT-->
 <!--END RENTAL RETURN SCRIPT-->

 <!-- CONFIRMATION  RETURN SCRIPT-->
<!-- CONFIRMATION  RETURN SCRIPT-->
<!-- CONFIRMATION  RETURN SCRIPT-->

<script> 
@foreach($return as $key=>$returned)
$('#returned{{$returned->returned_id}}').click(function(){
    $('#returned_id').val('{{$returned->returned_id}}')

   $('#Confirm').modal('toggle')
  })
@endforeach
$('#confirm-return').click(function(){
  $('#returned').prop('disabled',true)
      let returned_status =  $('#returned_status').val()
      let returned_id =  $('#returned_id').val()
      let bike_id =  $('#bike_id').val()
      
      const formdata = new FormData()
      formdata.append('returned_status',returned_status)
      formdata.append('returned_id',returned_id)
      formdata.append('bike_id',bike_id)
  axios.post(url+'/confirm-return',formdata).then(res =>{
    console.log(res)
    
    if(res.status === 200)
    {
      $('#Confirm').modal('toggle')
      Swal.fire(
                res.data.message,
  
                )
      $('#returned'+res.data.data.id).hide()
      $('#returned').prop('disabled',false)
    }
  })
})
</script>  

@endsection