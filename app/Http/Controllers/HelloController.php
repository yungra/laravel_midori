<?php

namespace App\Http\Controllers;

use App\MyClasses\MyServiceInterface;
use Illuminate\Support\Facades\Storage;
use App\Facades\MyService;
use App\Http\Pagination\MyPaginator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Person;

class HelloController extends Controller
{

    function __construct()
    {
    }

    public function index(Request $request)
    {
        $msg = 'show people record.';
        $keys = Person::get()->modelKeys();
        $even = array_filter($keys, function($keys)
        {
            return $keys % 2 == 0;
        });
        $result = Person::get()->only($even);

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

    //テスト

}
