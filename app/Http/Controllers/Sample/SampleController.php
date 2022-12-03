<?php

namespace App\Http\Controllers\Sample;

use Illuminate\Http\Request;
use App\Models\Person;
use App\Http\Controllers\Controller;

class SampleController extends Controller
{
    public function index()
    {
        $sample_msg = config('sample.message');
        $sample_data = config('sample.data');
        $data = [
            'msg' => $sample_msg,
            'data' => $sample_data,
        ];
        // dd($data);
        return view('hello.index', $data);
    }
}
