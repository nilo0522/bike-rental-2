@extends('layouts.rentbike')
@section('title','Payments')
@section('content')

<style>
.center {
  margin: auto;
  width: 60%;
  border: 3px solid #ff8c00;
  padding: 10px;
  background-color: #ccccff!important;
}

body {
  background-color: #f6f9fb!important;
}
.text-small {
  font-size: 0.9rem;
}
.rounded {
  border-radius: 1rem;
}
</style>
 
@php
        $stripe_key = 'pk_test_51JeXT6E8vw61AZaQK5ctuXAVdQoRgEYElIy8gPwbW8pUG9c6TbD994Cs7ETqBfYv1JNFcDJnbxIWmHRXroWDsGq800glncb2Pe';
    @endphp

       
              
        <!-- Font Awesome JS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

       
    <!-- FOR DEMO PURPOSE -->
  
<div class="center">
<div class="container py-5">
  
  <div class="row">
    <div class="col-lg-7 mx-auto">
      <div class="bg-white rounded-lg shadow-sm p-5">
        <!-- Credit card form tabs -->
        <ul role="tablist" class="nav bg-light nav-pills rounded-pill nav-fill mb-3">
          <li class="nav-item">
            <a data-toggle="pill" href="#nav-tab-card" class="nav-link active rounded-pill">
                                <i class="fa fa-credit-card"></i>
                               Pay With Credit Card
                            </a>
          </li>
          <li class="nav-item">
            <a data-toggle="pill" href="#nav-tab-bank" class="nav-link rounded-pill">
                                <i class="fa fa-bicycle"></i>
                                 Lease Information
                             </a>
          </li>
        </ul>
        <!-- End -->
        <!-- Credit card form content -->
        <div class="tab-content">
          <!-- credit card info-->
          <div id="nav-tab-card" class="tab-pane fade show active">
            <p class="alert alert-success">Some text success or error</p>
            <form id="payment-form" action="{{route('checkout.credit-card')}}" method="POST">
              <div class="form-group">
                
                <label for="username">Full name (on the card)</label>
                <input type="text" name="username" value ="" readonly class="form-control">
              </div>
              <div class="form-group">
                <label for="cardNumber">Card number</label>
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
                  <div class="input-group-append">
                    <span class="input-group-text text-muted">
                                                <i class="fa fa-cc-visa mx-1"></i>
                                                <i class="fa fa-cc-amex mx-1"></i>
                                                <i class="fa fa-cc-mastercard mx-1"></i>
                                            </span>
                  </div>
                
                  
                                 <div class="form-group">
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <button type="submit" class="btn btn-primary btn-submit-fix" id="card-button"
                                    class="btn btn-dark"
                                    type="submit"
                                    data-secret="{{ $intent }}">Confirm</button>
                                                </div>
                                            </div>
                                  </form>
                                </div>
          <!-- End -->
      
          <!-- rental info -->
          @foreach($latest as $bike)
          <div id="nav-tab-bank" class="tab-pane fade">
            <h6>Bike rental details</h6>
            <dl>
            <dt class="pull-right"><img class="img-responsive mx-auto d-block" style="width:300px;height:150px;" src="../uploads/{{$bike->bikepic}}" /></dt>
              <dt>Bike name</dt>
              <dd> {{$bike->bikename}}</dd>
            </dl>
            <dl>
              <dt>Bike Price</dt>
              <dd>{{$bike->bikeprice}}</dd>
            </dl>
            <dl>
              <dt>Total days</dt>
              <dd>{{$bike->rentdays}}</dd>
            </dl>
            <dl>
            <dl>
              <dt>Trasaction Fee</dt>
              <dd>{{$transfee}}</dd>
            </dl>
            <dl>
              <dt>Total Amount</dt>
              <dd>{{$bike->total_amount}}</dd>
            </dl>
                                                <input style="width:60px;border:none transparent"type = "hidden"id="rental_id" name="rental_id" value="{{$bike->rental_id}}" required >
                                                <input style="width:60px;border:none transparent"type = "hidden"id="user_id" name="user_id" value="" required >
                                                <input style="width:60px;border:none transparent"type = "hidden"id="payment_type" name="payment_type" value="1" required >
                                                <input style="width:60px;border:none transparent"type = "hidden"id="paid_by" name="paid_by" value="card" required >
                                                <input style="width:60px;border:none transparent"type = "hidden"id="remarks" name="remarks" value="Ongoing" required >
            <p class="text-muted">Please Check if the Information is right if not you may reset the <strong>Transaction Process</strong>.
            </p>
          </div>
          @endforeach
          <!-- End -->
        </div>
        <!-- End -->
      </div>
    </div>
  </div>
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
        alert("{{$stripekey}}")
        const stripe = Stripe('{{ $stripekey }}', { locale: 'en' }); // Create a Stripe client.
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
@endsection
