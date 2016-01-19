

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
							<li><a href="<?php echo base_url();?>item/list/0" >Item</a></li>
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
										<form action="<?php echo base_url(); ?>item/add_exe" method="post" name="frm_add_item" id="frm_add_item" class="form-horizontal" role="form">
											<div class="form-group">
												<label class="col-sm-2 control-label no-padding-left" >Code</label>
												<div class="col-sm-2">
													<input type="text" id="txt_code" name="txt_code" class="col-xs-12" required />
												</div>

												
												<div class="col-sm-2">
													<?php echo $list_item_type; ?>
												</div>

												<label class="col-sm-3 control-label no-padding-left" style='text-align:right;' >CRT Capacity</label>
												<div class="col-sm-3">
													<input type="text" id="txt_qty" name="txt_capacity" class="col-xs-12 txt_numeric" required />
												</div>
											</div>

											<div class="form-group">
												<label class="col-sm-2 control-label no-padding-left" >Name</label>
												<div class="col-sm-10">
													<input type="text" id="txt_name" name="txt_name" class="col-xs-12" required />
												</div>
											</div>

											<div class="form-group">
												<label class="col-sm-2 control-label no-padding-left" >Store Price</label>
												<div class="col-sm-10">
													<input type="text" id="txt_store" name="txt_store" class="col-xs-12 txt_numeric" required />
												</div>
											</div>

											<div class="form-group">
												<label class="col-sm-2 control-label no-padding-left" >TO Price</label>
												<div class="col-sm-10">
													<input type="text" id="txt_to" name="txt_to" class="col-xs-12 txt_numeric" required />
												</div>
											</div>

											<div class="form-group">
												<label class="col-sm-2 control-label no-padding-left" >Motoris Price</label>
												<div class="col-sm-10">
													<input type="text" id="txt_motoris" name="txt_motoris" class="col-xs-12 txt_numeric" required />
												</div>
											</div>

											
											<br><br>
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

			