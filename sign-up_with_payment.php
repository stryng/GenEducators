<?php

	include_once 'business_logic/config/configure.php';
	require_once("business_logic/class/form.class.php");
	//include_once 'noentry.php';
	/*if(!isset($_GET['inviter']) && $_GET['inviter'] <= 0)
	{
		header("location:login.php");
	}*/
	require_once CLASS_PATH.'country_master.php';
	$obj = new country_master; 

	$view_message=isset($_GET['msgid'])?$_GET['msgid']:""; 
	
	$expire=time()+60*60*24*30;
	if(!isset($_COOKIE['inviterid']))
	{
		setcookie('inviterid', "1", $expire);
	}
	
	$inviter = (!isset($_GET['inviter']) ||  $_GET['inviter']=="")?((!isset($_COOKIE['inviterid']) || $_COOKIE['inviterid']== "")?"1":$_COOKIE['inviterid']):$_GET['inviter'];
	setcookie('inviterid', $inviter, $expire);
	
			if(!isset($_COOKIE['inviterid']))
			{
				$inviter = (!isset($_GET['inviter']) ||  $_GET['inviter']=="")?"1":$_GET['inviter'];
				setcookie('inviterid', $inviter, $expire);
			}
			else
			{
				$inviter = (!isset($_GET['inviter']) ||  $_GET['inviter']=="")?$_COOKIE['inviterid']:$_GET['inviter'];
				setcookie('inviterid', $inviter, $expire);
			}
	
	if($inviter == "")
	{
		header("location:".SITE_URL."login.php");
	}

	include('js_css_files.php')
?>
<style>
	.hint
	{
		margin-left:180px;
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
	.btn_cls
	{
		margin:5px 0 0 0;
		padding:4px;
		color:#fff;
		width:auto;
		background:url(images/submit_btn.png) top left repeat-x;
		border:1px solid #CCCCCC;
		font-family:"Century Gothic";
		font-size:14px;
		cursor:pointer;

	}
		#header_title {
			height: 70px;
		}
		#container{
			background:none;
			width:730px !important;
		}
		.twothird_box{
			width:650px !important;
			margin: 0 auto;
			float:none !important;
		}
		#content{
			margin-top:25px !important;	
		}
		#tick{display:none}
		#cross{display:none}

		#tick1{display:none}
		#cross1{display:none}
		.fieldbox
		{
			float:left;
			width:100%;
			padding-bottom:6px;
		}
		.fieldbox label
		{
			width:180px;
			float:left;
			padding-top:10px;
		}
		.hint
		{
			display:block;
		}
		input[type=text] 
		{ 
			margin-bottom:0px !important;
		}
		input[type=password] 
		{ 
			margin-bottom:0px !important;
		}
		#Country
		{
			height:30px !important;
			margin-bottom:0px !important;
		}
		.error
		{
			color:#FF0000;
			margin-left:40%;
		}

		
</style>
<script language="javascript">
	$(document).ready(function() {
		//$("#form1").validate();
		/*$("#form1").validate();*/
		
		$("#form1").validate({
			
			rules: {
				password_new: {
					required: true,
					minlength: 5
				},
				password_again: {
					required: true,
					minlength: 5,
					equalTo: "#password_new"
				}
			},
			messages: {
				password: {
					required: "Please provide a password",
					minlength: "Your password must be at least 5 characters long"
				},
				confirm_password: {
					required: "Please provide a password",
					minlength: "Your password must be at least 5 characters long",
					equalTo: "Please enter the same password as above"
				}
			}
	
		});
		
		
	});
	function valid_inviter()
	{
		change_mod_read_only();
		var inviter =  document.getElementById('inviter').value;
		//alert(inviter );
		var msg = document.getElementById('inviter_errorloc');
		msg.style.display ='block';
		/* if(inviter==1)
		 {
			msg.innerHTML = "PLease Enter Valid Refferal ID ";
			document.getElementById('inviter').focus();
			return false;
		}*/
		
        jQuery.ajax({
                       type: "POST",
                       url: "inviter_check.php",
                       data: "inviter="+inviter,
                       cache: false,
                       success: function(response)
                       {
					   		//alert(response);
							msg.innerHTML =response;
							document.getElementById('OK').focus();
                       }
                });
	}

