<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	
	date_default_timezone_set('Asia/Jakarta');	
	
	class Supplier_model extends CI_Model {
		
		function __construct(){
			parent::__construct();
		}
		
		public function to_Ymd($date){
			$fmt = date('Y-m-d', strtotime($date));
			return $fmt;
		}

		public function get_list(){
			$sql = "SELECT * 
					FROM mst_supplier";

			$query = $this->db->query($sql);
			return $query->result();
		}

		public function insert_supplier(){
			$txt_name = $this->input->post('txt_name');
            $txt_address = $this->input->post('txt_address');
            $txt_phone = $this->input->post('txt_phone');

			$data = array(
					   // 'id' => '',
					   'name' => $txt_name,
					   'address' => $txt_address,
					   'phone' => $txt_phone
					);
			
			$this->db->insert('mst_supplier', $data);
			return true;
		}

		public function add_exe(){
			if ($this->insert_supplier())
				return '1';
			else 
				return '0';
		}

		

		function edit($id){
			$sql = "SELECT * FROM mst_supplier WHERE id='$id' ";
			
			$exe = $this->db->query($sql);
			$ret = $exe->row();
			$arr = array(
							$ret->id, $ret->name, $ret->address, $ret->phone
						);
			return $arr;
		}	

		public function edit_supplier(){
			$txt_id = $this->input->post('txt_id');
			$txt_name = $this->input->post('txt_name');
            $txt_address = $this->input->post('txt_address');
            $txt_phone = $this->input->post('txt_phone');

			$sql = "UPDATE mst_supplier 
					SET name='$txt_name', address='$txt_address', phone='$txt_phone'
					WHERE id='$txt_id'
					";
			
			$this->db->query($sql);

			return true;
		}

		public function edit_exe(){
			if ($this->edit_supplier())
				return '1';
			else 
				return '0';
		}

		public function delete($id){
			$sql = "DELETE FROM mst_supplier WHERE id='$id' ";
			
			$r = $this->db->query($sql);

			if ($r)
				return 1;
			else 
				return 0;
		}


	}
	
	
	
	
?>