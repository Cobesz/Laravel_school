<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

class GamesListController extends Controller
{

    public function index()
    {

        $client = new Client();

// Create a request
        $request = $client->get('http://api.steampowered.com/ISteamApps/GetAppList/v2/');
// Get the actual response without headers
        $response = $request->getBody();


        return view('gameslist')->with('games', $response);
    }

    public function getGamesList() {

    }

}
