<style type="text/css">
	.widget
	{
		margin-top:70px;
	}
</style>
<?php
		$table = "userdetail";
		$title = "Member Listing";
	
		$form = new Form();
		$getid = isset($_SESSION['userid'])?$_SESSION['userid']:0;
		$sql = "SELECT * FROM `{$table}` WHERE `UserId` = {$getid}";
		$row = $form->getRow($sql);

		$countries = $form->getArray("SELECT * FROM `country` ");
		$countries = $form->dd($countries,array(""=>"Select"),"name","iso");
		
		$form->values 				=  (sizeof($_POST)>0)?$_POST:$row;
		$form->fields 				=  array(
			"chk_err"  				=> array("name"=>"chk_err","type"=>"hidden","save2db"=>"false", ),
			"User Email"			=> array("name"=>"Email","type"=>"text","readonly"=>"yes", "validate"=>"R","save2db"=>"false","onchange"=>"check_space(this)","onblur"=>"set_loginval(this)","hint"=>'<img id="tick" src="images/tick.png" width="16" height="16" /><img id="cross" src="images/cross.png" width="16" height="16" />We will send you the e-mail confirmation for account activation.'),
			"Email_ori"				=> array("name"=>"Email_ori","type"=>"hidden", "value"=>$row['Email'],"save2db"=>"false"),
			"User Name" 			=> array("name"=>"UserName","type"=>"text","readonly"=>"yes", "validate"=>"R","save2db"=>"false","onblur"=>"check_space(this)","hint"=>'<img id="tick1" src="images/tick.png" width="16" height="16" /><img id="cross1" src="images/cross.png" width="16" height="16" />'),
			"UserName_ori" 			=> array("name"=>"UserName_ori","type"=>"hidden", "value"=>$row['UserName'],"save2db"=>"false"),

			"First name"			=> array("name"=>"FirstName","type"=>"text","validate"=>"R", "onblur"=>"check_space(this)"),
			"Middle Name"			=> array("name"=>"MiddleName","type"=>"text","validate"=>"R", "onblur"=>"check_space(this)"),
			"Last Name"				=> array("name"=>"LastName","type"=>"text","validate"=>"R", "onblur"=>"check_space(this)"),
			"Suffix"				=> array("name"=>"suffix","type"=>"text", "onblur"=>"check_space(this)"),
			"Gender"				=> array("name"=>"Gender","type"=>"radio","values"=>array(array("name"=>"gender","value"=>"M","class"=>"radio","title"=>"Male","title_class"=>"radio","checked"=>"checked"),array("name"=>"gender","value"=>"F","title"=>"Female"))),
			/*"Birthdate"				=> array("name"=>"BirthDate","type"=>"text","validate"=>"R","readonly"=>"yes", "class"=>"inlinedate"),*/
			"Place of Birth"		=> array("name"=>"POB","type"=>"text","validate"=>"R", "onblur"=>"check_space(this)"),
			"Place of Citizenship"	=> array("name"=>"POC","type"=>"text","validate"=>"R", "onblur"=>"check_space(this)"),
			"SSN/CountryID/EIN"		=> array("name"=>"CountryId","type"=>"hidden","save2db"=>"false"),
			"Mothers Maiden Name"	=> array("name"=>"Mothername","type"=>"text","validate"=>"R", "onblur"=>"check_space(this)"),
			"Phone"					=> array("name"=>"Phone","type"=>"text"),
			"Cellphone"				=> array("name"=>"Cellphone","type"=>"text"),
			"Street address1"		=> array("name"=>"Addressl1","type"=>"text","validate"=>"R", "onblur"=>"check_space(this)"),
			"Street address2"		=> array("name"=>"Addressl2","type"=>"text"),
			"City"					=> array("name"=>"City","type"=>"text"),
			"State"					=> array("name"=>"State","type"=>"text"),
			"Zip/Postal Code"		=> array("name"=>"Zipcode","type"=>"text"),
			"Country"				=> array("name"=>"Country","type"=>"dropdown","validate"=>"R","values"=>$countries),
			"Skype"					=> array("name"=>"skype","type"=>"text"),
			"Payza Pay"				=> array("name"=>"ap","type"=>"text"),
			"Solid Trust Pay"		=> array("name"=>"stp","type"=>"text"),
			"Login"					=> array("name"=>"login","type"=>"hidden"),	

		);
		
		
		if(sizeof($_POST)>0) {
			if($form->validate()) {
				if($getid>0) {
					$idx = $form->updateOnTable($table,array(array("UserId"=>$getid)));
					if($idx=="success") {
						echo '<script>document.location="index.php?file=profile&msg=Updated Successfully."</script>';
					}	
				}else{
					$idx = $form->processOnTable($table);
					if(is_numeric($idx)) {
						echo '<script>document.location="index.php?file=profile&msg=Added Successfully."</script>';
					}else{
						$form->message('Record not saved.','error');
					}	
				}
			}
		}
?>
<!-- Content begins -->
	<style>
	label[for=reson] { display:none;}
	label[for=stream] { display:none;}
	label[for=inviter] { display:none;}
	label[for=img] { display:none;}
	label[for=login] { display:none;}
	label[for=Email_ori] { display:none;}
	label[for=UserName_ori] { display:none;}
	label[for=CountryId] { display:none;}
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
					 var password = $('#passwd').val();
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
	</script>
	<script src="../js/others.js"></script>
	<div id="content2" style="margin-left: 100px;">
		<!-- Main content -->
		<div class="wrapper">
			<div class="fluid">
				<div class="widget grid12">
					<?php echo $form->showMessage(); ?>
					<div class="whead">
						<h6>
							<?php echo (isset($_REQUEST['txtsp_masterid']) && !empty($_REQUEST['txtsp_masterid']))?"Edit $title":"Add $title";?>
						</h6>
						<div class="whead">
							<ul class="titleToolbar">
								<li><a onclick="javascript:window.location='<?=INDEX_FILE?>welcome'">Back</a></li>
							</ul> 
							<div class="clear"></div>
						</div>						
					</div> <!-- End whead -->	
					<div class="body">
					<form action="" method="post" class="myform">
					<?php $form->display(); ?>
					<div class="fieldbox">
						<input type="submit" value="Submit"  />
						<a href="index.php" class="buttonS bRed">Back</a>
					</div>
					</form>
					</div><!-- Body end -->
				</div> <!-- widget End -->
			</div><!-- fluid End -->	
		</div><!-- wrapper End -->
	</div> <!-- Content -->
