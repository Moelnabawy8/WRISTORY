<?php

namespace App\Http\Controllers;


use App\Models\Watch;


class HomeController extends Controller
{
   
     public function index()
{
    $latestWatches = Watch::latest()->take(4)->get();

    return view('home', compact('latestWatches'));
}
}
