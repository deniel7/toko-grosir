


		<div class="main-container" id="main-container">
			<script type="text/javascript">
				try{ace.settings.check('main-container' , 'fixed')}catch(e){}
			</script>

			<div id="sidebar" class="sidebar responsive">
				<script type="text/javascript">
					try{ace.settings.check('sidebar' , 'fixed')}catch(e){}
				</script>

	<!--			<div class="sidebar-shortcuts" id="sidebar-shortcuts">
					<div class="sidebar-shortcuts-large" id="sidebar-shortcuts-large">
						<button class="btn btn-success">
							<i class="ace-icon fa fa-signal"></i>
						</button>

						<button class="btn btn-info">
							<i class="ace-icon fa fa-pencil"></i>
						</button>

						<button class="btn btn-warning">
							<i class="ace-icon fa fa-users"></i>
						</button>

						<button class="btn btn-danger">
							<i class="ace-icon fa fa-cogs"></i>
						</button>
					</div>

					<div class="sidebar-shortcuts-mini" id="sidebar-shortcuts-mini">
						<span class="btn btn-success"></span>

						<span class="btn btn-info"></span>

						<span class="btn btn-warning"></span>

						<span class="btn btn-danger"></span>
					</div>
				</div> 
/.sidebar-shortcuts -->


				<ul class="nav nav-list">
					<li class="">
						<a href="<?php echo base_url(); ?>home">
							<i class="menu-icon fa fa-home home-icon"></i>
							<span class="menu-text"> Home </span>
						</a>

						<b class="arrow"></b>
					</li>

	<!--				<li class="">
						<a href="#" class="dropdown-toggle">
							<i class="menu-icon fa fa-desktop"></i>
							<span class="menu-text">
								UI &amp; Elements
							</span>

							<b class="arrow fa fa-angle-down"></b>
						</a>

						<b class="arrow"></b>

						<ul class="submenu">
							<li class="">
								<a href="#" class="dropdown-toggle">
									<i class="menu-icon fa fa-caret-right"></i>

									Layouts
									<b class="arrow fa fa-angle-down"></b>
								</a>

								<b class="arrow"></b>

								<ul class="submenu">
									<li class="">
										<a href="top-menu.html">
											<i class="menu-icon fa fa-caret-right"></i>
											Top Menu
										</a>

										<b class="arrow"></b>
									</li>

									<li class="">
										<a href="two-menu-1.html">
											<i class="menu-icon fa fa-caret-right"></i>
											Two Menus 1
										</a>

										<b class="arrow"></b>
									</li>

									<li class="">
										<a href="two-menu-2.html">
											<i class="menu-icon fa fa-caret-right"></i>
											Two Menus 2
										</a>

										<b class="arrow"></b>
									</li>
								</ul>
							</li>

							<li class="">
								<a href="typography.html">
									<i class="menu-icon fa fa-caret-right"></i>
									Typography
								</a>

								<b class="arrow"></b>
							</li>

							<li class="">
								<a href="elements.html">
									<i class="menu-icon fa fa-caret-right"></i>
									Elements
								</a>

								<b class="arrow"></b>
							</li>


						</ul>
					</li>
		-->			
					<li class="open">
						<a href="#" class="dropdown-toggle">
							<i class="menu-icon fa fa-archive"></i>
							<span class="menu-text">Master</span>

							<b class="arrow fa fa-angle-down"></b>
						</a>
						<b class="arrow"></b>

						<ul class="submenu">
							<li class="">
								<a href="<?php echo base_url(); ?>customer/list/0">
									<i class="menu-icon fa fa-caret-right"></i>Customer
								</a>
								<b class="arrow"></b>
							</li>

							<li class="">
								<a href="<?php echo base_url(); ?>item/list/0">
									<i class="menu-icon fa fa-caret-right"></i>Item
								</a>
								<b class="arrow"></b>
							</li>

							<li class="">
								<a href="<?php echo base_url(); ?>salesman/list/0">
									<i class="menu-icon fa fa-caret-right"></i>Salesman
								</a>
								<b class="arrow"></b>
							</li>

							<li class="">
								<a href="<?php echo base_url(); ?>supplier/list/0">
									<i class="menu-icon fa fa-caret-right"></i>Supplier
								</a>
								<b class="arrow"></b>
							</li>

							<li class="">
								<a href="<?php echo base_url(); ?>user/list/0">
									<i class="menu-icon fa fa-caret-right"></i>User
								</a>
								<b class="arrow"></b>
							</li>
							
						</ul>
					</li>

					<li class="open">
						<a href="#" class="dropdown-toggle">
							<i class="menu-icon fa fa-pencil-square-o"></i>
							<span class="menu-text">Transaction</span>

							<b class="arrow fa fa-angle-down"></b>
						</a>
						<b class="arrow"></b>

						<ul class="submenu">
							<li class="">
								<a href="<?php echo base_url(); ?>utang/list/0">
									<i class="menu-icon fa fa-caret-right"></i>Account Payable
								</a>
								<b class="arrow"></b>
							</li>
							<li class="">
								<a href="<?php echo base_url(); ?>piutang/list/0">
									<i class="menu-icon fa fa-caret-right"></i>Account Receivable
								</a>
								<b class="arrow"></b>
							</li>
					<!--		<li class="">
								<a href="<?php //echo base_url(); ?>biaya/list/0">
									<i class="menu-icon fa fa-caret-right"></i>Other Expenses
								</a>
								<b class="arrow"></b>
							</li>
						-->	
							<li class="">
								<a href="<?php echo base_url(); ?>receiving/list/0">
									<i class="menu-icon fa fa-caret-right"></i>Receiving
								</a>
								<b class="arrow"></b>
							</li>

							<li class="">
								<a href="<?php echo base_url(); ?>sales/list/0">
									<i class="menu-icon fa fa-caret-right"></i>Sales
								</a>
								<b class="arrow"></b>
							</li>
							
						</ul>
					</li>

					<li class="open">
						<a href="#" class="dropdown-toggle">
							<i class="menu-icon fa fa-book"></i>
							<span class="menu-text">Report</span>

							<b class="arrow fa fa-angle-down"></b>
						</a>
						<b class="arrow"></b>

						<ul class="submenu">
							<li class="">
								<a href="<?php echo base_url(); ?>report/stock/0">
									<i class="menu-icon fa fa-caret-right"></i>Stock
								</a>
								<b class="arrow"></b>
							</li>
							<li class="">
								<a href="<?php echo base_url(); ?>report/transaction/0">
									<i class="menu-icon fa fa-caret-right"></i>Transaction
								</a>
								<b class="arrow"></b>
							</li>
							
							
						</ul>
					</li>

		<!--			<li class="">
						<a href="widgets.html">
							<i class="menu-icon fa fa-list-alt"></i>
							<span class="menu-text"> Widgets </span>
						</a>

						<b class="arrow"></b>
					</li>
			-->		



					
				</ul><!-- /.nav-list -->


				<div class="sidebar-toggle sidebar-collapse" id="sidebar-collapse">
					<i class="ace-icon fa fa-angle-double-left" data-icon1="ace-icon fa fa-angle-double-left" data-icon2="ace-icon fa fa-angle-double-right"></i>
				</div>

				<script type="text/javascript">
					try{ace.settings.check('sidebar' , 'collapsed')}catch(e){}
				</script>
			</div>