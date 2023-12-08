<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Servic;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class ServicController extends Controller
{
    public function index(){
        $data["services"]=Servic::get();
        return view('admin.services.list',$data);
    }

    public function create(){
        return view('admin.services.create');

    }
    public function store(Request $request){
        $request->validate([
            'title'=>'required',
            'detail'=>'required',
            'photo'=>'required|image'
        ]);
        try{
            $imageName = Str::random().'.'.$request->photo->getClientOriginalExtension();
            Storage::disk('public')->putFileAs("service", $request->photo,$imageName);
            $AllData=[
                'title'=>$request->title,
                'detail'=>$request->detail,
                'photo'=>$imageName
            ];
            Servic::create($AllData);
            return redirect()->route('service.index')->with('success','Service has added successfully');
        }
        catch (Exception $ep){
            Log::error($ep->getMessage());
            return response()->json([
                'message'=>$ep->getMessage()
            ],500);
        }
    }
    public function show(Servic $service){
        $data["service"]=Servic::findOrFail($service->id);
        return view('admin.services.show',$data);
    }
    public function edit(Servic $service){
        $data["service"]=Servic::findOrFail($service->id);
        return view('admin.services.edit',$data);
    }
    public function update(Request $request,Servic $service){
        $request->validate([
            'title'=>'required',
            'detail'=>'required',
            'photo'=>'required|image'
        ]);
        try{
            if($request->hasFile('photo')){
                if($service->photo){
                    $exists = Storage::disk('public')->exists("service/{$service->image}");
                    if($exists){
                        Storage::disk('public')->delete("service/{$service->image}");
                    }
                }
    
                $imageName = Str::random().'.'.$request->photo->getClientOriginalExtension();
                Storage::disk('public')->putFileAs('service', $request->photo,$imageName);
                $service =Servic::findOrFail($service->id);
                $service->title=$request->input('title');
                $service->slug=Str::slug($request->title); 
                $service->detail=$request->input('detail');
                $service->photo=$imageName;
                $service->save();
    
            }else{
                $service =Servic::findOrFail($service->id);
                $service->title=$request->input('title');
                $service->slug=Str::slug($request->title); 
                $service->detail=$request->input('detail');
                $service->photo=$request->oldf_image;
                $service->save();
            }
            return redirect()->route('service.index')->with('success','Service has updated successfully');

        }
        catch(Exception $ep){
            Log::error($ep->getMessage());
            return response()->json([
                'message'=>$ep->getMessage()
            ],500);
        }
    }
    public function destroy(Servic $service){
        try {
            if($service->image){
                $exists = Storage::disk('public')->exists("service/{$service->image}");
                if($exists){
                    Storage::disk('public')->delete("service/{$service->image}");
                }
            }

            $service->delete();

            // return response()->json([
            //     'message'=>'service Deleted Successfully!!'
            // ]);

            return redirect()->route('service.index')->with('success','service delete successfully');
            
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return response()->json([
                'message'=>'Something goes wrong while deleting a service!!'
            ]);
        }

    }
}
