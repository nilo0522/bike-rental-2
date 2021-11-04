<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use App\Models\BikeDetail;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function frontpage()
    {
      
            $BikeDetail = BikeDetail::select('*')
            ->where('id', '=', $id)
            ->get();
            return view('frontpage',compact('BikeDetail'));
        
    }
}
