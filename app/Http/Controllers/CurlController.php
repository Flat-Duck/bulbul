<?php

namespace App\Http\Controllers;

use App\Http\Resources\MatchResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;

class CurlController extends Controller
{
    public function current(Request $request)
    {
        $cachedData = Redis::get('curl_football_current');

        if(isset($cachedData)) {
            return  ['data' => json_decode($cachedData) ];

        }else {

            $curl = curl_init();

            curl_setopt_array($curl, array(
                CURLOPT_URL => 'https://api-football-v1.p.rapidapi.com/v3/fixtures?live=all&timezone=africa/tripoli&status=1H-HT-2H-ET-BT-P-SUSP-INT-LIVE',
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => '',
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 0,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => 'GET',
                CURLOPT_HTTPHEADER => array(
                    'x-rapidapi-key: 5da7025df8mshb92b67e7a2323ebp120647jsn360a09914f02',
                    'x-rapidapi-host: api-football-v1.p.rapidapi.com'
                ),
            ));

            $response = curl_exec($curl);
            curl_close($curl);

            $data =  new MatchResource(json_decode($response));

            Redis::set('curl_football_current', $data->toJson(),'EX',60);
            return $data;
        }
    }

    public function next(Request $request)
    {
        $cachedData = Redis::get('curl_football_next');

        if(isset($cachedData)) {
            return  ['data' => json_decode($cachedData) ];

        }else {

            $curl = curl_init();

            curl_setopt_array($curl, array(
                CURLOPT_URL => 'https://api-football-v1.p.rapidapi.com/v3/fixtures?live=all&timezone=africa/tripoli',
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => '',
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 0,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => 'GET',
                CURLOPT_HTTPHEADER => array(
                    'x-rapidapi-key: 5da7025df8mshb92b67e7a2323ebp120647jsn360a09914f02',
                    'x-rapidapi-host: api-football-v1.p.rapidapi.com'
                ),
            ));

            $response = curl_exec($curl);
            curl_close($curl);
            $data =  new MatchResource(json_decode($response));

            $data = $this->removeMatchByDate(false, $data->toArray($request));

            Redis::set('curl_football_next', json_encode($data),'EX',60);
            return  ['data' => array_values($data)];

        }
    }
}


