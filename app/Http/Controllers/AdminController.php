<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\BikeDetail;
use App\Models\Payment;
use App\Models\Rental;
use DB;


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
    {
        return view('admin/dashboard');
    }
  
  /*  public function update(Request $request, User $users)
    {

        $data=$request->validate([
                'fname'=>'required',
                'lname'=>'required',
                'email'=>'required',
    
            ]);
            $users->update($data);
            return redirect(url('../index'));
     
    }*/

    public function profile()
    {
        return view('admin/edit');
    }


    public function users()
    {  
        
        
        $users = User::select('users.*','bike_details.*')
        ->leftjoin('bike_details', 'bike_details.user_id', '=', 'users.id')
        
        ->get();
       
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


}