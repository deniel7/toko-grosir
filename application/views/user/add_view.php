

			<div class="main-content">
				<div class="main-content-inner">
					<div class="breadcrumbs" id="breadcrumbs">
						<script type="text/javascript">
							try{ace.settings.check('breadcrumbs' , 'fixed')}catch(e){}
						</script>

						<ul class="breadcrumb">
							<li>
								<i class="ace-icon fa fa-archive archive-icon"></i>
								Master
							</li>
							<li><a href="<?php echo base_url();?>user/list/0" >User</a></li>
							<li class="active">Add New</li>
						</ul >
					</div>
		
					<div class="page-content">
						<div class="row">
							<div class="col-xs-12">
							<?php echo $msg; ?>
							<br>
								<div class="row">
									<div class="col-xs-12">
										<form action="<?php echo base_url(); ?>user/add_exe" method="post" name="frm_add_cust" id="frm_add_cust" class="form-horizontal" role="form">
											<div class="form-group">
												<label class="col-sm-1 control-label no-padding-left" >Username</label>
												<div class="col-sm-7">
													<input type="text" id="txt_username" name="txt_username" class="col-xs-12" required />
												</div>
												<label class="col-sm-1 control-label no-padding-left" >Role</label>
												<div class="col-sm-3">
													 <select id="txt_role" name="txt_role" class="col-xs-12">
														  <option value="1">Administrator</option>
														  <option value="2">Cashier</option>
														  <option value="3">Manager</option>
													 </select> 
													<!-- <input type="text" id="txt_role" name="txt_role"  /> -->
												</div>
											</div>

											<div class="form-group">
												<label class="col-sm-1 control-label no-padding-left" >Password</label>
												<div class="col-sm-11">
													<input type="password" id="txt_password" name="txt_password" class="col-xs-12" />
												</div>
											</div>

											<div class="form-group">
												<label class="col-sm-1 control-label" >
													<button type="submit" class="btn btn-primary btn-sm">
														<i class="ace-icon fa fa-floppy-o"></i>
															Save
													</button>
												</label>
												<label class="col-sm-1 control-label" >
													<button type="reset" class="btn btn-default btn-sm">
														<i class="ace-icon fa fa-undo"></i>
															Reset
													</button>
												</label>
											</div>

										</form>	
									</div>
								</div>

								
							</div><!-- /.col -->
						</div><!-- /.row -->
					</div><!-- /.page-content -->
				</div>
			</div><!-- /.main-content -->

			