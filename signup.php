<?
require_once("business_logic/config/configure.php");
require_once("business_logic/class/form.class.php");
if(!isset($_GET['inviter']))
{
	header("location:".SITE_URL."login.php");
}
$msg = "";
//$bd=new DBConnection;
$data = "select * from country";
//$bd->execArrayQuery($data);
		$form = new Form();
		$form->fields = array(
			"First Name" =>array("name"=>"first_name","type"=>"text","validate"=>"R"),		
		);
		$form->display();
die;
				
?>
<?php require('header_new.php');  

?> 
<script type="text/javascript">
$(document).ready(function () {	
	
	$('#nav li').hover(
		function () {
			//show its submenu
			$('ul', this).slideDown(500);

		}, 
		function () {
			//hide its submenu
			$('ul', this).slideUp(300);			
		}
	);
	
});
	</script>
<SCRIPT LANGUAGE="JavaScript"><!--

                function check_form(f, event){

                  		var result = vl_FormEventHandler(event);
                  		return result;
                }
                function change_radioclass(id)
                {
                    for(i=0;i<3;i++)
                    {
                        if(id == "gender"+i)
                            document.getElementById("gender"+i).className = "radio styled1";
                        else
                            document.getElementById("gender"+i).className = "radio styled2";
                    }
                }
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
					var text=username.value;
					if(len > 245)
					{
						alert("String is greater than 245");
					}
					else
					{
						username.value = (username.value).replace(/^\s*|\s*$/g,'');	
					}
				}
				function add_email(){
					 //alert(document.getElementById("Login").value) ;//= document.getElementById("email1").value;	
					 document.getElementById("email1").value = document.getElementById("Login").value;
				}

                //-->
                </SCRIPT>
<style type="text/css">
			.vlErrorMsg
			{
				padding-left:0px;
				color:#FF0000;
			}
			.vlNoErrorMsg {
				padding-left: 0px;
			}
			  .username
                    {
                            padding:3px;
                            font-size:18px;
                            border:3px #CCC solid;
                    }

                    #tick{display:none}
                    #cross{display:none}

                    #tick1{display:none}
                    #cross1{display:none}

                .radio_buttons_itens
                {
                    border: medium none;
                    color: #666666;
                    font-size: 16px;
                    margin: 5px 0 0 5px;
                    outline: medium none;
                    padding: 4px 8px 6px;
                    width: 40px;
                }
                .vlNoErrorMsg {
                        color: #666;
                        text-decoration: line-through;
                        font-size:x-small;
                }
                a.CancelMerge {
                        color:black;
                        background-Color:#ebebeb;
                        display:inline-block;
                        padding:5px;
                        text-decoration:underline;
                        font-size:12px;
                        -webkit-border-radius: 10px;
                        -moz-border-radius: 10px;
                        border-radius: 10px;
                }
				.vde{
					/*position: absolute;*/
					top: 115px; 
					right: 23px; 
					width: 300px; 
					
				}
				.DivLeftUser {
					 background: none repeat scroll 0 0 #FAFAFA;
				    border: 1px solid #F0F0F0;
					height: 300px;
					margin: -1255px 0 0 600px;
					position: absolute;
					width: 317px;
				}
				.H2cls{
					background: none repeat scroll 0 0 #F0F0F0;
				    font-size: 14px;
				    padding: 7px 5px;
				}
			</style>
<?
	/*if(empty($_REQUEST['Login']))
	{
		$msg = "Enter Your Email";
	}*/
