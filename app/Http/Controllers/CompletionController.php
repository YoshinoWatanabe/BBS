<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CompletionController extends Controller
{
    public function get() {
        return view('completion');
    }
}
