<?
$sql = "select * from userdetail where UserId = '".$_SESSION['admin']['userid']."'";
$rows_user = $form->getRow($sql);
$userids = (isset($_GET['user_id'])?$_GET['user_id']:(isset($_SESSION['admin']['userid'])?$_SESSION['admin']['userid']:0));

//$userid = "3894";
$qry = "select * from userdetail where UserId = '".$userids."' and active =1";// and entry='prepaid' ";
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

$you_id = "0";
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

$you_note = "";
$you = "0";
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

$user1_note_5_3 = "";
$user2_note_5_3 = "";
$user3_note_5_3 = "";
$user4_note_5_3 = "";
$user5_note_5_3 = "";
$user6_note_5_3 = "";
$user7_note_5_3 = "";
$user8_note_5_3 = "";
$user9_note_5_3 = "";
$user10_note_5_3 = "";
$user11_note_5_3 = "";
$user12_note_5_3 = "";
$arr = array();

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
<!--			<link href="<?=SITE_URL?>css/default.css" rel="stylesheet" type="text/css" />-->
			
					<?
						$top_name = $row['FirstName'];//."&nbsp;".$row['LastName'];
						$top_fullnm = $row['FirstName']."&nbsp;".$row['LastName'];
						$you_id = $row['UserId'];
						//checkuseractivemembers($you_id);

						$sql = "select count(*) as tot from userdetail where inviter = '".$userids."' and Placement = '' ";
						$rows = $form->getRow($sql);
						$num = $rows[0];
						$arr[$userids]=$num;
						//checkuserreplacelink($row['u1']);
						//checkuseractivemembers($row['u1']);

						$qry = "select payment_done from m_payment_fee where usertb_id = '".$userids."'";
						$var_user_pay = $form->getRow($qry);
						//echo sizeof($var_user_pay); print_r($var_user_pay);exit;
						$you_note = "";
						$you = "0";
						if(sizeof($var_user_pay)>0)
						{
							//print_r($var_user_pay);
							if($var_user_pay['payment_done'] == "NO")
							{
								$you = "red";
								//$user1_note="Daily payment is not paid in time.";
							}
							else
							{
								$qry = "select count(*) as tot from userdetail where inviter = '".$userids."' and active =1 and entry='prepaid' and Placement = ''";
								$tm = $form->getRow($qry);
								$num = $tm[0];
								$you = $num;
							}
						}
						else
						{
							$you_note = "inactive";
						}
			$qry = "select * from nodetree where usertb_id = '".$userids."'";
			$row = $form->getRow($qry);
			$msg = "";
			if(sizeof($row))
			{
				//$qry = "select CONCAT(FirstName,'&nbsp;&nbsp;',LastName) as Name from userdetail where userid = '".$row['u1']."'";
				$sql = "select count(*) as tot from userdetail where inviter = '".$row['u1']."' and Placement = '' ";
				$rows = $form->getRow($sql);
				$num = $rows[0];
				$arr[$row['u1']]=$num;
				checkuserreplacelink($row['u1']);
				checkuseractivemembers($row['u1']);

				$qry = "select FirstName as Name from userdetail where userid = '".$row['u1']."'";
				$user1 = $form->getRow($qry);
						if($row['u1'] != "0")
						{

							$qry = "select * from userdetail where UserId = '".$row['u1']."' and Placement = ''";
							$row11 = $form->getRow($qry);
							
							$user1_name = $row11['FirstName'];//."&nbsp;".$row11['LastName'];
							$user1_nm = $row11['FirstName']."&nbsp;".$row11['LastName'];
							$user1_note = "";
							$user1_id = $row['u1'];
							
							$qry = "select payment_done from m_payment_fee_5_3 where usertb_id = '".$row['u1']."'";
							$var_user_pay = $form->getRow($qry);
							if(sizeof($var_user_pay))
								$user1_note_5_3 = "active";
							else
								$user1_note_5_3 = "inactive";
							
							
							$qry = "select payment_done from m_payment_fee where usertb_id = '".$row['u1']."'";
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
									$qry = "select count(*) as tot  from userdetail where inviter = '".$row['u1']."' and active =1 and entry='prepaid' and Placement = ''";
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
				$sql = "select count(*) as tot from userdetail where inviter = '".$row['u2']."' and Placement = ''";
				$rows = $form->getRow($sql);
				$num = $rows[0];
				$arr[$row['u2']]=$num;
				checkuserreplacelink($row['u2']);
				checkuseractivemembers($row['u2']);

				$qry = "select FirstName as Name from userdetail where userid = '".$row['u2']."'";
				$user2 = $form->getRow($qry);
						if($row['u2'] != "0")
						{
							$qry = "select * from userdetail where UserId = '".$row['u2']."' and Placement = ''";
							$row11 = $form->getRow($qry);
							
							$user2_name = $row11['FirstName'];//."&nbsp;".$row11['LastName'];
							$user2_nm = $row11['FirstName']."&nbsp;".$row11['LastName'];
							$user2_note = "";
							$user2_id = $row['u2'];
							
							$qry = "select payment_done from m_payment_fee_5_3 where usertb_id = '".$row['u2']."'";
							$var_user_pay = $form->getRow($qry);
							if(sizeof($var_user_pay)>0)
								$user2_note_5_3 = "active";
							else
								$user2_note_5_3 = "inactive";
							
							$qry = "select payment_done from m_payment_fee where usertb_id = '".$row['u2']."'";
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
									$qry = "select count(*) as tot  from userdetail where inviter = '".$row['u2']."' and active =1 and entry='prepaid' and Placement = '' ";
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
				$sql = "select count(*) as tot from userdetail where inviter = '".$row['u3']."' and Placement = '' ";
				$rows = $form->getRow($sql);
				$num = $rows[0];
				
				$arr[$row['u3']]=$num;
				checkuserreplacelink($row['u3']);
				checkuseractivemembers($row['u3']);
				$qry = "select FirstName as Name from userdetail where userid = '".$row['u3']."'";
				$user3 = $form->getRow($qry);
				
	
						if($row['u3'] != "0")
						{
							$user3_note = "";
							$user3_id = $row['u3'];
							$qry = "select * from userdetail where UserId = '".$row['u3']."' and Placement = ''";
							$row11 = $form->getRow($qry);
							
							$user3_name = $row11['FirstName'];//."&nbsp;".$row11['LastName'];
							$user3_nm = $row11['FirstName']."&nbsp;".$row11['LastName'];
							
							$qry = "select payment_done from m_payment_fee_5_3 where usertb_id = '".$row['u3']."'";
							$var_user_pay = $form->getRow($qry);
							if(sizeof($var_user_pay)>0)
								$user3_note_5_3 = "active";
							else
								$user3_note_5_3 = "inactive";
							
							$qry = "select payment_done from m_payment_fee where usertb_id = '".$row['u3']."'";
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
									$qry = "select count(*) as tot  from userdetail where inviter = '".$row['u3']."' and active =1 and entry='prepaid' and Placement = '' ";
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
						//$qry = "select CONCAT(FirstName,'&nbsp;&nbsp;',LastName) as Name from userdetail where userid = '".$row1['u1']."'";
						$sql = "select count(*) as tot from userdetail where inviter = '".$row1['u1']."' and Placement = '' ";
						$rows = $form->getRow($sql);
						$num = $rows[0];
						$arr[$row1['u1']]=$num;
						checkuserreplacelink($row1['u1']);
						checkuseractivemembers($row1['u1']);
						$qry = "select FirstName as Name from userdetail where userid = '".$row1['u1']."'";
						$user1 = $form->getRow($qry);
						
	
						$user4_note = "";
						$user4_id = $row1['u1'];
						$qry = "select * from userdetail where UserId = '".$row1['u1']."' and Placement = ''";
						$row11 = $form->getRow($qry);
						
						$user4_name = $row11['FirstName'];//."&nbsp;".$row11['LastName'];
						$user4_nm = $row11['FirstName']."&nbsp;".$row11['LastName'];
						
						$qry = "select payment_done from m_payment_fee_5_3 where usertb_id = '".$row1['u1']."'";
						$var_user_pay = $form->getRow($qry);
						if(sizeof($var_user_pay)>0)
							$user4_note_5_3 = "active";
						else
							$user4_note_5_3 = "inactive";
						
						$qry = "select payment_done from m_payment_fee where usertb_id = '".$row1['u1']."'";
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
								$qry = "select count(*) as tot  from userdetail where inviter = '".$row1['u1']."' and active =1 and entry='prepaid' and Placement = '' ";
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
						$sql = "select count(*) as tot from userdetail where inviter = '".$row1['u2']."' and Placement = '' ";
						$rows = $form->getRow($sql);
						$num = $rows[0];
						$arr[$row1['u2']]=$num;
						checkuserreplacelink($row1['u2']);
						checkuseractivemembers($row1['u2']);
						$qry = "select FirstName as Name from userdetail where userid = '".$row1['u2']."'";
						$user2 = $form->getRow($qry);
	
						$user5_note = "";
						$user5_id = $row1['u2'];
						$qry = "select * from userdetail where UserId = '".$row1['u2']."' and Placement = ''";
						$row11 = $form->getRow($qry);
						
						$user5_name = $row11['FirstName'];//."&nbsp;".$row11['LastName'];
						$user5_nm = $row11['FirstName']."&nbsp;".$row11['LastName'];
						
						$qry = "select payment_done from m_payment_fee_5_3 where usertb_id = '".$row1['u2']."'";
						$$var_user_pay = $form->getRow($qry);
						if(sizeof($var_user_pay)>0)
							$user5_note_5_3 = "active";
						else
							$user5_note_5_3 = "inactive";
						
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
								$qry = "select count(*) as tot  from userdetail where inviter = '".$row1['u2']."' and active =1 and entry='prepaid' and Placement = '' ";
								$row22 = $form->getRow($qry);
								$num = $row22[0];
								
								$user5_img = $num;//$row12['tot'];
								//$user5_img = $row22['tot'];
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
						$num = $rows[0];
						$arr[$row1['u3']]=$num;
						checkuserreplacelink($row1['u3']);
						checkuseractivemembers($row1['u3']);

						$qry = "select FirstName as Name from userdetail where userid = '".$row1['u3']."'";
						$user3 = $form->getRow($qry);
						
						$user6_note = "";
						$user6_id = $row1['u3'];
						$qry = "select * from userdetail where UserId = '".$row1['u3']."' and Placement = ''";
						$row11 = $form->getRow($qry);
						
						$user6_name = $row11['FirstName'];//."&nbsp;".$row11['LastName'];
						$user6_nm = $row11['FirstName']."&nbsp;".$row11['LastName'];
						
						$qry = "select payment_done from m_payment_fee_5_3 where usertb_id = '".$row1['u3']."'";
						$var_user_pay = $form->getRow($qry);
						if(sizeof($var_user_pay)>0)
							$user6_note_5_3 = "active";
						else
							$user6_note_5_3 = "inactive";
						
						$qry = "select payment_done from m_payment_fee where usertb_id = '".$row1['u3']."' ";
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
								$qry = "select count(*) as tot  from userdetail where inviter = '".$row1['u3']."' and active =1 and entry='prepaid'  and Placement = ''";
								$row23 = $form->getRow($qry);
								$user6_img = $num = $row23[0];
							}
							$user6_id = $row1['u3'];
						}
						else
						{
							$user6_note="inactive";
						}
						
						?>
						<!--<a class="acolor" href="volunteers.php?user_id=<?=$row1['u1']?>"><?=$user1['Name']?></a><?=(isset($user1['Name'])?"&nbsp;&nbsp;&nbsp;".$user1_note:"")?>&nbsp;&nbsp;&nbsp;<a class="acolor" href="volunteers.php?user_id=<?=$row1['u2']?>"><?=$user2['Name']?></a><?=(isset($user2['Name'])?"&nbsp;&nbsp;&nbsp;".$user2_note:"")?>&nbsp;&nbsp;&nbsp;<a class="acolor" href="volunteers.php?user_id=<?=$row1['u3']?>"><?=$user3['Name']?></a><?=(isset($user3['Name'])?"&nbsp;&nbsp;&nbsp;".$user3_note:"")?><br />-->
						<?
					}
				}
			}
			if($row['u2'] != 0)
			{
				$qry = "select * from nodetree where usertb_id = '".$row['u2']."'";
				$row2 = $form->getRow($qry);
				$msg = "";
				if(sizeof($row2))
				{
					if($row2['u1'] != "0")
					{
							//$qry = "select CONCAT(FirstName,'&nbsp;&nbsp;',LastName) as Name from userdetail where userid = '".$row2['u1']."'";
						$sql = "select count(*) as tot from userdetail where inviter = '".$row2['u1']."' and Placement = '' ";
						$rows = $form->getRow($sql);
						$num = $rows[0];
						$arr[$row2['u1']]=$num;
						checkuserreplacelink($row2['u1']);
						checkuseractivemembers($row2['u1']);

						$qry = "select FirstName as Name from userdetail where userid = '".$row2['u1']."'";
						$user1 = $form->getRow($qry);
						
	
						$user7_note = "";
						$user7_id = $row2['u1'];
						$qry = "select * from userdetail where UserId = '".$row2['u1']."' and Placement = ''";
						$row11 = $form->getRow($qry);
						
						$user7_name = $row11['FirstName'];//."&nbsp;".$row11['LastName'];
						$user7_nm = $row11['FirstName']."&nbsp;".$row11['LastName'];
						
						$qry = "select payment_done from m_payment_fee_5_3 where usertb_id = '".$row2['u1']."'";
						$var_user_pay = $form->getRow($qry);
						if(sizeof($var_user_pay)>0)
							$user7_note_5_3 = "active";
						else
							$user7_note_5_3 = "inactive";
						
						$qry = "select payment_done from m_payment_fee where usertb_id = '".$row2['u1']."'";
						$var_user_pay = $form->getRow($qry);
						if(sizeof($var_user_pay)>0)
						{

							if($var_user_pay['payment_done'] == "NO")
							{
								$user7_img = "red";
								$user7_note="Daily payment is not paid in time.";
								?>
								<!--<a class="acolor" href="index.php?file=replace_volunteers&uid=<?=$var_user_pay['usertb_id']?>">Replace</a>-->
								<? 
							}
							else
							{
								$qry = "select count(*) as tot  from userdetail where inviter = '".$row2['u1']."' and active =1 and entry='prepaid' and Placement = '' ";
								$row31 = $form->getRow($qry);
								$user7_img = $num = $row31[0];
							}
							$user7_id = $row2['u1'];
						}
						else
						{
							$user7_note="inactive";
						}
					}
					if($row2['u2'] != "0")
					{
						//$qry = "select CONCAT(FirstName,'&nbsp;&nbsp;',LastName) as Name from userdetail where userid = '".$row2['u2']."'";
						$sql = "select count(*) as tot from userdetail where inviter = '".$row2['u2']."' and Placement = '' ";
						$rows = $form->getRow($sql);
						$num = $rows[0];
						$arr[$row2['u2']]=$num;
						checkuserreplacelink($row2['u2']);
						checkuseractivemembers($row2['u2']);

						$qry = "select FirstName as Name from userdetail where userid = '".$row2['u2']."'";
						$user2 = $form->getRow($qry);
						
						$user8_note = "";
						$user8_id = $row2['u2'];
						$qry = "select * from userdetail where UserId = '".$row2['u2']."' and Placement = ''";
						$row11 = $form->getRow($qry);
						
						$user8_name = $row11['FirstName'];//."&nbsp;".$row11['LastName'];
						$user8_nm = $row11['FirstName']."&nbsp;".$row11['LastName'];
						
						$qry = "select payment_done from m_payment_fee_5_3 where usertb_id = '".$row2['u2']."'";
						$var_user_pay = $form->getRow($qry);
						if(sizeof($var_user_pay)>0)
							$user8_note_5_3 = "active";
						else
							$user8_note_5_3 = "inactive";
						
						$qry = "select payment_done from m_payment_fee where usertb_id = '".$row2['u2']."'";
						$var_user_pay = $form->getRow($qry);
						if(sizeof($var_user_pay)>0)
						{

							if($var_user_pay['payment_done'] == "NO")
							{
								$user8_img = "red";
								$user8_note="Daily payment is not paid in time.";
							}
							else
							{
								$qry = "select count(*) as tot  from userdetail where inviter = '".$row2['u2']."' and active =1 and entry='prepaid' and Placement = '' ";
								$row32 = $form->getRow($qry);
								$user8_img = $num = $row32[0];
							}
							$user8_id = $row2['u2'];
						}
						else
						{
							$user8_note="inactive";
						}
					}
					if($row2['u3'] != "0")
					{
						//$qry = "select CONCAT(FirstName,'&nbsp;&nbsp;',LastName) as Name from userdetail where userid = '".$row2['u3']."'";
						$sql = "select count(*) as tot from userdetail where inviter = '".$row2['u3']."' and Placement = '' ";
						$rows = $form->getRow($sql);
						$num = $rows[0];
						$arr[$row2['u3']]=$num;
						checkuserreplacelink($row2['u3']);
						checkuseractivemembers($row2['u3']);

						$qry = "select FirstName as Name from userdetail where userid = '".$row2['u3']."'";
						$user3 = $form->getRow($qry);
	
						$user9_note = "";
						$user9_id = $row2['u3'];
						$qry = "select * from userdetail where UserId = '".$row2['u3']."' and Placement = ''";
						$row11 = $form->getRow($qry);
						
						$user9_name = $row11['FirstName'];//."&nbsp;".$row11['LastName'];
						$user9_nm = $row11['FirstName']."&nbsp;".$row11['LastName'];

						$qry = "select payment_done from m_payment_fee_5_3 where usertb_id = '".$row2['u3']."'";
						$var_user_pay = $form->getRow($qry);
						if(sizeof($var_user_pay)>0)
							$user9_note_5_3 = "active";
						else
							$user9_note_5_3 = "inactive";
						
						$qry = "select payment_done from m_payment_fee where usertb_id = '".$row2['u3']."'";
						$var_user_pay = $form->getRow($qry);
						if(sizeof($var_user_pay)>0)
						{
							if($var_user_pay['payment_done'] == "NO")
							{
								$user9_img = "red";
								$user9_note="Daily payment is not paid in time.";
							}
							else
							{
								$qry = "select count(*) as tot  from userdetail where inviter = '".$row2['u3']."' and active =1 and entry='prepaid' and Placement = '' ";
								$row33 = $form->getRow($qry);
								$user9_img = $num = $row33[0];
							}
							$user9_id = $row2['u3'];
						}
						else
						{
							$user9_note="inactive";
						}
	
						?>
						<!--<a class="acolor" href="volunteers.php?user_id=<?=$row2['u1']?>"><?=$user1['Name']?></a><?=(isset($user1['Name'])?"&nbsp;&nbsp;&nbsp;".$user1_note:"")?>&nbsp;&nbsp;&nbsp;<a class="acolor" href="volunteers.php?user_id=<?=$row2['u2']?>"><?=$user2['Name']?></a><?=(isset($user2['Name'])?"&nbsp;&nbsp;&nbsp;".$user2_note:"")?>&nbsp;&nbsp;&nbsp;<a class="acolor" href="volunteers.php?user_id=<?=$row2['u3']?>"><?=$user3['Name']?></a><?=(isset($user3['Name'])?"&nbsp;&nbsp;&nbsp;".$user3_note:"")?><br />-->
						<?
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
						//$qry = "select CONCAT(FirstName,'&nbsp;&nbsp;',LastName) as Name from userdetail where userid = '".$row3['u1']."'";
						$sql = "select count(*) as tot from userdetail where inviter = '".$row3['u1']."' and Placement = '' ";
						$rows = $form->getRow($sql);
						$num = $rows[0];
						$arr[$row3['u1']]=$num;
						checkuserreplacelink($row3['u1']);
						checkuseractivemembers($row3['u1']);

						$qry = "select FirstName as Name from userdetail where userid = '".$row3['u1']."'";
						$user1 = $form->getRow($qry);
						
						$user10_note = "";
						$user10_id = $row3['u1'];
						$qry = "select * from userdetail where UserId = '".$row3['u1']."' and Placement = ''";
						$row11 = $form->getRow($qry);
						
						$qry = "select payment_done from m_payment_fee_5_3 where usertb_id = '".$row3['u1']."'";
						$var_user_pay = $form->getRow($qry);
						if(sizeof($var_user_pay)>0)
							$user10_note_5_3 = "active";
						else
							$user10_note_5_3 = "inactive";
						
						$user10_name = $row11['FirstName'];//."&nbsp;".$row11['LastName'];
						$user10_nm = $row11['FirstName']."&nbsp;".$row11['LastName'];

						$qry = "select payment_done from m_payment_fee where usertb_id = '".$row3['u1']."'";
						$var_user_pay = $form->getRow($qry);
						if(sizeof($var_user_pay)>0)
						{
							if($var_user_pay['payment_done'] == "NO")
							{
								$user10_img = "red";
								$user10_note="Daily payment is not paid in time.";
							}
							else
							{
								$qry = "select count(*) as tot  from userdetail where inviter = '".$row3['u1']."' and active =1 and entry='prepaid'  and Placement = ''";
								$row33 = $form->getRow($qry);
								$user10_img = $num = $row33[0];
							}
							$user10_id = $row3['u1'];
						}
						else
						{
							$user10_note="inactive";
						}
					}
					if($row3['u2'] != "0")
					{
						//$qry = "select CONCAT(FirstName,'&nbsp;&nbsp;',LastName) as Name from userdetail where userid = '".$row3['u2']."'";
						$sql = "select count(*) as tot from userdetail where inviter = '".$row3['u2']."' and Placement = ''";
						$rows = $form->getRow($sql);
						$num = $rows[0];
						$arr[$row3['u2']]=$num;
						checkuserreplacelink($row3['u2']);
						checkuseractivemembers($row3['u2']);
		
						$qry = "select FirstName as Name from userdetail where userid = '".$row3['u2']."'";
						$user2 = $form->getRow($qry);
						
						$user11_note = "";
						$user11_id = $row3['u2'];
						$qry = "select * from userdetail where UserId = '".$row3['u2']."' and Placement = ''";
						$row11 = $form->getRow($qry);
						
						$user11_name = $row11['FirstName'];//."&nbsp;".$row11['LastName'];
						$user11_nm = $row11['FirstName']."&nbsp;".$row11['LastName'];

						
						$qry = "select payment_done from m_payment_fee_5_3 where usertb_id = '".$row3['u2']."'";
						$var_user_pay = $form->getRow($qry);
						if(sizeof($var_user_pay)>0)
							$user11_note_5_3 = "active";
						else
							$user11_note_5_3 = "inactive";
						
						$qry = "select payment_done from m_payment_fee where usertb_id = '".$row3['u2']."'";
						$var_user_pay = $form->getRow($qry);
						if(sizeof($var_user_pay)>0)
						{
							if($var_user_pay['payment_done'] == "NO")
							{
								$user11_img = "red";
								$user11_note="Daily payment is not paid in time.";
							}
							else
							{
								$qry = "select count(*) as tot  from userdetail where inviter = '".$row3['u2']."' and active =1 and entry='prepaid'  and Placement = ''";
								$row33 = $form->getRow($qry);
								$user11_img = $num = $row33[0];
							}
							$user11_id = $row3['u2'];
						}
						else
						{
							$user11_note="inactive";
						}
					}
					if($row3['u3'] != "0")
					{
						//$qry = "select CONCAT(FirstName,'&nbsp;&nbsp;',LastName) as Name from userdetail where userid = '".$row3['u3']."'";
						$sql = "select count(*) as tot from userdetail where inviter = '".$row3['u3']."' and Placement = '' ";
						$rows = $form->getRow($sql);
						$num = $rows[0];
						$arr[$row3['u3']]=$num;
						checkuserreplacelink($row3['u3']);
						checkuseractivemembers($row3['u3']);
		
						$qry = "select FirstName as Name from userdetail where userid = '".$row3['u3']."'";
						$user3 = $form->getRow($qry);
						
						$user12_note = "";
						$user12_id = $row3['u3'];
						$qry = "select * from userdetail where UserId = '".$row3['u3']."' and Placement = ''";
						$row11 = $form->getRow($qry);
						
						$user12_name = $row11['FirstName'];//."&nbsp;".$row11['LastName'];
						$user12_nm = $row11['FirstName']."&nbsp;".$row11['LastName'];

						
						$qry = "select payment_done from m_payment_fee_5_3 where usertb_id = '".$row3['u3']."'";
						$var_user_pay = $form->getRow($qry);
						if(sizeof($var_user_pay)>0)
							$user12_note_5_3 = "active";
						else
							$user12_note_5_3 = "inactive";
						
						$qry = "select payment_done from m_payment_fee where usertb_id = '".$row3['u3']."'";
						$var_user_pay = $form->getRow($qry);
						if(sizeof($var_user_pay)>0)
						{
							if($var_user_pay['payment_done'] == "NO")
							{
								$user12_img = "red";
								$user12_note="Daily payment is not paid in time.";
							}
							else
							{
								$qry = "select count(*) as tot  from userdetail where inviter = '".$row3['u3']."' and active =1 and entry='prepaid' and Placement = '' ";
								$row33 = $form->getRow($qry);
								$user12_img = $num = $row33[0];
							}
							$user12_id = $row3['u3'];
						}
						else
						{
							$user12_note="inactive";
						}
	
						?>
						<!--<a class="acolor" href="volunteers.php?user_id=<?=$row3['u1']?>"><?=$user1['Name']?></a><?=(isset($user1['Name'])?"&nbsp;&nbsp;&nbsp;".$user1_note:"")?>&nbsp;&nbsp;&nbsp;<a class="acolor" href="volunteers.php?user_id=<?=$row3['u2']?>"><?=$user2['Name']?></a><?=(isset($user2['Name'])?"&nbsp;&nbsp;&nbsp;".$user2_note:"")?>&nbsp;&nbsp;&nbsp;<a class="acolor" href="volunteers.php?user_id=<?=$row3['u3']?>"><?=$user3['Name']?></a><?=(isset($user3['Name'])?"&nbsp;&nbsp;&nbsp;".$user3_note:"")?><br />-->
						<?
					}
				}
			}
}
/*echo "<xmp>";
print_r($arr);
print_r($_SESSION['act_mems']
echo "</xmp>";
die();*/
$_SESSION['uid'] = $arr;
$len = strlen($top_fullnm); $tot=$len*10;  $widths=$tot."px"; 
?>
<section id="content ">  
<div class="container_12">
                	<div class="padding_30_leftrighr">
						<div class="first_welcome main">
                        	<div class="float_left font_14 color_green margin_right"><a class="acolor" href="index.php?file=volunteers" ><h2>Matricies</h2></a></div>
							<div class="float_left font_14 color_green margin_right"><a class="link1" href="index.php?file=volunteers&marics=33" >3x3</a></div>
							<div class="float_left font_14 color_green margin_right"><a class="link1" href="index.php?file=volunteers&marics=53" >5x3</a></div>
							<div class="float_left font_14 color_green margin_right"><a class="link1" href="index.php?file=volunteers&marics=103" >10x3</a></div>
                        </div>
						<div class="container_mlm main">
							<div  class="float_right" style="margin-right:50px;">
								<fieldset class="fieldsetsmall"><legend>Legend</legend>
                                	<p>
										<img src="images/sgray.png" title="No members" width="16" height="16"> 0 People<br>
										<img src="images/spurple.png" title="1 Member" width="16" height="16"> 1 Person<br>
										<img src="images/sorange.png" title="4 Member" width="16" height="16"> 4 People<br>
										<img src="images/sgreen.png" title="5 Member" width="16" height="16"> 5+ People<br>
										<img src="images/sred.png" title="6+ Member" width="16" height="16"> 6+ People<br>
										<img src="images/syellow.png" title="10+ Member" width="16" height="16"> 10+ People<br>
										<img src="images/03.png" title="20+ Member" width="16" height="16"> 20+ People<br>
										<!--<img src="images/03.png" title="5 Member" width="16" height="16"> Active in 5x3<br>-->
										<!--<img src="images/sred.png" title="No Member referrals" width="16" height="16"> Didn't pay yesterday.<br>
										<img src="images/dailyindicatior.png" title="No Member referrals" width="16" height="16"> Hasn't paid within the last 5 days.<br>-->
										<img src="images/snone.png" title="Vacant position" width="16" height="16">Vacancy<br>
                                    </p>
                                </fieldset>
							</div>
                       	  	<div class="structure float_left">
                            	<ul class="first_person">
									<? if($you_note == "inactive"){?>
										 <li class="person_one">
												<img onmouseover="mouseOver(<?=$userids?>);" onmouseout="mouseOut(<?=$userids?>)" src="images/02.png" /><br />
												(<?=isset($_SESSION['uid'][$userids])?$_SESSION['uid'][$userids]:"0";?>)
												<?=$top_name?>
												<div onmouseover="mouseOver(<?=$userids?>);" onmouseout="mouseOut(<?=$userids?>)" id="<?=$userids?>" style="background-color: rgba(0, 0, 0, 0.8); color:#FFFFFF; z-index:10; position: absolute; top: 209px; left: 388px; display:none; width:<?=$widths?>; width:<?=$widths?>;">
														<?=$top_fullnm?><br>
													</div>
												(<?=isset($_SESSION['act_mems'][$userids])?$_SESSION['act_mems'][$userids]:"0";?>)<br />
												(<?=$userids;?>)
										</li>
									<? } 
										/*else if ( isset($_SESSION['have_pay_yday'][$userids]) && $_SESSION['have_pay_yday'][$userids] ) { ?>
										 <li class="person_one">
											<img onmouseover="mouseOver(<?=$userids?>);" onmouseout="mouseOut(<?=$userids?>)" src="images/sred.png" /><br />
											(<?=isset($_SESSION['uid'][$userids])?$_SESSION['uid'][$userids]:"0";?>)
											<?=$top_name?>
											<div onmouseover="mouseOver(<?=$userids?>);" onmouseout="mouseOut(<?=$userids?>)" id="<?=$userids?>" style="background-color: rgba(0, 0, 0, 0.8); color:#FFFFFF; z-index:10; position: absolute; top: 209px; left: 388px; display:none; width:<?=$widths?>;">
												<?=$top_fullnm?><br><!--<a href="index.php?file=replace_volunteers&uid=<?=$userids?>">Replace</a>-->
											</div>
											(<?=isset($_SESSION['act_mems'][$userids])?$_SESSION['act_mems'][$userids]:"0";?>)<br />
											(<?=$userids;?>)
										</li>
									<? } else if ( isset($_SESSION['have_pay_5day'][$userids]) && $_SESSION['have_pay_5day'][$userids] ) { ?>
										 <li class="person_one">
											<img onmouseover="mouseOver(<?=$userids?>);" onmouseout="mouseOut(<?=$userids?>)" src="images/dailyindicatior.png" /><br />
											(<?=isset($_SESSION['uid'][$userids])?$_SESSION['uid'][$userids]:"0";?>)
											<?=$top_name?>
											<div onmouseover="mouseOver(<?=$userids?>);" onmouseout="mouseOut(<?=$userids?>)" id="<?=$userids?>" style="background-color: rgba(0, 0, 0, 0.8); color:#FFFFFF; z-index:10; position: absolute; top: 209px; left: 388px; display:none; width:<?=$widths?>;">
												<?=$top_fullnm?><br><!--<a href="index.php?file=replace_volunteers&uid=<?=$userids?>">Replace</a>-->
											</div>
											(<?=isset($_SESSION['act_mems'][$userids])?$_SESSION['act_mems'][$userids]:"0";?>)<br />
											(<?=$userids;?>)
										</li>
									<? } else if($you == "red" && $you != "0"){ ?>
										 <li class="person_one">
											<img onmouseover="mouseOver(<?=$userids?>);" onmouseout="mouseOut(<?=$userids?>)" src="images/sred.png" /><br />
											(<?=isset($_SESSION['uid'][$userids])?$_SESSION['uid'][$userids]:"0";?>)
											<?=$top_name?>
											<div onmouseover="mouseOver(<?=$userids?>);" onmouseout="mouseOut(<?=$userids?>)" id="<?=$userids?>" style="background-color: rgba(0, 0, 0, 0.8); color:#FFFFFF; z-index:10; position: absolute; top: 209px; left: 388px; display:none; width:<?=$widths?>;">
												<?=$top_fullnm?><br>
											</div>
											(<?=isset($_SESSION['act_mems'][$userids])?$_SESSION['act_mems'][$userids]:"0";?>)
											 <br />
											(<?=$userids;?>)
										</li>
									<? } */
									else if($you == "none" && $you != "0"){ ?>
										 <li class="person_one"><img src="images/snone.png" /><br /><?=$top_name?></li>
									<? } else { ?>
                                		 <li class="person_one">
										 <?php echo (($you>=20)?'<img onmouseover="mouseOver('.$userids.');" onmouseout="mouseOut('.$userids.');" src="images/03.png" />':(($you>=10)?'<img onmouseover="mouseOver('.$userids.');" onmouseout="mouseOut('.$userids.');" src="images/syellow.png" />':(($you>=6)?'<img onmouseover="mouseOver('.$userids.');" onmouseout="mouseOut('.$userids.');" src="images/sred.png" />':(($you>=5)?'<img onmouseover="mouseOver('.$userids.');" onmouseout="mouseOut('.$userids.');" src="images/sgreen.png" />':(($you==4)?'<img onmouseover="mouseOver('.$userids.');" onmouseout="mouseOut('.$userids.');" src="images/sorange.png" />':($you>=1)?'<img onmouseover="mouseOver('.$userids.');" onmouseout="mouseOut('.$userids.');" src="images/spurple.png" />':'<img onmouseover="mouseOver('.$userids.');" onmouseout="mouseOut('.$userids.');" src="images/sgray.png" />')))))?><br />
											 (<?=isset($_SESSION['uid'][$userids])?$_SESSION['uid'][$userids]:"0";?>)
											 <?=$top_name?>
										 	 <div onmouseover="mouseOver(<?=$userids?>);" onmouseout="mouseOut(<?=$userids?>)" id="<?=$userids?>" style="background-color: rgba(0, 0, 0, 0.8); z-index:10; color:#FFFFFF; position: absolute; top: 209px; left: 388px; display:none; width:<?=$widths?>;">
											 	<?=$top_fullnm?><br>
											 </div>
											 (<?=isset($_SESSION['act_mems'][$userids])?$_SESSION['act_mems'][$userids]:"0";?>)
											<br>
											(<?=$userids;?>)
										</li>
									<? }?>
									<!-- Top level end condition -->
									<li>
                                    	<ul class="second_portion">
                                        	<li class="float_left"><div class="float_left"><img src="images/line.jpg"/></div></li>
                                          	<li class="float_left"><div><img src="images/line.jpg" /></div></li>
                                          	<li class="float_left"><div class="float_right"><img src="images/line.jpg"/></div></li>
                                        </ul>
                                        <ul class="second_portion">
											<!-- left tree -->
											<li class="float_left">
												<? if($user1_note == "inactive") { ?>
														<div class="float_left left_img">
															<!--<a class="acolor" href="volunteers.php?user_id=<?=$user1_id?>">-->
															<img onmouseover="mouseOver(<?=$user1_id?>);" onmouseout="mouseOut(<?=$user1_id?>);" src="images/02.png" />
															<!--</a>-->
															<div class="username_img">
																(<?=isset($_SESSION['uid'][$user1_id])?$_SESSION['uid'][$user1_id]:"0";?>)
																<?=$user1_name?>
																<div onmouseover="mouseOver(<?=$user1_id?>);" onmouseout="mouseOut(<?=$user1_id?>)" id="<?=$user1_id?>" style="background-color: rgba(0, 0, 0, 0.8); color:#FFFFFF; z-index:10; position: absolute; top: -47px; left: -22px; display:none; width:<?=$widths?>;">
																		 <?=$user1_nm?>
																	 	<br>
																	 	<? if(isset($_SESSION['ruid'][$user1_id]) && $_SESSION['ruid'][$user1_id] == 1) {?><a href="index.php?file=replace_volunteers&uid=<?=$user1_id?>">Replace</a><? } ?>
																	</div>
																(<?=isset($_SESSION['act_mems'][$user1_id])?$_SESSION['act_mems'][$user1_id]:"0";?>)
																<br>
																(<?=$user1_id;?>)
															</div>
														</div>
												<? } /* else if((isset($_SESSION['have_pay_yday'][$user1_id]) && $_SESSION['have_pay_yday'][$user1_id])){ ?>
														<div class="float_left left_img">
															<!--<a class="acolor" href="volunteers.php?user_id=<?=$user1_id?>">-->
															<img onmouseover="mouseOver(<?=$user1_id?>);" onmouseout="mouseOut(<?=$user1_id?>);" src="images/sred.png" />
															<!--</a>-->
															<div class="username_img">
																(<?=isset($_SESSION['uid'][$user1_id])?$_SESSION['uid'][$user1_id]:"0";?>)
																<?=$user1_name?>
																<div onmouseover="mouseOver(<?=$user1_id?>);" onmouseout="mouseOut(<?=$user1_id?>)" id="<?=$user1_id?>" style="background-color: rgba(0, 0, 0, 0.8); color:#FFFFFF; z-index:10; position: absolute; top: -47px; left: -22px; display:none; width:<?=$widths?>;">
																	<?=$user1_nm?>
																	<br>
																	<? if(isset($_SESSION['ruid'][$user1_id]) && $_SESSION['ruid'][$user1_id] == 1) {?><a href="index.php?file=replace_volunteers&uid=<?=$user1_id?>">Replace</a><? } ?>
																</div>
																(<?=isset($_SESSION['act_mems'][$user1_id])?$_SESSION['act_mems'][$user1_id]:"0";?>)
																<br>
																(<?=$user1_id;?>)
															</div>
														</div>
												<? } else if(isset($_SESSION['have_pay_5day'][$user1_id]) && $_SESSION['have_pay_5day'][$user1_id]){ ?>
														<div class="float_left left_img">
															<!--<a class="acolor" href="volunteers.php?user_id=<?=$user1_id?>">-->
																<img onmouseover="mouseOver(<?=$user1_id?>);" onmouseout="mouseOut(<?=$user1_id?>);" src="images/dailyindicatior.png" />
															<!--</a>-->
																<div class="username_img">
																	(<?=isset($_SESSION['uid'][$user1_id])?$_SESSION['uid'][$user1_id]:"0";?>)
																	<?=$user1_name?>
																	<div onmouseover="mouseOver(<?=$user1_id?>);" onmouseout="mouseOut(<?=$user1_id?>)" id="<?=$user1_id?>" style="background-color: rgba(0, 0, 0, 0.8); color:#FFFFFF; z-index:10; position: absolute; top: -47px; left: -22px; display:none; width:<?=$widths?>;">
																		<?=$user1_nm?><br>
																		<? if(isset($_SESSION['ruid'][$user1_id]) && $_SESSION['ruid'][$user1_id] == 1) {?><a href="index.php?file=replace_volunteers&uid=<?=$user1_id?>">Replace</a><? } ?>
																	</div>
																	(<?=isset($_SESSION['act_mems'][$user1_id])?$_SESSION['act_mems'][$user1_id]:"0";?>)
																	<br>
																	(<?=$user1_id;?>)
																</div>
														</div>
											 	<? } else if($user1_img == "red" && $user1_img != "0"){ ?>
														<div class="float_left left_img">
																<!--<a class="acolor" href="volunteers.php?user_id=<?=$user1_id?>">-->
																<img onmouseover="mouseOver(<?=$user1_id?>);" onmouseout="mouseOut(<?=$user1_id?>);" src="images/sred.png" />
																<!--</a>-->
																<div class="username_img">
																		(<?=isset($_SESSION['uid'][$user1_id])?$_SESSION['uid'][$user1_id]:"0";?>)
																		<?=$user1_name?>
																		<div onmouseover="mouseOver(<?=$user1_id?>);" onmouseout="mouseOut(<?=$user1_id?>)" id="<?=$user1_id?>" style="background-color: rgba(0, 0, 0, 0.8); color:#FFFFFF; z-index:10; position: absolute; top: -47px; left: -22px; display:none; width:<?=$widths?>;">
																			<?=$user1_nm?>
																			<br>
																			<? if(isset($_SESSION['ruid'][$user1_id]) && $_SESSION['ruid'][$user1_id] == 1) {?><a href="index.php?file=replace_volunteers&uid=<?=$user1_id?>">Replace</a><? } ?>
																		</div>
																		(<?=isset($_SESSION['act_mems'][$user1_id])?$_SESSION['act_mems'][$user1_id]:"0";?>)
																		<br>
																		(<?=$user1_id;?>)
																	</div>
																</div>
												<? }*/
												 else if($user1_img == "none" && $user1_img != "0"){ ?>
														<div class="float_left left_img"><img src="images/snone.png" /><div class="username_img"><?=$user1_name?></div></div>
												<? } else{ ?>
														<div class="float_left left_img">
														<?php echo (($user1_img>=20)?'<img onmouseover="mouseOver('.$user1_id.');" onmouseout="mouseOut('.$user1_id.');" src="images/03.png" />':(($user1_img>=10)?'<img onmouseover="mouseOver('.$user1_id.');" onmouseout="mouseOut('.$user1_id.');" src="images/syellow.png" />':(($user1_img>=6)?'<img onmouseover="mouseOver('.$user1_id.');" onmouseout="mouseOut('.$user1_id.');" src="images/sred.png" />':(($user1_img>=5)?'<img onmouseover="mouseOver('.$user1_id.');" onmouseout="mouseOut('.$user1_id.');" src="images/sgreen.png" />':(($user1_img==4)?'<img onmouseover="mouseOver('.$user1_id.');" onmouseout="mouseOut('.$user1_id.');" src="images/sorange.png" />':($user1_img>=1)?'<img onmouseover="mouseOver('.$user1_id.');" onmouseout="mouseOut('.$user1_id.');" src="images/spurple.png" />':'<img onmouseover="mouseOver('.$user1_id.');" onmouseout="mouseOut('.$user1_id.');" src="images/sgray.png" />')))))?><br />
															<div class="username_img">
																	(<?=isset($_SESSION['uid'][$user1_id])?$_SESSION['uid'][$user1_id]:"0";?>)
																	<?=$user1_name?>
																	<div onmouseover="mouseOver(<?=$user1_id?>);" onmouseout="mouseOut(<?=$user1_id?>)" id="<?=$user1_id?>" style="background-color: rgba(0, 0, 0, 0.8); color:#FFFFFF; z-index:10; position: absolute; top: -47px; left: -22px; display:none; width:<?=$widths?>;">
																		<?=$user1_nm?><br>
																	</div>
																	(<?=isset($_SESSION['act_mems'][$user1_id])?$_SESSION['act_mems'][$user1_id]:"0";?>)
																	<br>
																	(<?=$user1_id;?>)
															</div>
														</div>
												<? } ?>
                                                
												<div class="float_clear"></div>
                                            	<ul class="left border_second">
                                                	<li class="float_left"><div class="float_left"><img src="images/line.jpg"/></div></li>
                                                   	<li class="float_left"><div><img src="images/line.jpg" /></div></li>
                                                   	<li class="float_left"><div class="float_right"><img src="images/line.jpg"/></div></li>
                                                </ul>
                                            	<ul class="left top_move">
                                                	<li class="float_left">
															<? if($user4_note == "inactive"){ ?>
																<div class="float_left left_img">
																	<a class="acolor" href="javascript:void(0);" onclick="addmore_volunteers(<?=$user4_id?>,1,1,'next_volunteers1_cnt')">
																		<img onmouseover="mouseOver(<?=$user4_id?>);" onmouseout="mouseOut(<?=$user4_id?>);" id="img_1[<?=$user4_id?>]" src="images/02.png" />
																	</a>
																	<div class="username_img">
																		(<?=isset($_SESSION['uid'][$user4_id])?$_SESSION['uid'][$user4_id]:"0";?>)
																		<?=$user4_name?>
																			<div onmouseover="mouseOver(<?=$user4_id?>);" onmouseout="mouseOut(<?=$user4_id?>)" id="<?=$user4_id?>" style="background-color: rgba(0, 0, 0, 0.8); color:#FFFFFF; z-index:10; position: absolute; top: -47px; left: 0px; display:none; width:<?=$widths?>;">
																				<?=$user4_nm?>
																				<br>
																				<? if(isset($_SESSION['ruid'][$user4_id]) && $_SESSION['ruid'][$user4_id]==1) { ?> <a href="index.php?file=replace_volunteers&uid=<?=$user4_id?>">Replace</a><? } ?>
																			</div>
																			(<?=isset($_SESSION['act_mems'][$user4_id])?$_SESSION['act_mems'][$user4_id]:"0";?>)
																			<br>
																			(<?=$user4_id;?>)
																	</div>
																</div>
															<? } 
															/* else if((isset($_SESSION['have_pay_yday'][$user4_id]) && $_SESSION['have_pay_yday'][$user4_id])){ ?>
																<div class="float_left left_img">
																	<a class="acolor" href="javascript:void(0);" onclick="addmore_volunteers(<?=$user4_id?>,1,1,'next_volunteers1_cnt')">
																		<img onmouseover="mouseOver(<?=$user4_id?>);" onmouseout="mouseOut(<?=$user4_id?>);" id="img_1[<?=$user4_id?>]" src="images/sred.png" />
																	</a>
																	<div class="username_img">
																		(<?=isset($_SESSION['uid'][$user4_id])?$_SESSION['uid'][$user4_id]:"0";?>)
																		<?=$user4_name?>
																		<div onmouseover="mouseOver(<?=$user4_id?>);" onmouseout="mouseOut(<?=$user4_id?>)" id="<?=$user4_id?>" style="background-color: rgba(0, 0, 0, 0.8); color:#FFFFFF; z-index:10; position: absolute; top: -47px; left: 0px; display:none; width:<?=$widths?>;">
																			<?=$user4_nm?>
																			<br><? if(isset($_SESSION['ruid'][$user4_id]) && $_SESSION['ruid'][$user4_id]==1) { ?><a href="index.php?file=replace_volunteers&uid=<?=$user4_id?>">Replace</a><? } ?>
																		</div>
																		(<?=isset($_SESSION['act_mems'][$user4_id])?$_SESSION['act_mems'][$user4_id]:"0";?>)
																		<br>
																		(<?=$user4_id;?>)</div></div>
															<? } else if(isset($_SESSION['have_pay_5day'][$user4_id]) && $_SESSION['have_pay_5day'][$user4_id] && isset($_SESSION['ruid'][$user4_id]) && $_SESSION['ruid'][$user4_id]==1) {?>
																<div class="float_left left_img">
																  <a class="acolor" href="javascript:void(0);" onclick="addmore_volunteers(<?=$user4_id?>,1,1,'next_volunteers1_cnt')"><img onmouseover="mouseOver(<?=$user4_id?>);" onmouseout="mouseOut(<?=$user4_id?>);" id="img_1[<?=$user4_id?>]" src="images/dailyindicatior.png" /></a>
																  <div class="username_img">
																			(<?=isset($_SESSION['uid'][$user4_id])?$_SESSION['uid'][$user4_id]:"0";?>)
																			<?=$user4_name?>
																			<div onmouseover="mouseOver(<?=$user4_id?>);" onmouseout="mouseOut(<?=$user4_id?>)" id="<?=$user4_id?>" style="background-color: rgba(0, 0, 0, 0.8); color:#FFFFFF; z-index:10; position: absolute; top: -47px; left: 0px; display:none; width:<?=$widths?>;">
																				<?=$user4_nm?>
																				<br>
																				<? if(isset($_SESSION['ruid'][$user4_id]) && $_SESSION['ruid'][$user4_id]==1) { ?><a href="index.php?file=replace_volunteers&uid=<?=$user4_id?>">Replace</a><?  } ?>
																			</div>
																			(<?=isset($_SESSION['act_mems'][$user4_id])?$_SESSION['act_mems'][$user4_id]:"0";?>)
																			<br>
																			(<?=$user4_id;?>)
																   </div>
																</div>
															<? } else if($user4_img == "red" && $user4_img != "0" && isset($_SESSION['ruid'][$user4_id]) && $_SESSION['ruid'][$user4_id]==1){ ?>
																<div class="float_left left_img">
																	<a class="acolor" href="javascript:void(0);" onclick="addmore_volunteers(<?=$user4_id?>,1,1,'next_volunteers1_cnt')"><img onmouseover="mouseOver(<?=$user4_id?>);" onmouseout="mouseOut(<?=$user4_id?>);" id="img_1[<?=$user4_id?>]" src="images/sred.png" /></a>
																	<div class="username_img">
																		    (<?=isset($_SESSION['uid'][$user4_id])?$_SESSION['uid'][$user4_id]:"0";?>)
																		    <?=$user4_name?>
																			<div onmouseover="mouseOver(<?=$user4_id?>);" onmouseout="mouseOut(<?=$user4_id?>)" id="<?=$user4_id?>" style="background-color: rgba(0, 0, 0, 0.8); color:#FFFFFF; z-index:10; position: absolute; top: -47px; left: -28px; display:none; width:<?=$widths?>;">
																				<?=$user4_nm?><br>
																				<? if(isset($_SESSION['ruid'][$user4_id]) && $_SESSION['ruid'][$user4_id]==1) { ?>
																				<a href="index.php?file=replace_volunteers&uid=<?=$user4_id?>">Replace</a>
																				<? } ?>
																			</div>
																			(<?=isset($_SESSION['act_mems'][$user4_id])?$_SESSION['act_mems'][$user4_id]:"0";?>)
																			 <br>
																			(<?=$user4_id;?>)
																	</div>
																</div>
															<? } */
															else if($user4_img == "none" && $user4_img != "0" ) { ?>
																<div class="float_left left_img">
																	<img id="img_1[<?=$user4_id?>]" src="images/snone.png" />
																	<div class="username_img"><?=$user4_name?></div>
																</div>
															<? } else { ?>
																<div class="float_left left_img">
																	<a class="acolor" href="javascript:void(0);" onclick="addmore_volunteers(<?=$user4_id?>,1,1,'next_volunteers1_cnt')">
																		<?php echo (($user4_img>=20)?'<img id="img_1['.$user4_id.']" onmouseover="mouseOver('.$user4_id.');" onmouseout="mouseOut('.$user4_id.');" src="images/03.png" />':(($user4_img>=10)?'<img id="img_1['.$user4_id.']" onmouseover="mouseOver('.$user4_id.');" onmouseout="mouseOut('.$user4_id.');" src="images/syellow.png" />':(($user4_img>=6)?'<img id="img_1['.$user4_id.']" onmouseover="mouseOver('.$user4_id.');" onmouseout="mouseOut('.$user4_id.');" src="images/sred.png" />':(($user4_img>=5)?'<img id="img_1['.$user4_id.']" onmouseover="mouseOver('.$user4_id.');" onmouseout="mouseOut('.$user4_id.');" src="images/sgreen.png" />':(($user4_img==4)?'<img id="img_1['.$user4_id.']" onmouseover="mouseOver('.$user4_id.');" onmouseout="mouseOut('.$user4_id.');" src="images/sorange.png" />':($user4_img>=1)?'<img id="img_1['.$user4_id.']" onmouseover="mouseOver('.$user4_id.');" onmouseout="mouseOut('.$user4_id.');" src="images/spurple.png" />':'<img id="img_1['.$user4_id.']" onmouseover="mouseOver('.$user4_id.');" onmouseout="mouseOut('.$user4_id.');" src="images/sgray.png" />')))))?>
																	</a>
																	<div class="username_img">
																		(<?=isset($_SESSION['uid'][$user4_id])?$_SESSION['uid'][$user4_id]:"0";?>)
																		<?=$user4_name?>
																			<div onmouseover="mouseOver(<?=$user4_id?>);" onmouseout="mouseOut(<?=$user4_id?>)" id="<?=$user4_id?>" style="background-color: rgba(0, 0, 0, 0.8); z-index:10; position: absolute; top: -47px; left: -28px; color:#FFFFFF; display:none; width:<?=$widths?>;">
																				<?=$user4_nm?><br>
																			</div>
																			(<?=isset($_SESSION['act_mems'][$user4_id])?$_SESSION['act_mems'][$user4_id]:"0";?>)
																			<br>
																			(<?=$user4_id;?>)
																	</div>
																</div>
															<? } ?>
                                                     		<div class="float_clear"></div>
													</li>
                                                	<li class="float_left">
															<? if($user5_note == "inactive"){ ?>
																<div style="width:150px;margin:0px 0px 0px -45px">
																	<a class="acolor"  href="javascript:void(0);" onclick="addmore_volunteers(<?=$user5_id?>,1,1,'next_volunteers1_cnt')"><img onmouseover="mouseOver(<?=$user5_id?>);" onmouseout="mouseOut(<?=$user5_id?>);" id="img_1[<?=$user5_id?>]" src="images/02.png" /></a>
																	<br />
																	(<?=isset($_SESSION['uid'][$user5_id])?$_SESSION['uid'][$user5_id]:"0";?>)
																	<?=$user5_name?>
																	<div onmouseover="mouseOver(<?=$user5_id?>);" onmouseout="mouseOut(<?=$user5_id?>)" id="<?=$user5_id?>" style="background-color: rgba(0, 0, 0, 0.8); color:#FFFFFF; z-index:10; position: absolute; top: 0px; left: 52px; display:none; width:<?=$widths?>;"><?=$user5_nm?><br><? if(isset($_SESSION['ruid'][$user5_id]) && $_SESSION['ruid'][$user5_id]==1) {?><a href="index.php?file=replace_volunteers&uid=<?=$user5_id?>">Replace</a><? } ?></div>
																	(<?=isset($_SESSION['act_mems'][$user5_id])?$_SESSION['act_mems'][$user5_id]:"0";?>)
																	<br>
																	(<?=$user5_id;?>)
																</div>
															<? }
															/* else if((isset($_SESSION['have_pay_yday'][$user5_id]) && $_SESSION['have_pay_yday'][$user5_id])){ ?>
																<div style="width:150px;margin:0px 0px 0px -45px">
																	<a class="acolor"  href="javascript:void(0);" onclick="addmore_volunteers(<?=$user5_id?>,1,1,'next_volunteers1_cnt')"><img onmouseover="mouseOver(<?=$user5_id?>);" onmouseout="mouseOut(<?=$user5_id?>);" id="img_1[<?=$user5_id?>]" src="images/sred.png" /></a>
																	<br />
																	(<?=isset($_SESSION['uid'][$user5_id])?$_SESSION['uid'][$user5_id]:"0";?>)
																	<?=$user5_name?>
																	<div onmouseover="mouseOver(<?=$user5_id?>);" onmouseout="mouseOut(<?=$user5_id?>)" id="<?=$user5_id?>" style="background-color: rgba(0, 0, 0, 0.8); color:#FFFFFF; z-index:10; position: absolute; top: 0px; left: 52px; display:none; width:<?=$widths?>;"><?=$user5_nm?><br><? if(isset($_SESSION['ruid'][$user5_id]) && $_SESSION['ruid'][$user5_id]==1) {?><a href="index.php?file=replace_volunteers&uid=<?=$user5_id?>">Replace</a><? } ?></div>
																	(<?=isset($_SESSION['act_mems'][$user5_id])?$_SESSION['act_mems'][$user5_id]:"0";?>)
																	<br>
																	(<?=$user5_id;?>)
																</div>
															<? } else if(isset($_SESSION['have_pay_5day'][$user5_id]) && $_SESSION['have_pay_5day'][$user5_id]) { ?>
																<div style="width:150px;margin:0px 0px 0px -45px">
																	<a class="acolor"  href="javascript:void(0);" onclick="addmore_volunteers(<?=$user5_id?>,1,1,'next_volunteers1_cnt')"><img onmouseover="mouseOver(<?=$user5_id?>);" onmouseout="mouseOut(<?=$user5_id?>);" id="img_1[<?=$user5_id?>]" src="images/dailyindicatior.png" /></a>
																	<br />
																	(<?=isset($_SESSION['uid'][$user5_id])?$_SESSION['uid'][$user5_id]:"0";?>)
																	<?=$user5_name?>
																	<div onmouseover="mouseOver(<?=$user5_id?>);" onmouseout="mouseOut(<?=$user5_id?>)" id="<?=$user5_id?>" style="background-color: rgba(0, 0, 0, 0.8); color:#FFFFFF; z-index:10; position: absolute; top: 0px; left: 52px; display:none; width:<?=$widths?>;">
																		<?=$user5_nm?>
																		<br>
																		<? if(isset($_SESSION['ruid'][$user5_id]) && $_SESSION['ruid'][$user5_id]==1) {?>
																		<a href="index.php?file=replace_volunteers&uid=<?=$user5_id?>">Replace</a><? } ?>
																	</div>
																	(<?=isset($_SESSION['act_mems'][$user5_id])?$_SESSION['act_mems'][$user5_id]:"0";?>)
																	 <br>
																	(<?=$user5_id;?>)
																</div>
															<? } else if($user5_img == "red" && $user5_img != "0" ) { ?>
																<div style="width:150px;margin:0px 0px 0px -45px">
																	<a class="acolor"  href="javascript:void(0);" onclick="addmore_volunteers(<?=$user5_id?>,1,1,'next_volunteers1_cnt')"><img id="img_1[<?=$user5_id?>]" src="images/sred.png" /></a><br />
																	<?=$user5_name?>
																	(<?=isset($_SESSION['uid'][$user5_id])?$_SESSION['uid'][$user5_id]:"0";?>)
																	(<?=isset($_SESSION['act_mems'][$user5_id])?$_SESSION['act_mems'][$user5_id]:"0";?>)
																	<div onmouseover="mouseOver(<?=$user5_id?>);" onmouseout="mouseOut(<?=$user5_id?>)" id="<?=$user5_id?>" style="background-color: rgba(0, 0, 0, 0.8); color:#FFFFFF; z-index:10; position: absolute; top: 0px; left: 52px; display:none; width:<?=$widths?>;">
																		<?=$user5_nm?><br>
																		<? if(isset($_SESSION['ruid'][$user5_id]) && $_SESSION['ruid'][$user5_id]==1) {?>
																		<a href="index.php?file=replace_volunteers&uid=<?=$user5_id?>">Replace</a><? } ?>
																	</div>
																	<br>
																	(<?=$user5_id;?>)
																</div>
															<? } */
															else if($user5_img == "none" && $user5_img != "0" ){ ?>
																<div><img src="images/snone.png" /><br /><?=$user5_name?></div>
															<? } else  {?>
																<div style="width:150px;margin:0px 0px 0px -45px">
																		<a class="acolor"  href="javascript:void(0);" onclick="addmore_volunteers(<?=$user5_id?>,1,1,'next_volunteers1_cnt')">
																			<?php echo (($user5_img>=20)?'<img id="img_1['.$user5_id.']" onmouseover="mouseOver('.$user5_id.');" onmouseout="mouseOut('.$user5_id.');" src="images/03.png" />':(($user5_img>=10)?'<img id="img_1['.$user5_id.']" onmouseover="mouseOver('.$user5_id.');" onmouseout="mouseOut('.$user5_id.');" src="images/syellow.png" />':(($user5_img>=6)?'<img id="img_1['.$user5_id.']" onmouseover="mouseOver('.$user5_id.');" onmouseout="mouseOut('.$user5_id.');" src="images/sred.png" />':(($user5_img>=5)?'<img id="img_1['.$user5_id.']" onmouseover="mouseOver('.$user5_id.');" onmouseout="mouseOut('.$user5_id.');" src="images/sgreen.png" />':(($user5_img==4)?'<img id="img_1['.$user5_id.']" onmouseover="mouseOver('.$user5_id.');" onmouseout="mouseOut('.$user5_id.');" src="images/sorange.png" />':($user5_img>=1)?'<img id="img_1['.$user5_id.']" onmouseover="mouseOver('.$user5_id.');" onmouseout="mouseOut('.$user5_id.');" src="images/spurple.png" />':'<img id="img_1['.$user5_id.']" onmouseover="mouseOver('.$user5_id.');" onmouseout="mouseOut('.$user5_id.');" src="images/sgray.png" />')))))?>
																		</a>
																		<br />
																		(<?=isset($_SESSION['uid'][$user5_id])?$_SESSION['uid'][$user5_id]:"0";?>)
																		<?=$user5_name?>
																		<div onmouseover="mouseOver(<?=$user5_id?>);" onmouseout="mouseOut(<?=$user5_id?>)" id="<?=$user5_id?>" style="background-color: rgba(0, 0, 0, 0.8); color:#FFFFFF; z-index:10; position: absolute; top: 0px; left: 52px; display:none; width:<?=$widths?>;"><?=$user5_nm?><br></div>
																		(<?=isset($_SESSION['act_mems'][$user5_id])?$_SESSION['act_mems'][$user5_id]:"0";?>)
																		<br>
																		(<?=$user5_id;?>)
																</div>
															<? } ?>
                                                    
                                                   			<div class="float_clear"></div>
                                                    </li>
                                                 	<li class="float_left">
															<? if($user6_note == "inactive") { ?>
																<div class="float_right right_img">
																	    <a class="acolor"   href="javascript:void(0);" onclick="addmore_volunteers(<?=$user6_id?>,1,1,'next_volunteers1_cnt')"><img onmouseover="mouseOver(<?=$user6_id?>);" onmouseout="mouseOut(<?=$user6_id?>);" id="img_1[<?=$user6_id?>]" src="images/02.png" /></a>
																		<div class="username_img">
																			(<?=isset($_SESSION['uid'][$user6_id])?$_SESSION['uid'][$user6_id]:"0";?>)
																			<?=$user6_name?>
																				<div onmouseover="mouseOver(<?=$user6_id?>);" onmouseout="mouseOut(<?=$user6_id?>)" id="<?=$user6_id?>" style="background-color: rgba(0, 0, 0, 0.8); color:#FFFFFF; z-index:10; position: absolute; top: -47px; left: -22px; display:none; width:<?=$widths?>;">
																					<?=$user6_nm?><br>
																					<? if(isset($_SESSION['ruid'][$user6_id]) && $_SESSION['ruid'][$user6_id]==1) {?>
																						<a href="index.php?file=replace_volunteers&uid=<?=$user6_id?>">Replace</a>
																					<? } ?>
																				</div>
																				(<?=isset($_SESSION['act_mems'][$user6_id])?$_SESSION['act_mems'][$user6_id]:"0";?>)
																				<br>
																				(<?=$user6_id;?>)
																		 </div>
																</div>
															<? }
															/* else if((isset($_SESSION['have_pay_yday'][$user6_id]) && $_SESSION['have_pay_yday'][$user6_id])){ ?>
																<div class="float_right right_img">
																	<a class="acolor"   href="javascript:void(0);" onclick="addmore_volunteers(<?=$user6_id?>,1,1,'next_volunteers1_cnt')"><img onmouseover="mouseOver(<?=$user6_id?>);" onmouseout="mouseOut(<?=$user6_id?>);" id="img_1[<?=$user6_id?>]" src="images/sred.png" /></a>
																	<div class="username_img">
																		(<?=isset($_SESSION['uid'][$user6_id])?$_SESSION['uid'][$user6_id]:"0";?>)
																		<?=$user6_name?>
																		<div onmouseover="mouseOver(<?=$user6_id?>);" onmouseout="mouseOut(<?=$user6_id?>)" id="<?=$user6_id?>" style="background-color: rgba(0, 0, 0, 0.8); color:#FFFFFF; z-index:10; position: absolute; top: -47px; left: -22px; display:none; width:<?=$widths?>;">
																			<?=$user6_nm?><br>
																		<? if(isset($_SESSION['ruid'][$user6_id]) && $_SESSION['ruid'][$user6_id]==1) {?><a href="index.php?file=replace_volunteers&uid=<?=$user6_id?>">Replace</a><? } ?>
																		</div>
																		(<?=isset($_SESSION['act_mems'][$user6_id])?$_SESSION['act_mems'][$user6_id]:"0";?>)
																		<br>
																	    (<?=$user6_id;?>)
																	</div>
																</div>
															<? } else if(isset($_SESSION['have_pay_5day'][$user6_id]) && $_SESSION['have_pay_5day'][$user6_id]){ ?>
																<div class="float_right right_img">
																	<a class="acolor"   href="javascript:void(0);" onclick="addmore_volunteers(<?=$user6_id?>,1,1,'next_volunteers1_cnt')">
																		<img onmouseover="mouseOver(<?=$user6_id?>);" onmouseout="mouseOut(<?=$user6_id?>);" id="img_1[<?=$user6_id?>]" src="images/dailyindicatior.png" />
																	</a>
																	<div class="username_img">
																		(<?=isset($_SESSION['uid'][$user6_id])?$_SESSION['uid'][$user6_id]:"0";?>)
																		<?=$user6_name?>
																		<div onmouseover="mouseOver(<?=$user6_id?>);" onmouseout="mouseOut(<?=$user6_id?>)" id="<?=$user6_id?>" style="background-color: rgba(0, 0, 0, 0.8); color:#FFFFFF; z-index:10; position: absolute; top: -47px; left: -22px; display:none; width:<?=$widths?>;">
																		<?=$user6_name?><br><? if(isset($_SESSION['ruid'][$user6_id]) && $_SESSION['ruid'][$user6_id]==1) {?><a href="index.php?file=replace_volunteers&uid=<?=$user6_id?>">Replace</a><? } ?>
																		</div>
																		(<?=isset($_SESSION['act_mems'][$user6_id])?$_SESSION['act_mems'][$user6_id]:"0";?>)
																		<br>
																		(<?=$user6_id;?>)
																	</div>
																</div>
															<? } else if($user6_img == "red" && $user6_img != "0" ) { ?>
																<div class="float_right right_img">
																	<a class="acolor"   href="javascript:void(0);" onclick="addmore_volunteers(<?=$user6_id?>,1,1,'next_volunteers1_cnt')"><img onmouseover="mouseOver(<?=$user6_id?>);" onmouseout="mouseOut(<?=$user6_id?>);" id="img_1[<?=$user6_id?>]" src="images/sred.png" /></a>
																	<div class="username_img">
																			(<?=isset($_SESSION['uid'][$user6_id])?$_SESSION['uid'][$user6_id]:"0";?>)
																			<?=$user6_name?>
																			<div onmouseover="mouseOver(<?=$user6_id?>);" onmouseout="mouseOut(<?=$user6_id?>)" id="<?=$user6_id?>" style="background-color: rgba(0, 0, 0, 0.8); color:#FFFFFF; z-index:10; position: absolute; top: -47px; left: -22px; display:none; width:<?=$widths?>;">
																					<?=$user6_name?><br>
																					<? if(isset($_SESSION['ruid'][$user6_id]) && $_SESSION['ruid'][$user6_id]==1) {?><a href="index.php?file=replace_volunteers&uid=<?=$user6_id?>">Replace</a><? } ?>
																			</div>
																			(<?=isset($_SESSION['act_mems'][$user6_id])?$_SESSION['act_mems'][$user6_id]:"0";?>)
																			<br>
																			(<?=$user6_id;?>)
																	</div>
																</div>
															<? }*/
															else if($user6_img == "none" && $user6_img != "0" ){?>
																<div class="float_right right_img"><img src="images/snone.png" /><div class="username_img"><?=$user6_name?></div></div>
															<? }else {?>
																<div class="float_right right_img">
																	<a class="acolor"  href="javascript:void(0);" onclick="addmore_volunteers(<?=$user6_id?>,1,1,'next_volunteers1_cnt')">
																		<?php echo (($user6_img>=20)?'<img id="img_1['.$user6_id.']" onmouseover="mouseOver('.$user6_id.');" onmouseout="mouseOut('.$user6_id.');" src="images/03.png" />':(($user6_img>=10)?'<img id="img_1['.$user6_id.']" onmouseover="mouseOver('.$user6_id.');" onmouseout="mouseOut('.$user6_id.');" src="images/syellow.png" />':(($user6_img>=6)?'<img id="img_1['.$user6_id.']" onmouseover="mouseOver('.$user6_id.');" onmouseout="mouseOut('.$user6_id.');" src="images/sred.png" />':(($user6_img>=5)?'<img id="img_1['.$user6_id.']" onmouseover="mouseOver('.$user6_id.');" onmouseout="mouseOut('.$user6_id.');" src="images/sgreen.png" />':(($user6_img==4)?'<img id="img_1['.$user6_id.']" onmouseover="mouseOver('.$user6_id.');" onmouseout="mouseOut('.$user6_id.');" src="images/sorange.png" />':($user6_img>=1)?'<img id="img_1['.$user6_id.']" onmouseover="mouseOver('.$user6_id.');" onmouseout="mouseOut('.$user6_id.');" src="images/spurple.png" />':'<img id="img_1['.$user6_id.']" onmouseover="mouseOver('.$user6_id.');" onmouseout="mouseOut('.$user6_id.');" src="images/sgray.png" />')))))?>
																	</a>
																	<div class="username_img">
																		(<?=isset($_SESSION['uid'][$user6_id])?$_SESSION['uid'][$user6_id]:"0";?>)
																		<?=$user6_name?>
																		<div onmouseover="mouseOver(<?=$user6_id?>);" onmouseout="mouseOut(<?=$user6_id?>)" id="<?=$user6_id?>" style="background-color: rgba(0, 0, 0, 0.8); z-index:10; position: absolute; top: -47px; left: -22px; color:#FFFFFF; display:none; width:<?=$widths?>;">
																		<?=$user6_nm?><br>
																	</div>
																	(<?=isset($_SESSION['act_mems'][$user6_id])?$_SESSION['act_mems'][$user6_id]:"0";?>)
																	<br>
																	(<?=$user6_id;?>)
																	</div>
																</div>
															<? } ?>
                                                   		<div class="float_clear"></div>
													</li>
												</ul>
												<div class="clearboth" id="next_volunteers1[1]"></div>
												<input type="hidden" value="1" id="next_volunteers1_cnt" name="next_volunteers1_cnt" />
											</li>
											<!-- middle tree -->
											<li class="float_left">
     												<? if($user2_note == "inactive"){ ?>
														<div>
															<!--<a class="acolor" href="volunteers.php?user_id=<?=$user2_id?>">-->
															<img onmouseover="mouseOver(<?=$user2_id?>);" onmouseout="mouseOut(<?=$user2_id?>);" src="images/02.png" />
															<!--</a>--><br />
															(<?=isset($_SESSION['uid'][$user2_id])?$_SESSION['uid'][$user2_id]:"0";?>)
															<?=$user2_name?>
															<div onmouseover="mouseOver(<?=$user2_id?>);" onmouseout="mouseOut(<?=$user2_id?>)" id="<?=$user2_id?>"  style="background-color: rgba(0, 0, 0, 0.8); color:#FFFFFF; z-index:10; position: absolute; top: 274px; left: 411px; display:none; width:<?=$widths?>;">
																<?=$user2_nm?><br>
																<? if(isset($_SESSION['ruid'][$user2_id]) && $_SESSION['ruid'][$user2_id] == 1) { ?>
																<a href="index.php?file=replace_volunteers&uid=<?=$user2_id?>">Replace</a><? } ?>
															</div>
															(<?=isset($_SESSION['act_mems'][$user2_id])?$_SESSION['act_mems'][$user2_id]:"0";?>)
															<br>
															(<?=$user2_id;?>)
														</div>
													<? }
													/* else if((isset($_SESSION['have_pay_yday'][$user2_id]) && $_SESSION['have_pay_yday'][$user2_id])){?>
														<div>
															<!--<a class="acolor" href="volunteers.php?user_id=<?=$user2_id?>">-->
															<img onmouseover="mouseOver(<?=$user2_id?>);" onmouseout="mouseOut(<?=$user2_id?>);" src="images/sred.png" />
														    <!--</a>--><br />
															(<?=isset($_SESSION['uid'][$user2_id])?$_SESSION['uid'][$user2_id]:"0";?>)
															<?=$user2_name?>
															<div onmouseover="mouseOver(<?=$user2_id?>);" onmouseout="mouseOut(<?=$user2_id?>)" id="<?=$user2_id?>"  style="background-color: rgba(0, 0, 0, 0.8); color:#FFFFFF; z-index:10; position: absolute; top: 274px; left: 411px; display:none; width:<?=$widths?>;">
																<?=$user2_nm?><br>
																<? if(isset($_SESSION['ruid'][$user2_id]) && $_SESSION['ruid'][$user2_id] == 1) { ?><a href="index.php?file=replace_volunteers&uid=<?=$user2_id?>">Replace</a><? } ?>
															</div>
															(<?=isset($_SESSION['act_mems'][$user2_id])?$_SESSION['act_mems'][$user2_id]:"0";?>)
															<br>
															(<?=$user2_id;?>)
														</div>
													<? } else if(isset($_SESSION['have_pay_5day'][$user2_id]) && $_SESSION['have_pay_5day'][$user2_id]){?>
														<div>
																<img onmouseover="mouseOver(<?=$user2_id?>);" onmouseout="mouseOut(<?=$user2_id?>);" src="images/dailyindicatior.png" />
																<br />
																(<?=isset($_SESSION['uid'][$user2_id])?$_SESSION['uid'][$user2_id]:"0";?>)
																<?=$user2_nm?>
																<div onmouseover="mouseOver(<?=$user2_id?>);" onmouseout="mouseOut(<?=$user2_id?>)" id="<?=$user2_id?>" style="background-color: rgba(0, 0, 0, 0.8); color:#FFFFFF; z-index:10; position: absolute; top: 274px; left: 411px; display:none; width:<?=$widths?>;">
																	<?=$user2_name?><br><? if(isset($_SESSION['ruid'][$user2_id]) && $_SESSION['ruid'][$user2_id] == 1) { ?><a href="index.php?file=replace_volunteers&uid=<?=$user2_id?>">Replace</a><? } ?>
																</div>
																(<?=isset($_SESSION['act_mems'][$user2_id])?$_SESSION['act_mems'][$user2_id]:"0";?>)
																<br>
																(<?=$user2_id;?>)
														</div>
													<? } else if($user2_img == "red" && $user2_img != "0" ) {?>
														<div>
															<!--<a class="acolor" href="volunteers.php?user_id=<?=$user2_id?>">-->
															<img onmouseover="mouseOver(<?=$user2_id?>);" onmouseout="mouseOut(<?=$user2_id?>);" src="images/sred.png" />
															<!--</a>--><br />
															(<?=isset($_SESSION['uid'][$user2_id])?$_SESSION['uid'][$user2_id]:"0";?>)
															<?=$user2_nm?>
															<div onmouseover="mouseOver(<?=$user2_id?>);" onmouseout="mouseOut(<?=$user2_id?>)" id="<?=$user2_id?>" style="background-color: rgba(0, 0, 0, 0.8); color:#FFFFFF; z-index:10; position: absolute; top:274px; left: 411px; display:none; width:<?=$widths?>;"><?=$user2_name?><br><? if(isset($_SESSION['ruid'][$user2_id]) && $_SESSION['ruid'][$user2_id] == 1) { ?><a href="index.php?file=replace_volunteers&uid=<?=$user2_id?>">Replace</a><? } ?></div>
															(<?=isset($_SESSION['act_mems'][$user2_id])?$_SESSION['act_mems'][$user2_id]:"0";?>)
															<br>
															(<?=$user2_id;?>)
														</div>
													<? } */
													else if($user2_img == "none" && $user2_img != "0" ) { ?>
														<div><img src="images/snone.png" /><br /><?=$user2_name?></div>
													<? } else { ?>
                                          				<div>
															<!--<a class="acolor" href="volunteers.php?user_id=<?=$user2_id?>">-->
															<?php echo (($user2_img>=20)?'<img onmouseover="mouseOver('.$user2_id.');" onmouseout="mouseOut('.$user2_id.');" src="images/03.png" />':(($user2_img>=10)?'<img onmouseover="mouseOver('.$user2_id.');" onmouseout="mouseOut('.$user2_id.');" src="images/syellow.png" />':(($user2_img>=6)?'<img onmouseover="mouseOver('.$user2_id.');" onmouseout="mouseOut('.$user2_id.');" src="images/sred.png" />':(($user2_img>=5)?'<img onmouseover="mouseOver('.$user2_id.');" onmouseout="mouseOut('.$user2_id.');" src="images/sgreen.png" />':(($user2_img==4)?'<img onmouseover="mouseOver('.$user2_id.');" onmouseout="mouseOut('.$user2_id.');" src="images/sorange.png" />':($user2_img>=1)?'<img onmouseover="mouseOver('.$user2_id.');" onmouseout="mouseOut('.$user2_id.');" src="images/spurple.png" />':'<img onmouseover="mouseOver('.$user2_id.');" onmouseout="mouseOut('.$user2_id.');" src="images/sgray.png" />')))))?>
															<!--</a--><br/>
															(<?=isset($_SESSION['uid'][$user2_id])?$_SESSION['uid'][$user2_id]:"0";?>)
															<?=$user2_name?>
															<div onmouseover="mouseOver(<?=$user2_id?>);" onmouseout="mouseOut(<?=$user2_id?>)" id="<?=$user2_id?>" style="background-color: rgba(0, 0, 0, 0.8); z-index:10; color:#FFFFFF; position: absolute; top: 274px; left: 411px; display:none; width:<?=$widths?>;"><?=$user2_nm?><br></div>
															(<?=isset($_SESSION['act_mems'][$user2_id])?$_SESSION['act_mems'][$user2_id]:"0";?>)
															<br>
															(<?=$user2_id;?>)
														</div>
													<? } ?>
													<div class="float_clear"></div>
                                            	<ul class="border_second">
                                                	<li class="float_left"><div class="float_left"><img src="images/line.jpg"/></div></li>
                                                    <li class="float_left"><div><img src="images/line.jpg" /></div></li>
                                                    <li class="float_left"><div class="float_right"><img src="images/line.jpg"/></div></li>
                                                </ul>
                                                <ul class="top_move">
                                                	<li class="float_left">
														<? if($user7_note == "inactive") { ?>
															<div class="float_left left_img">
																<a class="acolor"href="javascript:void(0);" onclick="addmore_volunteers(<?=$user7_id?>,1,2,'next_volunteers2_cnt')"><img onmouseover="mouseOver(<?=$user7_id?>);" onmouseout="mouseOut(<?=$user7_id?>);" id="img_2[<?=$user7_id?>]" src="images/02.png" /></a>
																<div class="username_img">
																	(<?=isset($_SESSION['uid'][$user7_id])?$_SESSION['uid'][$user7_id]:"0";?>)
																	<?=$user7_name?>
																	<div onmouseover="mouseOver(<?=$user7_id?>);" onmouseout="mouseOut(<?=$user7_id?>)" id="<?=$user7_id?>" style="background-color: rgba(0, 0, 0, 0.8); color:#FFFFFF; z-index:10; color:#FFFFFF; position: absolute; top: -47px; left: 11px; display:none; width:<?=$widths?>;">
																		<?=$user7_nm?><br>
																		<? if(isset($_SESSION['ruid'][$user7_id]) && $_SESSION['ruid'][$user7_id] == 1) { ?>
																		<a href="index.php?file=replace_volunteers&uid=<?=$user7_id?>">Replace</a><? } ?>
																	</div>
																	(<?=isset($_SESSION['act_mems'][$user7_id])?$_SESSION['act_mems'][$user7_id]:"0";?>)
																	<br>
																	(<?=$user7_id;?>)
																</div>
															</div>
														<? }
														/* else if((isset($_SESSION['have_pay_yday'][$user7_id]) && $_SESSION['have_pay_yday'][$user7_id])){ ?>
															<div class="float_left left_img">
																<a class="acolor"href="javascript:void(0);" onclick="addmore_volunteers(<?=$user7_id?>,1,2,'next_volunteers2_cnt')"><img onmouseover="mouseOver(<?=$user7_id?>);" onmouseout="mouseOut(<?=$user7_id?>);" id="img_2[<?=$user7_id?>]" src="images/sred.png" /></a>
																<div class="username_img">
																		(<?=isset($_SESSION['uid'][$user7_id])?$_SESSION['uid'][$user7_id]:"0";?>)
																	    <?=$user7_name?>
																		<div onmouseover="mouseOver(<?=$user7_id?>);" onmouseout="mouseOut(<?=$user7_id?>)" id="<?=$user7_id?>" style="background-color: rgba(0, 0, 0, 0.8); color:#FFFFFF; z-index:10; color:#FFFFFF; position: absolute; top: -47px; left: 10px; display:none; width:<?=$widths?>;"><?=$user7_nm?><br><? if(isset($_SESSION['ruid'][$user7_id]) && $_SESSION['ruid'][$user7_id] == 1) { ?><a href="index.php?file=replace_volunteers&uid=<?=$user7_id?>">Replace</a><? } ?></div>
																		(<?=isset($_SESSION['act_mems'][$user7_id])?$_SESSION['act_mems'][$user7_id]:"0";?>)
																		<br>
																		(<?=$user7_id;?>)
																</div>
															</div>
														<? } else if(isset($_SESSION['have_pay_5day'][$user7_id]) && $_SESSION['have_pay_5day'][$user7_id]){ ?>
															<div class="float_left left_img">
																<a class="acolor"href="javascript:void(0);" onclick="addmore_volunteers(<?=$user7_id?>,1,2,'next_volunteers2_cnt')"><img onmouseover="mouseOver(<?=$user7_id?>);" onmouseout="mouseOut(<?=$user7_id?>);" id="img_2[<?=$user7_id?>]" src="images/dailyindicatior.png" /></a>
																<div class="username_img">
																	(<?=isset($_SESSION['uid'][$user7_id])?$_SESSION['uid'][$user7_id]:"0";?>)
																	<?=$user7_name?>
																	<div onmouseover="mouseOver(<?=$user7_id?>);" onmouseout="mouseOut(<?=$user7_id?>)" id="<?=$user7_id?>" style="background-color: rgba(0, 0, 0, 0.8); color:#FFFFFF; z-index:10; color:#FFFFFF; position: absolute; top: -47px; left: 10px; display:none; width:<?=$widths?>;"><?=$user7_nm?><br><? if(isset($_SESSION['ruid'][$user7_id]) && $_SESSION['ruid'][$user7_id] == 1) { ?><a href="index.php?file=replace_volunteers&uid=<?=$user7_id?>">Replace</a><? } ?></div>
																	(<?=isset($_SESSION['act_mems'][$user7_id])?$_SESSION['act_mems'][$user7_id]:"0";?>)
																	<br>
																	(<?=$user7_id;?>)
																</div>
															</div>
														<? } else if($user7_img == "red" && $user7_img != "0" ) { ?>
															<div class="float_left left_img">
																<a class="acolor"href="javascript:void(0);" onclick="addmore_volunteers(<?=$user7_id?>,1,2,'next_volunteers2_cnt')"><img onmouseover="mouseOver(<?=$user7_id?>);" onmouseout="mouseOut(<?=$user7_id?>);" id="img_2[<?=$user7_id?>]" src="images/sred.png" /></a>
																<div class="username_img">
																	(<?=isset($_SESSION['uid'][$user7_id])?$_SESSION['uid'][$user7_id]:"0";?>)
																	<?=$user7_name?>
																	<div onmouseover="mouseOver(<?=$user7_id?>);" onmouseout="mouseOut(<?=$user7_id?>)" id="<?=$user7_id?>" style="background-color: rgba(0, 0, 0, 0.8); color:#FFFFFF; z-index:10; color:#FFFFFF; position: absolute; top: -47px; left: 10px; display:none; width:<?=$widths?>;"><?=$user7_nm?><br><? if(isset($_SESSION['ruid'][$user7_id]) && $_SESSION['ruid'][$user7_id] == 1) { ?><a href="index.php?file=replace_volunteers&uid=<?=$user7_id?>">Replace</a><? } ?></div>
																	(<?=isset($_SESSION['act_mems'][$user7_id])?$_SESSION['act_mems'][$user7_id]:"0";?>)
																	<br>
																	(<?=$user7_id;?>)
																</div>
															</div>
														<? } */
														else if($user7_img == "none" && $user7_img != "0" ) {?>
															<div class="float_left left_img"><img src="images/snone.png" /><div class="username_img"><?=$user7_name?></div></div>
														<? } else { ?>
															<div class="float_left left_img">
																<a class="acolor" href="javascript:void(0);" onclick="addmore_volunteers(<?=$user7_id?>,1,2,'next_volunteers2_cnt')">
																	<?php echo (($user7_img>=20)?'<img id="img_2['.$user7_id.']" onmouseover="mouseOver('.$user7_id.');" onmouseout="mouseOut('.$user7_id.');" src="images/03.png" />':(($user7_img>=10)?'<img id="img_2['.$user7_id.']" onmouseover="mouseOver('.$user7_id.');" onmouseout="mouseOut('.$user7_id.');" src="images/syellow.png" />':(($user7_img>=6)?'<img id="img_2['.$user7_id.']" onmouseover="mouseOver('.$user7_id.');" onmouseout="mouseOut('.$user7_id.');" src="images/sred.png" />':(($user7_img>=5)?'<img id="img_2['.$user7_id.']" onmouseover="mouseOver('.$user7_id.');" onmouseout="mouseOut('.$user7_id.');" src="images/sgreen.png" />':(($user7_img==4)?'<img id="img_2['.$user7_id.']" onmouseover="mouseOver('.$user7_id.');" onmouseout="mouseOut('.$user7_id.');" src="images/sorange.png" />':($user7_img>=1)?'<img id="img_2['.$user7_id.']" onmouseover="mouseOver('.$user7_id.');" onmouseout="mouseOut('.$user7_id.');" src="images/spurple.png" />':'<img id="img_2['.$user7_id.']" onmouseover="mouseOver('.$user7_id.');" onmouseout="mouseOut('.$user7_id.');" src="images/sgray.png" />')))))?>
																</a>
																<div class="username_img">
																	(<?=isset($_SESSION['uid'][$user7_id])?$_SESSION['uid'][$user7_id]:"0";?>)
																	<?=$user7_name?>
																	<div onmouseover="mouseOver(<?=$user7_id?>);" onmouseout="mouseOut(<?=$user7_id?>)" id="<?=$user7_id?>" style="background-color: rgba(0, 0, 0, 0.8); z-index:10; color:#FFFFFF; position: absolute; top: -47px; left: 10px; display:none; width:<?=$widths?>;"><?=$user7_nm?><br></div>
																	(<?=isset($_SESSION['act_mems'][$user7_id])?$_SESSION['act_mems'][$user7_id]:"0";?>)
																	<br>
																	(<?=$user7_id;?>)
																</div>
															</div>
														<? } ?>
                                                        <div class="float_clear"></div>
                                                    </li>
                                                    <li class="float_left">
														<? if($user8_note == "inactive"){ ?>
															<div style="width:150px; margin: 0px 0px 0px -45px;">
																	<a class="acolor" href="javascript:void(0);" onclick="addmore_volunteers(<?=$user8_id?>,1,2,'next_volunteers2_cnt')"><img onmouseover="mouseOver(<?=$user8_id?>);" onmouseout="mouseOut(<?=$user8_id?>);" id="img_2[<?=$user8_id?>]" src="images/02.png" /></a>
																	<br />
																	(<?=isset($_SESSION['uid'][$user8_id])?$_SESSION['uid'][$user8_id]:"0";?>)
																	<?=$user8_name?>
																	<div onmouseover="mouseOver(<?=$user8_id?>);" onmouseout="mouseOut(<?=$user8_id?>)" id="<?=$user8_id?>" style="background-color: rgba(0, 0, 0, 0.8); color:#FFFFFF; z-index:10; position: absolute; top: 358px; left: 406px;  display:none; width:<?=$widths?>;">
																		<?=$user8_nm?><br><? if(isset($_SESSION['ruid'][$user8_id]) && $_SESSION['ruid'][$user8_id] == 1) { ?><a href="index.php?file=replace_volunteers&uid=<?=$user8_id?>">Replace</a><? } ?>
																	</div>
																	(<?=isset($_SESSION['act_mems'][$user8_id])?$_SESSION['act_mems'][$user8_id]:"0";?>)
																	<br>
																	(<?=$user8_id;?>)
															</div>
														<? }
														/*else if((isset($_SESSION['have_pay_yday'][$user8_id]) && $_SESSION['have_pay_yday'][$user8_id])){?>
															<div style="width:150px; margin: 0px 0px 0px -45px;">
																<a class="acolor" href="javascript:void(0);" onclick="addmore_volunteers(<?=$user8_id?>,1,2,'next_volunteers2_cnt')"><img onmouseover="mouseOver(<?=$user8_id?>);" onmouseout="mouseOut(<?=$user8_id?>);" id="img_2[<?=$user8_id?>]" src="images/sred.png" /></a>
																<br />
																(<?=isset($_SESSION['uid'][$user8_id])?$_SESSION['uid'][$user8_id]:"0";?>)
																<?=$user8_name?>
																<div onmouseover="mouseOver(<?=$user8_id?>);" onmouseout="mouseOut(<?=$user8_id?>)" id="<?=$user8_id?>" style="background-color: rgba(0, 0, 0, 0.8); color:#FFFFFF; z-index:10; position: absolute;  top: 358px; left: 406px;   display:none; width:<?=$widths?>;"><?=$user8_nm?><br><? if(isset($_SESSION['ruid'][$user8_id]) && $_SESSION['ruid'][$user8_id] == 1) { ?><a href="index.php?file=replace_volunteers&uid=<?=$user8_id?>">Replace</a><? } ?></div>
																(<?=isset($_SESSION['act_mems'][$user8_id])?$_SESSION['act_mems'][$user8_id]:"0";?>)
																<br>
																(<?=$user8_id;?>)
															</div>
														<? } else if(isset($_SESSION['have_pay_5day'][$user8_id]) && $_SESSION['have_pay_5day'][$user8_id]){ ?>
															<div style="width:150px; margin: 0px 0px 0px -45px;">
																<a class="acolor" href="javascript:void(0);" onclick="addmore_volunteers(<?=$user8_id?>,1,2,'next_volunteers2_cnt')"><img onmouseover="mouseOver(<?=$user8_id?>);" onmouseout="mouseOut(<?=$user8_id?>);" id="img_2[<?=$user8_id?>]" src="images/dailyindicatior.png" /></a>
																<br />
																(<?=isset($_SESSION['uid'][$user8_id])?$_SESSION['uid'][$user8_id]:"0";?>)
																<?=$user8_name?>
																<div onmouseover="mouseOver(<?=$user8_id?>);" onmouseout="mouseOut(<?=$user8_id?>)" id="<?=$user8_id?>" style="background-color: rgba(0, 0, 0, 0.8); color:#FFFFFF; z-index:10; position: absolute; top: 358px; left: 406px;   display:none; width:<?=$widths?>;"><?=$user8_nm?><br><? if(isset($_SESSION['ruid'][$user8_id]) && $_SESSION['ruid'][$user8_id] == 1) { ?><a href="index.php?file=replace_volunteers&uid=<?=$user8_id?>">Replace</a><? } ?></div>
																(<?=isset($_SESSION['act_mems'][$user8_id])?$_SESSION['act_mems'][$user8_id]:"0";?>)
																<br>
																(<?=$user8_id;?>)
															</div>
														<? } else if($user8_img == "red" && $user8_img != "0" ) {?>
															<div style="width:150px; margin: 0px 0px 0px -45px;">
																<a class="acolor" href="javascript:void(0);" onclick="addmore_volunteers(<?=$user8_id?>,1,2,'next_volunteers2_cnt')"><img onmouseover="mouseOver(<?=$user8_id?>);" onmouseout="mouseOut(<?=$user8_id?>);" id="img_2[<?=$user8_id?>]" src="images/sred.png" /></a><br />
																(<?=isset($_SESSION['uid'][$user8_id])?$_SESSION['uid'][$user8_id]:"0";?>)
																<?=$user8_name?>
																	<div onmouseover="mouseOver(<?=$user8_id?>);" onmouseout="mouseOut(<?=$user8_id?>)" id="<?=$user8_id?>" style="background-color: rgba(0, 0, 0, 0.8); color:#FFFFFF; z-index:10; position: absolute; top: 358px; left: 406px;   display:none; width:<?=$widths?>;"><?=$user8_nm?><br><? if(isset($_SESSION['ruid'][$user8_id]) && $_SESSION['ruid'][$user8_id] == 1) { ?><a href="index.php?file=replace_volunteers&uid=<?=$user8_id?>">Replace</a><? } ?></div>
																	(<?=isset($_SESSION['act_mems'][$user8_id])?$_SESSION['act_mems'][$user8_id]:"0";?>)
																	<br>
																	(<?=$user8_id;?>)
															</div>
														<? } */
														else if($user8_img == "none" && $user8_img != "0" ) { ?>
															<div><img src="images/snone.png" /><br /><?=$user8_name?></div>
														<? } else{  ?>
															<div >
																<a class="acolor" href="javascript:void(0);" onclick="addmore_volunteers(<?=$user8_id?>,1,2,'next_volunteers2_cnt')">
																	<?php echo (($user8_img>=20)?'<img id="img_2['.$user8_id.']" onmouseover="mouseOver('.$user8_id.');" onmouseout="mouseOut('.$user8_id.');" src="images/03.png" />':(($user8_img>=10)?'<img id="img_2['.$user8_id.']" onmouseover="mouseOver('.$user8_id.');" onmouseout="mouseOut('.$user8_id.');" src="images/syellow.png" />':(($user8_img>=6)?'<img id="img_2['.$user8_id.']" onmouseover="mouseOver('.$user8_id.');" onmouseout="mouseOut('.$user8_id.');" src="images/sred.png" />':(($user8_img>=5)?'<img id="img_2['.$user8_id.']" onmouseover="mouseOver('.$user8_id.');" onmouseout="mouseOut('.$user8_id.');" src="images/sgreen.png" />':(($user8_img==4)?'<img id="img_2['.$user8_id.']" onmouseover="mouseOver('.$user8_id.');" onmouseout="mouseOut('.$user8_id.');" src="images/sorange.png" />':($user8_img>=1)?'<img id="img_2['.$user8_id.']" onmouseover="mouseOver('.$user8_id.');" onmouseout="mouseOut('.$user8_id.');" src="images/spurple.png" />':'<img id="img_2['.$user8_id.']" onmouseover="mouseOver('.$user8_id.');" onmouseout="mouseOut('.$user8_id.');" src="images/sgray.png" />')))))?>
																</a>
																<br />
																(<?=isset($_SESSION['uid'][$user8_id])?$_SESSION['uid'][$user8_id]:"0";?>)
																<?=$user8_name?>
																<div onmouseover="mouseOver(<?=$user8_id?>);" onmouseout="mouseOut(<?=$user8_id?>)" id="<?=$user8_id?>" style="background-color: rgba(0, 0, 0, 0.8); z-index:10; color:#FFFFFF; position: absolute;  top: 358px; left: 406px;  display:none; width:<?=$widths?>;"><?=$user8_nm?><br></div>
																(<?=isset($_SESSION['act_mems'][$user8_id])?$_SESSION['act_mems'][$user8_id]:"0";?>)
																<br>
																(<?=$user8_id;?>)
															</div>
														<? } ?>
														<div class="float_clear"></div>
													</li>
													<li class="float_left">
														<? if($user9_note == "inactive"){ ?>
															<div class="float_right right_img">
																<a class="acolor" href="javascript:void(0);" onclick="addmore_volunteers(<?=$user9_id?>,1,2,'next_volunteers2_cnt')"><img onmouseover="mouseOver(<?=$user9_id?>);" onmouseout="mouseOut(<?=$user9_id?>);" id="img_2[<?=$user9_id?>]" src="images/02.png" /></a><br />
																<div class="username_img">
																	(<?=isset($_SESSION['uid'][$user9_id])?$_SESSION['uid'][$user9_id]:"0";?>)
																	<?=$user9_name?>
																	<div onmouseover="mouseOver(<?=$user9_id?>);" onmouseout="mouseOut(<?=$user9_id?>)" id="<?=$user9_id?>" style="background-color: rgba(0, 0, 0, 0.8); color:#FFFFFF; z-index:10; position: absolute; top: -48px; left: -20px; display:none; width:<?=$widths?>;"><?=$user9_nm?><br><? if(isset($_SESSION['ruid'][$user9_id]) && $_SESSION['ruid'][$user9_id] == 1) { ?><a href="index.php?file=replace_volunteers&uid=<?=$user9_id?>">Replace</a><? } ?></div>
																	(<?=isset($_SESSION['act_mems'][$user9_id])?$_SESSION['act_mems'][$user9_id]:"0";?>)
																	<br>
																	(<?=$user9_id;?>)
																</div>
															</div>
														<? } 
														/*else if((isset($_SESSION['have_pay_yday'][$user9_id]) && $_SESSION['have_pay_yday'][$user9_id])){ ?>
															<div class="float_right right_img">
																<a class="acolor" href="javascript:void(0);" onclick="addmore_volunteers(<?=$user9_id?>,1,2,'next_volunteers2_cnt')"><img onmouseover="mouseOver(<?=$user9_id?>);" onmouseout="mouseOut(<?=$user9_id?>);" id="img_2[<?=$user9_id?>]" src="images/sred.png" /></a>
																<div class="username_img">
																	(<?=isset($_SESSION['uid'][$user9_id])?$_SESSION['uid'][$user9_id]:"0";?>)
																	<?=$user9_name?>
																		<div onmouseover="mouseOver(<?=$user9_id?>);" onmouseout="mouseOut(<?=$user9_id?>)" id="<?=$user9_id?>" style="background-color: rgba(0, 0, 0, 0.8); color:#FFFFFF; z-index:10; position: absolute; top: -48px; left: -20px; display:none; width:<?=$widths?>;"><?=$user9_nm?><br><? if(isset($_SESSION['ruid'][$user9_id]) && $_SESSION['ruid'][$user9_id] == 1) { ?><a href="index.php?file=replace_volunteers&uid=<?=$user9_id?>">Replace</a><? } ?></div>
																		(<?=isset($_SESSION['act_mems'][$user9_id])?$_SESSION['act_mems'][$user9_id]:"0";?>)
																		<br>
																		(<?=$user9_id;?>)
																</div>
															</div>
														<? } else if(isset($_SESSION['have_pay_5day'][$user9_id]) && $_SESSION['have_pay_5day'][$user9_id]){?>
															<div class="float_right right_img">
																<a class="acolor" href="javascript:void(0);" onclick="addmore_volunteers(<?=$user9_id?>,1,2,'next_volunteers2_cnt')"><img onmouseover="mouseOver(<?=$user9_id?>);" onmouseout="mouseOut(<?=$user9_id?>);" id="img_2[<?=$user9_id?>]" src="images/dailyindicatior.png" /></a>
																<div class="username_img">
																	(<?=isset($_SESSION['uid'][$user9_id])?$_SESSION['uid'][$user9_id]:"0";?>)
																	<?=$user9_name?>
																	<div onmouseover="mouseOver(<?=$user9_id?>);" onmouseout="mouseOut(<?=$user9_id?>)" id="<?=$user9_id?>" style="background-color: rgba(0, 0, 0, 0.8); color:#FFFFFF; z-index:10; position: absolute; top: -48px; left: -20px; display:none; width:<?=$widths?>;"><?=$user9_nm?><br><? if(isset($_SESSION['ruid'][$user9_id]) && $_SESSION['ruid'][$user9_id] == 1) { ?><a href="index.php?file=replace_volunteers&uid=<?=$user9_id?>">Replace</a><? } ?></div>
																	(<?=isset($_SESSION['act_mems'][$user9_id])?$_SESSION['act_mems'][$user9_id]:"0";?>)
																	<br>
																	(<?=$user9_id;?>)
																</div>
															</div>
														<? } else if($user9_img == "red" && $user9_img != "0" ){ ?>
															<div class="float_right right_img">
																<a class="acolor" href="javascript:void(0);" onclick="addmore_volunteers(<?=$user9_id?>,1,2,'next_volunteers2_cnt')"><img onmouseover="mouseOver(<?=$user9_id?>);" onmouseout="mouseOut(<?=$user9_id?>);" id="img_2[<?=$user9_id?>]" src="images/sred.png" /></a>
																<div class="username_img">
																	(<?=isset($_SESSION['uid'][$user9_id])?$_SESSION['uid'][$user9_id]:"0";?>)
																	<?=$user9_name?>
																	<div onmouseover="mouseOver(<?=$user9_id?>);" onmouseout="mouseOut(<?=$user9_id?>)" id="<?=$user9_id?>" style="background-color: rgba(0, 0, 0, 0.8); color:#FFFFFF; z-index:10; position: absolute; top: -48px; left: -20px; display:none; width:<?=$widths?>;"><?=$user9_nm?><br><? if(isset($_SESSION['ruid'][$user9_id]) && $_SESSION['ruid'][$user9_id] == 1) { ?><a href="index.php?file=replace_volunteers&uid=<?=$user9_id?>">Replace</a><? } ?></div>
																	(<?=isset($_SESSION['act_mems'][$user9_id])?$_SESSION['act_mems'][$user9_id]:"0";?>)
																	<br>
																	(<?=$user9_id;?>)
																</div>
															</div>
														<? } */
														else if($user9_img == "none" && $user9_img != "0" ) { ?>
															<div class="float_right right_img"><img src="images/snone.png" /><div class="username_img"><?=$user9_name?></div></div>
														<? } else { ?>
															<div class="float_right right_img">
																<a class="acolor" href="javascript:void(0);" onclick="addmore_volunteers(<?=$user9_id?>,1,2,'next_volunteers2_cnt')">
																	<?php echo (($user9_img>=20)?'<img id="img_2['.$user9_id.']" onmouseover="mouseOver('.$user9_id.');" onmouseout="mouseOut('.$user9_id.');" src="images/03.png" />':(($user9_img>=10)?'<img id="img_2['.$user9_id.']" onmouseover="mouseOver('.$user9_id.');" onmouseout="mouseOut('.$user9_id.');" src="images/syellow.png" />':(($user9_img>=6)?'<img id="img_2['.$user9_id.']" onmouseover="mouseOver('.$user9_id.');" onmouseout="mouseOut('.$user9_id.');" src="images/sred.png" />':(($user9_img>=5)?'<img id="img_2['.$user9_id.']" onmouseover="mouseOver('.$user9_id.');" onmouseout="mouseOut('.$user9_id.');" src="images/sgreen.png" />':(($user9_img==4)?'<img id="img_2['.$user9_id.']" onmouseover="mouseOver('.$user9_id.');" onmouseout="mouseOut('.$user9_id.');" src="images/sorange.png" />':($user9_img>=1)?'<img id="img_2['.$user9_id.']" onmouseover="mouseOver('.$user9_id.');" onmouseout="mouseOut('.$user9_id.');" src="images/spurple.png" />':'<img id="img_2['.$user9_id.']" onmouseover="mouseOver('.$user9_id.');" onmouseout="mouseOut('.$user9_id.');" src="images/sgray.png" />')))))?>
																</a>
																	<div class="username_img">
																		(<?=isset($_SESSION['uid'][$user9_id])?$_SESSION['uid'][$user9_id]:"0";?>)
																		<?=$user9_name?>
																		<div onmouseover="mouseOver(<?=$user9_id?>);" onmouseout="mouseOut(<?=$user9_id?>)" id="<?=$user9_id?>" style="background-color: rgba(0, 0, 0, 0.8); z-index:10; position: absolute; top: -48px; left: -20px; color:#FFFFFF; display:none; width:<?=$widths?>;"><?=$user9_nm?><br></div>
																		(<?=isset($_SESSION['act_mems'][$user9_id])?$_SESSION['act_mems'][$user9_id]:"0";?>)
																		<br>
																		(<?=$user9_id;?>)
																	</div>
															</div>
														<? } ?>
														<div class="float_clear"></div>
                                                    </li>
                                                </ul>
												<div class="clearboth" id="next_volunteers2[1]"></div>
												<input type="hidden" value="1" id="next_volunteers2_cnt" name="next_volunteers2_cnt" />
											</li>
											<!-- Third tree -->
											<li class="float_left">
													<? if($user3_note == "inactive"){ ?>
														<div class="float_right right_img">
															<!--<a class="acolor" href="volunteers.php?user_id=<?=$user3_id?>">-->
															<img onmouseover="mouseOver(<?=$user3_id?>);" onmouseout="mouseOut(<?=$user3_id?>);" src="images/02.png" />
															<!--</a>-->
															<div class="username_img">
																(<?=isset($_SESSION['uid'][$user3_id])?$_SESSION['uid'][$user3_id]:"0";?>)
																<?=$user3_name?>
																<div onmouseover="mouseOver(<?=$user3_id?>);" onmouseout="mouseOut(<?=$user3_id?>)" id="<?=$user3_id?>" style="background-color: rgba(0, 0, 0, 0.8); color:#FFFFFF; z-index:10; position: absolute; top: -47px; left: 3px; display:none; width:<?=$widths?>;"><?=$user3_nm?><br><? if(isset($_SESSION['ruid'][$user3_id]) && $_SESSION['ruid'][$user3_id] == 1) { ?><a href="index.php?file=replace_volunteers&uid=<?=$user3_id?>">Replace</a><? } ?></div>
																(<?=isset($_SESSION['act_mems'][$user3_id])?$_SESSION['act_mems'][$user3_id]:"0";?>)
																<br>
																(<?=$user3_id;?>)
															</div>
														</div>
													<? } 
													/*else if((isset($_SESSION['have_pay_yday'][$user3_id]) && $_SESSION['have_pay_yday'][$user3_id])){ ?>
														<div class="float_right right_img">
															<!--<a class="acolor" href="volunteers.php?user_id=<?=$user3_id?>">-->
															<img onmouseover="mouseOver(<?=$user3_id?>);" onmouseout="mouseOut(<?=$user3_id?>);" src="images/sred.png" />
															<!--</a>-->
															<div class="username_img">
																	(<?=isset($_SESSION['uid'][$user3_id])?$_SESSION['uid'][$user3_id]:"0";?>)
																	<?=$user3_name?>
																	<div onmouseover="mouseOver(<?=$user3_id?>);" onmouseout="mouseOut(<?=$user3_id?>)" id="<?=$user3_id?>" style="background-color: rgba(0, 0, 0, 0.8); color:#FFFFFF; z-index:10; position: absolute; top: -47px; left: 3px; display:none; width:<?=$widths?>;"><?=$user3_nm?><br><? if(isset($_SESSION['ruid'][$user3_id]) && $_SESSION['ruid'][$user3_id] == 1) { ?><a href="index.php?file=replace_volunteers&uid=<?=$user3_id?>">Replace</a><? } ?></div>
																	(<?=isset($_SESSION['act_mems'][$user3_id])?$_SESSION['act_mems'][$user3_id]:"0";?>)
																	<br>
																	(<?=$user3_id;?>)
															</div>
														</div>
													<? } else if(isset($_SESSION['have_pay_5day'][$user3_id]) && $_SESSION['have_pay_5day'][$user3_id]){ ?>
														<div class="float_right right_img">
															<!--<a class="acolor" href="volunteers.php?user_id=<?=$user3_id?>">-->
																<img onmouseover="mouseOver(<?=$user3_id?>);" onmouseout="mouseOut(<?=$user3_id?>);" src="images/dailyindicatior.png" />
															<!--</a>-->
															<div class="username_img">
																(<?=isset($_SESSION['uid'][$user3_id])?$_SESSION['uid'][$user3_id]:"0";?>)
																<?=$user3_name?>
																<div onmouseover="mouseOver(<?=$user3_id?>);" onmouseout="mouseOut(<?=$user3_id?>)" id="<?=$user3_id?>" style="background-color: rgba(0, 0, 0, 0.8); color:#FFFFFF; z-index:10; position: absolute; top: -47px; left: 3px; display:none; width:<?=$widths?>;"><?=$user3_nm?><br><? if(isset($_SESSION['ruid'][$user3_id]) && $_SESSION['ruid'][$user3_id] == 1) { ?><a href="index.php?file=replace_volunteers&uid=<?=$user3_id?>">Replace</a><? } ?></div>
																(<?=isset($_SESSION['act_mems'][$user3_id])?$_SESSION['act_mems'][$user3_id]:"0";?>)
																<br>
																(<?=$user3_id;?>)
															</div>
														</div>
													<? } else if($user3_img == "red" && $user3_img != "0" ) { ?>
														<div class="float_right right_img">
															<!--<a class="acolor" href="volunteers.php?user_id=<?=$user3_id?>">-->
																<img onmouseover="mouseOver(<?=$user3_id?>);" onmouseout="mouseOut(<?=$user3_id?>);" src="images/sred.png" />
															<!--</a>-->
															<div class="username_img">
																	(<?=isset($_SESSION['uid'][$user3_id])?$_SESSION['uid'][$user3_id]:"0";?>)
																	<?=$user3_name?>
																	<div onmouseover="mouseOver(<?=$user3_id?>);" onmouseout="mouseOut(<?=$user3_id?>)" id="<?=$user3_id?>" style="background-color: rgba(0, 0, 0, 0.8); color:#FFFFFF; z-index:10; position: absolute; top: -47px; left: -23px; display:none; width:<?=$widths?>;"><?=$user3_nm?><br><? if(isset($_SESSION['ruid'][$user3_id]) && $_SESSION['ruid'][$user3_id] == 1) { ?><a href="index.php?file=replace_volunteers&uid=<?=$user3_id?>">Replace</a><? } ?></div>
																	(<?=isset($_SESSION['act_mems'][$user3_id])?$_SESSION['act_mems'][$user3_id]:"0";?>)
																	<br>
																	(<?=$user3_id;?>)
															</div>
														</div>
													<? } */
													else if($user3_img == "none" && $user3_img != "0" ) { ?>
														<div class="float_right right_img"><img src="images/snone.png" /><div class="username_img"><?=$user3_name?></div></div>
													<? } else { ?>
														<div class="float_right right_img">
															<!--<a class="acolor" href="volunteers.php?user_id=<?=$user3_id?>">-->
															<?php echo (($user3_img>=20)?'<img onmouseover="mouseOver('.$user3_id.');" onmouseout="mouseOut('.$user3_id.');" src="images/03.png" />':(($user3_img>=10)?'<img onmouseover="mouseOver('.$user3_id.');" onmouseout="mouseOut('.$user3_id.');" src="images/syellow.png" />':(($user3_img>=6)?'<img onmouseover="mouseOver('.$user3_id.');" onmouseout="mouseOut('.$user3_id.');" src="images/sred.png" />':(($user3_img>=5)?'<img onmouseover="mouseOver('.$user3_id.');" onmouseout="mouseOut('.$user3_id.');" src="images/sgreen.png" />':(($user3_img==4)?'<img onmouseover="mouseOver('.$user3_id.');" onmouseout="mouseOut('.$user3_id.');" src="images/sorange.png" />':($user3_img>=1)?'<img onmouseover="mouseOver('.$user3_id.');" onmouseout="mouseOut('.$user3_id.');" src="images/spurple.png" />':'<img onmouseover="mouseOver('.$user3_id.');" onmouseout="mouseOut('.$user3_id.');" src="images/sgray.png" />')))))?><br />
															<div class="username_img">
																(<?=isset($_SESSION['uid'][$user3_id])?$_SESSION['uid'][$user3_id]:"0";?>)
																<?=$user3_name?>
																<div onmouseover="mouseOver(<?=$user3_id?>);" onmouseout="mouseOut(<?=$user3_id?>)" id="<?=$user3_id?>" style="background-color: rgba(0, 0, 0, 0.8); z-index:10; color:#FFFFFF; position: absolute; top: -47px; left: -23px; display:none; width:<?=$widths?>;"><?=$user3_nm?><br></div>
																(<?=isset($_SESSION['act_mems'][$user3_id])?$_SESSION['act_mems'][$user3_id]:"0";?>)
																<br>(<?=$user3_id;?>)
															</div>
														</div>
													<? } ?>
													<div class="float_clear"></div>
													<ul class="border_second right">
														<li class="float_left"><div class="float_left"><img src="images/line.jpg"/></div></li>
														<li class="float_left"><div><img src="images/line.jpg" /></div></li>
														<li class="float_left"><div class="float_right"><img src="images/line.jpg"/></div></li>
													</ul>
													<ul class="right top_move">
                                                		<li class="float_left">
																<? if($user10_note == "inactive") { ?>
																	<div class="float_left left_img"><a class="acolor" href="javascript:void(0);" onclick="addmore_volunteers(<?=$user10_id?>,1,3,'next_volunteers3_cnt')"><img onmouseover="mouseOver(<?=$user10_id?>);" onmouseout="mouseOut(<?=$user10_id?>);" id="img_3[<?=$user10_id?>]" src="images/02.png" /></a>
																		<div class="username_img">
    																		(<?=isset($_SESSION['uid'][$user10_id])?$_SESSION['uid'][$user10_id]:"0";?>)
																			<?=$user10_name?>
																			<div onmouseover="mouseOver(<?=$user10_id?>);" onmouseout="mouseOut(<?=$user10_id?>)" id="<?=$user10_id?>" style="background-color: rgba(0, 0, 0, 0.8); color:#FFFFFF; z-index:10; position: absolute; top: -47px; left: -24px; display:none; width:<?=$widths?>;"><?=$user10_nm?><br><? if(isset($_SESSION['ruid'][$user10_id]) && $_SESSION['ruid'][$user10_id] == 1) { ?><a href="index.php?file=replace_volunteers&uid=<?=$user10_id?>">Replace</a><? } ?></div>
																			(<?=isset($_SESSION['act_mems'][$user10_id])?$_SESSION['act_mems'][$user10_id]:"0";?>)
																			<br>
																			(<?=$user10_id;?>)
																		</div>
																	</div>
																<? }
																/* else if((isset($_SESSION['have_pay_yday'][$user10_id]) && $_SESSION['have_pay_yday'][$user10_id])){ ?>
																	<div class="float_left left_img">
																		<a class="acolor" href="javascript:void(0);" onclick="addmore_volunteers(<?=$user10_id?>,1,3,'next_volunteers3_cnt')"><img onmouseover="mouseOver(<?=$user10_id?>);" onmouseout="mouseOut(<?=$user10_id?>);" id="img_3[<?=$user10_id?>]" src="images/sred.png" /></a>
																		<div class="username_img">
																			(<?=isset($_SESSION['uid'][$user10_id])?$_SESSION['uid'][$user10_id]:"0";?>)
																			<?=$user10_name?>
																			<div onmouseover="mouseOver(<?=$user10_id?>);" onmouseout="mouseOut(<?=$user10_id?>)" id="<?=$user10_id?>" style="background-color: rgba(0, 0, 0, 0.8); color:#FFFFFF; z-index:10; position: absolute; top: -47px; left: -24px; display:none; width:<?=$widths?>;"><?=$user10_nm?><br><? if(isset($_SESSION['ruid'][$user10_id]) && $_SESSION['ruid'][$user10_id] == 1) { ?><a href="index.php?file=replace_volunteers&uid=<?=$user10_id?>">Replace</a><? } ?></div>
																			(<?=isset($_SESSION['act_mems'][$user10_id])?$_SESSION['act_mems'][$user10_id]:"0";?>)
																			<br>
																			(<?=$user10_id;?>)
																		</div>
																	</div>
																<? } else if(isset($_SESSION['have_pay_5day'][$user10_id]) && $_SESSION['have_pay_5day'][$user10_id]){ ?>
																	<div class="float_left left_img">
																		<a class="acolor" href="javascript:void(0);" onclick="addmore_volunteers(<?=$user10_id?>,1,3,'next_volunteers3_cnt')"><img onmouseover="mouseOver(<?=$user10_id?>);" onmouseout="mouseOut(<?=$user10_id?>);" id="img_3[<?=$user10_id?>]" src="images/dailyindicatior.png" /></a>
																		<div class="username_img">
																			(<?=isset($_SESSION['uid'][$user10_id])?$_SESSION['uid'][$user10_id]:"0";?>)
																			<?=$user10_name?>
																			<div onmouseover="mouseOver(<?=$user10_id?>);" onmouseout="mouseOut(<?=$user10_id?>)" id="<?=$user10_id?>" style="background-color: rgba(0, 0, 0, 0.8); color:#FFFFFF; z-index:10; position: absolute; top: -47px; left: -24px; display:none; width:<?=$widths?>;"><?=$user10_nm?><br><? if(isset($_SESSION['ruid'][$user10_id]) && $_SESSION['ruid'][$user10_id] == 1) { ?><a href="index.php?file=replace_volunteers&uid=<?=$user10_id?>">Replace</a><? } ?></div>
																			(<?=isset($_SESSION['act_mems'][$user10_id])?$_SESSION['act_mems'][$user10_id]:"0";?>)
																			<br>
																			(<?=$user10_id;?>)
																		</div>
																	</div>
																<? }else if($user10_img == "red" && $user10_img != "0" ){ ?>
																	<div class="float_left left_img">
																		<a class="acolor" href="javascript:void(0);" onclick="addmore_volunteers(<?=$user10_id?>,1,3,'next_volunteers3_cnt')"><img onmouseover="mouseOver(<?=$user10_id?>);" onmouseout="mouseOut(<?=$user10_id?>);" id="img_3[<?=$user10_id?>]" src="images/sred.png" /></a>
																		<div class="username_img">
																				(<?=isset($_SESSION['uid'][$user10_id])?$_SESSION['uid'][$user10_id]:"0";?>)
																				<?=$user10_name?>
																				<div onmouseover="mouseOver(<?=$user10_id?>);" onmouseout="mouseOut(<?=$user10_id?>)" id="<?=$user10_id?>" style="background-color: rgba(0, 0, 0, 0.8); color:#FFFFFF; z-index:10; position: absolute; top: -47px; left: -24px; display:none; width:<?=$widths?>;"><?=$user10_nm?><br><? if(isset($_SESSION['ruid'][$user10_id]) && $_SESSION['ruid'][$user10_id] == 1) { ?><a href="index.php?file=replace_volunteers&uid=<?=$user10_id?>">Replace</a><? } ?></div>
																				(<?=isset($_SESSION['act_mems'][$user10_id])?$_SESSION['act_mems'][$user10_id]:"0";?>)
																				<br>
																				(<?=$user10_id;?>)
																			</div>
																	</div>
																<? } */
																else if($user10_img == "none" && $user10_img != "0" ){ ?>
																	<div class="float_left left_img"><img src="images/snone.png" /><div class="username_img"><?=$user10_name?></div></div>
																<? } else { ?>
																	<div class="float_left left_img">
																		<a class="acolor" href="javascript:void(0);" onclick="addmore_volunteers(<?=$user10_id?>,1,3,'next_volunteers3_cnt')">
																			<?php echo (($user10_img>=20)?'<img id="img_3['.$user10_id.']" onmouseover="mouseOver('.$user10_id.');" onmouseout="mouseOut('.$user10_id.');" src="images/03.png" />':(($user10_img>=10)?'<img id="img_3['.$user10_id.']" onmouseover="mouseOver('.$user10_id.');" onmouseout="mouseOut('.$user10_id.');" src="images/syellow.png" />':(($user10_img>=6)?'<img id="img_3['.$user10_id.']" onmouseover="mouseOver('.$user10_id.');" onmouseout="mouseOut('.$user10_id.');" src="images/sred.png" />':(($user10_img>=5)?'<img id="img_3['.$user10_id.']" onmouseover="mouseOver('.$user10_id.');" onmouseout="mouseOut('.$user10_id.');" src="images/sgreen.png" />':(($user10_img==4)?'<img id="img_3['.$user10_id.']" onmouseover="mouseOver('.$user10_id.');" onmouseout="mouseOut('.$user10_id.');" src="images/sorange.png" />':($user10_img>=1)?'<img id="img_3['.$user10_id.']" onmouseover="mouseOver('.$user10_id.');" onmouseout="mouseOut('.$user10_id.');" src="images/spurple.png" />':'<img id="img_3['.$user10_id.']" onmouseover="mouseOver('.$user10_id.');" onmouseout="mouseOut('.$user10_id.');" src="images/sgray.png" />')))))?>
																		</a><br />
																		<div class="username_img">
																			(<?=isset($_SESSION['uid'][$user10_id])?$_SESSION['uid'][$user10_id]:"0";?>)
																			<?=$user10_name?>
																			<div onmouseover="mouseOver(<?=$user10_id?>);" onmouseout="mouseOut(<?=$user10_id?>)" id="<?=$user10_id?>" style="background-color: rgba(0, 0, 0, 0.8); z-index:10; position: absolute; top: -47px; color:#FFFFFF; left: -24px; display:none; width:<?=$widths?>;"><?=$user10_nm?><br></div>
																			(<?=isset($_SESSION['act_mems'][$user10_id])?$_SESSION['act_mems'][$user10_id]:"0";?>)
																			<br>
																			(<?=$user10_id;?>)
																		</div>
																	</div>
																<? } ?>
																
                                                   				<div class="float_clear"></div>
														</li>
														<li class="float_left">
																<? if($user11_note == "inactive") { ?>
																	<div style="width:150px; margin:0px 0px 0px -45px">
																		<a class="acolor" href="javascript:void(0);" onclick="addmore_volunteers(<?=$user11_id?>,1,3,'next_volunteers3_cnt')"><img onmouseover="mouseOver(<?=$user11_id?>);" onmouseout="mouseOut(<?=$user11_id?>);" id="img_3[<?=$user11_id?>]" src="images/02.png" /></a>
																		<br />
																		(<?=isset($_SESSION['uid'][$user11_id])?$_SESSION['uid'][$user11_id]:"0";?>)
																		<?=$user11_name?>
																		<div onmouseover="mouseOver(<?=$user11_id?>);" onmouseout="mouseOut(<?=$user11_id?>)" id="<?=$user11_id?>" style="background-color: rgba(0, 0, 0, 0.8); color:#FFFFFF; z-index:10; position: absolute; top: 0px; left: 51px; display:none; width:<?=$widths?>;"><?=$user11_nm?><br><? if(isset($_SESSION['ruid'][$user11_id]) && $_SESSION['ruid'][$user11_id] == 1) { ?><a href="index.php?file=replace_volunteers&uid=<?=$user11_id?>">Replace</a><? } ?></div>
																		(<?=isset($_SESSION['act_mems'][$user11_id])?$_SESSION['act_mems'][$user11_id]:"0";?>)
																		<br>
																		(<?=$user11_id;?>)
																	</div>
																<? }
																/*else if((isset($_SESSION['have_pay_yday'][$user11_id]) && $_SESSION['have_pay_yday'][$user11_id])){ ?>
																	<div style="width:150px; margin:0px 0px 0px -45px">
																		<a class="acolor" href="javascript:void(0);" onclick="addmore_volunteers(<?=$user11_id?>,1,3,'next_volunteers3_cnt')"><img onmouseover="mouseOver(<?=$user11_id?>);" onmouseout="mouseOut(<?=$user11_id?>);" id="img_3[<?=$user11_id?>]" src="images/sred.png" /></a><br />
																		(<?=isset($_SESSION['uid'][$user11_id])?$_SESSION['uid'][$user11_id]:"0";?>)
																		<?=$user11_name?>
																		<div onmouseover="mouseOver(<?=$user11_id?>);" onmouseout="mouseOut(<?=$user11_id?>)" id="<?=$user11_id?>" style="background-color: rgba(0, 0, 0, 0.8); color:#FFFFFF; z-index:10; position: absolute; top: 0px; left: 51px; display:none; width:<?=$widths?>;"><?=$user11_nm?><br><? if(isset($_SESSION['ruid'][$user11_id]) && $_SESSION['ruid'][$user11_id] == 1) { ?><a href="index.php?file=replace_volunteers&uid=<?=$user11_id?>">Replace</a><? } ?></div>
																		(<?=isset($_SESSION['act_mems'][$user11_id])?$_SESSION['act_mems'][$user11_id]:"0";?>)
																		<br>
																		(<?=$user11_id;?>)
																	</div>
																<? } else if(isset($_SESSION['have_pay_5day'][$user11_id]) && $_SESSION['have_pay_5day'][$user11_id]){ ?>
																	<div style="width:150px; margin:0px 0px 0px -45px">
																		<a class="acolor" href="javascript:void(0);" onclick="addmore_volunteers(<?=$user11_id?>,1,3,'next_volunteers3_cnt')"><img onmouseover="mouseOver(<?=$user11_id?>);" onmouseout="mouseOut(<?=$user11_id?>);" id="img_3[<?=$user11_id?>]" src="images/dailyindicatior.png" /></a><br />
																		(<?=isset($_SESSION['uid'][$user11_id])?$_SESSION['uid'][$user11_id]:"0";?>)
																		<?=$user11_name?>
																		<div onmouseover="mouseOver(<?=$user11_id?>);" onmouseout="mouseOut(<?=$user11_id?>)" id="<?=$user11_id?>" style="background-color: rgba(0, 0, 0, 0.8); color:#FFFFFF; z-index:10; position: absolute; top: 0px; left: 51px; display:none; width:<?=$widths?>;"><?=$user11_nm?><br><? if(isset($_SESSION['ruid'][$user11_id]) && $_SESSION['ruid'][$user11_id] == 1) { ?><a href="index.php?file=replace_volunteers&uid=<?=$user11_id?>">Replace</a><? } ?></div>
																		(<?=isset($_SESSION['act_mems'][$user11_id])?$_SESSION['act_mems'][$user11_id]:"0";?>)
																		<br>
																		(<?=$user11_id;?>)
																	</div>
																<? } else if($user11_img == "red" && $user11_img != "0" ){ ?>
																	<div style="width:150px; margin:0px 0px 0px -45px">
																		<a class="acolor" href="javascript:void(0);" onclick="addmore_volunteers(<?=$user11_id?>,1,3,'next_volunteers3_cnt')"><img onmouseover="mouseOver(<?=$user11_id?>);" onmouseout="mouseOut(<?=$user11_id?>);" id="img_3[<?=$user11_id?>]" src="images/sred.png" /></a><br />
																		(<?=isset($_SESSION['uid'][$user11_id])?$_SESSION['uid'][$user11_id]:"0";?>)
																		<?=$user11_name?>
																		<div onmouseover="mouseOver(<?=$user11_id?>);" onmouseout="mouseOut(<?=$user11_id?>)" id="<?=$user11_id?>" style="background-color: rgba(0, 0, 0, 0.8); color:#FFFFFF; z-index:10; position: absolute; top: 0px; left: 51px; display:none; width:<?=$widths?>;"><?=$user11_nm?><br><? if(isset($_SESSION['ruid'][$user11_id]) && $_SESSION['ruid'][$user11_id] == 1) { ?><a href="index.php?file=replace_volunteers&uid=<?=$user11_id?>">Replace</a><? } ?></div>
																		(<?=isset($_SESSION['act_mems'][$user11_id])?$_SESSION['act_mems'][$user11_id]:"0";?>)
																		<br>
																		(<?=$user11_id;?>)
																	</div>
																<? } */
																else if($user11_img == "none" && $user11_img != "0" ){ ?>
																	<div style="width:150px; margin:0px 0px 0px -45px"><img src="images/snone.png" /><br /><?=$user11_name?></div>
																<? } else { ?>
																	<div style="width:150px; margin:0px 0px 0px -45px">
																		<a class="acolor" href="javascript:void(0);" onclick="addmore_volunteers(<?=$user11_id?>,1,3,'next_volunteers3_cnt')">
																			<?php echo (($user11_img>=20)?'<img id="img_3['.$user11_id.']" onmouseover="mouseOver('.$user11_id.');" onmouseout="mouseOut('.$user11_id.');" src="images/03.png" />':(($user11_img>=10)?'<img id="img_3['.$user11_id.']" onmouseover="mouseOver('.$user11_id.');" onmouseout="mouseOut('.$user11_id.');" src="images/syellow.png" />':(($user11_img>=6)?'<img id="img_3['.$user11_id.']" onmouseover="mouseOver('.$user11_id.');" onmouseout="mouseOut('.$user11_id.');" src="images/sred.png" />':(($user11_img>=5)?'<img id="img_3['.$user11_id.']" onmouseover="mouseOver('.$user11_id.');" onmouseout="mouseOut('.$user11_id.');" src="images/sgreen.png" />':(($user11_img==4)?'<img id="img_3['.$user11_id.']" onmouseover="mouseOver('.$user11_id.');" onmouseout="mouseOut('.$user11_id.');" src="images/sorange.png" />':($user11_img>=1)?'<img id="img_3['.$user11_id.']" onmouseover="mouseOver('.$user11_id.');" onmouseout="mouseOut('.$user11_id.');" src="images/spurple.png" />':'<img id="img_3['.$user11_id.']" onmouseover="mouseOver('.$user11_id.');" onmouseout="mouseOut('.$user11_id.');" src="images/sgray.png" />')))))?>
																		</a><br />
																		(<?=isset($_SESSION['uid'][$user11_id])?$_SESSION['uid'][$user11_id]:"0";?>)
																		<?=$user11_name?>
																		<div onmouseover="mouseOver(<?=$user11_id?>);" onmouseout="mouseOut(<?=$user11_id?>)" id="<?=$user11_id?>" style="background-color: rgba(0, 0, 0, 0.8); z-index:10; position: absolute; color:#FFFFFF; top: 0px; left: 52px; display:none; width:<?=$widths?>;"><?=$user11_nm?><br></div>
																		(<?=isset($_SESSION['act_mems'][$user11_id])?$_SESSION['act_mems'][$user11_id]:"0";?>)
																		<br />
																		(<?=$user11_id;?>)
																	</div>
																<? } ?>
																
																<div class="float_clear"></div>
	                                                    </li>
    	                                                <li class="float_left">
																<? if($user12_note == "inactive"){ ?>
																	<div style="position:relative; left:35px;"  class="float_right right_img">
																		<a class="acolor" href="javascript:void(0);" onclick="addmore_volunteers(<?=$user12_id?>,1,3,'next_volunteers3_cnt')"><img onmouseover="mouseOver(<?=$user12_id?>);" onmouseout="mouseOut(<?=$user12_id?>);" id="img_3[<?=$user12_id?>]" src="images/02.png" /></a><br />
																		(<?=isset($_SESSION['uid'][$user12_id])?$_SESSION['uid'][$user12_id]:"0";?>)
																		<?=$user12_name?>
																		<div onmouseover="mouseOver(<?=$user12_id?>);" onmouseout="mouseOut(<?=$user12_id?>)" id="<?=$user12_id?>" style="background-color: rgba(0, 0, 0, 0.8); color:#FFFFFF; z-index:10; position: absolute; top: -17px; left: 15px; display:none; width:<?=$widths?>;"><?=$user12_nm?><br /><? if(isset($_SESSION['ruid'][$user12_id]) && $_SESSION['ruid'][$user12_id] == 1) { ?><a href="index.php?file=replace_volunteers&uid=<?=$user12_id?>">Replace</a><? } ?></div>
																		(<?=isset($_SESSION['act_mems'][$user12_id])?$_SESSION['act_mems'][$user12_id]:"0";?>)
																		<br>
																		(<?=$user12_id;?>)
																	</div>
																<? }
																/* else if((isset($_SESSION['have_pay_yday'][$user12_id]) && $_SESSION['have_pay_yday'][$user12_id])){ ?>
																	<div class="float_right right_img">
																		<a class="acolor" href="javascript:void(0);" onclick="addmore_volunteers(<?=$user12_id?>,1,3,'next_volunteers3_cnt')"><img onmouseover="mouseOver(<?=$user12_id?>);" onmouseout="mouseOut(<?=$user12_id?>);" id="img_3[<?=$user12_id?>]" src="images/sred.png" /></a><br />
																		(<?=isset($_SESSION['uid'][$user12_id])?$_SESSION['uid'][$user12_id]:"0";?>)
																		<?=$user12_name?>
																		<div onmouseover="mouseOver(<?=$user12_id?>);" onmouseout="mouseOut(<?=$user12_id?>)" id="<?=$user12_id?>" style="background-color: rgba(0, 0, 0, 0.8); color:#FFFFFF; z-index:10; position: absolute; top: -17px; left: 15px; display:none; width:<?=$widths?>;"><?=$user12_nm?><br /><? if(isset($_SESSION['ruid'][$user12_id]) && $_SESSION['ruid'][$user12_id] == 1) { ?><a href="index.php?file=replace_volunteers&uid=<?=$user12_id?>">Replace</a><? } ?></div>
																		(<?=isset($_SESSION['act_mems'][$user12_id])?$_SESSION['act_mems'][$user12_id]:"0";?>)
																		<br>
																		(<?=$user12_id;?>)
																	</div>
																<? }else if(isset($_SESSION['have_pay_5day'][$user12_id]) && $_SESSION['have_pay_5day'][$user12_id]){ ?>
																	<div class="float_right right_img">
																		<a class="acolor" href="javascript:void(0);" onclick="addmore_volunteers(<?=$user12_id?>,1,3,'next_volunteers3_cnt')">
																		<img onmouseover="mouseOver(<?=$user12_id?>);" onmouseout="mouseOut(<?=$user12_id?>);" id="img_3[<?=$user12_id?>]" src="images/dailyindicatior.png" />
																		</a>
																		<br />
																		(<?=isset($_SESSION['uid'][$user12_id])?$_SESSION['uid'][$user12_id]:"0";?>)
																		<?=$user12_name?>
																		<div onmouseover="mouseOver(<?=$user12_id?>);" onmouseout="mouseOut(<?=$user12_id?>)" id="<?=$user12_id?>" style="background-color: rgba(0, 0, 0, 0.8); color:#FFFFFF; z-index:10; position: absolute; top: -17px; left: 15px; display:none; width:<?=$widths?>;"><?=$user12_nm?><br /><? if(isset($_SESSION['ruid'][$user12_id]) && $_SESSION['ruid'][$user12_id] == 1) { ?><a href="index.php?file=replace_volunteers&uid=<?=$user12_id?>">Replace</a><? } ?></div>
																		(<?=isset($_SESSION['act_mems'][$user12_id])?$_SESSION['act_mems'][$user12_id]:"0";?>)
																		<br>
																		(<?=$user12_id;?>)
																	</div>
																<? } else if($user12_img == "red" && $user12_img != "0" ){?>
																	<div class="float_right right_img">
																		<a class="acolor" href="javascript:void(0);" onclick="addmore_volunteers(<?=$user12_id?>,1,3,'next_volunteers3_cnt')">
																		<img onmouseover="mouseOver(<?=$user12_id?>);" onmouseout="mouseOut(<?=$user12_id?>);" id="img_3[<?=$user12_id?>]" src="images/sred.png" /></a><br />
																		(<?=isset($_SESSION['uid'][$user12_id])?$_SESSION['uid'][$user12_id]:"0";?>)
																		<?=$user12_name?>
																		<div onmouseover="mouseOver(<?=$user12_id?>);" onmouseout="mouseOut(<?=$user12_id?>)" id="<?=$user12_id?>" style="background-color: rgba(0, 0, 0, 0.8); color:#FFFFFF; z-index:10; position: absolute; top: -17px; left: 15px; display:none; width:<?=$widths?>;"><?=$user12_nm?><br><? if(isset($_SESSION['ruid'][$user12_id]) && $_SESSION['ruid'][$user12_id] == 1) { ?><a href="index.php?file=replace_volunteers&uid=<?=$user12_id?>">Replace</a><? } ?></div>
																		(<?=isset($_SESSION['act_mems'][$user12_id])?$_SESSION['act_mems'][$user12_id]:"0";?>)
																		<br>
																		(<?=$user12_id;?>)
																	</div>
																<? }*/
																else if($user12_img == "none" && $user12_img != "0" ){ ?>
																	<div class="float_right right_img"><img src="images/snone.png" /><br /></div>
																	<!--<div class="float_right right_img"><img src="images/snone.png" /><br />fhfghfgh<div style="background-color: rgba(0, 0, 0, 0.8); z-index:10; position: absolute; top: -15px; left: 10px; color:#FFFFFF;">sdfsdsd<br></div></div>-->
																<? } else { 
																?>
																	<div class="float_right right_img">
																		<a class="acolor" href="javascript:void(0);" onclick="addmore_volunteers(<?=$user12_id?>,1,3,'next_volunteers3_cnt')">
																			<?php echo (($user12_img>=20)?'<img id="img_3['.$user12_id.']" onmouseover="mouseOver('.$user12_id.');" onmouseout="mouseOut('.$user12_id.');" src="images/03.png" />':(($user12_img>=10)?'<img id="img_3['.$user12_id.']" onmouseover="mouseOver('.$user12_id.');" onmouseout="mouseOut('.$user12_id.');" src="images/syellow.png" />':(($user12_img>=6)?'<img id="img_3['.$user12_id.']" onmouseover="mouseOver('.$user12_id.');" onmouseout="mouseOut('.$user12_id.');" src="images/sred.png" />':(($user12_img>=5)?'<img id="img_3['.$user12_id.']" onmouseover="mouseOver('.$user12_id.');" onmouseout="mouseOut('.$user12_id.');" src="images/sgreen.png" />':(($user12_img==4)?'<img id="img_3['.$user12_id.']" onmouseover="mouseOver('.$user12_id.');" onmouseout="mouseOut('.$user12_id.');" src="images/sorange.png" />':($user12_img>=1)?'<img id="img_3['.$user12_id.']" onmouseover="mouseOver('.$user12_id.');" onmouseout="mouseOut('.$user12_id.');" src="images/spurple.png" />':'<img id="img_3['.$user12_id.']" onmouseover="mouseOver('.$user12_id.');" onmouseout="mouseOut('.$user12_id.');" src="images/sgray.png" />')))))?>
																		</a><br />
																		(<?=isset($_SESSION['uid'][$user12_id])?$_SESSION['uid'][$user12_id]:"0";?>)
																		<?=$user12_name?>
																		<div onmouseover="mouseOver(<?=$user12_id?>);" onmouseout="mouseOut(<?=$user12_id?>)" id="<?=$user12_id?>" style="background-color: rgba(0, 0, 0, 0.8); z-index:10; position: absolute; top: -15px; left: 10px; color:#FFFFFF; display:none; width:<?=$widths?>;"><?=$user12_nm?><br></div>
																		(<?=isset($_SESSION['act_mems'][$user12_id])?$_SESSION['act_mems'][$user12_id]:"0";?>)
																		<br />
																		(<?=$user12_id;?>)
																	</div>
																<? } ?>
                                                    			<div class="float_clear"></div>
														</li>
													</ul>
													<div class="clearboth" id="next_volunteers3[1]"></div>
													<input type="hidden" value="1" id="next_volunteers3_cnt" name="next_volunteers3_cnt" />
												</li>
                                        </ul>
									</li>
								</ul>
                            </div>
                            <div class="float_clear"></div>
							<!--<input type="button" name="back" id="back" class="submit_btn" onclick="backbtn();" value="Back" />-->
                        </div>
						
						
						
						
						
						
						<?
							$sql = "select * from nodetree where usertb_id = '".$userids."'";
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
								$i = 0;
								$sql = "select sum(earn_val) as earn_val from m_earn_history where (earn_from = '".$row['u1']."' or earn_from = '".$row['u2']."' or earn_from = '".$row['u3']."') and  usertb_id = '".$userids."' and earn_type = 'earn' and earn_datetime like '".date("Y-m-d",mktime(0,0,0,date("m"),date("d")-1,date("Y")))."%'";
								$lvl1_row = $form->getRow($sql);
								$lvl1_amt = 0;
								if(sizeof($lvl1_row)>0)
								{
									$lvl1_amt = $lvl1_row['earn_val'];
								}
								$sql = "select * from nodetree where ( usertb_id = '".$row['u1']."' or usertb_id = '".$row['u2']."' or usertb_id = '".$row['u3']."')";
								$lvl2_row = $form->getArray($sql);
								$j = 0;

								$members = array();
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
						
									$members[$j++] =  $lvl2_row[$k]['u1'];
									$members[$j++] =  $lvl2_row[$k]['u2'];
									$members[$j++] =  $lvl2_row[$k]['u3'];
								}
								if(!empty($members))
								{
									$sql = "select sum(earn_val) as earn_val from m_earn_history where earn_from in(".implode(",",$members).") and  usertb_id = '".$userids."' and earn_type = 'earn' and earn_datetime like '".date("Y-m-d",mktime(0,0,0,date("m"),date("d")-1,date("Y")))."%'";
									$lvl2_row = $form->getRow($sql);
									$lvl2_amt = 0;
									if(sizeof($lvl2_row)>0)
									{
										$lvl2_amt = $lvl2_row['earn_val'];
									}
							
									$sql = "select * from nodetree where usertb_id in (".implode(",",$members).")";
									$lvl3_row = $form->getArray($sql);
									$j = 0;
									$members2 = array();
									$i =0;
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
										$members2[$j++] =  $lvl3_row[$k]['u1'];
										$members2[$j++] =  $lvl3_row[$k]['u2'];
										$members2[$j++] =  $lvl3_row[$k]['u3'];
									}
									if(!empty($members2))
									{
										$sql = "select sum(earn_val) as earn_val from m_earn_history where earn_from in(".implode(",",$members2).") and  usertb_id = '".$userids."' and earn_type = 'earn' and earn_datetime like '".date("Y-m-d",mktime(0,0,0,date("m"),date("d")-1,date("Y")))."%'";
										$lvl3_row = $form->getRow($sql);
										$lvl3_amt = 0;
										if(sizeof($lvl3_row)>0)
										{
											$lvl3_amt = $lvl3_row['earn_val'];
										}
									}
								}
							}
							$sql = "SELECT sum(`earn_val`) as e_val, level,count(*) as pay_mem FROM `m_earn_history` WHERE `earn_datetime` like '".date("Y-m-d",mktime(0,0,0,date("m"),date("d")-1,date("Y")))."%' and usertb_id = '".$userids."' and stream='0' group by level order by level asc";
							$e_row = $form->getArray($sql);
							$eval[1] = 0;
							$eval[2] = 0;
							$eval[3] = 0;
							$pay_yesterday = array();
							for($i=0;$i<sizeof($e_row);$i++)
							{
								$eval[$e_row[$i]['level']] = $e_row[$i]['e_val'];
								$pay_yesterday[$e_row[$i]['level']] = $e_row[$i]['pay_mem'];
							}
						
							$tot_act_user1 = 0;
							if(!empty($a_user1))
							{
								$str12 = implode(",",$a_user1);
								
								$sql = "select count(*) as tot_a_user from m_payment_fee where usertb_id in (".$str12.") and activedeactive = 'active' and payment_done='Yes'";
								$rec_act_user = $form->getRow($sql);
								$tot_act_user1 = $rec_act_user['tot_a_user'];
							}
						
							$tot_act_user2 = 0;
							if(!empty($a_user2))
							{
								$str12 = implode(",",$a_user2);
								$sql = "select count(*) as tot_a_user from m_payment_fee where usertb_id in (".$str12.") and activedeactive = 'active' and payment_done='Yes'";
								$rec_act_user = $form->getRow($sql);
								$tot_act_user2 = $rec_act_user['tot_a_user'];
							}
							
							$tot_act_user3 = 0;
							if(!empty($a_user3))
							{
								$str12 = implode(",",$a_user3);
								$sql = "select count(*) as tot_a_user from m_payment_fee where usertb_id in (".$str12.") and activedeactive = 'active' and payment_done='Yes'";
								$rec_act_user = $form->getRow($sql);
								$tot_act_user3 = $rec_act_user['tot_a_user'];
							}
							?>
								<div class="clearboth"></div>
								<div>
									<?
									//	if(!isset($_GET['user_id']))
										{
											include_once("volunteersmatrix.php");
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
												<th align="left"> Level </th> <th align="left"> Registered </th> <th align="left">NO. of Active Users</th>
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
					</div>
</section>

