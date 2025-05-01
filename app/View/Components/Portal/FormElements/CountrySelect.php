<?php

namespace App\View\Components\Portal\FormElements;

use App\Models\Common\Country;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class CountrySelect extends Component
{
    public $options;
    public function __construct()
    {
        $this->options = Country::query()
            ->orderByRaw("name = 'Turkey' DESC")
            ->orderBy('name')
            ->get()
            ->map(function ($item) {
                return [
                    'value' => $item->id,
                    'label' => $item->native,
                    'extraParams' => [
                        'currency_symbol' => $item->currency_symbol
                    ]
                ];
            });
    }

    public function render(): View|Closure|string
    {
        return view('components.portal.form-elements.country-select');
    }
}
