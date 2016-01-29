

			<div class="main-content">
				<div class="main-content-inner">
					<div class="breadcrumbs" id="breadcrumbs">
						<script type="text/javascript">
							try{ace.settings.check('breadcrumbs' , 'fixed')}catch(e){}
						</script>

						<ul class="breadcrumb">
							<li>
								<i class="ace-icon fa fa-pencil-square-o pencil-square-o-icon"></i>
								Transaction
							</li>
							<li><a href="<?php echo base_url();?>receiving/list/0" >Receiving</a></li>
							<li class="active">Edit</li>
						</ul >
					</div>
		
					<div class="page-content">
						<div class="row">
							<div class="col-xs-12 " ><?php echo $msg; ?></div>
							
							<div class="col-xs-12 form_apps" >
								<div class="row">
									<div class="col-xs-12">
										<form action="<?php echo base_url(); ?>receiving/edit_exe" method="post" name="frm_edit_rec" id="frm_edit_rec" class="form-horizontal" role="form" autocomplete="off">
											<div class="form-group">
												<label class="col-sm-1 control-label no-padding-left" >Rec.No</label>
												<div class="col-sm-3">
													<input type="text" id="txt_recno_edit" name="txt_recno_edit" class="col-xs-12" readonly maxlength="14" value="<?php echo $rec_no; ?>" />
													<input type="hidden" id="txt_id" name="txt_id" class="col-xs-12" value="<?php echo $id; ?>" />
												</div>
												<div class="col-sm-8">
													<select name='cb_supplier' id='cb_supplier' class="col-xs-12">
														<?php echo $list_supplier; ?>
													</select>
												</div>
											</div>

											<div class="form-group">
												<label class="col-sm-1 control-label no-padding-left" >Date</label>
												<div class="col-sm-11">
													<input type="text" id="txt_date" name="txt_date" class="col-xs-12 date-picker" value="<?php echo $date; ?>" data-date-format='dd-mm-yyyy' required />
												</div>
											</div>

											

											<div class="form-group">
												<label class="col-sm-1 control-label no-padding-left" >Payment</label>
												<div class="col-sm-3">
													<?php echo $list_payment; ?>
												</div>
												
												<div class="col-sm-8">
													<input type="text" id="txt_due" name="txt_due" class="col-xs-12 date-picker" value="<?php echo $due_date; ?>" placeholder="due date" data-date-format='dd-mm-yyyy' />
												</div>
											</div>
											
											<div class="form-group">
												<table id="add_rec_table" class="table" style="width:99%;margin-bottom:0px">
													<thead>
														<tr>
															<th style='width:34%'>Item</th>
															<th  style='width:8%'>QTY</th>
															<th>Buy Price</th>
												<!--		<th>Store Price</th>
															<th>TO Price</th>
															<th>Motoris Price</th>
													-->		
															<th>Subtotal</th>
														</tr>
													</thead>

													<tbody>
														
														<?php echo $list_detail; ?>
														<div id='add_row' class="form-group"></div>
														
													</tbody>
												</table>
											</div>

											<div class="form-group" style="padding-right:6px;">
												<label class="col-sm-10 control-label no-padding-left" style="text-align:right;"><b>Total</b></label>
												<div class="col-sm-2" style="">
													<input type='text' id='txt_total' name='txt_total' class='col-xs-12 txt_numeric' value="<?php echo $total; ?>" readonly />
												</div>
											</div>

											<div class="form-group">
												<div class="col-sm-12">
													<button type="button" class="btn btn-success btn-sm" id="btn_add_row">
														<i class="ace-icon fa fa-arrow-down icon-on-down"></i>Add Row
													</button>
												
													<button type="submit" class="btn btn-primary btn-sm">
														<i class="ace-icon fa fa-floppy-o"></i>Save
													</button>
												
													<button type="reset" class="btn btn-default btn-sm">
														<i class="ace-icon fa fa-undo"></i>Reset
													</button>
												</div>
											</div>

										</form>	
									</div>
								</div>

								
							</div><!-- /.col -->
						</div><!-- /.row -->
					</div><!-- /.page-content -->
				</div>
			</div><!-- /.main-content -->

			