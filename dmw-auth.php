<?php

/*
Plugin Name: Dmw A
Description: A plugin containing helpers for some rest api actions
Version: 1.0
Author: POTCHONA Essosolam Justin
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

