<?php
	include "header_params.php";
	include "config.php";

	if (isset($_POST["action"])) {
		switch($_POST['action'])
		{
			case 'create':
				$name = strip_tags($_POST['name']);
				$slug = strip_tags($_POST['slug']);
				$description = strip_tags($_POST['description']);
				$features = strip_tags($_POST['features']);
				$brand_id = strip_tags($_POST['brand_id']);
				$categories_id_0 = strip_tags($_POST['categories[0]']);
				$categories_id_1 = strip_tags($_POST['categories[1]']);
				$tags_id_0 = strip_tags($_POST['tags[0]']);
				$tags_id_1 = strip_tags($_POST['tags[1]']);

				$productsController = new ProductsController();
				echo json_encode($productsController->create($name,$slug,$description,$features,$brand_id,$categories_id_0,$categories_id_1,$tags_id_0,$tags_id_1));
			break;
			case 'update':
				$name = strip_tags($_POST['name']);
				$slug = strip_tags($_POST['slug']);
				$description = strip_tags($_POST['description']);
				$features = strip_tags($_POST['features']);
				$brand_id = strip_tags($_POST['brand_id']);
				$id = strip_tags($_POST['id']);
				$categories_id_0 = strip_tags($_POST['categories[0]']);
				$categories_id_1 = strip_tags($_POST['categories[1]']);
				$tags_id_0 = strip_tags($_POST['tags[0]']);
				$tags_id_1 = strip_tags($_POST['tags[1]']);

				$productsController = new ProductsController();
				echo json_encode($productsController-> update($name,$slug,$description,$features,$brand_id,$id,$categories_id_0,$categories_id_1,$tags_id_0,$tags_id_1));
			break;
			case 'delete':
				$id = strip_tags($_POST['id']);
				
				$productsController = new ProductsController();
				echo json_encode($productsController->delete($id));
			break;
		}
	}

	Class ProductsController{

		//Create producto
		public function create($name,$slug,$description,$features,$brand_id,$categories_id_0,$categories_id_1,$tags_id_0,$tags_id_1)
		{
			$curl = curl_init();

			curl_setopt_array($curl, array(
			CURLOPT_URL => 'https://crud.jonathansoto.mx/api/products',
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_ENCODING => '',
			CURLOPT_MAXREDIRS => 10,
			CURLOPT_TIMEOUT => 0,
			CURLOPT_FOLLOWLOCATION => true,
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST => 'POST',
			CURLOPT_POSTFIELDS => array('name' => $name,'slug' => $slug,'description' => $description,'features' => $features,'brand_id' => $brand_id,'cover'=> new CURLFILE($_FILES['cover']['tmp_name']),'categories[0]' => $categories_id_0,'categories[1]' => $categories_id_0,'tags[0]' => $tags_id_0,'tags[1]' => $tags_id_1),
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

		//Update Producto
		public function update($name,$slug,$description,$features,$brand_id,$id,$categories_id_0,$categories_1_id,$tags_id_0,$tags_id_1)
		{
			$curl = curl_init();

			curl_setopt_array($curl, array(
			CURLOPT_URL => 'https://crud.jonathansoto.mx/api/products',
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_ENCODING => '',
			CURLOPT_MAXREDIRS => 10,
			CURLOPT_TIMEOUT => 0,
			CURLOPT_FOLLOWLOCATION => true,
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST => 'PUT',
			CURLOPT_POSTFIELDS => 'name='.$name.'&slug='.$slug.'&description='.$description.'&features='.$features.'&brand_id='.$brand_id.'&id='.$id.'&categories%5B0%5D='.$categories_id_0.'&categories%5B1%5D='.$categories_id_1.'&tags%5B0%5D='.$tags_id_0.'&tags%5B1%5D='.$tags_id_1,
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

		//Delete producto
		public function delete($id)
		{
			$curl = curl_init();

			curl_setopt_array($curl, array(
			CURLOPT_URL => 'https://crud.jonathansoto.mx/api/products/'.$id,
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