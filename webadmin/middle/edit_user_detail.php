<?
$euserid = isset($_GET['uid'])?$_GET['uid']:"";
if($euserid == "")
{
	header("location".ADMIN_URL."index.php");
}
$form = new Form();

$sql="SELECT balance FROM m_earn_history WHERE usertb_id='".$euserid."' order by earn_id desc limit 1";
$rows1 = $form->getRow($sql);
$bal = isset($rows1['balance'])?$rows1['balance']:0;

$sql="SELECT payment_val FROM m_daily_payment WHERE usertb_id='".$euserid."' order by dailypayment_id desc limit 1";
$rows2 = $form->getRow($sql);
$bal2 = isset($rows2['payment_val'])?$rows2['payment_val']:0;
//echo "$bal + $bal2 <br>";
$balance = $bal + $bal2;

$sql = "select activedeactive from m_payment_fee where usertb_id='".$euserid."'";
$rows_3_3 = $form->getRow($sql);

$sql = "select activedeactive from m_payment_fee_5_3 where usertb_id='".$euserid."'";
$rows_5_3 = $form->getRow($sql);

$sql = "select activedeactive from m_payment_fee_10_3 where usertb_id='".$euserid."'";
$rows_10_3 = $form->getRow($sql);

$sql="SELECT * FROM userdetail WHERE UserId='".$euserid."'";
$rows = $form->getRow($sql);

$temp=$rows['inviter'];
$sql1="SELECT * FROM userdetail where UserId='".$temp."'";
$row = $form->getRow($sql1);

?>
<?php
		$table = "userdetail";
		$title = "Member Listing";
	
		$form = new Form();
		$getid = isset($_GET['uid'])?$_GET['uid']:0;
		$sql = "SELECT * FROM `{$table}` WHERE `UserId` = {$euserid}";
		$row_u_detail = $form->getRow($sql);

		$countries = $form->getArray("SELECT * FROM `country` ");
		$countries = $form->dd($countries,array(""=>"Select"),"name","iso");
		$form->values 				=  (sizeof($_POST)>0)?$_POST:$row_u_detail;
		$form->fields 				=  array(
			"chk_err"  				=> array("name"=>"chk_err","type"=>"hidden","save2db"=>"false" ),
			"UserId"  				=> array("name"=>"UserId","type"=>"hidden", "value"=>$row_u_detail['UserId']),
			"First name"			=> array("name"=>"FirstName","type"=>"text","validate"=>"R", "onblur"=>"check_space(this)"),
			"Middle Name"			=> array("name"=>"MiddleName","type"=>"text","validate"=>"R", "onblur"=>"check_space(this)"),
			"Last Name"				=> array("name"=>"LastName","type"=>"text","validate"=>"R", "onblur"=>"check_space(this)"),
			"Suffix"				=> array("name"=>"suffix","type"=>"text", "onblur"=>"check_space(this)"),
			"Gender"				=> array("name"=>"Gender","type"=>"radio","values"=>array(array("name"=>"gender","value"=>"M","class"=>"radio","title"=>"Male","title_class"=>"radio","checked"=>"checked"),array("name"=>"gender","value"=>"F","title"=>"Female"))),
			/*"Birthdate"				=> array("name"=>"BirthDate","type"=>"text","validate"=>"R","value"=>$row_u_detail['BirthDate'],"readonly"=>"yes"),*/
			"Place of Birth"		=> array("name"=>"POB","type"=>"text","validate"=>"R", "onblur"=>"check_space(this)"),
			"Place of Citizenship"	=> array("name"=>"POC","type"=>"text","validate"=>"R", "onblur"=>"check_space(this)"),
			"SSN/CountryID/EIN"		=> array("name"=>"CountryId","type"=>"hidden","save2db"=>"false"),
			"Mothers Maiden Name"	=> array("name"=>"Mothername","type"=>"text","validate"=>"R","value"=>$row_u_detail['Mothername'], "onblur"=>"check_space(this)"),
			"User Email"			=> array("name"=>"Email","type"=>"text","validate"=>"R","onchange"=>"check_space(this)","onblur"=>"set_loginval(this)","hint"=>'<img id="tick" src="images/tick.png" width="16" height="16" /><img id="cross" src="images/cross.png" width="16" height="16" />We will send you the e-mail confirmation for account activation.'),
			"Email_ori"				=> array("name"=>"Email_ori","type"=>"hidden","value"=>$row_u_detail['Email'],"save2db"=>"false"),
			"Phone"					=> array("name"=>"Phone","type"=>"text"),
			"Cellphone"				=> array("name"=>"Cellphone","type"=>"text"),
			"Street address1"		=> array("name"=>"Addressl1","type"=>"text","validate"=>"R", "onblur"=>"check_space(this)"),
			"Street address2"		=> array("name"=>"Addressl2","type"=>"text"),
			"City"					=> array("name"=>"City","type"=>"text"),
			"State"					=> array("name"=>"State","type"=>"text"),
			"Zip/Postal Code"		=> array("name"=>"Zipcode","type"=>"text"),
			"Country"				=> array("name"=>"Country","type"=>"dropdown","validate"=>"R","values"=>$countries,"hint"=>'<div class="clear"></div>'),
			"Skype"					=> array("name"=>"skype","type"=>"text"),
			"Payza Pay"				=> array("name"=>"ap","type"=>"text"),
			"Solid Trust Pay"		=> array("name"=>"stp","type"=>"text"),
			"User Name"				=> array("name"=>"UserName","type"=>"text","validate"=>"R","onblur"=>"check_space(this)","hint"=>'<img id="tick1" src="images/tick.png" width="16" height="16" /><img id="cross1" src="images/cross.png" width="16" height="16" />'),
			"Balance"				=> array("name"=>"Balance","value"=>"59", "type"=>"text","readonly"=>"yes","validate"=>"R","save2db"=>"false","value"=>$balance),
			"Login"					=> array("name"=>"login","type"=>"hidden"),	
		);
		
		
		if(sizeof($_POST)>0) {
			if($form->validate()) {
				if($euserid>0) {
					$idx = $form->updateOnTable($table,array(array("UserId"=>$euserid)));
					if($idx=="success") {
						echo '<script>document.location="index.php?file=member_list&msg=Updated Successfully."</script>';
					}	
				}else{

					$idx = $form->processOnTable($table);
					if(is_numeric($idx)) {
						echo '<script>document.location="index.php?file=member_list&msg=Added Successfully."</script>';
					}else{
						$form->message('Record not saved.','error');
					}	
				}
			}
		}
