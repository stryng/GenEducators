<?
	require_once('../../business_logic/config/configure.php');
	require_once("../../business_logic/class/form.class.php");
	//echo $_REQUEST['action']; die;
	$form = new Form();

	if(isset($_GET['vnumber']) && $_GET['vnumber'] != 0)
	{
			$userids = $_GET['vnumber'];
			//$userid = "3894";
			$qry = "select * from userdetail where UserId = '".$userids."' and active =1 and Placement = '' ";
			$row = $form->getRow($qry);
			$msg = "";
			$user1_img = "none";
			$user2_img = "none";
			$user3_img = "none";
			$user4_img = "none";
			$user5_img = "none";
			$user6_img = "none";
			$user7_img = "none";
			$user8_img = "none";
			$user9_img = "none";
			$user10_img = "none";
			$user11_img = "none";
			$user12_img = "none";
			
			$user1_nm = "";
			$user1_id = "0";
			$user2_id = "0";
			$user3_id = "0";
			$user4_id = "0";
			$user5_id = "0";
			$user6_id = "0";
			$user7_id = "0";
			$user8_id = "0";
			$user9_id = "0";
			$user10_id = "0";
			$user11_id = "0";
			$user12_id = "0";

			$top_name = "";			
			$user1_name = "";
			$user2_name = "";
			$user3_name = "";
			$user4_name = "";
			$user5_name = "";
			$user6_name = "";
			$user7_name = "";
			$user8_name = "";
			$user9_name = "";
			$user10_name = "";
			$user11_name = "";
			$user12_name = "";
			$you = 0;

			$user1_nm = "";
			$user2_nm = "";
			$user3_nm = "";
			$user4_nm = "";
			$user5_nm = "";
			$user6_nm = "";
			$user7_nm = "";
			$user8_nm = "";
			$user9_nm = "";
			$user10_nm = "";
			$user11_nm = "";
			$user12_nm = "";
		
			$user1_note = "";
			$user2_note = "";
			$user3_note = "";
			$user4_note = "";
			$user5_note = "";
			$user6_note = "";
			$user7_note = "";
			$user8_note = "";
			$user9_note = "";
			$user10_note = "";
			$user11_note = "";
			$user12_note = "";

			$user1_note_10_3 = "";
			$user2_note_10_3 = "";
			$user3_note_10_3 = "";
			$user4_note_10_3 = "";
			$user5_note_10_3 = "";
			$user6_note_10_3 = "";
			$user7_note_10_3 = "";
			$user8_note_10_3 = "";
			$user9_note_10_3 = "";
			$user10_note_10_3 = "";
			$user11_note_10_3 = "";
			$user12_note_10_3 = "";
			$arr_5_3_1 = array();


			if(sizeof($row)>0)
			{
					$you = 0;
						?>
						<script type="text/javascript">
						function backbtnclick()
						{
							window.location = "<?=SERVER_URL?>index.php";
						}
						</script>
						
								<?
									$top_name = $row['FirstName'];//."&nbsp;".$row['LastName'];
									
									$qry = "select payment_done from m_payment_fee_5_3 where usertb_id = '".$userids."' ";
									$var_user_pay = $form->getRow($qry);
									$user1_note = "";
									if(sizeof($var_user_pay)>0)
									{
										if($var_user_pay['payment_done'] == "NO")
										{
											$you = "red";
											$user1_note="Daily payment is not paid in time.";
										}
										else
										{
											$qry = "select count(*) as tot from userdetail where inviter_5_3 = '".$userids."' and active =1 and entry_5_3='prepaid' and Placement = ''";
											$tm = $form->getRow($qry);
											$you = $num = $tm[0];
										}
									}
								?>
						</div>
						<?
						$qry = "select * from nodetree_5_3 where usertb_id = '".$userids."'";
						$row = $form->getRow($qry);
						$msg = "";
						if(sizeof($row) > 0)
						{
							//$qry = "select CONCAT(FirstName,'&nbsp;&nbsp;',LastName) as Name from userdetail where userid = '".$row['u1']."'";
							$sql = "select count(*) as tot from userdetail where inviter_5_3 = '".$row['u1']."' and Placement = '' ";
							$rows = $form->getRow($sql);
							$arr_5_3_1[$row['u1']] = $num = $rows[0];
							checkuserreplacelink_5_3($row['u1']);
							checkuseractivemembers_5_3($row['u1']);

							$qry = "select FirstName as Name from userdetail where userid = '".$row['u1']."'";
							$user1 = $form->getRow($qry);
							
									if($row['u1'] != "0")
									{
			
										$user1_note = "";
										$qry = "select * from userdetail where UserId = '".$row['u1']."'";
										$row11 = $form->getRow($qry);
										
										$user1_name = $row11['FirstName'];//."&nbsp;".$row11['LastName'];
										$user1_nm = $row11['FirstName']."&nbsp;".$row11['LastName'];
										$user1_id = $row['u1'];
										
										
										$qry = "select payment_done from m_payment_fee_10_3 where usertb_id = '".$row['u1']."'";
										$var_user_pay = $form->getRow($qry);
										if(sizeof($var_user_pay)>0)
											$user1_note_10_3 = "active";
										else
											$user1_note_10_3 = "inactive";
											
										$qry = "select payment_done from m_payment_fee_5_3 where usertb_id = '".$row['u1']."'";
										$var_user_pay = $form->getRow($qry);
										if(sizeof($var_user_pay)>0)
										{
											if($var_user_pay['payment_done'] == "NO")
											{
												$user1_img = "red";
												$user1_note="Daily payment is not paid in time.";
											}
											else
											{
												$qry = "select count(*) as tot from userdetail where inviter_5_3 = '".$row['u1']."' and active =1 and entry_5_3='prepaid' and Placement = ''";
												$row11 = $form->getRow($qry);
												$user1_img = $num = $row11[0];
											}
											$user1_id = $row['u1'];
											
										}
										else
										{
											$user1_note="inactive";
			
										}
									}
							
							//$qry = "select CONCAT(FirstName,'&nbsp;&nbsp;',LastName) as Name from userdetail where userid = '".$row['u2']."'";
							$sql = "select count(*) as tot from userdetail where inviter_5_3 = '".$row['u2']."' and Placement = '' ";
							$rows = $form->getRow($qry);
							$arr_5_3_1[$row['u2']] = $num = $rows[0];
							checkuserreplacelink_5_3($row['u2']);
							checkuseractivemembers_5_3($row['u2']);

							$qry = "select FirstName as Name from userdetail where userid = '".$row['u2']."'";
							$user2 = $form->getRow($qry);
							
									if($row['u2'] != "0")
									{
										$user2_note = "";
										$qry = "select * from userdetail where UserId = '".$row['u2']."'";
										$row11 = $form->getRow($qry);
										
										$user2_name = $row11['FirstName'];//."&nbsp;".$row11['LastName'];
										$user2_nm = $row11['FirstName']."&nbsp;".$row11['LastName'];
										$user2_id = $row['u2'];
		
										
										$qry = "select payment_done from m_payment_fee_10_3 where usertb_id = '".$row['u2']."'";
										$var_user_pay = $form->getRow($qry);
										if(sizeof($var_user_pay)>0)
											$user2_note_10_3 = "active";
										else
											$user2_note_10_3 = "inactive";
											
										$qry = "select payment_done from m_payment_fee_5_3 where usertb_id = '".$row['u2']."'";
										$var_user_pay = $form->getRow($qry);
										if(sizeof($var_user_pay)>0)
										{
											if($var_user_pay['payment_done'] == "NO")
											{
												$user2_img = "red";
												$user2_note="Daily payment is not paid in time.";
											}
											else
											{
												$qry = "select count(*) as tot from userdetail where inviter_5_3 = '".$row['u2']."' and active =1 and entry_5_3='prepaid' and Placement = ''";
												$row12 = $form->getRow($qry);
												$user2_img = $num = $row12[0];
											}
											$user2_id = $row['u2'];
										}
										else
										{
											$user2_note="inactive";
										}
									}
							
							//$qry = "select CONCAT(FirstName,'&nbsp;&nbsp;',LastName) as Name from userdetail where userid = '".$row['u3']."'";
							$sql = "select count(*) as tot from userdetail where inviter_5_3 = '".$row['u3']."' and Placement = '' ";
							$rows = $form->getRow($qry);
							$arr_5_3_1[$row['u3']] = $num = $rows[0];
							checkuserreplacelink_5_3($row['u3']);
							checkuseractivemembers_5_3($row['u3']);

							$qry = "select FirstName as Name from userdetail where userid = '".$row['u3']."'";
							$user3 = $form->getRow($qry);
							
				
									if($row['u3'] != "0")
									{
										$user3_note = "";
										$qry = "select * from userdetail where UserId = '".$row['u3']."'";
										$row11 = $form->getRow($qry);
										
										$user3_name = $row11['FirstName'];//."&nbsp;".$row11['LastName'];
										$user3_nm = $row11['FirstName']."&nbsp;".$row11['LastName'];
										$user3_id = $row['u3'];
		
										
										$qry = "select payment_done from m_payment_fee_10_3 where usertb_id = '".$row['u3']."'";
										$var_user_pay = $form->getRow($qry);
										if(sizeof($var_user_pay)>0)
											$user3_note_10_3 = "active";
										else
											$user3_note_10_3 = "inactive";
											
										$qry = "select payment_done from m_payment_fee_5_3 where usertb_id = '".$row['u3']."'";
										$var_user_pay = $form->getRow($qry);
										if(sizeof($var_user_pay)>0)
										{
											if($var_user_pay['payment_done'] == "NO")
											{
												$user3_img = "red";
												$user3_note="Daily payment is not paid in time.";
											}
											else
											{
												$qry = "select count(*) as tot from userdetail where inviter_5_3 = '".$row['u3']."' and active =1 and entry_5_3='prepaid' and Placement = ''";
												$row13 = $form->getRow($qry);
												$user3_img = $num = $row13[0];
											}
											$user3_id = $row['u3'];
										}
										else
										{
											$user3_note="inactive";
										}
									}
							//$qry = "select CONCAT(FirstName,'&nbsp;&nbsp;',LastName) as Name from userdetail where userid = '".$row['u1']."'";
							$sql = "select count(*) as tot from userdetail where inviter_5_3 = '".$row['u4']."' and Placement = '' ";
							$rows = $form->getRow($qry);
							$arr_5_3_1[$row['u4']] = $num = $rows[0];
							checkuserreplacelink_5_3($row['u4']);
							checkuseractivemembers_5_3($row['u4']);

							$qry = "select FirstName as Name from userdetail where userid = '".$row['u4']."'";
							$user4 = $form->getRow($qry);
							
									if($row['u4'] != "0")
									{
			
										$user4_note = "";
										$qry = "select * from userdetail where UserId = '".$row['u4']."'";
										$row11 = $form->getRow($qry);
										
										$user4_name = $row11['FirstName'];//."&nbsp;".$row11['LastName'];
										$user4_nm = $row11['FirstName']."&nbsp;".$row11['LastName'];
										$user4_id = $row['u4'];
										
										
										$qry = "select payment_done from m_payment_fee_10_3 where usertb_id = '".$row['u4']."'";
										$var_user_pay = $form->getRow($qry);
										if(sizeof($var_user_pay)>0)
											$user4_note_10_3 = "active";
										else
											$user4_note_10_3 = "inactive";
											
										$qry = "select payment_done from m_payment_fee_5_3 where usertb_id = '".$row['u4']."'";
										$var_user_pay = $form->getRow($qry);
										if(sizeof($var_user_pay)>0)
										{
											if($var_user_pay['payment_done'] == "NO")
											{
												$user4_img = "red";
												$user4_note="Daily payment is not paid in time.";
											}
											else
											{
												$qry = "select count(*) as tot from userdetail where inviter_5_3 = '".$row['u4']."' and active =1 and entry_5_3='prepaid' and Placement = ''";
												$row14 = $form->getRow($qry);
												$user4_img = $num = $row14[0];
											}
											$user4_id = $row['u4'];
											
										}
										else
										{
											$user4_note="inactive";
			
										}
									}
							
							//$qry = "select CONCAT(FirstName,'&nbsp;&nbsp;',LastName) as Name from userdetail where userid = '".$row['u2']."'";
							$sql = "select count(*) as tot from userdetail where inviter_5_3 = '".$row['u5']."' and Placement = '' ";
							$rows = $form->getRow($qry);
							$arr_5_3_1[$row['u5']] = $num = $rows[0];
							checkuserreplacelink_5_3($row['u5']);
							checkuseractivemembers_5_3($row['u5']);

							$qry = "select FirstName as Name from userdetail where userid = '".$row['u5']."'";
							$user5 = $form->getRow($qry);
							
									if($row['u5'] != "0")
									{
										$user5_note = "";
										$qry = "select * from userdetail where UserId = '".$row['u5']."'";
										$row11 = $form->getRow($qry);
										
										$user5_name = $row11['FirstName'];//."&nbsp;".$row11['LastName'];
										$user5_nm = $row11['FirstName']."&nbsp;".$row11['LastName'];
										$user5_id = $row['u5'];
		
										
										$qry = "select payment_done from m_payment_fee_10_3 where usertb_id = '".$row['u5']."'";
										$var_user_pay = $form->getRow($qry);
										if(sizeof($var_user_pay)>0)
											$user5_note_10_3 = "active";
										else
											$user5_note_10_3 = "inactive";
											
										$qry = "select payment_done from m_payment_fee_5_3 where usertb_id = '".$row['u5']."'";
										$var_user_pay = $form->getRow($qry);
										if(sizeof($var_user_pay)>0)
										{
											if($var_user_pay['payment_done'] == "NO")
											{
												$user5_img = "red";
												$user5_note="Daily payment is not paid in time.";
											}
											else
											{
												$qry = "select count(*) as tot from userdetail where inviter_5_3 = '".$row['u5']."' and active =1 and entry_5_3='prepaid' and Placement = ''";
												$row15 = $form->getRow($qry);
												$user5_img = $num = $row15[0];
											}
											$user5_id = $row['u5'];
										}
										else
										{
											$user5_note="inactive";
										}
									}
							
							?>
							<!--<a class="acolor" href="volunteers.php?user_id=<?=$row['u1']?>"><?=$user1['Name']?></a>&nbsp;&nbsp;&nbsp;<?=$user1_note?>&nbsp;&nbsp;&nbsp;<a class="acolor" href="volunteers.php?user_id=<?=$row['u2']?>"><?=$user2['Name']?></a><?=(isset($user2['Name'])?"&nbsp;&nbsp;&nbsp;".$user2_note:"")?>&nbsp;&nbsp;&nbsp;<a class="acolor" href="volunteers.php?user_id=<?=$row['u3']?>"><?=$user3['Name']?></a><?=(isset($user3['Name'])?"&nbsp;&nbsp;&nbsp;".$user3_note:"")?><br />-->
							<?
						}
			}
	}
