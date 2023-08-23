<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Document;
use Exception;

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
    public function upload (Request $request)
    {
        try {


            if($request->hasFile('files')) {

                $arquivos = $request->file('files');

                foreach ($arquivos as $a ) {

                     $path = $a->getRealPath();
                     $doc = file_get_contents($path);

                    // dd($doc);
                    Document::create([
                        'data' => '2023-08-22',
                        'usercadastrou' => 'Adão',
                        'obs' => 'Teste',
                        'ispdf' => 1,
                        'codpessoa' => 777,
                        'image' => $doc,
                    ]);
                }
            return true;
            }
            
        } catch (\Throwable $e) {
            throw new Exception('Erro ao processar upload dos arquivos: ' . $e->getMessage());
        }

    }

    public function download($id)
    {
        $document = Document::find($id);

        $file_contents = base64_encode($document->file);

        return response($file_contents);

                         
    }
}


