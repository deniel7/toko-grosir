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

		////////////////////////////////////////////////// testing //////////////////////////////////////
		public function myget_dept_combo_by_dir2($p='', $dir){
			$this->load->model('Employee_model');
			$res = $this->Employee_model->get_dept_combo_by_dir($dir); //get dept

			$ret = "<option value=''>- Pilih -</option>";
			foreach ($res as $r){
				$ret .= "<option value='".$r->id."' ".($r->id==$p?'selected':'').">w".$r->name."</option>";

				$res2 = $this->Employee_model->get_subdept_combo_by_dept($r->id);//get sub-dept
				
				$id_subdept = array();
				foreach ($res2 as $r2){
					$id_subdept[] .= $r2->id;
					$ret .= "<option value='".$r2->id."' ".($r2->id==$p?'selected':'').">x".$r2->name."</option>";
				}

				$id_subdepartment = implode(',', $id_subdept);
				$direct3 = $this->Employee_model->get_s3_combo();//cek tipe lookupnya
				foreach ($direct3 as $d3){
					switch ($d3->direct3){
						case '1' : $res3 = $this->Employee_model->get_s3_combo_by_dept($r->id); break;//by dir
						case '2' : $res3 = $this->Employee_model->get_s3_combo_by_subdept($id_subdepartment); break;//by id_dept
						default  : $res3 = null; break;
					}
				}
		
				//get structure3
				foreach ($res3 as $r3){
					$ret .= "<option value='".$r3->id."' ".($r3->id==$p?'selected':'').">y".$r3->name."</option>";
				}	
/*
				//format array
				

				$direct4 = $this->Employee_model->get_s4_combo();//cek tipe lookupnya
				foreach ($direct4 as $d4){
					switch ($d4->direct4){
						case '1' : $res4 = $this->Employee_model->get_s4_combo_by_dept($dir); break;//by dir
						case '2' : $res4 = $this->Employee_model->get_s4_combo_by_subdept($r->id); break;//by id_dept
						case '3' : $res4 = $this->Employee_model->get_s4_combo_by_s3($id_subdepartment); break;//by id_SUBdept
						default  : $res4 = null; break;
					}
					
						
				}

				foreach ($res4 as $r4){
					$ret .= "<option value='".$r4->id."' ".($r4->id==$p?'selected':'').">z".$r4->name."</option>";
				}
*/
		/*		//get s5
				$direct5 = $this->Employee_model->get_s5_combo();//cek tipe lookupnya
				foreach ($direct5 as $d5){
					switch ($d5->direct5){
						case '1' : $res5 = $this->Employee_model->get_s5_combo_by_dept($dir); break;//by dir
						case '2' : $res5 = $this->Employee_model->get_s5_combo_by_subdept($id_subdepartment); break;//by id_dept
						case '3' : $res5 = $this->Employee_model->get_s5_combo_by_s3($id_subdepartment); break;//by id_SUBdept
						default  : $res5 = null; break;
					}
					
						
				}
				
				foreach ($res5 as $r5){
					$ret .= "<option value='".$r5->id."' ".($r5->id==$p?'selected':'').">z1".$r5->name."</option>";
				}
*/

			}

			return $ret;
			
		}

		public function my_message($msg){
			$success_icon = "<img src='".base_url()."assets/images/check.png' />";
			$error_icon = "<img src='".base_url()."assets/images/cross.png' />";
			
			switch ($msg){
				case '1' : $ret = "<div><div class='div-success'><label class='label-msg'>data saved .</label>$success_icon </div></div>"; break;
				case '2' : $ret = "<div><div class='div-success'><label class='label-msg'>data updated .</label>$success_icon </div></div>"; break;
				case '3' : $ret = "<div><div class='div-success'><label class='label-msg'>data deleted .</label>$success_icon </div></div>"; break;
				case '4' : $ret = "<div><div class='div-error'><label class='label-msg'>operation error .</label>$error_icon </div></div>"; break;
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