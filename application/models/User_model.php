<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	
	date_default_timezone_set('Asia/Jakarta');	
	
	class User_model extends CI_Model {
		
		function __construct(){
			parent::__construct();
		}
		
		public function to_Ymd($date){
			$fmt = date('Y-m-d', strtotime($date));
			return $fmt;
		}

		public function login_exe() {
			$txt_username = $this->input->post('txt_username');
			$txt_pass = md5($this->input->post('txt_pass'));

			$sql = "SELECT * FROM mst_user WHERE username='$txt_username' AND password='$txt_pass' ";
			$q = $this->db->query($sql);

			if($q->num_rows()>=1){
				$sess_array = array();

				foreach($q->result() as $row){
					$sess_array = array(
						'username' => $row->username,
						'role' => $row->role
					);
					$this->session->set_userdata('logged_in', $sess_array);
				}
				return true;

			} else {
				return false;
			}
			
		}

	public function get_list(){
			$sql = "SELECT * 
					FROM mst_user";

			$query = $this->db->query($sql);
			return $query->result();
	}
		
	
	public function insert_user(){
			$txt_username = $this->input->post('txt_username');
            $txt_password = $this->input->post('txt_password');
            $txt_role = $this->input->post('txt_role');

			$data = array(
					   // 'id' => '',
					   'username' => $txt_username,
					   'password' => md5($txt_password),
					   'role' => $txt_role
					);
			
			$this->db->insert('mst_user', $data);
			return true;
		}

		public function add_exe(){
			if ($this->insert_user())
				return '1';
			else 
				return '0';
		}

		

		function edit($id){
			$sql = "SELECT * FROM mst_user WHERE id='$id' ";
			
			$exe = $this->db->query($sql);
			$ret = $exe->row();
			$arr = array(
							$ret->id, $ret->username, $ret->password, $ret->role
						);
			return $arr;
		}	

		public function edit_user(){
			$txt_id = $this->input->post('txt_id');
			$txt_username = $this->input->post('txt_username');
            $txt_password = $this->input->post('txt_password');
            $txt_role = $this->input->post('txt_role');

			$sql = "UPDATE mst_user 
					SET username='$txt_username', password='md5($txt_password)', role='$txt_role'
					WHERE id='$txt_id'
					";
			
			$this->db->query($sql);

			return true;
		}

		public function edit_exe(){
			if ($this->edit_user())
				return '1';
			else 
				return '0';
		}

		public function delete($id){
			$sql = "DELETE FROM mst_user WHERE id='$id' ";
			
			$r = $this->db->query($sql);

			if ($r)
				return 1;
			else 
				return 0;
		}


	}
	
	
	
	
?>