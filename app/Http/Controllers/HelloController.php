<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Person;
use Illuminate\Support\Facades\Storage;
use League\CommonMark\Extension\CommonMark\Node\Inline\Strong;

class HelloController extends Controller
{
    private $fname;

    function __construct()
    {
        $this->fname = 'hello.txt';
    }

    public function index(Request $request, Response $response)
    {
        $msg = 'plese input text:';
        $keys = [];
        $values = [];
        if ($request->isMethod('post'))
        {
           $form = $request->only(['name', 'mail', 'tel']);
           $keys = array_keys($form);
           $values = array_values($form);
           $msg = old('name') . ',' . old('mail') . ',' . old('tel');
           $data = [
               'msg'=> $msg,
               'keys'=> $keys,
               'values'=> $values,
            ];
            $request->flash();
            return view('hello.index', $data);
        }
        $data = [
            'msg'=> $msg,
            'keys'=> $keys,
            'values'=> $values,
        ];
        $request->flash(); //送られてきたformの値をセッションに保管
        return view('hello.index', $data);
    }
    
    public function other(Request $request)
    {
        // dd($request->file);
        $ext = '.' . $request->file('file')->extension(); //拡張子を取得
        //putFileAs( ファイルパス, ファイル, ファイル名 )
        Storage::disk('public')->putFileAs('files', $request->file('file'), 'upload' . $ext);
        return redirect()->route('hello');
    }
    
}
