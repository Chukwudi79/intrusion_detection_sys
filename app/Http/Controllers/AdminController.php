<?php

namespace App\Http\Controllers;

use App\Photo;
use App\Models\Awareness;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator,Redirect,Response,File, Auth;

class AdminController extends Controller
{
    
    public function index()
    {
        $data['awareness'] = Awareness::all();
        return view('admin.awareness', compact('data'));
    }
 
    public function create()
    {
        return view('admin.add-awareness');
    }

    public function store(Request $request)
    {
       request()->validate([
            'media' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'caption' => 'required|string|max:255',
            'body' => 'required|string|max:6000',
       ]);
       
       if ($files = $request->file('media')) {
            // Define upload path
           $destinationPath = public_path('/medias/'); // upload path
            //  Upload Orginal Image           
           $fileExt = $files->getClientOriginalExtension();
           $fileOriginalName = $files->getClientOriginalName();
           $profileImage = date('YmdHis') . "." . $fileExt;
           $files->move($destinationPath, $profileImage);
 
            // Save In Database
            $awareness= new Awareness;
            $awareness->caption = $request->caption;
            $awareness->body = $request->body;
            $awareness->media_url = $profileImage;
            $awareness->media_name = $fileOriginalName;
            $awareness->media_ext = $fileExt;
            $awareness->created_by = Auth::user()->email;
            $awareness->save();

            return back()->with('success', 'Awareness Upload successfully');
        }
        
        return back()->with('errors', 'Awareness Upload failed');
            
    }

    public function edit($id)
    {
        $awareness = Awareness::find($id);
        return view('admin.edit-awareness', compact('awareness'));
    }

    public function update(Request $request, $id)
    {
        request()->validate([
            'media' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'caption' => 'required|string|max:255',
            'body' => 'required|string|max:6000',
       ]);
       
       if ($files = $request->file('media')) {
            // Define upload path
           $destinationPath = public_path('/medias/'); // upload path
            //  Upload Orginal Image           
           $fileExt = $files->getClientOriginalExtension();
           $fileOriginalName = $files->getClientOriginalName();
           $profileImage = date('YmdHis') . "." . $fileExt;
           $files->move($destinationPath, $profileImage);
 
            // Save In Database
            $awareness= Awareness::find($id);
            $filePath = 'medias/' . $awareness->media_url;
            $awareness->caption = $request->caption;
            $awareness->body = $request->body;
            $awareness->media_url = $profileImage;
            $awareness->media_name = $fileOriginalName;
            $awareness->media_ext = $fileExt;
            $awareness->created_by = Auth::user()->email;

            if($this->deleteFile($filePath)){
                $awareness->save();

                return back()->with('success', 'Awareness Updated successfully');
            }
        }
        return back()->with('errors', 'Awareness Update failed');
        
    }

    public function destroy($id)
    {
        Awareness::find($id)->delete();
        return back()->route('awareness')->with('success', 'Awareness Delete successfully');
    }

    private function deleteFile($filePath)
    {
        if(File::exists(public_path($filePath))){
            if(File::delete(public_path($filePath))){
                return true;
            }
        }else{
            return false;
        }
    }
                
}
