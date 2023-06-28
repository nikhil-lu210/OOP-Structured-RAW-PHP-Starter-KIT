<?php
namespace App\Controllers\Home;

use App\Controllers\Controller;
use App\Services\Request;

class HomeController extends Controller {
    public function index() {
        $user = (object) ['name' => 'Nikhil'];
        return view('home.index', ['user' => $user]);
    }

    // public function show(int $id, string $slug) {
    //     dd([$id, $slug]);
    // }
    public function show(Request $request, int $id, string $slug) {
        dd([$id, $slug, $request]);
    }

    public function store(Request $request) {
        dd($request->all());
    }
}
