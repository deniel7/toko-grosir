	<!-- place any js here -->
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/datepicker.min.css" />
	<script src="<?php echo base_url(); ?>assets/js/bootstrap-datepicker.min.js"></script>

	<script src="<?php echo base_url(); ?>assets/js/autoNumeric.js"></script>

	<script type="text/javascript">
		jQuery(function($) {
				//initiate dataTables plugin
				var oTable1 = 
				$('#dynamic-table')
				//.wrap("<div class='dataTables_borderWrap' />")   //if you are applying horizontal scrolling (sScrollX)
				.dataTable( {
					bAutoWidth: false,
					"aoColumns": [
					  null, null, null,  null, null, null, null, { "bSortable": false }
					],
					"aaSorting": [],
					
					//,
					//"sScrollY": "200px",
					//"bPaginate": false,
			
					//"sScrollX": "100%",
					//"sScrollXInner": "120%",
					//"bScrollCollapse": true,
			
					//"iDisplayLength": 50
			    } );
				//oTable1.fnAdjustColumnSizing();
			
			
			
				
				
				$(document).on('click', '#dynamic-table .dropdown-toggle', function(e) {
					e.stopImmediatePropagation();
					e.stopPropagation();
					e.preventDefault();
				});
				
				
				//And for the first simple table, which doesn't have TableTools or dataTables
				//select/deselect all rows according to table header checkbox
				var active_class = 'active';
				$('#simple-table > thead > tr > th input[type=checkbox]').eq(0).on('click', function(){
					var th_checked = this.checked;//checkbox inside "TH" table header
					
					$(this).closest('table').find('tbody > tr').each(function(){
						var row = this;
						if(th_checked) $(row).addClass(active_class).find('input[type=checkbox]').eq(0).prop('checked', true);
						else $(row).removeClass(active_class).find('input[type=checkbox]').eq(0).prop('checked', false);
					});
				});
				
				//select/deselect a row when the checkbox is checked/unchecked
				$('#simple-table').on('click', 'td input[type=checkbox]' , function(){
					var $row = $(this).closest('tr');
					if(this.checked) $row.addClass(active_class);
					else $row.removeClass(active_class);
				});
			
				
			
				/********************************/
				//add tooltip for small view action buttons in dropdown menu
				$('[data-rel="tooltip"]').tooltip({placement: tooltip_placement});
				
				//tooltip placement on right or left
				function tooltip_placement(context, source) {
					var $source = $(source);
					var $parent = $source.closest('table')
					var off1 = $parent.offset();
					var w1 = $parent.width();
			
					var off2 = $source.offset();
					//var w2 = $source.width();
			
					if( parseInt(off2.left) < parseInt(off1.left) + parseInt(w1 / 2) ) return 'right';
					return 'left';
				}

				
				$('.date-picker').datepicker({
					autoclose: true,
					todayHighlight: true
				})

				//auto numeric
				$('.txt_numeric').autoNumeric('init', {vMin: '0', vMax: '99999999999'});
				$('#txt_total').autoNumeric('init', {vMin: '0', vMax: '99999999999'});
				
				//////////////////////////////////////////////// receiving ///////////////////////////////////////////////
				
				//add new row
	            $("#btn_add_row").click(function (){
	                var elements = document.getElementsByName("txt_item[]");
	                last_row = elements.length;
	                
	                var tambah  = "<tr>";
	                    tambah +=   "<td>";
	                    tambah +=       "<input type='hidden' id='txt_item_id_"+last_row+"' name='txt_item_id[]' class='col-xs-12' />";
	                    tambah +=       "<input type='text' id='txt_item_"+last_row+"' name='txt_item[]' class='col-xs-12' onclick='this.setSelectionRange(0, this.value.length)' />";
	                    tambah +=   	"<ul id='autocomplete_"+last_row+"' class='dropdown-menu' style='position:relative;width:100%'> </ul>";
	                    tambah +=   "</td>";
	                    tambah +=   "<td><input type='text' id='txt_qty_"+last_row+"' name='txt_qty[]' class='col-xs-12 txt_numeric' /></td>";
	                    tambah +=   "<td><input type='text' id='txt_buy_"+last_row+"' name='txt_buy[]' class='col-xs-12 txt_numeric' /></td>";
	                    //tambah +=   "<td><input type='text' id='txt_store_"+last_row+"' name='txt_store[]' class='col-xs-12 txt_numeric' /></td>";
	                    //tambah +=   "<td><input type='text' id='txt_to_"+last_row+"' name='txt_to[]' class='col-xs-12 txt_numeric' /></td>";
	                    //tambah +=   "<td><input type='text' id='txt_motoris_"+last_row+"' name='txt_motoris[]' class='col-xs-12 txt_numeric' /></td>";
	                    tambah +=   "<td><input type='text' id='txt_subtotal_"+last_row+"' name='txt_subtotal[]' class='col-xs-12 txt_numeric' readonly value='0' /></td>";
	                    tambah += "</tr>";
	                    
	                //$("#add_row").append(tambah);
	                $('#add_rec_table tr:last').after(tambah);

	                set_calculate(last_row);
					search_item(last_row);

	               /* hitung();

	                $('.numeric').on('blur change keyup', function() {
	                    hitung();
	                });*/

	            
	            });

				var elements = document.getElementsByName("txt_item[]");
				var count_row = elements.length -1;
				var i = 0; var tmp = 0;
				
				


				while(i<=count_row){
					set_calculate(i);
					search_item(i);
					i++;
				}
				
				$("#txt_recno").on('blur', function(event){   
	                event.preventDefault();

	                txt_recno = $("#txt_recno").val();

	                $.ajax({
	                    type    : "POST",
	                    url     : base_url+"receiving/rec_no_check/",
	                    data    : "txt_recno="+txt_recno,
	                    cache   : false,
	                    success : function(msg){
	                        data = msg;
	                        if (data=='1'){
	                            alert('Rec.No is Exists');
	                            $("#txt_recno").focus();
	                        }
	                                              
	                    }
	                });
	            });

				$("#frm_add_rec").on('submit', function(event){
	                event.preventDefault();
	                txt_recno = $("#txt_recno").val();

	                $.ajax({
	                    type    : "POST",
	                    url     : base_url+"receiving/rec_no_check/",
	                    data    : "txt_recno="+txt_recno,
	                    cache   : false,
	                    success : function(msg){
	                        data = msg;
	                        if (data=='1'){
	                            alert('Rec.No is Exists');
	                            $("#txt_recno").focus();
	                        }
	                        else {
	                            document.frm_add_rec.submit(); 
	                        }
	                    }
	                });
	                
	               
	            });

			})


			function set_calculate(i){
				$('#txt_qty_'+i+', #txt_buy_'+i).on('blur change keyup', function() {
				    calculate(i);
				});
			}

			function search_item(i){
				$("#txt_item_"+i).on('keyup keypress', function(){	
		    		var item = $("#txt_item_"+i).val();
					var min_length = 1; 
					if (item.length >= min_length) {
						$.ajax({
							type 	: "POST",
							url 	: base_url+"receiving/get_item/",
							data 	: "item="+item+"&row="+i,
							cache	: false,
							success	: function(msg){
								data = msg;
								$("#autocomplete_"+i).html(data);
								$("#autocomplete_"+i).show('linear');
							}
						});
					}else {
						$("#autocomplete_"+i).hide();
						$("#txt_item_"+i).val('');
					}
				});
			}

			function set_item(code, name, buy_price, lastrow){
				$("#txt_item_id_"+lastrow).val(code);
				$("#txt_item_"+lastrow).val(name);
				
				$("#txt_buy_"+lastrow).autoNumeric('init', {vMin: '0', vMax: '99999999999'});
				$("#txt_buy_"+lastrow).autoNumeric('set', buy_price);

				$("#autocomplete_"+lastrow).hide();
				$("#txt_qty_"+lastrow).focus();
				
				calculate(lastrow);
				return false;
			}

			function calculate(row){
				$('#txt_buy_'+row).autoNumeric('init', {vMin: '0', vMax: '99999999999'});
				$('#txt_qty_'+row).autoNumeric('init', {vMin: '0', vMax: '99999999999'});
				$('#txt_subtotal_'+row).autoNumeric('init', {vMin: '0', vMax: '99999999999'});
				$('#txt_total').autoNumeric('init', {vMin: '0', vMax: '99999999999'});

				buy_price = $("#txt_buy_"+row).autoNumeric('get');
				qty = $("#txt_qty_"+row).autoNumeric('get');
				sub = $("#txt_subtotal_"+row).autoNumeric('get');

				sub = buy_price * qty;
				$("#txt_subtotal_"+row).autoNumeric('set', sub);
				
				var elements = document.getElementsByName("txt_subtotal[]");
				var count_row = elements.length - 1;
				var x = 0; var tmp = 0;

				while(x<=count_row){
					tmp = tmp + parseInt($("#txt_subtotal_"+x).autoNumeric('get'));
					x++;
				}

				$("#txt_total").autoNumeric('set', tmp);

			}

			function format_number(str){
				tmp = str.replace(",", ""); 
				tmp2 = str.replace(".", ""); 
				return tmp2;
			}


	</script>						


	
</head>
