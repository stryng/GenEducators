<?php  include("../../buisness_logic/config/configure.php");
	   global $dbobj;
		$receive_category = $_REQUEST['id'];
		$query = "SELECT * FROM `sub_categories` WHERE `status` = 'active' AND `category_id` = {$receive_category}";
		$sub_categories = $dbobj->select($query);
		$html = "";
		$html.="<option value=''>Select</option>";
		if(is_array($sub_categories) && sizeof($sub_categories))  {
			foreach($sub_categories as $sub_category) 
				$html.="<option value='".$sub_category['id']."'>".$sub_category["title"]."</option>";
		} else {
			$html.="<option value='0'>Other</option>";
		}
		echo $html;
		//die("test");
?>