<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
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

 public function showAppointments()
 {
     $appoints=Appointment::all();
     return view('admin.pages.appoint.showAppointmentList',compact('appoints'));
 }

 public function approvedStatus($id)
 {
     $approve=Appointment::find($id);
    //dd($approve->status);
    $approve->status="Approved";
    $approve->save();
     return redirect()->back();
 }
 public function cancledStatus($id)
 {
     $cancle=Appointment::find($id);
    $cancle->status="Cencled";
    $cancle->save();
     return redirect()->back();
 }

}
