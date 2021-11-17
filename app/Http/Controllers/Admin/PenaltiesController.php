<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;

class PenaltiesController extends Controller
{
    public function index()
    {
        return Inertia::render('App/Penalties/PenaltiesList');
    }

    public function show()
    {
        return Inertia::render('App/Penalties/UserPenalties');
    }
}
