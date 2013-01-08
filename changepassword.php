<? 
	include_once 'business_logic/config/configure.php'; 
	require_once("business_logic/class/form.class.php");
	//echo $_REQUEST['action']; die;
	$form = new Form();
	include('js_css_files.php');
?>
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
			/*margin-left: 271px !important;	
			margin-top: -38px !important;	*/
		}
		#container
		{
			background:none;
		}
		#featured_slide_inner
		{
			height:100%;
		}
		.col2
		{
			height:530px;
			background:#000000;
		}
		.col0
		{
			color:#000000;
			background:#000000;
		}
		.color1
		{
			color:#43AEEC;
			font:400 24px/25px 'Lato',sans-serif;
		}
		
	</style>
	<script language="javascript">
	
	/*$(document).ready(function(){
		
		$("#submit").click(function(){
			if($("#txtEmial").val() == ""){ $("#txtEmial").addClass("error"); return false; } else { $("#txtEmial").removeClass("error"); }			
			//Email Validation ::
			if($("#txtEmial").val() != "") { if(IsEmail($("#txtEmial").val())) { $("#txtEmial").removeClass("error"); } else { 
		    $("#txtEmial").addClass("error"); return false; }}	
		    if($("#txtPassword").val() == ""){ $("#txtPassword").addClass("error"); return false; }  else { $("#txtEmial").removeClass("error"); }
		});
	});
	
	function IsEmail(email) {
	  var regex = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
	  return regex.test(email);
	}*/	
	$().ready(function() {
		
		
		//$("#frmforgot").validate();
		$("#frmforgot").validate({
			
			rules: {
				txtpwd: {
					required: true,
					minlength: 5
				},
				txtpwd2: {
					required: true,
					minlength: 5,
					equalTo: "#txtpwd"
				}
			},
			messages: {
				txtpwd: {
					required: "Please provide a password",
					minlength: "Your password must be at least 5 characters long"
				},
				txtpwd2: {
					required: "Please provide a password",
					minlength: "Your password must be at least 5 characters long",
					equalTo: "Please enter the same password as above"
				}
			}
	
		});
	});
		
</script>
</head>
<?php
	$id= base64_decode($_REQUEST['user_id']); 
if(strlen($_REQUEST['txtpwd'])!="") 
{
		$id = $_REQUEST['user_id'];
		$pwd= mysql_real_escape_string( $_REQUEST['txtpwd'] );
		$pwd2= mysql_real_escape_string( $_REQUEST['txtpwd2'] );
		
		$msg = "Your password has been changed";
		
		if($pwd == $pwd2)
		 {
			$sql = "UPDATE userdetail SET password =  '".md5($_REQUEST['txtpwd'])."' WHERE  UserId = '".$id."'";
			$form->inser_qry($sql);
		
		?>	
			<script language="javascript">
			document.location.href="login.php?msg=<?=$msg?>";
			</script>
	  <? }
	    else
		{
		      $msg = "Both Password are not match";
		}?>
<?  } ?>


<body id="top">
	<?php include('top/top_login.php') ?>
	
	<!-- ####################################################################################################### -->
	
	<?php include('top/top_menu.php') ?>
	
	<!-- ####################################################################################################### -->
	
	<div class="wrapper col0">
  		<div id="header_title">
  		<!-- use for cms page title -->	
    	<div class="header_inner_title" style="margin-left:68px">
    		<h3>Change your Password </h3>
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
							<div class="twothird_box_inner" style="height:216px">
								<div id="respond">
            						<?php //if($msg != "") { ?>
									<div style="margin-left:25px">
										<p class="error">
										  <?=$msg?>
										</p>
									  </div>
									<? //} ?>  
									<div id="login">
									<form id="frmforgot" method="post" name="frmforgot">
										<input type="hidden" name="user_id" id="user_id" value="<?=$_GET['user_id']?>" />
										<div class="login_details" id="logged_inbox">
											<div class="login_error">
												&nbsp;<? if($msg != ""){ echo $msg; }?>
											</div>
											<div style="margin-left:25px" >
												<label for="name" class="label">New password: </label>
												<p>
											 	 <input type="password" name="txtpwd"  id="txtpwd" class="lname" required/>
												</p>
											</div>
											<div style="margin-left:25px" >
												<label for="name" class="label">Confirm password: </label>
												<p>
											 	 <input type="password" name="txtpwd2" id="txtpwd2" class="lname" required/></div>
												</p>
											</div>
											<p style="margin-left:31px">
												<input type="hidden" value="login" name="action" id="action" />
												<input type="submit" value="Submit" name="submit"   id="submit"  class="fl_left" />
											</p>
											<div class="login_bg_btn">
												<input type="hidden" value="login" name="action" id="action" />
												
											</div>
										</div>
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