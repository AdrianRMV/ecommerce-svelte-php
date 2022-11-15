<?php
	include "header_params.php";
	include "config.php";

	if (isset($_POST["action"])) {
		switch($_POST['action'])
		{
			case 'create':
				$folio = strip_tags($_POST['folio']);
				$total = strip_tags($_POST['total']);
				$is_paid = strip_tags($_POST['is_paid']);
				$client_id = strip_tags($_POST['client_id']);
				$address_id = strip_tags($_POST['address_id']);
				$order_status_id = strip_tags($_POST['order_status_id']);
				$payment_type_id = strip_tags($_POST['payment_type_id']);
				$coupon_id = strip_tags($_POST['coupon_id']);
				$presentations1_id = strip_tags($_POST['presentations[0][id]']);
				$presentations1_prices = strip_tags($_POST['presentations[0][quantity]']);
				$presentations2_id = strip_tags($_POST['presentations[1][id]']);
				$presentations2_prices = strip_tags($_POST['presentations[1][quantity]']);

				$ordersController = new OrdersController();
				echo json_encode($ordersController-> create($folio,$total,$is_paid,$client_id,$address_id,$order_status_id,
															$payment_type_id,$coupon_id,$presentations1_id,
															$presentations1_prices,$presentations2_id,$presentations2_prices));
			break;
			case 'update':
				$id = strip_tags($_POST['id']);
				$order_status_id = strip_tags($_POST['order_status_id']);

				$ordersController = new OrdersController();
				echo json_encode($ordersController-> update($id,$order_status_id));
			break;
			case 'delete':
				$$id = strip_tags($_POST['id']);

				$ordersController = new OrdersController();
				echo json_encode($ordersController-> delete($id));
				break;
		}
	}

	Class OrdersController{

		//Get a una orden
		public function getorder($id)
		{	
			$curl = curl_init();

			curl_setopt_array($curl, array(
			CURLOPT_URL => 'https://crud.jonathansoto.mx/api/orders/details/'.$id,
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

		//Get a todas las ordenes
		public function GetOrders()
		{	
			$curl = curl_init();

			curl_setopt_array($curl, array(
			CURLOPT_URL => 'https://crud.jonathansoto.mx/api/orders',
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

		//Get a las ordenes entre fechas
		public function GetOrdenDates($first_date,$second_date)
		{	
			$curl = curl_init();

			curl_setopt_array($curl, array(
			CURLOPT_URL => 'https://crud.jonathansoto.mx/api/orders/'.$first_date.'/'.$second_date,
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

		//Create una orden
		public function create($folio,$total,$is_paid,$client_id,$address_id,$order_status_id,
		$payment_type_id,$coupon_id,$presentations1_id,$presentations1_prices,$presentations2_id,$presentations2_prices)
		{	
			$curl = curl_init();

			curl_setopt_array($curl, array(
			CURLOPT_URL => 'https://crud.jonathansoto.mx/api/orders',
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_ENCODING => '',
			CURLOPT_MAXREDIRS => 10,
			CURLOPT_TIMEOUT => 0,
			CURLOPT_FOLLOWLOCATION => true,
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST => 'POST',
			CURLOPT_POSTFIELDS => array('folio' => $folio,'total' => $total,'is_paid' => $is_paid,'client_id' => $client_id,
			'address_id' => $address_id,'order_status_id' => $order_status_id,'payment_type_id' => $payment_type_id,'coupon_id' => $coupon_id,
			'presentations[0][id]' => $presentations1_id,'presentations[0][quantity]' => $presentations1_prices,
			'presentations[1][id]' => $presentations2_id,'presentations[1][quantity]' => $presentations2_prices),
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

		//Update una orden
		public function update($id,$order_status_id)
		{	
			$curl = curl_init();

			curl_setopt_array($curl, array(
			CURLOPT_URL => 'https://crud.jonathansoto.mx/api/orders',
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_ENCODING => '',
			CURLOPT_MAXREDIRS => 10,
			CURLOPT_TIMEOUT => 0,
			CURLOPT_FOLLOWLOCATION => true,
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST => 'PUT',
			CURLOPT_POSTFIELDS => 'id='.$id.'&order_status_id='.$order_status_id,
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

		//Delete una orden
		public function delete($id)
		{	
			$curl = curl_init();

			curl_setopt_array($curl, array(
			CURLOPT_URL => 'https://crud.jonathansoto.mx/api/orders/'.$id,
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