<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Announcement;
use App\Models\UserBook;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class DashboardController extends Controller
{
    public function index()
    {
        $user_id = Auth::id();
        $booksBorrow = UserBook::where('user_id', $user_id)
                ->where('return_at', null)
                ->with('book.category', 'book.condition')
                ->get();

        $announcements = Announcement::all();
        
        return Inertia::render('App/Dashboard/Dashboard', [
            'booksBorrow' => $booksBorrow,
            'announcements' => $announcements,
        ]);
    }
}
