<?php

namespace App\Http\Controllers;

use App\Models\Page;
use App\Models\Package;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $packages = Package::available()->get();
        $pages = Page::all()->keyBy('slug');

        return view('welcome', compact('packages', 'pages'));
    }
}
