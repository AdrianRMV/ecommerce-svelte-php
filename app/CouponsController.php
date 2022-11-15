<?php
	include "header_params.php";
	include "config.php";

	if (isset($_POST["action"])) {
		switch($_POST['action'])
		{
			case 'create':
				$name = strip_tags($_POST['name']);
				$code = strip_tags($_POST['code']);
				$porcentage = strip_tags($_POST['percentage_discount']);
				$min_amount = strip_tags($_POST['min_amount_required']);
				$min_product = strip_tags($_POST['min_product_required']);
				$start_date = strip_tags($_POST['start_date']);
				$end_date = strip_tags($_POST['end_date']);
				$max_uses = strip_tags($_POST['max_uses']);
				$count_uses = strip_tags($_POST['count_uses']);
				$valid_only_first = strip_tags($_POST['valid_only_first_purchase']);
				$status = strip_tags($_POST['status']);
				
				$couponsController = new CouponsController();
				echo json_encode($couponsController->create($name,$code,$porcentage,$min_amount,$min_product,$start_date,$end_date,$max_uses,$count_uses,$valid_only_first,$status));
			break;
			case 'update':
				$name = strip_tags($_POST['name']);
				$code = strip_tags($_POST['code']);
				$porcentage = strip_tags($_POST['percentage_discount']);
				$min_amount = strip_tags($_POST['min_amount_required']);
				$min_product = strip_tags($_POST['min_product_required']);
				$start_date = strip_tags($_POST['start_date']);
				$end_date = strip_tags($_POST['end_date']);
				$max_uses = strip_tags($_POST['max_uses']);
				$count_uses = strip_tags($_POST['count_uses']);
				$valid_only_first = strip_tags($_POST['valid_only_first_purchase']);
				$status = strip_tags($_POST['status']);
				$id = strip_tags($_POST['id']);

				$couponsController = new CouponsController();
				echo json_encode($couponsController->update($name,$code,$porcentage,$min_amount,$min_product,$start_date,$end_date,$max_uses,$count_uses,$valid_only_first,$status,$id));
			break;
			case 'delete':
				$id = strip_tags($_POST['id']);

				$couponsController = new CouponsController();
				echo json_encode($couponsController->delete($id));
			break;
		}
	}

	Class CouponsController{

		//Get a un cupon
		public function getCupon($id)
		{	
			$curl = curl_init();

			curl_setopt_array($curl, array(
			CURLOPT_URL => 'https://crud.jonathansoto.mx/api/coupons/'.$id,
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

		}
		
		//Get a todos los cupones
		public function getCupones()
		{	
			$curl = curl_init();

			curl_setopt_array($curl, array(
			CURLOPT_URL => 'https://crud.jonathansoto.mx/api/coupons',
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_ENCODING => '',
			CURLOPT_MAXREDIRS => 10,
			CURLOPT_TIMEOUT => 0,
			CURLOPT_FOLLOWLOCATION => true,
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST => 'GET',
			CURLOPT_HTTPHEADER => array(
			    'Authorization: Bearer '.$_SESSION['token'],
			),
			));

			$response = curl_exec($curl);
			curl_close($curl);
			$response = json_decode($response);
			
		}

		//Create a un cupon
		public function create($name,$code,$porcentage,$min_amount,$min_product,$start_date,
								$end_date,$max_uses,$count_uses,$valid_only_first,$status)
		{	
			$curl = curl_init();

			curl_setopt_array($curl, array(
			CURLOPT_URL => 'https://crud.jonathansoto.mx/api/coupons',
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_ENCODING => '',
			CURLOPT_MAXREDIRS => 10,
			CURLOPT_TIMEOUT => 0,
			CURLOPT_FOLLOWLOCATION => true,
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST => 'POST',
			CURLOPT_POSTFIELDS => array('name' => $name,'code' => $code,'percentage_discount' => $porcentage,'min_amount_required' => $min_amount,'min_product_required' => $min_product,'start_date' => $start_date,'end_date' => $end_date,'max_uses' => $max_uses,'count_uses' => $count_uses,'valid_only_first_purchase' => $valid_only_first,'status' => $status),
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

		//Update a un cupon
		public function update($name,$code,$porcentage,$min_amount,$min_product,$start_date,
								$end_date,$max_uses,$count_uses,$valid_only_first,$status,$id)
		{	
			$curl = curl_init();

			curl_setopt_array($curl, array(
			CURLOPT_URL => 'https://crud.jonathansoto.mx/api/coupons',
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_ENCODING => '',
			CURLOPT_MAXREDIRS => 10,
			CURLOPT_TIMEOUT => 0,
			CURLOPT_FOLLOWLOCATION => true,
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST => 'PUT',
			CURLOPT_POSTFIELDS => 'name='.$name.'&code='.$name.'&percentage_discount='.$name.'&min_amount_required='.$name.'&min_product_required='.$name.'&start_date='.$name.'&end_date='.$name.'&max_uses='.$name.'&count_uses='.$name.'&valid_only_first_purchase='.$name.'&status='.$name.'&id='.$name,
			CURLOPT_HTTPHEADER => array(
				'Authorization: Bearer 1652|z3WkoTqsJHB5Mm5KM7kKtzpDPNzpamfptMyPKXFf'
				,
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

		//Delete a un cupon
		public function delete($id)
		{	
			$curl = curl_init();

			curl_setopt_array($curl, array(
			CURLOPT_URL => 'https://crud.jonathansoto.mx/api/coupons/'.$id,
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