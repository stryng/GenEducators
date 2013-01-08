<?
	require_once('../../business_logic/config/configure.php');
	require_once("../../business_logic/class/form.class.php");
	//echo $_REQUEST['action']; die;
	$form = new Form();

$user7_img = "none";
$user8_img = "none";
$user9_img = "none";

$user7_id = "0";
$user8_id = "0";
$user9_id = "0";

$user7_name = "";
$user8_name = "";
$user9_name = "";

	if(isset($_GET['vnumber']) && $_GET['vnumber'] != 0)
	{
				$qry = "select * from nodetree where usertb_id = '".$_GET['vnumber']."'";
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
						$user8_name = $row11['UserId'];
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
?>
                                                <div class="clear"></div>
                                            	
                                                <ul class="top_move" id="hide2">
                                                	<li class="float_left_in_mar">
     												<?
													if($user7_name != '')
													{
														?>
														<div class="fleft"><a id="volunteers2_expand<?=$_GET['cnt']?>1" class="acolor" onclick="javascript:addmore_volunteers_name2(<?=$user7_id?>,'<?=$_GET['cnt']?>1','volunteers2_expand<?=$_GET['cnt']?>1','<?=($_GET['cntlvl']+1)?>');"><?=($user7_name!='')?'+&nbsp;&nbsp;':'+&nbsp;&nbsp;' ?></a><?=$user7_name?></div>
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
                                                    <input type="hidden" name="volnumbers2<?=$_GET['cnt']?>1" id="volnumbers2<?=$_GET['cnt']?>1" value="<?=$_GET['cnt']?>1" />
													<div class="clearboth" id="next_volunteers_name2[<?=$_GET['cnt']?>1]" style="margin-left:15px;"></div>
													<li class="float_left_in_mar">
     												<?
													if($user8_name != '')
													{
														?>
														<div><a id="volunteers2_expand<?=$_GET['cnt']?>2" class="acolor" onclick="javascript:addmore_volunteers_name2(<?=$user8_id?>,'<?=$_GET['cnt']?>2','volunteers2_expand<?=$_GET['cnt']?>2','<?=($_GET['cntlvl']+1)?>');"><?=($user8_name!='')?'+&nbsp;&nbsp;':'+&nbsp;&nbsp;' ?></a><?=$user8_name?></div>
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
                                                    <input type="hidden" name="volnumbers2<?=$_GET['cnt']?>2" id="volnumbers2<?=$_GET['cnt']?>2" value="<?=$_GET['cnt']?>2" />
													<div class="clearboth" id="next_volunteers_name2[<?=$_GET['cnt']?>2]" style="margin-left:15px;"></div>
													<li class="float_left_in_mar">
     												<?
													if($user9_name != '')
													{
														?>
														<div class="fleft"><a id="volunteers2_expand<?=$_GET['cnt']?>3" class="acolor" onclick="javascript:addmore_volunteers_name2(<?=$user9_id?>,'<?=$_GET['cnt']?>3','volunteers2_expand<?=$_GET['cnt']?>3','<?=($_GET['cntlvl']+1)?>');"><?=($user9_name!='')?'+&nbsp;&nbsp;':'+&nbsp;&nbsp;' ?></a><?=$user9_name?></div>
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
													<input type="hidden" name="volnumbers2<?=$_GET['cnt']?>3" id="volnumbers2<?=$_GET['cnt']?>3" value="<?=$_GET['cnt']?>3" />
													<div class="clearboth" id="next_volunteers_name2[<?=$_GET['cnt']?>3]" style="margin-left:15px;"></div>
                                                </ul>
												<div class="clearboth" id="next_volunteers2[<?=$_GET['cnt']?>]" style="margin-left:15px;"></div>
