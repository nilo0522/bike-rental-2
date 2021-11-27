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
    {   
        $bike_details = BikeDetail::where('id', $id)->get();
        $rental = Rental::where('bike_id',$id)->get();
        return view('user.checkout.booking',compact('bike_details','rental'));
  
    }
}