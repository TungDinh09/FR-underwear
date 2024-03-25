<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactUSController extends Controller
{
    public function index()
    {
        return view('contact_us');
    }
}
