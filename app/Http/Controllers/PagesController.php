<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function home() {
        return view('home');
    }

    public function success() {
        return view('success');
    }

    public function balance() {
        return view('balance');
    }

    public function contact() {
        return view('contact');
    }
}
