	<?
//	require_once("link_replace_5_3.php");
			$userids = (isset($_GET['user_id'])?$_GET['user_id']:(isset($_SESSION['admin']['userid'])?$_SESSION['admin']['userid']:0));
			//$userid = "3894";
			$qry = "select * from userdetail where UserId = '".$userids."' and active =1";
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
			
			$user1you_note = "";
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
			$arr_5_3 = array();

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
						
								<?
									$top_name = $row['FirstName'];//."&nbsp;".$row['LastName'];
									$top_nm = $row['FirstName']."&nbsp;".$row['LastName'];
									
									$sql = "select count(*) as tot from userdetail where inviter_5_3 = '".$userids."' and Placement = '' ";
									$rows = $form->getRow($sql);
									checkuseractivemembers_5_3($userids);
									
									$arr_5_3[$userids] = $num = $rows[0];
									//checkuserreplacelink_5_3($userids);
					
									$qry = "select payment_done from m_payment_fee_5_3 where usertb_id = '".$userids."'";
									$var_user_pay = $form->getRow($qry);
									$user1you_note = "";
									if(sizeof($var_user_pay)>0)
									{
										if($var_user_pay['payment_done'] == "NO")
										{
											$you = "red";
											$user1you_note = "Daily payment is not paid in time.";
										}
										else
										{
											$qry = "select count(*) as tot from userdetail where inviter_5_3 = '".$userids."' and active =1 and entry_5_3='prepaid' and Placement = '' ";
											$tm = $form->getRow($qry);
											$you = $num = $tm[0];
										}
									}
									else
									{
										$user1you_note = "inactive";
									}
						$qry = "select * from nodetree_5_3 where usertb_id = '".$userids."'";
						$row = $form->getRow($qry);
						$msg = "";
						if(sizeof($row)>0)
						{
							//$qry = "select CONCAT(FirstName,'&nbsp;&nbsp;',LastName) as Name from userdetail where userid = '".$row['u1']."'";
							$sql = "select count(*) as tot from userdetail where inviter_5_3 = '".$row['u1']."' and Placement = '' ";
							$rows = $form->getRow($sql);
							$arr_5_3[$row['u1']] = $num = $rows[0];
							
							checkuserreplacelink_5_3($row['u1']);
							checkuseractivemembers_5_3($row['u1']);
			
							$qry = "select FirstName as Name from userdetail where userid = '".$row['u1']."'";
							$user1 = $form->getRow($qry);
									if($row['u1'] != "0")
									{
										$user1_note = "";
										$qry = "select * from userdetail where UserId = '".$row['u1']."' and Placement = ''";
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
												$qry = "select count(*) as tot from userdetail where inviter_5_3 = '".$row['u1']."' and active =1 and entry_5_3='prepaid' and Placement = '' ";
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
							$sql = "select count(*) as tot from userdetail where inviter_5_3 = '".$row['u2']."' and Placement = ''";
							$rows = $form->getRow($sql);
							$arr_5_3[$row['u2']] = $num = $rows[0];
							
							checkuserreplacelink_5_3($row['u2']);
							checkuseractivemembers_5_3($row['u2']);

							$qry = "select FirstName as Name from userdetail where userid = '".$row['u2']."'";
							$user2 = $form->getRow($qry);
									if($row['u2'] != "0")
									{
										$user2_note = "";
										$qry = "select * from userdetail where UserId = '".$row['u2']."' and Placement = ''";
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
												$qry = "select count(*) as tot from userdetail where inviter_5_3 = '".$row['u2']."' and active =1 and entry_5_3='prepaid'  and Placement = ''";
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
							$rows = $form->getRow($sql);
							$arr_5_3[$row['u3']] = $num = $rows[0];
							
							checkuserreplacelink_5_3($row['u3']);
							checkuseractivemembers_5_3($row['u3']);

							$qry = "select FirstName as Name from userdetail where userid = '".$row['u3']."'";
							$user3 = $form->getRow($qry);
				
									if($row['u3'] != "0")
									{
										$user3_note = "";
										$qry = "select * from userdetail where UserId = '".$row['u3']."' and Placement = ''";
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
												$qry = "select count(*) as tot from userdetail where inviter_5_3 = '".$row['u3']."' and active =1 and entry_5_3='prepaid'  and Placement = ''";
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
							$rows = $form->getRow($sql);
							$arr_5_3[$row['u4']] = $num = $rows[0];
							
							checkuserreplacelink_5_3($row['u4']);
							checkuseractivemembers_5_3($row['u4']);

							$qry = "select FirstName as Name from userdetail where userid = '".$row['u4']."'";
							$user4 = $form->getRow($qry);
							
									if($row['u4'] != "0")
									{
			
										$user4_note = "";
										$qry = "select * from userdetail where UserId = '".$row['u4']."' and Placement = ''";
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
												$qry = "select count(*) as tot from userdetail where inviter_5_3 = '".$row['u4']."' and active =1 and entry_5_3='prepaid'  and Placement = ''";
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
							$sql = "select count(*) as tot from userdetail where inviter_5_3 = '".$row['u5']."' and Placement = ''";
							$rows = $form->getRow($sql);
							$arr_5_3[$row['u5']] = $num = $rows[0];
							
							checkuserreplacelink_5_3($row['u5']);
							checkuseractivemembers_5_3($row['u5']);

							$qry = "select FirstName as Name from userdetail where userid = '".$row['u5']."'";
							$user5 = $form->getRow($qry);
							
									if($row['u5'] != "0")
									{
										$user5_note = "";
										$qry = "select * from userdetail where UserId = '".$row['u5']."' and Placement = ''";
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
												$qry = "select count(*) as tot from userdetail where inviter_5_3 = '".$row['u5']."' and active =1 and entry_5_3='prepaid' and Placement = '' ";
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
$_SESSION['uid53'] = $arr_5_3;
 $len = strlen($top_name); $tot=$len*10;  $widths=$tot."px"; 
			?>
<section id="content ">  
                	<div class="padding_30">
						<div class="first_welcome main">
                        	<div class="float_left font_14 color_green margin_right"><a class="acolor" href="index.php?file=volunteers" >Matricies</a></div>
							<div class="float_left font_14 color_green margin_right"><a class="link1" href="index.php?file=volunteers&marics=33" >3x3</a></div>
							<div class="float_left font_14 color_green margin_right"><a class="link1" href="index.php?file=volunteers&marics=53" >5x3</a></div>
							<div class="float_left font_14 color_green margin_right"><a class="link1" href="index.php?file=volunteers&marics=103" >10x3</a></div>
                        </div>
						<div class="container_mlm main">
							<div  class="float_right">
								<fieldset class="fieldsetsmall"><legend>Legend</legend>
                                	<p>
										<img src="images/sgray.png" title="No members" width="16" height="16"> 0 People<br>
										<img src="images/spurple.png" title="1 Member" width="16" height="16"> 1 Person<br>
										<img src="images/sorange.png" title="4 Member" width="16" height="16"> 4 People<br>
										<img src="images/sgreen.png" title="5 Member" width="16" height="16"> 5+ People<br>
										<img src="images/sred.png" title="6+ Member" width="16" height="16"> 6+ People<br>
										<img src="images/syellow.png" title="10+ Member" width="16" height="16"> 10+ People<br>
										<img src="images/03.png" title="20+ Member" width="16" height="16"> 20+ People<br>
										<!--<img src="images/03.png" title="5 Member" width="16" height="16"> Active in 10x3<br>-->
										<!--<img src="images/sred.png" title="No Member referrals" width="16" height="16"> Didn't pay yesterday.<br>
										<img src="images/dailyindicatior.png" title="No Member referrals" width="16" height="16"> Hasn't paid within the last 5 days.<br>-->
										<img src="images/snone.png" title="Vacant position" width="16" height="16"> Vacancy<br>
                                    </p>
                                </fieldset>

							</div>
                        	<div class="structure_5_3 float_left">
                            	<ul class="first_person_5_3">
								<? if($user1you_note == "inactive") { ?>
										<li class="person_one_5_3">
											<img onmouseover="mouseOver(<?=$userids?>);" onmouseout="mouseOut(<?=$userids?>);" src="images/02.png" />
											<br />
											(<?=isset($_SESSION['uid53'][$userids])?$_SESSION['uid53'][$userids]:"0";?>)
											<?=$top_name?>
											<div onmouseout="mouseOut(<?=$userids?>)" id="<?=$userids?>" style="background-color: rgba(0, 0, 0, 0.8); color:#FFFFFF; z-index:10; position: absolute; top: 440px; left: 548px; display:none; width:<?=$widths?>;; width:<?=$widths?>;"><?=$top_nm?><br></div>
											(<?=isset($_SESSION['act_mems_5_3'][$userids])?$_SESSION['act_mems_5_3'][$userids]:"0";?>)
											<br />
											(<?=$userids;?>)
										</li>
								<? }/*
								 else if(isset($_SESSION['have_pay_yday_5_3'][$userids]) && $_SESSION['have_pay_yday_5_3'][$userids]) { ?>
										<li class="person_one_5_3">
											<img onmouseover="mouseOver(<?=$userids?>);" onmouseout="mouseOut(<?=$userids?>);" src="images/sred.png" />
											<br />
											(<?=isset($_SESSION['uid53'][$userids])?$_SESSION['uid53'][$userids]:"0";?>)
											<?=$top_name?>
											<div onmouseout="mouseOut(<?=$userids?>)" id="<?=$userids?>" style="background-color: rgba(0, 0, 0, 0.8); color:#FFFFFF; z-index:10; position: absolute; top: 440px; left: 548px; display:none; width:<?=$widths?>;"><?=$top_nm?><br></div>
											(<?=isset($_SESSION['act_mems_5_3'][$userids])?$_SESSION['act_mems_5_3'][$userids]:"0";?>)
											<br />(<?=$userids;?>)
										</li>
								<? } else if(isset($_SESSION['have_pay_5day_5_3'][$userids]) && $_SESSION['have_pay_5day_5_3'][$userids]) { ?>
										<li class="person_one_5_3">
											<img onmouseover="mouseOver(<?=$userids?>);" onmouseout="mouseOut(<?=$userids?>);" src="images/dailyindicatior.png" />
											<br />
											(<?=isset($_SESSION['uid53'][$userids])?$_SESSION['uid53'][$userids]:"0";?>)
											<?=$top_name?>
											<div onmouseout="mouseOut(<?=$userids?>)" id="<?=$userids?>" style="background-color: rgba(0, 0, 0, 0.8); color:#FFFFFF; z-index:10; position: absolute; top: 440px; left: 548px; display:none; width:<?=$widths?>;"><?=$top_nm?><br></div>
											(<?=isset($_SESSION['act_mems_5_3'][$userids])?$_SESSION['act_mems_5_3'][$userids]:"0";?>)
											<br />(<?=$userids;?>)
										</li>
								<? } else if($you == "red" && $you != "0"){  ?>
										<li class="person_one_5_3">
											<img onmouseover="mouseOver(<?=$userids?>);" onmouseout="mouseOut(<?=$userids?>);" src="images/sred.png" /><br />
											(<?=isset($_SESSION['uid53'][$userids])?$_SESSION['uid53'][$userids]:"0";?>)
											<?=$top_name?>
											<div onmouseout="mouseOut(<?=$userids?>)" id="<?=$userids?>" style="background-color: rgba(0, 0, 0, 0.8); color:#FFFFFF; z-index:10; position: absolute; top: 440px; left: 548px; display:none; width:<?=$widths?>;"><?=$top_nm?><br></div>
											(<?=isset($_SESSION['act_mems_5_3'][$userids])?$_SESSION['act_mems_5_3'][$userids]:"0";?>)
											<br />(<?=$userids;?>)
										</li>
								<? }*/
								 else if($you == "none" && $you != "0"){ ?>
										<li class="person_one_5_3"><img src="images/snone.png" /><br /><?=$top_name?></li>
								<? } else { ?>
                                		<li class="person_one_5_3">
											<? 
												echo (($you>=20)?'<img onmouseover="mouseOver('.$userids.');" onmouseout="mouseOut('.$userids.');" src="images/03.png" />':(($you>=10)?'<img onmouseover="mouseOver('.$userids.');" onmouseout="mouseOut('.$userids.');" src="images/syellow.png" />':(($you>=6)?'<img onmouseover="mouseOver('.$userids.');" onmouseout="mouseOut('.$userids.');" src="images/sred.png" />':(($you>=5)?'<img onmouseover="mouseOver('.$userids.');" onmouseout="mouseOut('.$userids.');" src="images/sgreen.png" />':(($you==4)?'<img onmouseover="mouseOver('.$userids.');" onmouseout="mouseOut('.$userids.');" src="images/sorange.png" />':($you>=1)?'<img onmouseover="mouseOver('.$userids.');" onmouseout="mouseOut('.$userids.');" src="images/spurple.png" />':'<img onmouseover="mouseOver('.$userids.');" onmouseout="mouseOut('.$userids.');" src="images/sgray.png" />')))));?>
												<br />
												(<?=isset($_SESSION['uid53'][$userids])?$_SESSION['uid53'][$userids]:"0";?>)
												<?=$top_name?>
												<div onmouseout="mouseOut(<?=$userids?>)" id="<?=$userids?>" style="background-color: rgba(0, 0, 0, 0.8); color:#FFFFFF; z-index:10; position: absolute; top: 440px; left: 548px; display:none; width:<?=$widths?>;"><?=$top_nm?><br></div>
												(<?=isset($_SESSION['act_mems_5_3'][$userids])?$_SESSION['act_mems_5_3'][$userids]:"0";?>)
												<br />(<?=$userids;?>)
										</li>
								<? } ?>
										<li>
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
														<div class="float_left left_img5X3">
															<a class="acolor"  href="javascript:void(0);" onclick="addmore_volunteers_5_3(<?=$user1_id?>,1)"><img id="img_1[<?=$user1_id?>]" onmouseover="mouseOver(<?=$user1_id?>);" onmouseout="mouseOut(<?=$user1_id?>);" src="images/02.png" /></a>
															<div class="username_img">
																(<?=isset($_SESSION['uid53'][$user1_id])?$_SESSION['uid53'][$user1_id]:"0";?>)
																<?=$user1_name?>
																<div onmouseover="mouseOver(<?=$user1_id?>);" onmouseout="mouseOut(<?=$user1_id?>)" id="<?=$user1_id?>" style="background-color: rgba(0, 0, 0, 0.8); color:#FFFFFF; z-index:10; position: absolute; top: -47px; left: -22px; display:none; width:<?=$widths?>;"><?=$user1_nm?><br><? if(isset($_SESSION['ruid53'][$user1_id]) && $_SESSION['ruid53'][$user1_id]==1) { ?><a href="index.php?file=replace_volunteers&uid=<?=$user1_id?>&stream=5_3">Replace</a><? } ?></div>
																(<?=isset($_SESSION['act_mems_5_3'][$user1_id])?$_SESSION['act_mems_5_3'][$user1_id]:"0";?>)
																<br />(<?=$user1_id;?>)
															</div>
														</div>
													<? }/* else if((isset($_SESSION['have_pay_yday_5_3'][$user1_id]) && $_SESSION['have_pay_yday_5_3'][$user1_id])) { ?>
														<div class="float_left left_img5X3">
															<a class="acolor"  href="javascript:void(0);" onclick="addmore_volunteers_5_3(<?=$user1_id?>,1)"><img id="img_1[<?=$user1_id?>]" onmouseover="mouseOver(<?=$user1_id?>);" onmouseout="mouseOut(<?=$user1_id?>);" src="images/sred.png" /></a>
															<div class="username_img">
																(<?=isset($_SESSION['uid53'][$user1_id])?$_SESSION['uid53'][$user1_id]:"0";?>)
																<?=$user1_name?>
																<div onmouseover="mouseOver(<?=$user1_id?>);" onmouseout="mouseOut(<?=$user1_id?>)" id="<?=$user1_id?>" style="background-color: rgba(0, 0, 0, 0.8); color:#FFFFFF; z-index:10; position: absolute; top: -47px; left: -22px; display:none; width:<?=$widths?>;"><?=$user1_nm?><br><? if(isset($_SESSION['ruid53'][$user1_id]) && $_SESSION['ruid53'][$user1_id]==1) { ?><a href="index.php?file=replace_volunteers&uid=<?=$user1_id?>&stream=5_3">Replace</a><? } ?></div>
																(<?=isset($_SESSION['act_mems_5_3'][$user1_id])?$_SESSION['act_mems_5_3'][$user1_id]:"0";?>)
																<br />(<?=$user1_id;?>)
															</div>
														</div>
													<? } else if(isset($_SESSION['have_pay_5day_5_3'][$user1_id]) && $_SESSION['have_pay_5day_5_3'][$user1_id]){ ?>
														<div class="float_left left_img5X3">
															<a class="acolor"  href="javascript:void(0);" onclick="addmore_volunteers_5_3(<?=$user1_id?>,1)"><img id="img_1[<?=$user1_id?>]" onmouseover="mouseOver(<?=$user1_id?>);" onmouseout="mouseOut(<?=$user1_id?>);" src="images/dailyindicatior.png" /></a>
															<div class="username_img">
																(<?=isset($_SESSION['uid53'][$user1_id])?$_SESSION['uid53'][$user1_id]:"0";?>)
																<?=$user1_name?>
																<div onmouseover="mouseOver(<?=$user1_id?>);" onmouseout="mouseOut(<?=$user1_id?>)" id="<?=$user1_id?>" style="background-color: rgba(0, 0, 0, 0.8); color:#FFFFFF; z-index:10; position: absolute; top: -47px; left: -22px; display:none; width:<?=$widths?>;"><?=$user1_nm?><br><? if(isset($_SESSION['ruid53'][$user1_id]) && $_SESSION['ruid53'][$user1_id]==1) { ?><a href="index.php?file=replace_volunteers&uid=<?=$user1_id?>&stream=5_3">Replace</a><? } ?></div>
																(<?=isset($_SESSION['act_mems_5_3'][$user1_id])?$_SESSION['act_mems_5_3'][$user1_id]:"0";?>)
																<br />(<?=$user1_id;?>)
															</div>
														</div>
													<? }else if($user1_img == "red" && $user1_img != "0"){ ?>
														<div class="float_left left_img5X3">
															<a class="acolor"  href="javascript:void(0);" onclick="addmore_volunteers_5_3(<?=$user1_id?>,1)"><img id="img_1[<?=$user1_id?>]" onmouseover="mouseOver(<?=$user1_id?>);" onmouseout="mouseOut(<?=$user1_id?>);" src="images/sred.png" /></a>
															<div class="username_img">
																(<?=isset($_SESSION['uid53'][$user1_id])?$_SESSION['uid53'][$user1_id]:"0";?>)
																<?=$user1_name?>
																<div onmouseover="mouseOver(<?=$user1_id?>);" onmouseout="mouseOut(<?=$user1_id?>)" id="<?=$user1_id?>" style="background-color: rgba(0, 0, 0, 0.8); color:#FFFFFF; z-index:10; position: absolute; top: -47px; left: -22px; display:none; width:<?=$widths?>;"><?=$user1_nm?><br><? if(isset($_SESSION['ruid53'][$user1_id]) && $_SESSION['ruid53'][$user1_id]==1) { ?><a href="index.php?file=replace_volunteers&uid=<?=$user1_id?>&stream=5_3">Replace</a><? } ?></div>
																(<?=isset($_SESSION['act_mems_5_3'][$user1_id])?$_SESSION['act_mems_5_3'][$user1_id]:"0";?>)
																<br />(<?=$user1_id;?>)
															</div>
														</div>
													<? }*/
													else if($user1_img == "none" && $user1_img != "0") {?>
														<div class="float_left left_img5X3"><img src="images/snone.png" /><div class="username_img"><?=$user1_name?></div></div>
													<? } else{ ?>
														<div class="float_left left_img5X3">
															<a class="acolor"  href="javascript:void(0);" onclick="addmore_volunteers_5_3(<?=$user1_id?>,1)">
																<?php echo (($user1_img>=20)?'<img id="img_1['.$user1_id.']"  onmouseover="mouseOver('.$user1_id.');" onmouseout="mouseOut('.$user1_id.');" src="images/03.png" />':(($user1_img>=10)?'<img id="img_1['.$user1_id.']" onmouseover="mouseOver('.$user1_id.');" onmouseout="mouseOut('.$user1_id.');" src="images/syellow.png" />':(($user1_img>=6)?'<img id="img_1['.$user1_id.']" onmouseover="mouseOver('.$user1_id.');" onmouseout="mouseOut('.$user1_id.');" src="images/sred.png" />':(($user1_img>=5)?'<img id="img_1['.$user1_id.']" onmouseover="mouseOver('.$user1_id.');" onmouseout="mouseOut('.$user1_id.');" src="images/sgreen.png" />':(($user1_img==4)?'<img id="img_1['.$user1_id.']" onmouseover="mouseOver('.$user1_id.');" onmouseout="mouseOut('.$user1_id.');" src="images/sorange.png" />':($user1_img>=1)?'<img id="img_1['.$user1_id.']" onmouseover="mouseOver('.$user1_id.');" onmouseout="mouseOut('.$user1_id.');" src="images/spurple.png" />':'<img id="img_1['.$user1_id.']" onmouseover="mouseOver('.$user1_id.');" onmouseout="mouseOut('.$user1_id.');" src="images/sgray.png" />')))))?>
															</a>
															<div class="username_img">
																(<?=isset($_SESSION['uid53'][$user1_id])?$_SESSION['uid53'][$user1_id]:"0";?>)
																<?=$user1_name?>
																<div onmouseover="mouseOver(<?=$user1_id?>);" onmouseout="mouseOut(<?=$user1_id?>)" id="<?=$user1_id?>" style="background-color: rgba(0, 0, 0, 0.8); color:#FFFFFF; z-index:10; position: absolute; top: -47px; left: -22px; display:none; width:<?=$widths?>;"><?=$user1_nm?><br></div>
																(<?=isset($_SESSION['act_mems_5_3'][$user1_id])?$_SESSION['act_mems_5_3'][$user1_id]:"0";?>)<br>
																(<?=$user1_id;?>)
															</div>
														</div>
													<? } ?>
														<div class="float_clear"></div>
	                                            </li>
		                                        <li class="float_left five_three">
													<? /*echo  $user2_name;*/ if($user2_note == "inactive"){ ?>
														<div style="float: left;" class="left_img5X3_0">
															<a class="acolor"  href="javascript:void(0);" onclick="addmore_volunteers_5_3(<?=$user2_id?>,1)"><img onmouseover="mouseOver(<?=$user2_id?>);" onmouseout="mouseOut(<?=$user2_id?>);" id="img_1[<?=$user2_id?>]" src="images/02.png" /></a>
															<br />
															(<?=isset($_SESSION['uid53'][$user2_id])?$_SESSION['uid53'][$user2_id]:"0";?>)
															<?=$user2_name?>
															<div onmouseover="mouseOver(<?=$user2_id?>);" onmouseout="mouseOut(<?=$user2_id?>)" id="<?=$user2_id?>"  style="background-color: rgba(0, 0, 0, 0.8); color:#FFFFFF; z-index:10; position: absolute; top: -12px; left: 14px; display:none; width:<?=$widths?>;"><?=$user2_nm?><br><? if(isset($_SESSION['ruid53'][$user2_id]) && $_SESSION['ruid53'][$user2_id]==1) { ?><a href="index.php?file=replace_volunteers&uid=<?=$user2_id?>&stream=5_3">Replace</a><? } ?></div>
															(<?=isset($_SESSION['act_mems_5_3'][$user2_id])?$_SESSION['act_mems_5_3'][$user2_id]:"0";?>)
															<br />(<?=$user2_id;?>)
														</div>
													<? }
													/*else if((isset($_SESSION['have_pay_yday_5_3'][$user2_id]) && $_SESSION['have_pay_yday_5_3'][$user2_id])){ ?>
														<div style="float: left;" class="left_img5X3_0">
															<a class="acolor"  href="javascript:void(0);" onclick="addmore_volunteers_5_3(<?=$user2_id?>,1)"><img onmouseover="mouseOver(<?=$user2_id?>);" onmouseout="mouseOut(<?=$user2_id?>);" id="img_1[<?=$user2_id?>]" src="images/sred.png" /></a>
															<br />
															(<?=isset($_SESSION['uid53'][$user2_id])?$_SESSION['uid53'][$user2_id]:"0";?>)
															<?=$user2_name?>
															<div onmouseover="mouseOver(<?=$user2_id?>);" onmouseout="mouseOut(<?=$user2_id?>)" id="<?=$user2_id?>"  style="background-color: rgba(0, 0, 0, 0.8); color:#FFFFFF; z-index:10; position: absolute; top: -12px; left: 14px; display:none; width:<?=$widths?>;"><?=$user2_nm?><br><? if(isset($_SESSION['ruid53'][$user2_id]) && $_SESSION['ruid53'][$user2_id]==1) { ?><a href="index.php?file=replace_volunteers&uid=<?=$user2_id?>&stream=5_3">Replace</a><? } ?></div>
															(<?=isset($_SESSION['act_mems_5_3'][$user2_id])?$_SESSION['act_mems_5_3'][$user2_id]:"0";?>)
															<br />(<?=$user2_id;?>)
														</div>
													<? }else if(isset($_SESSION['have_pay_5day_5_3'][$user2_id]) && $_SESSION['have_pay_5day_5_3'][$user2_id]){ ?>
														<div style="float: left;" class="left_img5X3_0">
															<a class="acolor"  href="javascript:void(0);" onclick="addmore_volunteers_5_3(<?=$user2_id?>,1)">
															<img id="img_1[<?=$user2_id?>]" onmouseover="mouseOver(<?=$user2_id?>);" onmouseout="mouseOut(<?=$user2_id?>);" src="images/dailyindicatior.png" /></a>
															<br />
															(<?=isset($_SESSION['uid53'][$user2_id])?$_SESSION['uid53'][$user2_id]:"0";?>)
															<?=$user2_nm?>
															<div onmouseover="mouseOver(<?=$user2_id?>);" onmouseout="mouseOut(<?=$user2_id?>)" id="<?=$user2_id?>" style="background-color: rgba(0, 0, 0, 0.8); color:#FFFFFF; z-index:10; position: absolute; top: -12px; left: 14px; display:none; width:<?=$widths?>;"><?=$user2_nm?><br><? if(isset($_SESSION['ruid53'][$user2_id]) && $_SESSION['ruid53'][$user2_id]==1) { ?><a href="index.php?file=replace_volunteers&uid=<?=$user2_id?>&stream=5_3">Replace</a><? } ?></div>
															(<?=isset($_SESSION['act_mems_5_3'][$user2_id])?$_SESSION['act_mems_5_3'][$user2_id]:"0";?>)
															<br />
															(<?=$user2_id;?>)
														</div>
													<? }else if($user2_img == "red" && $user2_img != "0" ){ ?>
														<div style="float: left;" class="left_img5X3_0">
															<a class="acolor"  href="javascript:void(0);" onclick="addmore_volunteers_5_3(<?=$user2_id?>,1)"><img id="img_1[<?=$user2_id?>]" onmouseover="mouseOver(<?=$user2_id?>);" onmouseout="mouseOut(<?=$user2_id?>);" src="images/sred.png" /></a><br />
															(<?=isset($_SESSION['uid53'][$user2_id])?$_SESSION['uid53'][$user2_id]:"0";?>)
															<?=$user2_nm?>
															<div onmouseover="mouseOver(<?=$user2_id?>);" onmouseout="mouseOut(<?=$user2_id?>)" id="<?=$user2_id?>" style="background-color: rgba(0, 0, 0, 0.8); color:#FFFFFF; z-index:10; position: absolute; top: -12px; left: 14px; display:none; width:<?=$widths?>;"><?=$user2_nm?><br><? if(isset($_SESSION['ruid53'][$user2_id]) && $_SESSION['ruid53'][$user2_id]==1) { ?><a href="index.php?file=replace_volunteers&uid=<?=$user2_id?>&stream=5_3">Replace</a><? } ?></div>
															(<?=isset($_SESSION['act_mems_5_3'][$user2_id])?$_SESSION['act_mems_5_3'][$user2_id]:"0";?>)
															<br />(<?=$user2_id;?>)
														</div>
													<? }*/
													else if($user2_img == "none" && $user2_img != "0" ){ ?>
														<div style="float: left;" class="left_img5X3_0"><img src="images/snone.png" /><br /><?=$user2_name?></div>
													<? }else{ ?>
                                          				<div style="float: left;" class="left_img5X3_0">
															<a class="acolor"  href="javascript:void(0);" onclick="addmore_volunteers_5_3(<?=$user2_id?>,1)">
																<?php echo (($user2_img>=20)?'<img id="img_1['.$user2_id.']" onmouseover="mouseOver('.$user2_id.');" onmouseout="mouseOut('.$user2_id.');" src="images/03.png" />':(($user2_img>=10)?'<img id="img_1['.$user2_id.']" onmouseover="mouseOver('.$user2_id.');" onmouseout="mouseOut('.$user2_id.');" src="images/syellow.png" />':(($user2_img>=6)?'<img id="img_1['.$user2_id.']" onmouseover="mouseOver('.$user2_id.');" onmouseout="mouseOut('.$user2_id.');" src="images/sred.png" />':(($user2_img>=5)?'<img id="img_1['.$user2_id.']" onmouseover="mouseOver('.$user2_id.');" onmouseout="mouseOut('.$user2_id.');" src="images/sgreen.png" />':(($user2_img==4)?'<img id="img_1['.$user2_id.']" onmouseover="mouseOver('.$user2_id.');" onmouseout="mouseOut('.$user2_id.');" src="images/sorange.png" />':($user2_img>=1)?'<img id="img_1['.$user2_id.']" onmouseover="mouseOver('.$user2_id.');" onmouseout="mouseOut('.$user2_id.');" src="images/spurple.png" />':'<img id="img_1['.$user2_id.']" onmouseover="mouseOver('.$user2_id.');" onmouseout="mouseOut('.$user2_id.');" src="images/sgray.png" />')))))?>
															</a>
															(<?=isset($_SESSION['uid53'][$user2_id])?$_SESSION['uid53'][$user2_id]:"0";?>)
															<?=$user2_name?>
															<div onmouseover="mouseOver(<?=$user2_id?>);" onmouseout="mouseOut(<?=$user2_id?>)" id="<?=$user2_id?>" style="background-color: rgba(0, 0, 0, 0.8); z-index:10; color:#FFFFFF; position: absolute; top: -12px; left: 14px; display:none; width:<?=$widths?>;"><?=$user2_nm?><br></div>
															(<?=isset($_SESSION['act_mems_5_3'][$user2_id])?$_SESSION['act_mems_5_3'][$user2_id]:"0";?>)
															<br>(<?=$user2_id;?>)
														</div>
													<? } ?>
														<div class="float_clear"></div>
		                                        </li>
												<li class="float_left five_three_two">
													<? if($user3_note == "inactive"){ ?>
														<div class="float_left right_img5_3_15X3">
															<a class="acolor"  href="javascript:void(0);" onclick="addmore_volunteers_5_3(<?=$user3_id?>,1)"><img id="img_1[<?=$user3_id?>]" onmouseover="mouseOver(<?=$user3_id?>);" onmouseout="mouseOut(<?=$user3_id?>);" src="images/02.png" /></a>
															<div class="username_img">
																(<?=isset($_SESSION['uid53'][$user3_id])?$_SESSION['uid53'][$user3_id]:"0";?>)
																<?=$user3_name?>
																<div onmouseover="mouseOver(<?=$user3_id?>);" onmouseout="mouseOut(<?=$user3_id?>)" id="<?=$user3_id?>" style="background-color: rgba(0, 0, 0, 0.8); color:#FFFFFF; z-index:10; position: absolute; top: -47px; left: 5px; display:none; width:<?=$widths?>;"><?=$user3_nm?><br><? if(isset($_SESSION['ruid53'][$user3_id]) && $_SESSION['ruid53'][$user3_id]==1) { ?><a href="index.php?file=replace_volunteers&uid=<?=$user3_id?>&stream=5_3">Replace</a><? } ?></div>
																(<?=isset($_SESSION['act_mems_5_3'][$user3_id])?$_SESSION['act_mems_5_3'][$user3_id]:"0";?>)
																<br />(<?=$user3_id;?>)
															</div>
														</div>
													<? } 
													/*else if((isset($_SESSION['have_pay_yday_5_3'][$user3_id]) && $_SESSION['have_pay_yday_5_3'][$user3_id])) { ?>
														<div class="float_left right_img5X3">
															<a class="acolor"  href="javascript:void(0);" onclick="addmore_volunteers_5_3(<?=$user3_id?>,1)"><img id="img_1[<?=$user3_id?>]" onmouseover="mouseOver(<?=$user3_id?>);" onmouseout="mouseOut(<?=$user3_id?>);" src="images/sred.png" /></a>
															<div class="username_img">
																(<?=isset($_SESSION['uid53'][$user3_id])?$_SESSION['uid53'][$user3_id]:"0";?>)
																<?=$user3_name?>
																<div onmouseover="mouseOver(<?=$user3_id?>);" onmouseout="mouseOut(<?=$user3_id?>)" id="<?=$user3_id?>" style="background-color: rgba(0, 0, 0, 0.8); color:#FFFFFF; z-index:10; position: absolute; top: -47px; left: 5px; display:none; width:<?=$widths?>;"><?=$user3_nm?><br><? if(isset($_SESSION['ruid53'][$user3_id]) && $_SESSION['ruid53'][$user3_id]==1) { ?><a href="index.php?file=replace_volunteers&uid=<?=$user3_id?>&stream=5_3">Replace</a><? } ?></div>
																(<?=isset($_SESSION['act_mems_5_3'][$user3_id])?$_SESSION['act_mems_5_3'][$user3_id]:"0";?>)
																<br />(<?=$user3_id;?>)
															</div>
														</div>
													<? } else if(isset($_SESSION['have_pay_5day_5_3'][$user3_id]) && $_SESSION['have_pay_5day_5_3'][$user3_id]) { ?>
														<div class="float_left right_img5X3">
															<a class="acolor"  href="javascript:void(0);" onclick="addmore_volunteers_5_3(<?=$user3_id?>,1)"><img id="img_1[<?=$user3_id?>]" onmouseover="mouseOver(<?=$user3_id?>);" onmouseout="mouseOut(<?=$user3_id?>);" src="images/dailyindicatior.png" /></a>
															<div class="username_img">
																(<?=isset($_SESSION['uid53'][$user3_id])?$_SESSION['uid53'][$user3_id]:"0";?>)
																<?=$user3_name?>
																<div onmouseover="mouseOver(<?=$user3_id?>);" onmouseout="mouseOut(<?=$user3_id?>)" id="<?=$user3_id?>" style="background-color: rgba(0, 0, 0, 0.8); color:#FFFFFF; z-index:10; position: absolute; top: -47px; left: 5px; display:none; width:<?=$widths?>;"><?=$user3_nm?><br><? if(isset($_SESSION['ruid53'][$user3_id]) && $_SESSION['ruid53'][$user3_id]==1) { ?><a href="index.php?file=replace_volunteers&uid=<?=$user3_id?>&stream=5_3">Replace</a><? } ?></div>
																(<?=isset($_SESSION['act_mems_5_3'][$user3_id])?$_SESSION['act_mems_5_3'][$user3_id]:"0";?>)
																<br />(<?=$user3_id;?>)
															</div>
														</div>
													<? } else if($user3_img == "red" && $user3_img != "0" ){ ?>
														<div class="float_left right_img5X3">
															<a class="acolor"  href="javascript:void(0);" onclick="addmore_volunteers_5_3(<?=$user3_id?>,1)"><img id="img_1[<?=$user3_id?>]" onmouseover="mouseOver(<?=$user3_id?>);" onmouseout="mouseOut(<?=$user3_id?>);" src="images/sred.png" /></a>
															<div class="username_img">
																(<?=isset($_SESSION['uid53'][$user3_id])?$_SESSION['uid53'][$user3_id]:"0";?>)
																<?=$user3_name?>
																<div onmouseover="mouseOver(<?=$user3_id?>);" onmouseout="mouseOut(<?=$user3_id?>)" id="<?=$user3_id?>" style="background-color: rgba(0, 0, 0, 0.8); color:#FFFFFF; z-index:10; position: absolute; top: -47px; left: 5px; display:none; width:<?=$widths?>;"><?=$user3_nm?><br><? if(isset($_SESSION['ruid53'][$user3_id]) && $_SESSION['ruid53'][$user3_id]==1) { ?><a href="index.php?file=replace_volunteers&uid=<?=$user3_id?>&stream=5_3">Replace</a><? } ?></div>
																(<?=isset($_SESSION['act_mems_5_3'][$user3_id])?$_SESSION['act_mems_5_3'][$user3_id]:"0";?>)
																<br />(<?=$user3_id;?>)
															</div>
														</div>
													<? }*/
													else if($user3_img == "none" && $user3_img != "0" ){?>
														<div class="float_left right_img5X3"><img id="img_1[<?=$user3_id?>]" src="images/snone.png" /><div class="username_img"><?=$user3_name?></div></div>
													<? }else{ ?>
														<div class="float_left right_img5X3">
															<a class="acolor"  href="javascript:void(0);" onclick="addmore_volunteers_5_3(<?=$user3_id?>,1)">
																<?php echo (($user3_img>=20)?'<img id="img_1['.$user3_id.']" onmouseover="mouseOver('.$user3_id.');" onmouseout="mouseOut('.$user3_id.');" src="images/03.png" />':(($user3_img>=10)?'<img id="img_1['.$user3_id.']" onmouseover="mouseOver('.$user3_id.');" onmouseout="mouseOut('.$user3_id.');" src="images/syellow.png" />':(($user3_img>=6)?'<img id="img_1['.$user3_id.']" onmouseover="mouseOver('.$user3_id.');" onmouseout="mouseOut('.$user3_id.');" src="images/sred.png" />':(($user3_img>=5)?'<img id="img_1['.$user3_id.']" onmouseover="mouseOver('.$user3_id.');" onmouseout="mouseOut('.$user3_id.');" src="images/sgreen.png" />':(($user3_img==4)?'<img id="img_1['.$user3_id.']" onmouseover="mouseOver('.$user3_id.');" onmouseout="mouseOut('.$user3_id.');" src="images/sorange.png" />':($user3_img>=1)?'<img id="img_1['.$user3_id.']" onmouseover="mouseOver('.$user3_id.');" onmouseout="mouseOut('.$user3_id.');" src="images/spurple.png" />':'<img id="img_1['.$user3_id.']" onmouseover="mouseOver('.$user3_id.');" onmouseout="mouseOut('.$user3_id.');" src="images/sgray.png" />')))))?>
															</a>
															<div class="username_img">
																(<?=isset($_SESSION['uid53'][$user3_id])?$_SESSION['uid53'][$user3_id]:"0";?>)
																<?=$user3_name?>
																<div onmouseover="mouseOver(<?=$user3_id?>);" onmouseout="mouseOut(<?=$user3_id?>)" id="<?=$user3_id?>" style="background-color: rgba(0, 0, 0, 0.8); z-index:10; color:#FFFFFF; position: absolute; top: -47px; left: 5px; display:none; width:<?=$widths?>;"><?=$user3_nm?><br></div>
																(<?=isset($_SESSION['act_mems_5_3'][$user3_id])?$_SESSION['act_mems_5_3'][$user3_id]:"0";?>)
																<br>(<?=$user3_id;?>)
															</div>
														</div>
													<? } ?>

													<div class="float_clear"></div>
                                            	</li>
												<li class="float_left five_three_two">
													<? if($user4_note == "inactive") { ?>
														<div class="float_left right_img5X3">
															<a class="acolor" href="javascript:void(0);" onclick="addmore_volunteers_5_3(<?=$user4_id?>,1)"><img onmouseover="mouseOver(<?=$user4_id?>);" onmouseout="mouseOut(<?=$user4_id?>);" id="img_1[<?=$user4_id?>]" src="images/02.png" /></a>
															<div class="username_img">
																(<?=isset($_SESSION['uid53'][$user4_id])?$_SESSION['uid53'][$user4_id]:"0";?>)
																<?=$user4_name?>
																<div onmouseover="mouseOver(<?=$user4_id?>);" onmouseout="mouseOut(<?=$user4_id?>)" id="<?=$user4_id?>" style="background-color: rgba(0, 0, 0, 0.8); color:#FFFFFF; z-index:10; position: absolute; top: -47px; left: 6px; display:none; width:<?=$widths?>;"><?=$user4_nm?><br><? if(isset($_SESSION['ruid53'][$user4_id]) && $_SESSION['ruid53'][$user4_id]==1) { ?><a href="index.php?file=replace_volunteers&uid=<?=$user4_id?>&stream=5_3">Replace</a><? } ?></div>
																(<?=isset($_SESSION['act_mems_5_3'][$user4_id])?$_SESSION['act_mems_5_3'][$user4_id]:"0";?>)
																<br />(<?=$user4_id;?>)
															</div>
														</div>
													<? }
													/* else if((isset($_SESSION['have_pay_yday_5_3'][$user4_id]) && $_SESSION['have_pay_yday_5_3'][$user4_id])){ ?>
														<div class="float_left right_img5X3">
															<a class="acolor" href="javascript:void(0);" onclick="addmore_volunteers_5_3(<?=$user4_id?>,1)"><img onmouseover="mouseOver(<?=$user4_id?>);" onmouseout="mouseOut(<?=$user4_id?>);" id="img_1[<?=$user4_id?>]" src="images/sred.png" /></a>
															<div class="username_img">
																(<?=isset($_SESSION['uid53'][$user4_id])?$_SESSION['uid53'][$user4_id]:"0";?>)
																<?=$user4_name?>
																(<?=isset($_SESSION['act_mems_5_3'][$user4_id])?$_SESSION['act_mems_5_3'][$user4_id]:"0";?>)
																<div onmouseover="mouseOver(<?=$user4_id?>);" onmouseout="mouseOut(<?=$user4_id?>)" id="<?=$user4_id?>" style="background-color: rgba(0, 0, 0, 0.8); color:#FFFFFF; z-index:10; position: absolute; top: -47px; left: 6px; display:none; width:<?=$widths?>;"><?=$user4_nm?><br><? if(isset($_SESSION['ruid53'][$user4_id]) && $_SESSION['ruid53'][$user4_id]==1) { ?><a href="index.php?file=replace_volunteers&uid=<?=$user4_id?>&stream=5_3">Replace</a><? } ?></div>
																<br />(<?=$user4_id;?>)
															</div>
														</div>
													<?  }else if(isset($_SESSION['have_pay_5day_5_3'][$user4_id]) && $_SESSION['have_pay_5day_5_3'][$user4_id]){ ?>
														<div class="float_left right_img5X3">
															<a class="acolor" href="javascript:void(0);" onclick="addmore_volunteers_5_3(<?=$user4_id?>,1)">
																<img  id="img_1[<?=$user4_id?>]" src="images/dailyindicatior.png" />
															</a>
															<div class="username_img">
																(<?=isset($_SESSION['uid53'][$user4_id])?$_SESSION['uid53'][$user4_id]:"0";?>)
																<?=$user4_name?>
																<div onmouseover="mouseOver(<?=$user4_id?>);" onmouseout="mouseOut(<?=$user4_id?>)" id="<?=$user4_id?>" style="background-color: rgba(0, 0, 0, 0.8); color:#FFFFFF; z-index:10; position: absolute; top: -47px; left: 6px; display:none; width:<?=$widths?>;"><?=$user4_nm?><br><? if(isset($_SESSION['ruid53'][$user4_id]) && $_SESSION['ruid53'][$user4_id]==1) { ?><a href="index.php?file=replace_volunteers&uid=<?=$user4_id?>&stream=5_3">Replace</a><? } ?></div>
																(<?=isset($_SESSION['act_mems_5_3'][$user4_id])?$_SESSION['act_mems_5_3'][$user4_id]:"0";?>)
																<br />(<?=$user4_id;?>)
															</div>
														</div>
													<? } else if($user4_img == "red" && $user4_img != "0" ) { ?>
														<div class="float_left right_img5X3">
															<a class="acolor" href="javascript:void(0);" onclick="addmore_volunteers_5_3(<?=$user4_id?>,1)"><img onmouseover="mouseOver(<?=$user4_id?>);" onmouseout="mouseOut(<?=$user4_id?>);" id="img_1[<?=$user4_id?>]" src="images/sred.png" /></a>
															<div class="username_img">
																(<?=isset($_SESSION['uid53'][$user4_id])?$_SESSION['uid53'][$user4_id]:"0";?>)
																<?=$user4_name?>
																<div onmouseover="mouseOver(<?=$user4_id?>);" onmouseout="mouseOut(<?=$user4_id?>)" id="<?=$user4_id?>" style="background-color: rgba(0, 0, 0, 0.8); color:#FFFFFF; z-index:10; position: absolute; top: -47px; left: 6px; display:none; width:<?=$widths?>;"><?=$user4_nm?><br><? if(isset($_SESSION['ruid53'][$user4_id]) && $_SESSION['ruid53'][$user4_id]==1) { ?><a href="index.php?file=replace_volunteers&uid=<?=$user4_id?>&stream=5_3">Replace</a><? } ?></div>
																(<?=isset($_SESSION['act_mems_5_3'][$user4_id])?$_SESSION['act_mems_5_3'][$user4_id]:"0";?>)
																<br />(<?=$user4_id;?>)
															</div>
														</div>
													<? }*/
													 else if($user4_img == "none" && $user4_img != "0" ) {?>
														<div class="float_left right_img5X3">
															<img id="img_1[<?=$user4_id?>]" src="images/snone.png" />
															<div class="username_img"><?=$user4_name?></div>
														</div>
													<? } else { ?>
														<div class="float_left right_img5X3">
															<a class="acolor" href="javascript:void(0);" onclick="addmore_volunteers_5_3(<?=$user4_id?>,1)">
																<?php echo (($user4_img>=20)?'<img id="img_1['.$user4_id.']" onmouseover="mouseOver('.$user4_id.');" onmouseout="mouseOut('.$user4_id.');" src="images/03.png" />':(($user4_img>=10)?'<img id="img_1['.$user4_id.']" onmouseover="mouseOver('.$user4_id.');" onmouseout="mouseOut('.$user4_id.');" src="images/syellow.png" />':(($user4_img>=6)?'<img id="img_1['.$user4_id.']" onmouseover="mouseOver('.$user4_id.');" onmouseout="mouseOut('.$user4_id.');" src="images/sred.png" />':(($user4_img>=5)?'<img id="img_1['.$user4_id.']" onmouseover="mouseOver('.$user4_id.');" onmouseout="mouseOut('.$user4_id.');" src="images/sgreen.png" />':(($user4_img==4)?'<img id="img_1['.$user4_id.']" onmouseover="mouseOver('.$user4_id.');" onmouseout="mouseOut('.$user4_id.');" src="images/sorange.png" />':($user4_img>=1)?'<img id="img_1['.$user4_id.']" onmouseover="mouseOver('.$user4_id.');" onmouseout="mouseOut('.$user4_id.');" src="images/spurple.png" />':'<img id="img_1['.$user4_id.']" onmouseover="mouseOver('.$user4_id.');" onmouseout="mouseOut('.$user4_id.');" src="images/sgray.png" />')))))?>
															</a>
															<div class="username_img">
																(<?=isset($_SESSION['uid53'][$user4_id])?$_SESSION['uid53'][$user4_id]:"0";?>)
																<?=$user4_name?>
																<div onmouseover="mouseOver(<?=$user4_id?>);" onmouseout="mouseOut(<?=$user4_id?>)" id="<?=$user4_id?>" style="background-color: rgba(0, 0, 0, 0.8); z-index:10; position: absolute; top: -47px; left: -28px; color:#FFFFFF; display:none; width:<?=$widths?>;"><?=$user4_nm?><br></div>
																(<?=isset($_SESSION['act_mems_5_3'][$user4_id])?$_SESSION['act_mems_5_3'][$user4_id]:"0";?>)
																<br>(<?=$user4_id;?>)
															</div>
														</div>
													<? } ?>
													<div class="float_clear"></div>
	                                          	</li>
												<li class="float_left five_three">
													<? if($user5_note == "inactive") {?>
														<div class="float_left right_img5X3">
															<a class="acolor"  href="javascript:void(0);" onclick="addmore_volunteers_5_3(<?=$user5_id?>,1)"><img onmouseover="mouseOver(<?=$user5_id?>);" onmouseout="mouseOut(<?=$user5_id?>);" id="img_1[<?=$user5_id?>]" src="images/02.png" /></a>
															<br />
															(<?=isset($_SESSION['uid53'][$user5_id])?$_SESSION['uid53'][$user5_id]:"0";?>)
															<?=$user5_name?>
															<div onmouseover="mouseOver(<?=$user5_id?>);" onmouseout="mouseOut(<?=$user5_id?>)" id="<?=$user5_id?>" style="background-color: rgba(0, 0, 0, 0.8); color:#FFFFFF; z-index:10; position: absolute; top: -15px; left: -20px; display:none; width:<?=$widths?>;"><?=$user5_nm?><br><? if(isset($_SESSION['ruid53'][$user5_id]) && $_SESSION['ruid53'][$user5_id]==1) { ?><a href="index.php?file=replace_volunteers&uid=<?=$user5_id?>&stream=5_3">Replace</a><? } ?></div>
															(<?=isset($_SESSION['act_mems_5_3'][$user5_id])?$_SESSION['act_mems_5_3'][$user5_id]:"0";?>)
															<br />(<?=$user5_id;?>)
														</div>
													<? }
													/* else if((isset($_SESSION['have_pay_yday_5_3'][$user5_id]) && $_SESSION['have_pay_yday_5_3'][$user5_id])){ ?>
														<div class="float_left right_img5X3">
															<a class="acolor"  href="javascript:void(0);" onclick="addmore_volunteers_5_3(<?=$user5_id?>,1)"><img onmouseover="mouseOver(<?=$user5_id?>);" onmouseout="mouseOut(<?=$user5_id?>);" id="img_1[<?=$user5_id?>]" src="images/sred.png" /></a>
															<br />
															(<?=isset($_SESSION['uid53'][$user5_id])?$_SESSION['uid53'][$user5_id]:"0";?>)
															<?=$user5_name?>
															<div onmouseover="mouseOver(<?=$user5_id?>);" onmouseout="mouseOut(<?=$user5_id?>)" id="<?=$user5_id?>" style="background-color: rgba(0, 0, 0, 0.8); color:#FFFFFF; z-index:10; position: absolute; top: -15px; left: -20px; display:none; width:<?=$widths?>;"><?=$user5_nm?><br><? if(isset($_SESSION['ruid53'][$user5_id]) && $_SESSION['ruid53'][$user5_id]==1) { ?><a href="index.php?file=replace_volunteers&uid=<?=$user5_id?>&stream=5_3">Replace</a><? } ?></div>
															(<?=isset($_SESSION['act_mems_5_3'][$user5_id])?$_SESSION['act_mems_5_3'][$user5_id]:"0";?>)
															<br />(<?=$user5_id;?>)
														</div>
													<? } else if(isset($_SESSION['have_pay_5day_5_3'][$user5_id]) && $_SESSION['have_pay_5day_5_3'][$user5_id]){ ?>
														<div class="float_left right_img5_3_1">
															<a class="acolor"  href="javascript:void(0);" onclick="addmore_volunteers_5_3(<?=$user5_id?>,1)"><img onmouseover="mouseOver(<?=$user5_id?>);" onmouseout="mouseOut(<?=$user5_id?>);" id="img_1[<?=$user5_id?>]" src="images/dailyindicatior.png" /></a>
															<br />
															(<?=isset($_SESSION['uid53'][$user5_id])?$_SESSION['uid53'][$user5_id]:"0";?>)
															<?=$user5_name?>
															<div onmouseover="mouseOver(<?=$user5_id?>);" onmouseout="mouseOut(<?=$user5_id?>)" id="<?=$user5_id?>" style="background-color: rgba(0, 0, 0, 0.8); color:#FFFFFF; z-index:10; position: absolute; top: -15px; left: -20px; display:none; width:<?=$widths?>;"><?=$user5_nm?><br><? if(isset($_SESSION['ruid53'][$user5_id]) && $_SESSION['ruid53'][$user5_id]==1) { ?><a href="index.php?file=replace_volunteers&uid=<?=$user5_id?>&stream=5_3">Replace</a><? } ?></div>
															(<?=isset($_SESSION['act_mems_5_3'][$user5_id])?$_SESSION['act_mems_5_3'][$user5_id]:"0";?>)
															<br />(<?=$user5_id;?>)
														</div>
													<? } else if($user5_img == "red" && $user5_img != "0" )	{ ?>
														<div class="float_left right_img5_3_1">
															<a class="acolor"  href="javascript:void(0);" onclick="addmore_volunteers_5_3(<?=$user5_id?>,1)"><img id="img_1[<?=$user5_id?>]" src="images/sred.png" /></a>
															<br />
															(<?=isset($_SESSION['uid53'][$user5_id])?$_SESSION['uid53'][$user5_id]:"0";?>)
															<?=$user5_name?>
															<div onmouseover="mouseOver(<?=$user5_id?>);" onmouseout="mouseOut(<?=$user5_id?>)" id="<?=$user5_id?>" style="background-color: rgba(0, 0, 0, 0.8); color:#FFFFFF; z-index:10; position: absolute; top: -15px; left: -20px; display:none; width:<?=$widths?>;"><?=$user5_nm?><br><? if(isset($_SESSION['ruid53'][$user5_id]) && $_SESSION['ruid53'][$user5_id]==1) { ?><a href="index.php?file=replace_volunteers&uid=<?=$user5_id?>&stream=5_3">Replace</a><? } ?></div>
															(<?=isset($_SESSION['act_mems_5_3'][$user5_id])?$_SESSION['act_mems_5_3'][$user5_id]:"0";?>)
															<br />(<?=$user5_id;?>)
														</div>
													<? } */
													else if($user5_img == "none" && $user5_img != "0" ){ ?>
														<div class="float_left right_img5_3_1"><img src="images/snone.png" /><br /><?=$user5_name?></div>
													<? } else{ ?>
	                                                    <div class="float_left right_img5_3_1">
															<a class="acolor"   href="javascript:void(0);" onclick="addmore_volunteers_5_3(<?=$user5_id?>,1)">
																<?php echo (($user5_img>=20)?'<img id="img_1['.$user5_id.']" onmouseover="mouseOver('.$user5_id.');" onmouseout="mouseOut('.$user5_id.');" src="images/03.png" />':(($user5_img>=10)?'<img id="img_1['.$user5_id.']" onmouseover="mouseOver('.$user5_id.');" onmouseout="mouseOut('.$user5_id.');" src="images/syellow.png" />':(($user5_img>=6)?'<img id="img_1['.$user5_id.']" onmouseover="mouseOver('.$user5_id.');" onmouseout="mouseOut('.$user5_id.');" src="images/sred.png" />':(($user5_img>=5)?'<img id="img_1['.$user5_id.']" onmouseover="mouseOver('.$user5_id.');" onmouseout="mouseOut('.$user5_id.');" src="images/sgreen.png" />':(($user5_img==4)?'<img id="img_1['.$user5_id.']" onmouseover="mouseOver('.$user5_id.');" onmouseout="mouseOut('.$user5_id.');" src="images/sorange.png" />':($user5_img>=1)?'<img id="img_1['.$user5_id.']" onmouseover="mouseOver('.$user5_id.');" onmouseout="mouseOut('.$user5_id.');" src="images/spurple.png" />':'<img id="img_1['.$user5_id.']" onmouseover="mouseOver('.$user5_id.');" onmouseout="mouseOut('.$user5_id.');" src="images/sgray.png" />')))))?>
															</a>
															<br />
															(<?=isset($_SESSION['uid53'][$user5_id])?$_SESSION['uid53'][$user5_id]:"0";?>)
															<?=$user5_name?>
															<div onmouseover="mouseOver(<?=$user5_id?>);" onmouseout="mouseOut(<?=$user5_id?>)" id="<?=$user5_id?>" style="background-color: rgba(0, 0, 0, 0.8); color:#FFFFFF; z-index:10; position: absolute; top: -15px; left: -20px; display:none; width:<?=$widths?>;"><?=$user5_nm?><br></div>
															(<?=isset($_SESSION['act_mems_5_3'][$user5_id])?$_SESSION['act_mems_5_3'][$user5_id]:"0";?>)
															<br>(<?=$user5_id;?>)
														</div>
													<? } ?>
													<div class="float_clear"></div>
	                                          	</li>
                                        </ul>
                                    </li>
									<div class="clearboth" id="next_volunteers[1]"></div>
									<input type="hidden" value="1" id="next_volunteers_cnt" name="next_volunteers_cnt" />
                                </ul>
                            </div>
                            <div class="float_clear"></div>
							<!--<input type="button" name="back" id="back" class="submit_btn" onclick="backbtn();" value="Back" />-->
                        </div>

						<?
							$sql = "select * from nodetree_5_3 where usertb_id = '".$userids."'";
							$row = $form->getRow($sql);
							$lvl1_amt = 0;
							$lvl2_amt = 0;
							$lvl3_amt = 0;
							$lvl1_mem = 0;
							$lvl2_mem = 0;
							$lvl3_mem = 0;
							$a_user1 = array();
							$a_user2 = array();
							$a_user3 = array();
							$i = 0;
							if(sizeof($row)>0)
							{
								if($row['u1'] != 0)
								{
									$a_user1[$i++] = $row['u1'];
									$lvl1_mem++;
								}
								if($row['u2'] != 0)
								{
									$a_user1[$i++] = $row['u2'];
									$lvl1_mem++;
								}
								if($row['u3'] != 0)
								{
									$a_user1[$i++] = $row['u3'];
									$lvl1_mem++;
								}
								if($row['u4'] != 0)
								{
									$a_user1[$i++] = $row['u4'];
									$lvl1_mem++;
								}
								if($row['u5'] != 0)
								{
									$a_user1[$i++] = $row['u5'];
									$lvl1_mem++;
								}
								$sql = "select sum(earn_val) as earn_val from m_earn_history where (earn_from = '".$row['u1']."' or earn_from = '".$row['u2']."' or earn_from = '".$row['u3']."' or earn_from = '".$row['u5']."' or earn_from = '".$row['u5']."') and  usertb_id = '".$userids."' and earn_type = 'earn' and earn_datetime like '".date("Y-m-d",mktime(0,0,0,date("m"),date("d")-1,date("Y")))."%' and stream = '5_3'";
								$lvl1_row = $form->getRow($sql);
								$lvl1_amt = 0;
								if(sizeof($lvl1_row)>0)
								{
									$lvl1_amt = $lvl1_row['earn_val'];
								}
								$sql = "select * from nodetree_5_3 where ( usertb_id = '".$row['u1']."' or usertb_id = '".$row['u2']."' or usertb_id = '".$row['u3']."' or usertb_id = '".$row['u4']."' or usertb_id = '".$row['u5']."')";
								$lvl2_row = $form->getArray($sql);
								$j = 0;
								$members = array();
								$i = 0;
								for($k=0;$k<sizeof($lvl2_row);$k++)
								{
											if($lvl2_row[$k]['u1'] != 0)
											{
												$a_user2[$i++] = $lvl2_row[$k]['u1'];
												$lvl2_mem++;
											}
											if($lvl2_row[$k]['u2'] != 0)
											{
												$a_user2[$i++] = $lvl2_row[$k]['u2'];
												$lvl2_mem++;
											}
											if($lvl2_row[$k]['u3'] != 0)
											{
												$a_user2[$i++] = $lvl2_row[$k]['u3'];
												$lvl2_mem++;
											}
											if($lvl2_row[$k]['u4'] != 0)
											{
												$a_user2[$i++] = $lvl2_row[$k]['u4'];
												$lvl2_mem++;
											}
											if($lvl2_row[$k]['u5'] != 0)
											{
												$a_user2[$i++] = $lvl2_row[$k]['u5'];
												$lvl2_mem++;
											}
						
									$members[$j++] =  $lvl2_row[$k]['u1'];
									$members[$j++] =  $lvl2_row[$k]['u2'];
									$members[$j++] =  $lvl2_row[$k]['u3'];
									$members[$j++] =  $lvl2_row[$k]['u4'];
									$members[$j++] =  $lvl2_row[$k]['u5'];
								}
								if(!empty($members))
								{
									$sql = "select sum(earn_val) as earn_val from m_earn_history where earn_from in(".implode(",",$members).") and  usertb_id = '".$userids."' and earn_type = 'earn' and earn_datetime like '".date("Y-m-d",mktime(0,0,0,date("m"),date("d")-1,date("Y")))."%' and stream = '5_3'";
									$lvl2_row = $form->getRow($sql);
									$lvl2_amt = 0;
									if(sizeof($lvl2_row)>0)
									{
										$lvl2_amt = $lvl2_row['earn_val'];
									}
							
									$sql = "select * from nodetree_5_3 where usertb_id in (".implode(",",$members).")";
									$lvl3_row = $form->getArray($sql);
									$j = 0;
									$members2 = array();
									for($k=0;$k<sizeof($lvl3_row);$k++)
									{
										if($lvl3_row[$k]['u1'] != 0)
										{
											$a_user3[$i++] = $lvl3_row[$k]['u1'];
											$lvl3_mem++;
										}
										if($lvl3_row[$k]['u2'] != 0)
										{
											$a_user3[$i++] = $lvl3_row[$k]['u2'];
											$lvl3_mem++;
										}
										if($lvl3_row[$k]['u3'] != 0)
										{
											$a_user3[$i++] = $lvl3_row[$k]['u3'];
											$lvl3_mem++;
										}
										if($lvl3_row[$k]['u4'] != 0)
										{
											$a_user3[$i++] = $lvl3_row[$k]['u4'];
											$lvl3_mem++;
										}
										if($lvl3_row[$k]['u5'] != 0)
										{
											$a_user3[$i++] = $lvl3_row[$k]['u5'];
											$lvl3_mem++;
										}
										$members2[$j++] =  $lvl3_row[$k]['u1'];
										$members2[$j++] =  $lvl3_row[$k]['u2'];
										$members2[$j++] =  $lvl3_row[$k]['u3'];
										$members2[$j++] =  $lvl3_row[$k]['u4'];
										$members2[$j++] =  $lvl3_row[$k]['u5'];
									}
									if(!empty($members2))
									{
										$sql = "select sum(earn_val) as earn_val from m_earn_history where earn_from in(".implode(",",$members2).") and  usertb_id = '".$userids."' and earn_type = 'earn' and earn_datetime like '".date("Y-m-d",mktime(0,0,0,date("m"),date("d")-1,date("Y")))."%' and stream = '5_3'";
										$lvl3_row = $form->getRow($sql);
										$lvl3_amt = 0;
										if(sizeof($lvl3_row)>0)
										{
											$lvl3_amt = $lvl3_row['earn_val'];
										}
									}
								}
							}
							$sql = "SELECT sum(`earn_val`) as e_val, level,count(*) as pay_mem FROM `m_earn_history` WHERE `earn_datetime` like '".date("Y-m-d",mktime(0,0,0,date("m"),date("d")-1,date("Y")))."%' and usertb_id = '".$userids."'  and stream = '5_3' group by level order by level asc";
							$e_row = $form->getArray($sql);
							$eval[1] = 0;
							$eval[2] = 0;
							$eval[3] = 0;
							$pay_yesterday = array();
							for($k=0;$k<sizeof($e_row);$k++)
							{
								$eval[$k][$e_row['level']] = $e_row[$k]['e_val'];
								$pay_yesterday[$e_row[$k]['level']] = $e_row[$k]['pay_mem'];
							}
						
							?>
							<div class="clearboth"></div>
							<div>
							<?
								include_once("volunteersmatrix_5_3.php");
						
							$tot_act_user1 = 0;
							if(!empty($a_user1))
							{
								$str12 = implode(",",$a_user1);
								
								$sql = "select count(*) as tot_a_user from m_payment_fee_5_3 where usertb_id in (".$str12.") and activedeactive = 'active' and payment_done='Yes'";
								$rec_act_user = $form->getRow($sql);
								$tot_act_user1 = $rec_act_user['tot_a_user'];
							}
						
							$tot_act_user2 = 0;
							if(!empty($a_user2))
							{
								$str12 = implode(",",$a_user2);
								$sql = "select count(*) as tot_a_user from m_payment_fee_5_3 where usertb_id in (".$str12.") and activedeactive = 'active' and payment_done='Yes'";
								$rec_act_user = $form->getRow($sql);
								$tot_act_user2 = $rec_act_user['tot_a_user'];
							}
							
							$tot_act_user3 = 0;
							if(!empty($a_user3))
							{
								$str12 = implode(",",$a_user3);
								$sql = "select count(*) as tot_a_user from m_payment_fee_5_3 where usertb_id in (".$str12.") and activedeactive = 'active' and payment_done='Yes'";
								$rec_act_user = $form->getRow($sql);
								$tot_act_user3 = $rec_act_user['tot_a_user'];
							}
						
							$pay_yesterday[1] = isset($pay_yesterday[1])?$pay_yesterday[1]:0;
							$pay_yesterday[2] = isset($pay_yesterday[2])?$pay_yesterday[2]:0;
							$pay_yesterday[3] = isset($pay_yesterday[3])?$pay_yesterday[3]:0;

						
							?>
							</div>
							<div class="clearboth"></div>
									<div class="main" style="margin-left:175px;width:650px">
									<table width="100%" border="0" cellspacing="1" cellpadding="0">
										<tr>
											<th align="left"> Level </th> <th align="left"> People </th> <th align="left">NO. of Active Users</th>
										</tr>
										<tr>
											<td>Level:1</td><td><?=$lvl1_mem?></td><td><?=isset($tot_act_user1)?$tot_act_user1:0;?></td>
										</tr>
										<tr>
											<td>Level:2</td><td><?=$lvl2_mem?></td><td><?=isset($tot_act_user2)?$tot_act_user2:0;?></td>
										</tr>
										<tr>
											<td>Level:3</td><td><?=$lvl3_mem?></td><td><?=isset($tot_act_user3)?$tot_act_user3:0;?></td>
										</tr>
										<tr>
											<th align="left">Total</th><th align="left"><?=($lvl1_mem+$lvl2_mem+$lvl3_mem)?></th><th align="left"><?=($tot_act_user1+$tot_act_user2+$tot_act_user3)?></th>
										</tr>
									</table>
							</div>
				</div>
</section>