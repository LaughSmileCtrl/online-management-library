<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserBook;
use Illuminate\Http\Request;
use Inertia\Inertia;

class PenaltiesController extends Controller
{
    public function index(Request $request)
    {
        $penalties = UserBook::select('id', 'user_id', 'bill', 'paid_off')
                ->whereRaw('bill > paid_off')
                ->with('user')
                ->when($request->search, function($query, $search) {
                    return $query->where('user_id', 'LIKE', '%'.$search.'%');
                })
                ->paginate(15);

        return Inertia::render('App/Penalties/PenaltiesList', ['penalties' => $penalties]);
    }

    public function show($id)
    {
        $penalties = UserBook::where('user_id', $id)
                ->whereRaw('bill > paid_off')
                ->with('book')
                ->get();

        return Inertia::render('App/Penalties/UserPenalties', ['penalties' => $penalties]);
    }

    public function update(Request $request, UserBook $penalty)
    {
        $penalty->paid_off = $penalty->paid_off + $request->paid;
        $penalty->save();

        return back()->with([
                'message' => 'berhasil membayar '.$request->paid.' pada user '. $penalty->user->name
            ]);
    }
}
