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
		
		


	}
	
	
	
	
?>