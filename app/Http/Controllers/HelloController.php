<?php

namespace App\Http\Controllers;

use App\MyClasses\MyServiceInterface;
use Illuminate\Support\Facades\Storage;
use App\Facades\MyService;
use Illuminate\Http\Request;

class HelloController extends Controller
{

    function __construct()
    {
    }
    
    public function index(Request $request)
    {
        $data = [
            'msg' => $request->msg,
            'data' => $request->alldata,
        ];
        return view('hello.index', $data);
    }

    // public function index()
    // {
    //     $dir = '/';
    //     $all = Storage::disk('download')->allfiles($dir);
    //     dd(Storage::disk('download'));
    // }
    
}
