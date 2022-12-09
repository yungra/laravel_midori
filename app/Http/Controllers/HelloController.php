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
    
    public function index($id)
    {
        $data = ['msg' => '', 'data' => []];
        $msg = 'get: ';
        $result = [];
        $count = 0;
        DB::table('people')
            ->chunkById(2, function($items)
                use (&$msg, &$result, &$id, &$count)
            {
                if($count == $id)
                {
                foreach($items as $item)
                {
                    $msg .= $item->id . ':' . $item->name . ' ';
                    $result += array_merge($result,[$item]);
                }
                return false;
            }
            $count++;
            return true;
        });
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
