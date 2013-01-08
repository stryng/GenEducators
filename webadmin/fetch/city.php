<?php  include("../../buisness_logic/config/configure.php");
	   global $dbobj;
		$receive_state = $_REQUEST['id'];
		$query = "SELECT * FROM `city_master` WHERE `state_id` = {$receive_state}";
		$cities = $dbobj->select($query);
		$html = "";
		$html.="<option value=''>Select</option>";
		if(is_array($cities) && sizeof($cities))  {
			foreach($cities as $city) 
				$html.="<option value='".$city['city_id']."'>".$city["city_name"]."</option>";
		} else {
			$html.="<option value='0'>Other</option>";
		}
		echo $html;exit;
		//die("test");
?>