<?php


namespace App\Http\Controllers;


use App\Models\Post;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class HomeController extends Controller
{
    public function index()
    {
        return view('welcome');
    }

    public function main(): View
    {

        $post = new Post();
        $post->title = 'Article 3';
//        $post->content = 'Post content 3';
        $post->save();

        $data1 = 'data 1';
        $data2 = 'data 2';


        return view('main', compact('data1', 'data2'))->with('var1', $data1 . $data2);
    }

    public function test()
    {
        return __METHOD__;
    }
}
