<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

class GamesListController extends Controller
{

    public function checkDuplicate($duplicateItems, $random2, $maxItems, &$items)
    {
        //update if needed
        $random = $random2;
        while (in_array($random, $duplicateItems)) {
            $random = rand(0, $maxItems);
        }
        $duplicateItems[] = $random;
        $items[] = $random;
    }

    public function index()
    {

        $client = new Client();

        // Create a request
        $request = $client->get('http://api.steampowered.com/ISteamApps/GetAppList/v2/');
        // Get the actual response without headers
        $response = $request->getBody();

        $json = json_decode($response);

        $gameList = "";

        //count all items in steam api
        $maxItems = count($json->applist->apps);
        $duplicateItems = [];

        //make an array
        $items = [];

        //select 6 random items out of all steam apps
        for ($i = 0; $i < 6; $i++) {
            $random = rand(0, $maxItems);
            $this->checkDuplicate($duplicateItems, $random, $maxItems, $items);
        }

        //print result to the screen
        foreach ($items as $game) {
            $gameList .= $json->applist->apps[$game]->name . '<br/>';
        }
        
        return view('gameslist')->with('games', $gameList);
    }

    public function getGamesList()
    {

    }

}
