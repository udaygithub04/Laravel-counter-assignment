<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Counter;

class CountController extends Controller
{
    function incDec($count){

        $co = Counter::first();

        if($co){

            Counter::where('id',$co->id)->Update([
                'count' =>  $count
            ]);


        }else{

            Counter::Create([
                'count' =>  $count
            ]);

        }



    }
}
