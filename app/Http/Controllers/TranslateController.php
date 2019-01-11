<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;

class TranslateController extends Controller
{
    public function index()
    {
        // encode the url for japanese characters to make the request through guzzle
        $translate = urlencode(request()->input('translate'));
        $client = new Client();
        $path = "https://jisho.org/api/v1/search/words?keyword={$translate}";

        $response = $client->request('GET', $path);
        $words = json_decode($response->getBody(), true);

        return response()->json($words);
    }
}
