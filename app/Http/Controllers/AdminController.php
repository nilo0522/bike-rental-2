<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\BikeDetail;
use App\Models\Payment;
use App\Models\Rental;
use App\Models\RentalReturn;
use DB;
use Carbon\Carbon;

class AdminController extends Controller
{
    //
 
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {   $user = User::find(1);

        $total=Payment::select(\DB::raw('MONTH(payments.payment_date)'),DB::raw('sum(rentals.sub_total) as total'))
        ->leftJoin('rentals', 'payments.rental_id', '=', 'rentals.rental_id')
        ->orderby(DB::raw('MONTH(payments.payment_date)'))
        ->groupBy(DB::raw('MONTH(payments.payment_date)'))
        ->get();
      
        $totalincome = Payment::sum('transfee');
      
      $bikecount =BikeDetail::all()->count();
      $returncount =RentalReturn::all()->count();
      $usercount =User::all()
      ->where('role','=','user')
      ->count();
     
      
        return view('admin/dashboard',compact('user','total','bikecount','usercount','returncount','totalincome'));
    }


    public function profile()
    {
        return view('admin/edit');
    }


    public function users()
    {  
        
        
        $users = User::all()
        ->where('role','=','user');
        
        return view('admin/usermanagement',compact('users'));
    }

    public function payments()
    {  
        $pay = Payment::select('payments.*', 'users.fname', 'users.lname','rentals.bike_id')
        ->join('users', 'payments.user_id', '=', 'users.id')
        ->join('rentals', 'payments.rental_id', '=', 'rentals.rental_id')
       // wala pa na fix dli mutunga ang name sa renter
        ->get();
        return view('admin/payments',compact('pay'));
    }





    public function rentals()
    {
       
        $rental = Rental::select('rentals.*', 'bike_details.bikename', 'payments.*','users.fname','users.lname','renter.fname as rname','renter.lname as rlname')
        ->leftjoin('bike_details', 'rentals.bike_id', '=', 'bike_details.id')
        ->leftjoin('payments', 'payments.rental_id', '=', 'rentals.rental_id')
        ->leftjoin('users', 'bike_details.user_id', '=', 'users.id')
        ->leftjoin('users as renter', 'rentals.user_id', '=', 'renter.id')
       // wala pa na fix dli mutunga ang name sa renter
        ->get();

        return view('admin/rentals',compact('rental'));
    }
    public function return()
    {  
        $return = RentalReturn::select(
            'returned.*',
            'bike_details.id',
            'bike_details.bikename',
            'ownerID.fname as ownername',
            'ownerID.lname as lastname',
            'renterID.fname as rentername',
            'renterID.lname as renterlname',
            'ownerID.id',)
            ->leftjoin('payments','returned.payment_id','=','payments.payment_id')
            ->leftjoin('rentals','payments.rental_id','=','rentals.rental_id')
            ->leftjoin('bike_details','rentals.bike_id','=','bike_details.id')
            ->leftjoin('users as ownerID','bike_details.user_id','=','ownerID.id')
            ->leftjoin('users as renterID','returned.user_id','=','renterID.id')
            ->get();
        return view('admin/return',compact('return'));
    }


    public function extend()
    {  

        return view('admin/extend');
    }


    public function maps()
    {   
        return view('admin/map');
    }


    public function bikes()
    {   
        $owner = DB::table('bike_details')
        ->leftjoin('users', 'bike_details.user_id', '=', 'users.id')
        ->select('bike_details.*', 'users.fname', 'users.lname')
        ->get();
        return view('admin/bikes',compact ('owner'));
    }

    public function viewbike($id)
    { 
        
    $viewbike = BikeDetail::select('*')
    ->where('id', '=', $id)
    ->get();
    
        return view('admin/viewbike',compact('viewbike'));
    }
    public function edituser($id)
    {
   
        
        return view('admin/usermanagement');
    }
    public function approval(Request $request)
    {
        $user=User::where('id', $request->user_id)
        ->update(['email_verified_at' => Carbon::now()]);
        return redirect()->back()->with("message", "Successfully Approved User");
    }
    public function disable(Request $request)
    {
        $user=User::where('id', $request->user_id)
        ->update(['email_verified_at' => NULL]);
        return redirect()->back()->with("status", "Successfully Disable User");
    }
}