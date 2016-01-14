
		<div id="bpmmiddle">
			
			<div id="bpmleftcol">
				<!-- BEGIN Column Index -->
				<div class="moduletableth" title="<?php echo $this->session->userdata['monev_logged_in']['name']; ?>">
					<?php 
						echo $this->session->userdata['monev_logged_in']['name'];
					?>
				</div>
				
				<div class="modul_atas" style="min-height:15%;">
					<div class="moduleitem" id="pkg0_">
						<img alt="" src="<?php echo base_url(); ?>assets/images/box-0.gif" style="border:0; width:11px; height:7px">&nbsp;
						<a class="mainlevel" href="#">Home</a>
					</div>
					
					<div class="modulebottomitem" id="pkg0_1">
						<img alt="" src="<?php echo base_url(); ?>assets/images/box-0.gif" style="border:0; width:11px; height:7px">&nbsp;
						<a class="mainlevel" href="<?php echo base_url(); ?>login/logout">Logout</a>
					</div>
				</div>
				
				<div class="moduletableth">Index</div>
				<div class="modulebottomitem" id="pkg1_1" style="overflow:scroll; min-height:74%;"> 

					<script language="JavaScript">
					<!--//
						new tree (TREE_ITEMS, TREE_TPL);
					//-->
					</script>		
				</div>		
			</div> 
			<!-- End left.php -->