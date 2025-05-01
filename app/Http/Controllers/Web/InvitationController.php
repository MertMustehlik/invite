<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Invitation\EventInvitationLink;

class InvitationController extends Controller
{
    public function show($eventId, $code)
    {
        $eventInvitationLink = EventInvitationLink::query()
            ->where('event_id', $eventId)
            ->where('code', $code)
            ->first();

        if (!$eventInvitationLink) {
            abort(404, 'Davet link bulunamadi. 404 pagesi yapalim buraya bro');
        }

        $eventInvitationLink->load('event.invitation_template');
        
        // buraya da bir cache gibi bir şey ayarlayabilrsek sayfa yenilemesinde arka arkaya gelmsin acchede 15dk tutalım userı
        $eventInvitationLink->increment('view_count');

        // Davet linki bulundu, şimdi view dönebilirsin
        return view('invitation.show', [
            'event' => $eventInvitationLink->event,
            'template' => $eventInvitationLink->event->invitation_template
        ]);
    }
}
