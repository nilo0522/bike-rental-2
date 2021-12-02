<?php

namespace App\Http\Controllers;
use App\Http\Requests\ProfileRequest;
use App\Http\Requests\PasswordRequest;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Http\Request;
use Auth;
use App\Models\BikeDetail;
use App\Models\RentalReturn;
use App\Models\Rental;
use App\Models\Payment;
use App\Notifications\Notify;
use Illuminate\Support\Facades\Notification;



class ProfileController extends Controller
{
    /**
     * Show the form for editing the profile.
     *
     * @return \Illuminate\View\View
     */
    public function edit()
    {
        $user = User::find(1);
        return view('pages.edit',compact('user'));
    }

    /**
     * Update the profile
     *
     * @param  \App\Http\Requests\ProfileRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request)
    {
        $data = User::select('*')
        ->where('id', '=', Auth::user()->id )
        ->update();
        
        return redirect()->route('pages/index')->with('success', 'Your Profile is Updated Successfully');
     }

    /**
     * Change the password
     *
     * @param  \App\Http\Requests\PasswordRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function password(PasswordRequest $request)
    {
        auth()->user()->update(['password' => Hash::make($request->get('password'))]);

        return back()->withStatusPassword(__('Password successfully updated.'));
    }

    public function store(Request $request)
    {   
      
        $user = User::find($request->id)->update($request->all());
        $user = User::find($request->id);
        $user->save();
            if($contents=$request->file('prof_img2')){
                $name=$contents->getClientOriginalName();
                $contents->move('uploads',$name);
                return response()->json(['user' =>$user,'message'=> 'Update successfully' ]);
                return redirect(url('../account'));
            }
    
    
        }

        public function Rentalreturn(Request $request)
        {
               //kani tanan User makareceive
              
               $user1= User::where('id',$request->user_id)-> first();
               $user2= User::where('id',$request->owner_id) -> first();
              
////////////////////////////////////////////
                $return = new RentalReturn;
                $return->user_id =$request->user_id;
                $return->payment_id = $request->payment_id;
                $return->returned_status =0;
                $return->issues = $request->issues;
                $return->meetup = $request->meetup;
                $return->save();
                $return->id;
                Payment::where('payment_id', $request->payment_id)
                ->update(['rstatus' => 1]);
            //WORKING nag notifaction
                Notification::send($user2, new Notify($return,$user1));
                return response()->json(['message' => 'Return successfully.','data'=>$return],200);
        }




        public function Confirmreturn(Request $request)
        {
               //kani tanan User makareceive
                $user = User::all();
////////////////////////////////////////////
                $confirm =  Rentalreturn::where('returned_id', $request->returned_id)
                ->update(['returned_status' => 1]);


                ////Error
                $avail=BikeDetail::where('id', $request->bike_id)
                ->update(['bikestatus' => 0]);
                $combined= $confirm + $avail;

               
                return response()->json(['message' => 'Confirm successfully Thank You.','data'=>$combined],200);
        }
  
    }