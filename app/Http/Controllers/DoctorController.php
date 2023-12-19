<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Doctor;
use App\Models\ClinicInfo;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class DoctorController extends Controller
{
    public function index(){
        $data['doctor']=Doctor::get();
        $data['info']=ClinicInfo::get();
        return view('admin.doctors.list',$data);
    }
    public function show(Doctor $doctor){
        $data['info']=ClinicInfo::get();
        $data['doctor']=Doctor::findOrFail($doctor->id);
        return view('admin.doctors.show',$data);
    }
    public function edit(Doctor $doctor){
        $data['info']=ClinicInfo::get();
        $data['doctor']=Doctor::findOrFail($doctor->id);
        return view('admin.doctors.edit',$data); 
    }
    public function create(){
        $data['info']=ClinicInfo::get();
        return view('admin.doctors.create',$data);
    }
    public function store(Request $request){
        $request->validate([
            'name'=>'required',
            'image'=>'required|image',
            'department_name'=>'required'
        ]);
        try{
            $imageName = Str::random().'.'.$request->image->getClientOriginalExtension();
            Storage::disk('public')->putFileAs("doctor", $request->image,$imageName);
            $allData=[
                'name'=>$request->name,
                'image'=>$imageName,
                'department_name'=>$request->department_name,
                'fb_link'=>$request->fb_link,
                'twitter_link'=>$request->twitter_link,
                'instagram_link'=>$request->instagram_link,
                'status'=>$request->status=='on'?true:false,
            ];
            Doctor::create($allData);
            return redirect()->route('doctor.index')->with('success','Doctor has added successfully');
        }
        catch(Exception $ep){
            Log::error($ep->getMessage());
            return response()->json([
                'message'=>$ep->getMessage()
            ],500);
        }
        if($request->image){
            
        }

    }
    public function update(Request $request,Doctor $doctor){
        $request->validate([
            'name'=>'required',
            'image'=>'required|image',
            'department_name'=>'required'
        ]);

        try{
            if($request->hasFile('image')){
                if($doctor->photo){
                    $exists = Storage::disk('public')->exists("doctor/{$doctor->image}");
                    if($exists){
                        Storage::disk('public')->delete("doctor/{$doctor->image}");
                    }
                }
    
                $imageName = Str::random().'.'.$request->image->getClientOriginalExtension();
                Storage::disk('public')->putFileAs('doctor', $request->image,$imageName);
                $doctor =Doctor::findOrFail($doctor->id);
                $doctor->name=$request->input('name');
                $doctor->image=$imageName;
                $doctor->department_name=$request->input('department_name'); 
                $doctor->fb_link=$request->input('fb_link');
                $doctor->twitter_link=$request->input('twitter_link');
                $doctor->instagram_link=$request->input('instagram_link');
                $doctor->status=$request->status=='on'?true:false;
                $doctor->save();
    
            }else{
                $doctor =Doctor::findOrFail($doctor->id);
                $doctor->name=$request->input('name');
                $doctor->image=$request->old_image;
                $doctor->department_name=$request->input('department_name'); 
                $doctor->fb_link=$request->input('fb_link');
                $doctor->twitter_link=$request->input('twitter_link');
                $doctor->instagram_link=$request->input('instagram_link');
                $doctor->status=$request->status=='on'?true:false;
                $doctor->save();
            }
            return redirect()->route('doctor.index')->with('success','doctor has updated successfully');

        }
        catch(Exception $ep){
            Log::error($ep->getMessage());
            return response()->json([
                'message'=>$ep->getMessage()
            ],500);
        }
    }
    public function destroy(Doctor $doctor){
        try {
            if($doctor->image){
                $exists = Storage::disk('public')->exists("doctor/{$doctor->image}");
                if($exists){
                    Storage::disk('public')->delete("doctor/{$doctor->image}");
                }
            }

            $doctor->delete();

            // return response()->json([
            //     'message'=>'doctor Deleted Successfully!!'
            // ]);

            return redirect()->route('doctor.index')->with('success','doctor delete successfully');
            
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return response()->json([
                'message'=>'Something goes wrong while deleting a doctor!!'
            ]);
        }
    }
}
