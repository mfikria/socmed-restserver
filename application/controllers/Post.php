<?php

defined('BASEPATH') OR exit('No direct script access allowed');

// This can be removed if you use __autoload() in config.php OR use Modular Extensions
require APPPATH . '/libraries/REST_Controller.php';

class Post extends REST_Controller {

	function __construct() {
		// Construct the parent class
    	parent::__construct();
    	$this->load->model('post_model');
    }

    function index_get() {
    	// Mengambil id dari URI
    $id = $this->get('id');

    if($id === NULL) {
    		// GET /sosmedusers
    		// Melakukan list semua post yang terdaftar
        $posts = $this->post_model->get_all_post();
        if($posts){
            $this->response($posts, REST_Controller::HTTP_OK);
        } else{
                // Kirim respon
            $this->response([
                'status' => FALSE,
                'message' => 'No posts were found'
                ], REST_Controller::HTTP_NOT_FOUND); // NOT_FOUND (404)
        }
        

    } else if($id >= 0 && is_numeric($id)){
	// GET /sosmedusers/posts/{id}
	// Mendapatkan post dengan {id} tertentu
	// Cek keberadaan post dengan id tertentu
       
       $post = $this->post_model->get_post($id); 
       		if ($post) { // cek keberadaan post di database
                // Kirim respon
                $this->response($post, REST_Controller::HTTP_OK); // OK (200)
            }
            else
            {
                // Kirim respon
                $this->response([
                    'status' => FALSE,
                    'message' => 'No post was found'
                ], REST_Controller::HTTP_NOT_FOUND); // NOT_FOUND (404)
            }
        }
        else {
        // Kirim respon
            $this->response([
                'status' => FALSE,
                'message' => 'Invalid API Access'
            ], REST_Controller::HTTP_NOT_FOUND); // NOT_FOUND (404)   
        }

    }


}

?>