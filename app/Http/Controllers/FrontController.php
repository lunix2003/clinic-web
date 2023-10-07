<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FrontController extends Controller
{
    //
    public function index(){
        return view("front_home");
    }
    public function about(){
        $data["title"] = "About Us";
        $data["dest"] = "About";
        return view("front_about",$data);
    }
    public function service(){
        $data["title"] = "Services";
        $data["dest"] = "Service";
        return view("front_service",$data);
    }
    public function doctor(){
        $data["title"] = "Doctors";
        $data["dest"] = "Doctor";
        return view("front_doctor",$data);
    }
    public function feature(){
        $data["title"] = "Feature";
        $data["dest"] = "Feature";
        return view("front_feature",$data);
    }
    public function appointment(){
        $data["title"] = "Appointment";
        $data["dest"] = "Appointment";
        return view("front_appointment",$data);
    }
    public function testimonial(){
        $data["title"] = "Testimonail";
        $data["dest"] = "Testimonail";
        return view("front_testimonial",$data);
    }
    public function error(){
        $data["title"] = "404 Error";
        $data["dest"] = "Error";
        return view("front_error",$data);
    }
    public function contact(){
        $data["title"] = "Contact Us";
        $data["dest"] = "Contact";
        return view("front_contact",$data);
    }
}