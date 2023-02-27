<?php


namespace App\Http\Controllers;


class HomeController extends Controller
{
    public function index()
    {
        return view('welcome');
    }

    public function main()
    {
        $data1 = 'data 1';
        $data2 = 'data 2';

        return view('main', compact('data1', 'data2'))->with('var1', $data1 . $data2);
    }

    public function test()
    {
        return __METHOD__;
    }
}