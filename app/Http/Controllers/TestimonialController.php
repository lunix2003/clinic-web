<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\ClinicInfo;
use App\Models\Testimonial;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class TestimonialController extends Controller
{
    public function index(){
        $data['testimonial']=Testimonial::get();
        $data['info']=ClinicInfo::get();
        return view('admin.testimonials.list',$data);
    }
    public function show(Testimonial $testimonial){
        $data['info']=ClinicInfo::get();
        $data['testimonial']=Testimonial::findOrFail($testimonial->id);
        return view('admin.testimonials.show',$data);
    }
    public function edit(Testimonial $testimonial){
        $data['info']=ClinicInfo::get();
        $data['testimonial']=Testimonial::findOrFail($testimonial->id);
        return view('admin.testimonials.edit',$data); 
    }
    public function create(){
        $data['info']=ClinicInfo::get();
        return view('admin.testimonials.create',$data);
    }
    public function store(Request $request){
        $request->validate([
            'name'=>'required',
            'detail'=>'required',
            'profession'=>'required',
            'photo'=>'required|image',
        ]);
        try{
            $imageName = Str::random().'.'.$request->photo->getClientOriginalExtension();
            Storage::disk('public')->putFileAs("testimonial", $request->photo,$imageName);
            $allData=[
                'name'=>$request->name,
                'detail'=>$request->detail,
                'profession'=>$request->profession,
                'photo'=>$imageName,
                'status'=>$request->status=='on'?true:false
            ];
            Testimonial::create($allData);
            return redirect()->route('testimonial.index')->with('success','Testimonial has added successfully');
        }
        catch(Exception $ep){
            Log::error($ep->getMessage());
            return response()->json([
                'message'=>$ep->getMessage()
            ],500);
        }

    }
    public function update(Request $request,Testimonial $testimonial){
        $request->validate([
            'name'=>'required',
            'detail'=>'required',
            'profession'=>'required',
            'photo'=>'required|image',
        ]);

        try{
            if($request->hasFile('photo')){
                if($testimonial->photo){
                    $exists = Storage::disk('public')->exists("testimonial/{$testimonial->photo}");
                    if($exists){
                        Storage::disk('public')->delete("testimonial/{$testimonial->photo}");
                    }
                }
    
                $imageName = Str::random().'.'.$request->photo->getClientOriginalExtension();
                Storage::disk('public')->putFileAs('testimonial', $request->photo,$imageName);
                $testimonial =Testimonial::findOrFail($testimonial->id);
                $testimonial->name=$request->input('name');
                $testimonial->detail=$request->input('detail');
                $testimonial->profession=$request->input('profession');
                $testimonial->photo=$imageName;
                $testimonial->status=='on'?true:false;
                $testimonial->save();
    
            }else{
                $testimonial =Testimonial::findOrFail($testimonial->id);
                $testimonial->name=$request->input('name');
                $testimonial->detail=$request->input('detail');
                $testimonial->profession=$request->input('profession');
                $testimonial->photo=$request->old_image;
                $testimonial->status=='on'?true:false;
                $testimonial->save();
            }
            return redirect()->route('testimonial.index')->with('success','testimonial has updated successfully');

        }
        catch(Exception $ep){
            Log::error($ep->getMessage());
            return response()->json([
                'message'=>$ep->getMessage()
            ],500);
        }
    }
    public function destroy(Testimonial $testimonial){
        try {
            if($testimonial->photo){
                $exists = Storage::disk('public')->exists("testimonial/{$testimonial->photo}");
                if($exists){
                    Storage::disk('public')->delete("testimonial/{$testimonial->photo}");
                }
            }
            $testimonial->delete();
            return redirect()->route('testimonial.index')->with('success','testimonial delete successfully');
            
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return response()->json([
                'message'=>'Something goes wrong while deleting a testimonial!!'
            ]);
        }
    }
}
