<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public $frontend_path;

    public static $path;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    public function __construct() {
        $this->middleware('auth');
        $this->frontend_path =  env('TEST_PATH') . '/products_folder';
        SELF::$path = $this->frontend_path;

        view()->share('frontend_path', $this->frontend_path);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }
}
