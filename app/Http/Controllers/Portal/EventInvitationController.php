<?php

namespace App\Http\Controllers\Portal;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use App\Models\Invitation\EventInvitationLink;

class EventInvitationController extends Controller
{
    public function store(Request $request): JsonResponse
    {
        $validatedData = $request->validate([
            'name' => 'nullable|string|max:255',
            'guest_count' => 'nullable|numeric|min:1'
        ]);

        //linkini oluştur vs vs

        return response()->json([
            'message' => 'Etkinlik başarıyla oluşturuldu.'
        ]);
    }

    public function show($id): JsonResponse
    {
        //bu linklerin eventi bu adama mı ait check et kocum

        $invitation = EventInvitationLink::findOrFail($id);
        return response()->json($invitation);
    }
}
