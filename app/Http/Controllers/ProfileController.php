<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileRequest;
use App\Http\Requests\PasswordRequest;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Http\Request;
use Auth;
use App\Models\RentalReturn;
class ProfileController extends Controller
{
    /**
     * Show the form for editing the profile.
     *
     * @return \Illuminate\View\View
     */
    public function edit()
    {
        return view('pages.edit');
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
                $return = new RentalReturn;
                $return->user_id = $request->user_id;
                $return->rental_id = $request->rental_id;
                $return->returned_status =0;
                $return->issues = $request->issues;
                $return->save();
                return response()->json(['message' => 'Return successful.','data'=>$return],200);
        }
  
    }