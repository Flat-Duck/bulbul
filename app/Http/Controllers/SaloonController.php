<?php

namespace App\Http\Controllers;

use App\Http\Integrations\Rapidapi\FootballConnector;
use App\Http\Integrations\Rapidapi\Requests\GetCurrentMatchesRequest;
use App\Http\Integrations\Rapidapi\Requests\GetNextMatchesRequest;
use App\Http\Resources\MatchResource;
use Illuminate\Http\Request;

class SaloonController extends Controller
{


    public function current(Request $request)
    {
        $connector =  new FootballConnector;
        $response = $connector->send(new GetCurrentMatchesRequest($request));
        return new MatchResource($response->object());

    }

    public function next(Request $request)
    {
        $connector =  new FootballConnector;
        $response = $connector->send(new GetNextMatchesRequest($request));

        $data =  new MatchResource(json_decode($response));
        $data = $this->removeMatchByDate(false, $data->toArray($request));

        return  ['data' => array_values($data)];
    }
}
