<?php


namespace Dreamwear;

use PHPMailer\PHPMailer\Exception;

class Authentication
{

    public function login(\WP_REST_Request  $request){

        if (!$this->checkExistingUser($request->get_param('username'))){
            return wp_send_json_error([
                'message_fr'=>"Aucun utilisateur n'a été trouvé ",
                'message_eng'=>"No user found"
            ]);
        }else{

            $loginStatus = wp_authenticate($request->get_param('username'),$request->get_param('password'));


            if ($loginStatus->has_errors()){
                return wp_send_json_error([
                    'message'=>$loginStatus->get_error_message()
                ]);
            }else{
                $response = json_decode(json_encode($loginStatus->data));
                unset($response->user_activation_key);
                unset($response->user_status);
                unset($response->user_pass);
                unset($response->user_url);
                unset($response->user_nicename);
                return wp_send_json_success($response);
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
                return wp_send_json_success([
                    'id'=>$registerStatus,
                    'message'=>"l'inscription s'est déroulé avec succès"
                ]);
            }

        }
        else {
            return wp_send_json_error([
                'message_fr'=>"Ce nom d'utilisateur ou email est déja utilisé ",
            ]);
        }

    }

}
