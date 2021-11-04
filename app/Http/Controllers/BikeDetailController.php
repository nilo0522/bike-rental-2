<?php

namespace App\Http\Controllers;

use App\Models\BikeDetail;
use App\Models\User;
use Illuminate\Http\Request;
use DB;
use Auth;

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
        return view('user.bike-listing',compact ('bike_detail'));
     
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user.uploadbike');
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
                "bikepic" => $name,

            ]);

            $BikeDetail->save();
        
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
    $BikeDetail = BikeDetail::select('*')
    ->where('id', '=', $id)
    ->get();
    return view('user/bikedetail',compact('BikeDetail'));
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
    public function update(Request $request, BikeDetail $bike_details)
    {

        $data=$request->validate([
                'bikename'=>'required',
                'bikeprice'=>'required',
                'bikemodel'=>'required',
                'address'=>'required',
                'personnumber'=>'required',
                'location'=>'required',
    
            ]);
            $bike_details->update($data);
            return redirect(url('../bike-listing'));
            
   

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
        

    $BikeDetail = BikeDetail::select('*')
    ->where('user_id', '=', $bike_id)
    ->get();
    return view('user/myposts',compact('BikeDetail'));

     
    }

    public function allbikes()
    {
        $BikeDetail=BikeDetail::all();
        return view('admin/biketype',compact ('BikeDetail'));
     
    }
  
}
