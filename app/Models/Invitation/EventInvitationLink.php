<?php

namespace App\Models\Invitation;

use App\Models\Event;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class EventInvitationLink extends Model
{
    public function event(): BelongsTo
    {
        return $this->belongsTo(Event::class);
    }
}
