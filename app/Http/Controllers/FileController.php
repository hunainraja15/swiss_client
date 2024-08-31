<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\File;
use App\Models\Folder;
use Auth;


class FileController extends Controller
{
    //

    public function store(Request $request){
        $id = Auth::user()->id;
        $folders = Folder::with('files')->where('user_id', $id)->get();
    
        // Initialize total size in KB
        $totalSizeKB = 0;
        
        // Loop through each folder
        foreach ($folders as $folder) {
            // Loop through each file in the folder
            foreach ($folder->files as $file) {
                // Add the size of each file to the total size in KB
                $totalSizeKB += $file->size; // Assuming 'size' is in KB
            }
        }
    
        // Define the size in GB
        $sizeGB = 100;
    
        // Convert GB to KB
        $sizeKB = $sizeGB * 1024 * 1024;
        $remainingSizeKB = $sizeKB - $totalSizeKB;
    
        // Validate the request
        $request->validate([
            'file' => [
                'required',
                'file',
                'mimes:txt,pdf,doc,docx,csv,html,css,js,xls,xlsx,zip',  // Add all required file types
                'max:' . $remainingSizeKB,  // Maximum file size in KB
            ],
        ]);
    
    
        
    // Handle the uploaded file
    $uploadedFile = $request->file('file');
    $fileOriginalName = $request->name ?? $uploadedFile->getClientOriginalName();
    $fileName = uniqid() . '_'. time();
    $fileExtension = $uploadedFile->getClientOriginalExtension();
    $fileSize = $uploadedFile->getSize(); // File size in bytes

    // Store the file in the public directory
    $path = $uploadedFile->storeAs('public/files', $fileName); // Store in 'public/files' directory

    // Generate the URL for the stored file
    $fileUrl = url('storage/app/public/files/').'/'. $fileName;

    // Create a new record in the files table

    $file = new File();
    $file->name = $fileOriginalName;
    $file->extension = $fileExtension;
    $file->size =  $fileSize ;
    $file->path = $fileUrl;
    $file->follow_up = $request->follow_up;
    $file->folder_id = $request->folder_id;
    $file->save();
    return back();
    }

    public function delete($fileId) {
        // Find the file record in the database
        $file = File::findOrFail($fileId);
    
        $file->delete();
    
        return back()->with('success', 'File deleted successfully.');
    }
}
