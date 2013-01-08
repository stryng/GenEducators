<script type="text/javascript" language="javascript">
function first_level_load(val)
{
	var url = val.split("&"); var nstart = url[1].split("="); var start = url[2].split("="); var num_totrec2 = url[3].split("=");
	var n2 = url[4].split("=");  			
	$.get("ajax/message_inbox.php", { nstart:nstart[1] , start:start[1] , num_totrec2:num_totrec2[1] , n2:n2[1] },function(data){
		$("#message_inox_div").html(data);
		$(".titleIcon input:checkbox").click(function() {				  
			var checkedStatus = this.checked;
			$("#checkAllinbox tbody tr td:first-child input:checkbox").each(function() {
				this.checked = checkedStatus;
					if (checkedStatus == this.checked) {
						$(this).closest('.checker > span').removeClass('checked');
						$(this).closest('table tbody tr').removeClass('thisRow');
					}
					if (this.checked) {
						$(this).closest('.checker > span').addClass('checked');
						$(this).closest('table tbody tr').addClass('thisRow');
					}
			});
		});
		
		
		$(function() {
		$('#checkAllinbox tbody tr td:first-child input[type=checkbox]').change(function() {
			$(this).closest('tr').toggleClass("thisRow", this.checked);
			});
		});
		
		$(".allcheck :checkbox, .chkbox :checkbox").uniform();		
		//$("select, .check, .check :checkbox, input:radio, input:file").uniform();		
	});		 
}


function second_level_load(val)
{
	var url = val.split("&"); var nstart = url[1].split("="); var start = url[2].split("="); var num_totrec2 = url[3].split("=");
	var n2 = url[4].split("=");  			
	$.get("ajax/message_sentbox.php", { nstart:nstart[1] , start:start[1] , num_totrec2:num_totrec2[1] , n2:n2[1] },function(data){
		$("#message_sentbox_div").html(data);
		$(".sentIcon input:checkbox").click(function() {
			var checkedStatus = this.checked;
			$("#checkAllsent tbody tr td:first-child input:checkbox").each(function() {
				this.checked = checkedStatus;
					if (checkedStatus == this.checked) {
						$(this).closest('.checker > span').removeClass('checked');
						$(this).closest('table tbody tr').removeClass('thisRow');
					}
					if (this.checked) {
						$(this).closest('.checker > span').addClass('checked');
						$(this).closest('table tbody tr').addClass('thisRow');
					}
			});
		});	
		
		$(function() {
		$('#checkAllsent tbody tr td:first-child input[type=checkbox]').change(function() {
			$(this).closest('tr').toggleClass("thisRow", this.checked);
			});
		});
		$(".sentcheck :checkbox, .chkbox :checkbox").uniform();//sentcheck
		//$("select, .check, .check :checkbox, input:radio, input:file").uniform();		
	});		 
}

function third_level_load(val)
{
	var url = val.split("&"); var nstart = url[1].split("="); var start = url[2].split("="); var num_totrec2 = url[3].split("=");
	var n2 = url[4].split("=");  			
	$.get("ajax/message_reply.php", { nstart:nstart[1] , start:start[1] , num_totrec2:num_totrec2[1] , n2:n2[1] },function(data){
		$("#message_replay_div").html(data);
		$(".replyIcon input:checkbox").click(function() {
			var checkedStatus = this.checked;
			$("#check_reply tbody tr td:first-child input:checkbox").each(function() {
				this.checked = checkedStatus;
					if (checkedStatus == this.checked) {
						$(this).closest('.checker > span').removeClass('checked');
						$(this).closest('table tbody tr').removeClass('thisRow');
					}
					if (this.checked) {
						$(this).closest('.checker > span').addClass('checked');
						$(this).closest('table tbody tr').addClass('thisRow');
					}
			});
		});	
		
		$(function() {
		$('#check_reply tbody tr td:first-child input[type=checkbox]').change(function() {
			$(this).closest('tr').toggleClass("thisRow", this.checked);
			});
		});
		$(".replyall :checkbox, .chkbox :checkbox").uniform();//replyallcheck
		//$("select, .check, .check :checkbox, input:radio, input:file").uniform();		
	});		 
}
</script>
<style type="text/css">
	.checkmsg:hover{
		background-color:#FFFFFF !important;
	}
</style>
<div id="content">
	<!-- Main content -->
	<div class="wrapper">
		<?php require_once('message_inbox.php'); ?>
		<?php require_once('message_sentbox.php'); ?>
		<?php require_once('message_reply.php'); ?>
	</div>
</div>