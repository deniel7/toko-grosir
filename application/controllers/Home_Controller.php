<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	
	class Home_Controller extends MY_Controller {
		
		function __construct(){
			parent::__construct();
			$this->is_logged_in();
			

		}
		
		function index() {
			$data['head_template'] = 'template/head_template_view';
			$data['head'] = 'home/head_view';
			$data['top_menu'] = 'template/top_menu_view';
			$data['left_menu'] = 'template/left_menu_view';
			$data['content'] = 'home/content_view';
			$data['footer'] = 'template/footer_view';
			
			$this->load->view('home/index', $data);
		}
			
			
		
		
		
		
	}	
	

?>