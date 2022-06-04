<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Doctor;
use App\Models\Appointment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function home()
    {
        if(Auth::id())
        {   
            $doctors=Doctor::all();
            if(Auth::user()->usertype=='0')
            {
                return view('user.home',compact('doctors'));
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
    // all doctor
    public function doctors()
    {
        $doctors=Doctor::all();
        return view('user.allDoctor',compact('doctors'));
    }

    //appointment data store
    function appointmentStore(Request $request)
    {

      Appointment::create([

          'name'=>$request->name,
          'email'=>$request->email,
          'date'=>$request->date,
          'doctor_name'=>$request->doctor_name,
          'phone'=>$request->phone,
          'message'=>$request->message,
          'user_id'=>Auth::user()->id,
          //dd($request)
      ]);
     
      return redirect()->back()->with('success','Appointment successfully done..We contact with you soon..');
    }
}
