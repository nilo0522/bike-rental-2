<?php


namespace App\Http\Controllers;
use App\Models\BikeDetail;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Rental;
use App\Models\RentalReturn;
use App\Models\Payment;
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
        $user = User::find(1);
        return view('user.home',compact('user'));
    }



  
    public function profile($bike_id)
    {

       

      

            //Book Bike
            $booked = Payment::select('payments.*',
            'rentals.*','bike_details.*', 
            'ownerID.fname as ownername',
            'ownerID.lname as lastname',
            'renterID.fname as rentername',
            'renterID.lname as renterlname',)
            ->leftjoin('rentals', 'payments.rental_id', '=', 'rentals.rental_id')
            ->leftjoin('bike_details', 'rentals.bike_id', '=','bike_details.id')
            ->leftjoin('users', 'bike_details.user_id', '=', 'users.id')
            ->leftjoin('users as ownerID','bike_details.user_id','=','ownerID.id')
            ->leftjoin('users as renterID','payments.user_id','=','renterID.id')
            ->where('bike_details.user_id','=',Auth::user()->id)
            ->get();




    //Earnings Query
            $earnings = Payment::select('payments.*','rentals.*','bike_details.*',)
            ->leftjoin('rentals', 'payments.rental_id', '=', 'rentals.rental_id')
            ->leftjoin('bike_details', 'rentals.bike_id', '=','bike_details.id')
            ->leftjoin('users', 'bike_details.user_id', '=', 'users.id')
            ->where('users.id','=',Auth::user()->id)
            ->get();


    //RETURN QUERY

            $return = RentalReturn::select(
            'returned.*',
            'bike_details.id',
            'bike_details.bikename',
            'ownerID.fname as ownername',
            'ownerID.lname as lastname',
            'renterID.fname as rentername',
            'renterID.lname as renterlname',
            'ownerID.id as ownerID',)
            ->leftjoin('payments','returned.payment_id','=','payments.payment_id')
            ->leftjoin('rentals','payments.rental_id','=','rentals.rental_id')
            ->leftjoin('bike_details','rentals.bike_id','=','bike_details.id')
            ->leftjoin('users as ownerID','bike_details.user_id','=','ownerID.id')
            ->leftjoin('users as renterID','returned.user_id','=','renterID.id')
            ->where('bike_details.user_id','=',Auth::user()->id)
            ->get();

            //Confirmation QUERY

            $confirm = RentalReturn::select(
                'returned.*',
                'bike_details.*',
                'payments.*',
                'rentals.*',
                'ownerID.id',
                'renterID.id',
                'ownerID.id',)
                ->leftjoin('payments','returned.payment_id','=','payments.payment_id')
                ->leftjoin('rentals','payments.rental_id','=','rentals.rental_id')
                ->leftjoin('bike_details','rentals.bike_id','=','bike_details.id')
                ->leftjoin('users as ownerID','bike_details.user_id','=','ownerID.id')
                ->leftjoin('users as renterID','returned.user_id','=','renterID.id')
                ->where('rentals.user_id','=',Auth::user()->id)
                ->get();



    //RENTAL QUERY
            $rental = Payment::select('payments.*','rentals.*','bike_details.*','users.*')
            ->leftjoin('rentals', 'payments.rental_id', '=', 'rentals.rental_id')
            ->leftjoin('bike_details', 'rentals.bike_id', '=','bike_details.id')
            ->leftjoin('users', 'bike_details.user_id', '=', 'users.id')
            ->where('rentals.user_id','=',Auth::user()->id)
            ->get();

    //BIKEQUERY


        $BikeDetail = BikeDetail::select('*')
        ->where('user_id', '=', $bike_id)
        ->get();
    return view ('user/account',compact('BikeDetail','rental','return','earnings','confirm','booked'));
    }

    public function aboutus()
    {
        $user = User::find(1);
        return view('user.about-us',compact('user'));
    }
    public function contactus()
    {
        $user = User::find(1);
        return view('user.contact',compact('user'));
    }
  
}
