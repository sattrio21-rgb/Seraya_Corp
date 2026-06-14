<?php

namespace App\Http\Controllers;

use App\Models\Package;

class PackageController extends Controller
{
    public function index()
    {
        $packages = Package::available()->latest()->get();

        return view('packages.index', compact('packages'));
    }
}
