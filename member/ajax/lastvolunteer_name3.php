<?
	require_once('../../business_logic/config/configure.php');
	require_once("../../business_logic/class/form.class.php");
	//echo $_REQUEST['action']; die;
	$form = new Form();

$user10_img = "none";
$user11_img = "none";
$user12_img = "none";

$user10_id = "0";
$user11_id = "0";
$user12_id = "0";

$user10_name = "";
$user11_name = "";
$user12_name = "";

	if(isset($_GET['vnumber']) && $_GET['vnumber'] != 0)
	{
				$qry = "select * from nodetree where usertb_id = '".$_GET['vnumber']."'";
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
?>
                                            <div class="clear"></div>
                                            	<ul class="right top_move" id="hide3">
                                                	<li class="float_left_in_mar">
													<?
													if($user10_name != '')
													{
														?>
														<div class="fleft"> 
															<a id="volunteers3_expand<?=$_GET['cnt']?>1" class="acolor" onclick="javascript:addmore_volunteers_name3(<?=$user10_id?>,'<?=$_GET['cnt']?>1','volunteers2_expand<?=$_GET['cnt']?>1','<?=($_GET['cntlvl']+1)?>');"><?=($user10_name!='')?'+&nbsp;&nbsp;':'+&nbsp;&nbsp;' ?></a> <?=$user10_name?>
														</div>
														<?
													}
													else
													{
														?>
                                                    	<div class="fleft">-&nbsp;&nbsp;(empty)</div>
														<?
													}
													?>
                                                    
                                                    <div class="clear"></div>
                                                    </li><br />
													<input type="hidden" name="volnumbers3<?=$_GET['cnt']?>3" id="volnumbers3<?=$_GET['cnt']?>3" value="<?=$_GET['cnt']?>3" />
													<div class="clearboth" id="next_volunteers_name3[<?=$_GET['cnt']?>1]" style="margin-left:15px;"></div>
                                                    <li class="float_left_in_mar">
													<?
														if($user11_name != '')
														{
															?>
															<div><a id="volunteers3_expand<?=$_GET['cnt']?>2" class="acolor" onclick="javascript:addmore_volunteers_name3(<?=$user11_id?>,'<?=$_GET['cnt']?>2','volunteers2_expand<?=$_GET['cnt']?>2','<?=($_GET['cntlvl']+1)?>');"><?=($user11_name!='')?'+&nbsp;&nbsp;':'+&nbsp;&nbsp' ?></a><?=$user11_name?></div>
															<?
														}
														else
														{
															?>
															<div>-&nbsp;&nbsp;(empty)</div>
															<?
														}
													?>
                                                    
                                                    <div class="clear"></div>
                                                    </li><br />
													<input type="hidden" name="volnumbers3<?=$_GET['cnt']?>3" id="volnumbers3<?=$_GET['cnt']?>3" value="<?=$_GET['cnt']?>3" />
													<div class="clearboth" id="next_volunteers_name3[<?=$_GET['cnt']?>2]" style="margin-left:15px;"></div>
                                                    <li class="float_left_in_mar">
													<?
														if($user12_name != '')
														{
															?>
															<div class="fleft"><a id="volunteers3_expand<?=$_GET['cnt']?>3" class="acolor" onclick="javascript:addmore_volunteers_name3(<?=$user12_id?>,'<?=$_GET['cnt']?>3','volunteers2_expand<?=$_GET['cnt']?>3','<?=($_GET['cntlvl']+1)?>');"><?=($user12_name!='')?'+&nbsp;&nbsp;':'+&nbsp;&nbsp;' ?></a><?=$user12_name?></div>
															<?
														}
														else
														{
															?>
															<div class="fleft">-&nbsp;&nbsp;(empty)</div>
															<?
														}
													?>
                                                    
                                                    <div class="clear"></div>
                                                    </li><br />
													<input type="hidden" name="volnumbers3<?=$_GET['cnt']?>3" id="volnumbers3<?=$_GET['cnt']?>3" value="<?=$_GET['cnt']?>3" />
													<div class="clearboth" id="next_volunteers_name3[<?=$_GET['cnt']?>3]" style="margin-left:15px;"></div>
                                                </ul>
												<div class="clearboth" id="next_volunteers3[<?=$_GET['cnt']?>]" style="margin-left:15px;"></div>
