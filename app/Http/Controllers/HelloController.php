<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Person;
use Illuminate\Support\Facades\Storage;
use League\CommonMark\Extension\CommonMark\Node\Inline\Strong;

class HelloController extends Controller
{
    private $fname;

    function __construct()
    {
        $this->fname = 'sample.txt';
    }

    public function index()
    {
        $sample_msg = $this->fname;
        $sample_data = Storage::get($this->fname);
        $data = [
            'msg' => $sample_msg,
            'data' => explode(PHP_EOL, $sample_data),
        ];
        // dd($sample_data);
        return view('hello.index', $data);
    }
    
    public function other($msg)
    {
        // $data = Storage::get($this->fname) . PHP_EOL . $msg;
        // Storage::put($this->fname, $data);
        Storage::prepend($this->fname, $msg);
        return redirect()->route('hello');
    }
    
}
