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

        DB::beginTransaction();

        try {

            DB::update("UPDATE posts SET created_at = :created_at  WHERE created_at IS NULL ", [
                'created_at' => NOW()
            ]);

            DB::update("UPDATE posts SET updated_at = :updated_at WHERE updated_at IS NULL", [
                'updated_at' => NOW(),
            ]);

            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            dump($e->getMessage());
        }


//        $query = DB::insert("INSERT INTO posts (title, content) VALUES (?, ?)", ['Hello world', 'This is article 5']);
        /////////
//        $res_db = DB::select("SELECT * FROM posts WHERE id > :id", ['id' => 0]);
//        dump($res_db);
        ////////
        ///




        $post = new Post();
        $post->title = 'Article 3';
        $post->content = 'Post content 3';
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
