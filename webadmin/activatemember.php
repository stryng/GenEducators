<?php
		include_once '../business_logic/config/configure.php';  
		require_once("../business_logic/class/form.class.php");
		//$db = new DBConnection;
		$form = new Form();
		if($_POST['activatemember'] == "yes")
        {
				include("../ap_confirmation.php");
				$rtnval = userdetails($form,$_POST['usersid'],$_POST['passkey']);
				if($rtnval == "Your Registration is done successfully")
				{
					echo 1;
				}
				else
				{
					echo 0;
				}
		}
		else
		{
			echo 0;
		}
?>