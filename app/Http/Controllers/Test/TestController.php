<?php

namespace App\Http\Controllers\Test;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

//use Illuminate\Http\Request;

class TestController extends Controller
{
    //
    public function index()
    {
        return __METHOD__;
    }

    public function query()
    {

        $data = DB::table('country')
            ->limit(7)
            ->orderBy('code', 'desc')
            ->select(['code', 'name'])
//            ->first();
            ->get();

//        dump($data);

        $cityData = DB::table('city')
//                        ->select(['id', 'name'])
                        ->where('id', '<=', 4)
                        ->where('id', '>', 2)
                        ->value('name');
//                        ->find(4);
//                        ->get();

//        dump($cityData);

        $dataPluck = DB::table('country')->limit(10)->pluck('name', 'code');
//        dump($dataPluck);


//        $dataAgr = DB::table('country')->max('population');
        $dataAgr = DB::table('country')->average('population');
//        dump($dataAgr);

        $dataDist = DB::table('city')->select('CountryCode')->distinct()->get();
//        dump($dataDist);


        $dataJoin = DB::table('city')
            ->select('city.ID', 'city.NAME as city_name', 'country.CODE', 'country.NAME as country_name')
            ->limit(10)
            ->join('country', 'city.CountryCode', '=', 'country.CODE')
            ->orderBy('city.ID')
            ->get();
        dump($dataJoin);


    }
}
