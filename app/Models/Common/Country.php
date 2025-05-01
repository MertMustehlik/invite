<?php

namespace App\Models\Common;

use App\Models\Common\City;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Relations\HasMany;


class Country extends Model
{
    protected $table = 'countries';
    protected $guarded = ['id'];

    public $timestamps = false;

    public static function list(array $select = []): Collection
    {
        $query = self::query()->orderBy("name");
        if ($select) {
            $query->select($select);
        }

        return $query->get();
    }

    public function states(): HasMany
    {
        return $this->hasMany(City::class)->orderBy("name");
    }
}
