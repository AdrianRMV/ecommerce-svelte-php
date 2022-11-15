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

				$categoriesController = new CategoriesController();
				echo json_encode($categoriesController->create($name,$description,$slug));
			break;
            case 'update':
				$id = strip_tags($_POST['id']);
                $name = strip_tags($_POST['name']);
                $description = strip_tags($_POST['description']);
                $slug = strip_tags($_POST['slug']);
                $category_id = strip_tags($_POST['category_id']);

				$categoriesController = new CategoriesController();
				echo json_encode($categoriesController->update($id,$name,$description,$slug,$category_id));
			break;
            case 'delete':
				$id = strip_tags($_POST['id']);

				$categoriesController = new CategoriesController();
				echo json_encode($categoriesController->delete($id));
			break;
		}
	}

	Class CategoriesController{

		//Get una categoria
		public function getCategory($id)
		{	
            
            $curl = curl_init();
            
            curl_setopt_array($curl, array(
              CURLOPT_URL => 'https://crud.jonathansoto.mx/api/categories/'.$id,
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

        //Get todas las categorias
		public function getCategories()
		{	
            $curl = curl_init();

            curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://crud.jonathansoto.mx/api/categories',
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

        //Create a categoria
		public function create($name,$description,$slug)
		{	
            $curl = curl_init();

            curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://crud.jonathansoto.mx/api/categories',
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

        //Update a categoria
		public function update($id,$name,$description,$slug,$category_id)
		{	
            $curl = curl_init();

            curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://crud.jonathansoto.mx/api/categories',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'PUT',
            CURLOPT_POSTFIELDS => 'id='.$id.'&name='.$name.'&description='.$description.'&slug='.$slug.'&category_id='.$category_id,
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
                // header('Location:' . $_SERVER['HTTP_REFERER']);
                exit;
       	 	}else{
				return false;
			}

		}

        //Delete a categoria
		public function delete($id)
		{	
            $curl = curl_init();

            curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://crud.jonathansoto.mx/api/categories/'.$id,
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
