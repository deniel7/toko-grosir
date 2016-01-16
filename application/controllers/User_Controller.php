<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	
	date_default_timezone_set('Asia/Jakarta');	

	class User_Controller extends MY_Controller {
		
		function __construct(){
			parent::__construct();
			$this->is_logged_in();
			$this->load->model('User_model');
		}
		
		function get_list($msg) {
			$data['msg'] = $this->my_message($msg);
			$data['head_template'] = 'template/head_template_view';
			$data['head'] = 'user/head_view';
			$data['top_menu'] = 'template/top_menu_view';
			$data['left_menu'] = 'template/left_menu_view';
			$data['content'] = 'user/list_view';
			$data['footer'] = 'template/footer_view';
			
			$res = $this->User_model->get_list();
			$data['row'] = "";

			foreach ($res as $r) {
				$data['row'] .= "<tr>
									<td>".$r->username."</td>
									<td>".$r->password."</td>
									<td>".$r->role."</td>
									<td>
										<div class='hidden-sm hidden-xs action-buttons'>
											<a class='green' href='".base_url()."user/edit/".$r->id."/0'>
												<i class='ace-icon fa fa-pencil bigger-130'></i>
											</a>

											<a class='red' href='".base_url()."user/delete/".$r->id."' id='btn_delete' onclick='return delete_confirm();'>
												<i class='ace-icon fa fa-trash-o bigger-130'></i>
											</a>
										</div>
									</td>
								</tr>";
			}

			$this->load->view('user/index', $data);
		}
			
		function add($msg) {
			$data['msg'] = $this->my_message($msg);
			$data['head_template'] = 'template/head_template_view';
			$data['head'] = 'user/head_view';
			$data['top_menu'] = 'template/top_menu_view';
			$data['left_menu'] = 'template/left_menu_view';
			$data['content'] = 'user/add_view';
			$data['footer'] = 'template/footer_view';

			$this->load->view('user/index', $data);
		}	
		
		public function add_exe(){
			$r = $this->User_model->add_exe();
			if ($r=='1')
				$page = base_url() . 'user/add/1';
			else 
				$page = base_url() . 'user/add/4';

			redirect($page);
		}
		
		public function edit($id, $msg) {
			$data['msg'] = $this->my_message($msg);
			$data['head_template'] = 'template/head_template_view';
			$data['head'] = 'user/head_view';
			$data['top_menu'] = 'template/top_menu_view';
			$data['left_menu'] = 'template/left_menu_view';
			$data['content'] = 'user/edit_view';
			$data['footer'] = 'template/footer_view';
			
			$res = $this->User_model->edit($id);
			
			$data['id'] = $res[0];
			$data['username'] = $res[1];
			$data['password'] = $res[2];
			$data['role'] = $res[3];
			
			$this->load->view('customer/index', $data);
		}

		public function edit_exe(){
			$r = $this->User_model->edit_exe();
			$id = $this->input->post('txt_id');

			if ($r=='1')
				$page = base_url() . 'user/edit/'.$id.'/1';
			else 
				$page = base_url() . 'user/edit/'.$id.'/4';

			redirect($page);
		}

		public function delete($id){
			$r = $this->User_model->delete($id);
			
			if ($r=='1')
				$page = base_url() . 'user/list/1';
			else 
				$page = base_url() . 'user/list/4';

			redirect($page);
		}

	}	
	

?>