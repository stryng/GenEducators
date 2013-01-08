<?php 
     include_once '../../buisness_logic/config/configure.php';
	 $arr = json_decode($_POST['json']);
	 $email =  $arr->txtemail;	 
		
		$table = ' customer_detail ';
		$col   = ' email ';
		$val   =  $email ;
		$result = check_value($table,$col,$val);
		if( $result  == "0")
		{
			$return['msg'] =  "email already exist."; 		
		}else {
			$return['msg'] =  " available" ;	
		}
		
	echo json_encode($return['msg']);
?>