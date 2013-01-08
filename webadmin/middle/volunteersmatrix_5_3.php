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
						
						$qry = "select payment_done from m_payment_fee_5_3 where usertb_id = '".$userids."' and  activedeactive = 'active'";
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
								$qry = "select * from userdetail where inviter_5_3 = '".$userids."' and active =1 and entry_5_3='prepaid'  and Placement = ''";
								$tmp = $form->getRow($qry);
								$you = $num = sizeof($tmp);
							}
						}
			$qry = "select * from nodetree_5_3 where usertb_id = '".$userids."'";
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
							$user4_name = '';
						}
			}
}
?>
						<!-- coding for display matrix in verticaly -->
						
							<div class="container_mlm main">
								<div class="structure float_left">
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
														<div class="floatleft"><a id="volunteers" class="acolor" href="javascript:void(0);" onclick="volunteers_namae_5_3(<?=$user1_id?>,1,'volunteers','next_volunteers_name')"><?=($user1_name!='')?'+&nbsp;&nbsp;':'+&nbsp;&nbsp;' ?></a><?=$user1_name?></div>
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
                                            </li><br /><div class="clearboth" id="next_volunteers_name[1]"></div>
										  <input type="hidden" name="next_volunteers_name" id="next_volunteers_name" value="1" /><div class="float_clear"></div>
                                          <li class="float_left">
										  		<?
													if($user2_name != '')
													{
													?>
     													<div><a id="volunteers2" class="acolor" href="javascript:void(0);" onclick="volunteers_namae_5_3(<?=$user2_id?>,2,'volunteers2','next_volunteers_name2')"><?=($user2_img>=1)?'+&nbsp;&nbsp;':'+&nbsp;&nbsp;' ?></a><?=$user2_name?></div>
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
														<div class="float_left"><a id="volunteers3" class="acolor" href="javascript:void(0);" onclick="volunteers_namae_5_3(<?=$user3_id?>,3,'volunteers3','next_volunteers_name3')"><?=($user3_name!='')?'+&nbsp;&nbsp;':'+&nbsp;&nbsp;' ?></a><?=$user3_name?></div>
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
														<div class="float_left"><a id="volunteers4" class="acolor" href="javascript:void(0);" onclick="volunteers_namae_5_3(<?=$user4_id?>,4,'volunteers4','next_volunteers_name4')"><?=($user4_name!='')?'+&nbsp;&nbsp;':'+&nbsp;&nbsp;' ?></a><?=$user4_name?></div>
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
														<div class="float_left"><a id="volunteers5" class="acolor" href="javascript:void(0);" onclick="volunteers_namae_5_3(<?=$user5_id?>,5,'volunteers5','next_volunteers_name5')"><?=($user5_name!='')?'+&nbsp;&nbsp;':'+&nbsp;&nbsp;' ?></a><?=$user5_name?></div>
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
                                        </ul>
                                    </li>
                                </ul>
                            </div>
	                        </div>
						
						<!-- /coding for display matrix in verticaly -->
						<div class="float_clear"></div>
