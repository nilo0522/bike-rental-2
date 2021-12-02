<?php

namespace App\Http\Controllers;
use App\Models\BikeDetail;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Rental;
use App\Models\Payment;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Stripe;
use DB;
use Auth;
use Session;
use Carbon\Carbon;
use Illuminate\Support\Facades\View;
class CheckoutController extends Controller
{
    //

   
    public function checkout(Request $request)
    {   
        $user = User::find(1);
        // Enter Your Stripe Secret
       $stripekey= env('STRIPE_PUBLIC_KEY');
       $secretkey = env('STRIPE_SECRET_KEY');
        \Stripe\Stripe::setApiKey($secretkey);

       
  
        $filter =Rental::where('bike_id',$request->bike_id)->where('rent_start_date', '<=', $request->rent_end_date)
        ->where('rent_end_date', '>=', $request->rent_start_date)
        ->count();
        if(!$filter)
{
            $user = User::find($request->user_id)->first();
            $bike = Rental::create($request->all());
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
            return view('user.checkout.credit-card',compact('intent','latest','transfee','user'))->with('stripekey',$stripekey);
    }

return redirect()->back()->with('error','dasd');

}
public function Viewcheckout()
{
    return view('user.checkout.credit-card');
}



    public function afterPayment(Request $request)
    {

        $user = User::find(1);
        $payments = DB::table('payments')->insertGetId([
            'user_id'=>Auth::user()->id,
            'rental_id'=>$request->input('rental_id'),
            'payment_type'=>$request->input('payment_type'),
            'paid_by'=>$request->input('paid_by'),
            'remarks'=>$request->input('remarks'),
            'transfee'=>$request->input('transfee'),
            'rstatus'=>0,
            'payment_date'=>Carbon::create(now())->format('Y-m-d h:i:s')
        
        
    ]);
            $payments = DB::getPdo()->lastInsertId();
            $pay = $payments;
            $pay = Payment::select('payments.*','rentals.*','bike_details.*',)
                ->where('payment_id', '=', $pay)
                ->join('rentals', 'payments.rental_id', '=', 'rentals.rental_id')
                ->join('bike_details', 'rentals.bike_id', '=', 'bike_details.id')
                ->get();
            
            $rental = Rental::select('*')
                ->where('rental_id', '=', $request->input('rental_id'))
                ->get();
                
            $status =  BikeDetail::where('id', $request->bike_id)
            ->update(['bikestatus' => 1]);

    return view('user.receipt',compact('rental','pay','user','status'));
    }
}

 //makatext na
