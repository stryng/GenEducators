<?php
$msg = "";

		$str_msg = "";
		$token=getGUID();
		$form->values 			=  (sizeof($_POST)>0)?$_POST:array();
		$form->fields 			=  array(
			"userid"  			=> array("name"=>"userid","type"=>"hidden","value"=>$_SESSION['userid']),
			"token"  			=> array("name"=>"token","type"=>"hidden","value"=>$token),
			"Subject" 			=> array("name"=>"msg_sub","type"=>"text", "validate"=>"R", "class"=>'large'),
			"msg_desc" 			=> array("name"=>"msg_desc","type"=>"hidden"),
			"Message"  			=> array("name"=>"editor","type"=>"textarea","validate"=>"R", "class"=>'large',"save2db"=>"false"),
			"to_u_id"  			=> array("name"=>"to_u_id","type"=>"hidden","value"=>"1"),
			"to_admin"  		=> array("name"=>"to_admin","type"=>"hidden","value"=>"yes"),
			"msg_datetime"  	=> array("name"=>"msg_datetime","type"=>"hidden","value"=>date('Y-m-d H:i:s')),
		);
		
		
		if(sizeof($_POST)>0) {
			if($form->validate())
			{
						$table = 'message_in';
						$_POST['msg_desc'] = $_POST['editor'];
						$idx = $form->processOnTable($table);
						?>
						<script language="javascript" type="text/javascript">
							window.location = "index.php?file=message&suc";
						</script>
						<?php
						header("location:index.php?file=message&suc");
						die;
			}
		}
?>
<!-- Content begins -->
	<style>
	label[for=userid] { display:none;}
	label[for=token] { display:none;}
	label[for=to_u_id] { display:none;}
	label[for=msg_desc] { display:none;}
	label[for=to_admin] { display:none;}
	label[for=msg_datetime] { display:none;}
	input[type=text] {
		margin-bottom:0px !important;
	}
	.fieldbox label
	{
		float:left;
		width:180px;
	}
	.vlErrorMsg
	{
		padding-left:0px;
	}
	.vlNoErrorMsg {
		padding-left: 0px;
	}
	.cleditorMain
	{
		width:50% !important;
		background:none repeat scroll 0 0 #F7F7F7;
		border:1px solid #F0F0F0;
		float:left;
	}
	
	</style>
<script type="text/javascript">
	function backbtnclick()
	{
		window.location = "<?=MEMBER_URL?>index.php?file=message";
	}
	
	function check_form(f, event){
	
			var result = vl_FormEventHandler(event);
			return result;
	}
</script>


 		<div id="content">
		<!-- Main content -->
		<div class="wrapper check">
			<div class="fluid">
				<div class="widget grid12">
              		<div class="whead">
                    	<h6>
							Invite a Friend
						</h6>
						<div class="whead">
							<ul class="titleToolbar">
								<li><a onclick="javascript:window.location='<?=INDEX_FILE?>friends_list'">Back</a></li>
							</ul> 
							<div class="clear"></div>
						</div>						
					</div> <!-- End whead -->	
					<div class="body" style="padding:0px;">
						<form id="form1" name="form1" class="main myform" method="post" >
                            <div style="margin-left:25px">
								<p>
								<?php echo $form->showMessage(); 
								if($str_msg == "")
								{
									$form->display();
									?>
									<div class="fieldbox">
										<div class="clear"></div>
										<input type="submit" name="btn_send" id="btn_send" value="Send"  class="buttonH button_green" />
										<a href="index.php?file=message" class="buttonS bRed">Back</a>
									</div>
									<?php
								}
								?>
								</p>
								
							</div>
							
							<div id="repl_message">
							</div>
						</form>
					</div><!-- Body end -->
				</div> <!-- widget End -->
			</div><!-- fluid End -->	
		</div><!-- wrapper End -->
		</div> <!-- Content -->
