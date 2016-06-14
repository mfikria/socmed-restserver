<?php

defined('BASEPATH') OR exit('No direct script access allowed');

// This can be removed if you use __autoload() in config.php OR use Modular Extensions
require APPPATH . '/libraries/REST_Controller.php';

class Post extends REST_Controller {

	function __construct() {
		// Construct the parent class
    	parent::__construct();
    }

    function posts_get() {
    	
    }


}

?>