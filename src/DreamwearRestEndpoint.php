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
        $this->userController = new UserController();
        $this->shopController = new ShopController();
    }


    public function register_routes()
    {
       register_rest_route($this->namespace,'/login',[
           'methods'             => WP_REST_Server::CREATABLE,
           'callback'            => array($this->userController,'login'),
           'args'                => $this->get_collection_params(),
       ]);

       register_rest_route($this->namespace,'/register',[
           'methods'             => WP_REST_Server::CREATABLE,
           'callback'            => array($this->userController,'register'),
           'args'                => $this->get_collection_params(),
       ]);


       register_rest_route($this->namespace,'/user(?:/(?P<userId>\d+))?/profile',[
           'methods'=> WP_REST_Server::READABLE,
           'callback'=>array($this->userController,'getUserInfo'),
           'args'=>[
               'userId'
           ],
       ]);

       register_rest_route($this->namespace,'/user(?:/(?P<userId>\d+))?/profile/update',[
            'methods'=>WP_REST_Server::CREATABLE,
            'callback'=>array($this->userController,'updateProfile'),
            'args'=>$this->get_collection_params()
       ]);

        register_rest_route($this->namespace,'/users',[
            'methods'=>WP_REST_Server::READABLE,
            'callback'=>array($this->userController,'getAllUsers'),
            'args'=>$this->get_collection_params()
        ]);

        /*place for the woocommerce custom actions */

        register_rest_route($this->namespace,'/shop/categories/genders',[
            'methods'=>WP_REST_Server::READABLE,
            'callback'=>array($this->shopController,'retrieveCategoryAsGenders '),
            'args'=>$this->get_collection_params()
        ]);
        register_rest_route($this->namespace,'/shop/categories(?:/(?P<parentSlug>\w+))?/products(?:/(?P<childSlug>\w+))?',[
            'methods'=>WP_REST_Server::READABLE,
            'callback'=>array($this->shopController,'retrieveGendersSubCategory'),
            'args'=>$this->get_collection_params()
        ]);
    }




}
