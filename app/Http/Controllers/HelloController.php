<?php

namespace App\Http\Controllers;

use App\MyClasses\MyService;
class HelloController extends Controller
{

    function __construct(MyService $myservice)
    {
        $myservice = app('App\MyClasses\MyService');
    }
    
    public function index(MyService $myservice, int $id = -1)
    {
        $myservice->setId($id);
        $data = [
            'msg' => $myservice->say(),
            'data' => $myservice->alldata()
        ];
        return view('hello.index', $data);
    }
    
}
