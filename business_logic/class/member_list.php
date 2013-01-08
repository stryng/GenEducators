<?php
class member_list extends dbclass{
	function get_member_detail($tableName, $sorton, $sorttype, $var_limit,$fix_users="") {
		
		$search_cond = " ";
		if($fix_users != "")
		{
			$search_cond = " AND (inviter = '".$fix_users."' or  UserId = '".$fix_users."') AND username not like '%_delete'";
			$sorton = "userid < '".$_SESSION['userid']."',".$sorton;
		}
		else
		{
			$search_cond = " AND UserName!='admin' and username not like '%_delete'";
		}
		$order_cond = ' order by '.$sorton.' '.$sorttype;
	  	$query = "SELECT * FROM $tableName WHERE 1 ".$search_cond.$order_cond.$var_limit;
		$sql = $this->select($query);
		return $sql;
	}
	
	function count_member_detail($tableName,$fix_users="") {
		$search_cond = " ";
		if($fix_users != "")
		{
			$search_cond .= " AND (inviter = '".$fix_users."' or  UserId = '".$fix_users."') AND username not like '%_delete'";
		}
		else
		{
			$search_cond = " AND UserName!='admin' and username not like '%_delete'";
		}
		$query = "SELECT count(*) as tot FROM $tableName WHERE 1 ".$search_cond;
		$sql = $this->select($query);
		return $sql[0]["tot"];
	}
}
?>