<?php namespace Thavirat\EmsTracking;

class EmsTracking {
	public $token;

	public function genToken(){
		$data = $this->callApi([] , '/authenticate/token' , null);
		$this->token = $data->token;
	}

	public function callApi($data , $url , $token , $debug = false){
		if(!env('TOKEN_EMS')&&!$token){
			return 'Please seting token.';
		}

		if(!$token){
			$token = env('TOKEN_EMS');
		}
		$ch = curl_init('https://trackapi.thailandpost.co.th/post/api/v1'.$url);
		curl_setopt($ch, CURLOPT_HTTPHEADER, array(                                                                          
			'Content-Type: application/json',
			'Authorization: Token '.$token
			)                                                                       
		);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch,CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
		$response = curl_exec($ch);
		$httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
		if($debug){
			$error = curl_error($ch);
			// dd($httpcode);
		}
		if($httpcode==200){
			curl_close($ch);
			return json_decode($response);
		}else{
			$error = curl_error($ch);
			curl_close($ch);
			return $error;
		}
	}

	public function getItems($barcode = null){
		$barcode = '{
			"status": "all",
			"language": "TH",
			"barcode": '.json_encode($barcode).'
		}';
		$this->genToken();
		$data = $this->callApi($barcode , '/track' , $this->token , true);
		return $data->response->items;
	}
}
?>