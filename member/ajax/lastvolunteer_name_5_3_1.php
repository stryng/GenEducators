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

	if(isset($_GET['vnumber']) && $_GET['vnumber'] != 0)
	{
			$qry = "select * from nodetree_5_3 where usertb_id = '".$_GET['vnumber']."'";
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
														<div class="floatleft"><a id="lvolunteers<?=$_GET['cnt']?>" class="acolor" href="javascript:void(0);" onclick="volunteers_namae_5_3(<?=$user1_id?>,<?=$_GET['cnt']?>1,'lvolunteers<?=$_GET['cnt']?>','next_volunteers_name')"><?=($user1_name!='')?'+&nbsp;&nbsp;':'+&nbsp;&nbsp;' ?></a><?=$user1_name?></div>
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
										  <input type="hidden" name="next_volunteers_name1" id="next_volunteers_name1" value="<?=$_GET['cnt']?>1" /></div><div class="float_clear"></div>
                                          <li class="float_left">
     											<?
													if($user2_name != '')
													{
													?>
														<div><a id="lvolunteers2<?=$_GET['cnt']?>" class="acolor" href="javascript:void(0);" onclick="volunteers_namae_5_3(<?=$user2_id?>,<?=$_GET['cnt']?>2,'lvolunteers2<?=$_GET['cnt']?>','next_volunteers_name2')"><?=($user2_name!='')?'+&nbsp;&nbsp;':'+&nbsp;&nbsp;' ?></a><?=$user2_name?></div>
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
                                          </li><br /><div class="clearboth" id="next_volunteers_name2[<?=$_GET['cnt']?>2]">
										  <input type="hidden" name="next_volunteers_name2" id="next_volunteers_name2" value="<?=$_GET['cnt']?>2" /></div><div class="float_clear"></div>
                                          <li class="float_left">
											<?
												if($user3_name != '')
												{
												?>
													<div class="floatleft"><a id="lvolunteers3<?=$_GET['cnt']?>" class="acolor" href="javascript:void(0);" onclick="volunteers_namae_5_3(<?=$user3_id?>,<?=$_GET['cnt']?>3,'lvolunteers3<?=$_GET['cnt']?>','next_volunteers_name3')"><?=($user3_name!='')?'+&nbsp;&nbsp;':'+&nbsp;&nbsp;' ?></a><?=$user3_name?></div>
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
													<div class="floatleft"><a id="lvolunteers4<?=$_GET['cnt']?>" class="acolor" href="javascript:void(0);" onclick="volunteers_namae_5_3(<?=$user4_id?>,<?=$_GET['cnt']?>4,'lvolunteers4<?=$_GET['cnt']?>','next_volunteers_name4')"><?=($user4_name!='')?'+&nbsp;&nbsp;':'+&nbsp;&nbsp;' ?></a><?=$user4_name?></div>
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
													<div class="floatleft"><a id="lvolunteers5<?=$_GET['cnt']?>" class="acolor" href="javascript:void(0);" onclick="volunteers_namae_5_3(<?=$user5_id?>,<?=$_GET['cnt']?>5,'lvolunteers5<?=$_GET['cnt']?>','next_volunteers_name5')"><?=($user5_name!='')?'+&nbsp;&nbsp;':'+&nbsp;&nbsp;' ?></a><?=$user5_name?></div>
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
										  <input type="hidden" name="next_volunteers_name5" id="next_volunteers_name5" value="<?=$_GET['cnt']?>5" /><div class="float_clear"></div><div class="float_clear"></div>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
<!--                            <div class="float_clear"></div>
							<input type="button" name="back" id="back" class="submit_btn" onclick="backbtn();" value="Back" />-->
                        </div>
						
						<!-- /coding for display matrix in verticaly -->
						
