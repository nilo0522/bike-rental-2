<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileRequest;
use App\Http\Requests\PasswordRequest;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Http\Request;
use Auth;
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
            $contents=$request->prof_img2;
            $name=$contents->getClientOriginalName();
            $contents->move('uploads',$name);
       $user = User::find($request->id)->update($request->all());
       $user = User::find($request->id);
            return response()->json(['user' =>$user,'message'=> 'Update successfully' ]);
    }
}
