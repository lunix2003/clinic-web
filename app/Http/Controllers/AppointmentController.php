<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Doctor;
use App\Models\Patient;
use App\Models\ClinicInfo;
use App\Models\Appointment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class AppointmentController extends Controller
{
    public function index(){
        $data['appointment']=Appointment::show();
        $data['info']=ClinicInfo::get();
        return view('admin.appointments.list',$data);
    }
    public function show(Appointment $appointment){
        $data['info']=ClinicInfo::get();
        $data['appointment']=Appointment::findOrFail($appointment->id);
        return view('admin.appointments.show',$data);
    }
    public function edit(Appointment $appointment){
        $data['info']=ClinicInfo::get();
        $data['appointment']=Appointment::findOrFail($appointment->id);
        $data["patients"] = Patient::get();
        $data["doctors"] = Doctor::get();
        return view('admin.appointments.edit',$data); 
    }
    public function create(){
        $data["patients"] = Patient::get();
        $data["doctors"] = Doctor::get();
        $data['info']=ClinicInfo::get();
        return view('admin.appointments.create',$data);
    }
    public function store(Request $request){
        // $appointment = new Appointment();
        // $appointment->patient_id = $request->get('patient_id');
        // $appointment->doctor_id = $request->get('doctor_id');
        // $appointment->appointment_date = $request->get('appointment_date');
        // $appointment->appointment_time = $request->get('appointment_time');
        // $appointment->problem = $request->get('problem');
        // $appointment->save();
        // echo $appointment->id;
        $request->validate([
            'patient_id'=>'required',
            'doctor_id'=>'required',
            'appointment_date'=>'required',
            'problem'=>'required',
        ]);
        try{
            
            $allData=[
                'patient_id'=>$request->patient_id,
                'doctor_id'=>$request->doctor_id,
                'appointment_date'=>$request->appointment_date,
                'appointment_time'=>$request->appointment_time,
                'problem'=>$request->problem,
            ];
            Appointment::create($allData);
            
            return redirect()->route('appointment.index')->with('success','appointment has added successfully');
        }
        catch(Exception $ep){
            Log::error($ep->getMessage());
            return response()->json([
                'message'=>$ep->getMessage()
            ],500);
        }

    }
    public function saveAppointment(Request $request){
        

    }
    public function update(Request $request,Appointment $appointment){
        $request->validate([
            'patient_id'=>'required',
            'doctor_id'=>'required',
            'appointment_date'=>'required',
            'problem'=>'required',
        ]);

        try{
            $appointment =Appointment::findOrFail($appointment->id);
            $appointment->patient_id=$request->input('patient_id');
            $appointment->doctor_id=$request->input('doctor_id'); 
            $appointment->appointment_date=$request->input('appointment_date');
            $appointment->appointment_time=$request->input('appointment_time');
            $appointment->problem=$request->input('problem');
            $appointment->status=$request->status=='on'?true:false;
            $appointment->save();

            return redirect()->route('appointment.index')->with('success','appointment has updated successfully');

        }
        catch(Exception $ep){
            Log::error($ep->getMessage());
            return response()->json([
                'message'=>$ep->getMessage()
            ],500);
        }
    }
    public function destroy(Appointment $appointment){
        try {
            $appointment->delete();

            return redirect()->route('appointment.index')->with('success','appointment delete successfully');
            
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return response()->json([
                'message'=>'Something goes wrong while deleting a appointment!!'
            ]);
        }
    }
}
