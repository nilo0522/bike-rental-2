@extends('layouts.rentbike')
@section('title','Profile')
@section('content')
@php

@endphp
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
.label {
    display: inline-flex;
    margin-bottom: .5rem;
    margin-top: .5rem;
}


}
</style>

<script src="{{asset('assets/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('assets/js/dataTables.bootstrap4.min.js')}}"></script>


<div class="container">
	<div class="col-sm-2">
    <nav class="nav-sidebar">
		<ul class="nav tabs">
          <li class="active"><a href="#tab1" data-toggle="tab">Profile</a></li>
          <li class=""><a href="#tab2" data-toggle="tab">My Bikes</a></li>
          <li class=""><a href="#tab3" data-toggle="tab">Upload Bikes</a></li>  
          <li class=""><a href="#tab4" data-toggle="tab">My rentals</a></li>  
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
        <h2 style="margin-top: 5%">Profile</h2>
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
            <p class="list-price">Price Per Day: ₱ {{$data->bikeprice}} Pesos  </p>
            <ul>
              <li><i class="fa fa-industry" aria-hidden="true"></i> {{$data->bikemodel}} Model</li>
             <li><i class="fa fa-bicycle" aria-hidden="true"> {{$data->biketype}}  <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Bike Type</i></li>
            </ul>
            <a href="../editbike/{{$data->id}} " class="btn">Edit Details <span class="fa fa-edit"></span></a>
            <a href="../deletebike/{{$data->id}} " class="btn">Delete<span class="fa fa-trash"></span></a></div>
            </div>
            @empty
                no data found
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
      <input placeholder="Bike Price Per Day" type="number" name="bikeprice"  required autofocus>
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
            <thead>
                <tr>
                    
                <th>Bike name</th>
                <th>Owner Name</th>
                <th>Pickup Date</th>
                <th>Return Date</th>
                <th>Total Paid</th>
                <th>Time</th>
                <th>Actions</th>
                </tr>
            </thead>
            <tbody>

          <tr>
                @forelse ($rental as $key=>$data)
            
                  <td>{{$data->bikename}}</td>
                  <td>{{$data->fname}}&nbsp;{{$data->lname}}</td>
                  <td ><label id="pickupdate" >
                  {!! date('d-m-Y H:i:s', strtotime($data->rent_start_date)) !!}
                  </label> 
                </td>
                  <td><label id="returndate" >
                  {!! date('d-m-Y H:i:s', strtotime($data->rent_end_date)) !!}
                  </label>
                  </td>
                  <td>{{$data->total_amount}}</td>
                <td>
                <div id="demo{{($data->rental_id)}}">
                      
           

                </td>
           
                <td>
                <div class="btn-group" role="group" aria-label="Button group example">
                  
                  <button class="btn-xs btn-info"  type="button" id="rent{{$data->rental_id}}">
                  Return</button>
                  &nbsp;
                  <button class="btn-xs btn-success"  type="button" data-toggle="modal" data-target="#Extend">
                  Extend</button>
                </div>
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
                    
                      <label for="comment">Report Issues:</label>
                      <textarea class="form-control" rows="5" id="issues" name="issues"></textarea>
                      </div>
                      <input type="hidden" id="rental_id" />

                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-primary" id = "submit-return">Return</button>
                        
                      </div>
                    </div>
                  </div>
                </div>

                <!-- Extend MODAL -->
                <!-- Extend MODAL -->
                <!-- Extend MODAL -->
                <div class="modal fade" id="Extend" tabindex="-1" role="dialog" aria-labelledby="Extend" aria-hidden="true">
                  <div class="modal-dialog modal-xs" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                      <h5 class="modal-title" id="Extend">Extend Form</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      
                      <div class="modal-body">
                      <input type="text" class="form-control" placeholder="Username" />
                      <input type="text" class="form-control" placeholder="Username" />
                      <input type="text" class="form-control" placeholder="Username" />
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-primary">Extend</button>
                      </div>
                    </div>
                  </div>
                </div>
              </td>
            </tr>
            @empty
            no data found
            @endforelse


            </tbody>
        </table>
    </div> 
    <p class="mt-4"><strong>Note:</strong> Change the editor layout/orientation to see how responsive table works.</p>
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
  <p>
  
  </p>
    <hr>
  </div>
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
        <table class="table">
            <thead>
                <tr>
                    <th>Bike name</th>
                    <th>Renter Name</th>
                    <th>Issues</th>
                   
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Clark</td>
                    <td>Kent</td>
                    <td>clarkkent@mail.com</td>
                    
                </tr>
                
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
        <table class="table">
            <thead>
                <tr>
                    
                    <th>Date</th>
                    <th>Earnings</th>
                </tr>
            </thead>
            <tbody>
              
                <tr>
                    <td>Parker</td>
                    <td>peterparker@mail.com</td>
                </tr>
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


      function checkAll(bx) {
        var cbs = document.getElementsByTagName('input');
        for(var i=0; i < cbs.length; i++) {
          if(cbs[i].type == 'checkbox') {
            cbs[i].checked = bx.checked;
          }
        }
      }
  
</script>
<!--
<script>
function makeTimer() {

//		var endTime = new Date("29 April 2018 9:56:00 GMT+01:00");	
  var endTime = new Date("29 April 2022 9:56:00 GMT+01:00");			
    endTime = (Date.parse(endTime) / 1000);

    var now = new Date();
    now = (Date.parse(now) / 1000);

    var timeLeft = endTime - now;

    var days = Math.floor(timeLeft / 86400); 
    var hours = Math.floor((timeLeft - (days * 86400)) / 3600);
    var minutes = Math.floor((timeLeft - (days * 86400) - (hours * 3600 )) / 60);
    var seconds = Math.floor((timeLeft - (days * 86400) - (hours * 3600) - (minutes * 60)));

    if (hours < "10") { hours = "0" + hours; }
    if (minutes < "10") { minutes = "0" + minutes; }
    if (seconds < "10") { seconds = "0" + seconds; }

    $("#days").html(days + "<span>D </span>");
    $("#hours").html(hours + "<span>H </span>");
    $("#minutes").html(minutes + "<span>M </span>");
    $("#seconds").html(seconds + "<span>S</span>");		

}

setInterval(function() { makeTimer(); }, 1000);
</script> -->


 

<script> 
@foreach($rental as $key=>$data)
  $('#rent{{$data->rental_id}}').click(function(){
    $('#rental_id').val('{{$data->rental_id}}')
   $('#Return').modal('toggle')
  })
@endforeach

 /*//var end = new Array[('')];


// Update the count down every 1 second
var x = setInterval(function() {

  // Get today's date and time


  // Find the distance between now and the count down date
  var distance = countDownDate - now;

  // Time calculations for days, hours, minutes and seconds
  var days = Math.floor(distance / (1000 * 60 * 60 * 24));
  var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
  var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
  var seconds = Math.floor((distance % (1000 * 60)) / 1000);

  // Display the result in the element with id="demo"

  + minutes + "m " + seconds + "s ";

  // If the count down is finished, write some text
  if (distance < 0) {
    clearInterval(x);

  }
}, 1000);*/

$('#submit-return').click(function(){
  let formdata = new FormData()
  formdata.append('rental_id',$('#rental_id').val())
  formdata.append('issues',$('#issues').val())
  formdata.append('user_id',$('#user_id').val())
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


@endsection