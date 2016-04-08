<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use File;

class FileManagerController extends Controller
{
    public function index(Request $request)
    {
        $path = $request->has("path") ? $request->get("path") : "/";

        if(File::isFile($path)) {
            return redirect()->away("file:/".$path);
        }

        $files = [];
        $directoryApi = File::directories($path);
        $fileApi = File::files($path);
        foreach($directoryApi as $directory){
            $files[] = [
                "name" => basename($directory),
                "type" => "Directory",
                "size" => null,
                "path" => $directory
            ];
        }
        foreach($fileApi as $file) {
            $files[] = [
                "name" => basename($file),
                "type" => "File",
                "size" => null,
                "path" => $file,
            ];
        }

        return view("file-manager.index", [
            "files" => $files,
            "path"  => $path,
        ]);
    }
}
