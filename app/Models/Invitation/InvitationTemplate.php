<?php

namespace App\Models\Invitation;

use App\Models\Event;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class InvitationTemplate extends Model
{
    protected $table = "invitation_templates";

    protected $fillable = [
        'name',
        'cover_image',
        'template_path',
        'data'
    ];

    public function events(): HasMany
    {
        return $this->hasMany(Event::class);
    }
}
