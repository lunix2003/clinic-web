<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Appointment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class AppointmentController extends Controller
{
    public function index(){
        $data['appointment']=Appointment::get();
        return view('admin.appointments.list',$data);
    }
    public function show(Appointment $appointment){
        $data['appointment']=Appointment::findOrFail($appointment->id);
        return view('admin.appointments.show',$data);
    }
    public function edit(Appointment $appointment){
        $data['appointment']=Appointment::findOrFail($appointment->id);
        return view('admin.appointments.edit',$data); 
    }
    public function create(){
        return view('admin.appointments.create');
    }
    public function store(Request $request){
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
    public function update(Request $request,Appointment $appointment){
        $request->validate([
            'patient_id'=>'required',
            'doctor_id'=>'required',
            'appointment_date'=>'required',
            'problem'=>'required',
        ]);

        try{
            $appointment =appointment::findOrFail($appointment->id);
            $appointment->patient_id=$request->input('patient_id');
            $appointment->doctor_id=$request->input('doctor_id'); 
            $appointment->appointment_date=$request->input('appointment_date');
            $appointment->problem=$request->input('problem');
            $appointment->status=$request->input('status');
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
