<?php

namespace App\Models;

use App\Models\Common\City;
use App\Models\Common\District;
use Illuminate\Database\Eloquent\Model;
use App\Models\Invitation\InvitationTemplate;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Invitation\EventInvitationLink;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Event extends Model
{
    use SoftDeletes;
    public const EVENT_TYPE_WEDDING = 1,
        EVENT_TYPE_HENNA_NIGHT = 2,
        EVENT_TYPE_ENGAGEMENT = 3;
        //EVENT_TYPE_CORPORATE = 4,
        //EVENT_TYPE_BABY_SHOWER = 5;

    public static array $eventTypes = [
        self::EVENT_TYPE_WEDDING => 'Düğün',
        self::EVENT_TYPE_HENNA_NIGHT => 'Kına Gecesi',
        self::EVENT_TYPE_ENGAGEMENT => 'Nişan',
        //self::EVENT_TYPE_CORPORATE => 'Kurumsal Etkinlik',
        //self::EVENT_TYPE_BABY_SHOWER => 'Baby Shower',
    ];

    protected $table = 'events';
    protected $fillable = [
        'user_id',
        'event_type_id',
        'title',
        'start_date',
        'end_date',
        'country_id',
        'city_id',
        'district_id',
        'address',
        'event_program',
        'lat',
        'lng',
        'invitation_template_id',

        'allow_guest_tracking',
        'total_yes',
        'total_no',

        'first_partner_first_name',
        'first_partner_last_name',
        'first_family_names',
        'second_partner_first_name',
        'second_partner_last_name',
        'second_family_names',
    ];

    protected function casts(): array
    {
        return [
            'start_date' => 'datetime',
            'end_date' => 'datetime',
            'lat' => 'float',
            'lng' => 'float',
            'is_guest_tracking' => 'boolean',
            'total_yes' => 'int',
            'total_no' => 'int',
        ];
    }

    public function event_invitation_links(): HasMany
    {
        return $this->hasMany(EventInvitationLink::class);
    }

    public function city(): BelongsTo
    {
        return $this->belongsTo(City::class);
    }

    public function district(): BelongsTo
    {
        return $this->belongsTo(District::class);
    }

    public function invitation_template(): BelongsTo
    {
        return $this->belongsTo(InvitationTemplate::class);
    }

    public function getStartDate(): Attribute
    {
        return Attribute::get(fn() => $this->start_date->translatedFormat('d-m-Y H:i:s'));
    }

    public function getEndDate(): Attribute
    {
        return Attribute::get(fn() => $this->end_date->translatedFormat('d-m-Y H:i:s'));
    }

    public function getEventType(): Attribute
    {
        return Attribute::get(
            fn() => self::$eventTypes[$this->event_type_id] ?? null
        );
    }
}
