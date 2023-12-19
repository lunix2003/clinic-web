<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Contact;
use App\Models\ClinicInfo;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class ContactController extends Controller
{
    public function index(){
        $data['contact']=Contact::get();
        $data['info']=ClinicInfo::get();
        return view('admin.contacts.list',$data);
    }
    public function show(Contact $contact){
        $data['info']=ClinicInfo::get();
        $data['contact']=Contact::findOrFail($contact->id);
        return view('admin.contacts.show',$data);
    }
    public function edit(Contact $contact){
        $data['info']=ClinicInfo::get();
        $data['contact']=Contact::findOrFail($contact->id);
        return view('admin.contacts.edit',$data); 
    }
    public function create(){
        $data['info']=ClinicInfo::get();
        return view('admin.contacts.create',$data);
    }
    public function store(Request $request){
        $request->validate([
            'name'=>'required',
            'email'=>'required',
            'subject'=>'required',
            'message'=>'required',
        ]);
        try{
           
            $allData=[
                'name'=>$request->name,
                'email'=>$request->email,
                'subject'=>$request->subject,
                'message'=>$request->message,
                'status'=>$request->status=='on'?true:false
            ];
            if(Contact::create($allData)){
                return redirect()->route('contact.index')->with('success','contact has added successfully');

            }
        }
        catch(Exception $ep){
            Log::error($ep->getMessage());
            return response()->json([
                'message'=>$ep->getMessage()
            ],500);
        }

    }
    public function store_from_web(Request $request){
        $request->validate([
            'name'=>'required',
            'email'=>'required',
            'subject'=>'required',
            'message'=>'required',
        ]);
        try{
           
            $allData=[
                'name'=>$request->name,
                'email'=>$request->email,
                'subject'=>$request->subject,
                'message'=>$request->message,
                'status'=>$request->status=='on'?true:false
            ];
            if(Contact::create($allData)){
                return redirect()->route('front.contact')->with('success','contact has added successfully');
            }
        }
        catch(Exception $ep){
            Log::error($ep->getMessage());
            return response()->json([
                'message'=>$ep->getMessage()
            ],500);
        }

    }
    public function update(Request $request,Contact $contact){
        $request->validate([
            'name'=>'required',
            'email'=>'required',
            'subject'=>'required',
            'message'=>'required',
        ]);

        try{
            if($request->hasFile('image')){
                if($contact->photo){
                    $exists = Storage::disk('public')->exists("contact/{$contact->image}");
                    if($exists){
                        Storage::disk('public')->delete("contact/{$contact->image}");
                    }
                }
    
                $imageName = Str::random().'.'.$request->image->getClientOriginalExtension();
                Storage::disk('public')->putFileAs('contact', $request->image,$imageName);
                $contact =contact::findOrFail($contact->id);
                $contact->name=$request->input('name');
                $contact->email=$request->input('email'); 
                $contact->subject=$request->input('subject');
                $contact->message=$request->input('message');
                $contact->status=$request->status=='on'?true:false;
                $contact->save();
    
            }else{
                $contact =contact::findOrFail($contact->id);
                $contact->name=$request->input('name');
                $contact->email=$request->input('email'); 
                $contact->subject=$request->input('subject');
                $contact->message=$request->input('message');
                $contact->status=$request->status=='on'?true:false;
                $contact->save();
            }
            return redirect()->route('contact.index')->with('success','contact has updated successfully');

        }
        catch(Exception $ep){
            Log::error($ep->getMessage());
            return response()->json([
                'message'=>$ep->getMessage()
            ],500);
        }
    }
    public function destroy(Contact $contact){
        try {
            $contact->delete();

            return redirect()->route('contact.index')->with('success','contact delete successfully');
            
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return response()->json([
                'message'=>'Something goes wrong while deleting a contact!!'
            ]);
        }
    }
}
