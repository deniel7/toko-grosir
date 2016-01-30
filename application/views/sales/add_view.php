

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
							<li><a href="<?php echo base_url();?>sales/list/0" >Sales</a></li>
							<li class="active">Add New</li>
						</ul >
					</div>
		
					<div class="page-content">
						<div class="row">
							<div class="col-xs-12 " ><?php echo $msg; ?></div>
							
							<form action="<?php echo base_url(); ?>sales/add_exe" method="post" name="add_sales_table" id="add_sales_table" class="form-horizontal" role="form">
							
							<div class="col-xs-12 form_apps" >
								<div class="row">
									<div class="col-xs-12">
										<div class="form-group">
												<label class="col-sm-1 control-label no-padding-left" >Sales.No</label>
												<div class="col-sm-3">
													<input type="text" id="txt_salesno" name="txt_salesno" class="col-xs-12" required maxlength="14" autofocus />
												</div>
												
										</div>

										<div class="form-group">

												<label class="col-sm-1 control-label no-padding-left" >Customer</label>
												
												<div class="col-sm-11">
													<select name='cb_supplier' id='cb_supplier' class="col-xs-12">
														<?php echo $list_customer; ?>
													</select>
												</div>

										</div>

										


										<div class="form-group">
												
												<label class="col-sm-1 control-label no-padding-left" >Salesman</label>
												
												<div class="col-sm-11">
													<select name='cb_salesman' id='cb_salesman' class="col-xs-12">
															<?php echo $list_salesman; ?>
													</select>
												</div>
												
										</div>
										<div class="form-group">
												<label class="col-sm-1 control-label no-padding-left" >Date</label>
												<div class="col-sm-11">
													<input type="text" id="txt_date" name="txt_date" class="col-xs-12 date-picker" value='<?php echo $date; ?>' data-date-format='dd-mm-yyyy' required />
												</div>
											</div>
														

									</div>
									
													


									<div class="col-xs-12">
										

											<div class="form-group">
												<label class="col-sm-1 control-label no-padding-left" >Payment</label>
												<div class="col-sm-3">
													<?php echo $list_payment; ?>
												</div>
												
												<div class="col-sm-8">
													<input type="text" id="txt_due" name="txt_due" class="col-xs-12 date-picker" placeholder="due date" data-date-format='dd-mm-yyyy' />
												</div>
											</div>

											<br>
											<div class="form-group">
												<table id="add_rec_table" class="table" style="width:99%;">
													<thead>
														<tr>
															<th style='width:30%'>Item</th>
															<th style='width:8%'>Stock</th>
															<th style='width:8%'>Price</th>
															<th style='width:8%'>CRT / Box</th>
															<th>Sell Price</th>
															<th>Qty</th>
															<!-- <th>Disc</th>
															<th>Nett</th> -->
															<th>Subtotal</th>
														</tr>
													</thead>

													<tbody>
														
														<?php echo $item_row; ?>
														<div id='add_row' class="form-group"></div>
													<!--	<tr>
															<td colspan='6' style='text-align:right;'>
																<b>Total
															</td>
															<td>
																
															</td>
														</tr>
														-->
													</tbody>
												</table>
											</div>

											<div class="form-group" style="padding-right:6px;">
												<label class="col-sm-10 control-label no-padding-left" style="text-align:right;"><b>Total</b></label>
												<div class="col-sm-2" style="">
													<input type='text' id='txt_total' name='txt_total' class='col-xs-12 txt_numeric' readonly />
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

			