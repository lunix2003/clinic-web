<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Models\Servic;
use App\Models\ClinicInfo;
use App\Models\Patient;
use App\Models\Testimonial;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    //
    public function index(){
        $data["doctor"]=Doctor::get();
        $data["service"]=Servic::get();
        $data["patient"]=Patient::get();
        $data["testimonial"]= Testimonial::get();
        $data['info']=ClinicInfo::get();
        return view("front_home",$data);
    }
    public function about(){
        $data["title"] = "About Us";
        $data["dest"] = "About";
        $data["doctor"]=Doctor::get();
        $data['info']=ClinicInfo::get();
        return view("front_about",$data);
    }
    public function service(){
        $data["title"] = "Services";
        $data["dest"] = "Service";
        $data["service"]=Servic::get();
        $data['info']=ClinicInfo::get();
        return view("front_service",$data);
    }
    public function doctor(){
        $data["title"] = "Doctors";
        $data["dest"] = "Doctor";
        $data["doctor"]=Doctor::get();
        $data['info']=ClinicInfo::get();
        return view("front_doctor",$data);
    }
    public function feature(){
        $data["title"] = "Feature";
        $data["dest"] = "Feature";
        $data['info']=ClinicInfo::get();
        return view("front_feature",$data);
    }
    public function appointment(){
        $data["title"] = "Appointment";
        $data["dest"] = "Appointment";
        $data["doctor"]=Doctor::get();
        $data['info']=ClinicInfo::get();
        return view("front_appointment",$data);
    }
    public function testimonial(){
        $data["title"] = "Testimonail";
        $data["dest"] = "Testimonail";
        $data['info']=ClinicInfo::get();
        $data["testimonial"]= Testimonial::get();
        return view("front_testimonial",$data);
    }
    public function error(){
        $data["title"] = "404 Error";
        $data["dest"] = "Error";
        $data['info']=ClinicInfo::get();
        return view("front_error",$data);
    }
    public function contact(){
        $data["title"] = "Contact Us";
        $data["dest"] = "Contact";
        $data['info']=ClinicInfo::get();
        return view("front_contact",$data);
    }
}
