<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class MatchResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $data = [];
        foreach ($this->response as $key => $match) {
            $data[$key]['fixture']['id'] = $match->fixture->id;
            $data[$key]['fixture']['referee'] = $match->fixture->referee;
            $data[$key]['fixture']['date'] = $match->fixture->date;
            $data[$key]['fixture']['timestamp'] = $match->fixture->timestamp;
            $data[$key]['fixture']['elapsed'] = $match->fixture->status->elapsed;
            $data[$key]['fixture']['status_short'] = $match->fixture->status->short;
            $data[$key]['fixture']['status_long'] = $match->fixture->status->long;

            $data[$key]['league']['name'] = $match->league->name;
            $data[$key]['league']['country'] = $match->league->country;
            $data[$key]['league']['logo'] = $match->league->logo;
            $data[$key]['league']['flag'] = $match->league->flag;
            $data[$key]['league']['season'] = $match->league->season;
            $data[$key]['league']['round'] = $match->league->round;

            $data[$key]['teams']['home']['name'] = $match->teams->home->name;
            $data[$key]['teams']['home']['logo'] = $match->teams->home->logo;
            $data[$key]['teams']['away']['name'] = $match->teams->away->name;
            $data[$key]['teams']['away']['logo'] = $match->teams->away->logo;

            $data[$key]['venue']['name'] = $match->fixture->venue->name;
            $data[$key]['venue']['city'] = $match->fixture->venue->city;
        }

        return $data;
    }
}
