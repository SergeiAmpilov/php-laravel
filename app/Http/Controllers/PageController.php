<?php

namespace App\Http\Controllers;


class PageController extends Controller
{
    public function main()
    {
        $title = 'Main page';
        $h1 = '<h1 class="fw-light">Das ist home page</h1>';
        return view('pages.main', compact('title', 'h1'));
    }

    public function about()
    {
        $title = 'About page';
        return view('pages.about', compact('title'));
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
