<?php
namespace App\Controllers\Home;

use App\Controllers\Controller;

class HomeController extends Controller {
    public function index() {
        $user = (object) ['name' => 'Nikhil'];
        return view('home.index', ['user' => $user]);
    }

    public function show($id) {
        dd($id);
    }
}
