<?php 
	include "header_params.php";
	include "config.php";
	global $key_token;

	
	if (isset($_POST["action"])) {
			switch($_POST['action'])
			{
				case 'access':
					$email = strip_tags($_POST['email']);
					$password = strip_tags($_POST['password']);

					$authController = new AuthController();
					echo json_encode($authController->login($email,$password));
				break;

				case 'create':
					$name = strip_tags($_POST['name']);
					$lastname = strip_tags($_POST['lastname']);
					$email = strip_tags($_POST['email']);
					$phone = strip_tags($_POST['phone_number']);
					$password = strip_tags($_POST['password']);

					$authController = new AuthController();
					$authController-> register_user($name,$lastname,$email,$phone,$password);
				break;
			}
		}

	Class AuthController
	{
        //Funcion para inicio de sesion con el uso de E-mail y la contraseña
		public function login($email,$pwd)
		{
			$curl = curl_init();

			curl_setopt_array($curl, array(
			  CURLOPT_URL => 'https://crud.jonathansoto.mx/api/login',
			  CURLOPT_RETURNTRANSFER => true,
			  CURLOPT_ENCODING => '',
			  CURLOPT_MAXREDIRS => 10,
			  CURLOPT_TIMEOUT => 0,
			  CURLOPT_FOLLOWLOCATION => true,
			  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			  CURLOPT_CUSTOMREQUEST => 'POST',
			  CURLOPT_POSTFIELDS => array('email' => $email,'password' => $pwd), 
			));

			$response = curl_exec($curl); 
			curl_close($curl);
			$response = json_decode($response);

			if (isset($response->code) && $response->code > 0) { 
				global $key_token;
				$key_token = $response->data->token;
				return $response;
				
			}else{
				return false;	
			}
		}


        //Funcion para creacion de nuevo usuario
        public function register_user($name,$lastname,$email,$phone,$password)
        { 
            $curl = curl_init();

            curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://crud.jonathansoto.mx/api/register',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
			CURLOPT_POSTFIELDS => array(
				'name' => $name,
				'lastname' => $lastname,
				'email' => $email,
				'phone_number' => $phone,
				'created_by' => 'jonathan soto',
				'role' => 'Administrador',
				'password' => $password,
				'profile_photo_file'=>  new CURLFILE(($_FILES['cover']['tmp_name'])),
			)));

			$response = curl_exec($curl);
			curl_close($curl);
			$response = json_decode($response);

			if (isset($response->code) && $response->code > 0) {
				header("Location:".BASE_PATH);
			}else{
				return false;
			}
       	}
	}
