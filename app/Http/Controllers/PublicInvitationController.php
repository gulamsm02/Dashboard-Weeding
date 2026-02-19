<?php

namespace App\Http\Controllers;

use App\Models\Invitation;
use Illuminate\Http\Request;

class PublicInvitationController extends Controller
{
    public function show(Request $request, string $slug)
    {
        $invitation = Invitation::where('slug', $slug)->firstOrFail();

        // hanya yg published
        if ($invitation->status !== 'published') {
            abort(404);
        }

        // validasi token (?t=xxx)
        $t = $request->query('t');
        if (!$t || $t !== $invitation->access_token) {
            abort(404);
        }

        // cek expired
        if ($invitation->expired_at && now()->greaterThan($invitation->expired_at)) {
            return response()->view('invitations.expired', compact('invitation'), 410);
        }

        return view('invitations.show', compact('invitation'));
    }
}
