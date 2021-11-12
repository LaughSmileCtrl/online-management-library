<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;

class DonateBookController extends Controller
{
    public function index()
    {
        return Inertia::render('App/User/DonateBookForm');
    }
}
