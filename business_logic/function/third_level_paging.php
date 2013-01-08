<?php 
$n3=$_REQUEST['n3']; 
// CODE FOR PAGING
if (!isset($num_totrec3)) $num_totrec3 = $db_recs[0]["tot"]; 
// $num_totrec3 SHOULD BE PASSED
$pg_limit3 	= 5;//$obj->ADM_PAGELIMIT; //page limit
if (!isset($n3) or $n3 == "") {
	$rec_limit3 = $record_limit; //$obj->ADM_RECLIMIT;  //record limit
} else {
	$rec_limit3 = $n3;
} 
$var_self3 = $dbobj->HOST; //url
$num_tmp3 = 0;
$var_flg3 = "0";
$var_limit3 = "";
$var_limit_max3 = "";
$var_limit_min3 = "";
$num_limit3 = 0;
$var_filter3 = ""; 
$start=$_REQUEST['start'];
$nstart=$_REQUEST['nstart'];

// YOU MAY NEED TO CHANGE THIS VARIBLE
if(isset($_REQUEST['file'])) {
	$fname = $_REQUEST['file'];
} else {


	//$fname = 'default';

}

 
 $var_file_url = $PHP_SELF . "?" . 'file='.$fname;

/**
* FOR EXAMPLE
* We use to call all the files from index.php and we pass the file name to index.php in query string by variable $file, so in this case we change above code to 
* //$var_file_url = $PHP_SELF . "?file=" . $file;
*/ 
// CHANGE THIS CODE WITH SUITABLE VARIABLES
if (isset($keyword3)) $var_filter3 = "&keyword=".rawurlencode($keyword3)."&option=$option3"; 
// ENDS HERE
// SET Extra querystring variables to pass from here
// $var_extra3 can be attached with the links for this purpose

if (isset($start)) {
	$num_limit3 = ($start-1) * $rec_limit3;
	$var_limit3 = " LIMIT $num_limit3,$rec_limit3";
	$var_limit_max3 = $num_limit3+$rec_limit3;
	$var_limit_min3 = $num_limit3;
} else {
	$var_limit3 = " LIMIT 0,$rec_limit3";
	$var_limit_max3 = $num_limit3+$rec_limit3;
	$var_limit_min3 = 0;
}

