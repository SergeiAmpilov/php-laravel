<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class PostController extends Controller
{

    public function __construct(Request $request)
    {
        dump($request->route()->getName());
    }


    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {

        // transactions
        DB::beginTransaction();
        try {
            DB::update('update posts set created_at = ? where created_at is null',
                [NOW()]);

            DB::update('update posts set updated_at = ? where updated_at is null',
                [NOW()]);

            DB::commit();

        } catch (\Exception $exception) {
            DB::rollBack();
        }



        $posts = DB::select('SELECT * FROM posts WHERE id >= ?', [1]);
        dump($posts);
        return view('posts.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        dd($request);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        return "Post $id";
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {

        return view('posts.edit', compact('id'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        dd($request, $id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        dd($id);
    }
}
