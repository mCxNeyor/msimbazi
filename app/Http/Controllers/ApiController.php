<?php

namespace App\Http\Controllers;

use App\Models\Device;
use App\Models\DeviceData;
use Illuminate\Database\Eloquent\Casts\Json;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function store(Request $request)
    {
        $check=Device::where('imei',$request->input('imei'))->first();
        if ($check==true)
        {
             DeviceData::create([
                'dev_id'=>$check->id,
                'ph'=>$request->input('ph'),
                'ec'=>$request->input('ec'),
                'temp'=>$request->input('temp'),
                'tur'=>$request->input('tur'),
                'tds'=>$request->input('tds'),
                'longi'=>$request->input('longi'),
                'lati'=>$request->input('lati')
            ])->save();
        }
        else{
            return response()->json(["message" => "invalid device"], 400);
        }
    }
    
    public function index(){
        $val=Device::with('latestData')->get();
        return response()->json($val);
    }


}
