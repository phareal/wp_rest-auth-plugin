<?php

namespace Dreamwear;

use WP_REST_Controller;
use WP_REST_Server;

class DreamwearRestEndpoint extends  WP_REST_Controller
{


    public function __construct()
    {

        $this->namespace = 'dreamwear/v1';
        $this->rest_base = 'dreamwear';
        $this->auth = new Authentication();
    }


    public function register_routes()
    {
       register_rest_route($this->namespace,'/login',[
           'methods'             => WP_REST_Server::CREATABLE,
           'callback'            => array($this->auth,'login'),
           'args'                => $this->get_collection_params(),
       ]);

       register_rest_route($this->namespace,'/register',[
           'methods'             => WP_REST_Server::CREATABLE,
           'callback'            => array($this->auth,'register'),
           'args'                => $this->get_collection_params(),
       ]);
    }




}
