<?php 
// RAJAONGKIR
/*
	Copyright (c) 2016, AKSAMEDIA - JASA PEMBUATAN WEBSITE

	BASED ON RAJAONGKIR DOCUMENTATION
*/


class RajaOngkir  {

	const key 	= "5e610f0aa5f9d307a84c9c541e1d1701";
	const url 	= "http://api.rajaongkir.com/starter/";
	

	public static function getProvince(){
		$curl = curl_init();

		curl_setopt_array($curl, array(
			CURLOPT_URL => "http://api.rajaongkir.com/starter/province",
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_ENCODING => "",
			CURLOPT_MAXREDIRS => 10,
			CURLOPT_TIMEOUT => 30,
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST => "GET",
			CURLOPT_HTTPHEADER => array(
			  "key: ".self::key
			),
		));

		$response = curl_exec($curl);
		$err = curl_error($curl);

		curl_close($curl);

		if ($err) {
			$data['auth'] 		= false;
			$data['msg'] 		= "Error CURL : ".$err;
			return json_decode(json_encode($data));
		}

		$response = json_decode($response);

		foreach ($response->rajaongkir->results as $result) {
			$province[] 	= array('id' => $result->province_id, 'name' => $result->province);		
		}		

		$data['auth'] 		= true;
		$data['msg'] 		= $province;
		return json_decode(json_encode($data));
	}

	public static function getCity($province){

			$curl = curl_init();

			curl_setopt_array($curl, array(
			  CURLOPT_URL => "http://rajaongkir.com/api/starter/city?id=&province=".$province,
			  CURLOPT_RETURNTRANSFER => true,
			  CURLOPT_ENCODING => "",
			  CURLOPT_MAXREDIRS => 10,
			  CURLOPT_TIMEOUT => 30,
			  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			  CURLOPT_CUSTOMREQUEST => "GET",
			  CURLOPT_HTTPHEADER => array(
			     "key: ".self::key
			  ),
			));

			$response = curl_exec($curl);
			$err = curl_error($curl);

			curl_close($curl);


			if ($err) {
				$data['auth'] 		= false;
				$data['msg'] 		= "Error CURL : ".$err;
				return json_decode(json_encode($data));
			}
			$response = json_decode($response);

			foreach ($response->rajaongkir->results as $result) {
				$city[] 	= array('id' => $result->city_id, 'name' => $result->city_name,'type' => $result->type);		
			}			  

			$data['auth'] 		= true;
			$data['msg'] 		= $city;
			return json_decode(json_encode($data));
	}

	public static function getDistrict($city){
		
		$curl = curl_init();

		curl_setopt_array($curl, array(

		  CURLOPT_URL => "http://pro.rajaongkir.com/api/subdistrict?city=".$city,
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_ENCODING => "",
		  CURLOPT_MAXREDIRS => 10,
		  CURLOPT_TIMEOUT => 30,
		  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		  CURLOPT_CUSTOMREQUEST => "GET",
		  CURLOPT_HTTPHEADER => array(
		    "key: ".self::key
		  ),
		));

		$response = curl_exec($curl);
		$err = curl_error($curl);

		curl_close($curl);

		if ($err) {
			$data['auth'] 		= false;
			$data['msg'] 		= "Error CURL : ".$err;
			return json_decode(json_encode($data));
		}

		$response = json_decode($response);

		foreach ($response->rajaongkir->results as $result) {
			$district[] = array('id' => $result->subdistrict_id, 'name' => $result->subdistrict_name);
		}

		$data['auth'] 		= true;
		$data['msg'] 		= $district;
		return json_decode(json_encode($data));
	}

	public static function getCost(array $config){
			$required 	= ['destination','weight','courier'];

			foreach ($required as $result) {
				if(!array_key_exists($result, $config)){
					$data['auth'] 	= false;
					$data['msg'] 	= "Opps! '".$result."' required";
					return json_decode(json_encode($data));
				}
			}

			// If Origin not set give default origin surabaya 
			if(!isset($config['origin'])){
				$config['origin'] 	= 444;
			}

			$curl = curl_init();

			curl_setopt_array($curl, array(
			  CURLOPT_URL => "http://pro.rajaongkir.com/api/cost",
			  CURLOPT_RETURNTRANSFER => true,
			  CURLOPT_ENCODING => "",
			  CURLOPT_MAXREDIRS => 10,
			  CURLOPT_TIMEOUT => 30,
			  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			  CURLOPT_CUSTOMREQUEST => "POST",
			  CURLOPT_POSTFIELDS => "origin=".$config['origin'].
			  						"&originType=city&destination=".$config['destination'].
			  						"&destinationType=subdistrict&weight=".$config['weight'].
			  						"&courier=".$config['courier'],
			  CURLOPT_HTTPHEADER => array(
			    "content-type: application/x-www-form-urlencoded",
			    "key: ".self::key
			  ),
			));


			$response = curl_exec($curl);
			$err = curl_error($curl);

			curl_close($curl);

			if ($err) {
				$data['auth'] 		= false;
				$data['msg'] 		= "Error CURL : ".$err;
				return json_decode(json_encode($data));
			}

			$response 		= json_decode($response);
			foreach ($response->rajaongkir->results[0]->costs as $result) {
				$costs[] 		= array('name' => $result->service, 'price' => $result->cost[0]->value, 'day' => $result->cost[0]->etd);
			}

			$data['auth'] 		= true;
			$data['msg'] 		= $costs;
			return json_decode(json_encode($data));
	}


}