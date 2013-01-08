<?
class admin_page_content extends dbclass{
	function get_page_content_detail($sorton, $sorttype, $option, $keyword, $var_limit) {
		if(isset($keyword) && !empty($keyword)) {
			$search_cond = " AND ".$option." like '".$keyword."%'";
		}
		$order_cond = ' order by '.$sorton.' '.$sorttype;
		$query = "select * from page_content where Pag_DeleteFlag='No'".$search_cond.$order_cond.$var_limit;
		$sql = $this->select($query);
		return $sql;
	}

	function count_page_content_detail($option, $keyword) {
		if(isset($keyword) && !empty($keyword)) {
			$search_cond = " AND ".$option." like '".$keyword."%'";
		}
		$query = "select count(*) as tot from page_content where Pag_DeleteFlag='No'".$search_cond;
		$sql = $this->select($query);
		return $sql[0]["tot"];
	}

	function funoperation() {
		$msg='';
		if($_REQUEST['action']=='active') {
			$query = "update page_content set Pag_Status='Active' where Pag_Id in (".implode(",",$_REQUEST['chk']).")";
			$msg='Selected Record(s) Active Successfully';
		}
		if($_REQUEST['action']=='inactive') {
			$query = "update page_content set Pag_Status='Inactive' where Pag_Id in (".implode(",",$_REQUEST['chk']).")";
			$msg='Selected Record(s) Inactive Successfully';
		}
		if($_REQUEST['action']=='delete') {
			$query = "update page_content set Pag_DeleteFlag='Yes' where Pag_Id in (".implode(",",$_REQUEST['chk']).")";
			$msg='Selected Record(s) Delete Successfully';
		}
		$this->update($query);
		return $msg;
	}

	function get_page_content_single_detail($txtpage_contentid) {
		$query = "SELECT * FROM page_content where Pag_Id='".$txtpage_contentid."'";
		$sql = $this->select($query);
		return $sql;
	}

	function update_page_content_detail($status,$page_contentid,$title,$desc,$metakeyword,$metadesc,$parentid) {
		$msg='';
		$query = "update page_content set Pag_Status='".$status."', Pag_Title='".addslashes(stripslashes($title))."', Pag_Desc='".addslashes(stripslashes($desc))."', Pag_MetaKeyword='".addslashes(stripslashes($metakeyword))."', Pag_MetaDesc='".addslashes(stripslashes($metadesc))."', Parent_Id='".$parentid."' where Pag_Id='".$page_contentid."'";
		$sql = $this->update($query);
		/*$cid=$page_contentid;
			$target = "../".$title.".php";
		$myFile = "../static_page.php";
				copy($main,$target);
				$filename1 = "../static_page.php";
				$handle  = fopen($filename1, 'r');
				$fh = fopen($target, 'w') or die("can't open file");
				while (!feof($handle))
				{
				$data = fgets($handle);
				$thedata = str_replace('$id',$cid,$data);
				fwrite($fh, $thedata);
				}
				fclose($fh);*/
		$msg='Page Content update Successfully';
		return $msg;
	}

	function add_page_content_detail($status,$title,$desc,$metakeyword,$metadesc,$parentid) {
		$msg='';
		$query = "insert page_content set Pag_Status='".$status."', Pag_Title='".addslashes(stripslashes($title))."', Pag_Desc='".addslashes(stripslashes($desc))."', Pag_MetaKeyword='".addslashes(stripslashes($metakeyword))."', Pag_MetaDesc='".addslashes(stripslashes($metadesc))."',Parent_Id='".$parentid."'";
		$sql = $this->insert($query);
//		$cid = mysql_insert_id();

		/*$target = "../".$title.".php";
		copy("../static_page.php",$target);
		$filename1 = "../static_page.php";
		//copy($target,$filename1);

		$handle  = fopen($filename1, 'r');
		$fh = fopen($target, 'w') or die("can't open file");
		while (!feof($handle))
		{
		$data = fgets($handle);
		$thedata = str_replace('$id',$cid,$data);
		fwrite($fh, $thedata);
		}

		fclose($fh);*/
		$msg='Page Content Added Successfully';
		return $msg;
	}

	function get_page_content1() {

		$query = "select * from page_content where Pag_DeleteFlag='No'";
		$sql = $this->select($query);
		return $sql;
	}

}
?>