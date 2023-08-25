<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Document;
use Exception;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendMail;

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

                    Document::create([
                        'data' => date('Y-m-d H:i:s'),
                        'usercadastrou' => 'Adão',
                        'obs' =>  $a->getClientOriginalName(),
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

    public function mail (Request $request)
    {
        try {

            //recebe os dados do front e atribui a variaveis locais
            $fromAddress = $request->reply;
            $subject = $request->subject;
            $to = $request->to;
            $message = $request->input('message');
            
            //cria uma lista para receber os anexos do front
            $files = $request->file('files');
            //$files = $request->files;
            $list_arquivos = [];

            foreach ($files as $file) {
                $path = $file->getRealPath();
                $doc = file_get_contents($path);
                $name = $file->getClientOriginalName();

                $list_arquivos[] = [
                    'doc'       => $doc,
                    'name'      => $name,
                    'mime'      => 'application/pdf'
                ];

            }
            
        Mail::to($to)
            ->send(new SendMail([
                    'from'      => [
                        'address'   => $fromAddress,
                        'name'      => 'Adao'
                    ],
                    'borba'     => nl2br($message),
                    'subject'   => $subject,
                    'files'    => $list_arquivos,
                    ])
                );
                
            return [
                'success' => true
            ];
        } catch (Exception $e) {
            return  $e->getMessage();
        }
    }
}


