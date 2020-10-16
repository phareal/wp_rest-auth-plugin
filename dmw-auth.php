<?php

/*
Plugin Name: Dmw Auth
Description: A plugin for helping the registering through the api
Version: 1.0
Author: Dreamwear
Author URI: http://dreamwear.co
License: A "Slug" license name e.g. GPL2
*/

use Dreamwear\DreamwearRestEndpoint;

require 'vendor/autoload.php';



defined( 'ABSPATH' ) or die( 'No script kiddies please!' );


add_action('rest_api_init',function (){
   $dmwRestApi = new DreamwearRestEndpoint();
   $dmwRestApi->register_routes();
});

