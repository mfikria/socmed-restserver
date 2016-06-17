<?php

class Post_model extends CI_Model {
	
	private $table = 'post';

	function __construct(){
		parent::__construct();
	}

	function get_all_post() {
		// Melakukan list semua post yang ada
		$query = $this->db->get($this->table);
		$ret = $query->result_array();
		return $ret;
	}
	
	function get_post($id) {
		// Mengambil data post dengan post id {id} tertentu
		$this->db->where('id', $id);
		$query = $this->db->get($this->table);
		$ret = $query->result();
		return $ret;
	}
}

?>