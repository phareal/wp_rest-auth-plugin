<?php


namespace Dreamwear;

use PHPMailer\PHPMailer\Exception;

class UserController
{

    public function login(\WP_REST_Request  $request){

        if (!$this->checkExistingUser($request->get_param('email'))){
            return wp_send_json_error([
                'message'=>"Aucun utilisateur n'a été trouvé ",
            ]);
        }else{

            $loginStatus = wp_authenticate($request->get_param('email'),$request->get_param('password'));

            if (!is_null($loginStatus) && $loginStatus->has_errors()){
                return wp_send_json_error([
                    'message'=>$loginStatus->get_error_message()
                ]);
            } else{
                $response = json_decode(json_encode($loginStatus->data));
                unset($response->user_activation_key);
                unset($response->user_status);
                unset($response->user_pass);
                unset($response->user_url);
                unset($response->user_nicename);
                return wp_send_json_success(
                    $response);
            }
        }

    }

    public function checkExistingUser($username){

        if (username_exists($username) || email_exists($username)){
            return  true;
        }else{
            return  false;
        }
    }


    public function register(\WP_REST_Request  $request){

        if (!$this->checkExistingUser($request->get_param('email')))
        {
            $password =  Utils::random_password();
            $headers = array('Content-Type: text/html; charset=UTF-8');
            $registerStatus = wp_create_user($request->get_param('email'),$password,$request->get_param('email'));


            if (!is_int($registerStatus) && $registerStatus->has_errors() ){


                return wp_send_json_error([
                    'message'=>$registerStatus->get_error_message()
                ]);
            }else{
                $emailSent = wp_mail($request->get_param('email'),'Notification de création de compte',
                    Utils::generateHtmlTemplate($request->get_param('email'),
                        $password),$headers);
                return wp_send_json_success([
                    'id'=>$registerStatus,
                    'message'=>"l'inscription s'est déroulé avec succès"
                ]);
            }

        }
        else {
            return wp_send_json_error([
                'message'=>"Ce nom d'utilisateur ou email est déja utilisé ",
            ]);
        }

    }


    public function getUserInfo($params){
        $userId = $params['userId'];
        $userInfo = get_userdata($userId);

        return wp_send_json_success([
            'type'=>'USER_PROFILE_DATA',
            'user'=>$userInfo
        ]);
    }

    public function updateProfile(\WP_REST_Request  $request){
        //recuperer les fields
        //on verifie les champs qui sont vides
        // et on update le champs en question
        //dans le cadre ou c'est le mdp qui est renseigné alors on deconnecte l'utilisateur et il devra se reconnecter
        $userId = (int) $request->get_param('user_id');

        $userData = $request->get_param('userData');


        return wp_send_json($userData);

    }



    public function getAllUsers(){

        return wp_send_json(get_users());
    }





}
