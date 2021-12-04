<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\StoreProfileDetailRequest;
use App\Http\Requests\User\UpdateProfileRequest;
use App\Models\User;
use App\Models\UserDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Inertia\Inertia;

use function PHPUnit\Framework\isEmpty;

class UserProfileController extends Controller
{
    public function index()
    {
        $detail = User::find(Auth::id())->detail;
        return Inertia::render('App/User/Profile', [
            'detail' => $detail,
        ]);
    }

    public function store(StoreProfileDetailRequest $request)
    {
        $validateRequest = $request->validated();
        $user = User::find(Auth::id());

        
        if ($validateRequest['address'] == '') {
            unset($validateRequest['address']);
        }
        
        if (!$user->detail()->exists()) {
            $user->detail()->create($validateRequest);
        } else {
           $user->detail()->update($validateRequest);
        }

        return back();
    }

    public function update(UpdateProfileRequest $request, $id)
    {
        $validateRequest = $request->validated();
        $user = User::find($id);
        $user->update($validateRequest);
        
        if ($request->image) {
            $path = '/'.$request->image->storeAs('images/avatars', 
                $user->id.'_'.date('Y-m-d H:m:i'));

            if ($user->image != '/images/avatars/avatar.jpg') {
                Storage::delete($user->image);
            }

            $user->image = $path;
            $user->save();
        }

        return back()->with([
            'message' => 'berhasil'
        ]);
    }
}
