<?php

namespace App\Http\Requests\Portal\Event;

use App\Models\Event;
use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'title' => 'required|string|max:255',
            'event_type_id' => 'required|in:'. implode(',', array_keys(Event::$eventTypes)),

            'first_partner_first_name' => 'nullable|string',
            'first_partner_last_name' => 'nullable|string',
            'first_family_names' => 'nullable|string',
            'second_partner_first_name' => 'nullable|string',
            'second_partner_last_name' => 'nullable|string',
            'second_family_names' => 'nullable|string',

            'start_date' => 'nullable|date',
            'start_time' => 'nullable|date_format:H:i',
            'end_time' => 'nullable|date_format:H:i',

            'country_id' => 'nullable|exists:countries,id',
            'city_id' => 'nullable|exists:cities,id',
            'district_id' => 'nullable|exists:districts,id',
            'address' => 'nullable|string|max:500',
            'event_program' => 'nullable|string|max:500',


            'allow_guest_tracking' => 'nullable|boolean',
            //Ek Sorular
        ];
    }
}
