<?
	require_once('../../business_logic/config/configure.php');
	require_once("../../business_logic/class/form.class.php");
	//echo $_REQUEST['action']; die;
	$form = new Form();

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

	if(isset($_GET['vnumber']) && $_GET['vnumber'] != 0)
	{
			$qry = "select * from nodetree_10_3 where usertb_id = '".$_GET['vnumber']."'";
			$row = $form->getRow($qry);
			$msg = "";
			if(sizeof($row)>0)
			{
				$qry = "select CONCAT(FirstName,'&nbsp;&nbsp;',LastName) as Name from userdetail where userid = '".$row['u1']."'";
				$user1 = $form->getRow($qry);
				
						if($row['u1'] != "0")
						{
							$qry = "select * from userdetail where UserId = '".$row['u1']."' and Placement = ''";
							$row11 = $form->getRow($qry);
							
							$user1_name = $row11['FirstName']."&nbsp;".$row11['LastName'];
							$user1_id = $row11['UserId'];
						}
						else
						{
							$user1_name = '';
						}
				
				$qry = "select CONCAT(FirstName,'&nbsp;&nbsp;',LastName) as Name from userdetail where userid = '".$row['u2']."'";
				$user2 = $form->getRow($qry);
				
						if($row['u2'] != "0")
						{
							$qry = "select * from userdetail where UserId = '".$row['u2']."' and Placement = ''";
							$row11 = $form->getRow($qry);
							
							$user2_name = $row11['FirstName']."&nbsp;".$row11['LastName'];
							$user2_id = $row11['UserId'];
						}
						else
						{
							$user2_name = '';
						}
				
				$qry = "select CONCAT(FirstName,'&nbsp;&nbsp;',LastName) as Name from userdetail where userid = '".$row['u3']."'";
				$user3 = $form->getRow($qry);
	
						if($row['u3'] != "0")
						{
							$qry = "select * from userdetail where UserId = '".$row['u3']."' and Placement = ''";
							$row11 = $form->getRow($qry);
							
							$user3_name = $row11['FirstName']."&nbsp;".$row11['LastName'];
							$user3_id = $row11['UserId'];
						}
						else
						{
							$user3_name = '';
						}
				$qry = "select CONCAT(FirstName,'&nbsp;&nbsp;',LastName) as Name from userdetail where userid = '".$row['u4']."'";
				$user4 = $form->getRow($qry);
				
						if($row['u4'] != "0")
						{
							$qry = "select * from userdetail where UserId = '".$row['u4']."' and Placement = ''";
							$row11 = $form->getRow($qry);
							
							$user4_name = $row11['FirstName']."&nbsp;".$row11['LastName'];
							$user4_id = $row11['UserId'];
						}
						else
						{
							$user4_name = '';
						}
				
				$qry = "select CONCAT(FirstName,'&nbsp;&nbsp;',LastName) as Name from userdetail where userid = '".$row['u5']."'";
				$user5 = $form->getRow($qry);
				
						if($row['u5'] != "0")
						{
							$qry = "select * from userdetail where UserId = '".$row['u5']."' and Placement = ''";
							$row11 = $form->getRow($qry);
							
							$user5_name = $row11['FirstName']."&nbsp;".$row11['LastName'];
							$user5_id = $row11['UserId'];
						}
						else
						{
							$user5_name = '';
						}
				$qry = "select CONCAT(FirstName,'&nbsp;&nbsp;',LastName) as Name from userdetail where userid = '".$row['u6']."'";
				$user6 = $form->getRow($qry);
				
						if($row['u6'] != "0")
						{
							$qry = "select * from userdetail where UserId = '".$row['u6']."' and Placement = ''";
							$row11 = $form->getRow($qry);
							
							$user6_name = $row11['FirstName']."&nbsp;".$row11['LastName'];
							$user6_id = $row11['UserId'];
						}
						else
						{
							$user6_name = '';
						}
				
				$qry = "select CONCAT(FirstName,'&nbsp;&nbsp;',LastName) as Name from userdetail where userid = '".$row['u7']."'";
				$user7 = $form->getRow($qry);
				
						if($row['u7'] != "0")
						{
							$qry = "select * from userdetail where UserId = '".$row['u7']."' and Placement = ''";
							$row11 = $form->getRow($qry);
							
							$user7_name = $row11['FirstName']."&nbsp;".$row11['LastName'];
							$user7_id = $row11['UserId'];
						}
						else
						{
							$user7_name = '';
						}
				
				$qry = "select CONCAT(FirstName,'&nbsp;&nbsp;',LastName) as Name from userdetail where userid = '".$row['u8']."'";
				$user8 = $form->getRow($qry);
				
						if($row['u8'] != "0")
						{
							$qry = "select * from userdetail where UserId = '".$row['u8']."' and Placement = ''";
							$row11 = $form->getRow($qry);
							
							$user8_name = $row11['FirstName']."&nbsp;".$row11['LastName'];
							$user8_id = $row11['UserId'];
						}
						else
						{
							$user8_name = '';
						}
				$qry = "select CONCAT(FirstName,'&nbsp;&nbsp;',LastName) as Name from userdetail where userid = '".$row['u9']."'";
				$user9 = $form->getRow($qry);
				
						if($row['u9'] != "0")
						{
							$qry = "select * from userdetail where UserId = '".$row['u9']."' and Placement = ''";
							$row11 = $form->getRow($qry);
							
							$user9_name = $row11['FirstName']."&nbsp;".$row11['LastName'];
							$user9_id = $row11['UserId'];
						}
						else
						{
							$user9_name = '';
						}
				
				$qry = "select CONCAT(FirstName,'&nbsp;&nbsp;',LastName) as Name from userdetail where userid = '".$row['u10']."'";
				$user10 = $form->getRow($qry);
				
						if($row['u10'] != "0")
						{
							$qry = "select * from userdetail where UserId = '".$row['u10']."' and Placement = ''";
							$row11 = $form->getRow($qry);
							
							$user10_name = $row11['FirstName']."&nbsp;".$row11['LastName'];
							$user10_id = $row11['UserId'];
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
						
							<div class="float_clear"></div>
							
                        	<div class="structure float_left">
                            	<ul class="first_per">
									<li>
                                    	<ul class="second_portion">
                                           <li class="float_left">
												<?
													if($user1_name != '')
													{
													?>
														<div class="floatleft"><a id="lvolunteers<?=$_GET['cnt']?>" class="acolor" href="javascript:void(0);" onclick="volunteers_namae_10_3(<?=$user1_id?>,<?=$_GET['cnt']?>1,'lvolunteers<?=$_GET['cnt']?>','next_volunteers_name')"><?=($user1_name!='')?'+&nbsp;&nbsp;':'+&nbsp;&nbsp;' ?></a><?=$user1_name?></div>
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
                                            </li><br /><div class="clearboth" id="next_volunteers_name[<?=$_GET['cnt']?>1]">
										  <input type="hidden" name="next_volunteers_name" id="next_volunteers_name" value="<?=$_GET['cnt']?>1" /></div><div class="float_clear"></div>
                                          <li class="float_left">
     											<?
													if($user2_name != '')
													{
													?>
														<div><a id="lvolunteers2<?=$_GET['cnt']?>" class="acolor" href="javascript:void(0);" onclick="volunteers_namae_10_3(<?=$user2_id?>,<?=$_GET['cnt']?>2,'lvolunteers2<?=$_GET['cnt']?>','next_volunteers_name2')"><?=($user2_name!='')?'+&nbsp;&nbsp;':'+&nbsp;&nbsp;' ?></a><?=$user2_name?></div>
													<?
													}
													else
													{
													?>
														<div>-&nbsp;&nbsp;(empty)</div>
													<?
													}
												?>
                                                <div class="float_clear"></div>
                                          </li><br /><div class="clearboth" id="next_volunteers_name2[<?=$_GET['cnt']?>2]">
										  <input type="hidden" name="next_volunteers_name2" id="next_volunteers_name2" value="<?=$_GET['cnt']?>2" /></div><div class="float_clear"></div>
                                          <li class="float_left">
											<?
													if($user3_name != '')
													{
													?>
														<div class="floatleft"><a id="lvolunteers3<?=$_GET['cnt']?>" class="acolor" href="javascript:void(0);" onclick="volunteers_namae_10_3(<?=$user3_id?>,<?=$_GET['cnt']?>3,'lvolunteers3<?=$_GET['cnt']?>','next_volunteers_name3')"><?=($user3_name!='')?'+&nbsp;&nbsp;':'+&nbsp;&nbsp;' ?></a><?=$user3_name?></div>
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
                                          </li><br /><div class="clearboth" id="next_volunteers_name3[<?=$_GET['cnt']?>3]">
										  <input type="hidden" name="next_volunteers_name3" id="next_volunteers_name3" value="<?=$_GET['cnt']?>3" /></div><div class="float_clear"></div>
                                          <li class="float_left">
											<?
													if($user4_name != '')
													{
													?>
														<div class="floatleft"><a id="lvolunteers4<?=$_GET['cnt']?>" class="acolor" href="javascript:void(0);" onclick="volunteers_namae_10_3(<?=$user4_id?>,<?=$_GET['cnt']?>4,'lvolunteers4<?=$_GET['cnt']?>','next_volunteers_name4')"><?=($user4_name!='')?'+&nbsp;&nbsp;':'+&nbsp;&nbsp;' ?></a><?=$user4_name?></div>
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
                                          </li><br /><div class="clearboth" id="next_volunteers_name4[<?=$_GET['cnt']?>4]">
										  <input type="hidden" name="next_volunteers_name4" id="next_volunteers_name4" value="<?=$_GET['cnt']?>4" /></div><div class="float_clear"></div>
                                          <li class="float_left">
											<?
													if($user5_name != '')
													{
													?>
														<div class="floatleft"><a id="lvolunteers5<?=$_GET['cnt']?>" class="acolor" href="javascript:void(0);" onclick="volunteers_namae_10_3(<?=$user5_id?>,<?=$_GET['cnt']?>5,'lvolunteers5<?=$_GET['cnt']?>','next_volunteers_name5')"><?=($user5_name!='')?'+&nbsp;&nbsp;':'+&nbsp;&nbsp;' ?></a><?=$user5_name?></div>
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
                                          </li><br /><div class="clearboth" id="next_volunteers_name5[<?=$_GET['cnt']?>5]">
										  <input type="hidden" name="next_volunteers_name5" id="next_volunteers_name5" value="<?=$_GET['cnt']?>5" /></div><div class="float_clear"></div>
                                          <li class="float_left">
												<?
													if($user6_name != '')
													{
													?>
														<div class="floatleft"><a id="lvolunteers6<?=$_GET['cnt']?>" class="acolor" href="javascript:void(0);" onclick="volunteers_namae_10_3(<?=$user6_id?>,<?=$_GET['cnt']?>6,'lvolunteers6<?=$_GET['cnt']?>','next_volunteers_name6')"><?=($user6_name!='')?'+&nbsp;&nbsp;':'+&nbsp;&nbsp;' ?></a><?=$user6_name?></div>
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
                                            </li><br /><div class="clearboth" id="next_volunteers_name6[<?=$_GET['cnt']?>6]">
										  <input type="hidden" name="next_volunteers_name6" id="next_volunteers_name6" value="<?=$_GET['cnt']?>6" /></div><div class="float_clear"></div>
                                          <li class="float_left">
     											<?
													if($user7_name != '')
													{
													?>
														<div><a id="lvolunteers7<?=$_GET['cnt']?>" class="acolor" href="javascript:void(0);" onclick="volunteers_namae_10_3(<?=$user7_id?>,<?=$_GET['cnt']?>7,'lvolunteers7<?=$_GET['cnt']?>','next_volunteers_name7')"><?=($user7_name!='')?'+&nbsp;&nbsp;':'+&nbsp;&nbsp;' ?></a><?=$user7_name?></div>
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
                                          </li><br /><div class="clearboth" id="next_volunteers_name7[<?=$_GET['cnt']?>7]">
										  <input type="hidden" name="next_volunteers_name7" id="next_volunteers_name7" value="<?=$_GET['cnt']?>7" /></div><div class="float_clear"></div>
                                          <li class="float_left">
												<?
														if($user8_name != '')
														{
														?>
															<div class="floatleft"><a id="lvolunteers8<?=$_GET['cnt']?>" class="acolor" href="javascript:void(0);" onclick="volunteers_namae_10_3(<?=$user8_id?>,<?=$_GET['cnt']?>8,'lvolunteers8<?=$_GET['cnt']?>','next_volunteers_name8')"><?=($user8_name!='')?'+&nbsp;&nbsp;':'+&nbsp;&nbsp;' ?></a><?=$user8_name?></div>
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
                                          </li><br /><div class="clearboth" id="next_volunteers_name8[<?=$_GET['cnt']?>8]">
										  <input type="hidden" name="next_volunteers_name8" id="next_volunteers_name8" value="<?=$_GET['cnt']?>8" /></div><div class="float_clear"></div>
                                          <li class="float_left">
												<?
														if($user9_name != '')
														{
														?>
															<div class="floatleft"><a id="lvolunteers9<?=$_GET['cnt']?>" class="acolor" href="javascript:void(0);" onclick="volunteers_namae_10_3(<?=$user9_id?>,<?=$_GET['cnt']?>9,'lvolunteers9<?=$_GET['cnt']?>','next_volunteers_name9')"><?=($user9_name!='')?'+&nbsp;&nbsp;':'+&nbsp;&nbsp;' ?></a><?=$user9_name?></div>
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
                                          </li><br /><div class="clearboth" id="next_volunteers_name9[<?=$_GET['cnt']?>9]">
										  <input type="hidden" name="next_volunteers_name9" id="next_volunteers_name9" value="<?=$_GET['cnt']?>9" /></div><div class="float_clear"></div>
                                          <li class="float_left">
												<?
														if($user10_name != '')
														{
														?>
															<div class="floatleft"><a id="lvolunteers10<?=$_GET['cnt']?>" class="acolor" href="javascript:void(0);" onclick="volunteers_namae_10_3(<?=$user10_id?>,<?=$_GET['cnt']?>10,'lvolunteers10<?=$_GET['cnt']?>','next_volunteers_name10')"><?=($user10_name!='')?'+&nbsp;&nbsp;':'+&nbsp;&nbsp;' ?></a><?=$user10_name?></div>
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
                                          </li><br /><div class="clearboth" id="next_volunteers_name10[<?=$_GET['cnt']?>10]">
										  <input type="hidden" name="next_volunteers_name10" id="next_volunteers_name10" value="<?=$_GET['cnt']?>10" /></div><div class="float_clear"></div>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
<!--                            <div class="float_clear"></div>
							<input type="button" name="back" id="back" class="submit_btn" onclick="backbtn();" value="Back" />-->
                        </div>
						
						<!-- /coding for display matrix in verticaly -->
						
