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
			$arr_10_3_1 = array();

			if(sizeof($row)>0)
			{
					$you = 0;
						?>
						<script type="text/javascript">
						function backbtnclick()
						{
							window.location = "<?=SITE_URL?>index.php";
						}
						</script>
						<link href="css/default.css" rel="stylesheet" type="text/css" />
						
						<div>
								<?
									$top_name = $row['FirstName'];//."&nbsp;".$row['LastName'];
									
									$qry = "select payment_done from m_payment_fee_10_3 where usertb_id = '".$userids."'";
									$user_pays = $form->getRow($qry);
									$user1_note = "";
									if(sizeof($user_pays)>0)
									{
										if($user_pays['payment_done'] == "NO")
										{
											$you = "red";
											$user1_note="Daily payment is not paid in time.";
										}
										else
										{
											$qry = "select count(*) as tot from userdetail where inviter_10_3 = '".$userids."' and active =1 and entry_10_3='prepaid' and Placement = '' ";
											$tm = $form->getRow($qry);
											$you = $num = $tm[0];
										}
									}
								?>
						</div>
						<?
						$qry = "select * from nodetree_10_3 where usertb_id = '".$userids."'";
						$row = $form->getRow($qry);
						$msg = "";
						if(sizeof($row) > 0)
						{
							//$qry = "select CONCAT(FirstName,'&nbsp;&nbsp;',LastName) as Name from userdetail where userid = '".$row['u1']."'";
							$sql = "select count(*) as tot from userdetail where inviter_10_3 = '".$row['u1']."' and Placement = '' ";
							$rows = $form->getRow($sql);
							$arr_10_3_1[$row['u1']] = $num = $rows[0];
							checkuserreplacelink_10_3($row['u1']);
							checkuseractivemembers_10_3($row['u1']);

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
										$user_pays = $form->getRow($qry);
										if(sizeof($user_pays)>0)
										{
											if($user_pays['payment_done'] == "NO")
											{
												$user1_img = "red";
												$user1_note="Daily payment is not paid in time.";
											}
											else
											{
												$qry = "select count(*) as tot from userdetail where inviter_10_3 = '".$row['u1']."' and active =1 and entry_10_3='prepaid' and Placement = '' ";
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
							$sql = "select count(*) as tot from userdetail where inviter_10_3 = '".$row['u2']."' and Placement = '' ";
							$rows = $form->getRow($sql);
							$arr_10_3_1[$row['u2']] = $num = $rows[0];
							checkuserreplacelink_10_3($row['u2']);
							checkuseractivemembers_10_3($row['u2']);

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
										$user_pays = $form->getRow($qry);
										if(sizeof($user_pays)>0)
										{
											if($user_pays['payment_done'] == "NO")
											{
												$user2_img = "red";
												$user2_note="Daily payment is not paid in time.";
											}
											else
											{
												$qry = "select count(*) as tot from userdetail where inviter_10_3 = '".$row['u2']."' and active =1 and entry_10_3='prepaid' and Placement = '' ";
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
							$sql = "select count(*) as tot from userdetail where inviter_10_3 = '".$row['u3']."' and Placement = '' ";
							$rows = $form->getRow($sql);
							$arr_10_3_1[$row['u3']] = $num = $rows[0];
							checkuserreplacelink_10_3($row['u3']);
							checkuseractivemembers_10_3($row['u3']);

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
										$user_pays = $form->getRow($qry);
										if(sizeof($user_pays)>0)
										{
											if($user_pays['payment_done'] == "NO")
											{
												$user3_img = "red";
												$user3_note="Daily payment is not paid in time.";
											}
											else
											{
												$qry = "select count(*) as tot from userdetail where inviter_10_3 = '".$row['u3']."' and active =1 and entry_10_3='prepaid' and Placement = '' ";
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
							$sql = "select count(*) as tot from userdetail where inviter_10_3 = '".$row['u4']."' and Placement = ''";
							$rows = $form->getRow($sql);
							$arr_10_3_1[$row['u4']] = $num = $rows[0];
							checkuserreplacelink_10_3($row['u4']);
							checkuseractivemembers_10_3($row['u4']);

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
										$user_pays = $form->getRow($qry);
										if(sizeof($user_pays)>0)
										{
											if($user_pays['payment_done'] == "NO")
											{
												$user4_img = "red";
												$user4_note="Daily payment is not paid in time.";
											}
											else
											{
												$qry = "select count(*) as tot from userdetail where inviter_10_3 = '".$row['u4']."' and active =1 and entry_10_3='prepaid' and Placement = '' ";
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
							$sql = "select count(*) as tot from userdetail where inviter_10_3 = '".$row['u5']."' and Placement = ''";
							$rows = $form->getRow($sql);
							$arr_10_3_1[$row['u5']] = $num = $rows[0];
							checkuserreplacelink_10_3($row['u5']);
							checkuseractivemembers_10_3($row['u5']);

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
										$user_pays = $form->getRow($qry);
										if(sizeof($user_pays)>0)
										{
											if($user_pays['payment_done'] == "NO")
											{
												$user5_img = "red";
												$user5_note="Daily payment is not paid in time.";
											}
											else
											{
												$qry = "select count(*) as tot from userdetail where inviter_10_3 = '".$row['u5']."' and active =1 and entry_10_3='prepaid' and Placement = '' ";
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

							$sql = "select count(*) as tot from userdetail where inviter_10_3 = '".$row['u6']."' and Placement = ''";
							$rows = $form->getRow($sql);
							$arr_10_3_1[$row['u6']] = $num = $rows[0];
							checkuserreplacelink_10_3($row['u6']);
							checkuseractivemembers_10_3($row['u6']);

									$qry = "select FirstName as Name from userdetail where userid = '".$row['u6']."'";
									$user6 = $form->getRow($qry);
									
											if($row['u6'] != "0")
											{
												$user6_note = "";
												$qry = "select * from userdetail where UserId = '".$row['u6']."'";
												$row11 = $form->getRow($qry);
												
												$user6_name = $row11['FirstName'];//."&nbsp;".$row11['LastName'];
												$user6_nm = $row11['FirstName']."&nbsp;".$row11['LastName'];
												$user6_id = $row['u6'];
				
												$qry = "select payment_done from m_payment_fee_10_3 where usertb_id = '".$row['u6']."'";
												$user_pays = $form->getRow($qry);
												if(sizeof($user_pays)>0)
												{
													if($user_pays['payment_done'] == "NO")
													{
														$user6_img = "red";
														$user6_note="Daily payment is not paid in time.";
													}
													else
													{
														$qry = "select count(*) as tot from userdetail where inviter_10_3 = '".$row['u6']."' and active =1 and entry_10_3='prepaid' and Placement = '' ";
														$row16 = $form->getRow($qry);
														$user6_img = $num = $row16[0];
													}
													$user6_id = $row['u6'];
												}
												else
												{
													$user6_note="inactive";
												}
											}

							$sql = "select count(*) as tot from userdetail where inviter_10_3 = '".$row['u7']."' and Placement = ''";
							$rows = $form->getRow($sql);
							$arr_10_3_1[$row['u7']] = $num = $rows[0];
							checkuserreplacelink_10_3($row['u7']);
							checkuseractivemembers_10_3($row['u7']);

											$qry = "select FirstName as Name from userdetail where userid = '".$row['u7']."'";
											$user7 = $form->getRow($qry);
											
													if($row['u7'] != "0")
													{
														$user7_note = "";
														$qry = "select * from userdetail where UserId = '".$row['u7']."'";
														$row11 = $form->getRow($qry);
														
														$user7_name = $row11['FirstName'];//."&nbsp;".$row11['LastName'];
														$user7_nm = $row11['FirstName']."&nbsp;".$row11['LastName'];
														$user7_id = $row['u7'];
						
														$qry = "select payment_done from m_payment_fee_10_3 where usertb_id = '".$row['u7']."'";
														$user_pays = $form->getRow($qry);
														if(sizeof($user_pays)>0)
														{
															if($user_pays['payment_done'] == "NO")
															{
																$user7_img = "red";
																$user7_note="Daily payment is not paid in time.";
															}
															else
															{
																$qry = "select count(*) as tot from userdetail where inviter_10_3 = '".$row['u7']."' and active =1 and entry_10_3='prepaid' and Placement = '' ";
																$row17 = $form->getRow($qry);
																$user7_img = $num = $row17[0];
															}
															$user7_id = $row['u7'];
														}
														else
														{
															$user7_note="inactive";
														}
													}

							$sql = "select count(*) as tot from userdetail where inviter_10_3 = '".$row['u8']."' and Placement = ''";
							$rows = $form->getRow($sql);
							$arr_10_3_1[$row['u8']] = $num = $rows[0];
							checkuserreplacelink_10_3($row['u8']);
							checkuseractivemembers_10_3($row['u8']);

											$qry = "select FirstName as Name from userdetail where userid = '".$row['u8']."'";
											$user8 = $form->getRow($qry);
											
													if($row['u8'] != "0")
													{
														$user8_note = "";
														$qry = "select * from userdetail where UserId = '".$row['u8']."'";
														$row11 = $form->getRow($qry);
														
														$user8_name = $row11['FirstName'];//."&nbsp;".$row11['LastName'];
														$user8_nm = $row11['FirstName']."&nbsp;".$row11['LastName'];
														$user8_id = $row['u8'];
						
														$qry = "select payment_done from m_payment_fee_10_3 where usertb_id = '".$row['u8']."'";
														$user_pays = $form->getRow($qry);
														if(sizeof($user_pays)>0)
														{
															if($user_pays['payment_done'] == "NO")
															{
																$user8_img = "red";
																$user8_note="Daily payment is not paid in time.";
															}
															else
															{
																$qry = "select count(*) as tot from userdetail where inviter_10_3 = '".$row['u8']."' and active =1 and entry_10_3='prepaid' and Placement = '' ";
																$row18 = $form->getRow($qry);
																$user8_img = $num = $row18[0];
															}
															$user8_id = $row['u8'];
														}
														else
														{
															$user8_note="inactive";
														}
													}

							$sql = "select count(*) as tot from userdetail where inviter_10_3 = '".$row['u9']."' and Placement = ''";
							$rows = $form->getRow($sql);
							$arr_10_3_1[$row['u9']] = $num = $rows[0];
							checkuserreplacelink_10_3($row['u9']);
							checkuseractivemembers_10_3($row['u9']);

											$qry = "select FirstName as Name from userdetail where userid = '".$row['u9']."'";
											$user9 = $form->getRow($qry);
											
													if($row['u9'] != "0")
													{
														$user9_note = "";
														$qry = "select * from userdetail where UserId = '".$row['u9']."'";
														$row11 = $form->getRow($qry);
														
														$user9_name = $row11['FirstName'];//."&nbsp;".$row11['LastName'];
														$user9_nm = $row11['FirstName']."&nbsp;".$row11['LastName'];
														$user9_id = $row['u9'];
						
														$qry = "select payment_done from m_payment_fee_10_3 where usertb_id = '".$row['u9']."'";
														$user_pays = $form->getRow($qry);
														if(sizeof($user_pays)>0)
														{
															if($user_pays['payment_done'] == "NO")
															{
																$user9_img = "red";
																$user9_note="Daily payment is not paid in time.";
															}
															else
															{
																$qry = "select count(*) as tot from userdetail where inviter_10_3 = '".$row['u9']."' and active =1 and entry_10_3='prepaid' and Placement = '' ";
																$row19 = $form->getRow($qry);
																$user9_img = $num = $row19[0];
															}
															$user9_id = $row['u9'];
														}
														else
														{
															$user9_note="inactive";
														}
													}

							$sql = "select count(*) as tot from userdetail where inviter_10_3 = '".$row['u10']."' and Placement = ''";
							$rows = $form->getRow($sql);
							$arr_10_3_1[$row['u10']] = $num = $rows[0];
							checkuserreplacelink_10_3($row['u10']);
							checkuseractivemembers_10_3($row['u10']);

											$qry = "select FirstName as Name from userdetail where userid = '".$row['u10']."'";
											$user10 = $form->getRow($qry);
											
													if($row['u10'] != "0")
													{
														$user10_note = "";
														$qry = "select * from userdetail where UserId = '".$row['u10']."'";
														$row11 = $form->getRow($qry);
														
														$user10_name = $row11['FirstName'];//."&nbsp;".$row11['LastName'];
														$user10_nm = $row11['FirstName']."&nbsp;".$row11['LastName'];
														$user10_id = $row['u10'];
						
														$qry = "select payment_done from m_payment_fee_10_3 where usertb_id = '".$row['u10']."'";
														$user_pays = $form->getRow($qry);
														if(sizeof($user_pays)>0)
														{
															if($user_pays['payment_done'] == "NO")
															{
																$user10_img = "red";
																$user10_note="Daily payment is not paid in time.";
															}
															else
															{
																$qry = "select count(*) as tot from userdetail where inviter_10_3 = '".$row['u10']."' and active =1 and entry_10_3='prepaid'  and Placement = ''";
																$row110 = $form->getRow($qry);
																$user10_img = $num = $row110[0];
															}
															$user10_id = $row['u10'];
														}
														else
														{
															$user10_note="inactive";
														}
													}
							
							?>
							<!--<a class="acolor" href="volunteers.php?user_id=<?=$row['u1']?>"><?=$user1['Name']?></a>&nbsp;&nbsp;&nbsp;<?=$user1_note?>&nbsp;&nbsp;&nbsp;<a class="acolor" href="volunteers.php?user_id=<?=$row['u2']?>"><?=$user2['Name']?></a><?=(isset($user2['Name'])?"&nbsp;&nbsp;&nbsp;".$user2_note:"")?>&nbsp;&nbsp;&nbsp;<a class="acolor" href="volunteers.php?user_id=<?=$row['u3']?>"><?=$user3['Name']?></a><?=(isset($user3['Name'])?"&nbsp;&nbsp;&nbsp;".$user3_note:"")?><br />-->
							<?
						}
			}
	}
$_SESSION['uid103'] = $arr_10_3_1;
?>
										<div></div>
										<div class="float_clear"></div>
										<br>
										<li>
											<ul>
												<li style="border-bottom:#000000 1px solid; width:825px"></li>
											</ul>
											<ul style="position: relative; left:0px;" class="second_portion">
												<li class="float_left ten_three_user0">|</li>
												<li class="float_left ten_three_user1">|</li>
												<li class="float_left ten_three_user">|</li>
												<li class="float_left ten_three_user2">|</li>
												<li class="float_left ten_three_user3">|</li>
                                        		<li class="float_left ten_three_user4">|</li>
												<li class="float_left ten_three_user5">|</li>
												<li class="float_left ten_three_user6">|</li>
												<li class="float_left ten_three_user7">|</li>
												<li class="float_left ten_three_user8">|</li>
                                        	</ul>
											
											<ul class="second_portion" style="position:relative; left:2px;">
                                            	
												<li class="float_left ten_three">
													<? if($user1_note == "inactive") { ?>
															<div class="float_left left_img10x3 left_img10x3_1">
																<a class="acolor"  href="javascript:void(0);" onclick="addmore_volunteers_10_3(<?=$user1_id?>,<?=$_GET['cnt']?>)"><img id="img_1[<?=$user1_id?>]" onmouseover="mouseOver(<?=$user1_id?>);" onmouseout="mouseOut(<?=$user1_id?>);" src="images/02.png" /></a>
																<div class="username_img">
																	(<?=isset($_SESSION['uid103'][$user1_id])?$_SESSION['uid103'][$user1_id]:"0";?>)
																	<?=$user1_name?>
																	<div onmouseover="mouseOver(<?=$user1_id?>);" onmouseout="mouseOut(<?=$user1_id?>)" id="<?=$user1_id?>" style="background-color: rgba(0, 0, 0, 0.8); color:#FFFFFF; z-index:10; position: absolute; top: -47px; left:2px; display:none"><?=$user1_nm?><br><? if(isset($_SESSION['ruid103'][$user1_id]) && $_SESSION['ruid103'][$user1_id]==1) { ?><a href="replace_volunteers.php?uid=<?=$user1_id?>&stream=10_3">Replace</a><? } ?></div>
																	(<?=isset($_SESSION['act_mems_10_3'][$user1_id])?$_SESSION['act_mems_10_3'][$user1_id]:"0";?>)
																	<br />(<?=$user1_id;?>)
																</div>
															</div>
													<? }
													/* else if((isset($_SESSION['have_pay_yday_10_3'][$user1_id]) && $_SESSION['have_pay_yday_10_3'][$user1_id])) { ?>
															<div class="float_left left_img10x3 left_img10x3_1">
																<a class="acolor"  href="javascript:void(0);" onclick="addmore_volunteers_10_3(<?=$user1_id?>,<?=$_GET['cnt']?>)"><img id="img_1[<?=$user1_id?>]" onmouseover="mouseOver(<?=$user1_id?>);" onmouseout="mouseOut(<?=$user1_id?>);" src="images/sred.png" /></a>
																<div class="username_img">
																	(<?=isset($_SESSION['uid103'][$user1_id])?$_SESSION['uid103'][$user1_id]:"0";?>)
																	<?=$user1_name?>
																	<div onmouseover="mouseOver(<?=$user1_id?>);" onmouseout="mouseOut(<?=$user1_id?>)" id="<?=$user1_id?>" style="background-color: rgba(0, 0, 0, 0.8); color:#FFFFFF; z-index:10; position: absolute; top: -47px; left:2px; display:none"><?=$user1_nm?><br><? if(isset($_SESSION['ruid103'][$user1_id]) && $_SESSION['ruid103'][$user1_id]==1) { ?><a href="replace_volunteers.php?uid=<?=$user1_id?>&stream=10_3">Replace</a><? } ?></div>
																	(<?=isset($_SESSION['act_mems_10_3'][$user1_id])?$_SESSION['act_mems_10_3'][$user1_id]:"0";?>)
																	<br />(<?=$user1_id;?>)
																</div>
															</div>
													<? } else if(isset($_SESSION['have_pay_5day_10_3'][$user1_id]) && $_SESSION['have_pay_5day_10_3'][$user1_id]){ ?>
															<div class="float_left left_img10x3 left_img10x3_1">
																<a class="acolor"  href="javascript:void(0);" onclick="addmore_volunteers_10_3(<?=$user1_id?>,<?=$_GET['cnt']?>)"><img id="img_1[<?=$user1_id?>]" onmouseover="mouseOver(<?=$user1_id?>);" onmouseout="mouseOut(<?=$user1_id?>);" src="images/dailyindicatior.png" /></a>
																<div class="username_img">
																	(<?=isset($_SESSION['uid103'][$user1_id])?$_SESSION['uid103'][$user1_id]:"0";?>)
																	<?=$user1_name?>
																	<div onmouseover="mouseOver(<?=$user1_id?>);" onmouseout="mouseOut(<?=$user1_id?>)" id="<?=$user1_id?>" style="background-color: rgba(0, 0, 0, 0.8); color:#FFFFFF; z-index:10; position: absolute; top: -47px; left:2px; display:none"><?=$user1_nm?><br><? if(isset($_SESSION['ruid103'][$user1_id]) && $_SESSION['ruid103'][$user1_id]==1) { ?><a href="replace_volunteers.php?uid=<?=$user1_id?>&stream=10_3">Replace</a><? } ?></div>
																	(<?=isset($_SESSION['act_mems_10_3'][$user1_id])?$_SESSION['act_mems_10_3'][$user1_id]:"0";?>)
																	<br />(<?=$user1_id;?>)
																</div>
															</div>
													<? } else if($user1_img == "red" && $user1_img != "0") { ?>
															<div class="float_left left_img10x3 left_img10x3_1">
																<a class="acolor"  href="javascript:void(0);" onclick="addmore_volunteers_10_3(<?=$user1_id?>,<?=$_GET['cnt']?>)"><img id="img_1[<?=$user1_id?>]" onmouseover="mouseOver(<?=$user1_id?>);" onmouseout="mouseOut(<?=$user1_id?>);" src="images/sred.png" /></a>
																<div class="username_img">
																	(<?=isset($_SESSION['uid103'][$user1_id])?$_SESSION['uid103'][$user1_id]:"0";?>)
																	<?=$user1_name?>
																	<div onmouseover="mouseOver(<?=$user1_id?>);" onmouseout="mouseOut(<?=$user1_id?>)" id="<?=$user1_id?>" style="background-color: rgba(0, 0, 0, 0.8); color:#FFFFFF; z-index:10; position: absolute; top: -47px; left:2px; display:none"><?=$user1_nm?><br><? if(isset($_SESSION['ruid103'][$user1_id]) && $_SESSION['ruid103'][$user1_id]==1) { ?><a href="replace_volunteers.php?uid=<?=$user1_id?>&stream=10_3">Replace</a><? } ?></div>
																	(<?=isset($_SESSION['act_mems_10_3'][$user1_id])?$_SESSION['act_mems_10_3'][$user1_id]:"0";?>)
																	<br />(<?=$user1_id;?>)
																</div>
															</div>
													<? }*/
													 else if($user1_img == "none" && $user1_img != "0") { ?>
															<div class="float_left left_img10x3_1"><img src="images/snone.png" /><div class="username_img"><?=$user1_name?></div></div>
													<? } else { ?>
															<div class="float_left left_img10x3 left_img10x3_1">
																<a class="acolor"  href="javascript:void(0);" onclick="addmore_volunteers_10_3(<?=$user1_id?>,<?=$_GET['cnt']?>)">
																	<?php echo (($user1_img>=20)?'<img id="img_1['.$user1_id.']" onmouseover="mouseOver('.$user1_id.');" onmouseout="mouseOut('.$user1_id.');" src="images/03.png" />':(($user1_img>=10)?'<img id="img_1['.$user1_id.']" onmouseover="mouseOver('.$user1_id.');" onmouseout="mouseOut('.$user1_id.');" src="images/syellow.png" />':(($user1_img>=6)?'<img id="img_1['.$user1_id.']" onmouseover="mouseOver('.$user1_id.');" onmouseout="mouseOut('.$user1_id.');" src="images/sred.png" />':(($user1_img>=5)?'<img id="img_1['.$user1_id.']" onmouseover="mouseOver('.$user1_id.');" onmouseout="mouseOut('.$user1_id.');" src="images/sgreen.png" />':(($user1_img==4)?'<img id="img_1['.$user1_id.']" onmouseover="mouseOver('.$user1_id.');" onmouseout="mouseOut('.$user1_id.');" src="images/sorange.png" />':($user1_img>=1)?'<img id="img_1['.$user1_id.']" onmouseover="mouseOver('.$user1_id.');" onmouseout="mouseOut('.$user1_id.');" src="images/spurple.png" />':'<img id="img_1['.$user1_id.']" onmouseover="mouseOver('.$user1_id.');" onmouseout="mouseOut('.$user1_id.');" src="images/sgray.png" />')))))?>
																</a>
																<div class="username_img">
																	(<?=isset($_SESSION['uid103'][$user1_id])?$_SESSION['uid103'][$user1_id]:"0";?>)
																	<?=$user1_name?>
																	<div onmouseover="mouseOver(<?=$user1_id?>);" onmouseout="mouseOut(<?=$user1_id?>)" id="<?=$user1_id?>" style="background-color: rgba(0, 0, 0, 0.8); color:#FFFFFF; z-index:10; position: absolute; top: -47px; left:2px; display:none"><?=$user1_nm?><br></div>
																	(<?=isset($_SESSION['act_mems_10_3'][$user1_id])?$_SESSION['act_mems_10_3'][$user1_id]:"0";?>)
															    	<br>(<?=$user1_id;?>)
																</div>
															</div>
													<? } ?>
													<div class="float_clear"></div>
	                                            </li>
		                                        <li class="float_left ten_three">
													<? /* echo  $user2_name;  print_r($_SESSION); */ if($user2_note == "inactive") { ?>
															<div style="float: left;" class="left_img10x3 left_img10x3_2">
																	<a class="acolor"  href="javascript:void(0);" onclick="addmore_volunteers_10_3(<?=$user2_id?>,<?=$_GET['cnt']?>)"><img onmouseover="mouseOver(<?=$user2_id?>);" onmouseout="mouseOut(<?=$user2_id?>);" id="img_1[<?=$user2_id?>]" src="images/02.png" /></a>
																	<br />
																	(<?=isset($_SESSION['uid103'][$user2_id])?$_SESSION['uid103'][$user2_id]:"0";?>)
																	<?=$user2_name?>
																	<div  onmouseover="mouseOver(<?=$user2_id?>);" onmouseout="mouseOut(<?=$user2_id?>)" id="<?=$user2_id?>" style="background-color: rgba(0, 0, 0, 0.8); color:#FFFFFF; z-index:10; position: absolute;   top: -16px; left: 21px;  display:none"><?=$user2_nm?><br><? if(isset($_SESSION['ruid103'][$user2_id]) && $_SESSION['ruid103'][$user2_id]==1) { ?><a href="replace_volunteers.php?uid=<?=$user2_id?>&stream=10_3">Replace</a><? } ?></div>
																	(<?=isset($_SESSION['act_mems_10_3'][$user2_id])?$_SESSION['act_mems_10_3'][$user2_id]:"0";?>)
																	<br />(<?=$user2_id;?>)
															</div>
													<? }
													/* else if((isset($_SESSION['have_pay_yday_10_3'][$user2_id]) && $_SESSION['have_pay_yday_10_3'][$user2_id])) { ?>
															<div style="float: left;" class="left_img10x3 left_img10x3_2">
																<a class="acolor"  href="javascript:void(0);" onclick="addmore_volunteers_10_3(<?=$user2_id?>,<?=$_GET['cnt']?>)"><img onmouseover="mouseOver(<?=$user2_id?>);" onmouseout="mouseOut(<?=$user2_id?>);" id="img_1[<?=$user2_id?>]" src="images/sred.png" /></a><br />
																(<?=isset($_SESSION['uid103'][$user2_id])?$_SESSION['uid103'][$user2_id]:"0";?>)
																<?=$user2_name?>
																<div  onmouseover="mouseOver(<?=$user2_id?>);" onmouseout="mouseOut(<?=$user2_id?>)" id="<?=$user2_id?>" style="background-color: rgba(0, 0, 0, 0.8); color:#FFFFFF; z-index:10; position: absolute;   top: -16px; left: 21px;  display:none"><?=$user2_nm?><br><? if(isset($_SESSION['ruid103'][$user2_id]) && $_SESSION['ruid103'][$user2_id]==1) { ?><a href="replace_volunteers.php?uid=<?=$user2_id?>&stream=10_3">Replace</a><? } ?></div>
																(<?=isset($_SESSION['act_mems_10_3'][$user2_id])?$_SESSION['act_mems_10_3'][$user2_id]:"0";?>)
																<br />(<?=$user2_id;?>)
															</div>
													<? } else if(isset($_SESSION['have_pay_5day_10_3'][$user2_id]) && $_SESSION['have_pay_5day_10_3'][$user2_id]){ ?>
															<div style="float: left;" class="left_img10x3 left_img10x3_2">
																<a class="acolor"  href="javascript:void(0);" onclick="addmore_volunteers_10_3(<?=$user2_id?>,<?=$_GET['cnt']?>)">
																	<img onmouseover="mouseOver(<?=$user2_id?>);" onmouseout="mouseOut(<?=$user2_id?>);" id="img_1[<?=$user2_id?>]" src="images/dailyindicatior.png" />
																</a>
																<br />
																(<?=isset($_SESSION['uid103'][$user2_id])?$_SESSION['uid103'][$user2_id]:"0";?>)
																<?=$user2_nm?>
																<div onmouseover="mouseOver(<?=$user2_id?>);" onmouseout="mouseOut(<?=$user2_id?>)" id="<?=$user2_id?>" style="background-color: rgba(0, 0, 0, 0.8); color:#FFFFFF; z-index:10; position: absolute;   top: -16px; left: 21px; display:none"><?=$user2_nm?><br><? if(isset($_SESSION['ruid103'][$user2_id]) && $_SESSION['ruid103'][$user2_id]==1) { ?><a href="replace_volunteers.php?uid=<?=$user2_id?>&stream=10_3">Replace</a><? } ?></div>
																(<?=isset($_SESSION['act_mems_10_3'][$user2_id])?$_SESSION['act_mems_10_3'][$user2_id]:"0";?>)
																<br />(<?=$user2_id;?>)
															</div>
													<? } else if($user2_img == "red" && $user2_img != "0" ) { ?>
															<div style="float: left;" class="left_img10x3 left_img10x3_2">
																<a class="acolor"  href="javascript:void(0);" onclick="addmore_volunteers_10_3(<?=$user2_id?>,<?=$_GET['cnt']?>)">
																	<img onmouseover="mouseOver(<?=$user2_id?>);" onmouseout="mouseOut(<?=$user2_id?>);" id="img_1[<?=$user2_id?>]" src="images/sred.png" />
																</a>
																<br />
																(<?=isset($_SESSION['uid103'][$user2_id])?$_SESSION['uid103'][$user2_id]:"0";?>)
																<?=$user2_nm?>
																<div onmouseover="mouseOver(<?=$user2_id?>);" onmouseout="mouseOut(<?=$user2_id?>)" id="<?=$user2_id?>" style="background-color: rgba(0, 0, 0, 0.8); color:#FFFFFF; z-index:10; position: absolute;   top: -16px; left: 21px;  display:none"><?=$user2_nm?><br><? if(isset($_SESSION['ruid103'][$user2_id]) && $_SESSION['ruid103'][$user2_id]==1) { ?><a href="replace_volunteers.php?uid=<?=$user2_id?>&stream=10_3">Replace</a><? } ?></div>
																(<?=isset($_SESSION['act_mems_10_3'][$user2_id])?$_SESSION['act_mems_10_3'][$user2_id]:"0";?>)
																<br />(<?=$user2_id;?>)
															</div>
													<? } */
													else if($user2_img == "none" && $user2_img != "0" ) { ?>
															<div style="float: left;" class="left_img10x3 left_img10x3_2"><img src="images/snone.png" /><br /><?=$user2_name?></div>
													<? } else { ?>
															<div style="float: left;" class="left_img10x3 left_img10x3_2">
																<a class="acolor"  href="javascript:void(0);" onclick="addmore_volunteers_10_3(<?=$user2_id?>,<?=$_GET['cnt']?>)">
																	<?php echo (($user2_img>=20)?'<img id="img_1['.$user2_id.']" onmouseover="mouseOver('.$user2_id.');" onmouseout="mouseOut('.$user2_id.');" src="images/03.png" />':(($user2_img>=10)?'<img id="img_1['.$user2_id.']" onmouseover="mouseOver('.$user2_id.');" onmouseout="mouseOut('.$user2_id.');" src="images/syellow.png" />':(($user2_img>=6)?'<img id="img_1['.$user2_id.']" onmouseover="mouseOver('.$user2_id.');" onmouseout="mouseOut('.$user2_id.');" src="images/sred.png" />':(($user2_img>=5)?'<img id="img_1['.$user2_id.']" onmouseover="mouseOver('.$user2_id.');" onmouseout="mouseOut('.$user2_id.');" src="images/sgreen.png" />':(($user2_img==4)?'<img id="img_1['.$user2_id.']" onmouseover="mouseOver('.$user2_id.');" onmouseout="mouseOut('.$user2_id.');" src="images/sorange.png" />':($user2_img>=1)?'<img id="img_1['.$user2_id.']" onmouseover="mouseOver('.$user2_id.');" onmouseout="mouseOut('.$user2_id.');" src="images/spurple.png" />':'<img id="img_1['.$user2_id.']" onmouseover="mouseOver('.$user2_id.');" onmouseout="mouseOut('.$user2_id.');" src="images/sgray.png" />')))))?>
																</a>
																<br/>
																(<?=isset($_SESSION['uid103'][$user2_id])?$_SESSION['uid103'][$user2_id]:"0";?>)
																<?=$user2_name?>
																<div onmouseover="mouseOver(<?=$user2_id?>);" onmouseout="mouseOut(<?=$user2_id?>)" id="<?=$user2_id?>" style="background-color: rgba(0, 0, 0, 0.8); z-index:10; color:#FFFFFF; position: absolute;  top: -16px; left: 21px; display:none"><?=$user2_nm?><br></div>
																(<?=isset($_SESSION['act_mems_10_3'][$user2_id])?$_SESSION['act_mems_10_3'][$user2_id]:"0";?>)
																<br>(<?=$user2_id;?>)
															</div>
													<? } ?>
													<div class="float_clear"></div>
		                                        </li>
												<li class="float_left ten_three_two">
													<? if($user3_note == "inactive") { ?>
														<div class="float_left right_img10x3 right_img10x3_1">
															<a class="acolor"  href="javascript:void(0);" onclick="addmore_volunteers_10_3(<?=$user3_id?>,<?=$_GET['cnt']?>)"><img id="img_1[<?=$user3_id?>]" onmouseover="mouseOver(<?=$user3_id?>);" onmouseout="mouseOut(<?=$user3_id?>);" src="images/02.png" /></a>
															<div class="username_img">
																(<?=isset($_SESSION['uid103'][$user3_id])?$_SESSION['uid103'][$user3_id]:"0";?>)
																<?=$user3_name?>
																<div onmouseover="mouseOver(<?=$user3_id?>);" onmouseout="mouseOut(<?=$user3_id?>)" id="<?=$user3_id?>" style="background-color: rgba(0, 0, 0, 0.8); color:#FFFFFF; z-index:10; position: absolute; top: -47px; left: 7px; display:none"><?=$user3_nm?><br><? if(isset($_SESSION['ruid103'][$user3_id]) && $_SESSION['ruid103'][$user3_id]==1) { ?><a href="replace_volunteers.php?uid=<?=$user3_id?>&stream=10_3">Replace</a><? } ?></div>
																(<?=isset($_SESSION['act_mems_10_3'][$user3_id])?$_SESSION['act_mems_10_3'][$user3_id]:"0";?>)
																<br />(<?=$user3_id;?>)
															</div>
														</div>
													<? }
													/* else if((isset($_SESSION['have_pay_yday_10_3'][$user3_id]) && $_SESSION['have_pay_yday_10_3'][$user3_id])) { ?>
														<div class="float_left right_img10x3 right_img10x3_1">
															<a class="acolor"  href="javascript:void(0);" onclick="addmore_volunteers_10_3(<?=$user3_id?>,<?=$_GET['cnt']?>)"><img id="img_1[<?=$user3_id?>]" onmouseover="mouseOver(<?=$user3_id?>);" onmouseout="mouseOut(<?=$user3_id?>);" src="images/sred.png" /></a>
															<div class="username_img">
																(<?=isset($_SESSION['uid103'][$user3_id])?$_SESSION['uid103'][$user3_id]:"0";?>)
																<?=$user3_name?>
																<div onmouseover="mouseOver(<?=$user3_id?>);" onmouseout="mouseOut(<?=$user3_id?>)" id="<?=$user3_id?>" style="background-color: rgba(0, 0, 0, 0.8); color:#FFFFFF; z-index:10; position: absolute; top: -47px; left: 7px; display:none"><?=$user3_nm?><br><? if(isset($_SESSION['ruid103'][$user3_id]) && $_SESSION['ruid103'][$user3_id]==1) { ?><a href="replace_volunteers.php?uid=<?=$user3_id?>&stream=10_3">Replace</a><? } ?></div>
																(<?=isset($_SESSION['act_mems_10_3'][$user3_id])?$_SESSION['act_mems_10_3'][$user3_id]:"0";?>)
																<br />(<?=$user3_id;?>)
															</div>
														</div>
													<? } else if(isset($_SESSION['have_pay_5day_10_3'][$user3_id]) && $_SESSION['have_pay_5day_10_3'][$user3_id]) { ?>
														<div class="float_left right_img10x3 right_img10x3_1">
															<a class="acolor"  href="javascript:void(0);" onclick="addmore_volunteers_10_3(<?=$user3_id?>,<?=$_GET['cnt']?>)"><img id="img_1[<?=$user3_id?>]" onmouseover="mouseOver(<?=$user3_id?>);" onmouseout="mouseOut(<?=$user3_id?>);" src="images/dailyindicatior.png" /></a>
															<div class="username_img">
																(<?=isset($_SESSION['uid103'][$user3_id])?$_SESSION['uid103'][$user3_id]:"0";?>)
																<?=$user3_name?>
																<div onmouseover="mouseOver(<?=$user3_id?>);" onmouseout="mouseOut(<?=$user3_id?>)" id="<?=$user3_id?>" style="background-color: rgba(0, 0, 0, 0.8); color:#FFFFFF; z-index:10; position: absolute; top: -47px; left: 7px; display:none"><?=$user3_nm?><br><? if(isset($_SESSION['ruid103'][$user3_id]) && $_SESSION['ruid103'][$user3_id]==1) { ?><a href="replace_volunteers.php?uid=<?=$user3_id?>&stream=10_3">Replace</a><? } ?></div>
																(<?=isset($_SESSION['act_mems_10_3'][$user3_id])?$_SESSION['act_mems_10_3'][$user3_id]:"0";?>)
																<br />(<?=$user3_id;?>)
															</div>
														</div>
													<? } else if($user3_img == "red" && $user3_img != "0" ) { ?>
														<div class="float_left right_img10x3 right_img10x3_1">
															<a class="acolor"  href="javascript:void(0);" onclick="addmore_volunteers_10_3(<?=$user3_id?>,<?=$_GET['cnt']?>)"><img id="img_1[<?=$user3_id?>]" onmouseover="mouseOver(<?=$user3_id?>);" onmouseout="mouseOut(<?=$user3_id?>);" src="images/sred.png" /></a>
															<div class="username_img">
																(<?=isset($_SESSION['uid103'][$user3_id])?$_SESSION['uid103'][$user3_id]:"0";?>)
																<?=$user3_name?>
																<div onmouseover="mouseOver(<?=$user3_id?>);" onmouseout="mouseOut(<?=$user3_id?>)" id="<?=$user3_id?>" style="background-color: rgba(0, 0, 0, 0.8); color:#FFFFFF; z-index:10; position: absolute; top: -47px; left: 7px; display:none"><?=$user3_nm?><br><? if(isset($_SESSION['ruid103'][$user3_id]) && $_SESSION['ruid103'][$user3_id]==1) { ?><a href="replace_volunteers.php?uid=<?=$user3_id?>&stream=10_3">Replace</a><? } ?></div>
																(<?=isset($_SESSION['act_mems_10_3'][$user3_id])?$_SESSION['act_mems_10_3'][$user3_id]:"0";?>)
																<br />(<?=$user3_id;?>)
															</div>
														</div>
													<? }*/
													 else if($user3_img == "none" && $user3_img != "0" ) { ?>
														<div class="float_left right_img10x3 right_img10x3_1"><img id="img_1[<?=$user3_id?>]" src="images/snone.png" /><div class="username_img"><?=$user3_name?></div></div>
													<? } else { ?>
														<div class="float_left right_img10x3 right_img10x3_1">
															<a class="acolor"  href="javascript:void(0);" onclick="addmore_volunteers_10_3(<?=$user3_id?>,<?=$_GET['cnt']?>)">
																<?php echo (($user3_img>=20)?'<img id="img_1['.$user3_id.']" onmouseover="mouseOver('.$user3_id.');" onmouseout="mouseOut('.$user3_id.');" src="images/03.png" />':(($user3_img>=10)?'<img id="img_1['.$user3_id.']" onmouseover="mouseOver('.$user3_id.');" onmouseout="mouseOut('.$user3_id.');" src="images/syellow.png" />':(($user3_img>=6)?'<img id="img_1['.$user3_id.']" onmouseover="mouseOver('.$user3_id.');" onmouseout="mouseOut('.$user3_id.');" src="images/sred.png" />':(($user3_img>=5)?'<img id="img_1['.$user3_id.']" onmouseover="mouseOver('.$user3_id.');" onmouseout="mouseOut('.$user3_id.');" src="images/sgreen.png" />':(($user3_img==4)?'<img id="img_1['.$user3_id.']" onmouseover="mouseOver('.$user3_id.');" onmouseout="mouseOut('.$user3_id.');" src="images/sorange.png" />':($user3_img>=1)?'<img id="img_1['.$user3_id.']" onmouseover="mouseOver('.$user3_id.');" onmouseout="mouseOut('.$user3_id.');" src="images/spurple.png" />':'<img id="img_1['.$user3_id.']" onmouseover="mouseOver('.$user3_id.');" onmouseout="mouseOut('.$user3_id.');" src="images/sgray.png" />')))))?>
															</a>
															<div class="username_img">
																(<?=isset($_SESSION['uid103'][$user3_id])?$_SESSION['uid103'][$user3_id]:"0";?>)
																<?=$user3_name?>
																<div onmouseover="mouseOver(<?=$user3_id?>);" onmouseout="mouseOut(<?=$user3_id?>)" id="<?=$user3_id?>" style="background-color: rgba(0, 0, 0, 0.8); z-index:10; color:#FFFFFF; position: absolute; top: -47px; left: 7px; display:none"><?=$user3_nm?><br></div>(<?=$user3_id;?>)
																<br>(<?=isset($_SESSION['act_mems_10_3'][$user3_id])?$_SESSION['act_mems_10_3'][$user3_id]:"0";?>)(<?=$user3_id;?>)<br />
															</div>
														</div>
													<? } ?>
													<div class="float_clear"></div>
                                            	</li>
												<li class="float_left ten_three_two">
													<? if($user4_note == "inactive") { ?>
														<div class="float_left right_img10x3 right_img10x3_2">
															<a class="acolor" href="javascript:void(0);" onclick="addmore_volunteers_10_3(<?=$user4_id?>,<?=$_GET['cnt']?>)"><img onmouseover="mouseOver(<?=$user4_id?>);" onmouseout="mouseOut(<?=$user4_id?>);" id="img_1[<?=$user4_id?>]" src="images/02.png" /></a>
															<div class="username_img">
																(<?=isset($_SESSION['uid103'][$user4_id])?$_SESSION['uid103'][$user4_id]:"0";?>)
																<?=$user4_name?>
																<div onmouseover="mouseOver(<?=$user4_id?>);" onmouseout="mouseOut(<?=$user4_id?>)" id="<?=$user4_id?>" style="background-color: rgba(0, 0, 0, 0.8); color:#FFFFFF; z-index:10; position: absolute; top: -47px; left: 9px; display:none"><?=$user4_nm?><br><? if(isset($_SESSION['ruid103'][$user4_id]) && $_SESSION['ruid103'][$user4_id]==1) { ?><a href="replace_volunteers.php?uid=<?=$user4_id?>&stream=10_3">Replace</a><? } ?></div>
																(<?=isset($_SESSION['act_mems_10_3'][$user4_id])?$_SESSION['act_mems_10_3'][$user4_id]:"0";?>)
																<br />(<?=$user4_id;?>)
															</div>
														</div>
													<? } 
													/*else if((isset($_SESSION['have_pay_yday_10_3'][$user4_id]) && $_SESSION['have_pay_yday_10_3'][$user4_id])) { ?>
														<div class="float_left right_img10x3 right_img10x3_2">
															<a class="acolor" href="javascript:void(0);" onclick="addmore_volunteers_10_3(<?=$user4_id?>,<?=$_GET['cnt']?>)"><img onmouseover="mouseOver(<?=$user4_id?>);" onmouseout="mouseOut(<?=$user4_id?>);" id="img_1[<?=$user4_id?>]" src="images/sred.png" /></a>
															<div class="username_img">
															(<?=isset($_SESSION['uid103'][$user4_id])?$_SESSION['uid103'][$user4_id]:"0";?>)
															<?=$user4_name?>
															<div onmouseover="mouseOver(<?=$user4_id?>);" onmouseout="mouseOut(<?=$user4_id?>)" id="<?=$user4_id?>" style="background-color: rgba(0, 0, 0, 0.8); color:#FFFFFF; z-index:10; position: absolute; top: -47px; left: 9px; display:none"><?=$user4_nm?><br>
																<? if(isset($_SESSION['ruid103'][$user4_id]) && $_SESSION['ruid103'][$user4_id]==1) { ?><a href="replace_volunteers.php?uid=<?=$user4_id?>&stream=10_3">Replace</a><? } ?>
																</div>
																(<?=isset($_SESSION['act_mems_10_3'][$user4_id])?$_SESSION['act_mems_10_3'][$user4_id]:"0";?>)
																<br />(<?=$user4_id;?>)
															</div>
														</div>
													<? } else if(isset($_SESSION['have_pay_5day_10_3'][$user4_id]) && $_SESSION['have_pay_5day_10_3'][$user4_id]) 	{ ?>
														<div class="float_left right_img10x3 right_img10x3_2">
																<a class="acolor" href="javascript:void(0);" onclick="addmore_volunteers_10_3(<?=$user4_id?>,<?=$_GET['cnt']?>)"><img onmouseover="mouseOver(<?=$user4_id?>);" onmouseout="mouseOut(<?=$user4_id?>);"  id="img_1[<?=$user4_id?>]" src="images/dailyindicatior.png" /></a>
																<div class="username_img">
																	(<?=isset($_SESSION['uid103'][$user4_id])?$_SESSION['uid103'][$user4_id]:"0";?>)
																	<?=$user4_name?>
																	<div onmouseover="mouseOver(<?=$user4_id?>);" onmouseout="mouseOut(<?=$user4_id?>)" id="<?=$user4_id?>" style="background-color: rgba(0, 0, 0, 0.8); color:#FFFFFF; z-index:10; position: absolute; top: -47px; left: 9px; display:none"><?=$user4_nm?><br><? if(isset($_SESSION['ruid103'][$user4_id]) && $_SESSION['ruid103'][$user4_id]==1) { ?><a href="replace_volunteers.php?uid=<?=$user4_id?>&stream=10_3">Replace</a><? } ?></div>
																	(<?=isset($_SESSION['act_mems_10_3'][$user4_id])?$_SESSION['act_mems_10_3'][$user4_id]:"0";?>)
																	<br />(<?=$user4_id;?>)
																</div>
														</div>
													<? } else if($user4_img == "red" && $user4_img != "0" ) { ?>
														<div class="float_left right_img10x3 right_img10x3_2">
															<a class="acolor" href="javascript:void(0);" onclick="addmore_volunteers_10_3(<?=$user4_id?>,<?=$_GET['cnt']?>)"><img onmouseover="mouseOver(<?=$user4_id?>);" onmouseout="mouseOut(<?=$user4_id?>);" id="img_1[<?=$user4_id?>]" src="images/sred.png" /></a>
															<div class="username_img">
																(<?=isset($_SESSION['uid103'][$user4_id])?$_SESSION['uid103'][$user4_id]:"0";?>)
																<?=$user4_name?>
																<div onmouseover="mouseOver(<?=$user4_id?>);" onmouseout="mouseOut(<?=$user4_id?>)" id="<?=$user4_id?>" style="background-color: rgba(0, 0, 0, 0.8); color:#FFFFFF; z-index:10; position: absolute; top: -47px; left: 9px; display:none"><?=$user4_nm?><br><? if(isset($_SESSION['ruid103'][$user4_id]) && $_SESSION['ruid103'][$user4_id]==1) { ?><a href="replace_volunteers.php?uid=<?=$user4_id?>&stream=10_3">Replace</a><? } ?></div>
																(<?=isset($_SESSION['act_mems_10_3'][$user4_id])?$_SESSION['act_mems_10_3'][$user4_id]:"0";?>)
																<br />(<?=$user4_id;?>)
															</div>
														</div>
													<? }*/
													 else if($user4_img == "none" && $user4_img != "0" ) { ?>
														<div class="float_left right_img10x3 right_img10x3_2"><img id="img_1[<?=$user4_id?>]" src="images/snone.png" /><div class="username_img"><?=$user4_name?></div></div>
													<? } else { ?>
														<div class="float_left right_img">
															<a class="acolor" href="javascript:void(0);" onclick="addmore_volunteers_10_3(<?=$user4_id?>,<?=$_GET['cnt']?>)">
																<?php echo (($user4_img>=20)?'<img id="img_1['.$user4_id.']" onmouseover="mouseOver('.$user4_id.');" onmouseout="mouseOut('.$user4_id.');" src="images/03.png" />':(($user4_img>=10)?'<img id="img_1['.$user4_id.']" onmouseover="mouseOver('.$user4_id.');" onmouseout="mouseOut('.$user4_id.');" src="images/syellow.png" />':(($user4_img>=6)?'<img id="img_1['.$user4_id.']" onmouseover="mouseOver('.$user4_id.');" onmouseout="mouseOut('.$user4_id.');" src="images/sred.png" />':(($user4_img>=5)?'<img id="img_1['.$user4_id.']" onmouseover="mouseOver('.$user4_id.');" onmouseout="mouseOut('.$user4_id.');" src="images/sgreen.png" />':(($user4_img==4)?'<img id="img_1['.$user4_id.']" onmouseover="mouseOver('.$user4_id.');" onmouseout="mouseOut('.$user4_id.');" src="images/sorange.png" />':($user4_img>=1)?'<img id="img_1['.$user4_id.']" onmouseover="mouseOver('.$user4_id.');" onmouseout="mouseOut('.$user4_id.');" src="images/spurple.png" />':'<img id="img_1['.$user4_id.']" onmouseover="mouseOver('.$user4_id.');" onmouseout="mouseOut('.$user4_id.');" src="images/sgray.png" />')))))?>
															</a>
															<div class="username_img">
																(<?=isset($_SESSION['uid103'][$user4_id])?$_SESSION['uid103'][$user4_id]:"0";?>)
																<?=$user4_name?>
																<div onmouseover="mouseOver(<?=$user4_id?>);" onmouseout="mouseOut(<?=$user4_id?>)" id="<?=$user4_id?>" style="background-color: rgba(0, 0, 0, 0.8); z-index:10; position: absolute; top: -47px; left: 9px; color:#FFFFFF; display:none"><?=$user4_nm?><br></div>
																(<?=isset($_SESSION['act_mems_10_3'][$user4_id])?$_SESSION['act_mems_10_3'][$user4_id]:"0";?>)
																<br>(<?=$user4_id;?>)
															</div>
														</div>
													<? } ?>
													<div class="float_clear"></div>
	                                          	</li>
												<li class="float_left ten_three_after_4_1">
													<? if($user5_note == "inactive") { ?>
														<div class="float_left right_img10x3 right_img10x3_3">
																<a class="acolor"  href="javascript:void(0);" onclick="addmore_volunteers_10_3(<?=$user5_id?>,<?=$_GET['cnt']?>)"><img onmouseover="mouseOver(<?=$user5_id?>);" onmouseout="mouseOut(<?=$user5_id?>);" id="img_1[<?=$user5_id?>]" src="images/02.png" /></a>
																<br />
																(<?=isset($_SESSION['uid103'][$user5_id])?$_SESSION['uid103'][$user5_id]:"0";?>)
																<?=$user5_name?>
																<div onmouseover="mouseOver(<?=$user5_id?>);" onmouseout="mouseOut(<?=$user5_id?>)" id="<?=$user5_id?>" style="background-color: rgba(0, 0, 0, 0.8); color:#FFFFFF; z-index:10; position: absolute; top: -18px; left: 8px; display:none"><?=$user5_nm?><br><? if(isset($_SESSION['ruid103'][$user5_id]) && $_SESSION['ruid103'][$user5_id]==1) { ?><a href="replace_volunteers.php?uid=<?=$user5_id?>&stream=10_3">Replace</a><? } ?></div>
																(<?=isset($_SESSION['act_mems_10_3'][$user5_id])?$_SESSION['act_mems_10_3'][$user5_id]:"0";?>)
																<br />(<?=$user5_id;?>)
														</div>
													<? } 
													/*else if((isset($_SESSION['have_pay_yday_10_3'][$user5_id]) && $_SESSION['have_pay_yday_10_3'][$user5_id])) { ?>
														<div class="float_left right_img10x3 right_img10x3_3">
																<a class="acolor"  href="javascript:void(0);" onclick="addmore_volunteers_10_3(<?=$user5_id?>,<?=$_GET['cnt']?>)"><img onmouseover="mouseOver(<?=$user5_id?>);" onmouseout="mouseOut(<?=$user5_id?>);" id="img_1[<?=$user5_id?>]" src="images/sred.png" /></a><br />
																(<?=isset($_SESSION['uid103'][$user5_id])?$_SESSION['uid103'][$user5_id]:"0";?>)
																<?=$user5_name?>
																<div onmouseover="mouseOver(<?=$user5_id?>);" onmouseout="mouseOut(<?=$user5_id?>)" id="<?=$user5_id?>" style="background-color: rgba(0, 0, 0, 0.8); color:#FFFFFF; z-index:10; position: absolute; top: -18px; left: 8px; display:none"><?=$user5_nm?><br><? if(isset($_SESSION['ruid103'][$user5_id]) && $_SESSION['ruid103'][$user5_id]==1) { ?><a href="replace_volunteers.php?uid=<?=$user5_id?>&stream=10_3">Replace</a><? } ?></div>
																(<?=isset($_SESSION['act_mems_10_3'][$user5_id])?$_SESSION['act_mems_10_3'][$user5_id]:"0";?>)
																<br />(<?=$user5_id;?>)
														</div>
													<? } else if(isset($_SESSION['have_pay_5day_10_3'][$user5_id]) && $_SESSION['have_pay_5day_10_3'][$user5_id]) {?>
															<div class="float_left right_img10x3 right_img10x3_3">
																<a class="acolor"  href="javascript:void(0);" onclick="addmore_volunteers_10_3(<?=$user5_id?>,<?=$_GET['cnt']?>)"><img onmouseover="mouseOver(<?=$user5_id?>);" onmouseout="mouseOut(<?=$user5_id?>);" id="img_1[<?=$user5_id?>]" src="images/dailyindicatior.png" /></a>
																<br />
																(<?=isset($_SESSION['uid103'][$user5_id])?$_SESSION['uid103'][$user5_id]:"0";?>)
																<?=$user5_name?>
																<div onmouseover="mouseOver(<?=$user5_id?>);" onmouseout="mouseOut(<?=$user5_id?>)" id="<?=$user5_id?>" style="background-color: rgba(0, 0, 0, 0.8); color:#FFFFFF; z-index:10; position: absolute; top: -18px; left: 8px; display:none"><?=$user5_nm?><br><? if(isset($_SESSION['ruid103'][$user5_id]) && $_SESSION['ruid103'][$user5_id]==1) { ?><a href="replace_volunteers.php?uid=<?=$user5_id?>&stream=10_3">Replace</a><? } ?></div>
																(<?=isset($_SESSION['act_mems_10_3'][$user5_id])?$_SESSION['act_mems_10_3'][$user5_id]:"0";?>)
																<br />(<?=$user5_id;?>)
															</div>
													<? } else if($user5_img == "red" && $user5_img != "0" ) { ?>
															<div class="float_left right_img10x3 right_img10x3_3">
																<a class="acolor"  href="javascript:void(0);" onclick="addmore_volunteers_10_3(<?=$user5_id?>,<?=$_GET['cnt']?>)"><img id="img_1[<?=$user5_id?>]" src="images/sred.png" /></a>
																<br />
																(<?=isset($_SESSION['uid103'][$user5_id])?$_SESSION['uid103'][$user5_id]:"0";?>)
																<?=$user5_name?>
																<div onmouseover="mouseOver(<?=$user5_id?>);" onmouseout="mouseOut(<?=$user5_id?>)" id="<?=$user5_id?>" style="background-color: rgba(0, 0, 0, 0.8); color:#FFFFFF; z-index:10; position: absolute; top: -18px; left: 8px; display:none"><?=$user5_nm?><br><? if(isset($_SESSION['ruid103'][$user5_id]) && $_SESSION['ruid103'][$user5_id]==1) { ?><a href="replace_volunteers.php?uid=<?=$user5_id?>&stream=10_3">Replace</a><? } ?></div>
																(<?=isset($_SESSION['act_mems_10_3'][$user5_id])?$_SESSION['act_mems_10_3'][$user5_id]:"0";?>)
																<br />(<?=$user5_id;?>)
															</div>
													<? } */
													else if($user5_img == "none" && $user5_img != "0" ) { ?>
															<div class="float_left right_img"><img src="images/snone.png" /><br /><?=$user5_name?></div>
													<? } else{ ?>
	                                                    	<div class="float_left right_img10x3 right_img10x3_3">
																<a class="acolor"   href="javascript:void(0);" onclick="addmore_volunteers_10_3(<?=$user5_id?>,<?=$_GET['cnt']?>)">
																	<?php echo (($user5_img>=20)?'<img id="img_1['.$user5_id.']" onmouseover="mouseOver('.$user5_id.');" onmouseout="mouseOut('.$user5_id.');" src="images/03.png" />':(($user5_img>=10)?'<img id="img_1['.$user5_id.']" onmouseover="mouseOver('.$user5_id.');" onmouseout="mouseOut('.$user5_id.');" src="images/syellow.png" />':(($user5_img>=6)?'<img id="img_1['.$user5_id.']" onmouseover="mouseOver('.$user5_id.');" onmouseout="mouseOut('.$user5_id.');" src="images/sred.png" />':(($user5_img>=5)?'<img id="img_1['.$user5_id.']" onmouseover="mouseOver('.$user5_id.');" onmouseout="mouseOut('.$user5_id.');" src="images/sgreen.png" />':(($user5_img==4)?'<img id="img_1['.$user5_id.']" onmouseover="mouseOver('.$user5_id.');" onmouseout="mouseOut('.$user5_id.');" src="images/sorange.png" />':($user5_img>=1)?'<img id="img_1['.$user5_id.']" onmouseover="mouseOver('.$user5_id.');" onmouseout="mouseOut('.$user5_id.');" src="images/spurple.png" />':'<img id="img_1['.$user5_id.']" onmouseover="mouseOver('.$user5_id.');" onmouseout="mouseOut('.$user5_id.');" src="images/sgray.png" />')))))?>
																</a>
																<br />
																(<?=isset($_SESSION['uid103'][$user5_id])?$_SESSION['uid103'][$user5_id]:"0";?>)
																<?=$user5_name?>
																<div onmouseover="mouseOver(<?=$user5_id?>);" onmouseout="mouseOut(<?=$user5_id?>)" id="<?=$user5_id?>" style="background-color: rgba(0, 0, 0, 0.8); color:#FFFFFF; z-index:10; position: absolute; top: -18px; left: 8px; display:none"><?=$user5_nm?><br></div>
																(<?=isset($_SESSION['act_mems_10_3'][$user5_id])?$_SESSION['act_mems_10_3'][$user5_id]:"0";?>)
															<br>(<?=$user5_id;?>)
														</div>
													<? } ?>
													<div class="float_clear"></div>
	                                          	</li>
												<li class="float_left ten_three_after_6">
													<? if($user6_note == "inactive") { ?>
														<div class="float_left left_img10x3 left_img10x3_3">
															<a class="acolor"  href="javascript:void(0);" onclick="addmore_volunteers_10_3(<?=$user6_id?>,<?=$_GET['cnt']?>)"><img id="img_1[<?=$user6_id?>]" onmouseover="mouseOver(<?=$user6_id?>);" onmouseout="mouseOut(<?=$user6_id?>);" src="images/02.png" /></a>
															<div class="username_img">
																(<?=isset($_SESSION['uid103'][$user6_id])?$_SESSION['uid103'][$user6_id]:"0";?>)
																<?=$user6_name?>
																<div onmouseover="mouseOver(<?=$user6_id?>);" onmouseout="mouseOut(<?=$user6_id?>)" id="<?=$user6_id?>" style="background-color: rgba(0, 0, 0, 0.8); color:#FFFFFF; z-index:10; position: absolute; top:-48px; left: 6px; display:none"><?=$user6_nm?><br><? if(isset($_SESSION['ruid103'][$user6_id]) && $_SESSION['ruid103'][$user6_id]==1) { ?><a href="replace_volunteers.php?uid=<?=$user6_id?>&stream=10_3">Replace</a><? } ?></div>
																(<?=isset($_SESSION['act_mems_10_3'][$user6_id])?$_SESSION['act_mems_10_3'][$user6_id]:"0";?>)
																<br />(<?=$user6_id;?>)
															</div>
														</div>
													<? }
													/* else if((isset($_SESSION['have_pay_yday_10_3'][$user6_id]) && $_SESSION['have_pay_yday_10_3'][$user6_id])) { ?>
														<div class="float_left left_img10x3 left_img10x3_3">
															<a class="acolor"  href="javascript:void(0);" onclick="addmore_volunteers_10_3(<?=$user6_id?>,<?=$_GET['cnt']?>)"><img id="img_1[<?=$user6_id?>]" onmouseover="mouseOver(<?=$user6_id?>);" onmouseout="mouseOut(<?=$user6_id?>);" src="images/sred.png" /></a>
															<div class="username_img">
																(<?=isset($_SESSION['uid103'][$user6_id])?$_SESSION['uid103'][$user6_id]:"0";?>)
																<?=$user6_name?>
																<div onmouseover="mouseOver(<?=$user6_id?>);" onmouseout="mouseOut(<?=$user6_id?>)" id="<?=$user6_id?>" style="background-color: rgba(0, 0, 0, 0.8); color:#FFFFFF; z-index:10; position: absolute; top:-48px; left: 6px; display:none"><?=$user6_nm?><br><? if(isset($_SESSION['ruid103'][$user6_id]) && $_SESSION['ruid103'][$user6_id]==1) { ?><a href="replace_volunteers.php?uid=<?=$user6_id?>&stream=10_3">Replace</a><? } ?></div>
																(<?=isset($_SESSION['act_mems_10_3'][$user6_id])?$_SESSION['act_mems_10_3'][$user6_id]:"0";?>)
																(<?=$user6_id;?>)<br />
															</div>
														</div>
													<? } else if(isset($_SESSION['have_pay_5day_10_3'][$user6_id]) && $_SESSION['have_pay_5day_10_3'][$user6_id]) { ?>
														<div class="float_left left_img10x3 left_img10x3_3">
															<a class="acolor"  href="javascript:void(0);" onclick="addmore_volunteers_10_3(<?=$user6_id?>,<?=$_GET['cnt']?>)"><img id="img_1[<?=$user6_id?>]" onmouseover="mouseOver(<?=$user6_id?>);" onmouseout="mouseOut(<?=$user6_id?>);" src="images/dailyindicatior.png" /></a>
															<div class="username_img">
																(<?=isset($_SESSION['uid103'][$user6_id])?$_SESSION['uid103'][$user6_id]:"0";?>)
																<?=$user6_name?>
																<div onmouseover="mouseOver(<?=$user6_id?>);" onmouseout="mouseOut(<?=$user6_id?>)" id="<?=$user6_id?>" style="background-color: rgba(0, 0, 0, 0.8); color:#FFFFFF; z-index:10; position: absolute; top:-48px; left: 6px; display:none"><?=$user6_nm?><br><? if(isset($_SESSION['ruid103'][$user6_id]) && $_SESSION['ruid103'][$user6_id]==1) { ?><a href="replace_volunteers.php?uid=<?=$user6_id?>&stream=10_3">Replace</a><? } ?></div>
																(<?=isset($_SESSION['act_mems_10_3'][$user6_id])?$_SESSION['act_mems_10_3'][$user6_id]:"0";?>)
																<br />(<?=$user6_id;?>)
															</div>
														</div>
													<? } else if($user6_img == "red" && $user6_img != "0") { ?>
														<div class="float_left left_img10x3 left_img10x3_3">
															<a class="acolor"  href="javascript:void(0);" onclick="addmore_volunteers_10_3(<?=$user6_id?>,<?=$_GET['cnt']?>)">
																<img id="img_1[<?=$user6_id?>]" onmouseover="mouseOver(<?=$user6_id?>);" onmouseout="mouseOut(<?=$user6_id?>);" src="images/sred.png" />
															</a>
															<div class="username_img">
																(<?=isset($_SESSION['uid103'][$user6_id])?$_SESSION['uid103'][$user6_id]:"0";?>)
																<?=$user6_name?>
																<div onmouseover="mouseOver(<?=$user6_id?>);" onmouseout="mouseOut(<?=$user6_id?>)" id="<?=$user6_id?>" style="background-color: rgba(0, 0, 0, 0.8); color:#FFFFFF; z-index:10; position: absolute; top:-48px; left: 6px; display:none"><?=$user6_nm?><br>
																	<? if(isset($_SESSION['ruid103'][$user6_id]) && $_SESSION['ruid103'][$user6_id]==1) { ?><a href="replace_volunteers.php?uid=<?=$user6_id?>&stream=10_3">Replace</a><? } ?>
																</div>
																(<?=isset($_SESSION['act_mems_10_3'][$user6_id])?$_SESSION['act_mems_10_3'][$user6_id]:"0";?>)
																<br />(<?=$user6_id;?>)</div>
														</div>
													<? }*/
													 else if($user6_img == "none" && $user6_img != "0") { ?>
														<div class="float_left left_img10x3 left_img10x3_3"><img src="images/snone.png" /><div class="username_img"><?=$user6_name?></div></div>
													<? } else { ?>
														<div class="float_left left_img10x3 left_img10x3_3">
															<a class="acolor"  href="javascript:void(0);" onclick="addmore_volunteers_10_3(<?=$user6_id?>,<?=$_GET['cnt']?>)">
																<?php echo (($user6_img>=20)?'<img id="img_1['.$user6_id.']" onmouseover="mouseOver('.$user6_id.');" onmouseout="mouseOut('.$user6_id.');" src="images/03.png" />':(($user6_img>=10)?'<img id="img_1['.$user6_id.']" onmouseover="mouseOver('.$user6_id.');" onmouseout="mouseOut('.$user6_id.');" src="images/syellow.png" />':(($user6_img>=6)?'<img id="img_1['.$user6_id.']" onmouseover="mouseOver('.$user6_id.');" onmouseout="mouseOut('.$user6_id.');" src="images/sred.png" />':(($user6_img>=5)?'<img id="img_1['.$user6_id.']" onmouseover="mouseOver('.$user6_id.');" onmouseout="mouseOut('.$user6_id.');" src="images/sgreen.png" />':(($user6_img==4)?'<img id="img_1['.$user6_id.']" onmouseover="mouseOver('.$user6_id.');" onmouseout="mouseOut('.$user6_id.');" src="images/sorange.png" />':($user6_img>=1)?'<img id="img_1['.$user6_id.']" onmouseover="mouseOver('.$user6_id.');" onmouseout="mouseOut('.$user6_id.');" src="images/spurple.png" />':'<img id="img_1['.$user6_id.']" onmouseover="mouseOver('.$user6_id.');" onmouseout="mouseOut('.$user6_id.');" src="images/sgray.png" />')))))?>
															</a>
															<div class="username_img">
																(<?=isset($_SESSION['uid103'][$user6_id])?$_SESSION['uid103'][$user6_id]:"0";?>)
																<?=$user6_name?>
																<div onmouseover="mouseOver(<?=$user6_id?>);" onmouseout="mouseOut(<?=$user6_id?>)" id="<?=$user6_id?>" style="background-color: rgba(0, 0, 0, 0.8); color:#FFFFFF; z-index:10; position: absolute; top:-48px; left: 6px; display:none"><?=$user6_nm?><br></div>
																(<?=isset($_SESSION['act_mems_10_3'][$user6_id])?$_SESSION['act_mems_10_3'][$user6_id]:"0";?>)
																<br>(<?=$user6_id;?>)
															</div>
														</div>
													<? } ?>
													<div class="float_clear"></div>
	                                            </li>
		                                        <li class="float_left ten_three_after_6">
													<? /* echo  $user2_name; */ if($user7_note == "inactive") { ?>
															<div style="float: left;" class="left_img10x3 left_img10x3_4">
																<a class="acolor"  href="javascript:void(0);" onclick="addmore_volunteers_10_3(<?=$user7_id?>,<?=$_GET['cnt']?>)"><img onmouseover="mouseOver(<?=$user7_id?>);" onmouseout="mouseOut(<?=$user7_id?>);" id="img_1[<?=$user7_id?>]" src="images/02.png" /></a><br />
																(<?=isset($_SESSION['uid103'][$user7_id])?$_SESSION['uid103'][$user7_id]:"0";?>)
																<?=$user7_name?>
																<div onmouseover="mouseOver(<?=$user7_id?>);" onmouseout="mouseOut(<?=$user7_id?>)" id="<?=$user7_id?>" style="background-color: rgba(0, 0, 0, 0.8); color:#FFFFFF; z-index:10; position: absolute; top: -16px; left: 10px; display:none"><?=$user7_nm?><br><? if(isset($_SESSION['ruid103'][$user7_id]) && $_SESSION['ruid103'][$user7_id]==1) { ?><a href="replace_volunteers.php?uid=<?=$user7_id?>&stream=10_3">Replace</a><? } ?></div>
																(<?=isset($_SESSION['act_mems_10_3'][$user7_id])?$_SESSION['act_mems_10_3'][$user7_id]:"0";?>)
																<br />(<?=$user7_id;?>)
															</div>
													<? }
													/*else if((isset($_SESSION['have_pay_yday_10_3'][$user7_id]) && $_SESSION['have_pay_yday_10_3'][$user7_id])){ ?>
															<div style="float: left;" class="left_img10x3 left_img10x3_4">
																<a class="acolor"  href="javascript:void(0);" onclick="addmore_volunteers_10_3(<?=$user7_id?>,<?=$_GET['cnt']?>)"><img onmouseover="mouseOver(<?=$user7_id?>);" onmouseout="mouseOut(<?=$user7_id?>);" id="img_1[<?=$user7_id?>]" src="images/sred.png" /></a><br />
																(<?=isset($_SESSION['uid103'][$user7_id])?$_SESSION['uid103'][$user7_id]:"0";?>)
																<?=$user7_name?>
																<div onmouseover="mouseOver(<?=$user7_id?>);" onmouseout="mouseOut(<?=$user7_id?>)" id="<?=$user7_id?>" style="background-color: rgba(0, 0, 0, 0.8); color:#FFFFFF; z-index:10; position: absolute; top: -16px; left: 10px; display:none"><?=$user7_nm?><br><? if(isset($_SESSION['ruid103'][$user7_id]) && $_SESSION['ruid103'][$user7_id]==1) { ?><a href="replace_volunteers.php?uid=<?=$user7_id?>&stream=10_3">Replace</a><? } ?></div>
																(<?=isset($_SESSION['act_mems_10_3'][$user7_id])?$_SESSION['act_mems_10_3'][$user7_id]:"0";?>)
																<br />(<?=$user7_id;?>)
															</div>
													<? } else if(isset($_SESSION['have_pay_5day_10_3'][$user7_id]) && $_SESSION['have_pay_5day_10_3'][$user7_id]){?>
															<div style="float: left;" class="left_img10x3 left_img10x3_4">
																<a class="acolor"  href="javascript:void(0);" onclick="addmore_volunteers_10_3(<?=$user7_id?>,<?=$_GET['cnt']?>)">
																	<img onmouseover="mouseOver(<?=$user7_id?>);" onmouseout="mouseOut(<?=$user7_id?>);" id="img_1[<?=$user7_id?>]"  src="images/dailyindicatior.png" /></a>
																<br />
																(<?=isset($_SESSION['uid103'][$user7_id])?$_SESSION['uid103'][$user7_id]:"0";?>)
																<?=$user7_nm?>
																<div onmouseover="mouseOver(<?=$user7_id?>);" onmouseout="mouseOut(<?=$user7_id?>)" id="<?=$user7_id?>" style="background-color: rgba(0, 0, 0, 0.8); color:#FFFFFF; z-index:10; position: absolute; top: -16px; left: 10px; display:none"><?=$user7_nm?><br><? if(isset($_SESSION['ruid103'][$user7_id]) && $_SESSION['ruid103'][$user7_id]==1) { ?><a href="replace_volunteers.php?uid=<?=$user7_id?>&stream=10_3">Replace</a><? } ?></div>
																(<?=isset($_SESSION['act_mems_10_3'][$user7_id])?$_SESSION['act_mems_10_3'][$user7_id]:"0";?>)
																<br />(<?=$user7_id;?>)
															</div>
													<? } else if($user7_img == "red" && $user7_img != "0" ){ ?>
															<div style="float: left;" class="left_img10x3 left_img10x3_4">
																<a class="acolor"  href="javascript:void(0);" onclick="addmore_volunteers_10_3(<?=$user7_id?>,<?=$_GET['cnt']?>)">
																	<img onmouseover="mouseOver(<?=$user7_id?>);" onmouseout="mouseOut(<?=$user7_id?>);" id="img_1[<?=$user7_id?>]"  src="images/sred.png" /></a>
																<br />
																(<?=isset($_SESSION['uid103'][$user7_id])?$_SESSION['uid103'][$user7_id]:"0";?>)
																<?=$user7_nm?>
																<div onmouseover="mouseOver(<?=$user7_id?>);" onmouseout="mouseOut(<?=$user7_id?>)" id="<?=$user7_id?>" style="background-color: rgba(0, 0, 0, 0.8); color:#FFFFFF; z-index:10; position: absolute; top: -16px; left: 10px; display:none"><?=$user7_nm?><br><? if(isset($_SESSION['ruid103'][$user7_id]) && $_SESSION['ruid103'][$user7_id]==1) { ?><a href="replace_volunteers.php?uid=<?=$user7_id?>&stream=10_3">Replace</a><? } ?></div>
																(<?=isset($_SESSION['act_mems_10_3'][$user7_id])?$_SESSION['act_mems_10_3'][$user7_id]:"0";?>)
																<br />(<?=$user7_id;?>)
															</div>
													<? }*/
													else if($user7_img == "none" && $user7_img != "0" ) { ?>
															<div style="float: left;" class="left_img10x3 left_img10x3_4"><img src="images/snone.png" /><br /><?=$user7_name?></div>
													<? } else{ ?>
															<div style="float: left;" class="left_img10x3 left_img10x3_4">
																<a class="acolor"  href="javascript:void(0);" onclick="addmore_volunteers_10_3(<?=$user7_id?>,<?=$_GET['cnt']?>)">
																	<?php echo (($user7_img>=20)?'<img id="img_1['.$user7_id.']" onmouseover="mouseOver('.$user7_id.');" onmouseout="mouseOut('.$user7_id.');" src="images/03.png" />':(($user7_img>=10)?'<img id="img_1['.$user7_id.']" onmouseover="mouseOver('.$user7_id.');" onmouseout="mouseOut('.$user7_id.');" src="images/syellow.png" />':(($user7_img>=6)?'<img id="img_1['.$user7_id.']" onmouseover="mouseOver('.$user7_id.');" onmouseout="mouseOut('.$user7_id.');" src="images/sred.png" />':(($user7_img>=5)?'<img id="img_1['.$user7_id.']" onmouseover="mouseOver('.$user7_id.');" onmouseout="mouseOut('.$user7_id.');" src="images/sgreen.png" />':(($user7_img==4)?'<img id="img_1['.$user7_id.']" onmouseover="mouseOver('.$user7_id.');" onmouseout="mouseOut('.$user7_id.');" src="images/sorange.png" />':($user7_img>=1)?'<img id="img_1['.$user7_id.']" onmouseover="mouseOver('.$user7_id.');" onmouseout="mouseOut('.$user7_id.');" src="images/spurple.png" />':'<img id="img_1['.$user7_id.']" onmouseover="mouseOver('.$user7_id.');" onmouseout="mouseOut('.$user7_id.');" src="images/sgray.png" />')))))?>
																</a>
																(<?=isset($_SESSION['uid103'][$user7_id])?$_SESSION['uid103'][$user7_id]:"0";?>)
																<?=$user7_name?>
																<div onmouseover="mouseOver(<?=$user7_id?>);" onmouseout="mouseOut(<?=$user7_id?>)" id="<?=$user7_id?>" style="background-color: rgba(0, 0, 0, 0.8); z-index:10; color:#FFFFFF; position: absolute; top: -16px; left: 10px; display:none"><?=$user7_nm?><br></div>
																(<?=isset($_SESSION['act_mems_10_3'][$user7_id])?$_SESSION['act_mems_10_3'][$user7_id]:"0";?>)
																<br>(<?=$user7_id;?>)
															</div>
													<? } ?>
													<div class="float_clear"></div>
		                                        </li>
												<li class="float_left ten_three_after_7">
													<? if($user8_note == "inactive") { ?>
														<div class="float_left right_img10x3 right_img10x3_4">
															<a class="acolor"  href="javascript:void(0);" onclick="addmore_volunteers_10_3(<?=$user8_id?>,<?=$_GET['cnt']?>)"><img id="img_1[<?=$user8_id?>]" onmouseover="mouseOver(<?=$user8_id?>);" onmouseout="mouseOut(<?=$user8_id?>);" src="images/02.png" /></a>
															<div class="username_img">
																(<?=isset($_SESSION['uid103'][$user8_id])?$_SESSION['uid103'][$user8_id]:"0";?>)
																<?=$user8_name?>
																<div onmouseover="mouseOver(<?=$user8_id?>);" onmouseout="mouseOut(<?=$user8_id?>)" id="<?=$user8_id?>" style="background-color: rgba(0, 0, 0, 0.8); color:#FFFFFF; z-index:10; position: absolute; top: -47px; left:2px; display:none"><?=$user8_nm?><br><? if(isset($_SESSION['ruid103'][$user8_id]) && $_SESSION['ruid103'][$user8_id]==1) { ?><a href="replace_volunteers.php?uid=<?=$user8_id?>&stream=10_3">Replace</a><? } ?></div>
																(<?=isset($_SESSION['act_mems_10_3'][$user8_id])?$_SESSION['act_mems_10_3'][$user8_id]:"0";?>)
																<br />(<?=$user8_id;?>)
															</div>
														</div>
													<? }
													/*else if((isset($_SESSION['have_pay_yday_10_3'][$user8_id]) && $_SESSION['have_pay_yday_10_3'][$user8_id])) { ?>
														<div class="float_left right_img10x3 right_img10x3_4">
															<a class="acolor"  href="javascript:void(0);" onclick="addmore_volunteers_10_3(<?=$user8_id?>,<?=$_GET['cnt']?>)"><img id="img_1[<?=$user8_id?>]" onmouseover="mouseOver(<?=$user8_id?>);" onmouseout="mouseOut(<?=$user8_id?>);" src="images/sred.png" /></a>
															<div class="username_img">
																(<?=isset($_SESSION['uid103'][$user8_id])?$_SESSION['uid103'][$user8_id]:"0";?>)
																<?=$user8_name?>
																<div onmouseover="mouseOver(<?=$user8_id?>);" onmouseout="mouseOut(<?=$user8_id?>)" id="<?=$user8_id?>" style="background-color: rgba(0, 0, 0, 0.8); color:#FFFFFF; z-index:10; position: absolute; top: -47px; left:2px; display:none"><?=$user8_nm?><br><? if(isset($_SESSION['ruid103'][$user8_id]) && $_SESSION['ruid103'][$user8_id]==1) { ?><a href="replace_volunteers.php?uid=<?=$user8_id?>&stream=10_3">Replace</a><? } ?></div>
																(<?=isset($_SESSION['act_mems_10_3'][$user8_id])?$_SESSION['act_mems_10_3'][$user8_id]:"0";?>)
																<br />(<?=$user8_id;?>)
															</div>
														</div>
													<? } else if(isset($_SESSION['have_pay_5day_10_3'][$user8_id]) && $_SESSION['have_pay_5day_10_3'][$user8_id]) { ?>
														<div class="float_left right_img10x3 right_img10x3_4">
															<a class="acolor"  href="javascript:void(0);" onclick="addmore_volunteers_10_3(<?=$user8_id?>,<?=$_GET['cnt']?>)"><img id="img_1[<?=$user8_id?>]" onmouseover="mouseOver(<?=$user8_id?>);" onmouseout="mouseOut(<?=$user8_id?>);" src="images/dailyindicatior.png" /></a>
															<div class="username_img">
																(<?=isset($_SESSION['uid103'][$user8_id])?$_SESSION['uid103'][$user8_id]:"0";?>)
																<?=$user8_name?>
																<div onmouseover="mouseOver(<?=$user8_id?>);" onmouseout="mouseOut(<?=$user8_id?>)" id="<?=$user8_id?>" style="background-color: rgba(0, 0, 0, 0.8); color:#FFFFFF; z-index:10; position: absolute; top: -47px; left:2px; display:none"><?=$user8_nm?><br><? if(isset($_SESSION['ruid103'][$user8_id]) && $_SESSION['ruid103'][$user8_id]==1) { ?><a href="replace_volunteers.php?uid=<?=$user8_id?>&stream=10_3">Replace</a><? } ?></div>
																(<?=isset($_SESSION['act_mems_10_3'][$user8_id])?$_SESSION['act_mems_10_3'][$user8_id]:"0";?>)
																<br />(<?=$user8_id;?>)
															</div>
														</div>
													<? } else if($user8_img == "red" && $user8_img != "0" ){ ?>
														<div class="float_left right_img10x3 right_img10x3_4">
															<a class="acolor"  href="javascript:void(0);" onclick="addmore_volunteers_10_3(<?=$user8_id?>,<?=$_GET['cnt']?>)"><img id="img_1[<?=$user8_id?>]" onmouseover="mouseOver(<?=$user8_id?>);" onmouseout="mouseOut(<?=$user8_id?>);" src="images/sred.png" /></a>
															<div class="username_img">
																(<?=isset($_SESSION['uid103'][$user8_id])?$_SESSION['uid103'][$user8_id]:"0";?>)
																<?=$user8_name?>
																<div onmouseover="mouseOver(<?=$user8_id?>);" onmouseout="mouseOut(<?=$user8_id?>)" id="<?=$user8_id?>" style="background-color: rgba(0, 0, 0, 0.8); color:#FFFFFF; z-index:10; position: absolute; top: -47px; left:2px; display:none"><?=$user8_nm?><br><? if(isset($_SESSION['ruid103'][$user8_id]) && $_SESSION['ruid103'][$user8_id]==1) { ?><a href="replace_volunteers.php?uid=<?=$user8_id?>&stream=10_3">Replace</a><? } ?></div>
																(<?=isset($_SESSION['act_mems_10_3'][$user8_id])?$_SESSION['act_mems_10_3'][$user8_id]:"0";?>)
																<br />(<?=$user8_id;?>)
															</div>
														</div>
													<? }*/
													 else if($user8_img == "none" && $user8_img != "0" ) { ?>
														<div class="float_left right_img10x3 right_img10x3_4"><img id="img_1[<?=$user8_id?>]" src="images/snone.png" /><div class="username_img"><?=$user8_name?></div></div>
													<? } else{ ?>
														<div class="float_left right_img10x3 right_img10x3_4">
															<a class="acolor"  href="javascript:void(0);" onclick="addmore_volunteers_10_3(<?=$user8_id?>,<?=$_GET['cnt']?>)">
																<?php echo (($user8_img>=20)?'<img id="img_1['.$user8_id.']" onmouseover="mouseOver('.$user8_id.');" onmouseout="mouseOut('.$user8_id.');" src="images/03.png" />':(($user8_img>=10)?'<img id="img_1['.$user8_id.']" onmouseover="mouseOver('.$user8_id.');" onmouseout="mouseOut('.$user8_id.');" src="images/syellow.png" />':(($user8_img>=6)?'<img id="img_1['.$user8_id.']" onmouseover="mouseOver('.$user8_id.');" onmouseout="mouseOut('.$user8_id.');" src="images/sred.png" />':(($user8_img>=5)?'<img id="img_1['.$user8_id.']" onmouseover="mouseOver('.$user8_id.');" onmouseout="mouseOut('.$user8_id.');" src="images/sgreen.png" />':(($user8_img==4)?'<img id="img_1['.$user8_id.']" onmouseover="mouseOver('.$user8_id.');" onmouseout="mouseOut('.$user8_id.');" src="images/sorange.png" />':($user8_img>=1)?'<img id="img_1['.$user8_id.']" onmouseover="mouseOver('.$user8_id.');" onmouseout="mouseOut('.$user8_id.');" src="images/spurple.png" />':'<img id="img_1['.$user8_id.']" onmouseover="mouseOver('.$user8_id.');" onmouseout="mouseOut('.$user8_id.');" src="images/sgray.png" />')))))?>
															</a>
															<div class="username_img">
																(<?=isset($_SESSION['uid103'][$user8_id])?$_SESSION['uid103'][$user8_id]:"0";?>)
																<?=$user8_name?>
																<div onmouseover="mouseOver(<?=$user8_id?>);" onmouseout="mouseOut(<?=$user8_id?>)" id="<?=$user8_id?>" style="background-color: rgba(0, 0, 0, 0.8); z-index:10; color:#FFFFFF; position: absolute; top: -47px; left:2px; display:none"><?=$user8_nm?><br></div>
																(<?=isset($_SESSION['act_mems_10_3'][$user8_id])?$_SESSION['act_mems_10_3'][$user8_id]:"0";?>)
																<br>(<?=$user8_id;?>)
															</div>
														</div>
													<? } ?>
													<div class="float_clear"></div>
                                            	</li>
												<li class="float_left ten_three_after_8">
													<? if($user9_note == "inactive") { ?>
														<div class="float_left right_img10x3 right_img10x3_5">
															<a class="acolor" href="javascript:void(0);" onclick="addmore_volunteers_10_3(<?=$user9_id?>,<?=$_GET['cnt']?>)"><img onmouseover="mouseOver(<?=$user9_id?>);" onmouseout="mouseOut(<?=$user9_id?>);" id="img_1[<?=$user9_id?>]" src="images/02.png" /></a>
															<div class="username_img">
																(<?=isset($_SESSION['uid103'][$user9_id])?$_SESSION['uid103'][$user9_id]:"0";?>)
																<?=$user9_name?>
																<div onmouseover="mouseOver(<?=$user9_id?>);" onmouseout="mouseOut(<?=$user9_id?>)" id="<?=$user9_id?>" style="background-color: rgba(0, 0, 0, 0.8); color:#FFFFFF; z-index:10; position: absolute; top: -46px; left: 6px; display:none"><?=$user9_nm?><br><? if(isset($_SESSION['ruid103'][$user9_id]) && $_SESSION['ruid103'][$user9_id]==1) { ?><a href="replace_volunteers.php?uid=<?=$user9_id?>&stream=10_3">Replace</a><? } ?></div>
																(<?=isset($_SESSION['act_mems_10_3'][$user9_id])?$_SESSION['act_mems_10_3'][$user9_id]:"0";?>)
																<br />(<?=$user9_id;?>)
															</div>
														</div>
													<? }
													/* else if((isset($_SESSION['have_pay_yday_10_3'][$user9_id]) && $_SESSION['have_pay_yday_10_3'][$user9_id])) { ?>
														<div class="float_left right_img10x3 right_img10x3_5">
															<a class="acolor" href="javascript:void(0);" onclick="addmore_volunteers_10_3(<?=$user9_id?>,<?=$_GET['cnt']?>)"><img onmouseover="mouseOver(<?=$user9_id?>);" onmouseout="mouseOut(<?=$user9_id?>);" id="img_1[<?=$user9_id?>]" src="images/sred.png" /></a>
															<div class="username_img">
																(<?=isset($_SESSION['uid103'][$user9_id])?$_SESSION['uid103'][$user9_id]:"0";?>)
																<?=$user9_name?>
																<div onmouseover="mouseOver(<?=$user9_id?>);" onmouseout="mouseOut(<?=$user9_id?>)" id="<?=$user9_id?>" style="background-color: rgba(0, 0, 0, 0.8); color:#FFFFFF; z-index:10; position: absolute; top: -46px; left: 6px; display:none"><?=$user9_nm?><br><? if(isset($_SESSION['ruid103'][$user9_id]) && $_SESSION['ruid103'][$user9_id]==1) { ?><a href="replace_volunteers.php?uid=<?=$user9_id?>&stream=10_3">Replace</a><? } ?></div>
																(<?=isset($_SESSION['act_mems_10_3'][$user9_id])?$_SESSION['act_mems_10_3'][$user9_id]:"0";?>)
																<br />(<?=$user9_id;?>)
															</div>
														</div>
													<? } else if(isset($_SESSION['have_pay_5day_10_3'][$user9_id]) && $_SESSION['have_pay_5day_10_3'][$user9_id]) { ?>
														<div class="float_left right_img10x3 right_img10x3_5">
															<a class="acolor" href="javascript:void(0);" onclick="addmore_volunteers_10_3(<?=$user9_id?>,<?=$_GET['cnt']?>)">
															<img onmouseover="mouseOver(<?=$user9_id?>);" onmouseout="mouseOut(<?=$user9_id?>);" id="img_1[<?=$user9_id?>]" src="images/dailyindicatior.png" /></a>
															<div class="username_img">
																(<?=isset($_SESSION['uid103'][$user9_id])?$_SESSION['uid103'][$user9_id]:"0";?>)
																<?=$user9_name?>
																<div onmouseover="mouseOver(<?=$user9_id?>);" onmouseout="mouseOut(<?=$user9_id?>)" id="<?=$user9_id?>" style="background-color: rgba(0, 0, 0, 0.8); color:#FFFFFF; z-index:10; position: absolute; top: -46px; left: 6px; display:none"><?=$user9_nm?><br><? if(isset($_SESSION['ruid103'][$user9_id]) && $_SESSION['ruid103'][$user9_id]==1) { ?><a href="replace_volunteers.php?uid=<?=$user9_id?>&stream=10_3">Replace</a><? } ?></div>
																(<?=isset($_SESSION['act_mems_10_3'][$user9_id])?$_SESSION['act_mems_10_3'][$user9_id]:"0";?>)
																<br />
																(<?=$user9_id;?>)
															</div>
														</div>
													<? } else if($user9_img == "red" && $user9_img != "0" ) { ?>
														<div class="float_left right_img10x3 right_img10x3_4">
															<a class="acolor" href="javascript:void(0);" onclick="addmore_volunteers_10_3(<?=$user9_id?>,<?=$_GET['cnt']?>)"><img onmouseover="mouseOver(<?=$user9_id?>);" onmouseout="mouseOut(<?=$user9_id?>);" id="img_1[<?=$user9_id?>]" src="images/sred.png" /></a>
															<div class="username_img">
																(<?=isset($_SESSION['uid103'][$user9_id])?$_SESSION['uid103'][$user9_id]:"0";?>)
																<?=$user9_name?>
																<div onmouseover="mouseOver(<?=$user9_id?>);" onmouseout="mouseOut(<?=$user9_id?>)" id="<?=$user9_id?>" style="background-color: rgba(0, 0, 0, 0.8); color:#FFFFFF; z-index:10; position: absolute; top: -46px; left: 6px; display:none"><?=$user9_nm?><br><? if(isset($_SESSION['ruid103'][$user9_id]) && $_SESSION['ruid103'][$user9_id]==1) { ?><a href="replace_volunteers.php?uid=<?=$user9_id?>&stream=10_3">Replace</a><? } ?></div>
																(<?=isset($_SESSION['act_mems_10_3'][$user9_id])?$_SESSION['act_mems_10_3'][$user9_id]:"0";?>)
																<br />(<?=$user9_id;?>)
															</div>
														</div>
													<? }*/
													else if($user9_img == "none" && $user9_img != "0" ) { ?>
														<div class="float_left right_img10x3 right_img10x3_5"><img id="img_1[<?=$user9_id?>]" src="images/snone.png" /><div class="username_img"><?=$user9_name?></div></div>
													<? } else { ?>
														<div class="float_left right_img10x3 right_img10x3_4">
															<a class="acolor" href="javascript:void(0);" onclick="addmore_volunteers_10_3(<?=$user9_id?>,<?=$_GET['cnt']?>)">
																<?php echo (($user9_img>=20)?'<img id="img_1['.$user9_id.']" onmouseover="mouseOver('.$user9_id.');" onmouseout="mouseOut('.$user9_id.');" src="images/03.png" />':(($user9_img>=10)?'<img id="img_1['.$user9_id.']" onmouseover="mouseOver('.$user9_id.');" onmouseout="mouseOut('.$user9_id.');" src="images/syellow.png" />':(($user9_img>=6)?'<img id="img_1['.$user9_id.']" onmouseover="mouseOver('.$user9_id.');" onmouseout="mouseOut('.$user9_id.');" src="images/sred.png" />':(($user9_img>=5)?'<img id="img_1['.$user9_id.']" onmouseover="mouseOver('.$user9_id.');" onmouseout="mouseOut('.$user9_id.');" src="images/sgreen.png" />':(($user9_img==4)?'<img id="img_1['.$user9_id.']" onmouseover="mouseOver('.$user9_id.');" onmouseout="mouseOut('.$user9_id.');" src="images/sorange.png" />':($user9_img>=1)?'<img id="img_1['.$user9_id.']" onmouseover="mouseOver('.$user9_id.');" onmouseout="mouseOut('.$user9_id.');" src="images/spurple.png" />':'<img id="img_1['.$user9_id.']" onmouseover="mouseOver('.$user9_id.');" onmouseout="mouseOut('.$user9_id.');" src="images/sgray.png" />')))))?>
															</a>
															<div class="username_img">
																(<?=isset($_SESSION['uid103'][$user9_id])?$_SESSION['uid103'][$user9_id]:"0";?>)
																<?=$user9_name?>
																<div onmouseover="mouseOver(<?=$user9_id?>);" onmouseout="mouseOut(<?=$user9_id?>)" id="<?=$user9_id?>" style="background-color: rgba(0, 0, 0, 0.8); z-index:10; position: absolute; top: -46px; left: 6px; color:#FFFFFF; display:none"><?=$user9_nm?><br></div>
																(<?=isset($_SESSION['act_mems_10_3'][$user9_id])?$_SESSION['act_mems_10_3'][$user9_id]:"0";?>)
																<br>(<?=$user9_id;?>)
															</div>
														</div>
													<? } ?>
													<div class="float_clear"></div>
	                                          	</li>
												<li class="float_left ten_three_after_6">
													<? if($user10_note == "inactive") { ?>
														<div class="float_left right_img10x3 right_img10x3_5">
															<a class="acolor"  href="javascript:void(0);" onclick="addmore_volunteers_10_3(<?=$user10_id?>,<?=$_GET['cnt']?>)"><img onmouseover="mouseOver(<?=$user10_id?>);" onmouseout="mouseOut(<?=$user10_id?>);" id="img_1[<?=$user10_id?>]" src="images/02.png" /></a><br />
															(<?=isset($_SESSION['uid103'][$user10_id])?$_SESSION['uid103'][$user10_id]:"0";?>)
															<?=$user10_name?>
															<div onmouseover="mouseOver(<?=$user10_id?>);" onmouseout="mouseOut(<?=$user10_id?>)" id="<?=$user10_id?>" style="background-color: rgba(0, 0, 0, 0.8); color:#FFFFFF; z-index:10; position: absolute; top: -15px; left: -18px; display:none"><?=$user10_nm?><br><? if(isset($_SESSION['ruid103'][$user10_id]) && $_SESSION['ruid103'][$user10_id]==1) { ?><a href="replace_volunteers.php?uid=<?=$user10_id?>&stream=10_3">Replace</a><? } ?></div>
															(<?=isset($_SESSION['act_mems_10_3'][$user10_id])?$_SESSION['act_mems_10_3'][$user10_id]:"0";?>)
															<br />(<?=$user10_id;?>)
														</div>
													<? } 
													/*else if((isset($_SESSION['have_pay_yday_10_3'][$user10_id]) && $_SESSION['have_pay_yday_10_3'][$user10_id])) { ?>
														<div class="float_left right_img10x3 right_img10x3_5">
															<a class="acolor"  href="javascript:void(0);" onclick="addmore_volunteers_10_3(<?=$user10_id?>,<?=$_GET['cnt']?>)"><img onmouseover="mouseOver(<?=$user10_id?>);" onmouseout="mouseOut(<?=$user10_id?>);" id="img_1[<?=$user10_id?>]" src="images/sred.png" /></a><br />
															(<?=isset($_SESSION['uid103'][$user10_id])?$_SESSION['uid103'][$user10_id]:"0";?>)
															<?=$user10_name?>
															<div onmouseover="mouseOver(<?=$user10_id?>);" onmouseout="mouseOut(<?=$user10_id?>)" id="<?=$user10_id?>" style="background-color: rgba(0, 0, 0, 0.8); color:#FFFFFF; z-index:10; position: absolute; top: -15px; left: -18px; display:none"><?=$user10_nm?><br><? if(isset($_SESSION['ruid103'][$user10_id]) && $_SESSION['ruid103'][$user10_id]==1) { ?><a href="replace_volunteers.php?uid=<?=$user10_id?>&stream=10_3">Replace</a><? } ?></div>
															(<?=isset($_SESSION['act_mems_10_3'][$user10_id])?$_SESSION['act_mems_10_3'][$user10_id]:"0";?>)
															<br />(<?=$user10_id;?>)
														</div>
													<? } else if(isset($_SESSION['have_pay_5day_10_3'][$user10_id]) && $_SESSION['have_pay_5day_10_3'][$user10_id]) 	{	?>
														<div class="float_left right_img10x3 right_img10x3_5">
															<a class="acolor"  href="javascript:void(0);" onclick="addmore_volunteers_10_3(<?=$user10_id?>,<?=$_GET['cnt']?>)"><img onmouseover="mouseOver(<?=$user10_id?>);" onmouseout="mouseOut(<?=$user10_id?>);" id="img_1[<?=$user10_id?>]" src="images/dailyindicatior.png" /></a><br />
															(<?=isset($_SESSION['uid103'][$user10_id])?$_SESSION['uid103'][$user10_id]:"0";?>)
															<?=$user10_name?>
															<div onmouseover="mouseOver(<?=$user10_id?>);" onmouseout="mouseOut(<?=$user10_id?>)" id="<?=$user10_id?>" style="background-color: rgba(0, 0, 0, 0.8); color:#FFFFFF; z-index:10; position: absolute; top: -15px; left: -18px; display:none"><?=$user10_nm?><br><? if(isset($_SESSION['ruid103'][$user10_id]) && $_SESSION['ruid103'][$user10_id]==1) { ?><a href="replace_volunteers.php?uid=<?=$user10_id?>&stream=10_3">Replace</a><? } ?></div>
															(<?=isset($_SESSION['act_mems_10_3'][$user10_id])?$_SESSION['act_mems_10_3'][$user10_id]:"0";?>)
															<br />(<?=$user10_id;?>)
														</div>
													<? } else if($user10_img == "red" && $user10_img != "0" ) { ?>
														<div class="float_left right_img10x3 right_img10x3_5">
															<a class="acolor"  href="javascript:void(0);" onclick="addmore_volunteers_10_3(<?=$user10_id?>,<?=$_GET['cnt']?>)"><img id="img_1[<?=$user10_id?>]" src="images/sred.png" /></a>
															<br />
															(<?=isset($_SESSION['uid103'][$user10_id])?$_SESSION['uid103'][$user10_id]:"0";?>)
															<?=$user10_name?>
															<div onmouseover="mouseOver(<?=$user10_id?>);" onmouseout="mouseOut(<?=$user10_id?>)" id="<?=$user10_id?>" style="background-color: rgba(0, 0, 0, 0.8); color:#FFFFFF; z-index:10; position: absolute; top: -15px; left: -18px; display:none">
															<?=$user10_nm?><br><? if(isset($_SESSION['ruid103'][$user10_id]) && $_SESSION['ruid103'][$user10_id]==1) { ?><a href="replace_volunteers.php?uid=<?=$user10_id?>&stream=10_3">Replace</a><? } ?>
															(<?=isset($_SESSION['act_mems_10_3'][$user10_id])?$_SESSION['act_mems_10_3'][$user10_id]:"0";?>)<br />(<?=$user10_id;?>)
															</div>
														</div>
													<? }*/
													 else if($user10_img == "none" && $user10_img != "0" ) 	{ ?>
														<div class="float_left right_img10x3 right_img10x3_5"><img src="images/snone.png" /><br /><?=$user10_name?></div>
													<? } else { ?>
	                                                    <div class="float_left right_img10x3 right_img10x3_5">
															<a class="acolor"   href="javascript:void(0);" onclick="addmore_volunteers_10_3(<?=$user10_id?>,<?=$_GET['cnt']?>)">
																<?php echo (($user10_img>=20)?'<img id="img_1['.$user10_id.']" onmouseover="mouseOver('.$user10_id.');" onmouseout="mouseOut('.$user10_id.');" src="images/03.png" />':(($user10_img>=10)?'<img id="img_1['.$user10_id.']" onmouseover="mouseOver('.$user10_id.');" onmouseout="mouseOut('.$user10_id.');" src="images/syellow.png" />':(($user10_img>=6)?'<img id="img_1['.$user10_id.']" onmouseover="mouseOver('.$user10_id.');" onmouseout="mouseOut('.$user10_id.');" src="images/sred.png" />':(($user10_img>=5)?'<img id="img_1['.$user10_id.']" onmouseover="mouseOver('.$user10_id.');" onmouseout="mouseOut('.$user10_id.');" src="images/sgreen.png" />':(($user10_img==4)?'<img id="img_1['.$user10_id.']" onmouseover="mouseOver('.$user10_id.');" onmouseout="mouseOut('.$user10_id.');" src="images/sorange.png" />':($user10_img>=1)?'<img id="img_1['.$user10_id.']" onmouseover="mouseOver('.$user10_id.');" onmouseout="mouseOut('.$user10_id.');" src="images/spurple.png" />':'<img id="img_1['.$user10_id.']" onmouseover="mouseOver('.$user10_id.');" onmouseout="mouseOut('.$user9_id.');" src="images/sgray.png" />')))))?>
															</a>
															<br />
															(<?=isset($_SESSION['uid103'][$user10_id])?$_SESSION['uid103'][$user10_id]:"0";?>)
															<?=$user10_name?>
															<div onmouseover="mouseOver(<?=$user10_id?>);" onmouseout="mouseOut(<?=$user10_id?>)" id="<?=$user10_id?>" style="background-color: rgba(0, 0, 0, 0.8); color:#FFFFFF; z-index:10; position: absolute; top: -15px; left: -18px; display:none"><?=$user10_nm?><br></div>
															(<?=isset($_SESSION['act_mems_10_3'][$user10_id])?$_SESSION['act_mems_10_3'][$user10_id]:"0";?>)
															<br>(<?=$user10_id;?>)
														</div>
													<? } ?>
													<div class="float_clear"></div>
	                                          	</li>
                                        </ul>
                                    	</li>
										<div class="clearboth" id="next_volunteers[<?=$_GET['cnt']?>]"></div>
									    <input type="hidden" value="<?=$_GET['cnt']?>" id="next_volunteers_cnt" name="next_volunteers_cnt" />
<?

	function checkuseractivemembers_10_3($user_ids)
	{
		global $form;
		$sql = "select count(*) as tot_member_act from userdetail u ,m_payment_fee_10_3 mf where u.inviter= '".$user_ids."' and u.UserId = mf.usertb_id";
		$rcd = $form->getRow($sql);
		$_SESSION['act_mems_10_3'][$user_ids] = isset($rcd['tot_member_act'])?$rcd['tot_member_act']:0;
	}

	function checkuserreplacelink_10_3($user_ids)
	{
		global $form;
		$sql = "select UserId from userdetail where active = 1 and inviter_10_3='".$user_ids."'";
		$rows = $form->getArray($sql);
		$rcd = sizeof($rows);
		//$uid = array();
		$firstuser = array();
		if($rcd != 0)
		{
			for($i=0;$i<sizeof($rows);$i++)
			{
				$sql = "select payment_done from m_payment_fee_10_3 where usertb_id = '".$rows[$i]['UserId']."'";
				$row2 = $form->getRow($sql);
				if($row2['payment_done'] == 'YES')
				{
					$_SESSION['ruid103'][$user_ids] = 0;
					return;
				}
				else
				{
					$sql = "select ud.UserId,mf.usertb_id from userdetail ud,m_payment_fee_10_3 mf where ud.UserId = mf.usertb_id and ud.inviter_10_3 = '".$rows[$i]['UserId']."' and mf.payment_done = 'YES'";
					$tm = $form->getRow($sql);
					$num = sizeof($tm);
					if($num > 0)
					{
						$_SESSION['ruid103'][$user_ids] = 0;
					}
					else
					{
						$_SESSION['ruid103'][$user_ids] = 1;
					}
				}
			}
		}
		else
		{
			$_SESSION['ruid103'][$user_ids] = 1;
		}
		//$_SESSION['ruid'] = $thirduser;
	}
?>