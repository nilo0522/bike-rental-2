@extends('layouts.rentbike')
@section('title','Booking')

@section('content')


<style>
div.elem-group {
  margin: 15px 0;
}
div.elem-group.inlined {
  width: 49%;
  display: inline-block;
  float: left;
  margin-left: 1%;
}
label {
  display: block;
  font-family: 'Nanum Gothic';
  padding-bottom: 10px;
  font-size: 1.25em;
}
input, select, textarea {
  border-radius: 2px;
  border: 2px solid #777;
  box-sizing: border-box;
  font-size: 1.25em;
  font-family: 'Nanum Gothic';
  width: 100%;
  padding: 10px;
}
div.elem-group.inlined input {
  width: 100%;
  display: inline-block;
}
textarea {
  height: 95px;
}
hr {
  border: 1px dotted #ccc;
}
button {
  height: 50px;
  background: orange;
  border: none;
  color: white;
  font-size: 1.25em;
  font-family: 'Nanum Gothic';
  border-radius: 4px;
  cursor: pointer;
}
button:hover {
  border: 2px solid black;
}
/**CALENDAR */
  </style>

<div class="container">
  <div class="div_zindex">
    <div class="col-sm-12 d-flex justify-content-center">
      <h3 class="text-center "> 
        Rent A Bike Booking Form</h3>
    </div>
    
    <div class="col-sm-12">
        <div class="row">
            <div class="col-sm-6">
                <div class="sidebar_widget" id="personal">
                    <div class="card-header">
                        <h3 class="card-title">Personal Details</h3>
                    </div>
                    <div class="card-body">
                    <form id="booking-form" action="{{route('checkout')}}" method="POST" enctype=multipart/form-data>
                        @csrf   
                        @method('GET')  
                          <div class="form-group">
                       
                            <label for="name">Name</label>
                            <input class="form-control"  type="text" id="fname" name="fname"  value="{{ Auth::user()->fname }} {{Auth::user()->lname}}" pattern=[A-Z\sa-z]{3,20} required>
                          </div>
                          
                          <div class="form-group">
                            <label for="email">Email</label>
                            <input class="form-control"   type="email" id="email" name="email" value="{{ Auth::user()->email }}" required/>
                          </div>
                          <div class="form-group">
                            <label for="phone">Contact</label>
                            <input class="form-control"  type="tel" id="number" name="number" value="{{ Auth::user()->number }}"  required/>
                          </div>
                    </div>
                </div>


 


                <div class="sidebar_widget" id="div-total">
               
                  @foreach($bike_details as $bike)
                  <strong>Bike Price/ Day:</strong>
                  <span>₱<input style="width:60px;border:none transparent"id="bikeprice" name="bikeprice" value="{{$bike->bikeprice}}"></span>
                  
                  <div class="col-xs-12">Rent Days: <input style="width:50px;border:none transparent" name = "rentdays" id="num_nights"></label></div>
                 
                   
             
                      
                    
                               
                              
                                    <input type ="hidden"style="width:60px;border:none transparent" id="sub_total" name="sub_total" >
                       
                          <div class="col-xs-12">
                              <div>Full Payment:  </div>
                              <div class="pull-right"><span>₱</span>
                             
                              <input style="width:60px;border:none transparent"id="Totxdays" name="fullpayment"> </div>
                          </div>


                          <div class="col-xs-12">
                          <div class="form-group"><hr /></div>
                              <div>Transaction Fee:</div>
                              <div class="pull-right"><span>₱</span>
                              <input style="width:60px;border:none transparent"id="transfee" name="transfee"></div>
                          </div>

                         
                     
                      <div class="form-group"><hr /></div>
                      <div class="form-group">
                          <div class="col-xs-12">
                          <div class="form-group"><hr /></div>
                              <strong>Book Total:</strong>
                              <div class="pull-right"><span>₱</span>
                              <input style="width:60px;border:none transparent"id="total_amount" name="total_amount">
                          </div>
                          </div>
                      </div>
   <div>
   <button type="button" class="btn"> 
        <a href="../bikedetail/{{$bike->id}}" style="color:inherit;   text-decoration: none;"> Back </a>
      </button>
      &nbsp;
      <button type="submit" class="btn"> 
        <a  style="color:inherit;   text-decoration: none;">Procced Payment </a>
      </button>
     
   </div>
                                            
   <input type="hidden"value="{{Auth::user()->id}}"id="user_id" name="user_id"/>
   <input type="hidden"value="1"id="rent_status"name="rent_status"/>
   <input type="hidden"value="Ongoing"id="remarks"name="remarks"/>
    <input type="hidden" value="{{$bike->id}}"id="bike_id"name="bike_id"/>
  
  @endforeach  
                </div>
            </div>
            <div class="col-sm-6">
              <div class="sidebar_widget">
                <div class="card-header">
                    <h3 class="card-title">Rent Date</h3>
                </div>
                <div class="card-body">
                  <div class="form-group">
                    <label><strong>Start Date:</strong></label>
                    <input  name="rent_start_date" id="rent_start_date" class="form-control" autocomplete="off" data-date-format="yyyy-mm-dd hh:ii"  required />
                  </div>
                  <div class="form-group">
                    <label><strong>Return Date:</strong></label>
                    <input  name="rent_end_date" id="rent_end_date" class="form-control"  required  autocomplete="off"data-date-format="yyyy-mm-dd hh:ii"/>
                  </div>
                  <div class="form-group">
                    <label for="pickup">Pick up address</label>
                    <input class="form-control" id="pickup" name="pickup" placeholder="Set your pick up address." required/>
                  </div>
              </div>
            </div>
        </div>
    </div>
    </div>
    <div class="col-sm-12 d-flex justify-content-center">
        <div class="col-sm-10"  >
 
        </div>
    </div>
  </div>
