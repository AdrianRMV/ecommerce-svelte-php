<?php
	include "header_params.php";
	include "config.php";

	if (isset($_POST["action"])) {
		switch($_POST['action'])
		{
			case 'create':
				$name = strip_tags($_POST['name']);
				$email = strip_tags($_POST['email']);
				$password = strip_tags($_POST['password']);
				$phone = strip_tags($_POST['phone_number']);
				$level = strip_tags($_POST['level_id']);

				$clientController = new ClientController();
				echo json_encode($clientController->create($name,$email,$password,$phone,$level));
			break;
			case 'update':
				$id = strip_tags($_POST['id']);
				$name = strip_tags($_POST['name']);
				$email = strip_tags($_POST['email']);
				if(isset($_POST['password'])){
					$password = strip_tags($_POST['password']);
				}else{
					$password = '';
				}
				$phone = strip_tags($_POST['phone_number']);
				$suscription = strip_tags($_POST['is_suscribed']);

				if($suscription == 'SI' || $suscription == 'si'){
					$suscription = 1;
				}

				if($suscription == 'NO' || $suscription == 'no'){
					$suscription = 0;
				}

				$level = strip_tags($_POST['level_id']);

				$clientController = new ClientController();
				echo json_encode($clientController->update($id,$name,$email,$password,$phone,$suscription,$level));
			break;
			case 'delete':
				$id = strip_tags($_POST['id']);

				$clientController = new ClientController();
				echo json_encode($clientController->delete($id));
			break;
		}
	}

	Class ClientController{

		
		public function create($name,$email,$password,$phone,$level)
		{	
			$curl = curl_init();

			curl_setopt_array($curl, array(
			CURLOPT_URL => 'https://crud.jonathansoto.mx/api/clients',
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_ENCODING => '',
			CURLOPT_MAXREDIRS => 10,
			CURLOPT_TIMEOUT => 0,
			CURLOPT_FOLLOWLOCATION => true,
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST => 'POST',
			CURLOPT_POSTFIELDS => array('name' => $name,'email' => $email,'password' => $password,'phone_number' => $phone,'is_suscribed' => '1','level_id' => $level),
			CURLOPT_HTTPHEADER => array(
				'Authorization: Bearer 1652|z3WkoTqsJHB5Mm5KM7kKtzpDPNzpamfptMyPKXFf'
			),
			));

			$response = curl_exec($curl);
			curl_close($curl);
			$response = json_decode($response);

			if (isset($response->code) && $response->code > 0) {
				return true;
       	 	}else{
				return false;
			}

		}
		
		public function update($id,$name,$email,$password,$phone,$suscription,$level)
		{	
			$curl = curl_init();

			curl_setopt_array($curl, array(
			CURLOPT_URL => 'https://crud.jonathansoto.mx/api/clients',
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_ENCODING => '',
			CURLOPT_MAXREDIRS => 10,
			CURLOPT_TIMEOUT => 0,
			CURLOPT_FOLLOWLOCATION => true,
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST => 'PUT',
			CURLOPT_POSTFIELDS => 'name='.$name.'&email='.$email.'&password='.$password.'&phone_number='.$phone.'&is_suscribed='.$suscription.'&level_id='.$level.'&id='.$id,
			CURLOPT_HTTPHEADER => array(
				'Authorization: Bearer 1652|z3WkoTqsJHB5Mm5KM7kKtzpDPNzpamfptMyPKXFf',
				'Content-Type: application/x-www-form-urlencoded'
			),
			));

			$response = curl_exec($curl);
			curl_close($curl);
			$response = json_decode($response);

			if (isset($response->code) && $response->code > 0) {
				header('Location: ' . $_SERVER['HTTP_REFERER']);
       	 	}else{
				return false;
			}
		}
		
		public function delete($id)
		{	
			$curl = curl_init();

			curl_setopt_array($curl, array(
			CURLOPT_URL => 'https://crud.jonathansoto.mx/api/clients/'.$id,
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_ENCODING => '',
			CURLOPT_MAXREDIRS => 10,
			CURLOPT_TIMEOUT => 0,
			CURLOPT_FOLLOWLOCATION => true,
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST => 'DELETE',
			CURLOPT_HTTPHEADER => array(
				'Authorization: Bearer 1652|z3WkoTqsJHB5Mm5KM7kKtzpDPNzpamfptMyPKXFf'
			),
			));

			$response = curl_exec($curl);
			curl_close($curl);
			$response = json_decode($response);

			if (isset($response->code) && $response->code > 0) {
				return true;
       	 	}else{
				return false;
			}
		}
    }
?>