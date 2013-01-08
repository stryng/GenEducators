<?
	require_once('../../business_logic/config/configure.php');
	require_once("../../business_logic/class/form.class.php");
	//echo $_REQUEST['action']; die;
	$form = new Form();

$user4_img = "none";
$user5_img = "none";
$user6_img = "none";

$user4_id = "0";
$user5_id = "0";
$user6_id = "0";

$user4_name = "";
$user5_name = "";
$user6_name = "";

$user4_nm = "";
$user5_nm = "";
$user6_nm = "";

$user4_note = "";
$user5_note = "";
$user6_note = "";

$user4_note_5_3 = "";
$user5_note_5_3 = "";
$user6_note_5_3 = "";

$arr1 = array();

	if(isset($_GET['vnumber']) && $_GET['vnumber'] != 0)
	{
				$treenumber = $_GET['treenumber'];
				$ele_name = $_GET['ele_name'];
				$qry = "select * from nodetree where usertb_id = '".$_GET['vnumber']."'";
				$row1 = $form->getRow($qry);
				$msg = "";
				if(sizeof($row1)>0)
				{
					if($row1['u1'] != "0")
					{
						//$qry = "select CONCAT(FirstName,'&nbsp;&nbsp;',LastName) as Name from userdetail where userid = '".$row1['u1']."'";
						$sql = "select count(*) as tot from userdetail where inviter = '".$row1['u1']."' and Placement = '' ";
						$rows = $form->getRow($sql);
						$arr1[$row1['u1']] = $num = $rows[0];
						checkuserreplacelink($row1['u1']);
						checkuseractivemembers($row1['u1']);
		
						$qry = "select FirstName as Name from userdetail where userid = '".$row1['u1']."'";
						$user1 = $form->getRow($qry);
	
						$user4_note = "";
						$qry = "select * from userdetail where UserId = '".$row1['u1']."'";
						$row11 = $form->getRow($qry);
						
						$user4_name = $row11['FirstName'];//."&nbsp;".$row11['LastName'];
						$user4_nm = $row11['FirstName']."&nbsp;".$row11['LastName'];
						$user4_note = "";
						$user4_id = $row1['u1'];

						$qry = "select payment_done from m_payment_fee where usertb_id = '".$row1['u1']."'";
						$var_user_pay = $form->getRow($qry);
						if(sizeof($var_user_pay))
						{
							if($var_user_pay['payment_done'] == "NO")
							{
								$user4_img = "red";
								$user4_note="Daily payment is not paid in time.";
							}
							else
							{
								$qry = "select count(*) as tot from userdetail where inviter = '".$row1['u1']."' and active =1 and entry='prepaid' and Placement = '' ";
								$row21 = $form->getRow($qry);
								$user4_img = $num = $row21[0];
							}
							$user4_id = $row1['u1'];
						}
						else
						{
							$user4_note="inactive";
						}
					}
					if($row1['u2'] != "0")
					{
						//$qry = "select CONCAT(FirstName,'&nbsp;&nbsp;',LastName) as Name from userdetail where userid = '".$row1['u2']."'";
						$sql = "select count(*) as tot from userdetail where inviter = '".$row1['u2']."' and Placement = ''";
						$rows = $form->getRow($sql);
						$arr1[$row1['u2']] = $num = $rows[0];
						checkuserreplacelink($row1['u2']);
						checkuseractivemembers($row1['u2']);
		
						$qry = "select FirstName as Name from userdetail where userid = '".$row1['u2']."'";
						$user2 = $form->getRow($qry);
						
						$user5_note = "";
						$qry = "select * from userdetail where UserId = '".$row1['u2']."'";
						$row11 = $form->getRow($qry);
						
						$user5_name = $row11['FirstName'];//."&nbsp;".$row11['LastName'];
						$user5_nm = $row11['FirstName']."&nbsp;".$row11['LastName'];
						$user5_note = "";
						$user5_id = $row1['u2'];
						
						$qry = "select payment_done from m_payment_fee where usertb_id = '".$row1['u2']."'";
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
								$qry = "select count(*) as tot from userdetail where inviter = '".$row1['u2']."' and active =1 and entry='prepaid'  and Placement = ''";
								$row22 = $form->getRow($qry);
								$user5_img = $num = $row22[0];
							}
							$user5_id = $row1['u2'];
						}
						else
						{
							$user5_note="inactive";
						}
					}
					if($row1['u3'] != "0")
					{
						
						//$qry = "select CONCAT(FirstName,'&nbsp;&nbsp;',LastName) as Name from userdetail where userid = '".$row1['u3']."'";
						$sql = "select count(*) as tot from userdetail where inviter = '".$row1['u3']."' and Placement = '' ";
						$rows = $form->getRow($sql);
						$arr1[$row1['u3']] = $num = $rows[0];
						checkuserreplacelink($row1['u3']);
						checkuseractivemembers($row1['u3']);
		
						$qry = "select FirstName as Name from userdetail where userid = '".$row1['u3']."'";
						$user3 = $form->getRow($qry);
						
	
						$qry = "select * from userdetail where UserId = '".$row1['u3']."'";
						$row11 = $form->getRow($qry);
						
						$user6_name = $row11['FirstName'];//."&nbsp;".$row11['LastName'];
						$user6_nm = $row11['FirstName']."&nbsp;".$row11['LastName'];
						$user6_note = "";
						$user6_id = $row1['u3'];
						
						$qry = "select payment_done from m_payment_fee where usertb_id = '".$row1['u3']."'";
						$var_user_pay = $form->getRow($qry);
						if(sizeof($var_user_pay)>0)
						{
							if($var_user_pay['payment_done'] == "NO")
							{
								$user6_img = "red";
								$user6_note="Daily payment is not paid in time.";
							}
							else
							{
								$qry = "select count(*) as tot from userdetail where inviter = '".$row1['u3']."' and active =1 and entry='prepaid' and Placement = '' ";
								$row23 = $form->getRow($qry);
								$user6_img = $num = $row23[0];
							}
							$user6_id = $row1['u3'];
						}
						else
						{
							$user6_note="inactive";
						}
					}
				}
			}
			
