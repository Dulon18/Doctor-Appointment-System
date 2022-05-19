<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DoctorController extends Controller
{
    public function doctorList()
    {
        return view('admin.pages.doctor.doctor_list');
    }
}