</script> 
<script src="js/others.js"></script>


</head>
<body id="top">
<?php
		$str_msg = "";
		$table = "userdetail";
		$pre_table = "pre_userdetail";
		$title = "Member Listing";
	
		$form = new Form();
		$getid = isset($_GET['txtsp_masterid'])?$_GET['txtsp_masterid']:0;
		$sql = "SELECT * FROM `{$table}` WHERE `UserId` = {$getid}";
		$row = $form->getRow($sql);

		$countries = $form->getArray("SELECT * FROM `country` ");
		$countries = $form->dd($countries,array(""=>"Select"),"name","iso");
		
		$form->values 			=  (sizeof($_POST)>0)?$_POST:$row;
		$form->fields 			=  array(
			"usercode"			=> array("name"=>"usercode","type"=>"hidden", "value"=>rand(10000,99999)),
			"usercode_5_3"		=> array("name"=>"usercode_5_3","type"=>"hidden", "value"=>rand(100000,999999)),
			"usercode_10_3"		=> array("name"=>"usercode_10_3","type"=>"hidden", "value"=>rand(1000000,9999999)),

			"chk_err"  			=> array("name"=>"chk_err","type"=>"hidden","save2db"=>"false", ),
			"reson"  			=> array("name"=>"reson","type"=>"hidden","save2db"=>"false", "value"=>(isset($_GET['reson'])?$_GET['reson']:"")),
			"stream" 			=> array("name"=>"stream","type"=>"hidden","save2db"=>"false", "value"=>(isset($_GET['stream'])?$_GET['stream']:"0")),
			"Inviter ID"  		=> array("name"=>"inviter","type"=>"text","class"=>"lname","onblur"=>"valid_inviter();","hint"=>'<div id="inviter_errorloc" style="left: 0px;display:none;position: relative;top: 0px;background: white;color: GREEN;text-shadow: none;width:360px;border-radius : 6px;text-align:justify;height:auto;padding:5px;"></div><div class="clear"></div>'),
			"inviter_5_3"  		=> array("name"=>"inviter_5_3","type"=>"hidden"),
			"inviter_10_3"  	=> array("name"=>"inviter_10_3","type"=>"hidden"),
			"User Email"		=> array("name"=>"Email","type"=>"text","class"=>"lname","validate"=>"R","onchange"=>"check_space(this)","onblur"=>"set_loginval(this)","hint"=>'<img id="tick" src="images/tick.png" width="16" height="16" /><img id="cross" src="images/cross.png" width="16" height="16" />We will send you the e-mail confirmation for account activation.'),
			"User Name" 		=> array("name"=>"UserName","type"=>"text","class"=>"lname","validate"=>"R","onblur"=>"check_space(this)","hint"=>'<img id="tick1" src="images/tick.png" width="16" height="16" /><img id="cross1" src="images/cross.png" width="16" height="16" />'),
			"Password"  		=> array("name"=>"Password","type"=>"password","class"=>"lname","validate"=>"R"),
			"Confrim Password"	=> array("name"=>"cpassword","type"=>"password","class"=>"lname","validate"=>"R", "onblur"=>"check_passwd()","save2db"=>"false"),
			
			"First name"		=> array("name"=>"FirstName","type"=>"text","class"=>"lname","validate"=>"R", "onblur"=>"check_space(this)"),
			"Middle Name"		=> array("name"=>"MiddleName","type"=>"text","class"=>"lname","validate"=>"R", "onblur"=>"check_space(this)"),
			"Last Name"			=> array("name"=>"LastName","type"=>"text","class"=>"lname","validate"=>"R", "onblur"=>"check_space(this)"),
			"Suffix"			=> array("name"=>"suffix","type"=>"text","class"=>"lname", "onblur"=>"check_space(this)"),
			"Gender"			=> array("name"=>"Gender","type"=>"radio","values"=>array(array("name"=>"gender","checked"=>"checked","value"=>"Male","title"=>"Male"),array("name"=>"gender","value"=>"Female","title"=>"Female"))),
			/*"Birthdate"			=> array("name"=>"BirthDate","type"=>"text","class"=>"lname","validate"=>"R","readonly"=>"yes"),*/
			"Place of Birth"	=> array("name"=>"POB","type"=>"text","class"=>"lname","validate"=>"R", "onblur"=>"check_space(this)"),
			"Place of Citizenship"	=> array("name"=>"POC","type"=>"text","class"=>"lname","validate"=>"R", "onblur"=>"check_space(this)"),
			"SSN/CountryID/EIN"		=> array("name"=>"CountryId","type"=>"text","class"=>"lname","save2db"=>"false","value"=>""),
			"Mothers Maiden Name"	=> array("name"=>"Mothername","type"=>"text","class"=>"lname","validate"=>"R", "onblur"=>"check_space(this)"),
			"Phone"					=> array("name"=>"Phone","type"=>"text","class"=>"lname"),
			"Cellphone"				=> array("name"=>"Cellphone","type"=>"text","class"=>"lname"),
			"Street address1"		=> array("name"=>"Addressl1","type"=>"text","class"=>"lname","validate"=>"R", "onblur"=>"check_space(this)"),
			"Street address2"		=> array("name"=>"Addressl2","type"=>"text","class"=>"lname"),
			"City"					=> array("name"=>"City","type"=>"text","class"=>"lname"),
			"State"					=> array("name"=>"State","type"=>"text","class"=>"lname"),
			"Zip/Postal Code"		=> array("name"=>"Zipcode","type"=>"text","class"=>"lname"),
			"Country"				=> array("name"=>"Country","type"=>"dropdown","class"=>"lname","validate"=>"R","values"=>$countries),
			"Skype"					=> array("name"=>"skype","type"=>"text","class"=>"lname"),
			"Payza Pay"				=> array("name"=>"ap","type"=>"text","class"=>"lname"),
			"Solid Trust Pay"		=> array("name"=>"stp","type"=>"text","class"=>"lname"),
			"Balance"				=> array("name"=>"Balance","value"=>"33", "type"=>"text","class"=>"lname","readonly"=>"yes","validate"=>"R","save2db"=>"false"),
			"Login"					=> array("name"=>"login","type"=>"hidden"),	
		);
		
		
		if(sizeof($_POST)>0) {
			if($form->validate()) {
				
				  $email = $_POST['Email'];
				  $q="SELECT * FROM `$table` WHERE `$table`.`login` = '{$email}'" ;
				  $rows = $form->getRow($q);
				if(sizeof($rows)>0) {
						$form->message('Emailid is already exist. Please change it and try again.','error');
				}else{
					$_POST['Password'] = md5($_POST['Password']);
					$_POST['login'] = $_POST['Email'];
					$idx = $form->processOnTable($pre_table);
					$email = $_POST['Email'];
					$_POST['inviter_5_3'] = $_POST['inviter'];
					$_POST['inviter_10_3'] = $_POST['inviter'];
					$q="SELECT UserId FROM `$pre_table` WHERE `$pre_table`.`login` = '{$email}'" ;
					$rows = $form->getRow($q);
					if(sizeof($rows)>0) {
						$users_id = $rows['UserId'];
					}
					$i = 1;
					?>
					<form id="ap_form" name="ap_form" method="post" action="<?=AP_URL?>" >
									<input type="hidden" name="ap_purchasetype" value="other" />
									<input type="hidden" name="ap_merchant" value="<?=AP_MERCHANT?>" />
									<input type="hidden" name="ap_itemname" value="GEN Payment"/>
									<input type="hidden" name="ap_quantity" value="1" />
									<input type="hidden" name="ap_amount" id="ap_amount" value="<?php echo AMOUNT3x3; ?>"/>
									<input type="hidden" name="ap_currency" value="USD" />
									<input type="hidden" name="ap_returnurl" value="<?=SERVER_URL?>index.php" />
									<input type="hidden" name="ap_cancelurl" value="<?=SERVER_URL?>sign-up.php" />
									<input type="hidden" id="apc_1" name="apc_1" value="<?=$_POST['Email']?>" />
									<input type="hidden" id="apc_2" name="apc_2" value="<?=$users_id?>" />
					</form>
					<script type="text/javascript">
						document.ap_form.submit();
					</script>
					<?php
					//$form->message('Sorry For your registration, Please contact administrator.','error');

/*					echo "<pre>";
					print_r($_POST);
					echo "</pre>";
					die;
*/					
					/* below code is commented by minesh patel because of due to payment intigration Start
					$idx = $form->processOnTable($table);
					if(is_numeric($idx)) {
						  $q="SELECT `UserId` FROM `{$table}` WHERE `{$table}`.`login` = '{$email}'" ;
						  $r = $form->getRow($q);
						  
									 
										 // if suceesfully inserted data into database, send confirmation link to email
										 //---------------- SEND MAIL FORM ----------------
										
										
										
										//commeted as per client requirement for creating fack accounts
										include("function.php");
										$FromDisplay="";
										$FromEmail = "admin@MLM.com";
										//echo $FromEmail;die;
										$ReplyTo="";
										$ToName = $_POST['FirstName']." ".$_POST['LastName'];
										$ToEmail = $_POST['Email'];	//echo $ToEmail;die;
										$CCList = "";
										$BCCList = "";
										$Subject ="Registration";
										//$HTMLMsg = "<table align='center' border='1'><tr><td>Email Address:</td><td>".$_POST['Login']."</td></tr>";
										$HTMLMsg = "<table align='center' border='1'><tr><td>Email Address:</td><td>".$_POST['Email']."</td></tr>";
										$HTMLMsg .= "<tr><td>Link:</td><td>".SERVER_URL."confirmation.php?uid=".$result['UserId']."&passkey=".(isset($result['usercode'])?$result['usercode']:$_POST['usercode'])."</td></tr>";
										$HTMLMsg .= "</table>";
										$TxtMsg ="Your registration is done succesfully";
										//echo $TxtMsg;die;
										$AttFile="";
										$AttFileName ="";
										$AttFileType="";
										//echo $HTMLMsg;die;
									    SendMail($FromDisplay,$FromEmail,$ReplyTo,$ToName,$ToEmail,$CCList,$BCCList,$Subject,$HTMLMsg,$TxtMsg, $AttFile, $AttFileName, $AttFileType);
										//$sentmail=mail($ToEmail,$Subject,$TxtMSg,$FromEmail);
										//header("location:login.php");
								
										// if your email succesfully sent
										$str_msg = "<table align='center' border='0'><tr><td>Thank you, ".$_POST['fname']."&nbsp;".$_POST['lname']."</td><td>&nbsp;</td></tr>";
										$str_msg .= "<tr><td>&nbsp;</td><td>Please Check your E-Mail to activate your account.</td></tr>";
										$str_msg .= "<tr><td>&nbsp;</td><td><a href='".SERVER_URL."login.php' >Click here to go back</a></td></tr>";
										$str_msg .= "</table>";
						
						$form->message('We have sent a mail to your Email address. Check your email for activation.'.$str_msg,'message');
					}else{
						$form->message('Sorry For your registration, Please contact administrator.','error');
					}*/
				}
			}
		}
