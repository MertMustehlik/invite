<?php

namespace App\Http\Controllers\Portal;

use Illuminate\Http\Request;
use App\Models\Common\District;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;

class DistrictController extends Controller
{
    public function search(Request $request): JsonResponse
    {
        if (!$request->city_id) {
            return response()->json([
                "message" => "Şehir seçiniz."
            ], 404);
        }
        $term = $request->input('term')['term'] ?? null;
        $result = District::query()
            ->where("city_id", $request->input('city_id'))
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
