<?php

defined('BASEPATH') OR exit('No direct script access allowed');

// This can be removed if you use __autoload() in config.php OR use Modular Extensions
require APPPATH . '/libraries/REST_Controller.php';

class User extends REST_Controller {

	function __construct() {
		// Construct the parent class
    	parent::__construct();
    }

    function index_get() {

    	// Mengambil id dari URI
    	$id = $this->get('id');

    	if($id === NULL) {
    		// GET /sosmedusers
    		// Melakukan list semua user yang terdaftar

    	} else if ($id >= 0) {
    		// GET /sosmedusers/{id}
    		// Mendapatkan user dengan {id} tertentu

    		// Cek keberadaan user dengan id tertentu
            if ($users)
            {
                // Kirim respon
                $this->response($users, REST_Controller::HTTP_OK); // OK (200)
            }
            else
            {
                // Kirim respon
                $this->response([
                    'status' => FALSE,
                    'message' => 'No users were found'
                ], REST_Controller::HTTP_NOT_FOUND); // NOT_FOUND (404)
            }

    	} else {
    		// URI tidak valid
    		// Kirim respon
                $this->response([
                    'status' => FALSE,
                    'message' => 'URI is not valid'
                ], REST_Controller::HTTP_NOT_FOUND); // NOT_FOUND (404)
    	}

    }

    function index_post() {
    	// POST /sosmedusers
    	// Membuat user baru

    }

    function index_put() {
    	// Mengambil id dari URI
    	$id = $this->get('id');

    	if($id === NULL) {
    		// URI tidak valid
    		// Kirim respon
                $this->response([
                    'status' => FALSE,
                    'message' => 'URI is not valid'
                ], REST_Controller::HTTP_NOT_FOUND); // NOT_FOUND (404)
    	} else {
    		// PUT /sosmedusers/{id}
    		// Melakukan update suatu user berdasarkan {id} user

    	}
    }

    function index_delete() {
    	// Mengambil id dari URI
    	$id = $this->get('id');

    	if($id === NULL) {
    		// URI tidak valid
    		// Kirim respon
                $this->response([
                    'status' => FALSE,
                    'message' => 'URI is not valid'
                ], REST_Controller::HTTP_NOT_FOUND); // NOT_FOUND (404)
    	} else {
    		// DELETE /sosmedusers/{id}
    		// Menghapus user dengan {id} tertentu
    		
    	}
    }

    function exists_get() {
    	// GET /sosmedusers/{id}/exists
    	// Mengecek apakah user dengan {id} tertentu ada di database

    }

    function posts_get() {
    	// GET /sosmedusers/{id}/posts
    	// Mendapatkan semua post dari user dengan {id} tertentu

    }

    function posts_post() {
    	// POST /sosmedusers/{id}/posts
    	// Membuat post untuk user dengan {id} tertentu

    }

    function posts_delete() {
    	// DELETE /sosmedusers/{id}/posts
    	// Menghapus semua post dari user dengan {id} tertentu
    
    }

    function postwithid_get() {
    	// GET /sosmedusers/{id}/posts/{fk}
    	// Mendapatkan post dengan id = {fk} dari user dengan {id} tertentu
    }

    function postwithid_put() {
    	// PUT /sosmedusers/{id}/posts/{fk}
    	// 	Update post dengan id = {fk} dari user dengan {id} tertentu
    	
    }

    function postwithid_delete() {
    	// DELETE /sosmedusers/{id}/posts/{fk}
    	// Menghapus post dengan id = {fk} dari user dengan {id} tertentu
    	
    }

    function countposts_get {
    	// GET /sosmedusers/{id}/posts/count
    	// Menghitung jumlah post dari user dengan {id} tertentu

    }

    function count_get() {
    	// GET /sosmedusers/count
    	// Menghitung jumlah semua user

    }

}

?>