$_SESSION['uid53'] = $arr_5_3_1;
?>
										<div class="float_clear"></div>
										
										<li>
											<ul>
												<li style="border-bottom:#000000 1px solid; width:660px"></li>
											</ul>
											<ul style="position: relative; left:0px;" class="second_portion">
												<li class="float_left five_three_user">|</li>
												<li class="float_left five_three_user">|</li>
												<li class="float_left five_three_user">|</li>
												<li class="float_left five_three_user">|</li>
												<li class="float_left five_three_user">|</li>
                                        	</ul>
											<ul class="second_portion" style="position:relative; left:2px;">
                                            	<li class="float_left five_three">
													<? if($user1_note == "inactive") { ?>
														<div class="float_left left_img">
															<a class="acolor"  href="javascript:void(0);" onclick="addmore_volunteers_5_3(<?=$user1_id?>,<?=$_GET['cnt']?>)"><img id="img_1[<?=$user1_id?>]" onmouseover="mouseOver(<?=$user1_id?>);" onmouseout="mouseOut(<?=$user1_id?>);" src="<?=SERVER_URL?>images/02.png" /></a>
															<div class="username_img">
																(<?=isset($_SESSION['uid53'][$user1_id])?$_SESSION['uid53'][$user1_id]:"0";?>)
																<?=$user1_name?>
																<div onmouseover="mouseOver(<?=$user1_id?>);" onmouseout="mouseOut(<?=$user1_id?>)" id="<?=$user1_id?>" style="background-color: rgba(0, 0, 0, 0.8); color:#FFFFFF; z-index:10; position: absolute; top: -47px; left: -22px; display:none"><?=$user1_nm?><br><? if(isset($_SESSION['ruid53'][$user1_id]) && $_SESSION['ruid53'][$user1_id]==1) { ?><a href="replace_volunteers.php?uid=<?=$user1_id?>&stream=5_3">Replace</a><? } ?></div>
																(<?=isset($_SESSION['act_mems_5_3'][$user1_id])?$_SESSION['act_mems_5_3'][$user1_id]:"0";?>)
																<br />(<?=$user1_id;?>)
															</div>
														</div>
													<? }
													/* else if((isset($_SESSION['have_pay_yday_5_3'][$user1_id]) && $_SESSION['have_pay_yday_5_3'][$user1_id])) { ?>
														<div class="float_left left_img">
															<a class="acolor"  href="javascript:void(0);" onclick="addmore_volunteers_5_3(<?=$user1_id?>,<?=$_GET['cnt']?>)"><img id="img_1[<?=$user1_id?>]" onmouseover="mouseOver(<?=$user1_id?>);" onmouseout="mouseOut(<?=$user1_id?>);" src="<?=SERVER_URL?>images/sred.png" /></a>
															<div class="username_img">
																(<?=isset($_SESSION['uid53'][$user1_id])?$_SESSION['uid53'][$user1_id]:"0";?>)
																<?=$user1_name?>
																<div onmouseover="mouseOver(<?=$user1_id?>);" onmouseout="mouseOut(<?=$user1_id?>)" id="<?=$user1_id?>" style="background-color: rgba(0, 0, 0, 0.8); color:#FFFFFF; z-index:10; position: absolute; top: -47px; left: -22px; display:none"><?=$user1_nm?><br><? if(isset($_SESSION['ruid53'][$user1_id]) && $_SESSION['ruid53'][$user1_id]==1) { ?><a href="replace_volunteers.php?uid=<?=$user1_id?>&stream=5_3">Replace</a><? } ?></div>
																(<?=isset($_SESSION['act_mems_5_3'][$user1_id])?$_SESSION['act_mems_5_3'][$user1_id]:"0";?>)
																<br />(<?=$user1_id;?>)
															</div>
														</div>
													<? } else if(isset($_SESSION['have_pay_5day_5_3'][$user1_id]) && $_SESSION['have_pay_5day_5_3'][$user1_id]) { ?>
														<div class="float_left left_img">
															<a class="acolor"  href="javascript:void(0);" onclick="addmore_volunteers_5_3(<?=$user1_id?>,<?=$_GET['cnt']?>)"><img id="img_1[<?=$user1_id?>]" onmouseover="mouseOver(<?=$user1_id?>);" onmouseout="mouseOut(<?=$user1_id?>);" src="<?=SERVER_URL?>images/dailyindicatior.png" /></a>
															<div class="username_img">
																(<?=isset($_SESSION['uid53'][$user1_id])?$_SESSION['uid53'][$user1_id]:"0";?>)
																<?=$user1_name?>
																<div onmouseover="mouseOver(<?=$user1_id?>);" onmouseout="mouseOut(<?=$user1_id?>)" id="<?=$user1_id?>" style="background-color: rgba(0, 0, 0, 0.8); color:#FFFFFF; z-index:10; position: absolute; top: -47px; left: -22px; display:none"><?=$user1_nm?><br><? if(isset($_SESSION['ruid53'][$user1_id]) && $_SESSION['ruid53'][$user1_id]==1) { ?><a href="replace_volunteers.php?uid=<?=$user1_id?>&stream=5_3">Replace</a><? } ?></div>
																(<?=isset($_SESSION['act_mems_5_3'][$user1_id])?$_SESSION['act_mems_5_3'][$user1_id]:"0";?>)
																<br />(<?=$user1_id;?>)
															</div>
														</div>
													<? } else if($user1_img == "red" && $user1_img != "0") { ?>
														<div class="float_left left_img">
															<a class="acolor"  href="javascript:void(0);" onclick="addmore_volunteers_5_3(<?=$user1_id?>,<?=$_GET['cnt']?>)"><img id="img_1[<?=$user1_id?>]" onmouseover="mouseOver(<?=$user1_id?>);" onmouseout="mouseOut(<?=$user1_id?>);" src="<?=SERVER_URL?>images/sred.png" /></a>
															<div class="username_img">
																(<?=isset($_SESSION['uid53'][$user1_id])?$_SESSION['uid53'][$user1_id]:"0";?>)
																<?=$user1_name?>
																<div onmouseover="mouseOver(<?=$user1_id?>);" onmouseout="mouseOut(<?=$user1_id?>)" id="<?=$user1_id?>" style="background-color: rgba(0, 0, 0, 0.8); color:#FFFFFF; z-index:10; position: absolute; top: -47px; left: -22px; display:none"><?=$user1_nm?><br><? if(isset($_SESSION['ruid53'][$user1_id]) && $_SESSION['ruid53'][$user1_id]==1) { ?><a href="replace_volunteers.php?uid=<?=$user1_id?>&stream=5_3">Replace</a><? } ?></div>
																(<?=isset($_SESSION['act_mems_5_3'][$user1_id])?$_SESSION['act_mems_5_3'][$user1_id]:"0";?>)
																<br />(<?=$user1_id;?>)
															</div>
														</div>
													<? }*/
													else if($user1_img == "none" && $user1_img != "0") { ?>
														<!--<div class="float_left left_img"><img src="<?=SERVER_URL?>images/snone.png" /><div class="username_img"><?=$user1_name?></div></div>-->
														<div class="float_left left_img"><img src="<?=SERVER_URL?>images/snone.png" /><div class="username_img"><?=$user1_name?></div></div>
													<? } else{ ?>
														<div class="float_left left_img">
															<a class="acolor"  href="javascript:void(0);" onclick="addmore_volunteers_5_3(<?=$user1_id?>,<?=$_GET['cnt']?>)">
																<?php echo (($user1_img>=20)?'<img id="img_1['.$user1_id.']"  onmouseover="mouseOver('.$user1_id.');" onmouseout="mouseOut('.$user1_id.');" src="images/03.png" />':(($user1_img>=10)?'<img id="img_1['.$user1_id.']" onmouseover="mouseOver('.$user1_id.');" onmouseout="mouseOut('.$user1_id.');" src="images/syellow.png" />':(($user1_img>=6)?'<img id="img_1['.$user1_id.']" onmouseover="mouseOver('.$user1_id.');" onmouseout="mouseOut('.$user1_id.');" src="images/sred.png" />':(($user1_img>=5)?'<img id="img_1['.$user1_id.']" onmouseover="mouseOver('.$user1_id.');" onmouseout="mouseOut('.$user1_id.');" src="images/sgreen.png" />':(($user1_img==4)?'<img id="img_1['.$user1_id.']" onmouseover="mouseOver('.$user1_id.');" onmouseout="mouseOut('.$user1_id.');" src="images/sorange.png" />':($user1_img>=1)?'<img id="img_1['.$user1_id.']" onmouseover="mouseOver('.$user1_id.');" onmouseout="mouseOut('.$user1_id.');" src="images/spurple.png" />':'<img id="img_1['.$user1_id.']" onmouseover="mouseOver('.$user1_id.');" onmouseout="mouseOut('.$user1_id.');" src="images/sgray.png" />')))))?>
															</a>
															<div class="username_img">
																(<?=isset($_SESSION['uid53'][$user1_id])?$_SESSION['uid53'][$user1_id]:"0";?>)
																<?=$user1_name?>
																<div onmouseover="mouseOver(<?=$user1_id?>);" onmouseout="mouseOut(<?=$user1_id?>)" id="<?=$user1_id?>" style="background-color: rgba(0, 0, 0, 0.8); color:#FFFFFF; z-index:10; position: absolute; top: -47px; left: -22px; display:none"><?=$user1_nm?><br></div>
																(<?=isset($_SESSION['act_mems_5_3'][$user1_id])?$_SESSION['act_mems_5_3'][$user1_id]:"0";?>)
																<br>(<?=$user1_id;?>)
															</div>
														</div>
													<? } ?>
													<div class="float_clear"></div>
	                                            </li>
		                                        <li class="float_left five_three">
													<? /* echo  $user2_name; */ if($user2_note == "inactive") 	{ ?>
															<div style="float: left;  margin: 0 0 0 -53px; ">
																<a class="acolor"  href="javascript:void(0);" onclick="addmore_volunteers_5_3(<?=$user2_id?>,<?=$_GET['cnt']?>)"><img onmouseover="mouseOver(<?=$user2_id?>);" onmouseout="mouseOut(<?=$user2_id?>);" id="img_1[<?=$user2_id?>]" src="<?=SERVER_URL?>images/02.png" /></a>
																<br />
																(<?=isset($_SESSION['uid53'][$user2_id])?$_SESSION['uid53'][$user2_id]:"0";?>)
																<?=$user2_name?>
																<div onmouseover="mouseOver(<?=$user2_id?>);" onmouseout="mouseOut(<?=$user2_id?>)" id="<?=$user2_id?>"  style="background-color: rgba(0, 0, 0, 0.8); color:#FFFFFF; z-index:10; position: absolute; top: 4px; left: 127px; display:none"><?=$user2_nm?><br><? if(isset($_SESSION['ruid53'][$user2_id]) && $_SESSION['ruid53'][$user2_id]==1) { ?><a href="replace_volunteers.php?uid=<?=$user2_id?>&stream=5_3">Replace</a><? } ?></div>
																(<?=isset($_SESSION['act_mems_5_3'][$user2_id])?$_SESSION['act_mems_5_3'][$user2_id]:"0";?>)
																<br />(<?=$user2_id;?>)
															</div>
													<? }
													/* else if((isset($_SESSION['have_pay_yday_5_3'][$user2_id]) && $_SESSION['have_pay_yday_5_3'][$user2_id])){ ?>
															<div style="float: left;  margin: 0 0 0 -53px;">
																<a class="acolor"  href="javascript:void(0);" onclick="addmore_volunteers_5_3(<?=$user2_id?>,<?=$_GET['cnt']?>)"><img id="img_1[<?=$user2_id?>]"  onmouseover="mouseOver(<?=$user2_id?>);" onmouseout="mouseOut(<?=$user2_id?>);" src="<?=SERVER_URL?>images/sred.png" /></a><br />
																(<?=isset($_SESSION['uid53'][$user2_id])?$_SESSION['uid53'][$user2_id]:"0";?>)
																<?=$user2_name?>
																<div onmouseover="mouseOver(<?=$user2_id?>);" onmouseout="mouseOut(<?=$user2_id?>)" id="<?=$user2_id?>" style="background-color: rgba(0, 0, 0, 0.8); color:#FFFFFF; z-index:10; position: absolute; top: 7px; left: 127px; display:none"><?=$user2_nm?><br><? if(isset($_SESSION['ruid53'][$user2_id]) && $_SESSION['ruid53'][$user2_id]==1) { ?><a href="replace_volunteers.php?uid=<?=$user2_id?>&stream=5_3">Replace</a><? } ?></div>
																(<?=isset($_SESSION['act_mems_5_3'][$user2_id])?$_SESSION['act_mems_5_3'][$user2_id]:"0";?>)
																<br />(<?=$user2_id;?>)
															</div>
													<? } else if(isset($_SESSION['have_pay_5day_5_3'][$user2_id]) && $_SESSION['have_pay_5day_5_3'][$user2_id]){ ?>
															<div style="float: left;  margin: 0 0 0 -53px;">
																<a class="acolor"  href="javascript:void(0);" onclick="addmore_volunteers_5_3(<?=$user2_id?>,<?=$_GET['cnt']?>)"><img id="img_1[<?=$user2_id?>]" onmouseover="mouseOver(<?=$user2_id?>);" onmouseout="mouseOut(<?=$user2_id?>);" src="<?=SERVER_URL?>images/dailyindicatior.png" /></a>
																<br />
																(<?=isset($_SESSION['uid53'][$user2_id])?$_SESSION['uid53'][$user2_id]:"0";?>)
																<?=$user2_nm?>
																<div onmouseover="mouseOver(<?=$user2_id?>);" onmouseout="mouseOut(<?=$user2_id?>)" id="<?=$user2_id?>" style="background-color: rgba(0, 0, 0, 0.8); color:#FFFFFF; z-index:10; position: absolute; top: 7px; left: 127px; display:none"><?=$user2_nm?><br><? if(isset($_SESSION['ruid53'][$user2_id]) && $_SESSION['ruid53'][$user2_id]==1) { ?><a href="replace_volunteers.php?uid=<?=$user2_id?>&stream=5_3">Replace</a><? } ?></div>
																(<?=isset($_SESSION['act_mems_5_3'][$user2_id])?$_SESSION['act_mems_5_3'][$user2_id]:"0";?>)
																<br />(<?=$user2_id;?>)
															</div>
													<? } else if($user2_img == "red" && $user2_img != "0" ){  ?>
															<div style="float: left;  margin: 0 0 0 -53px;">
																<a class="acolor"  href="javascript:void(0);" onclick="addmore_volunteers_5_3(<?=$user2_id?>,<?=$_GET['cnt']?>)"><img id="img_1[<?=$user2_id?>]" onmouseover="mouseOver(<?=$user2_id?>);" onmouseout="mouseOut(<?=$user2_id?>);" src="<?=SERVER_URL?>images/sred.png" /></a><br />
																(<?=isset($_SESSION['uid53'][$user2_id])?$_SESSION['uid53'][$user2_id]:"0";?>)
																<?=$user2_nm?>
																<div onmouseover="mouseOver(<?=$user2_id?>);" onmouseout="mouseOut(<?=$user2_id?>)" id="<?=$user2_id?>" style="background-color: rgba(0, 0, 0, 0.8); color:#FFFFFF; z-index:10; position: absolute; top: 7px; left: 127px; display:none"><?=$user2_nm?><br><? if(isset($_SESSION['ruid53'][$user2_id]) && $_SESSION['ruid53'][$user2_id]==1) { ?><a href="replace_volunteers.php?uid=<?=$user2_id?>&stream=5_3">Replace</a><? } ?></div>
																(<?=isset($_SESSION['act_mems_5_3'][$user2_id])?$_SESSION['act_mems_5_3'][$user2_id]:"0";?>)
																<br />(<?=$user2_id;?>)
															</div>
													<? } */
													else if($user2_img == "none" && $user2_img != "0" ){ ?>
															<div style="float: left;  margin: 0 0 0 -53px;"><img src="<?=SERVER_URL?>images/snone.png" /><br /><?=$user2_name?></div>
													<? } else { ?>
															<div style="float: left;  margin: 0 0 0 -53px;">
																<a class="acolor"  href="javascript:void(0);" onclick="addmore_volunteers_5_3(<?=$user2_id?>,<?=$_GET['cnt']?>)">
																	<?php echo (($user2_img>=20)?'<img id="img_1['.$user2_id.']" onmouseover="mouseOver('.$user2_id.');" onmouseout="mouseOut('.$user2_id.');" src="images/03.png" />':(($user2_img>=10)?'<img id="img_1['.$user2_id.']" onmouseover="mouseOver('.$user2_id.');" onmouseout="mouseOut('.$user2_id.');" src="images/syellow.png" />':(($user2_img>=6)?'<img id="img_1['.$user2_id.']" onmouseover="mouseOver('.$user2_id.');" onmouseout="mouseOut('.$user2_id.');" src="images/sred.png" />':(($user2_img>=5)?'<img id="img_1['.$user2_id.']" onmouseover="mouseOver('.$user2_id.');" onmouseout="mouseOut('.$user2_id.');" src="images/sgreen.png" />':(($user2_img==4)?'<img id="img_1['.$user2_id.']" onmouseover="mouseOver('.$user2_id.');" onmouseout="mouseOut('.$user2_id.');" src="images/sorange.png" />':($user2_img>=1)?'<img id="img_1['.$user2_id.']" onmouseover="mouseOver('.$user2_id.');" onmouseout="mouseOut('.$user2_id.');" src="images/spurple.png" />':'<img id="img_1['.$user2_id.']" onmouseover="mouseOver('.$user2_id.');" onmouseout="mouseOut('.$user2_id.');" src="images/sgray.png" />')))))?>
																</a>
																<br/>
																(<?=isset($_SESSION['uid53'][$user2_id])?$_SESSION['uid53'][$user2_id]:"0";?>)
																<?=$user2_name?>
																<div onmouseover="mouseOver(<?=$user2_id?>);" onmouseout="mouseOut(<?=$user2_id?>)" id="<?=$user2_id?>" style="background-color: rgba(0, 0, 0, 0.8); z-index:10; color:#FFFFFF; position: absolute; top: 4px; left: 127px; display:none"><?=$user2_nm?><br></div>
																(<?=isset($_SESSION['act_mems_5_3'][$user2_id])?$_SESSION['act_mems_5_3'][$user2_id]:"0";?>)
																<br>(<?=$user2_id;?>)
															</div>
													<? } ?>
													<div class="float_clear"></div>
		                                        </li>
												<li class="float_left five_three_two">
													<? if($user3_note == "inactive") { ?>
														<div class="float_left right_img5_3_1" >
															<a class="acolor"  href="javascript:void(0);" onclick="addmore_volunteers_5_3(<?=$user3_id?>,<?=$_GET['cnt']?>)"><img id="img_1[<?=$user3_id?>]" onmouseover="mouseOver(<?=$user3_id?>);" onmouseout="mouseOut(<?=$user3_id?>);" src="<?=SERVER_URL?>images/02.png" /></a>
															<div class="username_img">
																(<?=isset($_SESSION['uid53'][$user3_id])?$_SESSION['uid53'][$user3_id]:"0";?>)
																<?=$user3_name?>
																<div onmouseover="mouseOver(<?=$user3_id?>);" onmouseout="mouseOut(<?=$user3_id?>)" id="<?=$user3_id?>" style="background-color: rgba(0, 0, 0, 0.8); color:#FFFFFF; z-index:10; position: absolute; top: -47px; left: -23px; display:none"><?=$user3_nm?><br><? if(isset($_SESSION['ruid53'][$user3_id]) && $_SESSION['ruid53'][$user3_id]==1) { ?><a href="replace_volunteers.php?uid=<?=$user3_id?>&stream=5_3">Replace</a><? } ?></div>
																(<?=isset($_SESSION['act_mems_5_3'][$user3_id])?$_SESSION['act_mems_5_3'][$user3_id]:"0";?>)
																<br />(<?=$user3_id;?>)
															</div>
														</div>
													<? }
													/* else if((isset($_SESSION['have_pay_yday_5_3'][$user3_id]) && $_SESSION['have_pay_yday_5_3'][$user3_id])|| $user3_note == "inactive") { ?>
														<div class="float_left right_img5_3_1">
															<a class="acolor"  href="javascript:void(0);" onclick="addmore_volunteers_5_3(<?=$user3_id?>,<?=$_GET['cnt']?>)"><img id="img_1[<?=$user3_id?>]" onmouseover="mouseOver(<?=$user3_id?>);" onmouseout="mouseOut(<?=$user3_id?>);" src="<?=SERVER_URL?>images/sred.png" /></a>
															<div class="username_img">
																(<?=isset($_SESSION['uid53'][$user3_id])?$_SESSION['uid53'][$user3_id]:"0";?>)
																<?=$user3_name?>
																<div onmouseover="mouseOver(<?=$user3_id?>);" onmouseout="mouseOut(<?=$user3_id?>)" id="<?=$user3_id?>" style="background-color: rgba(0, 0, 0, 0.8); color:#FFFFFF; z-index:10; position: absolute; top: -47px; left: -23px; display:none"><?=$user3_nm?><br><? if(isset($_SESSION['ruid53'][$user3_id]) && $_SESSION['ruid53'][$user3_id]==1) { ?><a href="replace_volunteers.php?uid=<?=$user3_id?>&stream=5_3">Replace</a><? } ?></div>
																(<?=isset($_SESSION['act_mems_5_3'][$user3_id])?$_SESSION['act_mems_5_3'][$user3_id]:"0";?>)
																<br />(<?=$user3_id;?>)
															</div>
														</div>
													<? } else if(isset($_SESSION['have_pay_5day_5_3'][$user3_id]) && $_SESSION['have_pay_5day_5_3'][$user3_id]) { ?>
														<div class="float_left right_img5_3_1">
															<a class="acolor"  href="javascript:void(0);" onclick="addmore_volunteers_5_3(<?=$user3_id?>,<?=$_GET['cnt']?>)"><img id="img_1[<?=$user3_id?>]" onmouseover="mouseOver(<?=$user3_id?>);" onmouseout="mouseOut(<?=$user3_id?>);" src="<?=SERVER_URL?>images/dailyindicatior.png" /></a>
															<div class="username_img">
																(<?=isset($_SESSION['uid53'][$user3_id])?$_SESSION['uid53'][$user3_id]:"0";?>)
																<?=$user3_name?>
																<div onmouseover="mouseOver(<?=$user3_id?>);" onmouseout="mouseOut(<?=$user3_id?>)" id="<?=$user3_id?>" style="background-color: rgba(0, 0, 0, 0.8); color:#FFFFFF; z-index:10; position: absolute; top: -47px; left: -23px; display:none"><?=$user3_nm?><br><? if(isset($_SESSION['ruid53'][$user3_id]) && $_SESSION['ruid53'][$user3_id]==1) { ?><a href="replace_volunteers.php?uid=<?=$user3_id?>&stream=5_3">Replace</a><? } ?></div>
																(<?=isset($_SESSION['act_mems_5_3'][$user3_id])?$_SESSION['act_mems_5_3'][$user3_id]:"0";?>)
																<br />(<?=$user3_id;?>)
															</div>
														</div>
													<? } else if($user3_img == "red" && $user3_img != "0" ) 	{ ?>
														<div class="float_left right_img5_3_1">
															<a class="acolor"  href="javascript:void(0);" onclick="addmore_volunteers_5_3(<?=$user3_id?>,<?=$_GET['cnt']?>)"><img id="img_1[<?=$user3_id?>]" onmouseover="mouseOver(<?=$user3_id?>);" onmouseout="mouseOut(<?=$user3_id?>);" src="<?=SERVER_URL?>images/sred.png" /></a>
															<div class="username_img">
																(<?=isset($_SESSION['uid53'][$user3_id])?$_SESSION['uid53'][$user3_id]:"0";?>)
																<?=$user3_name?>
																<div onmouseover="mouseOver(<?=$user3_id?>);" onmouseout="mouseOut(<?=$user3_id?>)" id="<?=$user3_id?>" style="background-color: rgba(0, 0, 0, 0.8); color:#FFFFFF; z-index:10; position: absolute; top: -47px; left: -23px; display:none"><?=$user3_nm?><br><? if(isset($_SESSION['ruid53'][$user3_id]) && $_SESSION['ruid53'][$user3_id]==1) { ?><a href="replace_volunteers.php?uid=<?=$user3_id?>&stream=5_3">Replace</a><? } ?></div>
																(<?=isset($_SESSION['act_mems_5_3'][$user3_id])?$_SESSION['act_mems_5_3'][$user3_id]:"0";?>)
																<br />(<?=$user3_id;?>)
															</div>
														</div>
													<? }*/
													 else if($user3_img == "none" && $user3_img != "0" ) { ?>
														<div class="float_left right_img5_3_1"><img id="img_1[<?=$user3_id?>]" src="<?=SERVER_URL?>images/snone.png" /><div class="username_img"><?=$user3_name?></div></div>
													<? } else { ?>
														<div class="float_left right_img5_3_1">
															<a class="acolor"  href="javascript:void(0);" onclick="addmore_volunteers_5_3(<?=$user3_id?>,<?=$_GET['cnt']?>)">
																<?php echo (($user3_img>=20)?'<img id="img_1['.$user3_id.']" onmouseover="mouseOver('.$user3_id.');" onmouseout="mouseOut('.$user3_id.');" src="images/03.png" />':(($user3_img>=10)?'<img id="img_1['.$user3_id.']" onmouseover="mouseOver('.$user3_id.');" onmouseout="mouseOut('.$user3_id.');" src="images/syellow.png" />':(($user3_img>=6)?'<img id="img_1['.$user3_id.']" onmouseover="mouseOver('.$user3_id.');" onmouseout="mouseOut('.$user3_id.');" src="images/sred.png" />':(($user3_img>=5)?'<img id="img_1['.$user3_id.']" onmouseover="mouseOver('.$user3_id.');" onmouseout="mouseOut('.$user3_id.');" src="images/sgreen.png" />':(($user3_img==4)?'<img id="img_1['.$user3_id.']" onmouseover="mouseOver('.$user3_id.');" onmouseout="mouseOut('.$user3_id.');" src="images/sorange.png" />':($user3_img>=1)?'<img id="img_1['.$user3_id.']" onmouseover="mouseOver('.$user3_id.');" onmouseout="mouseOut('.$user3_id.');" src="images/spurple.png" />':'<img id="img_1['.$user3_id.']" onmouseover="mouseOver('.$user3_id.');" onmouseout="mouseOut('.$user3_id.');" src="images/sgray.png" />')))))?>
															</a>
															<div class="username_img">
																(<?=isset($_SESSION['uid53'][$user3_id])?$_SESSION['uid53'][$user3_id]:"0";?>)
																<?=$user3_name?>
																<div onmouseover="mouseOver(<?=$user3_id?>);" onmouseout="mouseOut(<?=$user3_id?>)" id="<?=$user3_id?>" style="background-color: rgba(0, 0, 0, 0.8); z-index:10; color:#FFFFFF; position: absolute; top: -47px; left: -23px; display:none"><?=$user3_nm?><br></div>
																(<?=isset($_SESSION['act_mems_5_3'][$user3_id])?$_SESSION['act_mems_5_3'][$user3_id]:"0";?>)
																<br>(<?=$user3_id;?>)
															</div>
														</div>
													<? } ?>
													<div class="float_clear"></div>
                                            	</li>
												<li class="float_left five_three_two">
													<? if($user4_note == "inactive") { ?>
														<div class="float_left right_img5_3_1">
															<a class="acolor" href="javascript:void(0);" onclick="addmore_volunteers_5_3(<?=$user4_id?>,<?=$_GET['cnt']?>)"><img onmouseover="mouseOver(<?=$user4_id?>);" onmouseout="mouseOut(<?=$user4_id?>);" id="img_1[<?=$user4_id?>]" src="<?=SERVER_URL?>images/02.png" /></a>
															<div class="username_img">
																(<?=isset($_SESSION['uid53'][$user4_id])?$_SESSION['uid53'][$user4_id]:"0";?>)
																<?=$user4_name?>
																<div onmouseover="mouseOver(<?=$user4_id?>);" onmouseout="mouseOut(<?=$user4_id?>)" id="<?=$user4_id?>" style="background-color: rgba(0, 0, 0, 0.8); color:#FFFFFF; z-index:10; position: absolute; top: -47px; left: -22px; display:none"><?=$user4_nm?><br><? if(isset($_SESSION['ruid53'][$user4_id]) && $_SESSION['ruid53'][$user4_id]==1) { ?><a href="replace_volunteers.php?uid=<?=$user4_id?>&stream=5_3">Replace</a><? } ?></div>
																(<?=isset($_SESSION['act_mems_5_3'][$user4_id])?$_SESSION['act_mems_5_3'][$user4_id]:"0";?>)
																<br />(<?=$user4_id;?>)
															</div>
														</div>
													<? }
													/* else if((isset($_SESSION['have_pay_yday_5_3'][$user4_id]) && $_SESSION['have_pay_yday_5_3'][$user4_id])|| $user4_note == "inactive") { ?>
														<div class="float_left right_img5_3_1">
															<a class="acolor" href="javascript:void(0);" onclick="addmore_volunteers_5_3(<?=$user4_id?>,<?=$_GET['cnt']?>)"><img onmouseover="mouseOver(<?=$user4_id?>);" onmouseout="mouseOut(<?=$user4_id?>);" id="img_1[<?=$user4_id?>]" src="<?=SERVER_URL?>images/sred.png" /></a>
															<div class="username_img">
																(<?=isset($_SESSION['uid53'][$user4_id])?$_SESSION['uid53'][$user4_id]:"0";?>)
																<?=$user4_name?>
																<div onmouseover="mouseOver(<?=$user4_id?>);" onmouseout="mouseOut(<?=$user4_id?>)" id="<?=$user4_id?>" style="background-color: rgba(0, 0, 0, 0.8); color:#FFFFFF; z-index:10; position: absolute; top: -47px; left: -22px; display:none"><?=$user4_nm?><br><? if(isset($_SESSION['ruid53'][$user4_id]) && $_SESSION['ruid53'][$user4_id]==1) { ?><a href="replace_volunteers.php?uid=<?=$user4_id?>&stream=5_3">Replace</a><? } ?></div>
																(<?=isset($_SESSION['act_mems_5_3'][$user4_id])?$_SESSION['act_mems_5_3'][$user4_id]:"0";?>)
																<br />(<?=$user4_id;?>)
															</div>
														</div>
													<? } else if(isset($_SESSION['have_pay_5day_5_3'][$user4_id]) && $_SESSION['have_pay_5day_5_3'][$user4_id]) { ?>
														<div class="float_left right_img5_3_1">
															<a class="acolor" href="javascript:void(0);" onclick="addmore_volunteers_5_3(<?=$user4_id?>,<?=$_GET['cnt']?>)"><img onmouseover="mouseOver(<?=$user4_id?>);" onmouseout="mouseOut(<?=$user4_id?>);"  id="img_1[<?=$user4_id?>]" src="<?=SERVER_URL?>images/dailyindicatior.png" /></a>
															<div class="username_img">
																(<?=isset($_SESSION['uid53'][$user4_id])?$_SESSION['uid53'][$user4_id]:"0";?>)
																<?=$user4_name?>
																<div onmouseover="mouseOver(<?=$user4_id?>);" onmouseout="mouseOut(<?=$user4_id?>)" id="<?=$user4_id?>" style="background-color: rgba(0, 0, 0, 0.8); color:#FFFFFF; z-index:10; position: absolute; top: -47px; left: -22px; display:none"><?=$user4_nm?><br><? if(isset($_SESSION['ruid53'][$user4_id]) && $_SESSION['ruid53'][$user4_id]==1) { ?><a href="replace_volunteers.php?uid=<?=$user4_id?>&stream=5_3">Replace</a><? } ?></div>
																(<?=isset($_SESSION['act_mems_5_3'][$user4_id])?$_SESSION['act_mems_5_3'][$user4_id]:"0";?>)
																<br />
																(<?=$user4_id;?>)
															</div>
														</div>
													<? } else if($user4_img == "red" && $user4_img != "0" ) { ?>
														<div class="float_left right_img5_3_1">
															<a class="acolor" href="javascript:void(0);" onclick="addmore_volunteers_5_3(<?=$user4_id?>,<?=$_GET['cnt']?>)"><img onmouseover="mouseOver(<?=$user4_id?>);" onmouseout="mouseOut(<?=$user4_id?>);" id="img_1[<?=$user4_id?>]" src="<?=SERVER_URL?>images/sred.png" /></a>
															<div class="username_img">
																(<?=isset($_SESSION['uid53'][$user4_id])?$_SESSION['uid53'][$user4_id]:"0";?>)
																<?=$user4_name?>
																<div onmouseover="mouseOver(<?=$user4_id?>);" onmouseout="mouseOut(<?=$user4_id?>)" id="<?=$user4_id?>" style="background-color: rgba(0, 0, 0, 0.8); color:#FFFFFF; z-index:10; position: absolute; top: -47px; left: -22px; display:none"><?=$user4_nm?><br><? if(isset($_SESSION['ruid53'][$user4_id]) && $_SESSION['ruid53'][$user4_id]==1) { ?><a href="replace_volunteers.php?uid=<?=$user4_id?>&stream=5_3">Replace</a><? } ?></div>
																(<?=isset($_SESSION['act_mems_5_3'][$user4_id])?$_SESSION['act_mems_5_3'][$user4_id]:"0";?>)
																<br />(<?=$user4_id;?>)
															</div>
														</div>
													<? }*/
													 else if($user4_img == "none" && $user4_img != "0" ){ ?>
														<div class="float_left right_img5_3_1"><img id="img_1[<?=$user4_id?>]" src="<?=SERVER_URL?>images/snone.png" /><div class="username_img"><?=$user4_name?></div></div>
													<? } else { ?>
														<div class="float_left right_img5_3_1">
															<a class="acolor" href="javascript:void(0);" onclick="addmore_volunteers_5_3(<?=$user4_id?>,<?=$_GET['cnt']?>)">
																<?php echo (($user4_img>=20)?'<img id="img_1['.$user4_id.']" onmouseover="mouseOver('.$user4_id.');" onmouseout="mouseOut('.$user4_id.');" src="images/03.png" />':(($user4_img>=10)?'<img id="img_1['.$user4_id.']" onmouseover="mouseOver('.$user4_id.');" onmouseout="mouseOut('.$user4_id.');" src="images/syellow.png" />':(($user4_img>=6)?'<img id="img_1['.$user4_id.']" onmouseover="mouseOver('.$user4_id.');" onmouseout="mouseOut('.$user4_id.');" src="images/sred.png" />':(($user4_img>=5)?'<img id="img_1['.$user4_id.']" onmouseover="mouseOver('.$user4_id.');" onmouseout="mouseOut('.$user4_id.');" src="images/sgreen.png" />':(($user4_img==4)?'<img id="img_1['.$user4_id.']" onmouseover="mouseOver('.$user4_id.');" onmouseout="mouseOut('.$user4_id.');" src="images/sorange.png" />':($user4_img>=1)?'<img id="img_1['.$user4_id.']" onmouseover="mouseOver('.$user4_id.');" onmouseout="mouseOut('.$user4_id.');" src="images/spurple.png" />':'<img id="img_1['.$user4_id.']" onmouseover="mouseOver('.$user4_id.');" onmouseout="mouseOut('.$user4_id.');" src="images/sgray.png" />')))))?>
															</a>
															<div class="username_img">
																(<?=isset($_SESSION['uid53'][$user4_id])?$_SESSION['uid53'][$user4_id]:"0";?>)
																<?=$user4_name?>
																	<div onmouseover="mouseOver(<?=$user4_id?>);" onmouseout="mouseOut(<?=$user4_id?>)" id="<?=$user4_id?>" style="background-color: rgba(0, 0, 0, 0.8); z-index:10; position: absolute; top: -47px; left: -22px; color:#FFFFFF; display:none"><?=$user4_nm?><br></div>
																	(<?=isset($_SESSION['act_mems_5_3'][$user4_id])?$_SESSION['act_mems_5_3'][$user4_id]:"0";?>)
																	<br>(<?=$user4_id;?>)
															</div>
														</div>
													<? } ?>
													<div class="float_clear"></div>
	                                          	</li>
												<li class="float_left five_three">
													<? if($user5_note == "inactive") { ?>
														<div class="float_left right_img5_3_1">
															<a class="acolor"  href="javascript:void(0);" onclick="addmore_volunteers_5_3(<?=$user5_id?>,<?=$_GET['cnt']?>)"><img onmouseover="mouseOver(<?=$user5_id?>);" onmouseout="mouseOut(<?=$user5_id?>);" id="img_1[<?=$user5_id?>]" src="<?=SERVER_URL?>images/02.png" /></a>
															<br />
															(<?=isset($_SESSION['uid53'][$user5_id])?$_SESSION['uid53'][$user5_id]:"0";?>)
															<?=$user5_name?>
															<div onmouseover="mouseOver(<?=$user5_id?>);" onmouseout="mouseOut(<?=$user5_id?>)" id="<?=$user5_id?>" style="background-color: rgba(0, 0, 0, 0.8); color:#FFFFFF; z-index:10; position: absolute; top: -15px; left: -25px; display:none"><?=$user5_nm?><br><? if(isset($_SESSION['ruid53'][$user5_id]) && $_SESSION['ruid53'][$user5_id]==1) { ?><a href="replace_volunteers.php?uid=<?=$user5_id?>&stream=5_3">Replace</a><? } ?></div>
															(<?=isset($_SESSION['act_mems_5_3'][$user5_id])?$_SESSION['act_mems_5_3'][$user5_id]:"0";?>)
															<br />(<?=$user5_id;?>)
														</div>
													<? } 
													/*else if((isset($_SESSION['have_pay_yday_5_3'][$user5_id]) && $_SESSION['have_pay_yday_5_3'][$user5_id])|| $user5_note == "inactive"){ ?>
														<div class="float_left right_img5_3_1">
															<a class="acolor"  href="javascript:void(0);" onclick="addmore_volunteers_5_3(<?=$user5_id?>,<?=$_GET['cnt']?>)"><img onmouseover="mouseOver(<?=$user5_id?>);" onmouseout="mouseOut(<?=$user5_id?>);" id="img_1[<?=$user5_id?>]" src="<?=SERVER_URL?>images/sred.png" /></a>
															<br />
															(<?=isset($_SESSION['uid53'][$user5_id])?$_SESSION['uid53'][$user5_id]:"0";?>)
															<?=$user5_name?>
															<div onmouseover="mouseOver(<?=$user5_id?>);" onmouseout="mouseOut(<?=$user5_id?>)" id="<?=$user5_id?>" style="background-color: rgba(0, 0, 0, 0.8); color:#FFFFFF; z-index:10; position: absolute; top: -15px; left: -25px; display:none"><?=$user5_nm?><br><? if(isset($_SESSION['ruid53'][$user5_id]) && $_SESSION['ruid53'][$user5_id]==1) { ?><a href="replace_volunteers.php?uid=<?=$user5_id?>&stream=5_3">Replace</a><? } ?></div>
															(<?=isset($_SESSION['act_mems_5_3'][$user5_id])?$_SESSION['act_mems_5_3'][$user5_id]:"0";?>)
															<br />(<?=$user5_id;?>)
														</div>
													<? } else if(isset($_SESSION['have_pay_5day_5_3'][$user5_id]) && $_SESSION['have_pay_5day_5_3'][$user5_id]) { ?>
														<div class="float_left right_img5_3_1">
															<a class="acolor"  href="javascript:void(0);" onclick="addmore_volunteers_5_3(<?=$user5_id?>,<?=$_GET['cnt']?>)"><img onmouseover="mouseOver(<?=$user5_id?>);" onmouseout="mouseOut(<?=$user5_id?>);" id="img_1[<?=$user5_id?>]" src="<?=SERVER_URL?>images/dailyindicatior.png" /></a>
															<br />
															(<?=isset($_SESSION['uid53'][$user5_id])?$_SESSION['uid53'][$user5_id]:"0";?>)
															<?=$user5_name?>
															<div onmouseover="mouseOver(<?=$user5_id?>);" onmouseout="mouseOut(<?=$user5_id?>)" id="<?=$user5_id?>" style="background-color: rgba(0, 0, 0, 0.8); color:#FFFFFF; z-index:10; position: absolute; top: -15px; left: -25px; display:none"><?=$user5_nm?><br><? if(isset($_SESSION['ruid53'][$user5_id]) && $_SESSION['ruid53'][$user5_id]==1) { ?><a href="replace_volunteers.php?uid=<?=$user5_id?>&stream=5_3">Replace</a><? } ?></div>
															(<?=isset($_SESSION['act_mems_5_3'][$user5_id])?$_SESSION['act_mems_5_3'][$user5_id]:"0";?>)
															<br />(<?=$user5_id;?>)
														</div>
													<? } else if($user5_img == "red" && $user5_img != "0" ) { ?>
														<div class="float_left right_img5_3_1">
															<a class="acolor"  href="javascript:void(0);" onclick="addmore_volunteers_5_3(<?=$user5_id?>,<?=$_GET['cnt']?>)">
																<img id="img_1[<?=$user5_id?>]" src="<?=SERVER_URL?>images/sred.png" onmouseover="mouseOver(<?=$user5_id?>);" onmouseout="mouseOut(<?=$user5_id?>)"/>
															</a>
															<br />
															
															(<?=isset($_SESSION['uid53'][$user5_id])?$_SESSION['uid53'][$user5_id]:"0";?>)
															<?=$user5_name?>
															<div onmouseover="mouseOver(<?=$user5_id?>);" onmouseout="mouseOut(<?=$user5_id?>)" id="<?=$user5_id?>" style="background-color: rgba(0, 0, 0, 0.8); color:#FFFFFF; z-index:10; position: absolute; top: -15px; left: -25px; display:none">
																<?=$user5_nm?><br><? if(isset($_SESSION['ruid53'][$user5_id]) && $_SESSION['ruid53'][$user5_id]==1) { ?><a href="replace_volunteers.php?uid=<?=$user5_id?>&stream=5_3">Replace</a><? } ?>
															</div>
															(<?=isset($_SESSION['act_mems_5_3'][$user5_id])?$_SESSION['act_mems_5_3'][$user5_id]:"0";?>)
																<br />(<?=$user5_id;?>)
														</div>
													<? }*/
													 else if($user5_img == "none" && $user5_img != "0" ) { ?>
														<div class="float_left right_img5_3_1"><img src="<?=SERVER_URL?>images/snone.png" /><br /><?=$user5_name?></div>
													<? } else 	{ ?>
	                                                    <div class="float_left right_img5_3_1">
															<a class="acolor"   href="javascript:void(0);" onclick="addmore_volunteers_5_3(<?=$user5_id?>,<?=$_GET['cnt']?>)">
																<?php echo (($user5_img>=20)?'<img id="img_1['.$user5_id.']" onmouseover="mouseOver('.$user5_id.');" onmouseout="mouseOut('.$user5_id.');" src="images/03.png" />':(($user5_img>=10)?'<img id="img_1['.$user5_id.']" onmouseover="mouseOver('.$user5_id.');" onmouseout="mouseOut('.$user5_id.');" src="images/syellow.png" />':(($user5_img>=6)?'<img id="img_1['.$user5_id.']" onmouseover="mouseOver('.$user5_id.');" onmouseout="mouseOut('.$user5_id.');" src="images/sred.png" />':(($user5_img>=5)?'<img id="img_1['.$user5_id.']" onmouseover="mouseOver('.$user5_id.');" onmouseout="mouseOut('.$user5_id.');" src="images/sgreen.png" />':(($user5_img==4)?'<img id="img_1['.$user5_id.']" onmouseover="mouseOver('.$user5_id.');" onmouseout="mouseOut('.$user5_id.');" src="images/sorange.png" />':($user5_img>=1)?'<img id="img_1['.$user5_id.']" onmouseover="mouseOver('.$user5_id.');" onmouseout="mouseOut('.$user5_id.');" src="images/spurple.png" />':'<img id="img_1['.$user5_id.']" onmouseover="mouseOver('.$user5_id.');" onmouseout="mouseOut('.$user5_id.');" src="images/sgray.png" />')))))?>
															</a>
															<br />
															(<?=isset($_SESSION['uid53'][$user5_id])?$_SESSION['uid53'][$user5_id]:"0";?>)
															<?=$user5_name?>
															<div onmouseover="mouseOver(<?=$user5_id?>);" onmouseout="mouseOut(<?=$user5_id?>)" id="<?=$user5_id?>" style="background-color: rgba(0, 0, 0, 0.8); color:#FFFFFF; z-index:10; position: absolute; top: -15px; left: -25px; display:none"><?=$user5_nm?><br></div>
															(<?=isset($_SESSION['act_mems_5_3'][$user5_id])?$_SESSION['act_mems_5_3'][$user5_id]:"0";?>)
															<br>(<?=$user5_id;?>)
														</div>
													<? } ?>
													<div class="float_clear"></div>
	                                          	</li>
                                        </ul>
                                    </li>
									<div class="clearboth" id="next_volunteers[<?=$_GET['cnt']?>]"></div>
									<input type="hidden" value="<?=$_GET['cnt']?>" id="next_volunteers_cnt" name="next_volunteers_cnt" />