?>
<!-- Content begins -->
	<style>
	/*label[for=apc_1],label[for=apc_2],label[for=apc_3],label[for=apc_4],label[for=apc_5],label[for=apc_6],label[for=apc_7],label[for=apc_8],label[for=apc_9],label[for=apc_10],label[for=apc_11],label[for=apc_12],label[for=apc_13],label[for=apc_14],label[for=apc_15],label[for=apc_16],label[for=apc_17],label[for=apc_18],label[for=apc_19],label[for=apc_20],label[for=apc_21],label[for=apc_22],label[for=apc_23],label[for=apc_24],label[for=apc_25],label[for=apc_26],label[for=apc_27],label[for=apc_28],label[for=apc_29],label[for=apc_30],label[for=apc_31],label[for=apc_32],label[for=apc_33],label[for=apc_34] { display:none;}*/
	label[for=reson] { display:none;}
	
	label[for=stream] { display:none;}
	label[for=inviter_5_3] { display:none;}
	label[for=inviter_10_3] { display:none;}
	label[for=img] { display:none;}
	label[for=login] { display:none;}
	label[for=chk_err] { display:none;}
	label[for=usercode] { display:none;}
	label[for=usercode_5_3] { display:none;}
	label[for=usercode_10_3] { display:none;}
	label[for=CountryId] { display:none;}
	input[type=radio] { margin-top:8px;}
	#CountryId
	{
		display:none;
	}
	</style>
	<script type="text/javascript">
		
				 function check_passwd()
				 {
					 var cpassword = $('#cpassword').val();
					 var password = $('#Password').val();
					 if(password != cpassword)
					 {
						 $('#passwd').focus();
						 alert("Password does not match");
						 document.getElementById("cpassword").value = "";
						 document.getElementById("Password").value = "";
					 }
				 }
				 function check_space(username)
				 {
				 	var len = (username.value).length;
					if(len > 245)
					{
						alert("String is greater than 245");
					}
					else
					{
						username.value = (username.value).replace(/^\s*|\s*$/g,'');	
					}
				}
				function set_loginval(obj){
					 //alert(document.getElementById("Login").value) ;//= document.getElementById("email1").value;	
					 document.getElementById("login").value = obj.value;
				}
				function submit_frm()
				{
					if(document.getElementById("chk_err").value != "")
					{
						alert("Please provide proper data and try again later.");
						return false;
					}
					else
					{
						document.form1.submit();
					}
				}
	</script>
