<?php

namespace App\Http\Controllers;

use App\MyClasses\MyServiceInterface;
use Illuminate\Support\Facades\Storage;
use App\Facades\MyService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HelloController extends Controller
{

    function __construct()
    {
    }
    
    public function index($id = -1)
    {
        if ($id >= 0)
        {
            $msg = 'get name like "' . $id . '"';
            $result = [DB::table('people')->find($id)];
        }
        else
        {
            $msg = 'get people records.';
            $result = DB::table('people')->get();
        }
        $data = [
            'msg' => $msg,
            'data' => $result,
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
