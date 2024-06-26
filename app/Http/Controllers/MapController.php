<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MapController extends Controller
{
    public function index() //(funtion index atau sbg method)
    {
        $data = [
            "title" => "Bantul Bercerita"
        ];
        if (auth()->check()) {
            return view('index', $data);
        } else {
            return view('index-public', $data); //Digunakan untuk memanggil view index-public (file view index-public.blade.php)
        }
    }

    public function table()
    {
        $data = [
            "title" => "Table"
        ];
        return view('table', $data);
    }
    public function landing()
    {
        $data = [
            "title" => "Landing Page"
        ];
        return view('landing', $data);
    }
    public function index_public()
    {
        $data = [
            "title" => "Landing Page"
        ];
        return view('index-public', $data);
    }
}
