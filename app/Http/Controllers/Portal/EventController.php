<?php

namespace App\Http\Controllers\Portal;

use App\Models\Event;
use Illuminate\Http\JsonResponse;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Portal\Event\StoreRequest;

class EventController extends Controller
{
    public function create(): View
    {
        return view('portal.pages.events.create-wedding');
    }

    public function store(StoreRequest $request): JsonResponse
    {
        $validatedData = $request->validated();

        $validatedData['user_id'] = $request->user()->id;
        $startDate = $validatedData['start_date'];
        $validatedData['start_date'] = $startDate . ' ' . $validatedData['start_time'];
        $validatedData['end_date'] = $startDate . ' ' . $validatedData['end_time'];
        $validatedData['allow_guest_tracking'] = $request->boolean('allow_guest_tracking');

        unset($validatedData['start_time'], $validatedData['end_time']);

        Event::create($validatedData);

        return response()->json([
            'message' => 'Etkinlik başarıyla oluşturuldu.'
        ]);
    }

    public function show(Event $event): View
    {
        if($event->user_id !== Auth::user()->id) {
            abort(403);
        }
        return view('portal.pages.events.show', compact('event'));
    }
}
