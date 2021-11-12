<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ReturnedBookController extends Controller
{
    public function index()
    {
        return Inertia::render('App/User/BookBorrowed');
    }
}
