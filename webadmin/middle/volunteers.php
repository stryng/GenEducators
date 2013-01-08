<?php
	$marics = isset($_GET['marics'])?$_GET['marics']:"33";
	$msg = "";
?>
<script type="text/javascript" src="../member/js/ajax_volunteers.js">
</script>
<script type="text/javascript" src="../member/js/ajax_volunteers_matrix.js">
</script>
<script type="text/javascript">
function backbtn()
{
	parent.history.back(); return false;
}
function mouseOver(id)
{
	 //document.getElementById("+id+").style.visibility = "visible";
	 document.getElementById(id).style.display= "block";
}
function mouseOut(id)
{
	document.getElementById(id).style.display = "none";
}
</script>
<?
	if($marics == "33")
	{
		$qry = "select * from nodetree where usertb_id= '".$_SESSION['admin']['userid']."'";
		$row_u = $form->getRow($qry);

		$qry = "select * from nodetree where u1 = '".$_SESSION['admin']['userid']."' or u2 = '".$_SESSION['admin']['userid']."' or u3 = '".$_SESSION['admin']['userid']."'";
		$row_out = $form->getRow($qry);
		if(sizeof($row_out)>0)
		{
			$_SESSION['notintree'][$_SESSION['admin']['userid']] = false;
		}
		else if(sizeof($row_u)==0)
		{
			$_SESSION['notintree'][$_SESSION['admin']['userid']] = false;
		}
		if($_SESSION['notintree'][$_SESSION['admin']['userid']] == false)
		{
			include_once("volunteers3_3.php");
		}
	}
	else if($marics == "53")
	{
		$qry = "select * from nodetree_5_3 where usertb_id= '".$_SESSION['admin']['userid']."'";
		$row_u = $form->getRow($qry);

		$qry = "select * from nodetree_5_3 where u1 = '".$_SESSION['admin']['userid']."' or u2 = '".$_SESSION['admin']['userid']."' or u3 = '".$_SESSION['admin']['userid']."' or u4 = '".$_SESSION['admin']['userid']."' or u5 = '".$_SESSION['admin']['userid']."' or usertb_id = '".$_SESSION['admin']['userid']."'";
		$row_out = $form->getRow($qry);
		if(sizeof($row_out)>0)
		{
			$_SESSION['notintree_5_3'][$_SESSION['admin']['userid']] = false;
		}
		else if(sizeof($row_u)==0)
		{
			$_SESSION['notintree_5_3'][$_SESSION['admin']['userid']] = false;
		}
		if($_SESSION['notintree_5_3'][$_SESSION['admin']['userid']] == false)
		{
			include_once("volunteers5_3.php");
		}
	}
	else if($marics == "103")
	{
		$qry = "select * from nodetree_10_3 where usertb_id= '".$_SESSION['admin']['userid']."'";
		$row_u = $form->getRow($qry);

		$qry = "select * from nodetree_10_3 where u1 = '".$_SESSION['admin']['userid']."' or u2 = '".$_SESSION['admin']['userid']."' or u3 = '".$_SESSION['admin']['userid']."' or u4 = '".$_SESSION['admin']['userid']."' or u5 = '".$_SESSION['admin']['userid']."' or u6 = '".$_SESSION['admin']['userid']."' or u7 = '".$_SESSION['admin']['userid']."' or u8 = '".$_SESSION['admin']['userid']."' or u9 = '".$_SESSION['admin']['userid']."' or u10 = '".$_SESSION['admin']['userid']."' or usertb_id = '".$_SESSION['admin']['userid']."'";
		$row_out = $form->getRow($qry);
		if(sizeof($row_out)>0)
		{
			$_SESSION['notintree_10_3'][$_SESSION['admin']['userid']] = false;
		}
		else if(sizeof($row_u)==0)
		{
			$_SESSION['notintree_10_3'][$_SESSION['admin']['userid']] = false;
		}
		if($_SESSION['notintree_10_3'][$_SESSION['admin']['userid']] == false)
		{
			include_once("volunteers10_3.php");
		}
	}
	else
	{
		echo "Invalid stream selected";
	}

	//require_once("footer.php");

	function checkuseractivemembers($user_ids)
	{
		global $form;
		$sql = "select count(*) as tot_member_act from userdetail u,m_payment_fee mp  where u.inviter= '".$user_ids."' and mp.usertb_id = u.UserId and payment_done = 'YES'";
		$rcd = $form->getRow($sql);
		$_SESSION['act_mems'][$user_ids] = isset($rcd['tot_member_act'])?$rcd['tot_member_act']:0;
	}
	function checkuseractivemembers_5_3($user_ids)
	{
		global $form;
		$sql = "select count(*) as tot_member_act from userdetail u,m_payment_fee_5_3 mp  where u.inviter_5_3= '".$user_ids."' and mp.usertb_id = u.UserId and payment_done = 'YES'";
		$rcd = $form->getRow($sql);
		$_SESSION['act_mems_5_3'][$user_ids] = isset($rcd['tot_member_act'])?$rcd['tot_member_act']:0;
	}
	function checkuseractivemembers_10_3($user_ids)
	{
		global $form;
		$sql = "select count(*) as tot_member_act from userdetail u ,m_payment_fee_10_3 mp where u.inviter_10_3= '".$user_ids."' and mp.usertb_id = u.UserId and payment_done = 'YES'";
		$rcd = $form->getRow($sql);
		$_SESSION['act_mems_10_3'][$user_ids] = isset($rcd['tot_member_act'])?$rcd['tot_member_act']:0;
	}
		
	
	function checkuserreplacelink($user_ids)
	{
		global $form;
		$sql = "select UserId from userdetail where active = 1 and inviter='".$user_ids."'";
		$rows = $form->getArray($sql);
		$rcd = sizeof($rows);
		//$uid = array();
		$firstuser = array();
		if($rcd != 0)
		{
			for($i=0;$i<sizeof($rows);$i++)
			{
				$sql = "select payment_done from m_payment_fee where usertb_id = '".$rows[$i]['UserId']."'";
				$row2 = $form->getRow($sql);
				if(sizeof($row2)>0 && $row2['payment_done'] == 'YES')
				{
					$_SESSION['ruid'][$user_ids] = 0;
					return;
				}
				else
				{
					$sql = "select ud.UserId from userdetail ud,m_payment_fee mf where ud.UserId = mf.usertb_id and ud.inviter = '".$rows[$i]['UserId']."' and mf.payment_done = 'YES'";
					$rowchk = $form->getRow($sql);
					$num = sizeof($rowchk);
					if($num > 0)
					{
						$_SESSION['ruid'][$user_ids] = 0;
					}
					else
					{
						$_SESSION['ruid'][$user_ids] = 1;
					}
				}
			}
		}
		else
		{
			$_SESSION['ruid'][$user_ids] = 1;
		}
		//$_SESSION['ruid'] = $thirduser;
	}
	function checkuserreplacelink_5_3($user_ids)
	{
		global $form;
		$sql = "select UserId from userdetail where active = 1 and inviter_5_3='".$user_ids."'";
		$rows = $form->getArray($sql);
		$rcd = sizeof($rows);
		//$uid = array();
		$firstuser = array();
		if($rcd != 0)
		{
			for($i=0;$i<sizeof($rows);$i++)
			{
				$sql = "select payment_done from m_payment_fee_5_3 where usertb_id = '".$rows[$i]['UserId']."'";
				$row2 = $form->getRow($sql);
				if($row2['payment_done'] == 'YES')
				{
					$_SESSION['ruid53'][$user_ids] = 0;
					return;
				}
				else
				{
					$sql = "select ud.UserId,mf.usertb_id from userdetail ud,m_payment_fee_5_3 mf where ud.UserId = mf.usertb_id and ud.inviter_5_3 = '".$rows[$i]['UserId']."' and mf.payment_done = 'YES'";
					$rowchk = $form->getRow($sql);
					$num = sizeof($rowchk);
					if($num > 0)
					{
						$_SESSION['ruid53'][$user_ids] = 0;
					}
					else
					{
						$_SESSION['ruid53'][$user_ids] = 1;
					}
				}
			}
		}
		else
		{
			$_SESSION['ruid53'][$user_ids] = 1;
		}
		//$_SESSION['ruid'] = $thirduser;
	}

	function checkuserreplacelink_10_3($user_ids)
	{
		global $form;
		$sql = "select UserId from userdetail where active = 1 and inviter_10_3='".$user_ids."'";
		$rows = $form->getArray($sql);
		$rcd = sizeof($rows);
		//$uid = array();
		$firstuser = array();
		if($rcd != 0)
		{
			for($i=0;$i<sizeof($rows);$i++)
			{
				$sql = "select payment_done from m_payment_fee_10_3 where usertb_id = '".$rows[$i]['UserId']."'";
				$row2 = $form->getRow($sql);
				if($row2['payment_done'] == 'YES')
				{
					$_SESSION['ruid103'][$user_ids] = 0;
					return;
				}
				else
				{
					$sql = "select ud.UserId,mf.usertb_id from userdetail ud,m_payment_fee_10_3 mf where ud.UserId = mf.usertb_id and ud.inviter_10_3 = '".$rows[$i]['UserId']."' and mf.payment_done = 'YES'";
					$rowchk = $form->getRow($sql);
					$num = sizeof($rowchk);
					if($num > 0)
					{
						$_SESSION['ruid103'][$user_ids] = 0;
					}
					else
					{
						$_SESSION['ruid103'][$user_ids] = 1;
					}
				}
			}
		}
		else
		{
			$_SESSION['ruid103'][$user_ids] = 1;
		}
		//$_SESSION['ruid'] = $thirduser;
	}
?>