if (!isset($nstart)) {
	if ($num_totrec3) { // if recs exists!!
		if ($rec_limit3 > $num_totrec3) {
			$num_pgs = 1;
			$var_flg3 = "2";
		} else {
			$num_loopctr = 0;
			$num_loopctr = ceil($num_totrec3 / $rec_limit3);
			if ($pg_limit3 > $num_loopctr) {
				$num_pgs = $num_loopctr;
				$var_flg3 = "2";
			} else {
				$num_pgs = $pg_limit3;
				if ($num_totrec3 <= ($rec_limit3 * $pg_limit3)) $var_flg3 = "2";
				else $var_flg3 = "1";
			} 
		} 
		$var_link3 = "";
		$var_prevlink = ""; 
		// if sorting is set
		$var_sort_link = "";
		if (isset($sorton3)) $var_sort_link = "&sorton=$sorton3"; 
		 //$var_prevlink ="<font face=verdana >previous ";
		$var_prevlink =" <a tabindex=\"0\" class=\"previous paginate_button paginate_button_disabled\" id=\"DataTables_Table_0_previous\">Previous</a>";
		//$var_prevlink = "";
		if (!isset($start)) {
			$start = 1;
		} 
		$var_link3 .="<span>";
		for($i = 1;$i <= $num_pgs;$i++) {
			if ($start == $i) {
				$var_link3 .= "<a tabindex=\"0\" class=\"paginate_button paginate_active\">".$i."</a>";
			} ELSE {
				
				if($_REQUEST['start']!='' && $_REQUEST['start']==$i)
				{
					$class='class="paginate_active"';
				}
				else
				{
					$class='class="paginate_button"';
				}
				//$var_link3 .= "<a ".$class." href=\"$var_self3$var_file_url&nstart=1&start=$i$var_filter3$var_sort_link$var_extra3\">$i - A</a>";
				$var_link3 .= "<a ".$class." href=\"javascript:void(0);\" onclick=\"third_level_load('$var_self3$var_file_url&nstart=1&start=$i$var_filter3$var_sort_link$var_extra3');\">$i</a>";
			} 
		} 
		$var_link3 .="</span>";
		
		if ($_REQUEST['start']!='') {
			//$var_link3 .= "<a tabindex=\"0\" class=\"next paginate_button\" id=\"DataTables_Table_0_next\" href=\"$var_self3$var_file_url&nstart=2&start=$i$var_filter3$var_filter3$var_sort_link$var_extra3\"> Next </a>";
			$var_link3 .= "<a tabindex=\"0\" class=\"next paginate_button\" id=\"DataTables_Table_0_next\"  href=\"javascript:void(0);\" onclick=\"third_level_load('$var_self3$var_file_url&nstart=2&start=$i$var_filter3$var_filter3$var_sort_link$var_extra3');\"> Next </a>";
			
		} else {
			if($num_pgs==1){
			
			$var_link3 .= "<a tabindex=\"0\" class=\"next paginate_button paginate_button_disabled\" id=\"DataTables_Table_0_next\" > Next </span>";
			}else {
			$var_link3 .= "<a tabindex=\"0\" class=\"next paginate_button\" id=\"DataTables_Table_0_next\"  href=\"javascript:void(0);\" onclick=\"third_level_load('$var_self3$var_file_url&nstart=1&start=2$var_filter3$var_sort_link$var_extra3');\">Next </a>";
			}
		} 
		$page_link3 = "";
		
			if($var_prevlink!='')
			{
				$page_link3 .= "$var_prevlink";
			}
			if($var_link3!='')
			{
				$page_link3 .= "$var_link3";
			}
		
	} else {
		// IF NO RECORDS EXISTS!!
		$var_link3 = "";
	} 
} else { // if nstart is set
	if ($num_totrec3) { // if recs exists!!
		$num_loopctr = 0;
		$num_rem_rec = 0;
		$num_rem_rec = ($num_totrec3 - (($nstart-1) * $rec_limit3 * $pg_limit3));
		$num_loopctr = ceil($num_rem_rec / $rec_limit3);
		$num_tmp3 = $rec_limit3 * $nstart * $pg_limit3;
		$last_start = 0;
		$last_start = ceil($num_totrec3 / $rec_limit3);
		$last_nstart = 0;
		$last_nstart = ceil($num_totrec3 / ($rec_limit3 * $pg_limit3));
		if ($num_tmp3 > $num_totrec3) {
			$num_pgs = $num_loopctr;
			$var_flg3 = "2";
		} else {
			$num_pgs = $pg_limit3;
			if ($num_totrec3 == ($nstart * $rec_limit3 * $pg_limit3)) $var_flg3 = "2";
			else $var_flg3 = "1";
		} 
		$var_link3 = "";
		$var_prevlink = ""; 
		// if sorting is set
		$var_sort_link = "";
		if (isset($sorton3)) $var_sort_link = "&sorton=$sorton3";
		$num_prevnstart = 0;
		$num_prevstart = 0;
		$num_prevnstart = $nstart-1;
		$num_prevstart = ($nstart * $pg_limit3) - $pg_limit3;
		$num_tmp3 = ($num_totrec3 / $rec_limit3);

		if ($nstart <= 1) {
			$pre = $_REQUEST['start']-1;
			$var_prevlink = "";
			//$var_prevlink ="<a tabindex=\"0\" class=\"previous paginate_button\" id=\"DataTables_Table_0_previous\" href=\"$var_self3$var_file_url&nstart=1&start=$pre&$var_filter3$var_sort_link$var_extra3\" >Previous</a>";
			
			$var_prevlink ="<a tabindex=\"0\" class=\"previous paginate_button\" id=\"DataTables_Table_0_previous\" href=\"javascript:void(0);\" onclick=\"third_level_load('$var_self3$var_file_url&nstart=1&start=$pre$var_sort_link$var_extra3');\" >Previous</a>";
			
		} else

			/*$var_prevlink = "<a tabindex=\"0\" class=\"first paginate_button paginate_button\" id=\"DataTables_Table_0_previous\" href=\"$var_self3$var_file_url&nstart=1&start=1$var_filter3$var_sort_link$var_extra3\">First</a>
							 <a tabindex=\"0\" class=\"previous paginate_button paginate_button\" id=\"DataTables_Table_0_previous\" href=\"$var_self3$var_file_url&nstart=$num_prevnstart&start=$num_prevstart$var_filter3$var_sort_link$var_extra3\">Previous</a>";*/
							 
			$var_prevlink = "<a tabindex=\"0\" class=\"first paginate_button paginate_button\" id=\"DataTables_Table_0_previous\" href=\"javascript:void(0);\" onclick=\"third_level_load('$var_self3$var_file_url&nstart=1&start=1$var_filter3$var_sort_link$var_extra3');\">First</a>
							 <a tabindex=\"0\" class=\"previous paginate_button paginate_button\" id=\"DataTables_Table_0_previous\" href=\"javascript:void(0);\" onclick=\"third_level_load('$var_self3$var_file_url&nstart=$num_prevnstart&start=$num_prevstart$var_filter3$var_sort_link$var_extra3');\">Previous</a>";				 
			
		$var_link3 .="<span>";
		for($i = 1;$i <= $num_pgs;$i++) {
			$num_start = $num_prevstart + $i;
			$num_nstart = $nstart + 1;
			if ($num_start == $start) $var_link3 .= "<a tabindex=\"0\" class=\"paginate_active\">$num_start</a> ";
			//ELSE $var_link3 .= "<a tabindex=\"0\" class=\"paginate_button\" href=\"$var_self3$var_file_url&nstart=$nstart&start=$num_start$var_filter3$var_sort_link$var_extra3\">$num_start</a>";
			
			ELSE $var_link3 .= "<a tabindex=\"0\" class=\"paginate_button\" href=\"javascript:void(0);\" onclick=\"third_level_load('$var_self3$var_file_url&nstart=$nstart&start=$num_start$var_filter3$var_sort_link$var_extra3');\">$num_start</a>";
		} 
		$var_link3 .="</span>";
		$num_start++;
		if ($var_flag != "0" and $var_flg3 != "2") {
		
			/*$var_link3 .= "<a tabindex=\"0\" class=\"next paginate_button\" id=\"DataTables_Table_0_next\" href=\"$var_self3$var_file_url&nstart=$num_nstart&start=$num_start$var_filter3$var_sort_link$var_extra3\"> Next</a>
				<a tabindex=\"0\" class=\"last paginate_button\" id=\"DataTables_Table_0_last\" href=\"$var_self3$var_file_url&nstart=$last_nstart&start=$last_start$var_filter3$var_sort_link$var_extra3\">Last</a>";*/
				
			$var_link3 .= "<a tabindex=\"0\" class=\"next paginate_button\" id=\"DataTables_Table_0_next\" href=\"javascript:void(0);\"  onclick=\"third_level_load('$var_self3$var_file_url&nstart=$num_nstart&start=$num_start$var_filter3$var_sort_link$var_extra3');\"> Next</a>
			
				<a tabindex=\"0\" class=\"last paginate_button\" id=\"DataTables_Table_0_last\" href=\"javascript:void(0);\"  onclick=\"third_level_load('$var_self3$var_file_url&nstart=$last_nstart&start=$last_start$var_filter3$var_sort_link$var_extra3');\">Last</a>";

				
				
		} else {
			$var_link3 .= "";
			//echo $_REQUEST['start'];
			//echo $num_pgs;
			$nxpage =$_REQUEST['start']+1;
			if($nxpage<=$num_pgs){
			
			// $var_link3 .= "<a tabindex=\"0\" class=\"next paginate_button\" href=\"$var_self3$var_file_url&nstart=1&start=$nxpage&$var_filter3$var_sort_link$var_extra3\">Next</a>";
			
			 $var_link3 .= "<a tabindex=\"0\" class=\"next paginate_button\" href=\"javascript:void(0);\" onclick=\"third_level_load(' $var_self3$var_file_url&nstart=1&start=$nxpage$var_sort_link$var_extra3');\">Next</a>";
			 }
		} 
		$page_link3 = "";
		if($var_prevlink!='')
		{
		$prepage =$_REQUEST['start']-1;
		if($prepage>=1){
			//$page_link3 .= "<a class=\"previous paginate_button paginate_button_disabled\" id=\"DataTables_Table_0_previous\" href=\"$var_self3$var_file_url&nstart=1&start=$prepage&$var_filter3$var_sort_link$var_extra3\">$var_prevlink</a>";
			$page_link3 .= $var_prevlink;
			}
		}
		if($var_link3!='')
		{
			$page_link3 .= "$var_link3";
		}
		
	} else {
		// IF NO RECORDS EXISTS!!
		$var_link3 = "";
	} 
} 
// if set the paging variables
if (isset($nstart)) $var_pgs = "&nstart=$nstart&start=$start"; //attach this with the sorting links  
// CODE FOR PAGING ENDS OVER HERE

//echo $var_limit3 . 'hi'; 
function createpagecombo3($arr=array()) {
	$par = '';
 	foreach($arr as $key=>$val){
		if($val !=""){
			$par .="&$key=$val";
		}
	}	 
	if(!isset($_REQUEST['n3'])) $_REQUEST['n3']=PAGE_COMBO;
	$page = '10,20,30,40,50,75,100';
	$pagearr=explode(",",$page);
	$selectstr = '';
	$selectstr = "<select name=\"n\" id=\"n\" onchange=\"custuom_paging('".$_REQUEST['file']."','".$par."')\">";
	for($r=0; $r<sizeof($pagearr); $r++) {
		if($_REQUEST['n3']==$pagearr[$r]) {
   			$selectstr .= '<option value="'.$pagearr[$r].'" selected>'.$pagearr[$r].'</option>';
		} else {
			$selectstr .= '<option value="'.$pagearr[$r].'">'.$pagearr[$r].'</option>';
		}
	}
    $selectstr .= '</select>';
	return $selectstr;
}

?>
