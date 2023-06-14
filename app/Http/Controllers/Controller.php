<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;


    public function removeMatchByDate($live = false, $data) :array
    {
        if($live){

        }else{
            foreach ($data as $key => $value) {
                if(($data[$key]['fixture']['timestamp'] > Carbon::now()->addMinutes(15)->timestamp) ||
                    ($data[$key]['fixture']['timestamp'] < Carbon::now()->timestamp )){
                    unset($data[$key]);
                }
            }
        }

        return $data;
    }
}
