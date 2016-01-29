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
				if ($r->status=='1')
					$status = 'L';
				else 
					$status = 'BL';

				$data['row'] .= "<tr>
									<td>".$r->rec_no."</td>
									<td>".$r->name."</td>
									<td>".$r->date."</td>
									<td>".$r->due_date."</td>
									<td style='text-align:right;'>".$this->my_to_currency($r->total)."</td>
									<td>".$status."</td>
									<td>
										<div class='hidden-sm hidden-xs action-buttons'>
											<a class='green' href='".base_url()."receiving/edit/".$r->rec_id."/0'>
												<i class='ace-icon fa fa-pencil bigger-130'></i>
											</a>

											<a class='red' href='".base_url()."receiving/delete/".$r->rec_id."' id='btn_delete' onclick='return delete_confirm();'>
												<i class='ace-icon fa fa-trash-o bigger-130'></i>
											</a>
											<a class='red' href='".base_url()."receiving/print_faktur/".$r->rec_id."' id='btn_print' target='_blank' >
												<i class='ace-icon fa fa-print bigger-130'></i>
											</a>
											
										</div>
									</td>
								</tr>";
			/*<a class='red' href='".base_url()."assets/faktur/REC_".$r->rec_id.".pdf' id='btn_print' target='_blank' >
												<i class='ace-icon fa fa-print bigger-130'></i>
											</a>*/					
			}

			$this->load->view('receiving/index', $data);
		}
		
		public function get_print_data($id){
			$res = $this->Receiving_model->get_print_data($id);

			$i = 0;
			$ret = "";
			$ret .= "<table>
						<tr>
							<td>No</td>
							<td>Rec.No</td>
							<td>Supplier</td>
							<td>Date</td>
							<td>Due Date</td>
							<td>Total</td>
							<td>Status</td>
						</tr>";

			foreach ($res as $r) {
				$i++;
				$ret .= "<tr>
							<td>".$i.".</td>
							<td>".$r->rec_no."</td>
							<td>".$r->name."</td>
							<td>".$r->date."</td>
							<td>".$r->due_date."</td>
							<td>".$r->total."</td>
							<td>".$r->status."</td>
						</tr>";
				
			}		
			$ret .= "</table>";	

			return $ret;
		}

		public function print_faktur($id){
			$html = $this->get_print_data($id);
			$this->load->helper('mpdf_helper');
			$filename = 'REC_' . $id;

			pdf_create($html, $filename);
		}
		
		public function rec_no_check(){
			$txt_recno = $this->input->post('txt_recno');
			$r = $this->Receiving_model->rec_no_check($txt_recno);

			echo $r;
		}

		public function create_payment_radio(){
			$val = array('Tunai', 'Kredit');
			$ret = "";
			$i = 0;

			foreach ($val as $r){
				if ($i==0){
					$checked = 'checked';
				}
				else{	 
					$checked = '';
				}	
				$ret .= "<label class='control-label'>
							<input name='rb_payment' id='rb_payment$i' type='radio' value='".$i."' required $checked />
							<span class='lbl'> ".$r."</span>
						</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
				$i++;
			}

			return $ret;

		}

		public function create_payment_radio_edit($p){
			$val = array('Tunai', 'Kredit');
			$ret = "";
			$i = 0;

			foreach ($val as $r){
				$ret .= "<label class='control-label'>
							<input name='rb_payment' id='rb_payment$i' type='radio' value='".$i."' required ".($i==$p?'checked':'')." />
							<span class='lbl'> ".$r."</span>
						</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
				$i++;
			}

			return $ret;

		}

		public function create_row(){
			$row = "";
			for ($i=0; $i<=4; $i++){
				$row .= "<tr>
							<td>
								<input type='hidden' id='txt_item_id_$i' name='txt_item_id[]' class='col-xs-12' />
								<input type='text' id='txt_item_$i' name='txt_item[]' class='col-xs-12' onclick='this.setSelectionRange(0, this.value.length)' />
								<ul id='autocomplete_$i' class='dropdown-menu' style='position:relative;width:100%'> </ul>
							</td>
							<td><input type='text' id='txt_qty_$i' name='txt_qty[]' class='col-xs-12 txt_numeric' /></td>
							<td><input type='text' id='txt_buy_$i' name='txt_buy[]' class='col-xs-12 txt_numeric' /></td>
							<td><input type='text' id='txt_subtotal_$i' name='txt_subtotal[]' class='col-xs-12 txt_numeric' readonly value='0' /></td>
						</tr>";	

			/*	<td><input type='text' id='txt_store_$i' name='txt_store[]' class='col-xs-12 txt_numeric' /></td>
							<td><input type='text' id='txt_to_$i' name='txt_to[]' class='col-xs-12 txt_numeric' /></td>
							<td><input type='text' id='txt_motoris_$i' name='txt_motoris[]' class='col-xs-12 txt_numeric' /></td>		
			*/
			}		

			return $row;
		}

		public function get_supplier_combo($p=''){
			$res = $this->Receiving_model->get_supplier_combo();

			$ret = "";
			foreach ($res as $r){
				$ret .= "<option value='".$r->id."' ".($r->id==$p?'selected':'').">".$r->name."</option>";
			}
			return $ret;
		}

		public function get_item(){
			$item = $this->input->post("item");
			$lastrow = $this->input->post("row");
			
			$list = $this->Receiving_model->get_item_ajax($item); 
			
			$res = "";
			if (!empty($list)){
				foreach($list as $row) {
					$res .= '<li><a href="#" id="link_item" onclick="set_item(\''.$row->code.'\', \''.$row->name.'\', \''.$row->buy_price.'\', \''.$lastrow.'\');return false;" >
							'.$row->name.'</a></li>';
				}
				echo $res;	
			} else echo '<li><a href="#" id="link_item" onclick="return false;">no data</a></li>';
			
			
		}

		public function add($msg) {
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

			$data['list_supplier'] = $this->get_supplier_combo();

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
			
			$res = $this->Receiving_model->get_receiving_head($id);
			$data['id'] = $res[0];
			$data['rec_no'] = $res[1];
			$data['supplier_id'] = $res[2];
			$data['date'] = $this->myto_dmY($res[3]);
			$data['due_date'] = ($res[4]==null?null:$this->myto_dmY($res[4]));
			$data['payment_id'] = $res[5];
			$data['total'] = $res[6];
			$data['status'] = $res[7];
			$data['active'] = $res[8];
			
			$data['list_supplier'] = $this->get_supplier_combo($res[2]);
			$data['list_payment'] = $this->create_payment_radio_edit($res[5]);
			$data['list_detail'] = "";
			$res = $this->Receiving_model->get_receiving_detail($id);

			$i = 0;
			foreach ($res as $r){
				$data['list_detail'] .= "<tr>
											<td>
												<input type='hidden' id='txt_item_id_$i' name='txt_item_id[]' class='col-xs-12' value='".$r->id."' />
												<input type='text' id='txt_item_$i' name='txt_item[]' class='col-xs-12' onclick='this.setSelectionRange(0, this.value.length)' value='".$r->name."' />
												<ul id='autocomplete_$i' class='dropdown-menu' style='position:relative;width:100%'> </ul>
											</td>
											<td><input type='text' id='txt_qty_$i' name='txt_qty[]' class='col-xs-12 txt_numeric' value='".$r->qty."' /></td>
											<td><input type='text' id='txt_buy_$i' name='txt_buy[]' class='col-xs-12 txt_numeric' value='".$r->buy_price."' /></td>
											<td><input type='text' id='txt_subtotal_$i' name='txt_subtotal[]' class='col-xs-12 txt_numeric' readonly value='".$r->subtotal."' /></td>
										</tr>";
				$i++;						
			}

			$this->load->view('receiving/index', $data);
		}

		public function edit_exe(){
			$id = $this->input->post('txt_id');
			$r = $this->Receiving_model->edit_exe($id);
			
			if ($r=='1')
				$page = base_url() . 'receiving/edit/'.$id.'/1';
			else 
				$page = base_url() . 'receiving/edit/'.$id.'/4';

			//redirect($page);
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