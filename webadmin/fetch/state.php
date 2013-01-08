<?php  include("../../buisness_logic/config/configure.php");
	   global $dbobj;
		$receive_country = $_REQUEST['id'];
		$query = "SELECT * FROM `state_master` WHERE `Is_Delete` = 'N' AND `country_id` = {$receive_country}";
		$states = $dbobj->select($query);
		$html = "";
		$html.="<option value=''>Select</option>";
		if(is_array($states) && sizeof($states)) :			
			foreach($states as $state) 
				$html.="<option value='".$state['state_id']."'>".$state["state_name"]."</option>";
		 else :
			$html.="<option value='0'>Other</option>";
		
		endif;
		echo $html;exit;
		//die("test");
?>
