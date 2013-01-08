<?
include("header_new.php");
$euserid = isset($_GET['uid'])?$_GET['uid']:"";
if($euserid == "")
{
	header("location".SITE_URL."admin/index.php");
}
$db = new DBConnection();

$sql="SELECT balance FROM m_earn_history WHERE usertb_id='".$euserid."' order by earn_id desc limit 1";
$db->execArrayQuery($sql);
$rows1 = $db->next();
$bal = isset($rows1['balance'])?$rows1['balance']:0;

$sql="SELECT payment_val FROM m_daily_payment WHERE usertb_id='".$euserid."' order by dailypayment_id desc limit 1";
$db->execArrayQuery($sql);
$rows2 = $db->next();
$bal2 = isset($rows2['payment_val'])?$rows2['payment_val']:0;
//echo "$bal + $bal2 <br>";
$balance = $bal + $bal2;

$sql = "select activedeactive from m_payment_fee where usertb_id='".$euserid."'";
$db->execArrayQuery($sql);
$rows_3_3 = $db->next();

$sql = "select activedeactive from m_payment_fee_5_3 where usertb_id='".$euserid."'";
$db->execArrayQuery($sql);
$rows_5_3 = $db->next();

$sql = "select activedeactive from m_payment_fee_10_3 where usertb_id='".$euserid."'";
$db->execArrayQuery($sql);
$rows_10_3 = $db->next();

$sql="SELECT * FROM userdetail WHERE UserId='".$euserid."'";
$db->execArrayQuery($sql);
$rows = $db->next();

$sql="SELECT FirstName, LastName FROM userdetail WHERE UserId='".$rows['inviter']."'";
$db->execArrayQuery($sql);
$rows_inviter = $db->next();

