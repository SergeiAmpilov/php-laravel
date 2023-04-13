<?php


namespace App\Http\Controllers;


use App\Models\City;
use App\Models\Country;
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

    public function post() {
//        $post = new Post();
//        $post->title = 'Article 3';
//        $post->content = 'Lorem ipsum 3';
//        $post->save();


//        Post::query()->create([
//            'title' => 'Post 5',
//            'content' => 'Lorem ipsum 5'
//        ]);

//        $post = new Post();
//        $post->fill([ 'title' => 'Post 6', 'content' => 'Lorem ipsum 6' ]);
//        $post->save();

//        $post = Post::query()->find(5);
//        $post->content = 'New content after update';
//        $post->title = "{$post->title} Updated";
//        $post->save();

//        Post::query()->where('id', '>', 3)->update(['updated_at' => NOW()]);

        if ($post = Post::query()->find(4)) {
            $post->delete();
        }
    }

    public function postlist() {

//        $data = Country::all();
//        $data = Country::limit(5)->get();
//        $data = Country::query()->limit(5)->get();
//        $data = Country::query()->where('code', '<', 'AGO')->select('Code', 'Name')->get();
//        $data = City::query()->find(4);
        $data = Country::query()->find('ARM');
        dump($data);

    }

    public function test()
    {
        return __METHOD__;
    }
}
