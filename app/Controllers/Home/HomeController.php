<?php
namespace App\Controllers\Home;

use App\Controllers\Controller;
use App\Models\Website\Website;
use App\Services\Request;

class HomeController extends Controller {
    public function index() {
        $website = Website::with(['subscribers', 'posts'])->whereId(1)->firstOrFail();
        dd($website);
        $user = (object) ['name' => 'Nikhil'];
        return view('home.index', compact('user'));
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
