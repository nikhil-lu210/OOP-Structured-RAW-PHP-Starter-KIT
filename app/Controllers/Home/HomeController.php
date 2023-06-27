<?php
namespace App\Controllers\Home;

use App\Controllers\Controller;

class HomeController extends Controller {
    function __construct()
    {
        
    }


    public function index() {
        $user = (object) ['name' => 'Nikhil'];
        return view('home.index', ['user' => $user]);
    }

    public function store() {
        var_dump($_POST);
    }
}