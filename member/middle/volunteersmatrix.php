<script type="text/javascript" src="js/ajax_volunteers_matrix.js">
</script>
<?
$userids = (isset($_GET['user_id'])?$_GET['user_id']:(isset($_SESSION['userid'])?$_SESSION['userid']:0));
//$userids = "3894";
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
						
						$qry = "select payment_done from m_payment_fee where usertb_id = '".$userids."'";
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
								$qry = "select * from userdetail where inviter = '".$userids."' and active =1 and entry='prepaid'  and Placement = ''";
								$tmp = $form->getRow($qry);
								$you = $num = sizeof($tmp);
							}
						}
					?>
			</div>
			<?
			$qry = "select * from nodetree where usertb_id = '".$userids."'";
			$row = $form->getRow($qry);
			$msg = "";
			if(sizeof($row)>0)
			{
				$qry = "select CONCAT(FirstName,'&nbsp;&nbsp;',LastName) as Name from userdetail where UserId = '".$row['u1']."'";
				$user1 = $form->getRow($qry);
				
						if($row['u1'] != "0")
						{
							$user1_id = $row['u1'];
							$user1_name = $user1['Name'];//$row11['FirstName']."&nbsp;".$row11['LastName'];
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
				?>
				<!--<a class="acolor" href="volunteers.php?user_id=<?=$row['u1']?>"><?=$user1['Name']?></a>&nbsp;&nbsp;&nbsp;<?=$user1_note?>&nbsp;&nbsp;&nbsp;<a class="acolor" href="volunteers.php?user_id=<?=$row['u2']?>"><?=$user2['Name']?></a><?=(isset($user2['Name'])?"&nbsp;&nbsp;&nbsp;".$user2_note:"")?>&nbsp;&nbsp;&nbsp;<a class="acolor" href="volunteers.php?user_id=<?=$row['u3']?>"><?=$user3['Name']?></a><?=(isset($user3['Name'])?"&nbsp;&nbsp;&nbsp;".$user3_note:"")?><br />-->
				<?
			}
			if($row['u1'] != 0)
			{
				$qry = "select * from nodetree where usertb_id = '".$row['u1']."'";
				$row1 = $form->getRow($qry);
				$msg = "";
				if(sizeof($row1)>0)
				{
					if($row1['u1'] != "0")
					{
						$qry = "select * from userdetail where UserId = '".$row1['u1']."' and Placement = ''";
						$row11 = $form->getRow($qry);
						
						$user4_name = $row11['FirstName']."&nbsp;".$row11['LastName'];
						$user4_id = $row11['UserId'];
					}
					else
					{
						$user4_name = '';
					}
					if($row1['u2'] != "0")
					{
						$qry = "select * from userdetail where UserId = '".$row1['u2']."' and Placement = ''";
						$row11 = $form->getRow($qry);

						$user5_name = $row11['FirstName']."&nbsp;".$row11['LastName'];
						$user5_id = $row11['UserId'];
					}
					else
					{
						$user5_name = '';
					}
					if($row1['u3'] != "0")
					{
						$qry = "select * from userdetail where UserId = '".$row1['u3']."' and Placement = ''";
						$row11 = $form->getRow($qry);
						
						$user6_name = $row11['FirstName']."&nbsp;".$row11['LastName'];
						$user6_id = $row11['UserId'];
					}
					else
					{
						$user6_name = '';
					}
				}
			}
			if($row['u2'] != 0)
			{
				$qry = "select * from nodetree where usertb_id = '".$row['u2']."'";
				$row2 = $form->getRow($qry);
				$msg = "";
				if(sizeof($row2)>0)
				{
					if($row2['u1'] != "0")
					{
						$qry = "select * from userdetail where UserId = '".$row2['u1']."' and Placement = ''";
						$row11 = $form->getRow($qry);
						
						$user7_name = $row11['FirstName']."&nbsp;".$row11['LastName'];
						$user7_id = $row11['UserId'];
					}
					else
					{
						$user7_name = '';
					}
					if($row2['u2'] != "0")
					{
						$qry = "select * from userdetail where UserId = '".$row2['u2']."' and Placement = ''";
						$row11 = $form->getRow($qry);
						
						$user8_name = $row11['FirstName']."&nbsp;".$row11['LastName'];
						$user8_id = $row11['UserId'];
					}
					else
					{
						$user8_name = '';
					}
					if($row2['u3'] != "0")
					{
						$qry = "select * from userdetail where UserId = '".$row2['u3']."' and Placement = ''";
						$row11 = $form->getRow($qry);
						
						$user9_name = $row11['FirstName']."&nbsp;".$row11['LastName'];
						$user9_id = $row11['UserId'];
					}
					else
					{
						$user9_name = '';
					}
				}
			}
			if($row['u3'] != 0)
			{
				$qry = "select * from nodetree where usertb_id = '".$row['u3']."'";
				$row3 = $form->getRow($qry);
				$msg = "";
				if(sizeof($row3)>0)
				{
					if($row3['u1'] != "0")
					{
						$qry = "select * from userdetail where UserId = '".$row3['u1']."' and Placement = ''";
						$row11 = $form->getRow($qry);
						
						$user10_name = $row11['FirstName']."&nbsp;".$row11['LastName'];
						$user10_id = $row11['UserId'];
					}
					else
					{
						$user10_name = '';
					}
					if($row3['u2'] != "0")
					{
						$qry = "select * from userdetail where UserId = '".$row3['u2']."' and Placement = ''";
						$row11 = $form->getRow($qry);
						
						$user11_name = $row11['FirstName']."&nbsp;".$row11['LastName'];
						$user11_id = $row11['UserId'];
					}
					else
					{
						$user11_name = '';
					}
					if($row3['u3'] != "0")
					{
						$qry = "select * from userdetail where UserId = '".$row3['u3']."' and Placement = ''";
						$row11 = $form->getRow($qry);
						$user12_name = $row11['FirstName']."&nbsp;".$row11['LastName'];
						$user12_id = $row11['UserId'];
					}
					else
					{
						$user12_name = '';
					}
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
														<div class="floatleft"><a id="volunteers" class="acolor" href="javascript:void(0);" onclick="volunteers(<?=$user1_id?>,1,'volunteers')"><?=($user1_name!='')?'+&nbsp;&nbsp;':'+&nbsp;&nbsp;' ?></a><?=$user1_name?></div>
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
                                            	
                                            	<ul class="left top_move" id="ul_volunteers_name" style="display:none;">
                                                	<li class="float_left_mar">
       												<?
														if($user4_name != '')
														{
														?>
															<div class="floatleft"><a id="volunteers_expand1" class="acolor" href="javascript:void(0);" onclick="addmore_volunteers_name1(<?=$user4_id?>,1,'volunteers_expand1',1)"><?=($user4_name!='')?'+&nbsp;&nbsp;':'+&nbsp;&nbsp;' ?></a><?=$user4_name?></div>
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
													<input type="hidden" name="next_volunteers_name_cnt" id="next_volunteers_name_cnt" value="1" />
													<input type="hidden" name="volnumbers1" id="volnumbers1" value="1" />
                                                    <li class="float_left_mar">
     												<?
														if($user5_name != '')
														{
														?>
															<div><a id="volunteers_expand2" class="acolor" href="javascript:void(0);" onclick="addmore_volunteers_name1(<?=$user5_id?>,2,'volunteers_expand2',1)"><?=($user5_name!='')?'+&nbsp;&nbsp;':'+&nbsp;&nbsp;' ?></a><?=$user5_name?></div>
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
                                                    </li><br /><div class="clearboth" id="next_volunteers_name[2]"></div>
													<input type="hidden" name="volnumbers2" id="volnumbers2" value="2" />
													<input type="hidden" name="next_volunteers_name2_cnt" id="next_volunteers_name2_cnt" value="1" />
                                                    <li class="float_left_mar">
     												<?
														if($user6_name != '')
														{
														?>
															<div class="floatleft"><a id="volunteers_expand3" class="acolor" href="javascript:void(0);" onclick="addmore_volunteers_name1(<?=$user6_id?>,3,'volunteers_expand3',1)"><?=($user6_name!='')?'+&nbsp;&nbsp;':'+&nbsp;&nbsp;' ?></a><?=$user6_name?></div>
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
                                                    </li><div class="clearboth" id="next_volunteers_name[3]"></div>
													<input type="hidden" name="next_volunteers_name3_cnt" id="next_volunteers_name3_cnt" value="1" />
													<input type="hidden" name="volnumbers3" id="volnumbers3" value="3" />
                                                </ul>
												<input type="hidden" name="volnumbers" id="volnumbers" value="1" />
                                            </li><br />
                                          <li class="float_left">
     											<?
													if($user2_name != '')
													{
													?>
														<div><a id="volunteers2" class="acolor" href="javascript:void(0);" onclick="volunteers2(<?=$user2_id?>,1,'volunteers2')"><?=($user2_name!='')?'+&nbsp;&nbsp;':'+&nbsp;&nbsp;' ?></a><?=$user2_name?></div>
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
                                            	<ul class="top_move" id="ul_volunteers_name2" style="display:none;">
                                                	<li class="float_left_mar">
     												<?
														if($user7_name != '')
														{
														?>
															<div class="floatleft"><a id="volunteers2_expand1" class="acolor" href="javascript:void(0);" onclick="addmore_volunteers_name2(<?=$user7_id?>,1,'volunteers2_expand1')"><?=($user7_name!='')?'+&nbsp;&nbsp;':'+&nbsp;&nbsp;' ?></a><?=$user7_name?></div>
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
                                                    </li><br /><div class="clearboth" id="next_volunteers_name2[1]"></div>
													<input type="hidden" name="volnumbers21" id="volnumbers21" value="1" />
													<input type="hidden" name="next_volunteers_name4_cnt" id="next_volunteers_name4_cnt" value="1" />
                                                    <li class="float_left_mar">
     												<?
														if($user8_name != '')
														{
														?>
															<div><a id="volunteers2_expand2" class="acolor" href="javascript:void(0);" onclick="addmore_volunteers_name2(<?=$user8_id?>,2,'volunteers2_expand2')"><?=($user8_name!='')?'+&nbsp;&nbsp;':'+&nbsp;&nbsp;' ?></a><?=$user8_name?></div>
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
                                                    </li><br><div class="clearboth" id="next_volunteers_name2[2]"></div>
													<input type="hidden" name="volnumbers22" id="volnumbers22" value="5" />
													<input type="hidden" name="next_volunteers_name5_cnt" id="next_volunteers_name5_cnt" value="1" />
                                                    <li class="float_left_mar">
     												<?
														if($user9_name != '')
														{
														?>
															<div class="floatleft"><a id="volunteers2_expand3" class="acolor" href="javascript:void(0);" onclick="addmore_volunteers_name2(<?=$user9_id?>,3,'volunteers2_expand3')"><?=($user9_name!='')?'+&nbsp;&nbsp;':'+&nbsp;&nbsp;' ?></a><?=$user9_name?></div>
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
                                                    </li><div class="clearboth" id="next_volunteers_name2[3]"></div>
													<input type="hidden" name="volnumbers23" id="volnumbers23" value="3" />
													<input type="hidden" name="next_volunteers_name6_cnt" id="next_volunteers_name6_cnt" value="1" />
                                                </ul>
                                          </li><br />
                                          <li class="float_left">
											<?
													if($user3_name != '')
													{
													?>
														<div class="floatleft"><a id="volunteers3" class="acolor" href="javascript:void(0);" onclick="volunteers3(<?=$user3_id?>,1,'volunteers3')"><?=($user3_name!='')?'+&nbsp;&nbsp;':'+&nbsp;&nbsp;' ?></a><?=$user3_name?></div>
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
                                            	
                                                <ul class="right top_move" id="ul_volunteers_name3" style="display:none;">
                                                	<li class="float_left_mar">
													<?
														if($user10_name != '')
														{
														?>
															<div class="floatleft"><a id="volunteers3_expand1" class="acolor" href="javascript:void(0);" onclick="addmore_volunteers_name3(<?=$user10_id?>,1,'volunteers3_expand1')"><?=($user10_name!='')?'+&nbsp;&nbsp;':'+&nbsp;&nbsp;' ?></a><?=$user10_name?></div>
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
                                                    </li><br /><div class="clearboth" id="next_volunteers_name3[1]"></div>
													<input type="hidden" name="volnumbers31" id="volnumbers31" value="1" />
													<input type="hidden" name="next_volunteers_name7_cnt" id="next_volunteers_name7_cnt" value="1" />
                                                    <li class="float_left_mar">
													<?
														if($user11_name != '')
														{
														?>
															<div><a id="volunteers3_expand2" class="acolor" href="javascript:void(0);" onclick="addmore_volunteers_name3(<?=$user11_id?>,2,'volunteers3_expand2')"><?=($user11_name!='')?'+&nbsp;&nbsp;':'+&nbsp;&nbsp;' ?></a><?=$user11_name?></div>
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
                                                    </li><br /><div class="clearboth" id="next_volunteers_name3[2]"></div>
													<input type="hidden" name="volnumbers32" id="volnumbers32" value="2" />
													<input type="hidden" name="next_volunteers_name8_cnt" id="next_volunteers_name8_cnt" value="1" />
                                                    <li class="float_left_mar">
													<?
														if($user12_name != '')
														{
														?>
															<div class="floatleft"><a id="volunteers3_expand3" class="acolor" href="javascript:void(0);" onclick="addmore_volunteers_name3(<?=$user12_id?>,3,'volunteers3_expand3')"><?=($user12_name!='')?'+&nbsp;&nbsp;':'+&nbsp;&nbsp;' ?></a><?=$user12_name?></div>
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
                                                    </li><div class="clearboth" id="next_volunteers_name3[3]"></div>
													<input type="hidden" name="volnumbers33" id="volnumbers33" value="3" />
													<input type="hidden" name="next_volunteers_name9_cnt" id="next_volunteers_name9_cnt" value="1" />
                                                </ul>
                                          </li><br />
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                       		</div>
							
						<!-- /coding for display matrix in verticaly -->
						<div class="float_clear"></div>
