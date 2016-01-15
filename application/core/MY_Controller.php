<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	
	date_default_timezone_set('Asia/Jakarta');		

	class MY_Controller extends CI_Controller {
		

		function __construct(){
			parent::__construct();
			
		}
		
		function is_logged_in(){
			if(!isset($this->session->userdata['logged_in']['username']) || $this->session->userdata['logged_in']['username'] != true) {
				redirect("login");
			}
		}
		
		public function myto_dmY($date){
			$fmt = date('d-m-Y', strtotime($date));
			return $fmt;
		}

		public function myto_date($date){
			$fmt = date('d', strtotime($date));
			return $fmt;
		}

		public function myto_dM($date){
			$fmt = date('d-M', strtotime($date));
			return $fmt;
		}

		public function myto_Ymd($date){
			$fmt = date('Y-m-d', strtotime($date));
			return $fmt;
		}
		
		public function my_404(){
			$this->load->view('errors/html/error_test');
		}

		public function myget_boss($p='', $dir){
			$this->load->model('Employee_model');
			$res = $this->Employee_model->get_boss($dir);

			$ret = "<option value=''>- Pilih -</option>";
			foreach ($res as $r){
				$ret .= "<option value='".$r->id."' ".($r->id==$p?'selected':'').">".$r->name."</option>";
			}

			return $ret;
			
		}

		public function myget_job($p='', $dir){
			$this->load->model('Employee_model');
			$res = $this->Employee_model->get_job($dir);

			$ret = "<option value=''>- Pilih -</option>";
			foreach ($res as $r){
				$ret .= "<option value='".$r->id."' ".($r->id==$p?'selected':'').">".$r->name."</option>";
			}

			return $ret;
			
		}

		public function myget_job_edit($p=''){
			$this->load->model('Employee_model');
			$res = $this->Employee_model->get_job_edit();

			$ret = "<option value=''>- Pilih -</option>";
			foreach ($res as $r){
				$ret .= "<option value='".$r->id."' ".($r->id==$p?'selected':'').">".$r->name."</option>";
			}

			return $ret;
			
		}

		public function myget_jabatan_combo($p=''){
			$this->load->model('Employee_model');
			$res = $this->Employee_model->get_jabatan_combo();

			$ret = "<option value=''>- Pilih -</option>";
			foreach ($res as $r){
				$ret .= "<option value='".$r->id."' ".($r->id==$p?'selected':'').">".$r->code."</option>";
			}

			return $ret;
			
		}

		public function myget_dir_combo($p=''){
			$this->load->model('Employee_model');
			$res = $this->Employee_model->get_dir_combo();

			$ret = "<option value=''>- Pilih -</option>";
			foreach ($res as $r){
				$ret .= "<option value='".$r->id."' ".($r->id==$p?'selected':'').">".$r->name."</option>";
			}

			return $ret;
			
		}

		public function myget_dept_combo($p=''){
			$this->load->model('Employee_model');
			$res = $this->Employee_model->get_dept_combo();

			$ret = "<option value=''>- Pilih -</option>";
			foreach ($res as $r){
				$ret .= "<option value='".$r->id."' ".($r->id==$p?'selected':'').">".$r->name."</option>";
			}

			return $ret;
			
		}

		public function myget_store_combo($p=''){
			$this->load->model('Employee_model');
			$res = $this->Employee_model->get_store_combo();

			$ret = "<option value=''>- Pilih -</option>";
			foreach ($res as $r){
				$ret .= "<option value='".$r->id."' ".($r->id==$p?'selected':'').">".$r->name."</option>";
			}

			return $ret;
			
		}

		public function myget_status_combo($p=''){
			$ret = "<option value=''>- Pilih -</option>";
			$ret .= "<option value='1' ".('1'==$p?'selected':'').">Tetap</option>";
			$ret .= "<option value='0' ".('0'==$p?'selected':'').">Kontrak</option>";
			
			return $ret;
			
		}

		public function myget_unit_combo($p=''){
			$ret = "<option value=''>- Pilih -</option>";
			$ret .= "<option value='1' ".('1'==$p?'selected':'').">Distribution Center / DC</option>";
			$ret .= "<option value='2' ".('2'==$p?'selected':'').">Griya</option>";
			$ret .= "<option value='3' ".('3'==$p?'selected':'').">Yogya</option>";
			
			return $ret;
			
		}

		public function myget_penilai_combo($p='', $posisi){
			$this->load->model('Employee_model');
			$res = $this->Employee_model->get_penilai_combo($posisi);

			$ret = "<option value=''>- Pilih -</option>";
			foreach ($res as $r){
				$ret .= "<option value='".$r->nik."' ".($r->nik==$p?'selected':'').">".$r->name."</option>";
			}

			return $ret;
			
		}

		public function myget_penilai_combo_by_dir($p='', $posisi, $dir){
			$this->load->model('Employee_model');
			$res = $this->Employee_model->get_penilai_combo_by_dir($posisi, $dir);

			$ret = "<option value=''>- Pilih -</option>";
			foreach ($res as $r){
				$ret .= "<option value='".$r->nik."' ".($r->nik==$p?'selected':'').">".$r->name."</option>";
			}

			return $ret;
			
		}

		public function myget_level_combo($p=''){
			$this->load->model('Job_model');
			$res = $this->Job_model->get_level_combo();

			$ret = "<option value=''>- Pilih -</option>";
			foreach ($res as $r){
				$ret .= "<option value='".$r->id."' ".($r->id==$p?'selected':'').">".$r->name."</option>";
			}

			return $ret;
			
		}

		public function myget_dept_combo_by_dir($p='', $dir){
			$this->load->model('Employee_model');
			$res = $this->Employee_model->get_dept_combo_by_dir($dir); //dept

			$ret = "<option value=''>- Pilih -</option>";
			foreach ($res as $r){
				$ret .= "<option value='".$r->id."' ".($r->id==$p?'selected':'').">".$r->name."</option>";

				//$res2 = $this->Employee_model->get_subdept_combo_by_dept($dir);//sub-dept
			}

			return $ret;
			
		}

		public function my_message($msg){
			switch ($msg){
				case '1' : $ret = "<div class='alert alert-success alert-dismissable'>
										<button class='close' aria-hidden='true' data-dismiss='alert' type='button'>×</button>
										Data Saved.
									</div>"; break;
				case '2' : $ret = "<div class='alert alert-success alert-dismissable'>
										<button class='close' aria-hidden='true' data-dismiss='alert' type='button'>×</button>
										Data Updated.
									</div>"; break;
				case '3' : $ret = "<div class='alert alert-success alert-dismissable'>
										<button class='close' aria-hidden='true' data-dismiss='alert' type='button'>×</button>
										Data Deleted.
									</div>"; break;
				case '4' : $ret = "<div class='alert alert-danger alert-dismissable'>
										<button class='close' aria-hidden='true' data-dismiss='alert' type='button'>×</button>
										Error on Operation.
									</div>"; break;
				default  : $ret = "";
			}
			return $ret;
			
		}

		public function myget_direct_list($p='', $direct){
			$this->load->model('Structure3_model');
			
			switch ($direct){
				case '1' : $res = $this->Structure3_model->get_direct_list_dept($direct); break;
				case '2' : $res = $this->Structure3_model->get_direct_list_subdept($direct); break;
				case '3' : $res = $this->Structure3_model->get_direct_list_structure3($direct); break;
				case '4' : $res = $this->Structure3_model->get_direct_list_structure4($direct); break;
				default  : $res = null; break;
			}
			

			$ret = "";
			foreach ($res as $r){
				$ret .= "<option value='".$r->id."' ".($r->id==$p?'selected':'').">".$r->name."</option>";
			}

			return $ret;
			
		}


	}
?>