<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Document;

class DocumentController extends Controller
{
    //
    public function index()
    {
        $documents = Document::all();
        // var_dump($documents);
        
        return response($documents);
    }

    public function destroy($id)
    {
        $doc = Document::find($id);
        $doc->delete();

        return redirect()->route('document');
    }

    public function update(Request $request)
    {
        // return $request->all();
        $request->validate([
            'file' => 'mimes:jpeg,bmp,png,pdf,jpg',
            'name' => 'required|max:255',
        ]);

        if ($request->hasFile('file')) {           
            $path = $request->file('file')->getRealPath();
            $ext = $request->file->extension();
            $doc = file_get_contents($path);
            $mime = $request->file('file')->getClientMimeType();

            Document::create([
                'name'=> $request->name .'.'.$ext,
                'file' => $doc,
                'mime'=> $mime,
            ]);
            return true;
        }
    }
    public function download($id)
    {
        $document = Document::find($id);

        $file_contents = base64_encode($document->file);

        return response($file_contents);

                         
    }
}


