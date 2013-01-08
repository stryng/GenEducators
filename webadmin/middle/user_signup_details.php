<?php

		$table = "userdetail";
		$pre_table = "pre_userdetail";
		
		$title = "Member Listing";

	

		$form = new Form();

		$getid = isset($_GET['txtsp_masterid'])?$_GET['txtsp_masterid']:0;

		$sql = "SELECT * FROM `{$table}` WHERE `UserId` = {$getid}";

		$row = $form->getRow($sql);



		$countries = $form->getArray("SELECT * FROM `country` ");

		$countries = $form->dd($countries,array(""=>"Select"),"name","iso");

		

		$form->values 				=  (sizeof($_POST)>0)?$_POST:$row;

		$form->fields 				=  array(

			"usercode"				=> array("name"=>"usercode","type"=>"hidden", "value"=>rand(10000,99999)),

			"usercode_5_3"			=> array("name"=>"usercode_5_3","type"=>"hidden", "value"=>rand(100000,999999)),

			"usercode_10_3"			=> array("name"=>"usercode_10_3","type"=>"hidden", "value"=>rand(1000000,9999999)),



			"chk_err"  				=> array("name"=>"chk_err","type"=>"hidden","save2db"=>"false", ),

			"reson"  				=> array("name"=>"reson","type"=>"hidden","save2db"=>"false", "value"=>(isset($_GET['reson'])?$_GET['reson']:"")),

			"stream" 				=> array("name"=>"stream","type"=>"hidden","save2db"=>"false", "value"=>(isset($_GET['stream'])?$_GET['stream']:"0")),

			"Inviter ID"  			=> array("name"=>"inviter","type"=>"text","class"=>"lname","onblur"=>"valid_inviter();","hint"=>'<div id="inviter_errorloc" style="left: 0px;display:none;position: relative;top: 0px;background: white;color: GREEN;text-shadow: none;width:360px;border-radius : 6px;text-align:justify;height:auto;padding:5px;"></div><div class="clear"></div>'),

			"inviter_5_3"  			=> array("name"=>"inviter_5_3","type"=>"hidden"),

			"inviter_10_3"  		=> array("name"=>"inviter_10_3","type"=>"hidden"),

			"User Email"			=> array("name"=>"Email","type"=>"text","class"=>"lname","validate"=>"R","onchange"=>"check_space(this)","onblur"=>"set_loginval(this)","hint"=>'<img id="tick" src="images/tick.png" width="16" height="16" /><img id="cross" src="images/cross.png" width="16" height="16" />We will send you the e-mail confirmation for account activation.'),

			/*"User Name" 			=> array("name"=>"UserName","type"=>"text","class"=>"lname","validate"=>"R","onblur"=>"check_space(this)","hint"=>'<img id="tick1" src="images/tick.png" width="16" height="16" /><img id="cross1" src="images/cross.png" width="16" height="16" />'),*/

			"Password"  			=> array("name"=>"Password","type"=>"password","class"=>"lname","validate"=>"R"),

			"Confrim Password"		=> array("name"=>"cpassword","type"=>"password","class"=>"lname","validate"=>"R", "onblur"=>"check_passwd()","save2db"=>"false"),

			

			"First name"			=> array("name"=>"FirstName","type"=>"text","class"=>"lname","validate"=>"R", "onblur"=>"check_space(this)"),


			"Last Name"				=> array("name"=>"LastName","type"=>"text","class"=>"lname","validate"=>"R", "onblur"=>"check_space(this)"),

			"Suffix"				=> array("name"=>"suffix","type"=>"text","class"=>"lname", "onblur"=>"check_space(this)"),

			"Gender"				=> array("name"=>"Gender","type"=>"radio","values"=>array(array("name"=>"gender","value"=>"M","class"=>"radio","title"=>"Male","title_class"=>"radio","checked"=>"checked"),array("name"=>"gender","value"=>"F","title"=>"Female"))),

			/*"Birthdate"			=> array("name"=>"BirthDate","type"=>"text","class"=>"lname","validate"=>"R","readonly"=>"yes"),*/


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

			"joindate"				=> array("name"=>"joindate","type"=>"hidden",'value'=>date('Y-m-d H:i:s')),	

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

					$_POST['inviter_5_3'] = $_POST['inviter'];

					$_POST['inviter_10_3'] = $_POST['inviter'];

					$idx = $form->processOnTable($pre_table);
					
					$email = $_POST['Email'];

					$q="SELECT UserId FROM `$pre_table` WHERE `$pre_table`.`login` = '{$email}'" ;

					$rows = $form->getRow($q);

					if(sizeof($rows)>0) {

						$users_id = $rows['UserId'];

					}

					/*

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

					*/

					?>

					<script type="text/javascript">

						window.location = "<?=HTTP_URL?>withoutpayment_confirmation.php?email=<?=$_POST['Email']?>&userid=<?=$users_id?>";

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

	label[for=reson] { display:none;}

	label[for=stream] { display:none;}

	label[for=inviter_5_3] { display:none;}

	label[for=inviter_10_3] { display:none;}

	label[for=img] { display:none;}

	label[for=login] { display:none;}

	label[for=joindate] { display:none;}

	label[for=chk_err] { display:none;}

	label[for=usercode] { display:none;}

	label[for=usercode_5_3] { display:none;}

	label[for=usercode_10_3] { display:none;}

	input[type=radio] { margin-top:8px;}

	.radio { float:left;margin-right:10px;}

	#content

	{

		padding-top::0px;

	}

	#tick{display:none}

	#cross{display:none}



	#tick1{display:none}

	#cross1{display:none}



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

	<script src="../js/others.js"></script>

	<div id="content2" style="margin-left: 100px;">

		<!-- Main content -->

		<div class="wrapper">

			<div class="fluid">

				<div class="widget grid12">		

				 <?php if(@$view_message==1)

				 			{ echo '<div class="nNote nSuccess"><p>Record save success , Plase Check your email id and Active your account !!</p> </div>';} 

						else if(@$view_message==2)

							{ echo '	<div class="nNote nFailure"><p>Oops sorry. Record not save</p></div>';} 

						else if

							(@$view_message==3){ echo '	<div class="nNote nFailure"><p>Emailid is already exist. Please change it and try again.</p></div>';} ?>

					<div class="whead">

						<h6>

							Add <?=$title?>

						</h6>

						<div class="whead">

							<ul class="titleToolbar">

								<li><a onclick="javascript:window.location='<?=INDEX_FILE?>member_list'">Back</a></li>

							</ul> 

							<div class="clear"></div>

						</div>						

					</div> <!-- End whead -->	

					<div class="body">

					<form action="" method="post" class="myform">

						<?php echo $form->showMessage(); 

						if($str_msg == "")

						{

							$form->display();

							?>

							<div class="fieldbox">

								<input type="submit" value="Submit"  />

								<a href="index.php?file=religious_listing" class="buttonS bRed">Back</a>

							</div>

							<?php

						}

						?>

					</form>

					</div><!-- Body end -->

				</div> <!-- widget End -->

			</div><!-- fluid End -->	

		</div><!-- wrapper End -->

	</div> <!-- Content -->

