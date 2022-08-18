<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RajaongkirController extends Controller
{
    public function getProvince(Request $request){
        try {
            $data['status'] = [
                "code" => 200,
                "description" => "OK"
            ];

            if($request->id){
                $data['query'] = [
                    "query" => [
                        "id" => $request->id
                    ]
                ];
                $data['results'] = DB::table('province')->where('province_id', $request->id)->get();
            }
            else{
                $data['results'] = DB::table('province')->get();
            }

            return $data;
        } catch (\Exception $e) {
            return $error['status'] = [
                'code' => '500',
                'description' => $e,
            ];
        }
    }

    public function getCity(Request $request){
        try {
            $data['status'] = [
                "code" => 200,
                "description" => "OK"
            ];

            if($request->id){
                $data['query'] = [
                    "query" => [
                        "id" => $request->id
                    ]
                ];
                $data['results'] = DB::table('city')->where('city_id', $request->id)->get();
            }
            else{
                $data['results'] = DB::table('city')->get();
            }

            return $data;
        } catch (\Exception $e) {
            return $error['status'] = [
                'code' => '500',
                'description' => $e,
            ];
        }
    }
}
