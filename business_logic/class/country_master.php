<?
class country_master extends dbclass{
	function get_country_master_detail($sorton, $sorttype, $option, $keyword, $var_limit) {
		if(isset($keyword) && !empty($keyword)) {
			$search_cond = " AND ".$option." like '".$keyword."%'";
		}
		$order_cond = ' order by '.$sorton.' '.$sorttype;
		$query = "select * from country_master where Is_Deleted='N'".$search_cond.$order_cond.$var_limit;
		$sql = $this->select($query);
		return $sql;
	}
	
	function count_country_master_detail($option, $keyword) {
		if(isset($keyword) && !empty($keyword)) {
			$search_cond = " AND ".$option." like '".$keyword."%'";
		}
		$query = "select count(*) as tot from country_master where Is_Deleted='N'".$search_cond;
		$sql = $this->select($query);
		return $sql[0]["tot"];
	}
	function get_country_list(){
		$query = "select Country_ID,Country_Name from country_master where Is_Deleted='N'";		 
		$sql = $this->select($query);
		return $sql;
	}
	
	function funoperation() {
		$msg='';
		if($_REQUEST['action']=='inactive') {
			$query = "update country_master set Is_Deleted='Y' where Country_ID in (".implode(",",$_REQUEST['chk']).")";
			$msg='Selected Record(s) Active Successfully';
		}
		if($_REQUEST['action']=='active') {
			$query = "update country_master set Is_Deleted='N' where Country_ID in (".implode(",",$_REQUEST['chk']).")";
			$msg='Selected Record(s) Inactive Successfully';
		}
		if($_REQUEST['action']=='delete') {
			$query = "delete from country_master where Country_ID in (".implode(",",$_REQUEST['chk']).")";
			$msg='Selected Record(s) Delete Successfully';
		}
		if($_REQUEST['action']=='delete_single') {
			$query = "delete from country_master where Country_ID in (".$_REQUEST['id'].")";
			$msg='Selected Record(s) Delete Successfully';
		}
		$this->update($query);
		return $msg;
	}

	function get_country_master_single_detail($txtcountry_masterid) {
		$query = "SELECT * FROM country_master where Country_ID='".$txtcountry_masterid."'";
		$sql = $this->select($query);
		return $sql;
	}
	
	function update_country_master_detail($status,$country_masterid,$name,$shortname,$default_country) {
		$msg='';
		$query = "update country_master set Country_Name='".addslashes($name)."',Countries_ISO_Code='".addslashes($shortname)."', default_country='".addslashes($default_country)."' where Country_ID='".$country_masterid."'";
		$sql = $this->update($query);
		$msg='Country update Successfully';
		return $msg;
	}
	
	function add_country_master_detail($status,$name,$shortname,$default_country) {
		$msg='';
		$query = "insert country_master set Is_Deleted='".$status."', Country_Name='".addslashes($name)."', Countries_ISO_Code='".addslashes($shortname)."', default_country='".addslashes($default_country)."'";
		$sql = $this->insert($query);
		$msg='Country Added Successfully';
		return $msg;
	}
	
	function set_default_country() {
		
		$query = "select * from country_master where default_country = 1";
		$sql = $this->select($query);
		
		$query_2 = "update country_master set default_country = 0 where Country_ID='".$sql[0]['Country_ID']."'";
		$sql_2 = $this->update($query_2);
		
		$msg='Your City is Successfully Set the default city';
		return $msg;
	}
	
	function default_selected_country() {
		$query = "select * from country_master where default_country = 1";
		$sql = $this->select($query);
		return $sql[0]['Country_Name'];
	}
	
}
?>