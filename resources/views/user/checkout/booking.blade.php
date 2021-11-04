<!-- UNDER REPAIR-->
<!-- UNDER REPAIR-->
<!-- UNDER REPAIR-->
<!-- UNDER REPAIR-->
<!-- UNDER REPAIR-->
<!-- UNDER REPAIR-->
<!-- UNDER REPAIR-->
<!-- UNDER REPAIR-->
<!-- UNDER REPAIR-->
<!-- UNDER REPAIR-->
<!-- UNDER REPAIR-->
<!-- UNDER REPAIR-->
<!-- UNDER REPAIR-->
<!-- UNDER REPAIR-->
<!-- UNDER REPAIR-->

<style>
body {
  width: 500px;
  margin: 0 auto;
  padding: 50px;
}

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
  </style>


<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
   
         
           <h3 class="text-center"> 
          &nbsp; &nbsp; &nbsp;
          &nbsp; &nbsp; &nbsp; 
          &nbsp; &nbsp; &nbsp;
          &nbsp; &nbsp; &nbsp;
          &nbsp; &nbsp; &nbsp;Rent A Bike Booking Form</h3>

          <form id="booking-form" action="{{route('checkout')}}" method="POST" enctype=multipart/form-data>
                        @csrf   
                        @method('GET')                                 
                <div class="elem-group">
                
       <!--REVIEW ORDER-->
              
<hr>
             <input type="hidden" value="0" name="rent_status"/>
             <input type="hidden" value="pending" name="remarks"/>
                <label for="name">First Name</label>
                <input type="hidden" id="user_id" name="user_id"  value="{{ Auth::user()->id }}" pattern=[A-Z\sa-z]{3,20} required>
                
                <input type="text" id="fname" name="fname"  value="{{ Auth::user()->fname }}" pattern=[A-Z\sa-z]{3,20} required>
                <label for="lname">Last Name</label>
                <input type="text" id="lname" name="lname" value="{{ Auth::user()->lname }}" pattern=[A-Z\sa-z]{3,20} required>
               
            </div>
                <div class="elem-group">
                <label for="email">Your E-mail</label>
                <input type="email" id="email" name="email" value="{{ Auth::user()->email }}" required>
            </div>
            <div class="elem-group">
                <label for="phone">Your Phone</label>
                <input type="tel" id="number" name="number" value="{{ Auth::user()->number }}"  required>
            </div>
         
            
            <div class="elem-group inlined">
            <div class="col-md-12"><strong>Start Date:</strong></div>
            <div class="col-md-12"><input  name="rent_start_date" id="rent_start_date" class="form-control" autocomplete="off"  required /></div>
                                                                    
            </div>
            <div class="elem-group inlined">
            <div class="col-md-12"><strong>End Date:</strong></div>
                <div class="col-md-12"><input  name="rent_end_date" id="rent_end_date" class="form-control"  required  autocomplete="off"/></div>
            </div>
          
           
            <div class="elem-group">
                <label for="pickup">Pick up Address</label>
                <input id="pickup" name="pickup" placeholder="Set your Pick Up Address." required/>
            </div>


            @foreach($bike_details as $bike)
                        <div class="panel-body">
                            


   
    
        <div class="col-4">
          <div class="mx-auto text-center">
          &nbsp; &nbsp; &nbsp;
          &nbsp; &nbsp; &nbsp; 
          &nbsp; &nbsp; &nbsp;
          &nbsp; &nbsp; &nbsp;
          &nbsp; &nbsp; &nbsp;
          
          <img class="img-responsive mx-auto d-block" src="../uploads/{{$bike->bikepic}}" />
          &nbsp; &nbsp; &nbsp;
          &nbsp; &nbsp; &nbsp; 
          &nbsp; &nbsp; &nbsp;
          &nbsp; &nbsp; &nbsp;
          &nbsp; &nbsp; &nbsp;
          <label >{{$bike->bikename}} </label>
          <input type="hidden"id="bike_id" name="bike_id" value="{{$bike->id}}">
                      
       </div>     
      <br>

                                    <span>₱</span>
                                    <input style="width:60px;border:none transparent"id="bikeprice" name="bikeprice" value="{{$bike->bikeprice}}">
                               
                               
                                    <div class="col-xs-12">Rent Days: <input style="width:50px;border:none transparent" name = "rentdays" id="num_nights"></label></div>
                                </div>
                                <span>₱</span>
                                    <input style="width:60px;border:none transparent"id="Totxdays" name="fullpayment">
                            </div>
                               
                            </div>
                            <div class="form-group"><hr /></div>
                            <div class="form-group">
                            
                            
                                    <strong>Subtotal  </strong><small>(60% Payment)</small>
                                    <div class="pull-right"><span>₱</span>
                                        <input style="width:60px;border:none transparent"id="sub" name="sub_total" >
                            
                                </div>
                                <div class="col-xs-12">
                                <div class="form-group"><hr /></div>
                                    <strong>Transaction Fee</strong>
                                    
                                    <div class="pull-right"><span>₱</span>
                                    <input style="width:60px;border:none transparent"id="transfee" name="transfee"></div>
                                </div>
                            </div>
                            <div class="form-group"><hr /></div>
                            <div class="form-group">
                                <div class="col-xs-12">
                                <div class="form-group"><hr /></div>
                                    <strong>Book Total</strong>
                                    <div class="pull-right"><span>₱</span>
                                    <input style="width:60px;border:none transparent"id="total_amount" name="total_amount">
                                </div>
                                </div>
                    



            <button class = "justify"type="submit">Book the Bike</button>                                                         
            </form>
        @endforeach                             
                    <!--SHIPPING METHOD END-->
                    <script  src="{{asset('js/moment/moment-with-locales.min.js')}}"></script>
<script>
            
            function showDays() {
                var start = $('#rent_start_date').datepicker('getDate');
                var end = $('#rent_end_date').datepicker('getDate');
                var bikeprice = document.getElementById("bikeprice").value;
                
                if (!start || !end) return;
                var days = (end - start) / 1000 / 60 / 60 / 24;
                $('#num_nights').val(days);
                $('#Totxdays').val(days* bikeprice);
                var Totxdays = document.getElementById("Totxdays").value;
                $('#sub').val(Totxdays *0.6);
                var sub = document.getElementById("sub").value;
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
                onSelect: showDays,
                minDate: newdate,
            })
            }
      </script>  


