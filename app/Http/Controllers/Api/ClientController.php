<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function index()
    {
        $clients = Client::all()->map(function ($client) {
            return [
                'link' => $client->link,
                'image' => $client->image ? asset('storage/' . $client->image) : null,
            ];
        });

        return response()->json([
            'status' => 'success',
            'data' => $clients,
        ]);
    }
}
