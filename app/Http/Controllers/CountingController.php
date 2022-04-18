<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CountingController extends Controller
{
    function user() {
        return view('counting.user');
    }
}
