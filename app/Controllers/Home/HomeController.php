<?php
namespace App\Controllers\Home;

class HomeController {
    function __construct()
    {
        
    }


    public function index() {
        // return my_env('APP_NAME');
        return view('home.index');
    }
}