<?php include('top/top_login.php') ?>
<!-- ####################################################################################################### -->
<?php include('top/top_menu.php') ?>
<!-- ####################################################################################################### -->
<div class="wrapper col0">
  <div id="header_title">
    <!-- use for cms page title -->
    <div class="header_inner_title" style="margin-left:69px">
      <h3>Create a new account</h3>
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
  <div class="wrapper col3">
    <div id="container">
      <div id="content">
        <div class="twothird_box">
          <div class="twothird_box_inner"> 	
		  		<div id="respond">		
				 <?php if(@$view_message==1)
				 			{ echo '<div class="nNote nSuccess"><p>Record save success , Plase Check your email id and Active your account !!</p> </div>';} 
						else if(@$view_message==2)
							{ echo '	<div class="nNote nFailure"><p>Oops sorry. Record not save</p></div>';} 
						else if
							(@$view_message==3){ echo '	<div class="nNote nFailure"><p>Emailid is already exist. Please change it and try again.</p></div>';} ?>
           		 <form id="form1" name="form1" action="" method="post" class="myform">
				 	<div style="margin-left:25px">
						<p>
						<?php echo $form->showMessage(); 
						if($str_msg == "")
						{
							$form->display();
							?>
							<div class="fieldbox">
								<label for="btn">&nbsp;</label>
								<input type="button" onClick="submit_frm();" value="Submit" class="btn_cls"  />
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
				</div>
				<div class="clear"></div>
          </div>
        </div>
       <?php /*?> <div class="oneforth_box">
          <?php include('sign-up-right.php'); ?>
        </div><?php */?>
      </div>
    </div>
  </div>
</div>
<script type="text/javascript">
	
	function change_mod_read_only()
	{
		document.getElementById("Email").setAttribute("disabled", "disabled");;
		document.getElementById("UserName").setAttribute("disabled", "disabled");;
		document.getElementById("Password").setAttribute("disabled", "disabled");;
		document.getElementById("cpassword").setAttribute("disabled", "disabled");;
		document.getElementById("FirstName").setAttribute("disabled", "disabled");;
		document.getElementById("MiddleName").setAttribute("disabled", "disabled");;
		document.getElementById("LastName").setAttribute("disabled", "disabled");;
		document.getElementById("suffix").setAttribute("disabled", "disabled");;
		/*document.getElementById("BirthDate").setAttribute("disabled", "disabled");;*/
		document.getElementById("POB").setAttribute("disabled", "disabled");;
		document.getElementById("POC").setAttribute("disabled", "disabled");;
		document.getElementById("CountryId").setAttribute("disabled", "disabled");;
		document.getElementById("Mothername").setAttribute("disabled", "disabled");;
		document.getElementById("Phone").setAttribute("disabled", "disabled");;
		document.getElementById("Cellphone").setAttribute("disabled", "disabled");;
		document.getElementById("Addressl1").setAttribute("disabled", "disabled");;
		document.getElementById("Addressl2").setAttribute("disabled", "disabled");;
		document.getElementById("City").setAttribute("disabled", "disabled");;
		document.getElementById("State").setAttribute("disabled", "disabled");;
		document.getElementById("Zipcode").setAttribute("disabled", "disabled");;
		document.getElementById("Country").setAttribute("disabled", "disabled");;
		document.getElementById("skype").setAttribute("disabled", "disabled");;
		document.getElementById("ap").setAttribute("disabled", "disabled");;
		document.getElementById("stp").setAttribute("disabled", "disabled");;
		document.getElementById("Balance").setAttribute("disabled", "disabled");;
		$("input:disabled").css('backgroundColor','#CCCCCC');
		$("input:enabled").css('backgroundColor','white');
		
	}
	function change_mod_read_only_cancle()  
	{		
	
		document.getElementById("Email").setAttribute("disabled", "disabled");;
		document.getElementById("UserName").setAttribute("disabled", "disabled");;
		document.getElementById("Password").setAttribute("disabled", "disabled");;
		document.getElementById("cpassword").setAttribute("disabled", "disabled");;
		document.getElementById("FirstName").setAttribute("disabled", "disabled");;
		document.getElementById("MiddleName").setAttribute("disabled", "disabled");;
		document.getElementById("LastName").setAttribute("disabled", "disabled");;
		document.getElementById("suffix").setAttribute("disabled", "disabled");;
		/*document.getElementById("BirthDate").setAttribute("disabled", "disabled");;*/
		document.getElementById("POB").setAttribute("disabled", "disabled");;
		document.getElementById("POC").setAttribute("disabled", "disabled");;
		document.getElementById("CountryId").setAttribute("disabled", "disabled");;
		document.getElementById("Mothername").setAttribute("disabled", "disabled");;
		document.getElementById("Phone").setAttribute("disabled", "disabled");;
		document.getElementById("Cellphone").setAttribute("disabled", "disabled");;
		document.getElementById("Addressl1").setAttribute("disabled", "disabled");;
		document.getElementById("Addressl2").setAttribute("disabled", "disabled");;
		document.getElementById("City").setAttribute("disabled", "disabled");;
		document.getElementById("State").setAttribute("disabled", "disabled");;
		document.getElementById("Zipcode").setAttribute("disabled", "disabled");;
		document.getElementById("Country").setAttribute("disabled", "disabled");;
		document.getElementById("skype").setAttribute("disabled", "disabled");;
		document.getElementById("ap").setAttribute("disabled", "disabled");;
		document.getElementById("stp").setAttribute("disabled", "disabled");;
		document.getElementById("Balance").setAttribute("disabled", "disabled");;
		document.getElementById("inviter_errorloc").innerHTML ="";
		document.getElementById("inviter_errorloc").style.display="none";
		$("input:disabled").css('backgroundColor','#CCCCCC');
		$("input:enabled").css('backgroundColor','white');
		
	}
	function change_mod()
	{
		document.getElementById("Email").disabled = false;
		document.getElementById("UserName").disabled = false;
		document.getElementById("Password").disabled = false;
		document.getElementById("cpassword").disabled = false;
		document.getElementById("FirstName").disabled = false;
		document.getElementById("MiddleName").disabled = false;
		document.getElementById("LastName").disabled = false;
		document.getElementById("suffix").disabled = false;
		/*document.getElementById("BirthDate").disabled = false;*/
		document.getElementById("POB").disabled = false;
		document.getElementById("POC").disabled = false;
		document.getElementById("CountryId").disabled = false;
		document.getElementById("Mothername").disabled = false;
		document.getElementById("Phone").disabled = false;
		document.getElementById("Cellphone").disabled = false;
		document.getElementById("Addressl1").disabled = false;
		document.getElementById("Addressl2").disabled = false;
		document.getElementById("City").disabled = false;
		document.getElementById("State").disabled = false;
		document.getElementById("Zipcode").disabled = false;
		document.getElementById("Country").disabled = false;
		document.getElementById("skype").disabled = false;
		document.getElementById("ap").disabled = false;
		document.getElementById("stp").disabled = false;
		document.getElementById("Balance").disabled = false;
		$("input:disabled").css('backgroundColor','#CCCCCC');
		$("input:enabled").css('backgroundColor','white');
	}
	change_mod_read_only();
	valid_inviter();
</script>
<!-- ####################################################################################################### -->
<?php include('bottom/bottom_blue_line.php') ?>
<!-- ####################################################################################################### -->
<?php include('bottom/bottom_link.php') ?>
<!-- ####################################################################################################### -->
<?php include('bottom/copyright.php') ?>
</body>
</html>

</body>
</html>