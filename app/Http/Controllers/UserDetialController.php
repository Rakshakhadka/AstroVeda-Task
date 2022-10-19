<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserDetialController extends Controller
{
    public static function distancecalulate($longitudeFrom,$latitudeFrom,$longitudeTo,$latitudeTo)
    {
    $rad = M_PI / 180;
    //Calculate distance from latitude and longitude
    $theta = $longitudeFrom - $longitudeTo;
    $dist = sin($latitudeFrom * $rad)
        * sin($latitudeTo * $rad) +  cos($latitudeFrom * $rad)
        * cos($latitudeTo * $rad) * cos($theta * $rad);

    return json_encode(acos($dist) / $rad * 60 *  1.853);
}

    public function index(Request $request)
    {
        $userid=$request->userid;
        $usertype=User::find($userid);
        $user=User::where('type',$usertype->type)->paginate(20);
        $distance=[];
        foreach($user as $u)
        {
            $distance[]=self::distancecalulate($usertype->longitude,$usertype->latitude,$u->longitude,$u->latitude);

        }
        $data['user']=$user;
        $data['distance']=$distance;
        return response($data);
    }
}
