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
.ui-datepicker-prev span,
.ui-datepicker-next span {
  background-image: none !important;
}

.ui-datepicker-prev:before,
.ui-datepicker-next:before {
  font-family: FontAwesome;
  position: absolute;
  top: 0;
  right: 0;
  bottom: 0;
  left: 0;
  display: flex;
  font-weight: normal;
  align-items: center;
  justify-content: center;
}

.ui-datepicker-prev:before {
  content: "\f100";
}

.ui-datepicker-next:before {
  content: "\f101";
}
/**CALENDAR */
  </style>
<link rel="stylesheet" href="{{asset('assets/css/jquery-ui.css')}}">

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
                            <input class="form-control"  type="text" id="fname" name="fname"  value="{{ Auth::user()->fname }} {{Auth::user()->lname}}" pattern=[A-Z\sa-z]{3,20} readonly />
                          </div>
                          
                          <div class="form-group">
                            <label for="email">Email</label>
                            <input class="form-control"   type="email" id="email" name="email" value="{{ Auth::user()->email }}" readonly />
                          </div>
                          <div class="form-group">
                            <label for="phone">Contact</label>
                            <input class="form-control"  type="tel" id="number" name="number" value="{{ Auth::user()->number }}"  readonly />
                          </div>
                    </div>
                </div>
                <div class="sidebar_widget" id="div-total">
                  @foreach($bike_details as $bike)
                  <strong>Bike Price/ Day:</strong>
                  <span>₱ <input style="width:60px;border:none transparent" type="text" id= "bikeprice"name="bikeprice" value="{{$bike->bikeprice}}" readonly>
                  </span>
                  
                  <div class="col-xs-12">Rent Days:<input style="width:50px;border:none transparent" name = "rentdays" id="rentdays" readonly /></label></div>
                      <input type ="hidden"style="width:60px;border:none transparent" id="sub_total" name="sub_total"readonly />
                          <div class="col-xs-12">
                              <div>Full Payment:  </div>
                              <div class="pull-right"><span>₱</span>
                              <input style="width:60px;border:none transparent"id="fullpayment" name="fullpayment" readonly /> </div>
                          </div>
                          <div class="col-xs-12">
                          <div class="form-group"><hr /></div>
                              
                              <div class="pull-right">
                              <input type="hidden"style="width:85px;border:none transparent"id="transfee" name="transfee" readonly /></div>
                          </div>
                      <div class="form-group">
                          <div class="col-xs-12">
                          <div class="form-group"><hr /></div>
                              
                              <div class="pull-right">
                              <span><input type="hidden"style="width:60px;border:none transparent" type="text" id= "total_amount"name="total_amount" readonly>
                              </span>
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
                      <input type="hidden"value="0"id="rent_status"name="rent_status"/>
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

var dateRange = [];           // array to hold the range
// populate the array
var rental =  @json($rental);
  $.each(rental, function(key,value) {
                    for (var d = new Date(value.rent_start_date); d <= new Date(value.rent_end_date); d.setDate(d.getDate() + 1)) {
    dateRange.push($.datepicker.formatDate('yy-mm-dd', d));
    ""
}
                }); 
console.log(dateRange)
function disableDates(date) {
  var string = $.datepicker.formatDate('yy-mm-dd', date);
  return [dateRange.indexOf(string) == -1];
}

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
                $('#rentdays').val(days);
                $('#fullpayment').val(days* bikeprice);
                var Totxdays = document.getElementById("fullpayment").value;
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
                beforeShowDay: disableDates,
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
                beforeShowDay: disableDates,
            })
            }

           
      </script>  

@if(session('error')) 
<script>
alert('error');
</script>
@endif

@endsection