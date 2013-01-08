<?php
	require_once('business_logic/config/configure.php');
	require_once("business_logic/class/form.class.php");
	//echo $_REQUEST['action']; die;
	$form = new Form();

	$qry_login = "select max(loginlogout_id) as log_id from `loginlogout_detail` where `usertb_id` = '".$_SESSION['userid']."' and logout_datetime  like '0000-00-00%'";
	$rows = $form->getRow($qry_login);

	$qry_login = "update loginlogout_detail set logout_datetime = '".date("Y-m-d H:i:s")."' where loginlogout_id = '".$rows['log_id']."'";
	$form->inser_qry($qry_login);
		
	unset($_SESSION['usertype']);
	unset($_SESSION['username']);
	unset($_SESSION['uid']);
	session_destroy();
	header("location:index.php");
?>