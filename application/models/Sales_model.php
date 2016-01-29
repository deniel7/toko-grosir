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

		public function get_item_combo_price($item,$jenis){
			if($jenis == 's'){
				$kolom = 'store_price';

			}else if($jenis == 'm'){
				$kolom = 'motoris_price';

			}else{
				$kolom = 'to_price';
			}

			$sql = "SELECT $kolom AS price
					FROM mst_item WHERE code = '$item'";

			$query = $this->db->query($sql);
			return $query->result();
		}

		public function get_satuan_price($item,$satuan){
			if($satuan == 'crt'){
			
			$sql = "SELECT buy_price AS price
					FROM mst_item WHERE code = '$item'";


			}else{
			
			$sql = "SELECT buy_price / crt_capacity AS price
					FROM mst_item WHERE code = '$item'";
			}


			$query = $this->db->query($sql);
			return $query->result();
		}

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
					FROM trn_receiving a JOIN mst_supplier b ON(a.supplier_id=b.id) 
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


		public function insert_rec(){
			$txt_code = $this->format_string($this->input->post('txt_code'));
			$rb_type = $this->input->post('rb_type');
			$txt_name = $this->format_string($this->input->post('txt_name'));
            $txt_capacity = $this->format_number($this->input->post('txt_capacity'));
            $txt_buy = $this->format_number($this->input->post('txt_buy'));
            $txt_store = $this->format_number($this->input->post('txt_store'));
            $txt_to = $this->format_number($this->input->post('txt_to'));
            $txt_motoris = $this->format_number($this->input->post('txt_motoris'));

            $create_by = $this->session->userdata['logged_in']['username'];
            $date = date('Y-m-d');
            $active = 1;

			$data = array(
					   'code' => $txt_code,
					   'name' => $txt_name,
					   'item_type_id' => $rb_type,
					   'crt_capacity' => $txt_capacity,
					   'stock' => '0',
					   'buy_price' => '0',
					   'store_price' => $txt_store,
					   'to_price' => $txt_to,
					   'motoris_price' => $txt_motoris,
					   'active' => $active,
					   'create_by' => $create_by,
					   'create_at' => $date,
					   'update_by' => null,
					   'update_at' => null
					);
			if ($this->is_exist($txt_code)=='1'){
				return false;
			}
			else {
				$this->db->insert('mst_item', $data);
				return true;	
			}
			
		}

		public function add_exe(){
			if ($this->insert_item())
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