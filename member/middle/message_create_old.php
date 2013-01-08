<?php
	if(isset($_POST['btn_send']))
	{
		//echo "<pre>";print_r($_POST);echo "</pre>";;die;
		//print_r($_POST['selmember']);die;
		/*Array
		(
			[selusertype] => merber
			[txtadmin] => admin@admin.com
			[selmember] => Array
				(
					[0] => 16
				)
		
			[subject] => first msg
			[message] => test for first message send to admin1 1admin ( admin1@admin.com ) from pradip1
			[btn_send] => Send
		)*/
		
		$subject = $_POST['subject'];
		$content = $_POST['message'];
		$mail_from = $_SESSION['useremail'];
		$from_type = 'user';
		
		if($_POST['selusertype'] =='admin' ){
			$to = '0';//$_POST['txtadmin'];
			@$to_type = 'user';
		}else{
			//$to       = explode(",",$_POST['selmember']);
			$to = $_POST['selmember'];
			@$to_type = 'user';
		}
		
		/*else if($_POST['selusertype'] =='merber' ){
			$to       = explode(";",$_POST['selmember']);
			@$to_type = 'user';
		}else{
			$to       = $_POST['merchant'];
			@$to_type = 'merchant';
		}*/
		
		
		$created_date = date('Y-m-d H:i:s');
		for($i=0;$i<count($to);$i++){
			$token=getGUID();
			//echo "sub========".$subject."=====con======".$content."====mail form=======".$mail_from."===to=====".$to[$i]."===date====".$created_date."==form type==".$from_type."to type".$to_type."===reply id===".$reply_id;
			//$content = "Subject : ".$subject."<br> Message : ".$content;
			//$msgtextmerchant = $obj -> add_email_new($subject,$content,$mail_from,$to[$i],$created_date,$from_type,$to_type,$reply_id,$add_header,$add_footer);
			$sql = "INSERT INTO message_in (userid,  token , msg_sub,  msg_desc, to_u_id, msg_datetime)VALUES ('".$_SESSION['sess_sp_id']."',  '".$token."', '".$subject."', '".$content." ', '".$to[$i]."', '".$created_date."')";
			//echo "<br><br>".$sql;
			$form->inser_qry($sql);
		}
		//die;
		//echo SERVICE_PATH; die;
		?>
		<script language="javascript" type="text/javascript">
			window.location = "message.php?suc";
		</script>
		<?php
			//header('location : '.SERVICE_PATH.'message.php?suc');
		die();	
	  }
  
?>
<script type="text/javascript">
$(document).ready(function(){
	
	$("#memberdiv").hide();
	
	$("input[name$='selusertype']").click(function() {
        var test = $(this).val();
        if(test == "admin"){
			$("#memberdiv").hide();
			$("#admindiv").show();
		}else{
			$("#admindiv").hide();
			$("#memberdiv").show();
		}
    }); 
	
	$("#editoerror").css("display","none");
	
	$("#btn_send").click(function(){
		
		//===== menber combo
		if(document.getElementById("selmember"))
		{
			var user = $("#selmember").val();
			//alert(user);
			if(user == null)
			{
				//alert("sadgjagsdjgjasgd");
			}
		}
		//==== editor validation 
		var editor = $("#editor").val();
		//alert(editor);
		if(editor == "" ){ $("#editoerror").css("display","block"); }
		else{$("#editoerror").css("display","none"); }
		
		if(editor == ""){
			return false;
		}else{
				return true;
		}
	});
	
});
</script>
<style type="text/css">
.mareditor{
	margin:0% 0% 0% 2%;
}
.cuserror{
	margin:0% 0% -2% 17% !important;
	width:30%;
	color:#A73939;
	font-size: 11px;
	white-space: nowrap;
}
</style>

<!-- Content begins -->
<div id="content">
    <!--<div class="contentTop">
        <span class="pageTitle"><span class="icon-link"></span>Support Ticket</span>
        	<!--================= include top_title_count file start ===========-->
		
			<!--================= include top_title_count file close ===========-
        <div class="clear"></div>
    </div> -->
    
    <!-- Main content -->
    <div class="wrapper">
	<form id="usualValidate" name="frm_sendmail" class="main" method="post" >
            <fieldset>
                <div class="widget fluid">
                    <div class="whead"><h6>Create new ticket</h6>
					<div class="clear"></div></div>
					<div class="formRow" style="display:none">
						<div class="grid2"><label>Select User :</label> </div>
						<div class="grid10">
								<input type="radio" id="admin" name="selusertype" value="admin" checked="checked" />
							<label for="admin"  class="mr20">Admin</label>
								<input type="radio" id="member" name="selusertype" value="merber" />
							<label for="member"  class="mr20">Member</label>
								<!--<input type="radio" id="radio2" name="question1" />
							<label for="radio2"  class="mr20">Other</label>-->
						</div>
						<div class="clear"></div>
					</div>
					<div class="formRow" id="admindiv" style="display:none">
						<div class="grid2"><label>To<span class="req">*</span></label></div>
						<div class="grid10">
							<input type="text" class="required" name="txtadmin" id="txtadmin" value="<?php echo CONF_EMAIL;?>" readonly="true" />
						</div><div class="clear"></div>
					</div>
					<div class="formRow" id="memberdiv" style="display:none">
						<div class="grid2"><label>Select Member<span class="req">*</span></label></div>
						<div class="grid10">
							<?php echo membercombo($_SESSION['sess_sp_id']); ?> 
						</div>             
						<div class="clear"></div>
					</div>
					<div class="formRow">
						<div class="grid2"><label>Subject<span class="req">*</span></label></div>
						<div class="grid10"><input type="text" class="required" name="subject" id="subject"/></div><div class="clear"></div>
					</div>
					<div class="formRow">
                        <div class="grid2"><label>Message<span class="req">*</span></label></div>
						<div class="widget grid10 mareditor">    
							<textarea id="editor" name="message" rows="" cols="16"></textarea>   				
						</div>
							<label class="cuserror" id="editoerror">This field is required.</label>
						<div class="clear"></div>
					</div>
					<div class="formRow">
						<div class="grid2"><label>&nbsp;</label></div>
						<div class="grid10">
               				<input type="submit" name="btn_send" id="btn_send" value="Send" class="buttonM bGreen  mb10"/>
						</div><div class="clear"></div>
					</div>
                </div>
            </fieldset>
        </form>
    </div>
</div>
