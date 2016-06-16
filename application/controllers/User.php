<?php

defined('BASEPATH') OR exit('No direct script access allowed');

// This can be removed if you use __autoload() in config.php OR use Modular Extensions
require APPPATH . '/libraries/REST_Controller.php';

class User extends REST_Controller {

    function __construct() {
        // Construct the parent class
        parent::__construct();
        $this->load->model('user_model');
    }

    function index_get() {

        // Mengambil id dari URI
        $id = $this->get('id');

        if($id === NULL) {
            // GET /sosmedusers
            // Melakukan list semua user yang terdaftar
            $users = $this->user_model->get_all_users();
            if($users){
                $this->response($users, REST_Controller::HTTP_OK);
            } else{
                // Kirim respon
                $this->response([
                    'status' => FALSE,
                    'message' => 'No users were found'
], REST_Controller::HTTP_NOT_FOUND); // NOT_FOUND (404)
            }


        } else if($id >= 0 && is_numeric($id)){
            // GET /sosmedusers/{id}
            // Mendapatkan user dengan {id} tertentu
            // Cek keberadaan user dengan id tertentu

            $user = $this->user_model->get_user($id); 
            if ($user) { // cek keberadaan user di database
                // Kirim respon
                $this->response($user, REST_Controller::HTTP_OK); // OK (200)
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
    // Kirim respon
            $this->response([
                'status' => FALSE,
                'message' => 'Invalid API Access'
    ], REST_Controller::HTTP_NOT_FOUND); // NOT_FOUND (404)   
        }

    }

    function index_post() {
    // POST /sosmedusers
    // Membuat user baru

        $input = array(
            'email' => $this->post('email'),
            'password' => $this->post('password'),
            'name' => $this->post('name'),
            'address' => $this->post('address'),
            'telp' => $this->post('telp')
            );

        if($this->is_valid_user_data($input)){
            $result = $this->user_model->create_user($input);
            if($result) {
                $response = array_merge($input, array('id' => $this->db->insert_id()));
                $this->response($response, REST_Controller::HTTP_OK);
            } else {
                $this->response([
                    'status' => FALSE,
                    'message' => 'Inserting data failed'
], REST_Controller::HTTP_BAD_REQUEST); // BAD_REQUEST (400)
            }
        } else {
            $this->response([
                'status' => FALSE,
                'message' => 'Incomplete JSON Data'
], REST_Controller::HTTP_METHOD_NOT_ALLOWED); // NOT_ALLOWED (405)
        }

    }

    function index_put($id) {
    // PUT /sosmedusers/{id}
    // Melakukan update suatu user berdasarkan {id} user

        $id = $this->get('id');

        if($id != NULL && is_numeric($id)) {
            if($this->user_model->is_user_exist($id)) {
                $input = array(
                    'email' => $this->post('email'),
                    'password' => $this->post('password'),
                    'name' => $this->post('name'),
                    'address' => $this->post('address'),
                    'telp' => $this->post('telp')
                    );
                if($this->is_valid_user_data($input)) {
                    $result = $this->user_model->update_user($id, $input);
                    if($result) {
                        $output = array_merge($input, array('id' => $id));
                        $this->response($output, REST_Controller::HTTP_OK);

                    } else {
                        $this->response([
                            'status' => FALSE,
                            'message' => 'Updating user failed'
], REST_Controller::HTTP_BAD_REQUEST); // BAD_REQUEST (400)
                    }
                } else {
                    $this->response([
                        'status' => FALSE,
                        'message' => 'Incomplete JSON Data'
], REST_Controller::HTTP_METHOD_NOT_ALLOWED); // NOT_ALLOWED (405)
                }
            } else {
            // Kirim respon
                $this->response([
                    'status' => FALSE,
                    'message' => 'User was not found'
], REST_Controller::HTTP_NOT_FOUND); // NOT_FOUND (404) 
            }
        } else {
        // Kirim respon
            $this->response([
                'status' => FALSE,
                'message' => 'URI is not valid'
], REST_Controller::HTTP_NOT_FOUND); // NOT_FOUND (404)  
        }
    }

    function index_delete($id) {
    // Mengambil id dari URI
        $id = $this->get('id');

        if($id === NULL || !is_numeric($id)) {
        // URI tidak valid
        // Kirim respon
            $this->response([
                'status' => FALSE,
                'message' => 'URI is not valid'
], REST_Controller::HTTP_NOT_FOUND); // NOT_FOUND (404)
        } else {
        // DELETE /sosmedusers/{id}
        // Menghapus user dengan {id} tertentu
            if($this->user_model->is_user_exist($id)) {
                $result = $this->user_model->delete_user($id);
                if($result) {
                    $this->response([
                        'status' => TRUE,
                        'message' => 'Deleting user ' + $id + ' success'
], REST_Controller::HTTP_OK); // OK (200)

                } else {
                    $this->response([
                        'status' => FALSE,
                        'message' => 'Deleting user was failed'
], REST_Controller::HTTP_BAD_REQUEST); // BAD_REQUEST (400)
                }
            } else {
// Kirim respon
                $this->response([
                    'status' => FALSE,
                    'message' => 'User was not found'
], REST_Controller::HTTP_NOT_FOUND); // NOT_FOUND (404)
            }
        }
    }

    function exists_get() {
    // GET /sosmedusers/{id}/exists
    // Mengecek apakah user dengan {id} tertentu ada di database
        $id = $this->get('id');
        $result = $this->user_model->is_user_exist($id);
        if($result) {
            $response = array('exists' => true);
            $this->response($response, REST_Controller::HTTP_OK);
        } else {
            $response = array('exists' => false);
            $this->response($response, REST_Controller::HTTP_NOT_FOUND);
        }
    }

    function posts_get($id) {
    // GET /sosmedusers/{id}/posts
    // Mendapatkan semua post dari user dengan {id} tertentu
        $id = $this->get('id');
        if($id === NULL || !is_numeric($id)) {
        // URI tidak valid
        // Kirim respon
            $this->response([
                'status' => FALSE,
                'message' => 'URI is not valid'
], REST_Controller::HTTP_NOT_FOUND); // NOT_FOUND (404)
        } else {
            if($this->user_model->is_user_exist($id)) {
                $response = $this->user_model->get_all_user_post($id);
                $this->response($response, REST_Controller::HTTP_OK);
            } else {
            // Kirim respon
                $this->response([
                    'status' => FALSE,
                    'message' => 'User was not found'
], REST_Controller::HTTP_NOT_FOUND); // NOT_FOUND (404)
            }       
        }
    }

    function posts_post() {
    // POST /sosmedusers/{id}/posts
    // Membuat post untuk user dengan {id} tertentu
        $id = $this->get('id');

        if($id === NULL || !is_numeric($id)) {
        // URI tidak valid
        // Kirim respon
            $this->response([
                'status' => FALSE,
                'message' => 'URI is not valid'
], REST_Controller::HTTP_NOT_FOUND); // NOT_FOUND (404)
        } else {
            if($this->user_model->is_user_exist($id)) {
                $input = array(
                    'date' => $this->post('date'),
                    'text' => $this->post('text'),
                    );
                if($this->is_valid_post_data($input)) {
                    $result = $this->user_model->create_user_post($id, $input);
                    if($result) {
                        $response = array_merge($input, array('sosmeduserid' => $id, 'id' => $this->db->insert_id()));
                        $this->response($response, REST_Controller::HTTP_OK);
                    } else {
                        $this->response([
                            'status' => FALSE,
                            'message' => 'URI is not valid'
], REST_Controller::HTTP_NOT_FOUND); // NOT_FOUND (404) 
                    }
                } else {
                    $this->response([
                        'status' => FALSE,
                        'message' => 'Incomplete JSON Data'
], REST_Controller::HTTP_METHOD_NOT_ALLOWED); // NOT_ALLOWED (405)
                }
            } else {
            // Kirim respon
                $this->response([
                    'status' => FALSE,
                    'message' => 'User was not found'
], REST_Controller::HTTP_NOT_FOUND); // NOT_FOUND (404)
            }
        }
    }

    function posts_delete($id) {
    // DELETE /sosmedusers/{id}/posts
    // Menghapus semua post dari user dengan {id} tertentu
        $id = $this->get('id');
        if($this->user_model->is_user_exist($id)) {
            $result = $this->user_model->delete_all_user_post($id);
            if($result) {
                $this->response([
                    'status' => TRUE,
                    'message' => 'Deleting post success'
], REST_Controller::HTTP_OK); // OK (200)

            } else {
                $this->response([
                    'status' => FALSE,
                    'message' => 'Deleting post was failed'
], REST_Controller::HTTP_BAD_REQUEST); // BAD_REQUEST (400)
            }
        } else {
        // Kirim respon
            $this->response([
                'status' => FALSE,
                'message' => 'User was not found'
], REST_Controller::HTTP_NOT_FOUND); // NOT_FOUND (404)
        }

    }

    function postwithid_get() {
    // GET /sosmedusers/{id}/posts/{fk}
    // Mendapatkan post dengan id = {fk} dari user dengan {id} tertentu
        $user_id = $this->uri->segment(2);
        $id = $this->uri->segment(4); 

        if(is_numeric($user_id) && is_numeric($id)) {
            $result = $this->user_model->get_user_post($user_id, $id);
            if($result) {
                $this->response($result, REST_Controller::HTTP_OK);
            } else {
                $this->response([
                    'status' => FALSE,
                    'message' => 'Post was not found'
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

    function postwithid_put() {
    // PUT /sosmedusers/{id}/posts/{fk}
    //  Update post dengan id = {fk} dari user dengan {id} tertentu
        $user_id = $this->uri->segment(2);
        $id = $this->uri->segment(4);

        if(is_numeric($user_id) && is_numeric($id)) {
            if($this->user_model->is_post_user_exist($user_id, $id)) {
                $input = array(
                    'date' => $this->put('date'),
                    'text' => $this->put('text'),
                    );
                if($this->is_valid_post_data($input)) {
                    $result = $this->user_model->update_user_post($user_id, $id, $input);
                    if($result) {
                        $response = array_merge($input, array('sosmeduserid' => $user_id, 'id' => $id));
                        $this->response($response, REST_Controller::HTTP_OK);
                    }
                } else {
                    $this->response([
                        'status' => FALSE,
                        'message' => 'Incomplete JSON Data'
], REST_Controller::HTTP_METHOD_NOT_ALLOWED); // NOT_ALLOWED (405)
                }


            } else {
                $this->response([
                    'status' => FALSE,
                    'message' => 'Post was not found'
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

    function postwithid_delete() {
    // DELETE /sosmedusers/{id}/posts/{fk}
    // Menghapus post dengan id = {fk} dari user dengan {id} tertentu
        $user_id = $this->uri->segment(2);
        $id = $this->uri->segment(4);

        if(is_numeric($user_id) && is_numeric($id)) {
            if($this->user_model->is_post_user_exist($user_id, $id)) {
                $result = $this->user_model->delete_user_post($user_id, $id);
                if($result) {
                    $this->response([
                        'status' => TRUE,
                        'message' => 'Deleting post id:' + $id + ' with user id: ' + $user_id + ' success'
], REST_Controller::HTTP_OK); // OK (200)

                } else {
                    $this->response([
                        'status' => FALSE,
                        'message' => 'Deleting post was failed'
], REST_Controller::HTTP_BAD_REQUEST); // BAD_REQUEST (400)
                }
            } else {
                $this->response([
                    'status' => FALSE,
                    'message' => 'Post was not found'
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

    function countposts_get($id) {
    // GET /sosmedusers/{id}/posts/count
    // Menghitung jumlah post dari user dengan {id} tertentu
        $id = $this->get('id');

        if($id === NULL || !is_numeric($id)) {
        // URI tidak valid
        // Kirim respon
            $this->response([
                'status' => FALSE,
                'message' => 'URI is not valid'
], REST_Controller::HTTP_NOT_FOUND); // NOT_FOUND (404)
        } else {
            if($this->user_model->is_user_exist($id)) {
                $result = $this->user_model->count_user_post($id);
                $response = array('count' => $result);
                $this->response($response, REST_Controller::HTTP_OK);

            } else {
            // Kirim respon
                $this->response([
                    'status' => FALSE,
                    'message' => 'User was not found'
                ], REST_Controller::HTTP_NOT_FOUND); // NOT_FOUND (404)
            }
        }
    }

    function count_get() {
    // GET /sosmedusers/count
    // Menghitung jumlah semua user
        $result = $this->user_model->count_all_user();
        $response = array('count' => $result);
        $this->response($response, REST_Controller::HTTP_OK);
    }

    private function is_valid_user_data($input) {
        return isset($input['email']) &&  isset($input['password']) &&  isset($input['name']) &&  isset($input['address']) &&  isset($input['telp']);
    }

    private function is_valid_post_data($input) {
        return isset($input['date']) &&  isset($input['text']);
    }

}

?>