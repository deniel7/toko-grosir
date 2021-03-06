<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	
	date_default_timezone_set('Asia/Jakarta');	

	class Piutang_Controller extends MY_Controller {
		
		function __construct(){
			parent::__construct();
			$this->is_logged_in();
			$this->load->model('Piutang_model');
		}
		
		function get_list($msg) {
			$data['msg'] = $this->my_message($msg);
			$data['head_template'] = 'template/head_template_view';
			$data['head'] = 'piutang/head_view';
			$data['top_menu'] = 'template/top_menu_view';
			$data['left_menu'] = 'template/left_menu_view';
			$data['content'] = 'piutang/list_view';
			$data['footer'] = 'template/footer_view';
			
			$res = $this->Piutang_model->get_list();
			$data['row'] = "";

			foreach ($res as $r) {
				if ($r->status=='1')
					$status = 'L';
				else 
					$status = 'BL';
				
				$data['row'] .= "<tr>
									<td>".$r->sales_no."</td>
									<td>".$r->name."</td>
									<td>".$r->date."</td>
									<td>".$r->due_date."</td>
									<td>".$r->total."</td>
									<td>".$status."</td>
									
								</tr>";
			}

			$this->load->view('piutang/index', $data);
		}
			
		function add($msg) {
			$data['msg'] = $this->my_message($msg);
			$data['head_template'] = 'template/head_template_view';
			$data['head'] = 'piutang/head_view';
			$data['top_menu'] = 'template/top_menu_view';
			$data['left_menu'] = 'template/left_menu_view';
			$data['content'] = 'piutang/add_view';
			$data['footer'] = 'template/footer_view';

			$this->load->view('piutang/index', $data);
		}	
		
		public function add_exe(){
			$r = $this->Piutang_model->add_exe();
			if ($r=='1')
				$page = base_url() . 'piutang/add/1';
			else 
				$page = base_url() . 'piutang/add/4';

			redirect($page);
		}
		
		public function edit($id, $msg) {
			$data['msg'] = $this->my_message($msg);
			$data['head_template'] = 'template/head_template_view';
			$data['head'] = 'piutang/head_view';
			$data['top_menu'] = 'template/top_menu_view';
			$data['left_menu'] = 'template/left_menu_view';
			$data['content'] = 'piutang/edit_view';
			$data['footer'] = 'template/footer_view';
			
			$res = $this->Piutang_model->edit($id);
			
			$data['id'] = $res[0];
			$data['name'] = $res[1];
			$data['address'] = $res[2];
			$data['phone'] = $res[3];
			
			$this->load->view('piutang/index', $data);
		}

		public function edit_exe(){
			$r = $this->Piutang_model->edit_exe();
			$id = $this->input->post('txt_id');

			if ($r=='1')
				$page = base_url() . 'piutang/edit/'.$id.'/1';
			else 
				$page = base_url() . 'piutang/edit/'.$id.'/4';

			redirect($page);
		}

		public function delete($id){
			$r = $this->Piutang_model->delete($id);
			
			if ($r=='1')
				$page = base_url() . 'piutang/list/1';
			else 
				$page = base_url() . 'piutang/list/4';

			redirect($page);
		}

	}	
	

?>