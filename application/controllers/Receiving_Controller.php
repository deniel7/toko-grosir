<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	
	date_default_timezone_set('Asia/Jakarta');	

	class Receiving_Controller extends MY_Controller {
		
		function __construct(){
			parent::__construct();
			$this->is_logged_in();
			$this->load->model('Receiving_model');
		}
		
		function get_list($msg) {
			$data['msg'] = $this->my_message($msg);
			$data['head_template'] = 'template/head_template_view';
			$data['head'] = 'receiving/head_view';
			$data['top_menu'] = 'template/top_menu_view';
			$data['left_menu'] = 'template/left_menu_view';
			$data['content'] = 'receiving/list_view';
			$data['footer'] = 'template/footer_view';
			
			$res = $this->Receiving_model->get_list();
			$data['row'] = "";

			foreach ($res as $r) {
				$data['row'] .= "<tr>
									<td>".$r->rec_no."</td>
									<td>".$r->name."</td>
									<td>".$r->date."</td>
									<td>".$r->due_date."</td>
									<td>".$r->total."</td>
									<td>".$r->status."</td>
									<td>
										<div class='hidden-sm hidden-xs action-buttons'>
											<a class='green' href='".base_url()."receiving/edit/".$r->id."/0'>
												<i class='ace-icon fa fa-pencil bigger-130'></i>
											</a>

											<a class='red' href='".base_url()."receiving/delete/".$r->id."' id='btn_delete' onclick='return delete_confirm();'>
												<i class='ace-icon fa fa-trash-o bigger-130'></i>
											</a>
										</div>
									</td>
								</tr>";
			}

			$this->load->view('receiving/index', $data);
		}
		
		public function create_payment_radio(){
			$val = array('Tunai', 'Kredit');
			$ret = "";
			$i = 0;

			foreach ($val as $r){
				if ($i==0){
					$v = 0;
					$checked = 'checked';
				}
				else{	 
					$v = 1;
					$checked = '';
				}	
				$ret .= "<label class='control-label'>
							<input name='rb_payment' id='rb_payment' type='radio' value='".$v."' required $checked />
							<span class='lbl'> ".$r."</span>
						</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
			}

			return $ret;

		}

		function create_row(){
			
			$row = "";
			for ($i=0; $i<=4; $i++){
				$row .= "<tr>
							<td>
								<input type='hidden' id='txt_item_id_' name='txt_item_id[]' class='col-xs-12' />
								<input type='text' id='txt_item_' name='txt_item[]' class='col-xs-12 txt_numeric' />
							</td>
							<td><input type='text' id='txt_qty_' name='txt_qty[]' class='col-xs-12 txt_numeric' /></td>
							<td><input type='text' id='txt_buy_' name='txt_buy[]' class='col-xs-12 txt_numeric' /></td>
							<td><input type='text' id='txt_store_' name='txt_store[]' class='col-xs-12 txt_numeric' /></td>
							<td><input type='text' id='txt_to_' name='txt_to[]' class='col-xs-12 txt_numeric' /></td>
							<td><input type='text' id='txt_motoris_' name='txt_motoris[]' class='col-xs-12 txt_numeric' /></td>
							<td><input type='text' id='txt_subtotal_' name='txt_subtotal[]' class='col-xs-12 txt_numeric' /></td>
						</tr>";	
			}		

			return $row;
		}

		function add($msg) {
			$data['msg'] = $this->my_message($msg);
			$data['head_template'] = 'template/head_template_view';
			$data['head'] = 'receiving/head_view';
			$data['top_menu'] = 'template/top_menu_view';
			$data['left_menu'] = 'template/left_menu_view';
			$data['content'] = 'receiving/add_view';
			$data['footer'] = 'template/footer_view';

			$data['list_payment'] = $this->create_payment_radio();
			$data['item_row'] = $this->create_row();
			$data['date'] = date('d-m-Y');

			$this->load->view('receiving/index', $data);
		}	
		
		public function add_exe(){
			$r = $this->Receiving_model->add_exe();
			if ($r=='1')
				$page = base_url() . 'receiving/add/1';
			else 
				$page = base_url() . 'receiving/add/4';

			redirect($page);
		}
		
		public function edit($id, $msg) {
			$data['msg'] = $this->my_message($msg);
			$data['head_template'] = 'template/head_template_view';
			$data['head'] = 'receiving/head_view';
			$data['top_menu'] = 'template/top_menu_view';
			$data['left_menu'] = 'template/left_menu_view';
			$data['content'] = 'receiving/edit_view';
			$data['footer'] = 'template/footer_view';
			
			$res = $this->Receiving_model->edit($id);
			
			$data['id'] = $res[0];
			$data['name'] = $res[1];
			$data['address'] = $res[2];
			$data['phone'] = $res[3];
			
			$this->load->view('receiving/index', $data);
		}

		public function edit_exe(){
			$r = $this->Receiving_model->edit_exe();
			$id = $this->input->post('txt_id');

			if ($r=='1')
				$page = base_url() . 'receiving/edit/'.$id.'/1';
			else 
				$page = base_url() . 'receiving/edit/'.$id.'/4';

			redirect($page);
		}

		public function delete($id){
			$r = $this->Receiving_model->delete($id);
			
			if ($r=='1')
				$page = base_url() . 'receiving/list/1';
			else 
				$page = base_url() . 'receiving/list/4';

			redirect($page);
		}

	}	
	

?>