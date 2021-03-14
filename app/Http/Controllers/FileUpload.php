<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;

class FileUpload extends Controller
{
    public function fileUpload(Request $request){

        if($request->file()) {
            $fileName = $request->file->getClientOriginalName();
            $filePath = $request->file('file')->storeAs('uploads', $fileName);

            return back()
            ->with('success','File has been uploaded.')
            ->with('file', $fileName);
        }
   }

   public function status(){
        $directory="uploads/";
        $files = Storage::allFiles($directory);
        $sizes=[];
        foreach ($files as $requests) {
            $size = Storage::size($requests);
            array_push($sizes, round ($size/1024,2));
          }
        //   dd($size);
        return view('dashboard',compact(['files','sizes'])); 
   }
   public function rename(Request $request){
       $extension = (explode(".",$request->old));
       Storage::move($request->old, 'uploads/'.$request->name.'.'.end($extension));
       return back()
            ->with('success','File has been renamed.');
   }
   public function deleteFile(Request $request){
        Storage::delete($request->name); 
        return back()
            ->with('success','File has been deleted.');
   }
   
}
