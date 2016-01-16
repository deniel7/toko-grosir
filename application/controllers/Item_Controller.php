<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	
	date_default_timezone_set('Asia/Jakarta');	

	class Item_Controller extends MY_Controller {
		
		function __construct(){
			parent::__construct();
			$this->is_logged_in();
			$this->load->model('Item_model');
		}
		
		function get_list($msg) {
			$data['msg'] = $this->my_message($msg);
			$data['head_template'] = 'template/head_template_view';
			$data['head'] = 'item/head_view';
			$data['top_menu'] = 'template/top_menu_view';
			$data['left_menu'] = 'template/left_menu_view';
			$data['content'] = 'item/list_view';
			$data['footer'] = 'template/footer_view';
			
			$res = $this->Item_model->get_list();
			$data['row'] = "";

			foreach ($res as $r) {
				$unit_name = $this->get_unit_name($r->unit);

				$data['row'] .= "<tr>
									<td>".$r->code."</td>
									<td>".$r->name."</td>
									<td>".$unit_name . ' / ' . $r->unit_qty."</td>
									<td>".$r->stock."</td>
									<td>".$r->buy_price."</td>
									<td>".$r->store_price."</td>
									<td>".$r->canvas_price."</td>
									<td>".$r->motoris_price."</td>
									<td>
										<div class='hidden-sm hidden-xs action-buttons'>
											<a class='green' href='".base_url()."item/edit/".$r->code."/0'>
												<i class='ace-icon fa fa-pencil bigger-130'></i>
											</a>

											<a class='red' href='".base_url()."item/delete/".$r->code."' id='btn_delete' onclick='return delete_confirm();'>
												<i class='ace-icon fa fa-trash-o bigger-130'></i>
											</a>
										</div>
									</td>
								</tr>";
			}

			$this->load->view('item/index', $data);
		}
		
		function get_unit_name($id){
			switch ($id) {
			 	case '1' : $name = 'CRT'; break;
			 	case '2' : $name = 'Box'; break;
			 	default  : $name = 'undefined'; ;break;
			} 
			return $name;
		}	

		function add($msg) {
			$data['msg'] = $this->my_message($msg);
			$data['head_template'] = 'template/head_template_view';
			$data['head'] = 'item/head_view';
			$data['top_menu'] = 'template/top_menu_view';
			$data['left_menu'] = 'template/left_menu_view';
			$data['content'] = 'item/add_view';
			$data['footer'] = 'template/footer_view';

			$this->load->view('item/index', $data);
		}	
		
		public function add_exe(){
			$r = $this->Item_model->add_exe();
			if ($r=='1')
				$page = base_url() . 'item/add/1';
			else 
				$page = base_url() . 'item/add/4';

			redirect($page);
		}
		
		public function edit($id, $msg) {
			$data['msg'] = $this->my_message($msg);
			$data['head_template'] = 'template/head_template_view';
			$data['head'] = 'item/head_view';
			$data['top_menu'] = 'template/top_menu_view';
			$data['left_menu'] = 'template/left_menu_view';
			$data['content'] = 'item/edit_view';
			$data['footer'] = 'template/footer_view';
			
			$res = $this->Item_model->edit($id);
		/*	$ret->code, $ret->name, $ret->unit, $ret->unit_qty,
							$ret->stock, $ret->buy_price, $ret->store_price, $ret->canvas_price,
							$ret->motoris_price, $ret->active, $ret->create_by, $ret->create_at,
							$ret->update_by, $ret->update_at
							*/
			$data['code'] = $res[0];
			$data['name'] = $res[1];
			$data['unit'] = $res[2];
			$data['unit_qty'] = $res[3];
			$data['stock'] = $res[4];
			$data['buy_price'] = $res[5];
			$data['store_price'] = $res[6];
			$data['canvas_price'] = $res[7];
			$data['motoris_price'] = $res[8];
			$data['active'] = $res[9];
			$data['create_by'] = $res[10];
			$data['create_at'] = $res[11];
			$data['update_at'] = $res[12];
			$data['update_by'] = $res[13];
			
			$this->load->view('item/index', $data);
		}

		public function edit_exe(){
			$r = $this->Item_model->edit_exe();
			$txt_code = $this->input->post('txt_code');

			if ($r=='1')
				$page = base_url() . 'item/edit/'.$txt_code.'/1';
			else 
				$page = base_url() . 'item/edit/'.$txt_code.'/4';

			redirect($page);
		}

		public function delete($id){
			$r = $this->Item_model->delete($id);
			
			if ($r=='1')
				$page = base_url() . 'item/list/3';
			else 
				$page = base_url() . 'item/list/4';

			redirect($page);
		}

	}	
	

?>