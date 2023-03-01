<?php


namespace App\Http\Controllers;


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

        // lets proceed with db countries

        /*
        $data = DB::table('country')->select('code', 'name', 'population')->limit(3)->orderBy('population', 'desc')->get();
        dump($data->all());

        $city = DB::table('city')->first();
        dump($city);

        $zaanstad = DB::table('city')->select('id', 'name')->find(19);
        dump($zaanstad);

        $bigCountries = DB::table('country')->select('code', 'name', 'population')->where([
            ['population', '>', 1000000000],
            ['code', 'CHN']
        ])->get();
        dump($bigCountries->all());

        $countryName = DB::table('country')->where('population', '>', 100000000)->value('LocalName');
        dump($countryName);

        $column = DB::table('countrylanguage')->limit(10)->pluck('Language', 'CountryCode')->count();
        dump($column);
        */

//        $data = DB::table('city')->select('CountryCode')->distinct()->get()->all();
        $data = DB::table('city')->select('city.id', 'city.name as city_name', 'country.code', 'country.name as country_name')->limit(10)
            ->join('country', 'city.CountryCode', '=', 'country.code')
            ->orderBy('city.id', 'desc')
            ->get();
        dump($data);

        $data1 = 'data 1';
        $data2 = 'data 2';


        return view('main', compact('data1', 'data2'))->with('var1', $data1 . $data2);
    }

    public function test()
    {
        return __METHOD__;
    }
}
