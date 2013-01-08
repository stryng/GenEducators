<?
	include_once 'business_logic/config/configure.php';
	require_once("business_logic/class/form.class.php");
	//$db = new DBConnection;
	$form = new Form();
	// Passkey that got from link
	$passkey=$_GET['passkey'];
	function check($arr,$form,$table,$check_field)
	{
		foreach($arr as $key=>$val)
		{
			$sql = "SELECT * FROM ".$table." WHERE usertb_id = '".$val."'";
			$row = $form->getRow($sql);
			if(is_array($row) && sizeof($row)>0)
			{
				if($row[$check_field] == 0)
				{
					return $val;
				}
			}
			else
			{
				return $val;
			}
		}
	}

	
	
		//$tbl_name1="temp_members_db";
	
		// Retrieve data from table where row that match this passkey
		
		
		function userdetails($form,$users_id,$passkey)
		{
				global $msg;
				$sql1="SELECT * FROM userdetail WHERE usercode ='".$passkey."' and UserId = '".$users_id."'";
				$row = $form->getRow($sql1);
				// If successfully queried
				if(is_array($row) && sizeof($row)>0)
				{
						if(isset($row['Placement']) && $row['Placement'] == "")
						{
							move_3_3($users_id,$passkey,$form);
							move_5_3($users_id,$passkey,$form);
							move_10_3($users_id,$passkey,$form);
						}
						$sql2="UPDATE userdetail SET active = 1 where UserId = '".$users_id."'";
						$row = $form->inser_qry($sql2);
						$sql = "update userdetail set entry = 'prepaid' , entry_5_3 = 'prepaid' , entry_10_3 = 'prepaid',active = '1' where UserId = '".$users_id."'";
						$row = $form->inser_qry($sql);
								
						$sql = "insert into m_payment_fee(usertb_id, payment_val, payment_datetime, activedeactive, payment_done) values('".$users_id."','33','".date("Y-m-d H:i:s")."','active','YES')";
						$row = $form->inser_qry($sql);
						
						$sql = "insert into m_payment_fee_5_3(usertb_id, payment_val, payment_datetime, activedeactive, payment_done) values('".$users_id."','33','".date("Y-m-d H:i:s")."','active','YES')";
						$row = $form->inser_qry($sql);
						
						$sql = "insert into m_payment_fee_10_3(usertb_id, payment_val, payment_datetime, activedeactive, payment_done) values('".$users_id."','33','".date("Y-m-d H:i:s")."','active','YES')";
						$row = $form->inser_qry($sql);
						//$msg = "Your account has been activated successfuly, Please try login now."
						if($msg == "")
						{
							return $msg = "Your Registration is done successfully";
						}
				}
				else
				{
					return $msg = "Please contact administrator";
				}
		}
		function move_3_3($userids,$passkey,$form)
		{
							global $msg;
							$sql1="SELECT * FROM userdetail WHERE usercode ='".$passkey."' and UserId = '".$userids."'";
							$result1 = $form->getRow($sql1);
		
							$qry = "select * from nodetree where u1 = '".$userids."' or u2 = '".$userids."' or u3 = '".$userids."'";
							$rws = $form->getRow($qry);
							if(is_array($rws)  && sizeof($rws)>0)
							{
		
								$msg = "User already registered, Please contact admin.";
							}
							else
							{
									/*$qry = "select * from nodetree where usertb_id = '".$result1['inviter']."'"; 
									$rws_result = $form->getRow($qry);
									*/
									$i=0;
									$k = 0;
									$member = array();
									$nodeval = 0;
									$flg_one = false;
									$flg_two = false;
									$flg_three = false;
									/*if(is_array($rws_result))
									{
										$row = $db_out->next();
										if($rws_result['u1'] != 0 && $rws_result['u2'] != 0 && $rws_result['u3'] != 0)
										{*/
											$str =  $result1['inviter'];
											while(1)
											{
													$i = 0;
													$qry = "select * from nodetree where usertb_id in (".$str.") order by usertb_id";
													$rws_result = $form->getArray($qry);
													//print_r($rws_result);
													$arr_users = array();
													if(is_array($rws_result) && sizeof($rws_result)>0)
													{
														$arr_temp_user = array();
														if($str == $result1['inviter'])
														{
																$arr_temp_user[] = $result1['inviter'];
																$flg1 = check($arr_temp_user,$form,'nodetree','u1');
																//$flg1 = check1($arr_temp_user);
																
																if($flg1 !=0)
																{
																	$flg_one = true;
																	$nodeval = $flg1;
																	break;
																}
																
																$flg2 = check($arr_temp_user,$form,'nodetree','u2');
																//$flg2 = check2($arr_temp_user);
																if($flg2 !=0)
																{
																	$flg_two = true;
																	$nodeval = $flg2;
																	break;
																}
																$flg3 = check($arr_temp_user,$form,'nodetree','u3');
																//$flg3 = check3($arr_temp_user);
																if($flg3 !=0)
																{
																	$flg_three = true;
																	$nodeval = $flg3;
																	break;
																}
														}
														$arr_temp_user = array();
														for($j=0;$j<count($rws_result);$j++)
														{
															$arr_users[$i++] = $rws_result[$j]['u1'];
															$arr_users[$i++] = $rws_result[$j]['u2'];
															$arr_users[$i++] = $rws_result[$j]['u3'];
															
															$arr_temp_user[] = $rws_result[$j]['u1'];
															$arr_temp_user[] = $rws_result[$j]['u2'];
															$arr_temp_user[] = $rws_result[$j]['u3'];
														}
														//print_r($arr_temp_user);
														$flg1 = check($arr_temp_user,$form,'nodetree','u1');
														//$flg1 = check1($arr_temp_user);
														
														if($flg1 !=0)
														{
															$flg_one = true;
															$nodeval = $flg1;
															break;
														}
														
														$flg2 = check($arr_temp_user,$form,'nodetree','u2');
														//$flg2 = check2($arr_temp_user);
														if($flg2 !=0)
														{
															$flg_two = true;
															$nodeval = $flg2;
															break;
														}
														$flg3 = check($arr_temp_user,$form,'nodetree','u3');
														//$flg3 = check3($arr_temp_user);
														if($flg3 !=0)
														{
															$flg_three = true;
															$nodeval = $flg3;
															break;
														}
														$str = implode(",",$arr_temp_user);
													}
													else
													{
														$blankmember = $result1['inviter'];
														break;
													}
												
											}
										/*}
										else
										{
											$blankmember = $result1['inviter'];
										}
									}
									else
									{
										$blankmember = $result1['inviter'];
									}*/
									$field_name = "u1";
									if($flg_one == true || $flg_two == true || $flg_three == true)
									{
										$blankmember = $nodeval;
										$field_name = (($flg_one == true)?"u1":((($flg_two == true)?"u2":(($flg_three == true)?"u3":"u1"))));
									}
									$qry = "select * from nodetree where usertb_id = '".$blankmember."'";
									$rws_result = $form->getArray($qry);
									if(is_array($rws_result) && sizeof($rws_result)==0)
									{
										$qry = "insert into nodetree (usertb_id,u1,u2,u3) values('".$blankmember."','".$result1['UserId']."','0','0')";
										$form->inser_qry($qry);
									}
									else
									{
										$qry = "update nodetree set ".$field_name." = '".$result1['UserId']."' where usertb_id= '".$blankmember."'";
										$form->inser_qry($qry);
										/*if($row = $db_out->next())
										{
											if($row['u1'] == 0)
											{
												$qry = "update nodetree set u1 = '".$result1['UserId']."',u2 = '".$row['u2']."',u3 = '".$row['u3']."' where usertb_id= '".$blankmember."'";
												$db->execUpdateQuery($qry);
											}
											else if($row['u2'] == 0)
											{
												$qry = "update nodetree set u1 = '".$row['u1']."',u2 = '".$result1['UserId']."',u3 = '".$row['u3']."' where usertb_id= '".$blankmember."'";
												$db->execUpdateQuery($qry);
											}
											else if($row['u3'] == 0)
											{
												$qry = "update nodetree set u1 = '".$row['u1']."',u2 = '".$row['u2']."',u3 = '".$result1['UserId']."' where usertb_id= '".$blankmember."'";
												$db->execUpdateQuery($qry);
											}
										}*/
									}
							}
							
		}

		function move_5_3($userids,$passkey,$form)
		{
							global $msg;
							$sql1="SELECT * FROM userdetail WHERE usercode ='".$passkey."' and UserId = '".$userids."'";
							$result1 = $form->getRow($sql1);
		
							$qry = "select * from nodetree_5_3 where u1 = '".$userids."' or u2 = '".$userids."' or u3 = '".$userids."' or u4 = '".$userids."' or u5 = '".$userids."'";
							$rws = $form->getRow($qry);
							
							if(is_array($rws) && sizeof($rws)>0)
							{
								$msg = "User already registered, Please contact admin.";
							}
							else
							{
									$i=0;
									$k = 0;
									$member = array();
									$nodeval = 0;
									$flg_one = false;
									$flg_two = false;
									$flg_three = false;
									$flg_four = false;
									$flg_five = false;
											$str =  $result1['inviter'];
											while(1)
											{
													$i = 0;
													$qry = "select * from nodetree_5_3 where usertb_id in (".$str.") order by usertb_id";
													$rws_result = $form->getArray($qry);
													$arr_users = array();
													if(is_array($rws_result) && sizeof($rws_result)>0)
													{
														$arr_temp_user = array();
														if($str == $result1['inviter'])
														{
																$arr_temp_user[] = $result1['inviter'];
																$flg1 = check($arr_temp_user,$form,'nodetree_5_3','u1');
																//$flg1 = check1($arr_temp_user);
																
																if($flg1 !=0)
																{
																	$flg_one = true;
																	$nodeval = $flg1;
																	break;
																}
																
																$flg2 = check($arr_temp_user,$form,'nodetree_5_3','u2');
																//$flg2 = check2($arr_temp_user);
																if($flg2 !=0)
																{
																	$flg_two = true;
																	$nodeval = $flg2;
																	break;
																}
																$flg3 = check($arr_temp_user,$form,'nodetree_5_3','u3');
																//$flg3 = check3($arr_temp_user);
																if($flg3 !=0)
																{
																	$flg_three = true;
																	$nodeval = $flg3;
																	break;
																}
																$flg4 = check($arr_temp_user,$form,'nodetree_5_3','u4');
																if($flg4 !=0)
																{
																	$flg_four = true;
																	$nodeval = $flg4;
																	break;
																}
																$flg5 = check($arr_temp_user,$form,'nodetree_5_3','u5');
																if($flg5 !=0)
																{
																	$flg_five = true;
																	$nodeval = $flg5;
																	break;
																}
														}
														$arr_temp_user = array();
														for($j=0;$j<count($rws_result);$j++)
														{
															$arr_users[$i++] = $rws_result[$j]['u1'];
															$arr_users[$i++] = $rws_result[$j]['u2'];
															$arr_users[$i++] = $rws_result[$j]['u3'];
															$arr_users[$i++] = $rws_result[$j]['u4'];
															$arr_users[$i++] = $rws_result[$j]['u5'];
															
															$arr_temp_user[] = $rws_result[$j]['u1'];
															$arr_temp_user[] = $rws_result[$j]['u2'];
															$arr_temp_user[] = $rws_result[$j]['u3'];
															$arr_temp_user[] = $rws_result[$j]['u4'];
															$arr_temp_user[] = $rws_result[$j]['u5'];
														}
														//print_r($arr_users);
														$flg1 = check($arr_temp_user,$form,'nodetree_5_3','u1');
														
														if($flg1 !=0)
														{
															$flg_one = true;
															$nodeval = $flg1;
															break;
														}
														
														$flg2 = check($arr_temp_user,$form,'nodetree_5_3','u2');
														if($flg2 !=0)
														{
															$flg_two = true;
															$nodeval = $flg2;
															break;
														}
														$flg3 = check($arr_temp_user,$form,'nodetree_5_3','u3');
														if($flg3 !=0)
														{
															$flg_three = true;
															$nodeval = $flg3;
															break;
														}
														$flg4 = check($arr_temp_user,$form,'nodetree_5_3','u4');
														if($flg4 !=0)
														{
															$flg_four = true;
															$nodeval = $flg4;
															break;
														}
														$flg5 = check($arr_temp_user,$form,'nodetree_5_3','u5');
														if($flg5 !=0)
														{
															$flg_five = true;
															$nodeval = $flg5;
															break;
														}
														$str = implode(",",$arr_temp_user);
													}
													else
													{
														$blankmember = $result1['inviter'];
														break;
													}
												
											}
									$field_name = "u1";
									if($flg_one == true || $flg_two == true || $flg_three == true || $flg_four == true || $flg_five == true)
									{
										$blankmember = $nodeval;
										$field_name = (($flg_one == true)?"u1":(($flg_two == true)?"u2":(($flg_three == true)?"u3":((($flg_four == true)?"u4":((($flg_five == true)?"u5":"u1")))))));
									}
									$qry = "select * from nodetree_5_3 where usertb_id = '".$blankmember."'";
									$rws_result = $form->getArray($qry);
									
									if(is_array($rws_result) && sizeof($rws_result) ==0)
									{
										$qry = "insert into nodetree_5_3 (usertb_id,u1,u2,u3,u4,u5) values('".$blankmember."','".$result1['UserId']."','0','0','0','0')";
										$form->inser_qry($qry);
									}
									else
									{
										$qry = "update nodetree_5_3 set ".$field_name." = '".$result1['UserId']."' where usertb_id= '".$blankmember."'";
										$form->inser_qry($qry);
									}
							}
							
		}

		function move_10_3($userids,$passkey,$form)
		{
							global $msg;
							$sql1="SELECT * FROM userdetail WHERE usercode ='".$passkey."' and UserId = '".$userids."'";
							$result1 = $form->getRow($sql1);
		
							$qry = "select * from nodetree_10_3 where u1 = '".$userids."' or u2 = '".$userids."' or u3 = '".$userids."' or u4 = '".$userids."' or u5 = '".$userids."' or u6 = '".$userids."' or u7 = '".$userids."' or u8 = '".$userids."' or u9 = '".$userids."' or u10 = '".$userids."'";
							$rws = $form->getRow($qry);
							if(is_array($rws) && sizeof($rws)>0)
							{
								$msg = "User already registered, Please contact admin.";
							}
							else
							{
									$i=0;
									$k = 0;
									$member = array();
									$nodeval = 0;
									$flg_one = false;
									$flg_two = false;
									$flg_three = false;
									$flg_four = false;
									$flg_five = false;
									$flg_six = false;
									$flg_seven = false;
									$flg_eight = false;
									$flg_nine = false;
									$flg_ten = false;
											$str =  $result1['inviter'];
											while(1)
											{
													$i = 0;
													$qry = "select * from nodetree_10_3 where usertb_id in (".$str.") order by usertb_id";
													$rws_result = $form->getArray($qry);
													$arr_users = array();
													if(is_array($rws_result) && sizeof($rws_result)>0)
													{
														$arr_temp_user = array();
														if($str == $result1['inviter'])
														{
																$arr_temp_user[] = $result1['inviter'];
																$flg1 = check($arr_temp_user,$form,'nodetree_10_3','u1');
																//$flg1 = check1($arr_temp_user);
																
																if($flg1 !=0)
																{
																	$flg_one = true;
																	$nodeval = $flg1;
																	break;
																}
																
																$flg2 = check($arr_temp_user,$form,'nodetree_10_3','u2');
																//$flg2 = check2($arr_temp_user);
																if($flg2 !=0)
																{
																	$flg_two = true;
																	$nodeval = $flg2;
																	break;
																}
																$flg3 = check($arr_temp_user,$form,'nodetree_10_3','u3');
																//$flg3 = check3($arr_temp_user);
																if($flg3 !=0)
																{
																	$flg_three = true;
																	$nodeval = $flg3;
																	break;
																}
																$flg4 = check($arr_temp_user,$form,'nodetree_10_3','u4');
																if($flg4 !=0)
																{
																	$flg_four = true;
																	$nodeval = $flg4;
																	break;
																}
																$flg5 = check($arr_temp_user,$form,'nodetree_10_3','u5');
																if($flg5 !=0)
																{
																	$flg_five = true;
																	$nodeval = $flg5;
																	break;
																}
																$flg6 = check($arr_temp_user,$form,'nodetree_10_3','u6');
																
																if($flg6 !=0)
																{
																	$flg_six = true;
																	$nodeval = $flg6;
																	break;
																}
																
																$flg7 = check($arr_temp_user,$form,'nodetree_10_3','u7');
																if($flg7 !=0)
																{
																	$flg_seven = true;
																	$nodeval = $flg7;
																	break;
																}
																$flg8 = check($arr_temp_user,$form,'nodetree_10_3','u8');
																if($flg8 !=0)
																{
																	$flg_eight= true;
																	$nodeval = $flg8;
																	break;
																}
																$flg9 = check($arr_temp_user,$form,'nodetree_10_3','u9');
																if($flg9 !=0)
																{
																	$flg_nine = true;
																	$nodeval = $flg9;
																	break;
																}
																$flg10 = check($arr_temp_user,$form,'nodetree_10_3','u10');
																if($flg10 !=0)
																{
																	$flg_ten = true;
																	$nodeval = $flg10;
																	break;
																}
														}
														$arr_temp_user = array();
														for($j=0;$j<count($rws_result);$j++)
														{
															$arr_users[$i++] = $rws_result[$j]['u1'];
															$arr_users[$i++] = $rws_result[$j]['u2'];
															$arr_users[$i++] = $rws_result[$j]['u3'];
															$arr_users[$i++] = $rws_result[$j]['u4'];
															$arr_users[$i++] = $rws_result[$j]['u5'];
															$arr_users[$i++] = $rws_result[$j]['u6'];
															$arr_users[$i++] = $rws_result[$j]['u7'];
															$arr_users[$i++] = $rws_result[$j]['u8'];
															$arr_users[$i++] = $rws_result[$j]['u9'];
															$arr_users[$i++] = $rws_result[$j]['u10'];
															
															$arr_temp_user[] = $rws_result[$j]['u1'];
															$arr_temp_user[] = $rws_result[$j]['u2'];
															$arr_temp_user[] = $rws_result[$j]['u3'];
															$arr_temp_user[] = $rws_result[$j]['u4'];
															$arr_temp_user[] = $rws_result[$j]['u5'];
															$arr_temp_user[] = $rws_result[$j]['u6'];
															$arr_temp_user[] = $rws_result[$j]['u7'];
															$arr_temp_user[] = $rws_result[$j]['u8'];
															$arr_temp_user[] = $rws_result[$j]['u9'];
															$arr_temp_user[] = $rws_result[$j]['u10'];
														}
														//print_r($arr_users);
														$flg1 = check($arr_temp_user,$form,'nodetree_10_3','u1');
														
														if($flg1 !=0)
														{
															$flg_one = true;
															$nodeval = $flg1;
															break;
														}
														
														$flg2 = check($arr_temp_user,$form,'nodetree_10_3','u2');
														if($flg2 !=0)
														{
															$flg_two = true;
															$nodeval = $flg2;
															break;
														}
														$flg3 = check($arr_temp_user,$form,'nodetree_10_3','u3');
														if($flg3 !=0)
														{
															$flg_three = true;
															$nodeval = $flg3;
															break;
														}
														$flg4 = check($arr_temp_user,$form,'nodetree_10_3','u4');
														if($flg4 !=0)
														{
															$flg_four = true;
															$nodeval = $flg4;
															break;
														}
														$flg5 = check($arr_temp_user,$form,'nodetree_10_3','u5');
														if($flg5 !=0)
														{
															$flg_five = true;
															$nodeval = $flg5;
															break;
														}
														$flg6 = check($arr_temp_user,$form,'nodetree_10_3','u6');
														
														if($flg6 !=0)
														{
															$flg_six = true;
															$nodeval = $flg6;
															break;
														}
														
														$flg7 = check($arr_temp_user,$form,'nodetree_10_3','u7');
														if($flg7 !=0)
														{
															$flg_seven = true;
															$nodeval = $flg7;
															break;
														}
														$flg8 = check($arr_temp_user,$form,'nodetree_10_3','u8');
														if($flg8 !=0)
														{
															$flg_eight= true;
															$nodeval = $flg8;
															break;
														}
														$flg9 = check($arr_temp_user,$form,'nodetree_10_3','u9');
														if($flg9 !=0)
														{
															$flg_nine = true;
															$nodeval = $flg9;
															break;
														}
														$flg10 = check($arr_temp_user,$form,'nodetree_10_3','u10');
														if($flg10 !=0)
														{
															$flg_ten = true;
															$nodeval = $flg10;
															break;
														}
														$str = implode(",",$arr_temp_user);
													}
													else
													{
														$blankmember = $result1['inviter'];
														break;
													}
												
											}
									$field_name = "u1";
									if($flg_one == true || $flg_two == true || $flg_three == true || $flg_four == true || $flg_five == true || $flg_six == true || $flg_seven == true || $flg_eight == true || $flg_nine == true || $flg_ten == true)
									{
										$blankmember = $nodeval;
										$field_name = (($flg_one == true)?"u1":(($flg_two == true)?"u2":(($flg_three == true)?"u3":((($flg_four == true)?"u4":((($flg_five == true)?"u5":"u1")))))));
										if($field_name == "u1")
										{
											$field_name = (($flg_six == true)?"u6":(($flg_seven == true)?"u7":(($flg_eight == true)?"u8":((($flg_nine == true)?"u9":((($flg_ten == true)?"u10":"u1")))))));
										}
									}
									$qry = "select * from nodetree_10_3 where usertb_id = '".$blankmember."'";
									$rws_result = $form->getArray($qry);
									if(is_array($rws_result) && sizeof($rws_result) == 0)
									{
										$qry = "insert into nodetree_10_3 (usertb_id,u1,u2,u3,u4,u5,u6,u7,u8,u9,u10) values('".$blankmember."','".$result1['UserId']."','0','0','0','0','0','0','0','0','0')";
										$form->inser_qry($qry);
									}
									else
									{
										$qry = "update nodetree_10_3 set ".$field_name." = '".$result1['UserId']."' where usertb_id= '".$blankmember."'";
										$form->inser_qry($qry);
									}
							}
							
		}
?>