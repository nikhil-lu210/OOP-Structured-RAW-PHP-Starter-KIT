<?php
namespace App\Controllers\Home;

use App\Config\Mail;
use App\Services\Request;
use App\Controllers\Controller;
use App\Models\Post\Post;
use App\Models\Subscriber\Subscriber;
use App\Models\Website\Website;

class HomeController extends Controller {
    public function index() {
        Website::createTable();
        Subscriber::createTable();
        Post::createTable();
        
        dd('Table Created');
        
        // $website = Website::with(['subscribers', 'posts'])->whereId(1)->firstOrFail();
        // dd($website);

        // return view('home.index', compact('website'));
        
        // $recipient = 'nigel.si@staff-india.com';
        // $subject = 'Test Email';
        // $template = mail_view('emails.usermail', compact('website'));

        // Mail::send($recipient, $subject, $template);

        
        // dd($website);
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
