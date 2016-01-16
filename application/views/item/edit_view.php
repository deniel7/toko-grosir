

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
										<form action="<?php echo base_url(); ?>item/edit_exe" method="post" name="frm_edit_item" id="frm_edit_item" class="form-horizontal" role="form">
											<div class="form-group">
												<label class="col-sm-1 control-label no-padding-left" >Code</label>
												<div class="col-sm-2">
													<input type="text" id="txt_code" name="txt_code" class="col-xs-12" value="<?php echo $code; ?>" readonly />
												</div>

												
												<div class="col-sm-2">
													<label>
														<input name="rb_unit" type="radio" class="ace" value='1' <?php echo ($unit=='1'?'checked':''); ?> />
														<span class="lbl"> CRT</span>
													</label>
													<label>
														<input name="rb_unit" type="radio" class="ace" value='2' <?php echo ($unit=='2'?'checked':''); ?> />
														<span class="lbl">Box</span>
													</label>
												</div>

												<label class="col-sm-1 control-label no-padding-left" >Qty</label>
												<div class="col-sm-6">
													<input type="text" id="txt_qty" name="txt_qty" class="col-xs-12 txt_numeric" required value="<?php echo $unit_qty; ?>" />
												</div>
											</div>

											<div class="form-group">
												<label class="col-sm-1 control-label no-padding-left" >Name</label>
												<div class="col-sm-11">
													<input type="text" id="txt_name" name="txt_name" class="col-xs-12" required value="<?php echo $name; ?>" />
												</div>
											</div>

											<div class="form-group">
												<label class="col-sm-1 control-label no-padding-left" >Stock</label>
												<div class="col-sm-11">
													<input type="text" id="txt_stock" name="txt_stock" class="col-xs-12 txt_numeric" required value="<?php echo $stock; ?>" />
												</div>
											</div>

											<div class="form-group">
												<label class="col-sm-3 control-label no-padding-left" >Buy Price</label>
												<label class="col-sm-3 control-label no-padding-left" >Store Price</label>
												<label class="col-sm-3 control-label no-padding-left" >Canvas Price</label>
												<label class="col-sm-3 control-label no-padding-left" >Motoris Price</label>
											</div>

											<div class="form-group">
												<div class="col-sm-3">
													<input type="text" id="txt_buy" name="txt_buy" class="col-xs-12 txt_numeric" required value="<?php echo $buy_price; ?>" />
												</div>

												<div class="col-sm-3">
													<input type="text" id="txt_store" name="txt_store" class="col-xs-12 txt_numeric" required value="<?php echo $store_price; ?>" />
												</div>

												<div class="col-sm-3">
													<input type="text" id="txt_canvas" name="txt_canvas" class="col-xs-12 txt_numeric" required value="<?php echo $canvas_price; ?>" />
												</div>

												<div class="col-sm-3">
													<input type="text" id="txt_motoris" name="txt_motoris" class="col-xs-12 txt_numeric" required value="<?php echo $motoris_price; ?>" />
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

			