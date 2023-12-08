<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Patient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;


class PatientController extends Controller
{
    public function  index(){
        $data["patients"] = Patient::get();
        return view("admin.patients.list",$data);
    }
    public function create(){
        return view("admin.patients.create");
    }
    public function show(Patient $patient)
    {
        // return response()->json([
        //     'patient'=>$patient
        // ]);
        $data["patient"]=Patient::findOrFail($patient->id);
        return view('admin.patients.show',$data);
    }

    public function store(Request $request){
        $request->validate([
            'name'=>'required',
            'email'=>'required',
            'phone'=>'required',
            'date_of_birth'=>'required'
        ]);
        try{
            $AllData = [
                'name'=>$request->name,
                'email'=>$request->email,
                'phone'=>$request->phone,
                'date_of_birth'=>$request->date_of_birth    
            ];
            Patient::create($AllData);
            return redirect()->route('patient.index')->with('success','Patient has created successfully');
        }
        catch(Exception $ep){
            Log::error($ep->getMessage());
            return response()->json([
                'message'=>$ep->getMessage()
            ],500);
        }
    }

    public function edit (Patient $patient){ 
        $data["patient"]=Patient::findOrFail($patient->id);
        return view('admin.patients.edit',$data);
    }

    // public function edit2($id){
    //     $patient=Patient::findOrFail($id);
    //     return view('admin.patient.edit',$patient);
    // }

    public function update(Request $request,Patient $patient){
        $request->validate([
            'name'=>'required',
            'email'=>'required',
            'phone'=>'required',
            'date_of_birth'=>'required'
        ]);
        
        try{
            
            $patient =Patient::find($patient->id);
            $patient->name=$request->input('name');
            $patient->email=$request->input('email');
            $patient->phone=$request->input('phone');
            $patient->date_of_birth=$request->input('date_of_birth');
            $patient->save();
            return redirect()->route('patient.index')->with('success','Patient has updated successfully');
        }
        catch (\Exception $ep){
            Log::error($ep->getMessage());
            return response()->json([
                'message'=>$ep->getMessage()
            ],500);
        }
    }
    public function destroy(Patient $patient){
        try{
            $patient->delete();
            return redirect()->route('patient.index')->with("success","Patient has deleted successfully");
        }
        catch(Exception $ep){
            Log::error($ep->getMessage());
            return response()->json([
                'message'=>$ep->getMessage()
            ],500);
        }
    }
}
