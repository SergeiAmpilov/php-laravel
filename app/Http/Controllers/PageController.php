<?php

namespace App\Http\Controllers;


class PageController extends Controller
{
    public function main()
    {
        return view('pages.main');
    }

    public function about()
    {
        return view('pages.about');
    }



    public function show()
    {
        return view('pages.about');
    }

    public function slug($slug = '')
    {
        return view("pages.show", compact('slug'));
    }

}
