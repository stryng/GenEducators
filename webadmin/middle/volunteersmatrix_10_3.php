<?php
	$msg = "";
?>
<script type="text/javascript" src="js/ajax_volunteers_matrix.js">
</script>
<script type="text/javascript">
function backbtn()
{
	parent.history.back(); return false;
}
</script>
<?
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
						$top_name = $row['FirstName']."&nbsp;".$row['LastName'];
						
						$qry = "select payment_done from m_payment_fee_10_3 where usertb_id = '".$userids."' and  activedeactive = 'active'";
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
								$qry = "select * from userdetail where inviter_10_3 = '".$userids."' and active =1 and entry_10_3='prepaid' ";
								$tmp = $form->getRow($qry);
								$you = $num = sizeof($tmp);
							}
						}
			$qry = "select * from nodetree_10_3 where usertb_id = '".$userids."'";
			$row = $form->getRow($qry);
			$msg = "";
			if(sizeof($row)>0)
			{
				$qry = "select CONCAT(FirstName,'&nbsp;&nbsp;',LastName) as Name from userdetail where UserId = '".$row['u1']."'";
				$user1 = $form->getRow($qry);
				
						if($row['u1'] != "0")
						{
							$user1_id = $row['u1'];
							$user1_name = $user1['Name'];
						}
						else
						{
							$user1_name = '';
						}
				
				$qry = "select CONCAT(FirstName,'&nbsp;&nbsp;',LastName) as Name from userdetail where UserId = '".$row['u2']."'";
				$user2 = $form->getRow($qry);
				
						if($row['u2'] != "0")
						{
							$user2_id = $row['u2'];
							$user2_name = $user2['Name'];
						}
						else
						{
							$user2_name = '';
						}
				
				$qry = "select CONCAT(FirstName,'&nbsp;&nbsp;',LastName) as Name from userdetail where UserId = '".$row['u3']."'";
				$user3 = $form->getRow($qry);
	
						if($row['u3'] != "0")
						{
							$user3_id = $row['u3'];
							$user3_name = $user3['Name'];
						}
						else
						{
							$user3_name = '';
						}
						
				$qry = "select CONCAT(FirstName,'&nbsp;&nbsp;',LastName) as Name from userdetail where UserId = '".$row['u4']."'";
				$user4 = $form->getRow($qry);
				
						if($row['u4'] != "0")
						{
							$user4_id = $row['u4'];
							$user4_name = $user4['Name'];
						}
						else
						{
							$user4_name = '';
						}
				
				$qry = "select CONCAT(FirstName,'&nbsp;&nbsp;',LastName) as Name from userdetail where UserId = '".$row['u5']."'";
				$user5 = $form->getRow($qry);
				
						if($row['u5'] != "0")
						{
							$user5_id = $row['u5'];
							$user5_name = $user5['Name'];
						}
						else
						{
							$user5_name = '';
						}
						
				$qry = "select CONCAT(FirstName,'&nbsp;&nbsp;',LastName) as Name from userdetail where UserId = '".$row['u6']."'";
				$user6 = $form->getRow($qry);
				
						if($row['u6'] != "0")
						{
							$user6_id = $row['u6'];
							$user6_name = $user6['Name'];
						}
						else
						{
							$user6_name = '';
						}
				
				$qry = "select CONCAT(FirstName,'&nbsp;&nbsp;',LastName) as Name from userdetail where UserId = '".$row['u7']."'";
				$user7 = $form->getRow($qry);
				
						if($row['u7'] != "0")
						{
							$user7_id = $row['u7'];
							$user7_name = $user7['Name'];
						}
						else
						{
							$user7_name = '';
						}
				
				$qry = "select CONCAT(FirstName,'&nbsp;&nbsp;',LastName) as Name from userdetail where UserId = '".$row['u8']."'";
				$user8 = $form->getRow($qry);
	
						if($row['u8'] != "0")
						{
							$user8_id = $row['u8'];
							$user8_name = $user8['Name'];
						}
						else
						{
							$user8_name = '';
						}
						
				$qry = "select CONCAT(FirstName,'&nbsp;&nbsp;',LastName) as Name from userdetail where UserId = '".$row['u9']."'";
				$user9 = $form->getRow($qry);
				
						if($row['u9'] != "0")
						{
							$user9_id = $row['u9'];
							$user9_name = $user9['Name'];
						}
						else
						{
							$user9_name = '';
						}
				
				$qry = "select CONCAT(FirstName,'&nbsp;&nbsp;',LastName) as Name from userdetail where UserId = '".$row['u10']."'";
				$user10 = $form->getRow($qry);
				
						if($row['u10'] != "0")
						{
							$user10_id = $row['u10'];
							$user10_name = $user10['Name'];
						}
						else
						{
							$user10_name = '';
						}
				?>
				<!--<a class="acolor" href="volunteers.php?user_id=<?=$row['u1']?>"><?=$user1['Name']?></a>&nbsp;&nbsp;&nbsp;<?=$user1_note?>&nbsp;&nbsp;&nbsp;<a class="acolor" href="volunteers.php?user_id=<?=$row['u2']?>"><?=$user2['Name']?></a><?=(isset($user2['Name'])?"&nbsp;&nbsp;&nbsp;".$user2_note:"")?>&nbsp;&nbsp;&nbsp;<a class="acolor" href="volunteers.php?user_id=<?=$row['u3']?>"><?=$user3['Name']?></a><?=(isset($user3['Name'])?"&nbsp;&nbsp;&nbsp;".$user3_note:"")?><br />-->
				<?
			}
}
?>
						<!-- coding for display matrix in verticaly -->
						
							<div class="container_mlm main">
							
                        	<div class="structure float_left" style="font-size:12px;">
                            	<ul class="first_per">
									<li class="per_one"><strong><?=$top_name?></strong>
									</li>
									<li>
                                    	<ul class="second_portion">
                                            <li class="float_left">
												<?
													if($user1_name != '')
													{
													?>
													<!--<div class="floatleft"><a id="volunteers" class="acolor" href="javascript:void(0);" onclick="volunteers_namae_10_3(<?=$user1_id?>,1,'volunteers','next_volunteers_name')"><?=($user1_img>=1)?'+&nbsp;&nbsp;':'+&nbsp;&nbsp;' ?></a><?=$user1_name?></div>-->
														<div class="floatleft"><a id="volunteers" class="acolor" href="javascript:void(0);" onclick="volunteers_namae_10_3(<?=$user1_id?>,1,'volunteers','next_volunteers_name')"><?=($user1_name!='')?'+&nbsp;&nbsp;':'+&nbsp;&nbsp;' ?></a><?=$user1_name?></div>
													<?
													}
													else
													{
													?>
														<div class="floatleft">-&nbsp;&nbsp;(empty)</div>
													<?
													}
												?>
                                                <div class="float_clear"></div>
												<!--<input type="hidden" value="1" id="next_volunteers_cnt" name="next_volunteers_cnt" />-->
                                            </li><br /><div class="clearboth" id="next_volunteers_name[1]"></div>
										  <input type="hidden" name="next_volunteers_name" id="next_volunteers_name" value="1" /><div class="float_clear"></div>
                                          <li class="float_left">
     												<?
													if($user2_name != '')
													{
													?>
     													<div><a id="volunteers2" class="acolor" href="javascript:void(0);" onclick="volunteers_namae_10_3(<?=$user2_id?>,2,'volunteers2','next_volunteers_name2')"><?=($user2_name!='')?'+&nbsp;&nbsp;':'+&nbsp;&nbsp;' ?></a><?=$user2_name?></div>
													<?
													}
													else
													{
													?>
														<div class="floatleft">-&nbsp;&nbsp;(empty)</div>
													<?
													}
												?>
                                                <div class="float_clear"></div>
                                          </li><br /><div class="clearboth" id="next_volunteers_name2[2]"></div>
										  <input type="hidden" name="next_volunteers_name2" id="next_volunteers_name2" value="2" /><div class="float_clear"></div>
                                          <li class="float_left">
											<?
													if($user3_name != '')
													{
													?>
     													<div class="floatleft"><a id="volunteers3" class="acolor" href="javascript:void(0);" onclick="volunteers_namae_10_3(<?=$user3_id?>,3,'volunteers3','next_volunteers_name3')"><?=($user3_name!='')?'+&nbsp;&nbsp;':'+&nbsp;&nbsp;' ?></a><?=$user3_name?></div>
													<?
													}
													else
													{
													?>
														<div class="floatleft">-&nbsp;&nbsp;(empty)</div>
													<?
													}
												?>
                                            <div class="float_clear"></div>
                                          </li><br /><div class="clearboth" id="next_volunteers_name3[3]"></div>
										  <input type="hidden" name="next_volunteers_name3" id="next_volunteers_name3" value="3" /><div class="float_clear"></div>
                                          <li class="float_left">
											<?
													if($user4_name != '')
													{
													?>
     													<div class="floatleft"><a id="volunteers4" class="acolor" href="javascript:void(0);" onclick="volunteers_namae_10_3(<?=$user4_id?>,4,'volunteers4','next_volunteers_name4')"><?=($user4_name!='')?'+&nbsp;&nbsp;':'+&nbsp;&nbsp;' ?></a><?=$user4_name?></div>
													<?
													}
													else
													{
													?>
														<div class="floatleft">-&nbsp;&nbsp;(empty)</div>
													<?
													}
												?>
                                            <div class="float_clear"></div>
                                          </li><br /><div class="clearboth" id="next_volunteers_name4[4]"></div>
										  <input type="hidden" name="next_volunteers_name4" id="next_volunteers_name4" value="4" /><div class="float_clear"></div>
                                          <li class="float_left">
											<?
													if($user5_name != '')
													{
													?>
     													<div class="floatleft"><a id="volunteers5" class="acolor" href="javascript:void(0);" onclick="volunteers_namae_10_3(<?=$user5_id?>,5,'volunteers5','next_volunteers_name5')"><?=($user5_name!='')?'+&nbsp;&nbsp;':'+&nbsp;&nbsp;' ?></a><?=$user5_name?></div>
													<?
													}
													else
													{
													?>
														<div class="floatleft">-&nbsp;&nbsp;(empty)</div>
													<?
													}
												?>
                                            <div class="float_clear"></div>
                                          </li><br /><div class="clearboth" id="next_volunteers_name5[5]"></div>
										  <input type="hidden" name="next_volunteers_name5" id="next_volunteers_name5" value="5" /><div class="float_clear"></div>
										  <li class="float_left">
												<?
													if($user6_name != '')
													{
													?>
     													<div class="floatleft"><a id="volunteers6" class="acolor" href="javascript:void(0);" onclick="volunteers_namae_10_3(<?=$user6_id?>,6,'volunteers6','next_volunteers_name6')"><?=($user6_name!='')?'+&nbsp;&nbsp;':'+&nbsp;&nbsp;' ?></a><?=$user6_name?></div>
													<?
													}
													else
													{
													?>
														<div class="floatleft">-&nbsp;&nbsp;(empty)</div>
													<?
													}
												?>
                                                <div class="float_clear"></div>
												<!--<input type="hidden" value="1" id="next_volunteers_cnt" name="next_volunteers_cnt" />-->
                                            </li><br /><div class="clearboth" id="next_volunteers_name6[6]"></div>
										  <input type="hidden" name="next_volunteers_name6" id="next_volunteers_name6" value="6" /><div class="float_clear"></div>
                                          <li class="float_left">
     												<?
													if($user7_name != '')
													{
													?>
     													<div class="floatleft"><a id="volunteers7" class="acolor" href="javascript:void(0);" onclick="volunteers_namae_10_3(<?=$user7_id?>,7,'volunteers7','next_volunteers_name7')"><?=($user7_name!='')?'+&nbsp;&nbsp;':'+&nbsp;&nbsp;' ?></a><?=$user7_name?></div>
													<?
													}
													else
													{
													?>
														<div class="floatleft">-&nbsp;&nbsp;(empty)</div>
													<?
													}
												?>
                                                <div class="float_clear"></div>
                                          </li><br /><div class="clearboth" id="next_volunteers_name7[7]"></div>
										  <input type="hidden" name="next_volunteers_name7" id="next_volunteers_name7" value="7" /><div class="float_clear"></div>
                                          <li class="float_left">
											<?
													if($user8_name != '')
													{
													?>
     													<div class="floatleft"><a id="volunteers8" class="acolor" href="javascript:void(0);" onclick="volunteers_namae_10_3(<?=$user8_id?>,8,'volunteers8','next_volunteers_name8')"><?=($user8_name!='')?'+&nbsp;&nbsp;':'+&nbsp;&nbsp;' ?></a><?=$user8_name?></div>
													<?
													}
													else
													{
													?>
														<div class="floatleft">-&nbsp;&nbsp;(empty)</div>
													<?
													}
												?>
                                            <div class="float_clear"></div>
                                          </li><br /><div class="clearboth" id="next_volunteers_name8[8]"></div>
										  <input type="hidden" name="next_volunteers_name8" id="next_volunteers_name8" value="8" /><div class="float_clear"></div>
                                          <li class="float_left">
											<?
													if($user9_name != '')
													{
													?>
													<!--<div class="floatleft"><a id="volunteers9" class="acolor" href="javascript:void(0);" onclick="volunteers_namae_10_3(<?=$user4_id?>,1,'volunteers9','next_volunteers_name9')"><?=($user9_img>=1)?'+&nbsp;&nbsp;':'+&nbsp;&nbsp;' ?></a><?=$user9_name?></div>-->
     													<div class="floatleft"><a id="volunteers9" class="acolor" href="javascript:void(0);" onclick="volunteers_namae_10_3(<?=$user9_id?>,9,'volunteers9','next_volunteers_name9')"><?=($user9_name!='')?'+&nbsp;&nbsp;':'+&nbsp;&nbsp;' ?></a><?=$user9_name?></div>
													<?
													}
													else
													{
													?>
														<div class="floatleft">-&nbsp;&nbsp;(empty)</div>
													<?
													}
												?>
                                            <div class="float_clear"></div>
                                          </li><br /><div class="clearboth" id="next_volunteers_name9[9]"></div>
										  <input type="hidden" name="next_volunteers_name9" id="next_volunteers_name9" value="9" /><div class="float_clear"></div>
                                          <li class="float_left">
											<?
													if($user10_name != '')
													{
													?>
													<!--<div class="floatleft"><a id="volunteers10" class="acolor" href="javascript:void(0);" onclick="volunteers_namae_10_3(<?=$user10_id?>,1,'volunteers10','next_volunteers_name10')"><?=($user10_img>=1)?'+&nbsp;&nbsp;':'+&nbsp;&nbsp;' ?></a><?=$user10_name?></div>-->
     													<div class="floatleft"><a id="volunteers10" class="acolor" href="javascript:void(0);" onclick="volunteers_namae_10_3(<?=$user10_id?>,10,'volunteers10','next_volunteers_name10')"><?=($user10_name!='')?'+&nbsp;&nbsp;':'+&nbsp;&nbsp;' ?></a><?=$user10_name?></div>
													<?
													}
													else
													{
													?>
														<div class="floatleft">-&nbsp;&nbsp;(empty)</div>
													<?
													}
												?>
                                            <div class="float_clear"></div>
                                          </li><br /><div class="clearboth" id="next_volunteers_name10[10]"></div>
										  <input type="hidden" name="next_volunteers_name10" id="next_volunteers_name10" value="10" /><div class="float_clear"></div>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                        </div>
						
						<!-- /coding for display matrix in verticaly -->
						<div class="float_clear"></div>
						
