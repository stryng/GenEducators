<?php
$msg = "";
$userids = (isset($_GET['user_id'])?$_GET['user_id']:(isset($_SESSION['userid'])?$_SESSION['userid']:0));
?>
<div id="content">
  	  	<div class="wrapper">
		<div class="widget" >
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
							for($k=0;$k<sizeof($e_row);$k++)
							{
								$eval[$e_row[$k]['level']] = $e_row[$k]['e_val'];
								$pay_yesterday[$e_row[$k]['level']] = $e_row[$k]['pay_mem'];
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
							$pay_yesterday[1] = isset($pay_yesterday[1])?$pay_yesterday[1]:0;
							$pay_yesterday[2] = isset($pay_yesterday[2])?$pay_yesterday[2]:0;
							$pay_yesterday[3] = isset($pay_yesterday[3])?$pay_yesterday[3]:0;
							?>
							<div class="main">
								<div class="clearboth"></div>
								<div style="height:20px;">Summary for Stream 3x3</div>
								<div class="clearboth"></div>
								<div>
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
									//print_r($members);die;
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
								$sql = "SELECT sum(`earn_val`) as e_val, level,count(*) as pay_mem  FROM `m_earn_history` WHERE `earn_datetime` like '".date("Y-m-d",mktime(0,0,0,date("m"),date("d")-1,date("Y")))."%' and usertb_id = '".$userids."'  and stream = '5_3' group by level order by level asc";
								$e_row = $form->getArray($sql);
								$eval[1] = 0;
								$eval[2] = 0;
								$eval[3] = 0;
								$pay_yesterday = array();
								for($k=0;$k<sizeof($e_row);$k++)
								{
									$eval[$e_row[$k]['level']] = $e_row[$k]['e_val'];
									$pay_yesterday[$e_row[$k]['level']] = $e_row[$k]['pay_mem'];
								}
							
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
								<div class="clearboth"></div>
								<div style="height:10px;"></div>
								<div style="height:20px;">Below Summary for Stream 5x3</div>
								<div class="clearboth"></div>
								<div>
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
							<?
								$sql = "select * from nodetree_10_3 where usertb_id = '".$userids."'";
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
									if($row['u6'] != 0)
									{
										$a_user1[$i++] = $row['u6'];
										$lvl1_mem++;
									}
									if($row['u7'] != 0)
									{
										$a_user1[$i++] = $row['u7'];
										$lvl1_mem++;
									}
									if($row['u8'] != 0)
									{
										$a_user1[$i++] = $row['u8'];
										$lvl1_mem++;
									}
									if($row['u9'] != 0)
									{
										$a_user1[$i++] = $row['u9'];
										$lvl1_mem++;
									}
									if($row['u10'] != 0)
									{
										$a_user1[$i++] = $row['u10'];
										$lvl1_mem++;
									}
									$sql = "select sum(earn_val) as earn_val from m_earn_history where (earn_from = '".$row['u1']."' or earn_from = '".$row['u2']."' or earn_from = '".$row['u3']."' or earn_from = '".$row['u4']."' or earn_from = '".$row['u5']."' or earn_from = '".$row['u6']."' or earn_from = '".$row['u7']."' or earn_from = '".$row['u8']."' or earn_from = '".$row['u9']."' or earn_from = '".$row['u10']."') and  usertb_id = '".$userids."' and earn_type = 'earn' and earn_datetime like '".date("Y-m-d",mktime(0,0,0,date("m"),date("d")-1,date("Y")))."%' and stream = '10_3'";
									$lvl1_row = $form->getRow($sql);
									$lvl1_amt = 0;
									if(sizeof($lvl1_row)>0)
									{
										$lvl1_amt = $lvl1_row['earn_val'];
									}
									$sql = "select * from nodetree_10_3 where ( usertb_id = '".$row['u1']."' or usertb_id = '".$row['u2']."' or usertb_id = '".$row['u3']."' or usertb_id = '".$row['u4']."' or usertb_id = '".$row['u5']."' or usertb_id = '".$row['u6']."' or usertb_id = '".$row['u7']."' or usertb_id = '".$row['u8']."' or usertb_id = '".$row['u9']."' or usertb_id = '".$row['u10']."')";
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
												if($lvl2_row[$k]['u6'] != 0)
												{
													$a_user2[$i++] = $lvl2_row[$k]['u6'];
													$lvl2_mem++;
												}
												if($lvl2_row[$k]['u7'] != 0)
												{
													$a_user2[$i++] = $lvl2_row[$k]['u7'];
													$lvl2_mem++;
												}
												if($lvl2_row[$k]['u8'] != 0)
												{
													$a_user2[$i++] = $lvl2_row[$k]['u8'];
													$lvl2_mem++;
												}
												if($lvl2_row[$k]['u9'] != 0)
												{
													$a_user2[$i++] = $lvl2_row[$k]['u9'];
													$lvl2_mem++;
												}
												if($lvl2_row[$k]['u10'] != 0)
												{
													$a_user2[$i++] = $lvl2_row[$k]['u10'];
													$lvl2_mem++;
												}
												
							
										$members[$j++] =  $lvl2_row[$k]['u1'];
										$members[$j++] =  $lvl2_row[$k]['u2'];
										$members[$j++] =  $lvl2_row[$k]['u3'];
										$members[$j++] =  $lvl2_row[$k]['u4'];
										$members[$j++] =  $lvl2_row[$k]['u5'];
										$members[$j++] =  $lvl2_row[$k]['u6'];
										$members[$j++] =  $lvl2_row[$k]['u7'];
										$members[$j++] =  $lvl2_row[$k]['u8'];
										$members[$j++] =  $lvl2_row[$k]['u9'];
										$members[$j++] =  $lvl2_row[$k]['u10'];
									}
									if(!empty($members))
									{
										$sql = "select sum(earn_val) as earn_val from m_earn_history where earn_from in(".implode(",",$members).") and  usertb_id = '".$userids."' and earn_type = 'earn' and earn_datetime like '".date("Y-m-d",mktime(0,0,0,date("m"),date("d")-1,date("Y")))."%' and stream = '10_3'";
										$lvl2_row = $form->getRow($sql);
										$lvl2_amt = 0;
										if(sizeof($lvl2_row)>0)
										{
											$lvl2_amt = $lvl2_row['earn_val'];
										}
								
										$sql = "select * from nodetree_10_3 where usertb_id in (".implode(",",$members).")";
										$lvl3_row = $form->getArray($sql);
										$j = 0;
										$members2 = array();
										$i = 0;
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
											if($lvl3_row[$k]['u6'] != 0)
											{
												$a_user3[$i++] = $lvl3_row[$k]['u6'];
												$lvl3_mem++;
											}
											if($lvl3_row[$k]['u7'] != 0)
											{
												$a_user3[$i++] = $lvl3_row[$k]['u7'];
												$lvl3_mem++;
											}
											if($lvl3_row[$k]['u8'] != 0)
											{
												$a_user3[$i++] = $lvl3_row[$k]['u8'];
												$lvl3_mem++;
											}
											if($lvl3_row[$k]['u9'] != 0)
											{
												$a_user3[$i++] = $lvl3_row[$k]['u9'];
												$lvl3_mem++;
											}
											if($lvl3_row[$k]['u10'] != 0)
											{
												$a_user3[$i++] = $lvl3_row[$k]['u10'];
												$lvl3_mem++;
											}
											
											
											$members2[$j++] =  $lvl3_row[$k]['u1'];
											$members2[$j++] =  $lvl3_row[$k]['u2'];
											$members2[$j++] =  $lvl3_row[$k]['u3'];
											$members2[$j++] =  $lvl3_row[$k]['u4'];
											$members2[$j++] =  $lvl3_row[$k]['u5'];
											$members2[$j++] =  $lvl3_row[$k]['u6'];
											$members2[$j++] =  $lvl3_row[$k]['u7'];
											$members2[$j++] =  $lvl3_row[$k]['u8'];
											$members2[$j++] =  $lvl3_row[$k]['u9'];
											$members2[$j++] =  $lvl3_row[$k]['u10'];
										}
										if(!empty($members2))
										{
											$sql = "select sum(earn_val) as earn_val from m_earn_history where earn_from in(".implode(",",$members2).") and  usertb_id = '".$userids."' and earn_type = 'earn' and earn_datetime like '".date("Y-m-d",mktime(0,0,0,date("m"),date("d")-1,date("Y")))."%' and stream = '10_3'";
											$lvl3_row = $form->getRow($sql);
											$lvl3_amt = 0;
											if(sizeof($lvl3_row)>0)
											{
												$lvl3_amt = $lvl3_row['earn_val'];
											}
										}
									}
								}
								$sql = "SELECT sum(`earn_val`) as e_val, level,count(*) as pay_mem FROM `m_earn_history` WHERE `earn_datetime` like '".date("Y-m-d",mktime(0,0,0,date("m"),date("d")-1,date("Y")))."%' and usertb_id = '".$userids."'  and stream = '10_3' group by level order by level asc";
								$e_row = $form->getArray($sql);
								$eval[1] = 0;
								$eval[2] = 0;
								$eval[3] = 0;
								$pay_yesterday = array();
								for($k=0;$k<sizeof($e_row);$k++)
								{
									$eval[$e_row[$k]['level']] = $e_row[$k]['e_val'];
									$pay_yesterday[$e_row[$k]['level']] = $e_row[$k]['pay_mem'];
								}
							
								$tot_act_user1 = 0;
								if(!empty($a_user1))
								{
									$str12 = implode(",",$a_user1);
									
									$sql = "select count(*) as tot_a_user from m_payment_fee_10_3 where usertb_id in (".$str12.") and activedeactive = 'active' and payment_done='Yes'";
									$rec_act_user = $form->getRow($sql);
									$tot_act_user1 = $rec_act_user['tot_a_user'];
								}
							
								$tot_act_user2 = 0;
								if(!empty($a_user2))
								{
									$str12 = implode(",",$a_user2);
									$sql = "select count(*) as tot_a_user from m_payment_fee_10_3 where usertb_id in (".$str12.") and activedeactive = 'active' and payment_done='Yes'";
									$rec_act_user = $form->getRow($sql);
									$tot_act_user2 = $rec_act_user['tot_a_user'];
								}
								
								$tot_act_user3 = 0;
								if(!empty($a_user3))
								{
									$str12 = implode(",",$a_user3);
									$sql = "select count(*) as tot_a_user from m_payment_fee_10_3 where usertb_id in (".$str12.") and activedeactive = 'active' and payment_done='Yes'";
									$rec_act_user = $form->getRow($sql);
									$tot_act_user3 = $rec_act_user['tot_a_user'];
								}
								$pay_yesterday[1] = isset($pay_yesterday[1])?$pay_yesterday[1]:0;
								$pay_yesterday[2] = isset($pay_yesterday[2])?$pay_yesterday[2]:0;
								$pay_yesterday[3] = isset($pay_yesterday[3])?$pay_yesterday[3]:0;
								?>
								<div class="clearboth"></div>
								<div style="height:10px;"></div>
								<div style="height:20px;">Below Summary for Stream 10x3</div>
								<div class="clearboth"></div>
								<div>
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
					</div>