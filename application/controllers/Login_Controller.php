<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	
	class Login_Controller extends MY_Controller {
		
		function __construct(){
			parent::__construct();
		}
		
		
		function index() {
			$this->load->view('login/login_view');
			
		}
		
		function login_exe(){
			$this->load->model('User_model');
			$res = $this->User_model->login_exe();
			
			if ($res)
				redirect('home');
			else 
				redirect('login');
			
		}
		
		function logout() {
			$this->session->unset_userdata('logged_in');
			session_destroy();
			redirect('login', 'refresh');
		}
		
		
		
	}

?>