?>
<!--<script type="text/javascript" src="<?=SITE_URL?>js/jquery.js"></script>-->
<script type="text/javascript">

	function check_form(f, event){
	
			//var result = vl_FormEventHandler(event);
			var txtval = document.getElementById("Balance").value;
			if(isNaN(txtval))
			{
				alert("Please Insert Proper Balance");
				return false;
			}
			else if(txtval < 0)
			{
				alert("Please Insert Proper Balance");
				return false;
			}
			return true;
	}
	function changeval_check()
	{
		var mainbal = "<?=$balance?>";
		var txtval = document.getElementById("Balance").value;
		if(mainbal != txtval)
		{
			document.getElementById("Balance_change").value = true;
		}
		else
		{
			document.getElementById("Balance_change").value = false;
		}
	}
	function activate_user()
	{
		
		var r=confirm("Are you sure, you want to Active this User?");
		if (r==true)
		{
			document.getElementById("form1").action = "activate_user.php";
			document.getElementById("form1").submit();
		}
	}
	function show_new(){
		document.getElementById("new_pasword").value= "";
		document.getElementById("new").style.display = "";
		document.getElementById("org").style.display = "none";
	}
	function hide_new(){
		document.getElementById("new_pasword").value= "";
		document.getElementById("org").style.display = "";
		document.getElementById("new").style.display = "none";
	}
	function submitFun()
	{	
		//alert("Hello");
		document.submitFun.submit();
	}
	function upadate_password(user_id){
		var new_pass = document.getElementById("new_pasword");
		
		if(new_pass.value==""){
			alert("Please enter Passsword..");
			new_pass.focus();
		}else{
			
			 var http_request = getXMLHTTP();  // The variable that makes Ajax possible!
                // Create a function that will receive data sent from the server
             http_request.onreadystatechange = function(){
                        if(http_request.readyState == 4){
                                if(http_request.responseText=='Succ' ){
									document.getElementById("org").style.display = "";
									document.getElementById("new").style.display = "none";
									alert("Password Changed Successfully")
								}else{
									alert("Password Changed Unsuccessfully.... Please Try again..")
								}
								//document.getElementById("topping_"+next).innerHTML = http_request.responseText;

                                
                        }
                }
                var parameters = "?pass="+new_pass.value+"&uid="+user_id;
                http_request.open("GET",ADMIN_URL+"ajax/password_update.php" + parameters, true);
                http_request.send(null);
			
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
	<script src="../js/others.js"></script>
<style type="text/css">
label[for=login] { display:none;}
label[for=UserId] { display:none;}
label[for=chk_err] { display:none;}
label[for=Email_ori] { display:none;}
label[for=CountryId] { display:none;}
.textea_1
{
	width:180px;
}
.vlErrorMsg
{
	padding-left:0px;
}
.vlNoErrorMsg {
	padding-left: 0px;
}
	#tick{display:none}
	#cross{display:none}

	#tick1{display:none}
	#cross1{display:none}
	.radio { float:left;margin-right:10px;}
	.myform div.fieldbox input[type="submit"]
	{
		background: -moz-linear-gradient(center top , #96C161 0%, #609C3D 100%) repeat scroll 0 0 transparent !important;
		border: 1px solid #68A341 !important;
		border-radius: 2px 2px 2px 2px !important;
		box-shadow: 0 1px 2px 0 #A4CA6C inset;
		color: #FFFFFF !important;
		display: inline-block !important;
		font-size: 11px !important;
		font-weight: bold;
		line-height: 14px;
		margin-left: 152px;
		margin-top: 15px;
		padding: 6px 14px;
		text-shadow: 0 -1px #6F6F6F;
		width:auto !important;
	}
		
		
</style>
			<div id="content">
		<!-- Main content -->
		<div class="wrapper check">
			<div class="fluid">
				<div class="widget grid12">
              		<div class="whead">
                    	<h6></h6>
						<div class="whead">
							<ul class="titleToolbar">
								<li><a onclick="javascript:window.location='<?=INDEX_FILE?>member_list'">Back</a></li>
							</ul> 
							<div class="clear"></div>
						</div>						
					</div> <!-- End whead -->	
					
					<div class="body">


									<form enctype="multipart/form-data" method="POST" name="form1" id="form1" class="myform">
										<input type="hidden" value="" id="New_Latter_Subscription" name="New_Latter_Subscription" class="input">
											<?php
											if($temp == 0)
											{
												?>
												<div class="fieldbox">
													<label><span style="color:#FF0000;"></span>Your Inviter is: </label>
													<div class="grid8">Admin</div>
													<div class="clear"></div>
												</div>
												<?php 
											}
											else
											{
												?>
												<div class="fieldbox">
													<label><span style="color:#FF0000;"></span>Your Inviter is: </label>
													<div class="grid8"><?php echo $row['FirstName']; ?>&nbsp;<?php echo $row['LastName']; ?>
													</div>
													<div class="clear"></div>
												</div>
												<?
											}
										  	if($temp != 0)
											{
												?>
												<div class="fieldbox">
													<label><span style="color:#FF0000;"></span>Email: </label>
													<div class="grid8"><?=$row['Email'];?>
													</div>
													<div class="clear"></div>
												</div>
												<?
											}
											?>
											<div class="fieldbox">
												<label><span style="color:#FF0000;"></span>Code: </label>
												<div class="grid8"><?=$row['UserId'];?>
												</div>
												<div class="clear"></div>
											</div>
										
										<?php $form->display(); ?>
										
										
											<div class="fieldbox">
												<label><span style="color:#FF0000;">*</span>User password: </label>
												<div class="grid8">
													<div class="float_left" id='org'>
														<input type="password"  name="pasword" id="pasword" value="<? echo $rows['Password']; ?>"  readonly="ture"/>
														<a href="javascript: void(0)" id='chang' onclick="show_new()"> Change </a>
													</div>
													<div class="float_left" id='new' style="display:none">
														<input type="text"  name="new_pasword" id="new_pasword" value="" /> 
														<a href="javascript: void(0)" id='chang' onclick="upadate_password(<?=$rows['UserId']?>)"> Save </a> 
														<a href="javascript: void(0)"  id='cancel' onclick="hide_new()"> Cancel</a>
													</div>
												</div>
												<div class="clear"></div>
											</div>
										
										<div class="fieldbox">
											<input type="submit" value="Submit"  />
											<a href="index.php?file=member_list" class="buttonS bRed">Back</a>
										</div>
										
									</form>
					</div><!-- Body end -->
				</div> <!-- widget End -->
			</div><!-- fluid End -->	
		</div><!-- wrapper End -->
		</div> <!-- Content -->