$temp=$rows['inviter'];
	$sql1="SELECT * FROM userdetail where UserId='".$temp."'";
	$db->execArrayQuery($sql1);
	$row = $db->next();

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
			
			 var http_request = Create_Object();  // The variable that makes Ajax possible!
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
                http_request.open("GET",HTTP_URL+"admin/password_update.php" + parameters, true);
                http_request.send(null);
			
		}

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
<section id="content ">		
                	<div class="padding_30">
						<div class="first_welcome main">
                        	<div class="float_left font_14 color1 main"><a class="acolor" href="edit_user_detail.php?uid=<?=$euserid?>" >Update Profile</a></div>
                        </div>



						<div class="width960">
							<div class="loginbg">
								<div class="clearright"></div>
								<div class="loginbginner_1">
									<div class="title_bg"><h2 class="padding" title="">Update Profile</h2></div>
									<div class="innerarea">


									<form onSubmit="return check_form(this,event)" enctype="multipart/form-data" method="POST" action="update_ac1.php" name="form1" id="form1">
										<input type="hidden" value="<?=$rows['UserId']?>" id="UserId" name="UserId">
										<input type="hidden" value="" id="New_Latter_Subscription" name="New_Latter_Subscription" class="input">

												<div class="margin_bottom_login"> 
											<div class="float_left textea_1">User Inviter Detail</div>
											<div class="float_left">
														<?php if($temp == 0)
															  { ?>
																Your Inviter is:Admin
																<?php 
															  }
															  else
															  { ?>
																	Name:<? echo $row['FirstName']; ?>&nbsp;<? echo $row['LastName']; 
															  }
															  ?>
													</div>
													<div class="float_clear"></div>
												</div>
												<?
												if($temp != 0)
												{
													?>
													<div class="margin_bottom_login"> 
													<div class="float_left textea_1">Email:</div>
													<div class="float_left"><?=$row['Email'];?></div>
													<div class="float_clear"></div>
													</div>
													<?
												}
												?>
												<div class="margin_bottom_login"> 
												<div class="float_left textea_1">Code:</div>
												<div class="float_left"><?=$row['UserId']?></div>
												<div class="float_clear"></div>
												</div>										
										

												<div class="margin_bottom_login"> 
											<div class="float_left textea_1">User Profile:</div>
											<div class="float_left">&nbsp;</div>
											<div class="float_clear"></div>
										</div>
										
												<div class="margin_bottom_login"> 
												<div class="float_left textea_1">First name<sup>*</sup> :</div>
												<div class="float_left"><input type="text" valid_type="required" value="<? echo stripcslashes($rows['FirstName']); ?>" name="FirstName" id="fname" class="vlError" cout_errors="1"></div>
												<div class="float_clear"></div>
												</div>
												
												<div class="margin_bottom_login"> 
												<div class="float_left textea_1">Middle name<sup>*</sup> :</div>
												<div class="float_left"><input type="text" valid_type="required" value="<? echo stripcslashes($rows['MiddleName']); ?>" name="MiddleName" id="mname" class="vlError" count_errors="1"></div>
												<div class="float_clear"></div>
												</div>
												
												<div class="margin_bottom_login"> 
												<div class="float_left textea_1">Last name<sup>*</sup> :</div>
												<div class="float_left"><input type="text" valid_type="required" value="<?= stripcslashes($rows['LastName'])?>" name="LastName" id="lname" class="vlError" count_errors="1"></div>
												<div class="float_clear"></div>
												</div>
												
												<div class="margin_bottom_login"> 
												<div class="float_left textea_1">Suffix<sup>*</sup> :</div>
												<div class="float_left"><input type="text" name="suffix1" value="<? echo stripcslashes($rows['suffix']);?>" id="suffix1" class="vlError" count_errors="1"></div>
												<div class="float_clear"></div>
												</div>
												
												<div class="margin_bottom_login"> 
												<div class="float_left textea_1">Gender<sup>*</sup> :</div>
												<div class="float_left"><?
														if($rows['Gender']=='M')
														{
															echo "<div class='no_margin'><input name='gender' checked='checked' type='radio' value='M' class='input_radio' /></div><div class='float_left'>Male</div><div class='male_right'><input name='gender' type='radio'  class='input_radio' value='F' /></div><div class='float_left'>Female</div>";
														}
														else
														{
															echo "<div class='no_margin'><input name='gender' type='radio'  class='input_radio' value='M' /></div><div class='float_left'>Male</div><div class='male_right'><input name='gender' checked='checked' type='radio' value='F'  class='input_radio' /></div><div class='float_left'>Female</div>";
														}
													?>
												</div>
												<div class="float_clear"></div>
												</div>
												
												
												<div class="margin_bottom_login"> 
												<div class="float_left textea_1">Birth Date :</div>
												<div class="float_left">
														<?
															list($year,$month, $day) = explode('-', $rows['BirthDate']);
														?>
														<select name="birthday_month" id="birthday_month" class="css_select_bdate">
														<?
															if($month==1)
															{
																echo "<option value='1' selected='selected'>Jan</option>";
															}
															else
															{
																echo "<option value='1'>Jan</option>";
															}
															if($month==2)
															{
																echo "<option value='2' selected='selected'>Feb</option>";
															}
															else
															{
																echo "<option value='2'>Feb</option>";
															}
															if($month==3)
															{
																echo "<option value='3' selected='selected'>Mar</option>";
															}
															else
															{
																echo "<option value='3'>Mar</option>";
															}
															if($month==4)
															{
																echo "<option value='4' selected='selected'>Apr</option>";
															}
															else
															{
																echo "<option value='4'>Apr</option>";
															}
															if($month==5)
															{
																echo "<option value='5' selected='selected'>May</option>";
															}
															else
															{
																echo "<option value='5'>May</option>";
															}
															if($month==6)
															{
																echo "<option value='6' selected='selected'>Jun</option>";
															}
															else
															{
																echo "<option value='6'>Jun</option>";
															}
															if($month==7)
															{
																echo "<option value='7' selected='selected'>Jul</option>";
															}
															else
															{
																echo "<option value='7'>Jul</option>";
															}
															if($month==8)
															{
																echo "<option value='8' selected='selected'>Aug</option>";
															}
															else
															{
																echo "<option value='8'>Aug</option>";
															}
															if($month==9)
															{
																echo "<option value='9' selected='selected'>Sep</option>";
															}
															else
															{
																echo "<option value='9'>Sep</option>";
															}
															if($month==10)
															{
																echo "<option value='10' selected='selected'>Oct</option>";
															}
															else
															{
																echo "<option value='10'>Oct</option>";
															}
															if($month==11)
															{
																echo "<option value='11' selected='selected'>Nov</option>";
															}
															else
															{
																echo "<option value='11'>Nov</option>";
															}
															if($month==12)
															{
																echo "<option value='12' selected='selected'>Dec</option>";
															}
															else
															{
																echo "<option value='12'>Dec</option>";
															}
														?>
														</select>
														<select name="birthday_day" id="birthday_day" class="css_select_bdate2">
														<?
															$id=1;
															while($id<=31)
															{
																if($id==$day)
																{
																	echo "<option selected='selected' value='$id'>$id</option>";
																}
																else
																{
																	echo "<option value='$id'>$id</option>";
																}
																$id++;
															}
														?>
														</select>
														<Select Name="birthday_year" id="birthday_year" class="css_select_bdate">
															<?
																for($i=1950;$i<=date("Y");$i++)
																{
																	if( $i == $year)
																	{
																		echo "<option selected='selected' value=".$i.">".$i."</option>";
																	}
																	else
																	{
																		echo "<option value=".$i.">".$i."</option>";
																	}
																}
															?>
														</Select>
													</div>
												<div class="float_clear"></div>
												</div>
												
												<div class="margin_bottom_login"> 
												<div class="float_left textea_1">Place of birth<sup>*</sup> :</div>
												<div class="float_left"><input type="text" valid_type="required" value="<? echo stripcslashes($rows['POB']); ?>" name="Placeofbirth" id="Placeofbirth" class="vlError" count_errors="1"></div>
												<div class="float_clear"></div>
												</div>
												
												<div class="margin_bottom_login"> 
												<div class="float_left textea_1">Place of Citizenship<sup>*</sup> :</div>
												<div class="float_left"><input type="text" valid_type="required" value="<? echo stripcslashes($rows['POC']); ?>" name="Placeofcitizenship" id="Placeofcitizenship" class="vlError" count_errors="1"></div>
												<div class="float_clear"></div>
												</div>
												
												<div class="margin_bottom_login"> 
												<div class="float_left textea_1">Mothers Maiden Name<sup>*</sup> :</div>
												<div class="float_left"><input type="text" valid_type="required" value="<? echo stripcslashes($rows['Mothername']); ?>" name="MotherName" id="MotherName" class="vlError" count_errors="1"></div>
												<div class="float_clear"></div>
												</div>

												<div class="margin_bottom_login"> 
												<div class="float_left textea_1">Email<sup>*</sup>:</div>
												<div class="float_left"><input type="text" value="<? echo stripcslashes($rows['Email']); ?>" name="Email" id="Email"  valid_type="required" class="vlError" count_errors="1"></div>
												<div class="float_clear"></div>
												</div>

												<div class="margin_bottom_login"> 
												<div class="float_left textea_1">Phone :</div>
												<div class="float_left"><input type="text" value="<? echo stripcslashes($rows['Phone']); ?>" name="Phone" id="phone" class="vlError" count_errors="1"></div>
												<div class="float_clear"></div>
												</div>
												
												<div class="margin_bottom_login"> 
												<div class="float_left textea_1">Cell Phone<sup>*</sup>:</div>
												<div class="float_left"><input type="text" value="<? echo stripcslashes($rows['Cellphone']); ?>" name="Cellphone" id="cellphone" class="vlError" count_errors="1"></div>
												<div class="float_clear"></div>
												</div>
												
												<div class="margin_bottom_login"> 
												<div class="float_left textea_1">Street address1<sup>*</sup> :</div>
												<div class="float_left"><input type="text" valid_type="required" value="<? echo stripcslashes($rows['Addressl1']); ?>" name="Address" id="address" class="vlError" count_errors="1"></div>
												<div class="float_clear"></div>
												</div>
												
												<div class="margin_bottom_login"> 
												<div class="float_left textea_1">Street address2 :</div>
												<div class="float_left"><input type="text" value="<? echo stripcslashes($rows['Addressl2']); ?>" name="address2" id="address2" class="vlError" count_errors="1"></div>
												<div class="float_clear"></div>
												</div>
												
												<div class="margin_bottom_login"> 
												<div class="float_left textea_1">City<sup>*</sup> :</div>
												<div class="float_left"><input type="text" valid_type="required" value="<? echo stripcslashes($rows['City']); ?>" name="City" id="city" class="vlError" count_errors="1"></div>
												<div class="float_clear"></div>
												</div>
												
												<div class="margin_bottom_login"> 
												<div class="float_left textea_1">State<sup>*</sup> :</div>
												<div class="float_left"><input type="text" valid_type="required" value="<? echo stripcslashes($rows['State']); ?>" name="state" id="state" class="vlError" count_errors="1"></div>
												<div class="float_clear"></div>
												</div>
												
												<div class="margin_bottom_login"> 
												<div class="float_left textea_1">Zipcode<sup>*</sup>:</div>
												<div class="float_left"><input type="text" valid_type="required" value="<? echo stripcslashes($rows['Zipcode']); ?>" name="Zipcode" id="Zipcode" class="vlError" count_errors="1"></div>
												<div class="float_clear"></div>
												</div>
												
												<div class="margin_bottom_login"> 
												<div class="float_left textea_1">Country<sup>*</sup> :</div>
												<div class="float_left">
														<Select Name="countryid" id="countryid" class="vlError css_country">
															<? 
																$bd=new DBConnection;
																$data = "select * from country";
																$bd->execArrayQuery($data);
																while($row=$bd->next())
																{
																	if($row['iso'] == $rows['Country'])
																	{
																		$temp=new DBConnection;
																		$data1 = "select * from country where iso='".$row['iso']."'";
																		$temp->execArrayQuery($data1);
																		$t=$temp->next();
																		echo "<option selected='selected' value=".$row['iso'].">".$t['printable_name']."</option>";
																	}
																	else
																	{
																		echo "<option value=".$row['iso'].">".$row['printable_name']."</option>";
																	}
																}
															?>
														</Select>
												</div>
												<div class="float_clear"></div>
												</div>
												
												<div class="margin_bottom_login"> 
												<div class="float_left textea_1">Skype :</div>
												<div class="float_left"><input type="text" value="<? echo stripcslashes($rows['skype']); ?>" name="skype" id="skype" class="vlError" count_errors="1"></div>
												<div class="float_clear"></div>
												</div>
												
												<div class="margin_bottom_login"> 
												<div class="float_left textea_1">Payza Pay<sup></sup>:</div>
												<div class="float_left"><input type="text" value="<? echo stripcslashes($rows['ap']); ?>" name="ap1" id="ap1" class="vlError" count_errors="1"></div>
												<div class="float_clear"></div>
												</div>
												
												<div class="margin_bottom_login"> 
												<div class="float_left textea_1">Solid Trust Pay<sup></sup>:</div>
												<div class="float_left"><input type="text" value="<? echo stripcslashes($rows['stp']); ?>" name="stp1" id="stp1" class="vlError" count_errors="1"></div>
												<div class="float_clear"></div>
												</div>

											<div class="margin_bottom_login"> 
													<div class="float_left textea_1">User Email<sup>*</sup> :</div>
													<div class="float_left">
														<input type="text" value="<? echo $rows['login'];?>" onBlur="check_space(Login)" name="Login" id="Login" class="vlError">
														<!--<img id="tick" src="images/tick.png" width="16" height="16" />
														<img id="cross" src="images/cross.png" width="16" height="16" />-->
														<br />
														<span class="comment">We will send you the e-mail confirmation for account activation.</span> <!-- We will send you the restaurant's confirmation with estimated delivery time. -->
													</div>
													<div class="float_clear"></div>
											</div>
										
										<div class="margin_bottom_login"> 
											<div class="float_left textea_1">User Name :</div>
											<!--<div class="float_left"><? echo $rows['UserName']; ?></div>-->
											<div class="float_left"><input type="text" value="<? echo $rows['UserName'];?>" name="username" id="username" class="vlError" count_errors="1"></div>
											<div class="float_clear"></div>
										</div>
										<div class="margin_bottom_login"> 
											<div class="float_left textea_1">User password :</div>
											<div class="float_left" id='org'>
												<input type="password"  name="pasword" id="pasword" value="<? echo $rows['Password']; ?>"  readonly="ture"/>
												<a href="javascript: void(0)" id='chang' onclick="show_new()"> Change </a>
											</div>
											<div class="float_left" id='new' style="display:none">
												<input type="text"  name="new_pasword" id="new_pasword" value="" /> 
												<a href="javascript: void(0)" id='chang' onclick="upadate_password(<?=$rows['UserId']?>)"> Save </a> 
												<a href="javascript: void(0)"  id='cancel' onclick="hide_new()"> Cancel</a>
											</div>
											<div class="float_clear"></div>
										</div>
										
										
										<?
										//if($rows['active'] == 1)
										//{
										?>

												<div class="margin_bottom_login"> 
													<div class="float_left textea_1">Balance :</div>
													<div class="float_left">
														<input type="hidden" name="static_bal" id="static_bal" value="<? echo $balance; ?>" />
														<input type="text" disabled="disabled" onchange="changeval_check();" value="<? echo $balance; ?>" name="Balance" id="Balance" class="vlError">
														<input type="hidden" name="Balance_change" id="Balance_change" value="false">
													</div>
													<div class="float_clear"></div>
												</div>
		
												<!--<div class="margin_bottom_login"> 
													<div class="float_left textea_1">Action :</div>
													<div class="float_clear"></div>
												</div>
		-->
												<? /*
												if($rows_3_3['activedeactive'] == "")
												{
													?>
													<div class="margin_bottom_login" id="upgradestream33_div"> 
														<div class="float_left textea_1"></div>
														<div class="buttons_1 float_left">
															<input type="button" value="Upgrade to 3x3" onClick="upgrade_3_3(<?=$rows['UserId']?>)" name="upgradestream33" id="upgradestream33" class="link1_1112">
														</div>
														<div class="float_clear"></div>
													</div>
													<?
												}
												else
												{
													?>
													<div class="margin_bottom_login" id="upgradestream33_div" style="display:none"> 
														<div class="float_left textea_1"></div>
														<div class="buttons_1 float_left">
															<input type="button" value="Upgrade to 3x3" onClick="upgrade_3_3(<?=$rows['UserId']?>)" name="upgradestream33" id="upgradestream33" class="link1_1112">
														</div>
														<div class="float_clear"></div>
													</div>
													<?
												}
												?>
												<?
												if($rows_5_3['activedeactive'] == "")
												{
												?>
													<div class="margin_bottom_login" id="upgradestream53_div"> 
														<div class="float_left textea_1"></div>
														<div class="buttons_1 float_left">
															<input type="button" value="Upgrade to 5x3" onClick="upgrade_5_3(<?=$rows['UserId']?>)" name="upgradestream53" id="upgradestream53" class="link1_1112">
														</div>
														<div class="float_clear"></div>
													</div>
												<?
												}
												else
												{
													?>
													<div class="margin_bottom_login" id="upgradestream53_div" style="display:none"> 
														<div class="float_left textea_1"></div>
														<div class="buttons_1 float_left">
															<input type="button" value="Upgrade to 5x3" onClick="upgrade_5_3(<?=$rows['UserId']?>)" name="upgradestream53" id="upgradestream53" class="link1_1112">
														</div>
														<div class="float_clear"></div>
													</div>
													<?
												}
												?>
		
												<?
												if($rows_10_3['activedeactive'] == "")
												{
													?>
													<div class="margin_bottom_login" id="upgradestream103_div"> 
														<div class="float_left textea_1"></div>
														<div class="buttons_1 float_left">
															<input type="button" value="Upgrade to 10x3" onClick="upgrade_10_3(<?=$rows['UserId']?>)" name="upgradestream103" id="upgradestream103" class="link1_1112">
														</div>
														<div class="float_clear"></div>
													</div>
													<?
												}
												else
												{
													?>
													<div class="margin_bottom_login" id="upgradestream103_div" style="display:none"> 
														<div class="float_left textea_1"></div>
														<div class="buttons_1 float_left">
															<input type="button" value="Upgrade to 10x3" onClick="upgrade_10_3(<?=$rows['UserId']?>)" name="upgradestream103" id="upgradestream103" class="link1_1112">
														</div>
														<div class="float_clear"></div>
													</div>
													<?
												}
												?>
		
												<?
												if($rows_3_3['activedeactive'] == "active")
												{
												?>
													<div class="margin_bottom_login" id="downgradestream33_div"> 
														<div class="float_left textea_1"></div>
														<div class="buttons_1 float_left">
															<input type="button" value="Downgrade to 3x3" onClick="downgrade_3_3(<?=$rows['UserId']?>)" name="downgradestream33" id="downgradestream33" class="link1_1112">
														</div>
														<div class="float_clear"></div>
													</div>
												<?
												}
												else
												{
												?>
													<div class="margin_bottom_login" id="downgradestream33_div" style="display:none"> 
														<div class="float_left textea_1"></div>
														<div class="buttons_1 float_left">
															<input type="button" value="Downgrade to 3x3" onClick="downgrade_3_3(<?=$rows['UserId']?>)" name="downgradestream33" id="downgradestream33" class="link1_1112">
														</div>
														<div class="float_clear"></div>
													</div>
												<?
												}
												?>
		
												<?
												if($rows_5_3['activedeactive'] == "active")
												{
												?>
													<div class="margin_bottom_login" id="downgradestream53_div" > 
														<div class="float_left textea_1"></div>
														<div class="buttons_1 float_left">
															<input type="button" value="Downgrade to 5x3" onClick="downgrade_5_3(<?=$rows['UserId']?>)" name="downgradestream53" id="downgradestream53" class="link1_1112">
														</div>
														<div class="float_clear"></div>
													</div>
												<?
												}
												else
												{
												?>
													<div class="margin_bottom_login" id="downgradestream53_div" style="display:none"> 
														<div class="float_left textea_1"></div>
														<div class="buttons_1 float_left">
															<input type="button" value="Downgrade to 5x3" onClick="downgrade_5_3(<?=$rows['UserId']?>)" name="downgradestream53" id="downgradestream53" class="link1_1112">
														</div>
														<div class="float_clear"></div>
													</div>
												<?
												}
												?>
		
												<?
												if($rows_10_3['activedeactive'] == "active")
												{
												?>
													<div class="margin_bottom_login" id="downgradestream103_div"> 
														<div class="float_left textea_1"></div>
														<div class="buttons_1 float_left">
																<input type="button" value="Downgrade to 10x3" onClick="downgrade_10_3(<?=$rows['UserId']?>)" name="downgradestream103" id="downgradestream103" class="link1_1112">
														</div>
														<div class="float_clear"></div>
													</div>
												<?
												}
												else
												{
												?>
													<div class="margin_bottom_login" id="downgradestream103_div" style="display:none"> 
														<div class="float_left textea_1"></div>
														<div class="buttons_1 float_left">
															<input type="button" value="Downgrade to 10x3" onClick="downgrade_10_3(<?=$rows['UserId']?>)" name="downgradestream103" id="downgradestream103"class="link1_1112">
														</div>
														<div class="float_clear"></div>
													</div>
												<?
												} */
												?>
		
												<div class="buttons_1 float_left">
													<input type="submit" name="submit" id="submit" class="link1_11" value="Update Profile" onclick="javascript: submitFun()"/>
												</div>
												<div class="float_clear"></div>
										<?
										/* }
										else
										{
												?>
												<div class="margin_bottom_login"> 
													<div class="float_left textea_1">Action :</div>
													<div class="buttons_1 float_left" style="margin-left:0px !important;">
														<input type="hidden" name="uid" id="uid" value="<?=$rows['UserId']?>" />
														<input type="button" value="Activate" onClick="activate_user()" name="activate" id="activate" class="link1_1112">
													</div>
													<div class="float_clear"></div>
												</div>
		
												<div class="buttons_1 float_left">
													<input type="button" name="backbtn" id="backbtn" class="link1_11" value="Back" onclick="javascript:history.go(-1);"/>
												</div>
												<div class="float_clear"></div>
												<?
										} */
										
										?>
									</form>
								</div>
								</div>
							</div>
						</div>
					</div>
	</section>
<?
	include("footer.php");
?>