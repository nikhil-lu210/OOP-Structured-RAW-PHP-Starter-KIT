<?php
namespace App\Controllers\Home;

class HomeController {
    function __construct()
    {
        
    }


    public function index() {
        $user = (object) ['name' => 'Nikhil'];
        return view('home.index', ['user' => $user]);
    }
}