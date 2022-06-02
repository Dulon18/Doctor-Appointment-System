<?php

namespace App\Http\Controllers;
use App\Models\Doctor;
use Illuminate\Http\Request;

class DoctorController extends Controller
{
    public function doctorList()
    {
        $doctors=Doctor::all();
        return view('admin.pages.doctor.doctor_list',compact('doctors'));
    }
    public function doctorAdd()
    {
        return view('admin.pages.doctor.doctor_add_form');
    }

    public function store(Request $request){

        $filename=null;
            if ($request->hasFile('image'))
            {
                
                $file=$request->file('image');
                $filename=date('Ymdhms').'.'.$file->getClientOriginalExtension();
                $file->storeAs('/storage',$filename);
            }

      Doctor::create([
          'name'=>$request->name,
          'specility'=>$request->specility,
          'room_number'=>$request->room,
          'image'=>$filename,

      ]);
       return redirect()->back();
    }
}
