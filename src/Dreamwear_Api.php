<?php


class Dreamwear_Api
{


    static $api_instance = null;



    public static function getInstance(){
        if (is_null(self::$api_instance)){
            self::$api_instance = new self();
        }
        return self::$api_instance;

    }

    public function __construct()
    {

    }




}
