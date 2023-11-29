<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use Illuminate\Http\Request;

class PatientController extends Controller
{
    public function  index(){
        $data["patients"] = Patient::get();
        return view("admin.patients.list",$data);
    }
    public function create(){
        return view("admin.patients.create");
    }
}
