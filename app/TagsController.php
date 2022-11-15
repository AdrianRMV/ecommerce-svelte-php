<?php
	include "header_params.php";
	include "config.php";

	if (isset($_POST["action"])) {
		switch($_POST['action'])
		{
			case 'create':
				$name = strip_tags($_POST['name']);
				$description = strip_tags($_POST['description']);
				$slug = strip_tags($_POST['slug']);

				$tagsController = new TagsController();
				echo json_encode($tagsController->create($name,$description,$slug));
			break;
			case 'update':
				$name = strip_tags($_POST['name']);
				$description = strip_tags($_POST['description']);
				$slug = strip_tags($_POST['slug']);
				$id = strip_tags($_POST['id']);
				
				$tagsController = new TagsController();
				echo json_encode($tagsController->update($name,$description,$slug,$id));
			break;
			case 'delete':
				$id = strip_tags($_POST['id']);

				$tagsController = new TagsController();
				echo json_encode($tagsController->delete($id));
			break;
		}
	}

	Class TagsController{

		//Get a una etiqueta
		public function getTag($id)
		{	
			$curl = curl_init();

			curl_setopt_array($curl, array(
			CURLOPT_URL => 'https://crud.jonathansoto.mx/api/tags/'.$id,
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

		//Get a todas las etiqeutas
		public function getTags()
		{	
			$curl = curl_init();

			curl_setopt_array($curl, array(
			CURLOPT_URL => 'https://crud.jonathansoto.mx/api/tags',
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

		//Create a una etiqueta
		public function create($name,$description,$slug)
		{	
			$curl = curl_init();

			curl_setopt_array($curl, array(
			CURLOPT_URL => 'https://crud.jonathansoto.mx/api/tags',
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_ENCODING => '',
			CURLOPT_MAXREDIRS => 10,
			CURLOPT_TIMEOUT => 0,
			CURLOPT_FOLLOWLOCATION => true,
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST => 'POST',
			CURLOPT_POSTFIELDS => array('name' => $name,'description' => $description,'slug' => $slug),
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

		//Update a una etiqueta
		public function update($name,$description,$slug,$id)
		{	
			$curl = curl_init();

			curl_setopt_array($curl, array(
			CURLOPT_URL => 'https://crud.jonathansoto.mx/api/tags',
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_ENCODING => '',
			CURLOPT_MAXREDIRS => 10,
			CURLOPT_TIMEOUT => 0,
			CURLOPT_FOLLOWLOCATION => true,
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST => 'PUT',
			CURLOPT_POSTFIELDS => 'name='.$name.'&description='.$description.'&slug='.$slug.'&id='.$id,
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

		//Delete a una etiqueta
		public function delete($id)
		{	
			$curl = curl_init();

			curl_setopt_array($curl, array(
			CURLOPT_URL => 'https://crud.jonathansoto.mx/api/tags/'.$id,
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