$_SESSION['uid'] = $arr1;
$cnt_id = $_GET['cnt'];

?>
                                                <div class="float_clear"></div>
                                            	<ul class="left border_second">
                                                	<li class="float_left"><div class="float_left"><img src="<?=SERVER_URL?>images/line.jpg"/></div></li>
                                                    <li class="float_left"><div><img src="<?=SERVER_URL?>images/line.jpg" /></div></li>
                                                    <li class="float_left"><div class="float_right"><img src="<?=SERVER_URL?>images/line.jpg"/></div></li>
                                                </ul>
                                            	<ul class="left top_move">
                                                	<li class="float_left">
       												<? if($user4_note == "inactive"){ ?>
														<div class="float_left left_img">
															<a class="acolor" onclick="addmore_volunteers(<?=$user4_id?>,<?=$cnt_id?>,<?=$treenumber?>,'<?=$ele_name?>')"><img onmouseover="mouseOver(<?=$user4_id?>);" onmouseout="mouseOut(<?=$user4_id?>);"  id="img_<?=$treenumber?>[<?=$user4_id?>]" src="<?=SERVER_URL?>images/02.png" /></a>
															<div class="username_img">
																(<?=isset($_SESSION['uid'][$user4_id])?$_SESSION['uid'][$user4_id]:"0";?>)
																<?=$user4_name?>
																<div onmouseover="mouseOver(<?=$user4_id?>);" onmouseout="mouseOut(<?=$user4_id?>)" id="<?=$user4_id?>" style="background-color: rgba(0, 0, 0, 0.8); color:#FFFFFF; z-index:10; position: absolute; top: -46px; left: -20px; display:none"><?=$user4_nm?><br><? if(isset($_SESSION['ruid'][$user4_id]) && $_SESSION['ruid'][$user4_id]==1) { ?><a href="index.php?file=replace_volunteers&uid=<?=$user4_id?>">Replace</a><? } ?></div>
																(<?=isset($_SESSION['act_mems'][$user4_id])?$_SESSION['act_mems'][$user4_id]:"0";?>)
																<br />
																(<?=$user4_id;?>)
															</div>
														</div>
													<? }
													/* else if(isset($_SESSION['have_pay_yday'][$user4_id]) && $_SESSION['have_pay_yday'][$user4_id]){ ?>
														<div class="float_left left_img">
															<a class="acolor" onclick="addmore_volunteers(<?=$user4_id?>,<?=$cnt_id?>,<?=$treenumber?>,'<?=$ele_name?>')"><img onmouseover="mouseOver(<?=$user4_id?>);" onmouseout="mouseOut(<?=$user4_id?>);" id="img_<?=$treenumber?>[<?=$user4_id?>]" src="<?=SERVER_URL?>images/sred.png" /></a>
															<div class="username_img">
															(<?=isset($_SESSION['uid'][$user4_id])?$_SESSION['uid'][$user4_id]:"0";?>)
															<?=$user4_name?>
															<div onmouseover="mouseOver(<?=$user4_id?>);" onmouseout="mouseOut(<?=$user4_id?>)" id="<?=$user4_id?>" style="background-color: rgba(0, 0, 0, 0.8); color:#FFFFFF; z-index:10; position: absolute; top: -46px; left: -20px; display:none"><?=$user4_nm?><br><? if(isset($_SESSION['ruid'][$user4_id]) && $_SESSION['ruid'][$user4_id]==1) { ?><a href="index.php?file=replace_volunteers&uid=<?=$user4_id?>">Replace</a><? } ?></div>
															(<?=isset($_SESSION['act_mems'][$user4_id])?$_SESSION['act_mems'][$user4_id]:"0";?>)
															<br />
															(<?=$user4_id;?>)</div>
														</div>
													<? }else if(isset($_SESSION['have_pay_5day'][$user4_id]) && $_SESSION['have_pay_5day'][$user4_id]){ ?>
														<div class="float_left left_img">
															<a class="acolor" onclick="addmore_volunteers(<?=$user4_id?>,<?=$cnt_id?>,<?=$treenumber?>,'<?=$ele_name?>')"><img onmouseover="mouseOver(<?=$user4_id?>);" onmouseout="mouseOut(<?=$user4_id?>);" id="img_<?=$treenumber?>[<?=$user4_id?>]" src="<?=SERVER_URL?>images/dailyindicatior.png" /></a>
															<div class="username_img">
																(<?=isset($_SESSION['uid'][$user4_id])?$_SESSION['uid'][$user4_id]:"0";?>)
																<?=$user4_name?>
																<div onmouseover="mouseOver(<?=$user4_id?>);" onmouseout="mouseOut(<?=$user4_id?>)" id="<?=$user4_id?>" style="background-color: rgba(0, 0, 0, 0.8); color:#FFFFFF; z-index:10; position: absolute; top: -46px; left: -20px; display:none"><?=$user4_nm?><br><? if(isset($_SESSION['ruid'][$user4_id]) && $_SESSION['ruid'][$user4_id]==1) { ?><a href="index.php?file=replace_volunteers&uid=<?=$user4_id?>">Replace</a><? } ?></div>
																(<?=isset($_SESSION['act_mems'][$user4_id])?$_SESSION['act_mems'][$user4_id]:"0";?>)
																<br />
																(<?=$user4_id;?>)
															</div>
														</div>
													<? } else if($user4_img == "red" && $user4_img != "0" ){ ?>
														<div class="float_left left_img">
															<a class="acolor" onclick="addmore_volunteers(<?=$user4_id?>,<?=$cnt_id?>,<?=$treenumber?>,'<?=$ele_name?>')"><img id="img_<?=$treenumber?>[<?=$user4_id?>]" onmouseover="mouseOver(<?=$user4_id?>);" onmouseout="mouseOut(<?=$user4_id?>);" src="<?=SERVER_URL?>images/sred.png" /></a>
															<div class="username_img">
																(<?=isset($_SESSION['uid'][$user4_id])?$_SESSION['uid'][$user4_id]:"0";?>)
																<?=$user4_name?>
																<div onmouseover="mouseOver(<?=$user4_id?>);" onmouseout="mouseOut(<?=$user4_id?>)" id="<?=$user4_id?>" style="background-color: rgba(0, 0, 0, 0.8); color:#FFFFFF; z-index:10; position: absolute; top: -46px; left: -20px; display:none"><?=$user4_nm?><br><? if(isset($_SESSION['ruid'][$user4_id]) && $_SESSION['ruid'][$user4_id]==1) { ?><a href="index.php?file=replace_volunteers&uid=<?=$user4_id?>">Replace</a><? } ?></div>
																(<?=isset($_SESSION['act_mems'][$user4_id])?$_SESSION['act_mems'][$user4_id]:"0";?>)
																<br />
																(<?=$user4_id;?>)
															</div>
														</div>
													<? } */
													else if($user4_img == "none" && $user4_img != "0" ){ ?>
														<div class="float_left left_img"><img src="<?=SERVER_URL?>images/snone.png" /><div class="username_img"><?=$user4_name?></div></div>
													<? } else { ?>
	                                                    <div class="float_left left_img">
															<a class="acolor" onclick="addmore_volunteers(<?=$user4_id?>,<?=$cnt_id?>,<?=$treenumber?>,'<?=$ele_name?>')">
																<?php echo (($user4_img>=20)?'<img id="img_'.$treenumber.'['.$user4_id.']" onmouseover="mouseOver('.$user4_id.');" onmouseout="mouseOut('.$user4_id.');" src="images/03.png" />':(($user4_img>=10)?'<img id="img_'.$treenumber.'['.$user4_id.']" onmouseover="mouseOver('.$user4_id.');" onmouseout="mouseOut('.$user4_id.');" src="images/syellow.png" />':(($user4_img>=6)?'<img id="img_'.$treenumber.'['.$user4_id.']" onmouseover="mouseOver('.$user4_id.');" onmouseout="mouseOut('.$user4_id.');" src="images/sred.png" />':(($user4_img>=5)?'<img id="img_'.$treenumber.'['.$user4_id.']" onmouseover="mouseOver('.$user4_id.');" onmouseout="mouseOut('.$user4_id.');" src="images/sgreen.png" />':(($user4_img==4)?'<img id="img_'.$treenumber.'['.$user4_id.']" onmouseover="mouseOver('.$user4_id.');" onmouseout="mouseOut('.$user4_id.');" src="images/sorange.png" />':($user4_img>=1)?'<img id="img_'.$treenumber.'['.$user4_id.']" onmouseover="mouseOver('.$user4_id.');" onmouseout="mouseOut('.$user4_id.');" src="images/spurple.png" />':'<img id="img_'.$treenumber.'['.$user4_id.']" onmouseover="mouseOver('.$user4_id.');" onmouseout="mouseOut('.$user4_id.');" src="images/sgray.png" />')))))?>
															</a>
															<div class="username_img">
																(<?=isset($_SESSION['uid'][$user4_id])?$_SESSION['uid'][$user4_id]:"0";?>)
																<?=$user4_name?>
																<div onmouseover="mouseOver(<?=$user4_id?>);" onmouseout="mouseOut(<?=$user4_id?>)" id="<?=$user4_id?>" style="background-color: rgba(0, 0, 0, 0.8); color:#FFFFFF; z-index:10; position: absolute; top: -46px; left: -20px; display:none"><?=$user4_nm?><br></div>
																(<?=isset($_SESSION['act_mems'][$user4_id])?$_SESSION['act_mems'][$user4_id]:"0";?>)
																<br />
																(<?=$user4_id;?>)
															</div>
													<? } ?>
                                                    
                                                     <div class="float_clear"></div>
                                                    
                                                    </li>
                                                    <li class="float_left">
     												<? if($user5_note == "inactive"){  ?>
														<div style="width:150px; margin:0px 0px 0px -41px">
															<a class="acolor" onclick="addmore_volunteers(<?=$user5_id?>,<?=$cnt_id?>,<?=$treenumber?>,'<?=$ele_name?>')"><img onmouseover="mouseOver(<?=$user5_id?>);" onmouseout="mouseOut(<?=$user5_id?>);" id="img_<?=$treenumber?>[<?=$user5_id?>]" src="<?=SERVER_URL?>images/02.png" /></a>
															<br />
															(<?=isset($_SESSION['uid'][$user5_id])?$_SESSION['uid'][$user5_id]:"0";?>)
															<?=$user5_name?>
															<div onmouseover="mouseOver(<?=$user5_id?>);" onmouseout="mouseOut(<?=$user5_id?>)" id="<?=$user5_id?>" style="background-color: rgba(0, 0, 0, 0.8); color:#FFFFFF; z-index:10; position: absolute; top: 2px; left: 52px; display:none">
															<?=$user5_nm?>
															<br>
															<? if(isset($_SESSION['ruid'][$user5_id]) && $_SESSION['ruid'][$user5_id]==1) { ?><a href="index.php?file=replace_volunteers&uid=<?=$user5_id?>">Replace</a><? } ?></div>
															(<?=isset($_SESSION['act_mems'][$user5_id])?$_SESSION['act_mems'][$user5_id]:"0";?>)
															<br />
															(<?=$user5_id;?>)
														</div>
													<? } 
													/*else if(isset($_SESSION['have_pay_yday'][$user5_id]) && $_SESSION['have_pay_yday'][$user5_id]) { ?>
														<div style="width:150px; margin:0px 0px 0px -41px">
															<a class="acolor" onclick="addmore_volunteers(<?=$user5_id?>,<?=$cnt_id?>,<?=$treenumber?>,'<?=$ele_name?>')"><img onmouseover="mouseOver(<?=$user5_id?>);" onmouseout="mouseOut(<?=$user5_id?>);" id="img_<?=$treenumber?>[<?=$user5_id?>]" src="<?=SERVER_URL?>images/sred.png" /></a>
															<br />
															(<?=isset($_SESSION['uid'][$user5_id])?$_SESSION['uid'][$user5_id]:"0";?>)
															<?=$user5_name?>
															<div onmouseover="mouseOver(<?=$user5_id?>);" onmouseout="mouseOut(<?=$user5_id?>)" id="<?=$user5_id?>" style="background-color: rgba(0, 0, 0, 0.8); color:#FFFFFF; z-index:10; position: absolute; top: 17px; left: 39px; display:none">
																<?=$user5_nm?><br><? if(isset($_SESSION['ruid'][$user5_id]) && $_SESSION['ruid'][$user5_id]==1) { ?><a href="index.php?file=replace_volunteers&uid=<?=$user5_id?>">Replace</a><? } ?>
															</div>
															(<?=isset($_SESSION['act_mems'][$user5_id])?$_SESSION['act_mems'][$user5_id]:"0";?>)
															<br />
															(<?=$user5_id;?>)
														</div>
													<? } else if(isset($_SESSION['have_pay_5day'][$user5_id]) && $_SESSION['have_pay_5day'][$user5_id]) { ?>
														<div style="width:150px; margin:0px 0px 0px -41px">
															<a class="acolor" onclick="addmore_volunteers(<?=$user5_id?>,<?=$cnt_id?>,<?=$treenumber?>,'<?=$ele_name?>')"><img onmouseover="mouseOver(<?=$user5_id?>);" onmouseout="mouseOut(<?=$user5_id?>);" id="img_<?=$treenumber?>[<?=$user5_id?>]" src="<?=SERVER_URL?>images/dailyindicatior.png" /></a><br />
															(<?=isset($_SESSION['uid'][$user5_id])?$_SESSION['uid'][$user5_id]:"0";?>)
															<?=$user5_name?>
															<div onmouseover="mouseOver(<?=$user5_id?>);" onmouseout="mouseOut(<?=$user5_id?>)" id="<?=$user5_id?>" style="background-color: rgba(0, 0, 0, 0.8); color:#FFFFFF; z-index:10; position: absolute; top: 3px; left: 55px; display:none"><?=$user5_nm?><br><? if(isset($_SESSION['ruid'][$user5_id]) && $_SESSION['ruid'][$user5_id]==1) { ?><a href="index.php?file=replace_volunteers&uid=<?=$user5_id?>">Replace</a><? } ?></div>
															(<?=isset($_SESSION['act_mems'][$user5_id])?$_SESSION['act_mems'][$user5_id]:"0";?>)
															<br />
															(<?=$user5_id;?>)
														</div>
													<? } else if($user5_img == "red" && $user5_img != "0" ) { ?>
														<div style="width:150px; margin:0px 0px 0px -41px">
															<a class="acolor" onclick="addmore_volunteers(<?=$user5_id?>,<?=$cnt_id?>,<?=$treenumber?>,'<?=$ele_name?>')"><img onmouseover="mouseOver(<?=$user5_id?>);" onmouseout="mouseOut(<?=$user5_id?>);" id="img_<?=$treenumber?>[<?=$user5_id?>]" src="<?=SERVER_URL?>images/sred.png" /></a>
															<br />
															(<?=isset($_SESSION['uid'][$user5_id])?$_SESSION['uid'][$user5_id]:"0";?>)
															<?=$user5_name?>
															<div onmouseover="mouseOver(<?=$user5_id?>);" onmouseout="mouseOut(<?=$user5_id?>)" id="<?=$user5_id?>" style="background-color: rgba(0, 0, 0, 0.8); color:#FFFFFF; z-index:10; position: absolute; top: 3px; left: 55px; display:none"><?=$user5_nm?><br><? if(isset($_SESSION['ruid'][$user5_id]) && $_SESSION['ruid'][$user5_id]==1) { ?><a href="index.php?file=replace_volunteers&uid=<?=$user5_id?>">Replace</a><? } ?></div>
															(<?=isset($_SESSION['act_mems'][$user5_id])?$_SESSION['act_mems'][$user5_id]:"0";?>)
															<br />
															(<?=$user5_id;?>)
														</div>
													<? } */
													else if($user5_img == "none" && $user5_img != "0" ){ ?>
														<div style="width:150px; margin:0px 0px 0px -41px"><img src="<?=SERVER_URL?>images/snone.png" /><br /><?=$user5_name?></div>
													<? }else { ?>
	                                                 	<div style="width:150px; margin:0px 0px 0px -41px">
															<a class="acolor" onclick="addmore_volunteers(<?=$user5_id?>,<?=$cnt_id?>,<?=$treenumber?>,'<?=$ele_name?>')">
																<?php echo (($user5_img>=20)?'<img id="img_'.$treenumber.'['.$user5_id.']" onmouseover="mouseOver('.$user5_id.');" onmouseout="mouseOut('.$user5_id.');" src="images/03.png" />':(($user5_img>=10)?'<img id="img_'.$treenumber.'['.$user5_id.']" onmouseover="mouseOver('.$user5_id.');" onmouseout="mouseOut('.$user5_id.');" src="images/syellow.png" />':(($user5_img>=6)?'<img id="img_'.$treenumber.'['.$user5_id.']" onmouseover="mouseOver('.$user5_id.');" onmouseout="mouseOut('.$user5_id.');" src="images/sred.png" />':(($user5_img>=5)?'<img id="img_'.$treenumber.'['.$user5_id.']" onmouseover="mouseOver('.$user5_id.');" onmouseout="mouseOut('.$user5_id.');" src="images/sgreen.png" />':(($user5_img==4)?'<img id="img_'.$treenumber.'['.$user5_id.']" onmouseover="mouseOver('.$user5_id.');" onmouseout="mouseOut('.$user5_id.');" src="images/sorange.png" />':($user5_img>=1)?'<img id="img_'.$treenumber.'['.$user5_id.']" onmouseover="mouseOver('.$user5_id.');" onmouseout="mouseOut('.$user5_id.');" src="images/spurple.png" />':'<img id="img_'.$treenumber.'['.$user5_id.']" onmouseover="mouseOver('.$user5_id.');" onmouseout="mouseOut('.$user5_id.');" src="images/sgray.png" />')))))?>
															</a>
															<br />
															(<?=isset($_SESSION['uid'][$user5_id])?$_SESSION['uid'][$user5_id]:"0";?>)
															<?=$user5_name?>
															<div onmouseover="mouseOver(<?=$user5_id?>);" onmouseout="mouseOut(<?=$user5_id?>)" id="<?=$user5_id?>" style="background-color: rgba(0, 0, 0, 0.8); color:#FFFFFF; z-index:10; position: absolute; top: 3px; left: 55px; display:none"><?=$user5_nm?><br></div>
															(<?=isset($_SESSION['act_mems'][$user5_id])?$_SESSION['act_mems'][$user5_id]:"0";?>)
															<br />
															(<?=$user5_id;?>)
														</div>
													<? } ?>
                                                    <div class="float_clear"></div>
                                                    </li>
                                                    <li class="float_left">
     												<? if($user6_note == "inactive") { ?>
														<div class="float_right right_img">
															<a class="acolor" onclick="addmore_volunteers(<?=$user6_id?>,<?=$cnt_id?>,<?=$treenumber?>,'<?=$ele_name?>')"><img onmouseover="mouseOver(<?=$user6_id?>);"  id="img_<?=$treenumber?>[<?=$user6_id?>]" onmouseout="mouseOut(<?=$user6_id?>);" src="<?=SERVER_URL?>images/02.png" /></a>
															<div class="username_img">
																(<?=isset($_SESSION['uid'][$user6_id])?$_SESSION['uid'][$user6_id]:"0";?>)
																<?=$user6_name?>
																<div onmouseover="mouseOver(<?=$user6_id?>);" onmouseout="mouseOut(<?=$user6_id?>)" id="<?=$user6_id?>" style="background-color: rgba(0, 0, 0, 0.8); color:#FFFFFF; z-index:10; position: absolute; top: -46px; left: -15px; display:none"><?=$user6_nm?><br><? if(isset($_SESSION['ruid'][$user6_id]) && $_SESSION['ruid'][$user6_id]==1) { ?><a href="index.php?file=replace_volunteers&uid=<?=$user6_id?>">Replace</a><? } ?></div>
																(<?=isset($_SESSION['act_mems'][$user6_id])?$_SESSION['act_mems'][$user6_id]:"0";?>)
																<br />
																(<?=$user6_id;?>)
															</div>
														</div>
													<? }
													/* else if(isset($_SESSION['have_pay_yday'][$user6_id]) && $_SESSION['have_pay_yday'][$user6_id]){ ?>
														<div class="float_right right_img">
															<a class="acolor" onclick="addmore_volunteers(<?=$user6_id?>,<?=$cnt_id?>,<?=$treenumber?>,'<?=$ele_name?>')"><img onmouseover="mouseOver(<?=$user6_id?>);" onmouseout="mouseOut(<?=$user6_id?>);" id="img_<?=$treenumber?>[<?=$user6_id?>]" src="<?=SERVER_URL?>images/sred.png" /></a>
															<div class="username_img">
																(<?=isset($_SESSION['uid'][$user6_id])?$_SESSION['uid'][$user6_id]:"0";?>)
																<?=$user6_name?>
																<div onmouseover="mouseOver(<?=$user6_id?>);" onmouseout="mouseOut(<?=$user6_id?>)" id="<?=$user6_id?>" style="background-color: rgba(0, 0, 0, 0.8); color:#FFFFFF; z-index:10; position: absolute; top: -46px; left: -15px; display:none"><?=$user6_nm?><br><? if(isset($_SESSION['ruid'][$user6_id]) && $_SESSION['ruid'][$user6_id]==1) { ?><a href="index.php?file=replace_volunteers&uid=<?=$user6_id?>">Replace</a><? } ?></div>
																(<?=isset($_SESSION['act_mems'][$user6_id])?$_SESSION['act_mems'][$user6_id]:"0";?>)
																<br />
																(<?=$user6_id;?>)
															</div>
														</div>
													<? } else if(isset($_SESSION['have_pay_5day'][$user6_id]) && $_SESSION['have_pay_5day'][$user6_id]){ ?>
														<div class="float_right right_img">
															<a class="acolor" onclick="addmore_volunteers(<?=$user6_id?>,<?=$cnt_id?>,<?=$treenumber?>,'<?=$ele_name?>')"><img id="img_<?=$treenumber?>[<?=$user6_id?>]" onmouseover="mouseOver(<?=$user6_id?>);" onmouseout="mouseOut(<?=$user6_id?>);" src="<?=SERVER_URL?>images/dailyindicatior.png" /></a>
															<div class="username_img">
																(<?=isset($_SESSION['uid'][$user6_id])?$_SESSION['uid'][$user6_id]:"0";?>)
																<?=$user6_name?>
																<div onmouseover="mouseOver(<?=$user6_id?>);" onmouseout="mouseOut(<?=$user6_id?>)" id="<?=$user6_id?>" style="background-color: rgba(0, 0, 0, 0.8); color:#FFFFFF; z-index:10; position: absolute; top: -46px; left: -15px; display:none"><?=$user6_nm?><br><? if(isset($_SESSION['ruid'][$user6_id]) && $_SESSION['ruid'][$user6_id]==1) { ?><a href="index.php?file=replace_volunteers&uid=<?=$user6_id?>">Replace</a><? } ?></div>
																(<?=isset($_SESSION['act_mems'][$user6_id])?$_SESSION['act_mems'][$user6_id]:"0";?>)
																<br />
																(<?=$user6_id;?>)
															</div>
														</div>
													<? } else if($user6_img == "red" && $user6_img != "0" ){ ?>
														<div class="float_right right_img">
															<a class="acolor" onclick="addmore_volunteers(<?=$user6_id?>,<?=$cnt_id?>,<?=$treenumber?>,'<?=$ele_name?>')"><img id="img_<?=$treenumber?>[<?=$user6_id?>]" onmouseover="mouseOver(<?=$user6_id?>);" onmouseout="mouseOut(<?=$user6_id?>);" src="<?=SERVER_URL?>images/sred.png" /></a>
															<div class="username_img">
																(<?=isset($_SESSION['uid'][$user6_id])?$_SESSION['uid'][$user6_id]:"0";?>)
																<?=$user6_name?>
																<div onmouseover="mouseOver(<?=$user6_id?>);" onmouseout="mouseOut(<?=$user6_id?>)" id="<?=$user6_id?>" style="background-color: rgba(0, 0, 0, 0.8); color:#FFFFFF; z-index:10; position: absolute; top: -46px; left: -15px; display:none"><?=$user6_nm?><br><? if(isset($_SESSION['ruid'][$user6_id]) && $_SESSION['ruid'][$user6_id]==1) { ?><a href="index.php?file=replace_volunteers&uid=<?=$user6_id?>">Replace</a><? } ?></div>
																(<?=isset($_SESSION['act_mems'][$user6_id])?$_SESSION['act_mems'][$user6_id]:"0";?>)
																<br />
																(<?=$user6_id;?>)
															</div>
														</div>
													<? }*/
													 else if($user6_img == "none" && $user6_img != "0" ){?>
														<div class="float_right right_img"><img src="<?=SERVER_URL?>images/snone.png" /><div class="username_img"><?=$user6_name?></div></div>
													<? } else{  ?>
	                                                    <div class="float_right right_img">
															<a class="acolor" onclick="addmore_volunteers(<?=$user6_id?>,<?=$cnt_id?>,<?=$treenumber?>,'<?=$ele_name?>')">
																<?php echo (($user6_img>=20)?'<img id="img_'.$treenumber.'['.$user6_id.']" onmouseover="mouseOver('.$user6_id.');" onmouseout="mouseOut('.$user6_id.');" src="images/03.png" />':(($user6_img>=10)?'<img id="img_'.$treenumber.'['.$user6_id.']" onmouseover="mouseOver('.$user6_id.');" onmouseout="mouseOut('.$user6_id.');" src="images/syellow.png" />':(($user6_img>=6)?'<img id="img_'.$treenumber.'['.$user6_id.']" onmouseover="mouseOver('.$user6_id.');" onmouseout="mouseOut('.$user6_id.');" src="images/sred.png" />':(($user6_img>=5)?'<img id="img_'.$treenumber.'['.$user6_id.']" onmouseover="mouseOver('.$user6_id.');" onmouseout="mouseOut('.$user6_id.');" src="images/sgreen.png" />':(($user6_img==4)?'<img id="img_'.$treenumber.'['.$user6_id.']" onmouseover="mouseOver('.$user6_id.');" onmouseout="mouseOut('.$user6_id.');" src="images/sorange.png" />':($user6_img>=1)?'<img id="img_'.$treenumber.'['.$user6_id.']" onmouseover="mouseOver('.$user6_id.');" onmouseout="mouseOut('.$user6_id.');" src="images/spurple.png" />':'<img id="img_'.$treenumber.'['.$user6_id.']" onmouseover="mouseOver('.$user6_id.');" onmouseout="mouseOut('.$user6_id.');" src="images/sgray.png" />')))))?>
															</a>
															<div class="username_img">
																(<?=isset($_SESSION['uid'][$user6_id])?$_SESSION['uid'][$user6_id]:"0";?>)
																<?=$user6_name?>
																<div onmouseover="mouseOver(<?=$user6_id?>);" onmouseout="mouseOut(<?=$user6_id?>)" id="<?=$user6_id?>" style="background-color: rgba(0, 0, 0, 0.8); color:#FFFFFF; z-index:10; position: absolute; top: -46px; left: -15px; display:none"><?=$user6_name?><br></div>
																(<?=isset($_SESSION['act_mems'][$user6_id])?$_SESSION['act_mems'][$user6_id]:"0";?>)
																<br />
																(<?=$user6_id;?>)
															</div>
														</div>
													<? } ?>
                                                    <div class="float_clear"></div>
                                                    </li>
                                                </ul>
												<div class="clearboth" id="next_volunteers<?=$treenumber?>[<?=$_GET['cnt']?>]"></div>

