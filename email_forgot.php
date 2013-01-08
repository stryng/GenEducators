<?php 
	include_once 'business_logic/config/configure.php'; 
	require_once("business_logic/class/form.class.php");

	$form = new Form();
	 $arr = json_decode($_POST['json']);
	 $email =  $arr->txtfemail;	 
		$qry = "SELECT * FROM userdetail WHERE  login = '".$email."'";
		$result = $form->getRow($qry);
		if($result  > "0")
		{
			$return['msg'] =  ""; 		
		}else {
			$return['msg'] =  "No Account found with this email address" ;	
		}
		
		
	echo json_encode($return['msg']);
?>