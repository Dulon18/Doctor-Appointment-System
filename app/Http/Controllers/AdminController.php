<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Doctor;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function user()
    {
       
        if(Auth::id())
        {
            return redirect('home');
        }
        else{

            $doctors=Doctor::all();
            //dd($doctor);
            return view('user.home',compact('doctors'));

        }
       
    }

    public function admin()
    {
        return view('admin.home');
    }

 

}
