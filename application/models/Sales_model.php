<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	
	date_default_timezone_set('Asia/Jakarta');	
	
	class Sales_model extends CI_Model {
		
		function __construct(){
			parent::__construct();
		}
		
		public function to_Ymd($date){
			$fmt = date('Y-m-d', strtotime($date));
			return $fmt;
		}

		function autonum_rec() {	
			$now = date("dmy");
			$start = date("y-m-d 00:00:00");
			$end = date("y-m-d 23:59:59");

			$sql = $this->db->query("select MAX(substr(no_faktur,9,7)) as idnew from t_jual where create_at >='$start' and create_at <= '$end' ")->row(); 

			if ($sql){
				$r = $sql->idnew + 1;//max id +1
				$new_id = 'JB' . $now . str_pad($r, 7, '0', STR_PAD_LEFT);

			} else {
				$new_id = 'JB' . $now . '0000001';
			}
			

			
			return $new_id;
			
		}

		public function get_item_ajax($item){
			$sql = "SELECT * 
					FROM mst_item WHERE LOWER(name) LIKE '%".strtolower($item)."%'  ";

			$query = $this->db->query($sql);
			return $query->result();
		}

		public function get_price_by_jenis_satuan($item, $jenis, $satuan){
			if($jenis == 's'){
				$kolom = 'store_price';
			}else if($jenis == 'm'){
				$kolom = 'motoris_price';
			}else{
				$kolom = 'to_price';
			}


			if($satuan == 'crt'){
				$sql = "SELECT $kolom AS price
						FROM mst_item WHERE code = '$item'";
			}else{
				$sql = "SELECT $kolom / crt_capacity AS price
						FROM mst_item WHERE code = '$item'";
			}


			$query = $this->db->query($sql);
			return $query->result();
		}

		/*public function get_satuan_price($item, $satuan, $jenis){
			if($satuan == 'crt'){
				$sql = "SELECT store_price AS price
						FROM mst_item WHERE code = '$item'";
			}else{
				$sql = "SELECT store_price / crt_capacity AS price
						FROM mst_item WHERE code = '$item'";
			}

			$query = $this->db->query($sql);
			return $query->result();
		}*/

		public function get_salesman_combo(){
			$sql = "SELECT * 
					FROM mst_salesman
					 ";

			$query = $this->db->query($sql);
			return $query->result();
		}

		public function get_customer_combo(){
			$sql = "SELECT * 
					FROM mst_customer
					 ";

			$query = $this->db->query($sql);
			return $query->result();
		}

		public function get_list(){
			$sql = "SELECT * 
					FROM trn_sales a JOIN mst_customer b ON(a.customer_id=b.id) 
					 ";

			$query = $this->db->query($sql);
			return $query->result();
		}

		public function get_item_type_radio(){
			$sql = "SELECT * 
					FROM mst_item_type ORDER BY name ASC";

			$query = $this->db->query($sql);
			return $query->result();
		}

		public function is_exist($id){
			$sql = "SELECT * 
					FROM mst_item 
					WHERE LOWER(code)='".strtolower($id)."'  ";

			$query = $this->db->query($sql);
			
			if ($query->num_rows() >= 1){
				$exist = 1;
			}else $exist = 0;

			return $exist;
		}

		public function format_number($str){
			$ret = str_replace(',', '', $str);
			return $ret;
		}

		public function format_string($str){
			$tmp = str_replace("'", '', $str);
			$ret = str_replace('"', '', $tmp);
			return $ret;
		}


		public function insert_sales(){
			$cb_salesman = $this->input->post('cb_salesman');
			$cb_customer = $this->input->post('cb_customer');

			$txt_salesno = $this->format_string($this->input->post('txt_salesno'));
			$txt_date = $this->to_Ymd($this->input->post('txt_date'));
			$txt_due = $this->to_Ymd($this->input->post('txt_due'));

            $rb_payment = $this->format_number($this->input->post('rb_payment'));
            $txt_total = $this->format_number($this->input->post('txt_total'));

            $create_by = $this->session->userdata['logged_in']['username'];
            $date = date('Y-m-d');
            $active = 1;

			$data = array(
					   'sales_no' => $txt_salesno,
					   'customer_id' => $cb_customer,
					   'date' => $txt_date,
					   'due_date' => $txt_due,
					   'payment_id' => $rb_payment,
					   'total' => $txt_total,
					   'create_by' => $create_by,
					   'create_at' => $date,
					   'update_by' => null,
					   'update_at' => null,
					   'status' => $rb_payment
					  
					);
			
			$this->db->insert('trn_sales', $data);
			$id =  $this->db->insert_id();
			
			$this->insert_sales_detail($id);

			return true;
			
		}

		public function insert_sales_detail($head_id){
			$txt_item_id = $this->input->post('txt_item_id');
			$txt_item = $this->input->post('txt_item');
			$txt_qty = $this->format_number($this->input->post('txt_qty'));
			$txt_sell_price = $this->format_number($this->input->post('txt_sell_price'));
			
			$txt_store = $this->format_number($this->input->post('txt_store'));
			$txt_to = $this->format_number($this->input->post('txt_to'));
			$txt_motoris = $this->format_number($this->input->post('txt_motoris'));
			$txt_subtotal = $this->format_number($this->input->post('txt_subtotal'));

			$i = 0; 
			while($i<count($txt_item_id)){
				if (($txt_item[$i]=="") or empty($txt_item[$i]) or (str_replace(' ', '', $txt_item[$i])=="") ){
					$i++;
					continue;
				}
				else {
					//$this->update_item_data($txt_item_id[$i], $txt_sell_price[$i], $txt_qty[$i]);
					$data = array(
							   'head_id' => $head_id,
							   'item_id' => $txt_item_id[$i],
							   'price' => $txt_sell_price[$i],
							   'qty' => $txt_qty[$i],
							   'subtotal' => $txt_subtotal[$i]
							);
					
					$this->db->insert('trn_sales_detail', $data);		
					$i++;
				}
			}

		}

		public function add_exe(){
			if ($this->insert_sales())
				return '1';
			else 
				return '0';
		}

		function edit($id){
			$sql = "SELECT * FROM mst_item WHERE code='$id' ";
			
			$exe = $this->db->query($sql);
			$ret = $exe->row();
			$arr = array(
							$ret->code, $ret->name, $ret->item_type_id, $ret->crt_capacity,
							$ret->stock, $ret->buy_price, $ret->store_price, $ret->to_price,
							$ret->motoris_price, $ret->active, $ret->create_by, $ret->create_at,
							$ret->update_by, $ret->update_at
						);
			return $arr;
		}	

		public function edit_item(){
			$txt_code = $this->format_string($this->input->post('txt_code'));
			$rb_type = $this->input->post('rb_type');
			$txt_name = $this->format_string($this->input->post('txt_name'));
            $txt_capacity = $this->format_number($this->input->post('txt_capacity'));
            $txt_buy = $this->format_number($this->input->post('txt_buy'));
            $txt_store = $this->format_number($this->input->post('txt_store'));
            $txt_to = $this->format_number($this->input->post('txt_to'));
            $txt_motoris = $this->format_number($this->input->post('txt_motoris'));

            $update_by = $this->session->userdata['logged_in']['username'];
            $date = date('Y-m-d');
            $active = 1;

			$sql = "UPDATE mst_item 
					SET name='$txt_name', item_type_id='$rb_type', crt_capacity='$txt_capacity',
						store_price='$txt_store', to_price='$txt_to', motoris_price='$txt_motoris', 
						update_by='$update_by', update_at='$date'
					WHERE code='$txt_code'
					";
			
			$this->db->query($sql);

			return true;
			
		}

		public function edit_exe(){
			if ($this->edit_item())
				return '1';
			else 
				return '0';
		}

		public function delete($id){
			$sql = "UPDATE mst_item SET active='0' WHERE code='$id' ";
			
			$r = $this->db->query($sql);

			if ($r)
				return 1;
			else 
				return 0;
		}


	}
	
	
	
	
?>