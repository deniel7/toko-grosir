

			<div class="main-content">
				<div class="main-content-inner">
					<div class="breadcrumbs" id="breadcrumbs">
						<script type="text/javascript">
							try{ace.settings.check('breadcrumbs' , 'fixed')}catch(e){}
						</script>

						<ul class="breadcrumb">
							<li>
								<i class="ace-icon fa fa-pencil-square-o pencil-square-o-icon"></i>
								Master
							</li>
							<li><a href="<?php echo base_url();?>salesman/list/0" >Salesman</a></li>
							<li class="active">Edit</li>
						</ul >
					</div>
		
					<div class="page-content">
						<div class="row">
							<div class="col-xs-12">
							<?php echo $msg; ?>
							<br>
								<div class="row">
									<div class="col-xs-12">
										<form action="<?php echo base_url(); ?>salesman/edit_exe" method="post" name="frm_edit_cust" id="frm_edit_cust" class="form-horizontal" role="form">
											<div class="form-group">
												<label class="col-sm-1 control-label no-padding-left" >Name</label>
												<div class="col-sm-7">
													<input type="text" id="txt_name" name="txt_name" class="col-xs-12" required value="<?php echo $name; ?>" />
													<input type="hidden" id="txt_id" name="txt_id" value="<?php echo $id; ?>" />
												</div>
												<label class="col-sm-1 control-label no-padding-left" >Phone</label>
												<div class="col-sm-3">
													<input type="text" id="txt_phone" name="txt_phone" class="col-xs-12" value="<?php echo $phone; ?>" />
												</div>
											</div>

											<div class="form-group">
												<label class="col-sm-1 control-label no-padding-left" >Address</label>
												<div class="col-sm-11">
													<input type="text" id="txt_address" name="txt_address" class="col-xs-12" value="<?php echo $address; ?>" />
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

			