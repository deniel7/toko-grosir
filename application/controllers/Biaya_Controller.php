<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	
	date_default_timezone_set('Asia/Jakarta');	

	class Biaya_Controller extends MY_Controller {
		
		function __construct(){
			parent::__construct();
			$this->is_logged_in();
			$this->load->model('Biaya_model');
		}
		
		function get_list($msg) {
			$data['msg'] = $this->my_message($msg);
			$data['head_template'] = 'template/head_template_view';
			$data['head'] = 'biaya/head_view';
			$data['top_menu'] = 'template/top_menu_view';
			$data['left_menu'] = 'template/left_menu_view';
			$data['content'] = 'biaya/list_view';
			$data['footer'] = 'template/footer_view';
			
			$res = $this->Biaya_model->get_list();
			$data['row'] = "";

			foreach ($res as $r) {
				$data['row'] .= "<tr>
									<td>".$r->name."</td>
									<td>".$r->note."</td>
									<td>".$r->total."</td>
									<td>
										<div class='hidden-sm hidden-xs action-buttons'>
											<a class='green' href='".base_url()."biaya/edit/".$r->id."/0'>
												<i class='ace-icon fa fa-pencil bigger-130'></i>
											</a>

											<a class='red' href='".base_url()."biaya/delete/".$r->id."' id='btn_delete' onclick='return delete_confirm();'>
												<i class='ace-icon fa fa-trash-o bigger-130'></i>
											</a>
										</div>
									</td>
								</tr>";
			}

			$this->load->view('biaya/index', $data);
		}
			
		function add($msg) {
			$data['msg'] = $this->my_message($msg);
			$data['head_template'] = 'template/head_template_view';
			$data['head'] = 'biaya/head_view';
			$data['top_menu'] = 'template/top_menu_view';
			$data['left_menu'] = 'template/left_menu_view';
			$data['content'] = 'biaya/add_view';
			$data['footer'] = 'template/footer_view';

			$this->load->view('biaya/index', $data);
		}	
		
		public function add_exe(){
			$r = $this->Biaya_model->add_exe();
			if ($r=='1')
				$page = base_url() . 'biaya/add/1';
			else 
				$page = base_url() . 'biaya/add/4';

			redirect($page);
		}
		
		public function edit($id, $msg) {
			$data['msg'] = $this->my_message($msg);
			$data['head_template'] = 'template/head_template_view';
			$data['head'] = 'biaya/head_view';
			$data['top_menu'] = 'template/top_menu_view';
			$data['left_menu'] = 'template/left_menu_view';
			$data['content'] = 'biaya/edit_view';
			$data['footer'] = 'template/footer_view';
			
			$res = $this->Biaya_model->edit($id);
			
			$data['id'] = $res[0];
			$data['name'] = $res[1];
			$data['address'] = $res[2];
			$data['phone'] = $res[3];
			
			$this->load->view('biaya/index', $data);
		}

		public function edit_exe(){
			$r = $this->Biaya_model->edit_exe();
			$id = $this->input->post('txt_id');

			if ($r=='1')
				$page = base_url() . 'biaya/edit/'.$id.'/1';
			else 
				$page = base_url() . 'biaya/edit/'.$id.'/4';

			redirect($page);
		}

		public function delete($id){
			$r = $this->Biaya_model->delete($id);
			
			if ($r=='1')
				$page = base_url() . 'biaya/list/1';
			else 
				$page = base_url() . 'biaya/list/4';

			redirect($page);
		}

	}	
	

?>