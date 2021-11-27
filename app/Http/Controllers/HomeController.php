<?php


namespace App\Http\Controllers;
use App\Models\BikeDetail;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Rental;
use Auth;




class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth','verified']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('user.home');
    }



  
    public function profile($bike_id)
    {


        $rental = Rental::select('*')
        ->leftjoin('bike_details', 'rentals.bike_id', '=', 'bike_details.id')
        ->leftjoin('users', 'bike_details.user_id', '=','users.id')
        ->where('rentals.user_id','=',Auth::user()->id)
        ->get();

       

        $BikeDetail = BikeDetail::select('*')
        ->where('user_id', '=', $bike_id)
        ->get();
    return view ('user/account',compact('BikeDetail','rental'));
    }
  
}