</div>

     



</form> 



        
                    <!--SHIPPING METHOD END-->
                    <script  src="{{asset('js/moment/moment-with-locales.min.js')}}"></script>



    
<script >
     $('#div-total').hide()
     $('#personal').show()
            function showDays() {
              $('#personal').hide()
              $('#div-total').show()
                var start = $('#rent_start_date').datepicker('getDate');
                var end = $('#rent_end_date').datepicker('getDate');
                var bikeprice = $('#bikeprice').val();
                
                if (!start || !end) return;
                var days = (end - start) / 1000 / 60 / 60 / 24;
                $('#num_nights').val(days);
                $('#Totxdays').val(days* bikeprice);
                var Totxdays = document.getElementById("Totxdays").value;
                $('#sub_total').val(Totxdays);
                var sub = document.getElementById("sub_total").value;
                $('#transfee').val(sub*0.10);
                var transfee = document.getElementById("transfee").value;
                var total = parseInt(sub) + parseInt(transfee);
                $('#total_amount').val(total); 
            }
            var dateToday = new Date();
            $("#rent_start_date").datepicker({
                dateFormat: 'yy-mm-dd',
                onSelect: showDays,
               
                minDate: dateToday,
                onSelect: function() {
             dateSelect($('#rent_start_date').val())
        },
                onClose: function( selectedDate ) {
                    var dParts = selectedDate.split('-');
                    var in30Days = new Date(dParts[2] + '/' +
                                    dParts[1] + '/' +
                                    (+dParts[0] + 30)
                        );
                $( "#dep_darent_end_datete" ).datepicker( "option", "minDate", in30Days );
                }
            });
            $("#rent_end_date").prop('disabled',true)
           /* $("#rent_end_date").datepicker({
                dateFormat: 'yy-mm-dd',
                onSelect: showDays,
            });*/
          
            function dateSelect(start_date)
            {
             
                var date = new Date(start_date);
                date.setDate( date.getDate()+ 1);
                 var newdate = moment(date).format('YYYY-MM-DD')
                $("#rent_end_date").prop('disabled',false).datepicker({
                dateFormat: 'yy-mm-dd',
                onSelect:showDays,
                minDate: newdate,
            })
            }
      </script>  

@endsection