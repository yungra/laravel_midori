<?php

namespace App\Http\Controllers;

use App\MyClasses\MyServiceInterface;
use Illuminate\Support\Facades\Storage;
use App\Facades\MyService;

class HelloController extends Controller
{

    function __construct()
    {
    }
    
    public function index(int $id = -1)
    {
        MyService::setId($id);
        $data = [
            'msg' => MyService::say(),
            'data' => MyService::alldata()
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
