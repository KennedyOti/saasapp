<?php

namespace App\Http\Controllers;

use App\Classes\Gridphp\ClientGrid;
use App\Classes\Gridphp\AppGrid;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; // Import the DB facade

class ClientAppController extends Controller
{
    // Display the grid for managing clients
    public function manageClients()
    {
        $gridOutput = ClientGrid::createClientGrid();
        return view('grid', ['grid' => $gridOutput]);
    }

    // Display the grid for managing apps for a specific client
    public function manageApps($clientId)
    {
        // Ensure the clientId exists in the clients table before proceeding
        if (DB::table('clients')->where('id', $clientId)->exists()) {
            $gridOutput = AppGrid::createAppGrid($clientId);
            return view('grid', ['grid' => $gridOutput]);
        } else {
            abort(404, 'Client not found');
        }
    }
}
