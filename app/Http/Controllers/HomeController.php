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

        if(Auth::id())
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
        else
        {
            return redirect()->back()->with('error',' Please Login First ..');
        }
    
    
    }

    function myAppointment()
    {
        if(Auth::id())
        {
            $user_id=Auth::user()->id;
            $appointments=Appointment::where('user_id',$user_id)->get();
            return view('user.myAppointment',compact('appointments'));
        }
        //dd($appointments);
        else
        return redirect()->back();
        
    }

    function cancleAppointment($id)
    {
        Appointment::find($id)->delete();
        return redirect()->back()->with('success','Services Deleted.');
    }

    //news

   public  function aboutUs()
    {
        $doctors=Doctor::all();
        return view('user.about',compact('doctors'));
    }
}
