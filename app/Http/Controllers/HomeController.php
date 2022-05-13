<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function home()
    {
        if(Auth::id())
        {
            if(Auth::user()->usertype=='0')
            {
                return view('user.home');
            }
            else
            {
                return view('admin.home');
            }

        }
        else{
            return redirect()->back();
        }
    }
}
