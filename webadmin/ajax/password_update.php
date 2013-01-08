<?php
	require_once('../../business_logic/config/configure.php');
	require_once("../../business_logic/class/form.class.php");
	//echo $_REQUEST['action']; die;
	$form = new Form();
	
	$pass = md5(trim($_REQUEST['pass']));
	$uid  = $_REQUEST['uid'];
	
	$sql = "UPDATE userdetail SET Password = '".$pass."' WHERE UserId =".$uid;
	$flag = $form->inser_qry($sql);
	
	if($flag=='success'){
		echo "Succ";
	}else{
		echo "Fail";
	}
	
	
?>
