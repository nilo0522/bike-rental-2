<?php

namespace App\Http\Controllers;

use App\Models\BikeDetail;
use App\Models\Rental;
use App\Models\User;
use Illuminate\Http\Request;
use DB;
use Auth;
use Illuminate\Support\Facades\Auth as FacadesAuth;

class BikeDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        
        $bike_detail = BikeDetail::all();
        $user = User::find(1);
        return view('user.bike-listing',compact ('bike_detail','user'));
     
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   $user = User::find(1);
        return view('user.uploadbike',compact('user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($contents=$request->file('bikepic')){
            $name=$contents->getClientOriginalName();
            $contents->move('uploads',$name);



            // $request->validate([
            //     'user_id'=>'required',
            //     'bikename'=>'required',
            //     'bikeprice'=>'required',
            //     'bikemodel'=>'required',
            //     'bikeseats'=>'required',
            //     'address'=>'required',
            //     'personnumber'=>'required',
            //     'posttype'=>'required',
            //     'location'=>'required',
    
            // ]);

            $BikeDetail = new BikeDetail([
                "user_id"=>$request->get('user_id'),
                "bikename" => $request->get('bikename'),
                'bikeprice'=> $request->get('bikeprice'),
                'bikemodel'=> $request->get('bikemodel'),
                'address'=> $request->get('address'),
                'personnumber'=> $request->get('personnumber'),
                'biketype'=> $request->get('biketype'),
                'location'=> $request->get('location'),
                'bikestatus'=> 0,
                "bikepic" => $name,

            ]);

            $BikeDetail->save();
            $user = User::find(1);
            return redirect(url('../home'));
        }


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\BikeDetail  $BikeDetail
     * @return \Illuminate\Http\Response
     */

     //PARA DISPLAY
    public function show($id)
    {

    $BikeDetail = BikeDetail::find($id);
    $user = User::find(Auth::user()->id);
    $owner = BikeDetail::select('bike_details.*','users.*')
    ->leftjoin('users','bike_details.user_id','=','users.id')
    ->where('bike_details.id', '=', $id)
    ->get();
    $rental = Rental::where('bike_id',$id)->get();
  
    return view('user/bikedetail',compact('BikeDetail','user','owner','rental'));
    }
    

   
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\BikeDetail  $BikeDetail
     * @return \Illuminate\Http\Response
     */
    public function edit($user_id)
    {
        
        $BikeDetail = BikeDetail::select('*')
        ->where('id', '=', $user_id)
        ->get();
        return view('user/editbike',compact('BikeDetail'));
   // return view('editbike',compact('BikeDetail'));

   
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\BikeDetail  $BikeDetail
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {

            $data = BikeDetail::where('id', $request->bike_id)
                ->update([
                    'bikename' => $request->bikename,
                    'bikeprice' => $request->bikeprice,
                    'bikemodel' => $request->bikemodel,
                    'address' => $request->address,
                    'biketype' => $request->biketype,
                    'personnumber' => $request->personnumber,
                    'location' => $request->location,
            ]);
            
        
            return redirect('../home');
            
   

            // return redirect()->route('products.index')
            //     ->with('success', 'Product updated successfully');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BikeDetail  $BikeDetail
     * @return \Illuminate\Http\Response
     */
    public function destroy(BikeDetail $bike_details)
    {   
        $user = User::find(1);
        $bike_details->delete();
        return redirect(url('../home'));
    }

        /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function userpost($bike_id)
    {
        
    $user = User::find(1);
    $BikeDetail = BikeDetail::select('*')
    ->where('user_id', '=', $bike_id)
    ->get();
    return view('user/myposts',compact('BikeDetail','user'));

     
    }

    public function allbikes()
    {
        $BikeDetail=BikeDetail::all();
        return view('admin/biketype',compact ('BikeDetail'));
     
    }
  
}
