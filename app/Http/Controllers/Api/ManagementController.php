<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Management;
use Illuminate\Http\JsonResponse;

class ManagementController extends Controller
{
    public function index(): JsonResponse
    {
        $management = Management::all()->map(function ($item) {
            return [
                'id' => $item->id,
                'name' => $item->name,
                'designation' => $item->designation,
                'location' => $item->location,
                'linkedin' => $item->linkedin,
                'image' => $item->image ? asset('storage/' . $item->image) : null, // full URL
            ];
        });

        return response()->json($management);
    }
}
