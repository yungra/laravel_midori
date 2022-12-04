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
        $this->fname = 'hello.txt';
    }

    public function index()
    {
        $url = Storage::disk('public')->url($this->fname);
        $size = Storage::disk('public')->size($this->fname);
        $modified = Storage::disk('public')->lastModified($this->fname);
        $modified_time = date('y-m-d H:i:s', $modified);
        $sample_keys = ['url', 'size', 'modified'];
        $sample_meta = [$url, $size, $modified_time];
        $result = '<table><tr><th>' . implode('</th><th>', $sample_keys) . '</th></tr>';
        $result .= '<tr><td>' . implode('</td><td>', $sample_meta) . '</td></tr></table>';

        $sample_data = Storage::disk('public')->get($this->fname);

        $data = [
            'msg' => $result,
            'data' => explode(PHP_EOL, $sample_data),
        ];
        // dd($sample_data);
        return view('hello.index', $data);
    }
    
    public function other($msg)
    {
        // if (Storage::disk('public')->exists('bk_' . $this->fname))
        // {
        //     Storage::disk('public')->delete('bk_' . $this->fname);
        // }
        // Storage::disk('public')->copy($this->fname, 'bk_' . $this->fname);
        // if (Storage::disk('local')->exists('bk_' . $this->fname))
        // {
        //     Storage::disk('local')->delete('bk_' . $this->fname);
        // }
        // Storage::disk('local')->move('public/bk_' . $this->fname, 'bk_' . $this->fname);
        // return redirect()->route('hello');

        return Storage::disk('public')->download($this->fname);
    }
    
}
