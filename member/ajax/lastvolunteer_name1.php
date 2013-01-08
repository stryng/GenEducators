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


	if(isset($_GET['vnumber']) && $_GET['vnumber'] != 0)
	{
				$qry = "select * from nodetree where usertb_id = '".$_GET['vnumber']."'";
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
?>
                                                <div class="float_clear"></div>
                                            	
                                            	<ul class="left top_move" id="hid<?=$_GET['cnt']?>">
                                                	<li class="float_left_in_mar">
       												<?
													if($user4_name != '')
													{
														?>
														<div class="fleft"><a id="volunteers_expand<?=$_GET['cnt']?>1" class="acolor" onclick="javascript:addmore_volunteers_name1(<?=$user4_id?>,'<?=$_GET['cnt']?>1','volunteers_expand<?=$_GET['cnt']?>1','<?=($_GET['cntlvl']+1)?>');" ><?=($user4_name!='')?'+&nbsp;&nbsp;':'+&nbsp;&nbsp;' ?></a><?=$user4_name?></div>
														<?
													}
													else
													{
														?>
	                                                    <div class="fleft">-&nbsp;&nbsp;(empty)</div>
														<?
													}
													?>
                                                    
                                                     <div class="float_clear"></div>
                                                    </li><br />
													<input type="hidden" name="volnumbers<?=$_GET['cnt']?>1" id="volnumbers<?=$_GET['cnt']?>1" value="<?=$_GET['cnt']?>1" />
													<div class="clearboth" id="next_volunteers_name[<?=$_GET['cnt']?>1]" style="margin-left:15px;"></div>
                                                    <li class="float_left_in_mar">
     												<?
													if($user5_name != '')
													{
														?>
														<div><a id="volunteers_expand<?=$_GET['cnt']?>2" class="acolor" onclick="javascript:addmore_volunteers_name1(<?=$user5_id?>,'<?=$_GET['cnt']?>2','volunteers_expand<?=$_GET['cnt']?>2','<?=($_GET['cntlvl']+1)?>');"><?=($user5_name!='')?'+&nbsp;&nbsp;':'+&nbsp;&nbsp;' ?></a><?=$user5_name?></div>
														<!--<div><a id="volunteers2<?=$_GET['cnt']?>" class="acolor" onclick="javascript:alert('You can not see more than level 3');"><?=($user5_name!='')?'+&nbsp;&nbsp;':'+&nbsp;&nbsp;' ?></a><?=$user5_name?></div>-->
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
                                                    </li><br />
													<input type="hidden" name="volnumbers<?=$_GET['cnt']?>2" id="volnumbers<?=$_GET['cnt']?>2" value="<?=$_GET['cnt']?>2" />
													<div class="clearboth" id="next_volunteers_name[<?=$_GET['cnt']?>2]" style="margin-left:15px;"></div>
                                                    <li class="float_left_in_mar">
     												<?
													if($user6_name != '')
													{
														?>
														<div class="fleft"><a id="volunteers_expand<?=$_GET['cnt']?>3" class="acolor" onclick="javascript:addmore_volunteers_name1(<?=$user6_id?>,'<?=$_GET['cnt']?>3','volunteers_expand<?=$_GET['cnt']?>3','<?=($_GET['cntlvl']+1)?>');"><?=($user6_name!='')?'+&nbsp;&nbsp;':'+&nbsp;&nbsp;' ?></a><?=$user6_name?></div>
														<?
													}
													else
													{
														?>
	                                                    <div class="fleft">-&nbsp;&nbsp;(empty)</div>
														<?
													}
													?>
                                                    <div class="float_clear"></div>
                                                    </li><br />
													<input type="hidden" name="volnumbers<?=$_GET['cnt']?>3" id="volnumbers<?=$_GET['cnt']?>3" value="<?=$_GET['cnt']?>3" />
													<div class="clearboth" id="next_volunteers_name[<?=$_GET['cnt']?>3]" style="margin-left:15px;"></div>
                                                </ul>
												