?>			
<script type="text/javascript" src="jwplayer/jwplayer.js"></script>
	<section id="content ">		
                	<div class="padding_30">
						<div class="width960">
							<div class="loginbg main">
									<div class="clearright"></div>
									
									<div class="loginbginner_1" style="position:relative">
									
										<div class="title_bg"><h2 class="padding" title="">My Profile</h2></div>
											
										<div class="innerarea">
											    <div class="vde">
												<div>
										<?php /*?><script type="text/javascript" src="http://vpfactory.com/swfobject/swfobject.js"></script>   
										<script type="text/javascript">   
										var code1 = "%3Cdiv%20style%3D%22display%3Atable%22%3E%3Cdiv%20style%3D%22display%3Atable-row%22%3E%3Cdiv%20style%3D%22display%3Atable-cell%3B%20float%3Aleft%3B%22%3E%3Cdiv%20id%3D%22vpf93d2641dc9b9bfc506986533d396cbfa%22%3E%3C/div%3E%3C/div%3E%3Cdiv%20style%3D%22display%3Atable-cell%3B%20float%3Aleft%3B%20margin-left%3A10px%3B%22%3E%3Cdiv%20id%3D%22openx_companion_93d2641dc9b9bfc506986533d396cbfa%22%3E%3C/div%3E%3C/div%3E%3C/div%3E%3C/div%3E%3Cscript%20type%3D%22text/javascript%22%3Evar%20flashvars%20%3D%20%7B%20%20htmlPage%3A%20document.location%2C%20%20referralVideo%3A%20swfobject.getQueryParamValue%28%22referralVideo%22%29%2C%20%20settingsFile%3A%20%22/publicfeed/%3Fid%3D93d2641dc9b9bfc506986533d396cbfa%22%7D%3Bvar%20params%20%3D%20%7B%20%20allowFullScreen%3A%20%22true%22%2C%20%20allowScriptAccess%3A%20%22always%22%7D%3Bswfobject.embedSWF%28%22http%3A//vpfactory.com/videoPlayer.swf%22%2C%20%22vpf93d2641dc9b9bfc506986533d396cbfa%22%2C%20%22480%22%2C%20%22338%22%2C%20%229.0.115%22%2C%20%22http%3A//vpfactory.com/swfobject/expressInstall.swf%22%2C%20flashvars%2C%20params%29%3B%3C/script%3E%09";   
										var code2 = "%3Cscript%20type%3D%22text/javascript%22%20src%3D%22http%3A//vpfactory.com/js/embed5player.js%22%3E%3C/script%3E%09%3Cscript%20type%3D%22text/javascript%22%3E%09var%20arv%3D%5B%272e45ad514cc7306ec4932601dde58e01%27%5D%3Bvar%20vpi%20%3D%2793d2641dc9b9bfc506986533d396cbfa%27%3Bembed5player.init%28%29%3Bdocument.write%28embed5player.showplayer%28vpi%2Carv%5B0%5D%2C%27480%27%2C%27360%27%29+embed5player.showplist%28vpi%2C%20arv%2C%27480%27%2C%27360%27%29%29%3Bdocument.getElementById%28%27video%27+vpi%29.addEventListener%28%27ended%27%2Cembed5player.endHandler%2Cfalse%29%3Bdocument.getElementById%28%27video%27+vpi%29.load%28%29%3B%3C/script%3E";   
											if((navigator.userAgent.match(/iPhone/i)) || (navigator.userAgent.match(/iPad/i)))
											{    document.write(unescape(code2));   }   
											else {    document.write(unescape(code1));   }  
											
										</script><?php */
										
										//$file = SITE_URL."global_network FLV.flv";
										?>
										<!--<div id='mediaplayer'></div>

										<script type="text/javascript">
										jwplayer('mediaplayer').setup({
										'flashplayer': 'jwplayer/player.swf',
										'id': 'playerID',
										'width': '480',
										'height': '270',
										'file': '<?=$file?>'
										});
										</script>-->
										<script type="text/javascript" src="http://vpfactory.com/swfobject/swfobject.js">
									</script>   
										<script type="text/javascript">   
										//var code1 = "%3Cdiv%20style%3D%22display%3Atable%22%3E%3Cdiv%20style%3D%22display%3Atable-row%22%3E%3Cdiv%20style%3D%22display%3Atable-cell%3B%20float%3Aleft%3B%22%3E%3Cdiv%20id%3D%22vpf93d2641dc9b9bfc506986533d396cbfa%22%3E%3C/div%3E%3C/div%3E%3Cdiv%20style%3D%22display%3Atable-cell%3B%20float%3Aleft%3B%20margin-left%3A10px%3B%22%3E%3Cdiv%20id%3D%22openx_companion_93d2641dc9b9bfc506986533d396cbfa%22%3E%3C/div%3E%3C/div%3E%3C/div%3E%3C/div%3E%3Cscript%20type%3D%22text/javascript%22%3Evar%20flashvars%20%3D%20%7B%20%20htmlPage%3A%20document.location%2C%20%20referralVideo%3A%20swfobject.getQueryParamValue%28%22referralVideo%22%29%2C%20%20settingsFile%3A%20%22/publicfeed/%3Fid%3D93d2641dc9b9bfc506986533d396cbfa%22%7D%3Bvar%20params%20%3D%20%7B%20%20allowFullScreen%3A%20%22true%22%2C%20%20allowScriptAccess%3A%20%22always%22%7D%3Bswfobject.embedSWF%28%22http%3A//vpfactory.com/videoPlayer.swf%22%2C%20%22vpf93d2641dc9b9bfc506986533d396cbfa%22%2C%20%22480%22%2C%20%22338%22%2C%20%229.0.115%22%2C%20%22http%3A//vpfactory.com/swfobject/expressInstall.swf%22%2C%20flashvars%2C%20params%29%3B%3C/script%3E%09";   
										var code1 = "%0A%3Cdiv%20style%3D%22display%3Atable%22%3E%3Cdiv%20style%3D%22display%3Atable-row%22%3E%3Cdiv%20style%3D%22display%3Atable-cell%3B%20float%3Aleft%3B%22%3E%3Cdiv%20id%3D%22vpf93d2641dc9b9bfc506986533d396cbfa%22%3E%3C%2Fdiv%3E%3C%2Fdiv%3E%3Cdiv%20style%3D%22display%3Atable-cell%3B%20float%3Aleft%3B%20margin-left%3A10px%3B%22%3E%3Cdiv%20id%3D%22openx_companion_93d2641dc9b9bfc506986533d396cbfa%22%3E%3C%2Fdiv%3E%3C%2Fdiv%3E%3C%2Fdiv%3E%3C%2Fdiv%3E%3Cscript%20type%3D%22text%2Fjavascript%22%3Evar%20flashvars%20%3D%20%7B%20%20htmlPage%3A%20document.location%2C%20%20referralVideo%3A%20swfobject.getQueryParamValue(%22referralVideo%22)%2C%20%20settingsFile%3A%20%22%2Fpublicfeed%2F%3Fid%3D93d2641dc9b9bfc506986533d396cbfa%22%7D%3Bvar%20params%20%3D%20%7B%20%20allowFullScreen%3A%20%22true%22%2C%20%20allowScriptAccess%3A%20%22always%22%2C%20wmode%3A%20%22transparent%22%20%7D%3Bswfobject.embedSWF(%22http%3A%2F%2Fvpfactory.com%2FvideoPlayer.swf%22%2C%20%22vpf93d2641dc9b9bfc506986533d396cbfa%22%2C%20%22480%22%2C%20%22338%22%2C%20%229.0.115%22%2C%20%22http%3A%2F%2Fvpfactory.com%2Fswfobject%2FexpressInstall.swf%22%2C%20flashvars%2C%20params)%3B%3C%2Fscript%3E";
										var code2 = "%3Cscript%20type%3D%22text/javascript%22%20src%3D%22http%3A//vpfactory.com/js/embed5player.js%22%3E%3C/script%3E%09%3Cscript%20type%3D%22text/javascript%22%3E%09var%20arv%3D%5B%272e45ad514cc7306ec4932601dde58e01%27%5D%3Bvar%20vpi%20%3D%2793d2641dc9b9bfc506986533d396cbfa%27%3Bembed5player.init%28%29%3Bdocument.write%28embed5player.showplayer%28vpi%2Carv%5B0%5D%2C%27480%27%2C%27360%27%29+embed5player.showplist%28vpi%2C%20arv%2C%27480%27%2C%27360%27%29%29%3Bdocument.getElementById%28%27video%27+vpi%29.addEventListener%28%27ended%27%2Cembed5player.endHandler%2Cfalse%29%3Bdocument.getElementById%28%27video%27+vpi%29.load%28%29%3B%3C/script%3E";   
											if((navigator.userAgent.match(/iPhone/i)) || (navigator.userAgent.match(/iPad/i)))
											{    
												document.write(unescape(code2));   
											}   
											else {    
												
												document.write(unescape(code1));   
											}  
											
										</script>
										
									</div>
											</div>
												<form onSubmit="return check_form(this,event)" enctype="multipart/form-data" method="POST" action="success.php" name="form1" id="form1">
													<input type="hidden" value="Normal" id="User_Type" name="User_Type" class="input" />
													<input type="hidden" value="<?=(isset($_GET['reson'])?$_GET['reson']:"")?>" id="reson" name="reson" />
													<input type="hidden" value="<?=(isset($_GET['stream'])?$_GET['stream']:"0")?>" id="stream" name="stream" />
													<input type="hidden" value="<?=(isset($_GET['inviter'])?$_GET['inviter']:0)?>" id="inviter" name="inviter" />
													<input type="hidden" value="" id="New_Latter_Subscription" name="New_Latter_Subscription" class="input" />
													<div class="margin_bottom_login"> 
														<div class="float_left textea_1">My Email<sup>*</sup> :</div>
														<div class="float_left">
																		<input value="" onblur="check_space(Login); add_email();" name="Login" id="Login" class="vlError">
																		<span style="color:#FF0000"><?=$msg?></span>
																		<img id="tick" src="images/tick.png" width="16" height="16" />
																		<img id="cross" src="images/cross.png" width="16" height="16" />
																		<br />
																		<span class="comment">We will send you the e-mail confirmation for account activation.</span> <!-- We will send you the restaurant's confirmation with estimated delivery time. -->
														</div>
														<div class="float_clear"></div>
													</div>
													
													<div class="margin_bottom_login"> 
														<div class="float_left textea_1">User Name<sup>*</sup> :</div>
														<div class="float_left">
																<input valid_type="required" value="<?=isset($Postval['username'])?$Postval['username']:''?>" onBlur="check_space(username)" name="username" id="username" class="vlError" maxlength="245" cout_errors="1">
																<img id="tick1" src="images/tick.png" width="16" height="16" />
																<img id="cross1" src="images/cross.png" width="16" height="16" />
																<span class="comment"></span> <!--  -->
														</div>
														<div class="float_clear"></div>
													</div>
													
													<div class="margin_bottom_login"> 
														<div class="float_left textea_1">Password<sup>*</sup> :</div>
														<div class="float_left"><input type="password" dependant="verifypassword" value="" name="passwd" id="passwd" class="vlError" cout_errors="1"><span class="comment"></span></div>
														<div class="float_clear"></div>
													</div>

													<div class="margin_bottom_login"> 
														<div class="float_left textea_1">Confrim Password<sup>*</sup> :</div>
														<div class="float_left">
																<input type="password" valid_type="required" value="" onBlur="check_passwd()" name="cpassword" id="cpassword" class="vlError" cout_errors="1"><span class="comment"></span>
																<div id="msgbox" style="display:none;color:red;">Password does not match</div>
														</div>
														<div class="float_clear"></div>
													</div>

													<div class="margin_bottom_login"> 
														<div class="float_left textea_1"><h2 class="padding" title="">My Address</h2></div>
														<div class="float_left"></div>
														<div class="float_clear"></div>
													</div>
													
													<div class="margin_bottom_login"> 
														<div class="float_left textea_1">First name<sup>*</sup> :</div>
														<div class="float_left"><input value="<?=isset($Postval['fname'])?$Postval['fname']:''?>" onBlur="check_space(fname)" name="fname" id="fname" class="vlError" cout_errors="1"></div>
														<div class="float_clear"></div>
													</div>
												
													<div class="margin_bottom_login"> 
														<div class="float_left textea_1">Middle Name<sup>*</sup> :</div>
														<div class="float_left"><input  value"<?=isset($Postval['mname'])?$Postval['mname']:''?>" onblur="check_space(mname)" name="mname" id="mname" class="vlError" count_errors="1"></div>
														<div class="float_clear"></div>
													</div>

													<div class="margin_bottom_login"> 
														<div class="float_left textea_1">Last name<sup>*</sup> :</div>
														<div class="float_left"><input value="<?=isset($Postval['lname'])?$Postval['lname']:''?>" onBlur="check_space(lname)" name="lname" id="fname" class="vlError" cout_errors="1"></div>
														<div class="float_clear"></div>
													</div>

													<div class="margin_bottom_login"> 
														<div class="float_left textea_1">Suffix :</div>
														<div class="float_left"><input value="<?=isset($Postval['suffix'])?$Postval['suffix']:''?>" onBlur="check_space(suffix)" name="suffix" id="suffix" class="vlError"></div>
														<div class="float_clear"></div>
													</div>

													<div class="margin_bottom_login"> 
													<div class="float_left textea_1">Gender<sup>*</sup> :</div>
													<div class="float_left">
														<div class='no_margin'><input name='gender' checked='checked' type='radio' value='M' class='input_radio' /></div><div class='float_left'>Male</div><div class='male_right'><input name='gender' type='radio'  class='input_radio' value='F' /></div><div class='float_left'>Female</div>
													</div>
													<div class="float_clear"></div>
													</div>

													<div class="margin_bottom_login"> 
														<div class="float_left textea_1">Date of Birth :</div>
														<div class="float_left">
															<select  name="birthday_month" id="birthday_month" class="css_select_bdate">
																<option value="1">Jan</option>
																<option value="2">Feb</option>
																<option value="3">Mar</option>
																<option value="4">Apr</option>
																<option value="5">May</option>
																<option value="6">Jun</option>
																<option value="7">Jul</option>
																<option value="8">Aug</option>
																<option value="9">Sep</option>
																<option value="10">Oct</option>
																<option value="11">Nov</option>
																<option value="12">Dec</option>
															</select>
															<select name="birthday_day" id="birthday_day" class="css_select_bdate2">
																<?
																	$id=1;
																	while($id<=31)
																	{
																		echo "<option value='$id'>$id</option>";
																		$id++;
																	}
																?>
															</select>
															<Select Name="birthday_year" id="birthday_year" class="css_select_bdate">
																<?
																	for($i=1950;$i<date("Y");$i++)
																	{
																		echo "<option value=".$i.">".$i."</option>";
																	}
																?>
															</Select>
														</div>
														<div class="float_clear"></div>
													</div>

													<div class="margin_bottom_login"> 
														<div class="float_left textea_1">Place of Birth<sup>*</sup> :</div>
														<div class="float_left"><input onBlur="check_space(Placeofbirth)" name="Placeofbirth" id="Placeofbirth" class="vlError" cout_errors="1"></div>
														<div class="float_clear"></div>
													</div>

													<div class="margin_bottom_login"> 
														<div class="float_left textea_1">Place of Citizenship<sup>*</sup>:</div>
														<div class="float_left"><input name="Placeofcitizenship" onBlur="check_space(Placeofcitizenship)" id="Placeofcitizenship" class="vlError" cout_errors="1"></div>
														<div class="float_clear"></div>
													</div>

													<div class="margin_bottom_login"> 
														<div class="float_left textea_1">SSN/CountryID/EIN<sup>*</sup> :</div>
														<div class="float_left"><input name="countryid" onBlur="check_space(countryid)" id="countryid" class="vlError" cout_errors="1"></div>
														<div class="float_clear"></div>
													</div>

													<div class="margin_bottom_login"> 
														<div class="float_left textea_1">Mothers Maiden Name:<sup>*</sup> :</div>
														<div class="float_left"><input value"<?=isset($Postval['mothernm'])?$Postval['mothernm']:''?>" onblur="check_space(mothernm)" name="mothernm" id="mothernm" class="vlError" count_errors="1"></div>
														<div class="float_clear"></div>
													</div>

													<div class="margin_bottom_login"> 
														<div class="float_left textea_1">Email<sup>*</sup> :</div>
														<div class="float_left"><input dependant="verifyemail" vle_mmlength="&quot;Email&quot; must be between 4 - 64 symbols" vle_logincheck="An Account already exist with this Email. &lt;br&gt;Please &lt;a href=&quot;?SCR=s_login&quot;&gt;Login to Your Account&lt;/a&gt;" ajax_type="logincheck" max_length="64" min_length="4" value="" onBlur="check_space(email1)" name="email1" id="email1" class="vlError" cout_errors="1"></div>
														<div class="float_clear"></div>
													</div>

													<div class="margin_bottom_login"> 
														<div class="float_left textea_1">Phone:</div>
														<div class="float_left"><input value="<?=isset($Postval['phone'])?$Postval['phone']:''?>" onBlur="check_space(phone)" name="phone" id="phone" class="vlError" cout_errors="1"></div>
														<div class="float_clear"></div>
													</div>

													<div class="margin_bottom_login"> 
														<div class="float_left textea_1">Cell Phone :</div>
														<div class="float_left"><input value="<?=isset($Postval['cellphone'])?$Postval['cellphone']:''?>" onBlur="check_space(cellphone)" name="cellphone" id="cellphone" class="vlError" cout_errors="1"></div>
														<div class="float_clear"></div>
													</div>

													<div class="margin_bottom_login"> 
														<div class="float_left textea_1">Street address1<sup>*</sup> :</div>
														<div class="float_left"><input value="<?=isset($Postval['address'])?$Postval['address']:''?>" onBlur="check_space(address)" name="address" id="address" class="vlError" cout_errors="1"></div>
														<div class="float_clear"></div>
													</div>

													<div class="margin_bottom_login"> 
														<div class="float_left textea_1">Street address2 :</div>
														<div class="float_left"><input name="address2" id="address2" class="vlError" cout_errors="1"></div>
														<div class="float_clear"></div>
													</div>

													<div class="margin_bottom_login"> 
														<div class="float_left textea_1">City:</div>
														<div class="float_left"><input name="city" id="city" class="vlError" cout_errors="1"></div>
														<div class="float_clear"></div>
													</div>

													<div class="margin_bottom_login"> 
														<div class="float_left textea_1">State:</div>
														<div class="float_left"><input name="state" id="state" class="vlError" cout_errors="1"></div>
														<div class="float_clear"></div>
													</div>

													<div class="margin_bottom_login"> 
														<div class="float_left textea_1">Zip/Postal Code :</div>
														<div class="float_left"><input value="<?=isset($Postval['zipcode'])?$Postval['zipcode']:''?>" name="zipcode" id="zipcode"></div>
														<div class="float_clear"></div>
													</div>

													<div class="margin_bottom_login"> 
														<div class="float_left textea_1">Country<sup>*</sup> :</div>
														<div class="float_left">
															<Select Name="country" id="country" class="vlError css_country">
															<?
																$bd=new DBConnection;
																$data = "select * from country";
																$bd->execArrayQuery($data);
																while($rows=$bd->next())
																{
																	echo "<option value=".$rows['iso'].">".$rows['name']."</option>";
																}
															?>
															</Select>
														</div>
														<div class="float_clear"></div>
													</div>

													<div class="margin_bottom_login"> 
														<div class="float_left textea_1">Skype:</div>
														<div class="float_left"><input name="Skype" id="Skype" class="vlError" cout_errors="1"></div>
														<div class="float_clear"></div>
													</div>

													<div class="margin_bottom_login"> 
														<div class="float_left textea_1">Alert Pay :</div>
														<div class="float_left"><input value="<?=isset($Postval['ap1'])?$Postval['ap1']:''?>" name="ap1" id="ap1" class="vlError" cout_errors="1"></div>
														<div class="float_clear"></div>
													</div>

													<div class="margin_bottom_login"> 
														<div class="float_left textea_1">Solid Trust Pay :</div>
														<div class="float_left"><input value="<?=isset($Postval['stp1'])?$Postval['stp1']:''?>" name="stp1" id="stp1" class="vlError" cout_errors="1"></div>
														<div class="float_clear"></div>
													</div>
													<div class="buttons_1 float_left">
													<input type="submit" name="submit" id="submit" class="link1_11"  value="Submit" />
												</div>
												
												<div class="float_clear"></div>
											</form>
											
										<?=$msg?>
									</div>
									<?php
										//Get Total User Record
										$sql="select count(*) as num from userdetail u WHERE u.active = 1";
										$res=mysql_query($sql);		
										$numSup=0;
										if($data=mysql_fetch_array($res))
										{
											$numSup=$data["num"];
										}
									?>
									<div class="DivLeftUser">
									 	    <h3  class="H2cls">Total Members: <?php echo $numSup; ?></h3>
											<iframe src="scroll.php" width="180" height="260" border="0" style="overflow:hidden; border:0px;" scrolling="no" frameborder="0" marginwidth="0" marginheight ="0" allowtransparency="1">
											  <p>Your browser does not support iframes.</p>
											</iframe>
									</div>
								</div>
							</div>
						</div>
					</div>
					
			</section>	
<?

	require_once("footer.php");
?>