<?php

namespace App\Http\Controllers;


class PageController extends Controller
{
    public function show()
    {
        return view('pages.about');
    }

    public function slug($slug)
    {
        return view("pages.show", compact('slug'));
    }

}
