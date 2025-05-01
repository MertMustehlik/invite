<?php

namespace App\Http\Controllers\Portal;

use App\Models\Common\City;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;

class CityController extends Controller
{
    public function search(Request $request): JsonResponse
    {
        if (!$request->country_id) {
            return response()->json([
                "message" => __("choose_a_country")
            ], 404);
        }
        $term = $request->input('term')['term'] ?? null;
        $result = City::query()
            ->where("country_id", $request->input('country_id'))
            ->where("name", "LIKE", "%" . $term . "%")
            ->get()
            ->map(function ($item) {
                return [
                    "id" => $item->id,
                    "name" => $item->name
                ];
            });

        return response()->json([
            "items" => $result
        ]);
    }
}
