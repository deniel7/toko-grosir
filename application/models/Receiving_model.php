<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	
	date_default_timezone_set('Asia/Jakarta');	
	
	class Receiving_model extends CI_Model {
		
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

		public function get_supplier_combo(){
			$sql = "SELECT * 
					FROM mst_supplier
					 ";

			$query = $this->db->query($sql);
			return $query->result();
		}

		public function get_list(){
			$sql = "SELECT a.id AS rec_id, a.rec_no, a.supplier_id, a.date, a.due_date, a.payment_id, a.total, a.status, a.active,
					b.name
					FROM trn_receiving a JOIN mst_supplier b ON(a.supplier_id=b.id) 
					 ";

			$query = $this->db->query($sql);
			return $query->result();
		}

		public function get_print_data($id){
			$sql = "SELECT a.id AS rec_id, a.rec_no, a.supplier_id, a.date, a.due_date, a.payment_id, a.total, a.status, a.active,
					b.name
					FROM trn_receiving a JOIN mst_supplier b ON(a.supplier_id=b.id) 
					WHERE a.id='$id' ";

			$query = $this->db->query($sql);
			return $query->result();
		}

		public function get_item_type_radio(){
			$sql = "SELECT * 
					FROM mst_item_type ORDER BY name ASC";

			$query = $this->db->query($sql);
			return $query->result();
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

		function rec_no_check($kode){
			$q = $this->db->query("select rec_no from trn_receiving where LOWER(rec_no)='".strtolower($kode)."' ");
			
			if ($q->num_rows() >= 1){
				$ada = 1;
			}else $ada = 0;

			return $ada;
		}

		public function insert_rec(){
			$txt_recno = $this->format_string($this->input->post('txt_recno'));
			$cb_supplier = $this->input->post('cb_supplier');
			$txt_date = $this->to_Ymd($this->input->post('txt_date'));
			$txt_due = $this->to_Ymd($this->input->post('txt_due'));

            $rb_payment = $this->format_number($this->input->post('rb_payment'));
            $txt_total = $this->format_number($this->input->post('txt_total'));

            $create_by = $this->session->userdata['logged_in']['username'];
            $date = date('Y-m-d');
            $active = 1;

			$data = array(
					   'rec_no' => $txt_recno,
					   'supplier_id' => $cb_supplier,
					   'date' => $txt_date,
					   'due_date' => $txt_due,
					   'payment_id' => $rb_payment,
					   'total' => $txt_total,
					   'create_by' => $create_by,
					   'create_at' => $date,
					   'update_by' => null,
					   'update_at' => null,
					   'status' => $rb_payment,
					   'active' => $active
					);
			
			$this->db->insert('trn_receiving', $data);
			$id =  $this->db->insert_id();
			
			$this->insert_rec_detail($id);

			return true;
			
		}

		public function insert_rec_detail($head_id){
			$txt_item_id = $this->input->post('txt_item_id');
			$txt_item = $this->input->post('txt_item');
			$txt_qty = $this->format_number($this->input->post('txt_qty'));
			$txt_buy = $this->format_number($this->input->post('txt_buy'));
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
					$this->update_item_data($txt_item_id[$i], $txt_buy[$i], $txt_qty[$i]);
					$data = array(
							   'head_id' => $head_id,
							   'item_id' => $txt_item_id[$i],
							   'price' => $txt_buy[$i],
							   'qty' => $txt_qty[$i],
							   'subtotal' => $txt_subtotal[$i]
							);
					
					$this->db->insert('trn_receiving_detail', $data);		
					$i++;
				}
			}

		}

		public function update_item_data($item_code, $new_buy_price, $qty){
			$sql = "UPDATE mst_item 
					SET buy_price='$new_buy_price', stock = stock + '$qty'
					WHERE code='$item_code'
					";
			
			$this->db->query($sql);
		}

		public function update_item_data_edit($item_code, $new_buy_price, $qty){
			$sql = "UPDATE mst_item 
					SET buy_price = '$new_buy_price' - ('$new_buy_price' - buy_price), stock = stock - '$qty'
					WHERE code='$item_code'
					";
			
			$this->db->query($sql);
		}

		public function add_exe(){
			if ($this->insert_rec())
				return '1';
			else 
				return '0';
		}

		public function get_receiving_head($id){
			$sql = "SELECT * FROM trn_receiving WHERE id='$id' ";
			$exe = $this->db->query($sql);
			$ret = $exe->row();
			
			$arr = array(
							$ret->id, $ret->rec_no, $ret->supplier_id, $ret->date, $ret->due_date,
							$ret->payment_id, $ret->total, $ret->status, $ret->active
						);
			return $arr;
		}	

		public function get_receiving_detail($id){
			$sql = "SELECT * 
					FROM trn_receiving_detail a JOIN mst_item b ON(a.item_id=b.code) 
					WHERE a.head_id='$id' ";

			$query = $this->db->query($sql);
			return $query->result();
		}	

		public function edit_rec_head(){
			$txt_id = $this->format_string($this->input->post('txt_id'));
			$cb_supplier = $this->input->post('cb_supplier');
			$txt_date = $this->to_Ymd($this->input->post('txt_date'));
			$txt_due = $this->to_Ymd($this->input->post('txt_due'));
            $rb_payment = $this->format_number($this->input->post('rb_payment'));
            $txt_total = $this->format_number($this->input->post('txt_total'));

            $update_by = $this->session->userdata['logged_in']['username'];
            $date = date('Y-m-d');

			$sql = "UPDATE trn_receiving 
					SET supplier_id='$cb_supplier', date='$txt_date', due_date='$txt_due',
						payment_id='$rb_payment', total='$txt_total', 
						update_by='$update_by', update_at='$date'
					WHERE id='$txt_id'
					";

			$this->db->query($sql);
			return true;
			
		}

		public function delete_rec_detail($head_id){
			$sql = "DELETE FROM trn_receiving_detail WHERE head_id='$head_id'
					";
			
			$this->db->query($sql);
		}

		public function edit_exe($id){
			$txt_item_id = $this->input->post('txt_item_id');
			$txt_item = $this->input->post('txt_item');
			$txt_qty = $this->format_number($this->input->post('txt_qty'));
			$txt_buy = $this->format_number($this->input->post('txt_buy'));
			
			$i = 0; 
			while($i<count($txt_item_id)){
				if (($txt_item[$i]=="") or empty($txt_item[$i]) or (str_replace(' ', '', $txt_item[$i])=="") ){
					$i++;
					continue;
				}
				else {
					$this->update_item_data_edit($txt_item_id[$i], $txt_buy[$i], $txt_qty[$i]);// new-(new-old)	
					$i++;
				}
			}

			//$this->edit_rec_head();

			//$this->delete_rec_detail($id);
			//
			$this->insert_rec_detail($id);

			return '1';
			
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