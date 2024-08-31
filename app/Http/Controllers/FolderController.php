<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Folder;
use App\Models\File;
use Auth;

class FolderController extends Controller
{
    //
    public function index(){
        $folders = Folder::orderBy('created_at', 'desc')->where('user_id', Auth::user()->id)->get();
        return view('folder.index', compact('folders'));
    }
    public function store(Request $request){

       $folder =new Folder();
       $folder->name = $request->name;
       $folder->user_id = Auth::user()->id;
       $folder->save();
       return back();
    }

    public function open($folderId) {
        // Retrieve the folder with the given ID and its related files
        $folder = Folder::with('files')->findOrFail($folderId);
    
        // Pass the folder and its files to the view
        return view('file.index', [
            'files' => $folder->files,
            'folderId' => $folderId
        ]);
    }
    public function delete($folder){
        $file = File::where('folder_id', $folder)->delete();
        $folder = Folder::find($folder)->delete();

        return back();
    }
    
}
