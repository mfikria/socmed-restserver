<?php

	if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class User_model extends CI_Model {
		
		private $table = 'user';
		private $post_table = 'post';

		function __construct() {
			parent::__construct();
		}

		function get_all_users(){
			// Melakukan list semua user yang terdaftar
			$query = $this->db->get($this->table);
			$ret = $query->result_array();
			return $ret;
		}

		function create_user($user_data){
			// Membuat user baru
			$status = $this->db->insert($this->table, $user_data);

			return $status;
		}

		function get_user($id) {
			// Mendapatkan user dengan {id} tertentu
			$this->db->where('id', $id);
			$query = $this->db->get($this->table);
			$ret = $query->result_array();
			return $ret;
		}

		function update_user($id, $user_data) {
			// Melakukan update suatu user berdasarkan {id} user
			$status = $this->db->update($this->table, $user_data, array('id' => $id));

			return $status;
		}

		function delete_user($id) {
			// Menghapus user dengan {id} tertentu
			$this->db->where('id', $id);
			$status = $this->db->delete($this->table);

			return $status;
		}

		function is_user_exist($id) {
			// Mengecek apakah user dengan {id} tertentu ada di database
			$this->db->where('id',$id);
		    $query = $this->db->get($this->table);
		    if ($query->num_rows() > 0){
		        return true;
		    }
		    else{
		        return false;
		    }
		}

		function is_post_user_exist($user_id, $id) {
			// Mengecek apakah user dengan {id} tertentu ada di database
			$this->db->where('id',$id);
			$this->db->where('sosmeduserid',$user_id);
		    $query = $this->db->get($this->post_table);
		    if ($query->num_rows() > 0){
		        return true;
		    }
		    else{
		        return false;
		    }
		}

		function get_all_user_post($id) {
			// Mendapatkan semua post dari user dengan {id} tertentu
			$this->db->where('sosmeduserid',$id);
			$query = $this->db->get($this->post_table);
			$ret = $query->result_array();
			return $ret;
		}

		function create_user_post($id, $post_data) {
			// Membuat post untuk user dengan {id} tertentu
			
			$post_data_new = array_merge($post_data, array('sosmeduserid' => $id));
			$status = $this->db->insert($this->post_table, $post_data_new);

			return $status;
		}

		function delete_all_user_post($id) {
			// Menghapus semua post dari user dengan {id} tertentu
			$this->db->where('sosmeduserid', $id);
			$status = $this->db->delete($this->post_table);

			return $status;
		}

		function get_user_post($user_id, $id) {
			// Mendapatkan post dengan id = {id} dari user dengan {user_id} tertentu
			$this->db->where('sosmeduserid',$user_id);
			$this->db->where('id',$id);
			$query = $this->db->get($this->post_table);
			$ret = $query->result();
			return $ret;	
		}

		function update_user_post($user_id, $id, $post_data) {
			// Update post dengan id = {id} dari user dengan {user_id} tertentu
			$status = $this->db->update($this->post_table, $post_data, array('sosmeduserid' => $user_id, 'id' => $id));

			return $status;
		}

		function delete_user_post($user_id, $id) {
			// Menghapus post dengan id = {id} dari user dengan {user_id} tertentu
			$this->db->where('sosmeduserid', $user_id);
			$this->db->where('id', $id);
			$status = $this->db->delete($this->post_table);

			return $status;
		}

		function count_user_post($id) {
			// Menghitung jumlah post dari user dengan {id} tertentu
			$this->db->where('sosmeduserid',$id);
			$query = $this->db->get($this->post_table);
			$num = $query->num_rows();

			return $num;
		}

		function count_all_user() {
			// Menghitung jumlah semua user
			$query = $this->db->get($this->table);
			$num = $query->num_rows();

			return $num;
		}

	}

?>