

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
							<li class="active">Item</li>
						</ul >
					</div>
		
					<div class="page-content">
						<div class="row">
							<div class="col-xs-12">

								<div class="row">
									<div class="col-xs-12">
										<?php echo $msg; ?>
										
										<a href="<?php echo base_url();?>item/add/0" class="btn btn-success btn-sm">
											<i class="ace-icon fa fa-plus-square-o"></i>
											Add New
										</a>
										<br>	<br>	

										<!-- div.table-responsive -->

										<!-- div.dataTables_borderWrap -->
										<div>
											<table id="dynamic-table" class="table table-striped table-bordered table-hover">
												<thead>
													<tr>
														<th>Code</th>
														<th>Name</th>
														<th>CRT Capacity</th>
														<th>Box Stock</th>
														<th>CRT Stock</th>
														<th>Buy Price</th>
														<th>Store Price</th>
														<th>Canvas Price</th>
														<th>Motoris Price</th>
														<th></th>
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

			