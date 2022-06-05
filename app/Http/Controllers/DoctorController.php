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

    public function storeDoctorInfo(Request $request){

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
          'phone'=>$request->phone,
          'room_number'=>$request->room,
          'image'=>$filename,

      ]);
       return redirect()->back()->with('success','Doctor Create Successfully..!!');
    }

    function changeStatus($id)
    {
        $status=Doctor::select('status')->where('id',$id)->first();
        if($status->status == 0)
        {
           $status=1;
        }
        else
        {
            $status=0;
        }
        Doctor::Where('id',$id)->update(['status'=>$status]);
        return redirect()->back()->with('success','Status Update Successfully..!');

    }

    // update doctor info

    function editDoctor($id)
    {
        $doctor=Doctor::find($id);
        return view('admin.pages.doctor.editForm',compact('doctor'));
    }

    function updateDoctor(Request $request, $id)
    {
        $doctor=Doctor::find($id);
        $doctor_image=$doctor->image;
        if ($request->hasFile('image'))
        {
            $doctor_image=date('Ymdhms').'.'.$request->file('image')->getClientOriginalExtension();
            $request->file('image')->storeAs('/storage',$doctor_image);
        }

        $doctor->update([
            'name'=>$request->name,
            'specility'=>$request->specility,
            'phone'=>$request->phone,
            'room_number'=>$request->room,
            'image'=>$doctor_image,
  
        ]);
         return redirect()->back()->with('success','Update Successfully..!!');
      }

      public function deleteDoctor($id)
      {
          $doctor=Doctor::find($id)->delete();
          return redirect()->back()->with('success',' Delete Successfully..!');
      }

      //view details
      function viewDoctor($id)
      {
          $doctor=Doctor::find($id);
          return view('admin.pages.doctor.viewDetails',compact('doctor'));
      }
}