<?
	function checkuseractivemembers($user_ids)
	{
		global $form;
		$sql = "select count(*) as tot_member_act from userdetail u,m_payment_fee mp  where u.inviter= '".$user_ids."'  and mp.usertb_id = u.UserId and payment_done = 'YES'";
		$rcd = $form->getRow($sql);
		$_SESSION['act_mems'][$user_ids] = isset($rcd['tot_member_act'])?$rcd['tot_member_act']:0;
	}

	function checkuserreplacelink($user_ids)
	{
		global $form;
		$sql = "select UserId from userdetail where active = 1 and inviter='".$user_ids."'";
		$rows = $form->getArray($sql);
		$rcd = sizeof($rows);
		//$uid = array();
		$firstuser = array();
		if($rcd != 0)
		{
			for($i=0;$i<sizeof($rows);$i++)
			{
				$sql = "select payment_done from m_payment_fee where usertb_id = '".$rows[$i]['UserId']."'";
				$row2 = $form->getRow($sql);
				if($row2['payment_done'] == 'YES')
				{
					$_SESSION['ruid'][$user_ids] = 0;
					return;
				}
				else
				{
					$sql = "select ud.UserId,mf.usertb_id from userdetail ud,m_payment_fee mf where ud.UserId = mf.usertb_id and ud.inviter = '".$rows[$i]['UserId']."' and mf.payment_done = 'YES'";
					$tm = $form->getRow($sql);
					$num = sizeof($tm);
					if($num > 0)
					{
						$_SESSION['ruid'][$user_ids] = 0;
					}
					else
					{
						$_SESSION['ruid'][$user_ids] = 1;
					}
				}
			}
		}
		else
		{
			$_SESSION['ruid'][$user_ids] = 1;
		}
		//$_SESSION['ruid'] = $thirduser;
	}
?>