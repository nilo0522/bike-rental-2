<?php

namespace App\Http\Controllers;
use App\Models\BikeDetail;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Rental;
use App\Models\Payment;
use Stripe;
use Illuminate\Support\Facades\DB;
use Auth;
use Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;
class CheckoutController extends Controller
{
    //

   
    public function checkout(Request $request)
    {   
        // Enter Your Stripe Secret
       $stripekey= env('STRIPE_PUBLIC_KEY');
        \Stripe\Stripe::setApiKey('sk_test_51JeXT6E8vw61AZaQLjaHy3SUO9iv2tLPKyDC8vfIQKdB1Vg2ST3iQVR18l7uiIsYVll4QQzxCHO4rGyWTi0u90jO00MkekBmOK');
    

        
      
    //Para sa price
    
   

   /*  $bike= DB::table('rentals')->insertGetId([
        'user_id'=>$request->input('user_id'),
        'bike_id'=>$request->input('bike_id'),
        'rent_start_date'=>$request->input('rent_start_date'),
        'rent_end_date'=>$request->input('rent_end_date'),
        'sub_total'=>$request->input('sub_total'),
        'total_amount'=>$request->input('total_amount'),
        'fullpayment'=>$request->input('Totxdays'),
        'rentdays'=>$request->input('num_nights'),
        'rent_status'=>$request->input('rent_status'),
        'remarks'=>$request->input('remarks'), 
        'pickup'=>$request->input('pickup'),
       
]);*/
    $bike = Rental::create($request->all());

      Log::info('bike_id '.$bike->id);

$bike = DB::getPdo()->lastInsertId();
$latest = DB::table('rentals')
->join('bike_details', 'rentals.bike_id', '=', 'bike_details.id')
->select('bike_details.*', 'rentals.*')
->where('rentals.rental_id','=',$bike)
->get();
    $transfee =$request->input('transfee');
    $amount =$request->input('total_amount');
   
   /* $total = $request->input('total');
    $amount = $request->$total;
*/
        $amount*=100;
        $payment_intent = \Stripe\PaymentIntent::create([
			'amount' => round($amount*100),
			'currency' => 'PHP',
			'description' => 'Payment From Bike Rental',
			'payment_method_types' => ['card'],
		]);
        //FOR BIKES
		$intent = $payment_intent->client_secret;
        Log::info($payment_intent);
		return view('user.checkout.credit-card',compact('intent','latest','transfee'))->with('stripekey',$stripekey);
    }

    

    public function afterPayment(Request $request)
    {

       
      
            
        $payments = DB::table('payments')->insertGetId([
            'user_id'=>Auth::user()->id,
            'rental_id'=>$request->input('rental_id'),
            'payment_type'=>$request->input('payment_type'),
            'paid_by'=>$request->input('paid_by'),
            'remarks'=>$request->input('remarks'),
            'transfee'=>$request->input('transfee'),
            'payment_date' =>now(),
        
    ]);
    $payments = DB::getPdo()->lastInsertId();
    $pay = $payments;
    

            $pay = Payment::select('*')
                ->where('payment_id', '=', $pay)
                ->get();
            $rental = Rental::select('*')
                ->where('rental_id', '=', $request->input('rental_id'))
                ->get();
    return view('user.receipt',compact('rental','pay'));
    }
}

 //makatext na

