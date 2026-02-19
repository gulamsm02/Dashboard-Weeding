<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Invitation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class InvitationController extends Controller
{
    public function index()
    {
        $invitations = Invitation::where('user_id', Auth::id())->latest()->get();
        return view('admin.invitations.index', compact('invitations'));
    }

    public function create()
    {
        return view('admin.invitations.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => ['required','string','max:150'],
            'groom_name' => ['required','string','max:100'],
            'bride_name' => ['required','string','max:100'],
            'event_date' => ['required','date'],
            'event_time' => ['required','string','max:10'],
            'location' => ['required','string','max:255'],
            'expired_at' => ['nullable','date'],
        ]);

        $slug = Str::slug($validated['title']) . '-' . Str::lower(Str::random(4));

        $invitation = Invitation::create([
            'user_id' => Auth::id(),
            'title' => $validated['title'],
            'slug' => $slug,
            'status' => 'draft',
            'expired_at' => $validated['expired_at'] ?? null,
            'data_json' => [
                'groom_name' => $validated['groom_name'],
                'bride_name' => $validated['bride_name'],
                'event_date' => $validated['event_date'],
                'event_time' => $validated['event_time'],
                'location' => $validated['location'],
            ],
        ]);

        return redirect()->route('admin.invitations.edit', $invitation)->with('success','Draft dibuat.');
    }

    public function edit(Invitation $invitation)
    {
        abort_unless($invitation->user_id === Auth::id(), 403);
        return view('admin.invitations.edit', compact('invitation'));
    }

    public function update(Request $request, Invitation $invitation)
    {
        abort_unless($invitation->user_id === Auth::id(), 403);

        $validated = $request->validate([
            'title' => ['required','string','max:150'],
            'groom_name' => ['required','string','max:100'],
            'bride_name' => ['required','string','max:100'],
            'event_date' => ['required','date'],
            'event_time' => ['required','string','max:10'],
            'location' => ['required','string','max:255'],
            'expired_at' => ['nullable','date'],
        ]);

        $invitation->update([
            'title' => $validated['title'],
            'expired_at' => $validated['expired_at'] ?? null,
            'data_json' => [
                'groom_name' => $validated['groom_name'],
                'bride_name' => $validated['bride_name'],
                'event_date' => $validated['event_date'],
                'event_time' => $validated['event_time'],
                'location' => $validated['location'],
            ],
        ]);

        return back()->with('success','Draft diupdate.');
    }

    public function publish(Invitation $invitation)
    {
        abort_unless($invitation->user_id === Auth::id(), 403);

        $invitation->status = 'published';
        $invitation->access_token = Str::random(40);

        if (!$invitation->expired_at) {
            $invitation->expired_at = now()->addDays(90);
        }

        $invitation->save();

        return back()->with('success','Published! Link aktif.');
    }
}
