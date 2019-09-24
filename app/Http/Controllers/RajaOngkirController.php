<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RajaOngkirController extends Controller
{
    public function province(){
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://api.rajaongkir.com/starter/province",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
                "key:  af59975b602421e6e642bff10fdd335b "
                ),
            ));

    $response = curl_exec($curl);
    $err = curl_error($curl);

    curl_close($curl);

        if ($err) {
        echo "cURL Error #:" . $err;
        } else {
            return response()->json(['data'=>json_decode($response)],200);
        }
    }
}