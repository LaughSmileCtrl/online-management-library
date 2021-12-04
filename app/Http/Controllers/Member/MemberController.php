<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\MemberRequest;
use App\Models\User;
use App\Models\UserDetail;
use Illuminate\Http\Request;
use Inertia\Inertia;

class MemberController extends Controller
{
    public function index(Request $request)
    {
        $users = User::when($request->search, function($query, $search) {
                    return $query->where('name', 'LIKE', '%'.$search.'%')
                            ->orWhere('email', 'LIKE', '%'.$search.'%');
                })
                ->where('is_admin', false)
                ->with(['detail.department'])
                ->paginate(15);

        return Inertia::render('App/Member/Member', ['users' => $users]);
    }


    public function create()
    {
        return Inertia::render('App/Member/MemberEntry');
    }


    public function store(MemberRequest $request)
    {
        $userAttribute = $request->validated();
        $user = new User([
            'name' => $userAttribute['name'],
            'email' => $userAttribute['email']
        ]);
        $user->save();
        
        $userDetail = new UserDetail([
            'nrp' => $userAttribute['nrp'],
            'department_id' => $userAttribute['department_id']
        ]);


        $user->detail()->save($userDetail);

        return back()->with(['message' => $user->name.' berhasil dibuat']);
    }

 
    public function destroy(User $user)
    {
        if ($user->books != null ) {
            foreach ($user->books as $book) {
                if ($book->pivot->borrow_at 
                        != $book->pivot->return_at) {
                    return back()->with(['message' => $user->name .' tidak dapat dihapus']);
                }
            }
        }

        if (count($user->donateBooks)) {
            // dd('lol');
            return back()->with(['message' => $user->name .' masih mendonasikan buku']);
        }

        $user->delete();

        return back()->with(['message' => $user->name .' terhapus']);
    }
}
