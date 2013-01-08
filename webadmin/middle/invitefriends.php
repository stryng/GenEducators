<?php
$qry = "select * from userdetail where UserId = '".$_SESSION['admin']['userid']."' and active =1 and entry='prepaid' ";
$row = $form->getRow($qry);
$msg = "";

		$str_msg = "";
		$form->values 			=  (sizeof($_POST)>0)?$_POST:array();
		$form->fields 			=  array(
			"userlink"  		=> array("name"=>"userlink","type"=>"hidden","save2db"=>"false", "value"=>SERVER_URL."sign-up.php?inviter=".$_SESSION['admin']['userid'],"hint"=>'<a style="color:#000099;" href="'.SERVER_URL.'sign-up.php?inviter='.$_SESSION['admin']['userid'].'" target="_blank" >'.SERVER_URL.'sign-up.php?inviter='.$_SESSION['admin']['userid'].'</a>'),
			"Email Id"  		=> array("name"=>"Emailid","type"=>"text","save2db"=>"false", "validate"=>"R", "class"=>'large'),
			"Subject" 			=> array("name"=>"Subject","type"=>"text","save2db"=>"false", "validate"=>"R", "class"=>'large'),
			"Message"  			=> array("name"=>"Message","type"=>"textarea","validate"=>"R", "class"=>'large'),
		);
		
		
		if(sizeof($_POST)>0) {
			if($form->validate()) {
					include("class/email/function.php");
						$FromDisplay="";
						$FromEmail = "admin@mlm.com";
						$ReplyTo="";
						$ToName = "HI";
						$ToEmail = $_POST['Emailid'];
						$CCList = "";
						$BCCList = "";
						$Subject =$_POST['Subject'];
						$HTMLMsg="<table align='center' border='1'><tr><td>Email Address:</td><td>".$_POST['Emailid']."</td></tr><tr><td>Note:</td><td>".$_POST['Subject']."</td></tr>";
						$str = "";
						
						$HTMLMsg .= "<tr><td>Link:</td><td>".$_POST['userlink']."</td></tr>";
						
						$HTMLMsg .= "<tr><td>Message:</td><td>".$_POST['Message']."</td></tr></table>";
							$TxtMsg =$_POST['Message'];
						$AttFile="";
						$AttFileName ="";
						$AttFileType="";
			
						SendMail($FromDisplay, $FromEmail, $ReplyTo, $ToName, $ToEmail, $CCList, $BCCList, $Subject, $HTMLMsg, $TxtMsg, $AttFile, $AttFileName, $AttFileType);
					//	$sentmail=mail($ToEmail,$Subject,$TxtMSg,$FromEmail);
						$msg = "<table align='center'><tr><td>Thank you, ".$_SESSION['UserName']."</td><td>&nbsp;</td></tr>";
						$msg .= "<tr><td>&nbsp;</td><td>your E-Mail has been sent successsully,<br> We will contact you soon.</td></tr>";
						$msg .= "<tr><td>&nbsp;</td><td><a href='index.php' >Click here to go back</a></td></tr>";
						$msg .= "</table>";
						header("location:index.php?msg=".$msg);
						die;
			}
		}
?>
<!-- Content begins -->
	<style>
	label[for=userlink] { display:none;}
	</style>
<script type="text/javascript">
	function backbtnclick()
	{
		window.location = "<?=SERVER_URL?>index.php?file=friends_list";
	}
	
	function check_form(f, event){
	
			var result = vl_FormEventHandler(event);
			return result;
	}
</script>
<style type="text/css">
.vlErrorMsg
{
	padding-left:0px;
}
.vlNoErrorMsg {
	padding-left: 0px;
}
</style>


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
						<form id="form1" name="form1" action="" method="post" class="myform">
                            <div style="margin-left:25px">
								<p>
								<?php echo $form->showMessage(); 
								if($str_msg == "")
								{
									$form->display();
									?>
									<div class="fieldbox">
										<input type="submit" value="Submit" class="buttonH button_green" />
										<a href="index.php" class="buttonS bRed">Back</a>
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
