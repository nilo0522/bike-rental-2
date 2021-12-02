<?php

namespace App\Http\Controllers;
use App\Models\BikeDetail;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Rental;
use App\Models\Payment;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;


class BookingController extends Controller
{

    public function booking(Request $request,$id)
    {   $user = User::find(1);
        $bike_details = BikeDetail::where('id', $id)->get();
        $rental = Rental::where('bike_id',$id)->get();
<<<<<<< HEAD
        return view('user.checkout.booking',compact('bike_details','user','rental'));
=======
        return view('user.checkout.booking',compact('bike_details','rental'));
>>>>>>> 865a1c0904332533bbc1b8a9f808ba870324f8e5
  
    }
}