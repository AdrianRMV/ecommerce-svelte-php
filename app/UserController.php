<?php 
	include "header_params.php";
	include "config.php";

    if (isset($_POST["action"])) {
			switch($_POST['action'])
			{
				case 'create':
					$name = strip_tags($_POST['name']);
					$lastname = strip_tags($_POST['lastname']);
					$email = strip_tags($_POST['email']);
					$phone = strip_tags($_POST['phone_number']);
					$password = strip_tags($_POST['password']);

					$userController = new UserController();
					echo json_encode($userController-> CreateUsers($name,$lastname,$email,$phone,$password));
				break;

				case 'updateUser':
					$name = strip_tags($_POST['name']);
                    $lastname = strip_tags($_POST['lastname']);
                    $email = strip_tags($_POST['email']);
                    $phone = strip_tags($_POST['phone_number']);
                    $password = strip_tags($_POST['password']);
                    $id = strip_tags($_POST['id']);

					$userController = new UserController();
					echo json_encode($userController->UpdateUser($name,$lastname,$email,$phone,$password,$id));
				break;

				case 'delete':
					$id = strip_tags($_POST['id']);
					
					$userController = new UserController();
					echo json_encode($userController->Delete($id));
				break;

                case 'updateAvatar':
					$id = strip_tags($_POST['id']);
					
					$userController = new UserController();
					$userController->UpdateAvatar($id);
				break;

			}

		}
	
    
    Class UserController{

        //Get all users
        public function Users()
        {
            $curl = curl_init();

            curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://crud.jonathansoto.mx/api/users',
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

            //  ---pendiente
        }

        //create users
        public function CreateUsers($name,$lastname,$email,$phone,$password)
        {
            $curl = curl_init();

            curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://crud.jonathansoto.mx/api/users',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => array('name' => $name ,'lastname' => $lastname,'email' => $email,'phone_number' => $phone,'created_by' => 'jonathan soto','role' => 'Administrador','password' => $password,'profile_photo_file'=> new CURLFILE(BASE_PATH.'public/images/users/user-dummy-img.jpg')),
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

        //Get one users
        public function GetUser($id)
        {
            $curl = curl_init();
            
            curl_setopt_array($curl, array(
              CURLOPT_URL => 'https://crud.jonathansoto.mx/api/users/'.$id,
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

                // pendiente....
        }


        //Update users
        public function UpdateUser($name,$lastname,$email,$phone,$password,$id)
        {
            $curl = curl_init();

            curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://crud.jonathansoto.mx/api/users',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'PUT',
            CURLOPT_POSTFIELDS => 'name='.$name.'&lastname='.$lastname.'&email='.$email.'&phone_number='.$phone.'&created_by=jonathan%20soto&role=Administrador&password='.$password.'&id='.$id,
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

        //delete
        public function Delete($id)
        {
            $curl = curl_init();

            curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://crud.jonathansoto.mx/api/users/'.$id,
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

        //UpdateAvatar
        public function UpdateAvatar($id)
        {
            $curl = curl_init();

            curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://crud.jonathansoto.mx/api/users/avatar',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => array('id' => $id,
            'profile_photo_file'=> new CURLFILE($_FILES['cover']['tmp_name'])),
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
    }
?>