<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\ClinicInfo;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class ClinicInfoController extends Controller
{
    public function index(){
        $data['info']=ClinicInfo::get();
        return view('admin.infors.list',$data);
    }
    // public function edit(ClinicInfo $infor){
    //     $data['info']=ClinicInfo::get();
    //     $data['info']=ClinicInfo::findOrFail($infor->id);
    //     return view('admin.infors.edit',$data); 
    //     return '<h2>Hello</h2>';
    // }

    public function create(){
        $data['info']=ClinicInfo::get();
        return view('admin.infors.create',$data);
    }
    public function store(Request $request){
        $request->validate([
            'name'=>'required',
            'address'=>'required',
            'email'=>'required',
            'phone'=>'required',
            'working'=>'required',
            'map'=>'required',
            'facebook'=>'required',
            'twitter'=>'required',
            'youtube'=>'required',
            'linkedin'=>'required',
            'instagram'=>'required',
            'photo'=>'required|image',
        ]);
        try{
            $imageName = Str::random().'.'.$request->photo->getClientOriginalExtension();
            Storage::disk('public')->putFileAs("infor", $request->photo,$imageName);
            $allData=[
                'name'=>$request->name,
                'address'=>$request->address,
                'email'=>$request->email,
                'phone'=>$request->phone,
                'working'=>$request->working,
                'map'=>$request->map,
                'facebook'=>$request->facebook,
                'twitter'=>$request->twitter,
                'youtube'=>$request->youtube,
                'linkedin'=>$request->linkedin,
                'instagram'=>$request->instagram,
                'photo'=>$imageName,
                'status'=>$request->status=='on'?true:false
            ];
            if(ClinicInfo::create($allData)){
                return redirect()->route('info.index')->with('success','ClinicInfo has added successfully');

            }
        }
        catch(Exception $ep){
            Log::error($ep->getMessage());
            return response()->json([
                'message'=>$ep->getMessage()
            ],500);
        }

    }
    public function update(Request $request,ClinicInfo $info){
        $request->validate([
            'name'=>'required',
            'address'=>'required',
            'email'=>'required',
            'phone'=>'required',
            'working'=>'required',
            'map'=>'required',
            'facebook'=>'required',
            'twitter'=>'required',
            'youtube'=>'required',
            'linkedin'=>'required',
            'instagram'=>'required',
            'photo'=>'required|image',
        ]);

        try{
            if($request->hasFile('photo')){
                if($info->photo){
                    $exists = Storage::disk('public')->exists("infor/{$info->photo}");
                    if($exists){
                        Storage::disk('public')->delete("infor/{$info->photo}");
                    }
                }
    
                $imageName = Str::random().'.'.$request->photo->getClientOriginalExtension();
                Storage::disk('public')->putFileAs('infor', $request->photo,$imageName);
                $infor =ClinicInfo::findOrFail($info->id);
                $infor->name=$request->input('name');
                $infor->address=$request->input('address');
                $infor->email=$request->input('email');
                $infor->phone=$request->input('phone');
                $infor->working=$request->input('working');
                $infor->map=$request->input('map');
                $infor->facebook=$request->input('facebook');
                $infor->twitter=$request->input('twitter');
                $infor->youtube=$request->input('youtube');
                $infor->linkedin=$request->input('linkedin');
                $infor->instagram=$request->input('instagram');
                $infor->photo=$imageName;
                $infor->status=='on'?true:false;
                $infor->save();
    
            }else{
                $infor =ClinicInfo::findOrFail($info->id);
                $infor->name=$request->input('name');
                $infor->address=$request->input('address');
                $infor->email=$request->input('email');
                $infor->phone=$request->input('phone');
                $infor->working=$request->input('working');
                $infor->map=$request->input('map');
                $infor->facebook=$request->input('facebook');
                $infor->twitter=$request->input('twitter');
                $infor->youtube=$request->input('youtube');
                $infor->linkedin=$request->input('linkedin');
                $infor->instagram=$request->input('instagram');
                $infor->photo=$request->old_image;
                $infor->status=='on'?true:false;
                $infor->save();
            }
            return redirect()->route('info.index')->with('success','infor has updated successfully');

        }
        catch(Exception $ep){
            Log::error($ep->getMessage());
            return response()->json([
                'message'=>$ep->getMessage()
            ],500);
        }
    }
    public function destroy(ClinicInfo $info){
        try {
            if($info->photo){
                $exists = Storage::disk('public')->exists("infor/{$info->photo}");
                if($exists){
                    Storage::disk('public')->delete("infor/{$info->photo}");
                }
            }

            if($info->delete()){
                return redirect()->route('info.index')->with('success','infor delete successfully');
            }
            
        } catch (Exception $e) {
            Log::error($e->getMessage());
            return response()->json([
                'message'=>'Something goes wrong while deleting a infor!!'
            ]);
        }
    }
}
