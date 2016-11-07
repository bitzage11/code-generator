<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use anlutro\cURL\cURL as Curl;

class BaseController extends Controller
{
	

    public function check_user_name($user_name)
    {
    	
    	$url = 'https://www.freelancer.com/api/users/0.1/users/check/';
	 	$headers = array('recommend_name: true', 'Content-Type: application/json');
	 	$data = array('username: '.$user_name.'');
	 	$request = $this->curl_request($url, $data, 'GET', $headers);
		dd($request);
    }

    private function curl_request($url, $data_arr = false, $req = false, $headers = false)
    {
    	$curl = curl_init($url);

		//The JSON data.

		curl_setopt($curl, CURLOPT_CUSTOMREQUEST, $req);

		if($req == "POST"){

			$data = $data_arr;
			$data_string = json_encode($data);

			curl_setopt($curl, CURLOPT_HTTPHEADER, array(
		    	'Content-Type: application/json',
		    	'Accept: application/json',
		    	'connectapitoken: UC01Multan00112233')
		    );

			curl_setopt($curl, CURLOPT_POSTFIELDS, $data_string);	

		}else{
			curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
		}

		curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1); 
		 // Send the request

	    $result = curl_exec($curl);
	    // Free up the resources $curl is using
	    dd(curl_error($curl));
	    curl_close($curl);
		
		return json_decode($result);
    }
}
