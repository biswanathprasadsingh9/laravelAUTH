<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Snowfire\Beautymail\Beautymail;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
     $beautymail = app()->make(\Snowfire\Beautymail\Beautymail::class);
     $beautymail->send('emails.welcome', [], function($message)
     {
         $message
       ->from('pcgameshopbbsr@gmail.com')
       ->to('b21341995returns@gmail.com', 'John Smith')
       ->subject('Thank you for login!');

     });
        return view('home');
    }
}
