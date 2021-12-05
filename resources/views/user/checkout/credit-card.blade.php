@extends('layouts.rentbike')
@section('title', 'Payments')
@section('content')

    <style>
      

.rounded {
    border-radius: 1rem
}

.nav-pills .nav-link {
    color: #555
}

.nav-pills .nav-link.active {
    color: white
}

input[type="radio"] {
    margin-right: 5px
}


    </style>
    @php
    $stripe_key = 'pk_test_51JeXT6E8vw61AZaQK5ctuXAVdQoRgEYElIy8gPwbW8pUG9c6TbD994Cs7ETqBfYv1JNFcDJnbxIWmHRXroWDsGq800glncb2Pe';
    @endphp


  
   



    
    <body style="font-family: 'Open Sans', sans-serif;">
        <div class="container">
        <div class="centered title"><h1>Welcome to our checkout.</h1></div>
     </div>
     <hr class="featurette-divider"></hr>
         <div class="container">
            <div class="row">
                <div class="col-sm-6">
                <div class="tab-content">
        <div id="stripe" class="tab-pane fade in active">
          <form accept-charset="UTF-8" action="/" class="require-validation" data-cc-on-file="false" data-stripe-publishable-key="pk_bQQaTxnaZlzv4FnnuZ28LFHccVSaj" id="payment-form" method="post"><div style="margin:0;padding:0;display:inline"><input name="utf8" type="hidden" value="✓" /><input name="_method" type="hidden" value="PUT" /><input name="authenticity_token" type="hidden" value="qLZ9cScer7ZxqulsUWazw4x3cSEzv899SP/7ThPCOV8=" /></div>
            <br>
          <div class='form-row'>
              <div class='form-group required'>
                <div class='error form-group hide'>
                <div class='alert-danger alert'>
                  Please correct the errors and try again.
              
              </div>
              <br>
              <br>
              <br>
              <br>
            </div>
                <label class='control-label'>Name on Card</label>
                <input class='form-control' size='4' type='text' value="{{ Auth::user()->fname }} {{ Auth::user()->lname }}" readonly>
              </div>
                    
            </div>
            <div class='form-row'>
              <div class='form-group card required'>
              <div class="col-md-12"><label for="card-element">
                Enter your credit card information</label>
                  </div>
                  <div id="card-element" size="20"></div>
                  <div id="card-errors" role="alert"></div>
              </div>
            </div>
             <div class='form-row'>
              <div class='form-group card required'>
                <label class='control-label'>Billing Address</label>
                <input autocomplete='off' class='form-control' size='20' type='text'>
              </div>
            </div>
            
            <div class='form-row'>
              <div class='form-group'>
                         <label class='control-label'></label> 
                         <button type="submit" class="btn btn-primary btn-submit-fix" id="card-button"
                                                class="btn btn-dark" type="submit"
                                                data-secret="{{ $intent }}">Confirm</button>
              </form>    
                
              </div>
            </div>    
            
              </div>
              
                <div id="paypal" class="tab-pane fade">
                <form action="?" id="paypalForm" method="POST">
                <div class="paypalResult"><!-- content will load here --></div>
               <br>
                <input type="hidden" id="action" value="paypal"></input>
                <input type="hidden" id="token" value="token-supersecuretoken123123123"></input>
               <a href="#paypal"><img src="https://www.paypalobjects.com/webstatic/en_US/i/buttons/checkout-logo-large.png" alt="paypal" width="100%"></a>
               <br><br><br>
                  <button class='form-control btn btn-primary submit-button' type='submit'> Continue →</button>
              </div>
            </div>
            
            
          
        </div>   
     
        <div class="col-sm-6">
           <label class='control-label'></label><!-- spacing -->
        
          <div class="alert alert-info"">Please choose your method of payment and hit continue. You will then be sent down to pay using your selected payment option.</div>
       <br>
         <div class="btn-group-vertical btn-block">
             <a class="btn btn-default" style="text-align: left;" data-toggle="tab" href="#stripe">Stripe/Credit Card</a>
          <a class="btn btn-default" style="text-align: left;" data-toggle="tab" href="#paypal">Gcash</a>
          </div>
          
          <br><br><br>
         
         <div class="jumbotron jumbotron-flat">
    <div class="center"><h2><i>BALANCE DUE:</i></h2></div>
           <div class="paymentAmt">$100</div>
           
                 
          
        </div>
        
     
          
            <br><br><br>
        </div>
                    
                    
                    
                </div>
                
                
                
            </div>
        </div>
        
        
        </form>
        
    </body>





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
        alert("{{ $stripekey }}")
        const stripe = Stripe('{{ $stripekey }}', {
            locale: 'en'
        }); // Create a Stripe client.
        const elements = stripe.elements(); // Create an instance of Elements.
        const cardElement = elements.create('card', {
            style: style
        }); // Create an instance of the card Element.
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
    <script>
        $(function() {
        $('[data-toggle="tooltip"]').tooltip()
        })
        </script>
@endsection
