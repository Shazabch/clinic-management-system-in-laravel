<?php

namespace App\Http\Controllers;

use App\Models\attachment;
use App\Models\patient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class attachmentController extends Controller
{
    public function attachment($id){
        $patient=patient::find($id);
        return view('attachment.upload',compact('patient'));
    }
    
    public function upload(Request $request,$id){
        $request->validate([
            'file' => 'required'
        ]);
        $patient = patient::find($id);
        $files = [];
        $attachment = new attachment();
        if (!empty($request->file)) {
            foreach($request->file as $key=>$file)
            {
                $filename = time().'-'.$file->getClientOriginalName();  
                $file->move(public_path('documents'), $filename);
                $files[] = $filename; 
               
            } 
             
        }
        for($a=0;$a<count($files);$a++){
            $attachment = new attachment();
            $attachment->location = $files[$a];
            $patient->attachment()->save($attachment);
            
        }                  
        // // Store document in DATABASE from HERE 
        // attachment::create(['files' => $files]);
        return redirect()->route('home')
            ->with('added','The File Added Successfully')
            ->with('files',$filename);
    }

    public function download(Request $request,$id){
        
        $attachment = attachment::find($id);
        $fileName = $attachment->location;
        $filePath = public_path('documents/'.$fileName);
      $headers = ['Content-Type: application/pdf'];
     return response()->download($filePath, $fileName, $headers);

    }

    public function destroy(Request $request,$id){
        $attachment=attachment::find($id);
        $attachment->delete();
        return redirect()->route('home')->with('danger','Patient Record Removed Successfully');
    }
}
