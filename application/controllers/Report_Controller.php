<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	
	date_default_timezone_set('Asia/Jakarta');	

	class Report_Controller extends MY_Controller {
		
		function __construct(){
			parent::__construct();
			$this->is_logged_in();
			$this->load->model('Report_model');
		}
		
		
			
		function select_transaction_report($msg) {
			$data['msg'] = $this->my_message($msg);
			$data['head_template'] = 'template/head_template_view';
			$data['head'] = 'report/head_view';
			$data['top_menu'] = 'template/top_menu_view';
			$data['left_menu'] = 'template/left_menu_view';
			$data['content'] = 'report/transaction_report_view';
			$data['footer'] = 'template/footer_view';

			$data['from'] = date('01-m-Y');
			$data['to'] = date('t-m-Y');

			$this->load->view('report/index', $data);
		}	
		
		public function add_exe(){
			$r = $this->Report_model->add_exe();
			if ($r=='1')
				$page = base_url() . 'report/add/1';
			else 
				$page = base_url() . 'report/add/4';

			redirect($page);
		}
		
		public function edit($id, $msg) {
			$data['msg'] = $this->my_message($msg);
			$data['head_template'] = 'template/head_template_view';
			$data['head'] = 'report/head_view';
			$data['top_menu'] = 'template/top_menu_view';
			$data['left_menu'] = 'template/left_menu_view';
			$data['content'] = 'report/edit_view';
			$data['footer'] = 'template/footer_view';
			
			$res = $this->Report_model->edit($id);
			
			$data['id'] = $res[0];
			$data['name'] = $res[1];
			$data['address'] = $res[2];
			$data['phone'] = $res[3];
			
			$this->load->view('report/index', $data);
		}

		public function edit_exe(){
			$r = $this->Report_model->edit_exe();
			$id = $this->input->post('txt_id');

			if ($r=='1')
				$page = base_url() . 'report/edit/'.$id.'/1';
			else 
				$page = base_url() . 'report/edit/'.$id.'/4';

			redirect($page);
		}

		public function delete($id){
			$r = $this->Report_model->delete($id);
			
			if ($r=='1')
				$page = base_url() . 'report/list/1';
			else 
				$page = base_url() . 'report/list/4';

			redirect($page);
		}

	}	
	

?>