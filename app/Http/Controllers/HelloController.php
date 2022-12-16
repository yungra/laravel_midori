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

    public function index()
{
    $msg = 'show people record.';
    $result = Person::get();
    
    $data = [
        'input' => '',
        'msg' => $msg,
        'data' => $result,
    ];
    return view('hello.index', $data);
}


public function send(Request $request)
{
    $input = $request->input('find');
    $msg = 'search: ' . $input;
    $result = Person::search($input)->get();


    $data = [
        'input' => $input,
        'msg' => $msg,
        'data' => $result,
    ];
    return view('hello.index', $data);
}


    public function other()
    {
        $person = new Person();
        $person->all_data = ['aaa', 'bbb@ccc', 1234]; //ダミーデータ
        $person->save();

        return redirect()->route('hello');
    }

    public function json($id = -1)
    {
        if($id == -1)
        {
            return Person::get()->toJson();
        }
        else
        {
            return Person::find($id)->toJson();
        }
    }

}
