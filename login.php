<?php 
	include_once 'business_logic/config/configure.php'; 
	$msg = ($_REQUEST['msg']!=""?"?msg=".$_REQUEST['msg']:"");
	header("location:index.php".$msg);

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Online - Login</title>
	<?php include('js_css_files.php') ?>
	<style>
		#header_title {
			height: 70px;                               
		}
		#container{
			width:730px !important;
		}
		.twothird_box{
			width:475px !important;
			margin: 0 auto;
			float:none !important;
		}
		#content{
			margin-top:25px !important;	
		}
		form.cmxform label.error, label.error {
			margin-left: 271px !important;	
			margin-top: -38px !important;	
		}
		
	</style>
	<script language="javascript">
	$().ready(function() {
		$("#frmlogin").validate();
		$("#frmForgot").validate();
	});
		
</script>
</head>
<?php
/*m	if($_REQUEST['verification_userid'] != "")
 	{
		$sp_id  = base64_decode($_REQUEST['verification_userid']);
		$accode =$_REQUEST['accode'];
		$_REQUEST['verification_userid'] = $sp_id;
		
        $sql = "UPDATE  service_provider SET  status =  'active' WHERE  sp_id = '".$_REQUEST['verification_userid']."' and activation_code=  '".$accode."'";
		$rs_main = $dbobj -> update($sql);
	  	
		$query = "SELECT  email,business_name FROM  service_provider WHERE sp_id = '".$_REQUEST['verification_userid']."'";
		$merchant_email = $dbobj -> select($query);
		
		$conquery="select email from email_template where temp_id='26'";
		$consql = $dbobj->select($conquery);
		$FromEmail = $consql[0]['email'];
		
		$headers .= "From: ".CONF_METATITLE."<".$FromEmail.">\r\n";
		
		$Subject = "Welcome to ".CONF_METATITLE;
		$ToEmail = $merchant_email[0]['email'];
		$HTMLMsg = "Hello Use ".$merchant_email[0]['business_name'].",</br> welcome to ".CONF_METATITLE." team";
		include('mail_template/mail-template.php');
		/*echo $Subject;
		echo "<br>";
		echo $html_body;
		die;*/
/*m		if(mail($ToEmail,$Subject,$html_body,$headers))
		{
			$msg = "Your Account is active. Please login here";
		}
		else
		{
			$msg = "Your Account is active. Please login here.";
		}
	}*/
?>

<body id="top">
	<?php include('top/top_login.php') ?>
	
	<!-- ####################################################################################################### -->
	
	<?php include('top/top_menu.php') ?>
	
	<!-- ####################################################################################################### -->
	
	<div class="wrapper col0">
  		<div id="header_title">
  		<!-- use for cms page title -->	
    	<div class="header_inner_title" style="margin-left:68px">
    		<h3>Login </h3>
        </div>
		<!--   User free sign up link -->
        <?php //include('top/free_sign_up.php') ?>
	    <!-- end -->
		</div>
	</div>
	
	<!-- ####################################################################################################### -->
	
	<?php //include('slider/static.php') ?>
	
	<!-- ####################################################################################################### -->
	
	<div class="wrapper col3">
  		<!--<div id="homecontent">
                    <div class="banner_shadow">
                            <img src="images/banner_shadow.png"  alt="" />
    </div>

  </div>-->
			<div class="wrapper col3">
  				<div id="container">
          			<div id="content">
						<div class="twothird_box">
							<div class="twothird_box_inner" style="height:auto">
								<div id="respond">
            						<?php if($msg != "" || $_REQUEST['msg']) { ?>
									<div style="margin-left:25px">
										<p class="error">
										  <?=$msg?>
										  <?=$_REQUEST['msg']?>
										</p>
									  </div>
									<? } ?>  
									<div id="login">
									<form action="login-action.php" method="post" class="cmxform" id="frmlogin">
										<input type="hidden" name="action" id="action" value="login" />
              							<div style="margin-left:25px">
											<label for="name" class="label">Email</label>
											<p>
											  <input type="email" name="txtEmial" id="txtEmial" value="" size="22" class="lname" required>
											</p>
										  </div>
              							<div style="margin-left:25px" >
											<label for="name" class="label">Password</label>
											<p>
											  <input type="password" name="txtPassword" id="txtPassword" value="" size="22" class="lname" required>
											</p>
										</div>
								    	<p style="margin-left:31px">
											<input name="submit" type="submit" id="submit" class="fl_left" value="Login">
										</p>
										<div class="clear"></div>
										
										<p style="margin-left:25px; margin-top:25px">
											<label for="name" class="label"><a href="javascript: void(0)" id="ShowForgot">Forgot Password</a></label>
										</p>
										
            							</form>
									</div>
									<div id="forgot" style="display:none">
										<form action="login-action.php" method="post" class="cmxform" id="frmForgot">
										<input type="hidden" name="action" id="action" value="forgot" />
              							
										<div style="margin-left:25px;width:410px">
											<label for="name" class="label">Email</label>
											<p>
											  <input type="email" name="txtfemail" id="txtfemail" value="" size="22" class="lname" required onblur="authenticate('ajax/email_forgot.php','repl_message','txtfemail','repl_message')">
											  <label id='repl_message' style="display:none; width: 241px; margin-left: 1px; margin-top: -19px; " ><img src="images/loading.gif" /></label>
											</p>
										  </div>
              							<p style="margin-left:31px">
											<input name="submit" type="submit" id="submit" class="fl_left" value="Submit">
										</p>
										
										<div class="clear"></div>
										<div style="margin-left:25px; margin-top:10px">
											<p>
											  NOTE: To reset your password, enter the email that you use to sign in
											</p>
										  </div>
										  <div class="clear"></div>
										<p style="margin-left:25px; margin-top:25px">
											<label for="name" class="label"><a href="javascript: void(0)" id="HideForgot">Back to Login</a></label>
										</p>
										<div class="clear"></div>
										
										
            							</form>
									</div>
										
          						</div>
 						   </div>
						 </div>
						  <?php /*?><div class="oneforth_box">
							<?php include('login_right.php'); ?>
						  </div><?php */?>
				   </div>
				</div>
			</div>
	</div>
	
	<!-- ####################################################################################################### -->
	<?php include('bottom/bottom_blue_line.php') ?>
	
	<!-- ####################################################################################################### -->
	<?php include('bottom/bottom_link.php') ?>

	<!-- ####################################################################################################### -->
	<?php include('bottom/copyright.php') ?>

</body>
</html>