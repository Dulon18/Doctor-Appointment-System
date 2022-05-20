<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DoctorController extends Controller
{
    public function doctorList()
    {
        return view('admin.pages.doctor.doctor_list');
    }
    public function doctorAdd()
    {
        return view('admin.pages.doctor.doctor_add_form');
    }
}
