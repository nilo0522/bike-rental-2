
<style>
body {
  width: 950px;
  margin-left:350px auto;

  padding:45px;
}

div.elem-group {
  margin: 50px 0;
}

div.elem-group.inlined {
  width: 49%;
  display: inline-block;
  float: center;
  margin-left: 100%;
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
 
}

div.elem-group.inlined input {
  width: 100%;
 
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
.panel-heading {
    border-top-left-radius: 1px;
    border-top-right-radius: 1px;
}
.panel-info > .panel-heading {
    background-image: linear-gradient(to bottom, #555 500px, #888 100%);
}
/** MEDIA QUERIES **/
@media only screen and (max-width: 989px){
    .span1{
        margin-bottom: 15px;
        clear:both;
    }
}

@media only screen and (max-width: 764px){
    .inverse-1{
        float:right;
    }
}

@media only screen and (max-width: 586px){
    .cart-titles{
        display:none;
    }
    .panel {
        margin-bottom: 1px;
    }
}

.form-control {
    border-radius: 1px;
}

@media only screen and (max-width: 486px){
    .col-xss-12{
        width:50%;
    }
    .cart-img-show{
        display: none;
    }
    .btn-submit-fix{
        width:100%;
    }
    
}
/*
@media only screen and (max-width: 777px){
    .container{
        overflow-x: hidden;
    }
}*/

/* images*/
ol, ul {
  list-style: none;
}
.hand {
  cursor: pointer;
  cursor: pointer;
}
.cards{
    padding-left:0;
}
.cards li {
  -webkit-transition: all .2s;
  -moz-transition: all .2s;
  -ms-transition: all .2s;
  -o-transition: all .2s;
  transition: all .2s;
  background-image: url('//c2.staticflickr.com/4/3713/20116660060_f1e51a5248_m.jpg');
  background-position: 0 0;
  float: left;
  height: 32px;
  margin-right: 8px;
  text-indent: -9999px;
  width: 51px;
}
.cards .mastercard {
  background-position: -51px 0;
}
.cards li {
  -webkit-transition: all .2s;
  -moz-transition: all .2s;
  -ms-transition: all .2s;
  -o-transition: all .2s;
  transition: all .2s;
  background-image: url('//c2.staticflickr.com/4/3713/20116660060_f1e51a5248_m.jpg');
  background-position: 0 0;
  float: left;
  height: 32px;
  margin-right: 8px;
  text-indent: -9999px;
  width: 51px;
}
.cards .amex {
  background-position: -102px 0;
}
.cards li {
  -webkit-transition: all .2s;
  -moz-transition: all .2s;
  -ms-transition: all .2s;
  -o-transition: all .2s;
  transition: all .2s;
  background-image: url('//c2.staticflickr.com/4/3713/20116660060_f1e51a5248_m.jpg');
  background-position: 0 0;
  float: left;
  height: 32px;
  margin-right: 8px;
  text-indent: -9999px;
  width: 51px;
}
.cards li:last-child {
  margin-right: 50px;
}
/* images end */

.panel-info {
    border-color: #999;
    margin-left:40%;
}
.panel-heading {
    border-top-left-radius: 1px;
    border-top-right-radius: 1px;
}
.panel {
    border-radius: 1px;
    
}
.panel-info > .panel-heading {
    color:#f1f5f8;
    border-color: #999;
}
.panel-info > .panel-heading {
    background-image: linear-gradient(to bottom, #555 0px, #888 100%);
}


  </style>
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

@php
        $stripe_key = 'pk_test_51JeXT6E8vw61AZaQK5ctuXAVdQoRgEYElIy8gPwbW8pUG9c6TbD994Cs7ETqBfYv1JNFcDJnbxIWmHRXroWDsGq800glncb2Pe';
    @endphp
    <form id="payment-form" action="{{route('checkout.credit-card')}}" method="POST">
    @csrf 


                    <!--CREDIT CART PAYMENT-->
                    <div class="panel panel-info">
                       @foreach($latest as $bike)
                       <div class="container">
                  
        
                       <div class="row"><br>
  <div class="col-xs-2 col-sm-3"><img class="img-responsive mx-auto d-block" src="../uploads/{{$bike->bikepic}}" /></div>
  <div class="col-xs-2 col-sm-3"><br><strong>Bike Name:</strong>
                                                &nbsp;&nbsp;
                                                &nbsp;&nbsp;
                                                &nbsp;&nbsp;
                                                {{$bike->bikename}}<br>
  <strong>Per Day:</strong> &nbsp;&nbsp;
                            &nbsp;&nbsp;
                            &nbsp;&nbsp;&nbsp;
                            &nbsp;&nbsp;
                            &nbsp;&nbsp;
                            {{$bike->bikeprice}}<br>
<strong>Rent Days:</strong> &nbsp;&nbsp;
                            &nbsp;&nbsp;
                            &nbsp;&nbsp;
                            &nbsp;&nbsp;
                            {{$bike->rentdays}}<br>
  <strong>Sub Total:</strong><small>(60%)</small>&nbsp;&nbsp;
                             &nbsp;&nbsp;
                             
                          
                             {{$bike->sub_total}}<br>
 
                           
<strong>Transaction Fee:</strong> 
&nbsp;&nbsp;&nbsp;<input style="width:50px;border:none transparent"id="transfee" name="transfee" value="{{$transfee}}">
                            <br>
<strong>Total:</strong>&nbsp;&nbsp;
                        &nbsp;&nbsp;
                        &nbsp;&nbsp;
                        &nbsp;&nbsp;
                        &nbsp;&nbsp;
                        &nbsp;&nbsp;
                        &nbsp;&nbsp;
                        &nbsp;{{$bike->total_amount}}<br>

                        </div>
                        </div>
                        </div>
                        <input style="width:60px;border:none transparent"type = "hidden"id="rental_id" name="rental_id" value="{{$bike->rental_id}}" required >
                                                <input style="width:60px;border:none transparent"type = "hidden"id="user_id" name="user_id" value="{{Auth::user()->id}}" required >
                                                <input style="width:60px;border:none transparent"type = "hidden"id="payment_type" name="payment_type" value="1" required >
                                                <input style="width:60px;border:none transparent"type = "hidden"id="paid_by" name="paid_by" value="card" required >
                                                <input style="width:60px;border:none transparent"type = "hidden"id="remarks" name="remarks" value="Ongoing" required >  
                                      
                       @endforeach
                       <br>
                       <br>
                        <div class="text-center panel-heading" style="font-size: 16px; color:#24376e;"><span><i class="glyphicon glyphicon-lock"></i></span> Secure Payment</div>
                        <div class="panel-body">
                           <br>
                           <div class="form-group">
                                            <div class="col-md-12">
                                                <span>Pay secure using your credit card.</span>
                                            </div>
                                    <div class="col-md-12">
                                                <ul class="cards">
                                                    <li class="visa hand">Visa</li>
                                                    <li class="mastercard hand">MasterCard</li>
                                                    <li class="amex hand">Amex</li>
                                                </ul>
                                                <div class="clearfix"></div>
                                            </div>
                                            <br>
                                            <br> <br> <br>
                                        <div class="form-group">
                                                <div class="col-md-12"><label for="card-element">
                                                    Enter your credit card information</label>
                                                </div>
                                            </div>
                                                <div id="card-element">
                                                         </div>
                                                <!-- A Stripe Element will be inserted here. -->
                                                
                                                <!-- Used to display form errors. -->
                                                <div id="card-errors" role="alert"></div>
                                               
                                            </div>
                                            <div class="form-group">
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <button type="submit" class="btn btn-primary btn-submit-fix" id="card-button"
                                    class="btn btn-dark"
                                    type="submit"
                                    data-secret="{{ $intent }}">Place Order</button>
                                                </div>
                                            </div>
                                         
                            </div>
                        </div>
                        </div>
                    </div>
                </div>
                    <!--CREDIT CART PAYMENT END-->
            </div>

            </form>
        </div>
        </div>
    <div class="row cart-footer">
        
</div>
</div>


    <script src="https://js.stripe.com/v3/"></script>
    <script>
        // Custom styling can be passed to options when creating an Element.
        // (Note that this demo uses a wider set of styles than the guide below.)

        var style = {
            base: {
                color: '#32325d',
                lineHeight: '18px',
                fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
                fontSmoothing: 'antialiased',
                fontSize: '16px',
                '::placeholder': {
                    color: '#a4b0bd'
                }
            },
            invalid: {
                color: '#fa755a',
                iconColor: '#fa755a'
            }
        };
    
        const stripe = Stripe('{{ $stripe_key }}', { locale: 'en' }); // Create a Stripe client.
        const elements = stripe.elements(); // Create an instance of Elements.
        const cardElement = elements.create('card', { style: style }); // Create an instance of the card Element.
        const cardButton = document.getElementById('card-button');
        const clientSecret = cardButton.dataset.secret;
       
        cardElement.mount('#card-element'); // Add an instance of the card Element into the `card-element` <div>.
    
        // Handle real-time validation errors from the card Element.
        cardElement.addEventListener('change', function(event) {
            var displayError = document.getElementById('card-errors');
            if (event.error) {
                displayError.textContent = event.error.message;
            } else {
                displayError.textContent = '';
            }
        });
    
        // Handle form submission.
        var form = document.getElementById('payment-form');
    
        form.addEventListener('submit', function(event) {
            event.preventDefault();
    
        stripe.handleCardPayment(clientSecret, cardElement, {
                payment_method_data: {
                    //billing_details: { name: cardHolderName.value }
                }
            })
            .then(function(result) {
                console.log(result);
                if (result.error) {
                    // Inform the user if there was an error.
                    var errorElement = document.getElementById('card-errors');
                    errorElement.textContent = result.error.message;
                } else {
                    console.log(result);
                    form.submit();
                }
            });
        });
    </script>