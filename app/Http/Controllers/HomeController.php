<?php


namespace App\Http\Controllers;
use App\Models\BikeDetail;
use Illuminate\Http\Request;
use App\Models\User;


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
        $BikeDetail = BikeDetail::select('*')
        ->where('user_id', '=', $bike_id)
        ->get();
    return view ('user/account',compact('BikeDetail'));
    }
  
}
