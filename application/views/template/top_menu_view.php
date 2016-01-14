<script>
	var myVar=setInterval(function(){myTimer()},1000);
        function myTimer() {
            var d=new Date();
            var monthname=new Array("Jan","Feb","Mar","Apr","Mei","Jun","Jul","Ags", "Sep","Oct","Nov","Des");
                    
            var t=' '+d.getDate()+ ' ' + monthname[d.getMonth()] + ' ' +d.getFullYear()+' | ' + d.toLocaleTimeString();
            document.getElementById("bpmsearchbar").innerHTML=t;
        } 
</script>

<body>
	<div id="refdetails" style="position:fixed; top:0; left:0; z-index: 100; padding:10px; border:1px solid black; display:none; background-color:#FFFFD7; overflow: auto; max-height:80%"></div>
	
	<div id="bpmpage">
		<!-- START HEADER -->
		<div id="bpmheader">
			<div id="bpmlogo">
				<a href="#"></a>
			</div>
			
			<div id="bpmtitle"><img src="<?php echo base_url(); ?>assets/img/yogya_group_no_title.png" /> magna</div>
			
			<div id="bpmheaderright">
				<div id="bpmlinks">
					<!--
					<a href="http://mpdf1.com/manual/index.php">Home</a> | 
					<a href="http://www.mpdf1.com/forum/">Forum</a> | 
					<a href="http://www.mpdf1.com/">mPDF website</a>
					-->
				</div>
			</div>
			
			<div class="clearer"></div>
		</div><!-- END HEADER -->
		
		
		
		<!-- SEARCH BAR -->
			<div id="bpmsearchbar" style="padding-right:10px; height:20px;padding-top:7px;">
				&nbsp;
			</div>
		
		<!-- End Header -->