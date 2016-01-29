<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	
	date_default_timezone_set('Asia/Jakarta');	

	class Sales_Controller extends MY_Controller {
		
		function __construct(){
			parent::__construct();
			$this->is_logged_in();
			$this->load->model('Sales_model');
		}
		
		function get_list($msg) {
			$data['msg'] = $this->my_message($msg);
			$data['head_template'] = 'template/head_template_view';
			$data['head'] = 'sales/head_view';
			$data['top_menu'] = 'template/top_menu_view';
			$data['left_menu'] = 'template/left_menu_view';
			$data['content'] = 'sales/list_view';
			$data['footer'] = 'template/footer_view';
			
			$res = $this->Sales_model->get_list();
			$data['row'] = "";

			foreach ($res as $r) {
				$data['row'] .= "<tr>
									<td>".$r->sales_no."</td>
									<td>".$r->name."</td>
									<td>".$r->date."</td>
									<td>".$r->due_date."</td>
									<td>".$r->payment_id."</td>

									<td>".$r->total."</td>
									<td>".$r->create_by."</td>
									<td>".$r->create_at."</td>
									<td>".$r->update_by."</td>
									<td>".$r->update_at."</td>
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

			$this->load->view('sales/index', $data);
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
								<input type='hidden' id='txt_item_id_$i' name='txt_item_id[]' class='col-xs-12' />
								<input type='text' id='txt_item_$i' name='txt_item[]' class='col-xs-12' onclick='this.setSelectionRange(0, this.value.length)' />
								<ul id='autocomplete_$i' class='dropdown-menu' style='position:relative;width:100%'> </ul>
							</td>
							<td><input type='text' id='txt_stock_$i' name='txt_stock[]' class='col-xs-6 txt_numeric' readonly />
								<input type='text' id='txt_crt_$i' name='txt_crt[]' class='col-xs-6 txt_numeric' readonly /></td>
								
							<td>
								<select id='cb_price_$i' name='cb_price[]' class='col-xs-12'>
									<option value=''>-</option>
									<option value='s'>Store</option>
									<option value='m'>Motoris</option>
									<option value='t'>TO</option>
								 </select> 
							</td>
							
							<td>
								<select id='cb_satuan_$i' name='cb_satuan[]' class='col-xs-12'>
									<option value='crt'>CRT</option>
									<option value='box'>Box</option>
								 </select> 
							</td>

							<td><input type='text' id='txt_sell_price_$i' name='txt_sell_price[]' class='col-xs-12 txt_numeric' /></td>
							<td><input type='text' id='txt_qty_$i' name='txt_qty[]' class='col-xs-12 txt_numeric' /></td>
							<td><input type='text' id='txt_disc_$i' name='txt_disc[]' class='col-xs-12 txt_numeric' readonly /></td>
							<td><input type='text' id='txt_nett_$i' name='txt_nett[]' class='col-xs-12 txt_numeric' readonly /></td>
							<td><input type='text' id='txt_subtotal_$i' name='txt_subtotal[]' class='col-xs-12 txt_numeric' readonly value='0' /></td>
							
						</tr>";	
			}		

			return $row;
		}

		public function get_salesman_combo($p=''){
			$res = $this->Sales_model->get_salesman_combo();

			$ret = "";
			foreach ($res as $r){
				$ret .= "<option value='".$r->id."' ".($r->id==$p?'selected':'').">".$r->name."</option>";
			}
			return $ret;
		}

		public function get_customer_combo($p=''){
			$res = $this->Sales_model->get_customer_combo();

			$ret = "";
			foreach ($res as $r){
				$ret .= "<option value='".$r->id."' ".($r->id==$p?'selected':'').">".$r->name."</option>";
			}
			return $ret;
		}

		/*public function get_satuan_price(){
			$item_id = $this->input->post("item_id");
			$lastrow = $this->input->post("row");
			$satuan = $this->input->post("satuan");
			$jenis = $this->input->post("jenis");

			$res = $this->Sales_model->get_satuan_price($item_id, $satuan);

			foreach ($res as $r){
				echo $r->price;
			}

		}*/

		function get_item(){
			$item = $this->input->post("item");
			$lastrow = $this->input->post("row");
			
			$list = $this->Sales_model->get_item_ajax($item); 
			
			$res = "";
			if (!empty($list)){
				foreach($list as $row) {
					$stock = $row->stock;
					$crt_capacity = $row->crt_capacity;
					$crt = $stock * $crt_capacity;


					$res .= '<li><a href="#" id="link_item" onclick="set_item(\''.$row->code.'\', \''.$row->name.'\', \''.$row->buy_price.'\', \''.$stock.'\', \''.$crt.'\', \''.$lastrow.'\');return false;" >
							'.$row->name.'</a></li>';
				}
				echo $res;	
			} else echo '<li><a href="#" id="link_item" onclick="return false;">no data</a></li>';
			
			
		}

		function get_price_by_jenis_satuan(){
			$item_id = $this->input->post("item_id");
			$jenis = $this->input->post("jenis");
			$satuan = $this->input->post("satuan");
			$lastrow = $this->input->post("row");
			

			$list = $this->Sales_model->get_price_by_jenis_satuan($item_id, $jenis, $satuan); 
			
			$res = "";
			if (!empty($list)){
				foreach($list as $row) {
					echo $row->price;
				}
				
			} else echo '';
			
			
		}

		function add($msg) {
			$data['msg'] = $this->my_message($msg);
			$data['head_template'] = 'template/head_template_view';
			$data['head'] = 'sales/head_view';
			$data['top_menu'] = 'template/top_menu_view';
			$data['left_menu'] = 'template/left_menu_view';
			$data['content'] = 'sales/add_view';
			$data['footer'] = 'template/footer_view';

			
			$data['item_row'] = $this->create_row();
			$data['date'] = date('d-m-Y');

			$data['list_salesman'] = $this->get_salesman_combo();
			$data['list_customer'] = $this->get_customer_combo();
			$data['list_payment'] = $this->create_payment_radio();


			$this->load->view('receiving/index', $data);
		}	
		
		public function add_exe(){
			$r = $this->Sales_model->add_exe();
			if ($r=='1')
				$page = base_url() . 'sales/add/1';
			else 
				$page = base_url() . 'sales/add/4';

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