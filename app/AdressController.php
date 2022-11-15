<?php 
	
	include "header_params.php";
	include "config.php";

    if (isset($_POST["action"])) {
			switch($_POST['action'])
			{
				case 'create':
					$name = strip_tags($_POST['first_name']);
					$lastname = strip_tags($_POST['last_name']);
					$street_number = strip_tags($_POST['street_and_use_number']);
					$cp = strip_tags($_POST['postal_code']);
					$city = strip_tags($_POST['city']);
					$province = strip_tags($_POST['province']);
					$phone = strip_tags($_POST['phone_number']);
					$user_id = strip_tags($_POST['client_id']);

					$addressController = new AddressController();
					echo json_encode($addressController-> create($name,$lastname,$street_number,$cp,$city,$province,$phone,$user_id));
				break;

				case 'update':
					$name = strip_tags($_POST['first_name']);
					$lastname = strip_tags($_POST['last_name']);
					$street_number = strip_tags($_POST['street_and_use_number']);
					$cp = strip_tags($_POST['postal_code']);
					$city = strip_tags($_POST['city']);
					$province = strip_tags($_POST['province']);
					$phone = strip_tags($_POST['phone_number']);
					$user_id = strip_tags($_POST['client_id']);
					$id = strip_tags($_POST['id']);

					$addressController = new AddressController();
					echo json_encode($addressController->update($name,$lastname,$street_number,$cp,$city,$province,$phone,$user_id,$id));
				break;

				case 'delete':
					$id = strip_tags($_POST['id']);
					
					$addressController = new AddressController();
					echo json_encode($addressController->delete($id));
				break;
			}

		}
	

    class AddressController{

        // GET a una direccion
        public function getAddress($id)
		{
            $curl = curl_init();

            curl_setopt_array($curl, array(
            CURLOPT_URL => 'http://crud.jonathansoto.mx/api/addresses/'.$id,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'GET',
            CURLOPT_HTTPHEADER => array(
				'Authorization: Bearer 1652|z3WkoTqsJHB5Mm5KM7kKtzpDPNzpamfptMyPKXFf'

            ),
            ));

            $response = curl_exec($curl);
            curl_close($curl);
			$response = json_decode($response);

			//pendiente
        }

		//Create a una dirrecion
		public function create($name,$lastname,$street_number,$cp,$city,$province,$phone,$user_id)
		{
			$curl = curl_init();

			curl_setopt_array($curl, array(
			CURLOPT_URL => 'http://crud.jonathansoto.mx/api/addresses',
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_ENCODING => '',
			CURLOPT_MAXREDIRS => 10,
			CURLOPT_TIMEOUT => 0,
			CURLOPT_FOLLOWLOCATION => true,
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST => 'POST',
			CURLOPT_POSTFIELDS => array('first_name' => $name,'last_name' => $lastname,'street_and_use_number' => $street_number,'postal_code' => $cp,'city' => $city,'province' => $province,'phone_number' => $phone,'is_billing_address' => '1','client_id' => $user_id),
			CURLOPT_HTTPHEADER => array(
				'Authorization: Bearer 1652|z3WkoTqsJHB5Mm5KM7kKtzpDPNzpamfptMyPKXFf'

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

		//Update a una dirrecion
		public function update($name,$lastname,$street_number,$cp,$city,$province,$phone,$user_id,$id)
		{
			$curl = curl_init();

			curl_setopt_array($curl, array(
			CURLOPT_URL => 'http://crud.jonathansoto.mx/api/addresses',
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_ENCODING => '',
			CURLOPT_MAXREDIRS => 10,
			CURLOPT_TIMEOUT => 0,
			CURLOPT_FOLLOWLOCATION => true,
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST => 'PUT',
			CURLOPT_POSTFIELDS => 'first_name='.$name.'&last_name='.$lastname.'&street_and_use_number='.$street_number.'&postal_code='.$cp.'&city='.$city.'&province='.$province.'&phone_number='.$phone.'&is_billing_address=1&client_id='.$user_id.'&id='.$id.'',
			CURLOPT_HTTPHEADER => array(
				'Authorization: Bearer 1652|z3WkoTqsJHB5Mm5KM7kKtzpDPNzpamfptMyPKXFf',
				'Content-Type: application/x-www-form-urlencoded'
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

		//Delete a una dirrecion
		public function delete($id)
		{
			$curl = curl_init();

			curl_setopt_array($curl, array(
			CURLOPT_URL => 'http://crud.jonathansoto.mx/api/addresses/'.$id,
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