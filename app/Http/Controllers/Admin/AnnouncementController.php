<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AnnouncementRequest;
use App\Models\Announcement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class AnnouncementController extends Controller
{
    public function index()
    {
        $announcements = Announcement::with('type', 'user')->get();

        return Inertia::render('App/Announcement/Announcement', [
            'announcements' => $announcements,
        ]);
    }

    public function create()
    {
        $formConfig = ['method' => 'post', 'url' => route('announcement.store')];
        
        return Inertia::render('App/Announcement/AnnouncementEntry', [
            'formConfig' => $formConfig,
        ]);
    }

    public function store(AnnouncementRequest $request)
    {

        $announcementForm = $request->validated();
        $announcementForm['created_by'] = Auth::id();

        Announcement::create($announcementForm);

        return back()->with([
            'message' => 'Pengumuman '. $request->title 
                   . ' telah dibuat',
        ]);
    }

    public function edit(Announcement $announcement)
    {
        $formConfig = ['method' => 'put', 'url' => route('announcement.update', $announcement->id)];

        return Inertia::render('App/Announcement/AnnouncementEntry', [
            'announcement' => $announcement,
            'formConfig' => $formConfig,

        ]);
    }


    public function update(AnnouncementRequest $request, Announcement $announcement)
    {
        $announcement->update($request->validated());

        return back()->with([
            'message' => 'Pengumuman ' . $announcement->title 
                    . ' berhasil diubah'
        ]);
    }


    public function destroy(Announcement $announcement)
    {
        $announcement->delete();

        return back()->with([
            'message' => 'Pengumuman '. $announcement->title 
                   . ' telah dihapus',
        ]);
    }
}