<?

	function checkuseractivemembers_5_3($user_ids)
	{
		global $form;
		$sql = "select count(*) as tot_member_act from userdetail u where u.inviter= '".$user_ids."'";
		$rcd = $form->getRow($sql);
		$_SESSION['act_mems_5_3'][$user_ids] = isset($rcd['tot_member_act'])?$rcd['tot_member_act']:0;
	}
	function checkuserreplacelink_5_3($user_ids)
	{
		global $form;
		$sql = "select UserId from userdetail where active = 1 and inviter_5_3='".$user_ids."'";
		$rows = $form->getArray($sql);
		$rcd = sizeof($rows);
		//$uid = array();
		$firstuser = array();
		if($rcd != 0)
		{
			for($i=0;$i<sizeof($rows);$i++)
			{
				$sql = "select payment_done from m_payment_fee_5_3 where usertb_id = '".$rows[$i]['UserId']."'";
				$row2 = $form->getRow($sql);
				if($row2['payment_done'] == 'YES')
				{
					$_SESSION['ruid53'][$user_ids] = 0;
					return;
				}
				else
				{
					$sql = "select ud.UserId,mf.usertb_id from userdetail ud,m_payment_fee_5_3 mf where ud.UserId = mf.usertb_id and ud.inviter_5_3 = '".$rows[$i]['UserId']."' and mf.payment_done = 'YES'";
					$tm = $form->getRow($sql);
					$num = sizeof($tm);
					if($num > 0)
					{
						$_SESSION['ruid53'][$user_ids] = 0;
					}
					else
					{
						$_SESSION['ruid53'][$user_ids] = 1;
					}
				}
			}
		}
		else
		{
			$_SESSION['ruid53'][$user_ids] = 1;
		}
		//$_SESSION['ruid'] = $thirduser;
	}
?>