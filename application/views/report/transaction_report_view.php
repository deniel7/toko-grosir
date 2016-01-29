

			<div class="main-content">
				<div class="main-content-inner">
					<div class="breadcrumbs" id="breadcrumbs">
						<script type="text/javascript">
							try{ace.settings.check('breadcrumbs' , 'fixed')}catch(e){}
						</script>

						<ul class="breadcrumb">
							<li>
								<i class="ace-icon fa fa-book book-icon"></i>
								Report
							</li>
							<li class="active">Transaction</li>
						</ul >
					</div>
		
					<div class="page-content">
						<div class="row">
							<div class="col-xs-12">
							<?php echo $msg; ?>
							<br>
								<div class="row">
									<div class="col-xs-12 form_apps">
										<form action="<?php echo base_url(); ?>report/create_transaction_report" method="post" name="frm_transaction_report" id="frm_transaction_report" class="form-horizontal" role="form">
											<div class="form-group">
												<label class="col-sm-1 control-label no-padding-left" >Report Type</label>
												<div class="col-sm-11">
													<select id="cb_type" name="cb_type" class="col-xs-12">
														  <option value="1">Account Payable</option>
														  <option value="2">Account Receivable</option>
														  <option value="3">Receiving</option>
														  <option value="4">Sales</option>
													 </select> 
												</div>
											</div>

											<div class="form-group">
												<label class="col-sm-1 control-label no-padding-left" >From</label>
												<div class="col-sm-5">
													<input type="text" id="txt_from" value="<?php echo $from; ?>" name="txt_from" class="col-xs-12 date-picker" data-date-format='dd-mm-yyyy' />
												</div>
												<label class="col-sm-1 control-label no-padding-left" >To</label>
												<div class="col-sm-5">
													<input type="text" id="txt_to" value="<?php echo $to; ?>" name="txt_to" class="col-xs-12 date-picker" data-date-format='dd-mm-yyyy' />
												</div>
											</div>
											<br>
											<div class="form-group">
												<div class="col-sm-12">
													<button type="submit" class="btn btn-primary btn-sm">
														<i class="ace-icon fa fa-print"></i>Create
													</button>
													<button type="button" class="btn btn-danger btn-sm" id="btn_excel">
														<i class="ace-icon fa fa-file-excel-o icon-file-excel-o"></i>Export to Excel
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

			