

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
							<li class="active">Account Payable</li>
						</ul >
					</div>
		
					<div class="page-content">
						<div class="row">
							<div class="col-xs-12">

								<div class="row">
									<div class="col-xs-12">
									<!--	<a href="<?php //echo base_url();?>supplier/add/0" class="btn btn-danger btn-sm">
											<i class="ace-icon fa fa-file-excel-o"></i>
											Export to Excel
										</a>
										-->
										<br>	<br>	

										<!-- div.table-responsive -->

										<!-- div.dataTables_borderWrap -->
										<div>
											<table id="dynamic-table" class="table table-striped table-bordered table-hover">
												<thead>
													<tr>
														<th>Rec.No</th>
														<th>Supplier</th>
														<th>Date</th>
														<th>Due Date</th>
														<th>Total</th>
														<th>Status</th>
													</tr>
												</thead>

												<tbody>
													<?php echo $row; ?>

													
												</tbody>
											</table>
										</div>

									<!--	<br>
										<div class="clearfix">
											<div class="pull-right tableTools-container"></div>
										</div>
								-->
									</div>
								</div>

								
							</div><!-- /.col -->
						</div><!-- /.row -->
					</div><!-- /.page-content -->
				</div>
			</div><!-- /.main-content -->

			