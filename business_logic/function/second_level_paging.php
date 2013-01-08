<?php 
$n2=$_REQUEST['n2']; 
// CODE FOR PAGING
if (!isset($num_totrec2)) $num_totrec2 = $db_recs[0]["tot"]; 
// $num_totrec2 SHOULD BE PASSED
$pg_limit2 	= 5;//$obj->ADM_PAGELIMIT; //page limit
if (!isset($n2) or $n2 == "") {
	$rec_limit2 = $record_limit; //$obj->ADM_RECLIMIT;  //record limit
} else {
	$rec_limit2 = $n2;
} 
$var_self2 = $dbobj->HOST; //url
$num_tmp2 = 0;
$var_flg2 = "0";
$var_limit2 = "";
$var_limit_max2 = "";
$var_limit_min2 = "";
$num_limit2 = 0;
$var_filter2 = ""; 
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
if (isset($keyword2)) $var_filter2 = "&keyword=".rawurlencode($keyword2)."&option=$option2"; 
// ENDS HERE
// SET Extra querystring variables to pass from here
// $var_extra2 can be attached with the links for this purpose

if (isset($start)) {
	$num_limit2 = ($start-1) * $rec_limit2;
	$var_limit2 = " LIMIT $num_limit2,$rec_limit2";
	$var_limit_max2 = $num_limit2+$rec_limit2;
	$var_limit_min2 = $num_limit2;
} else {
	$var_limit2 = " LIMIT 0,$rec_limit2";
	$var_limit_max2 = $num_limit2+$rec_limit2;
	$var_limit_min2 = 0;
}

if (!isset($nstart)) {
	if ($num_totrec2) { // if recs exists!!
		if ($rec_limit2 > $num_totrec2) {
			$num_pgs = 1;
			$var_flg2 = "2";
		} else {
			$num_loopctr = 0;
			$num_loopctr = ceil($num_totrec2 / $rec_limit2);
			if ($pg_limit2 > $num_loopctr) {
				$num_pgs = $num_loopctr;
				$var_flg2 = "2";
			} else {
				$num_pgs = $pg_limit2;
				if ($num_totrec2 <= ($rec_limit2 * $pg_limit2)) $var_flg2 = "2";
				else $var_flg2 = "1";
			} 
		} 
		$var_link2 = "";
		$var_prevlink = ""; 
		// if sorting is set
		$var_sort_link = "";
		if (isset($sorton2)) $var_sort_link = "&sorton=$sorton2"; 
		 //$var_prevlink ="<font face=verdana >previous ";
		$var_prevlink =" <a tabindex=\"0\" class=\"previous paginate_button paginate_button_disabled\" id=\"DataTables_Table_0_previous\">Previous</a>";
		//$var_prevlink = "";
		if (!isset($start)) {
			$start = 1;
		} 
		$var_link2 .="<span>";
		for($i = 1;$i <= $num_pgs;$i++) {
			if ($start == $i) {
				$var_link2 .= "<a tabindex=\"0\" class=\"paginate_button paginate_active\">".$i."</a>";
			} ELSE {
				
				if($_REQUEST['start']!='' && $_REQUEST['start']==$i)
				{
					$class='class="paginate_active"';
				}
				else
				{
					$class='class="paginate_button"';
				}
				//$var_link2 .= "<a ".$class." href=\"$var_self2$var_file_url&nstart=1&start=$i$var_filter2$var_sort_link$var_extra2\">$i - A</a>";
				$var_link2 .= "<a ".$class." href=\"javascript:void(0);\" onclick=\"second_level_load('$var_self2$var_file_url&nstart=1&start=$i$var_filter2$var_sort_link$var_extra2');\">$i</a>";
			} 
		} 
		$var_link2 .="</span>";
		
		if ($_REQUEST['start']!='') {
			//$var_link2 .= "<a tabindex=\"0\" class=\"next paginate_button\" id=\"DataTables_Table_0_next\" href=\"$var_self2$var_file_url&nstart=2&start=$i$var_filter2$var_filter2$var_sort_link$var_extra2\"> Next </a>";
			$var_link2 .= "<a tabindex=\"0\" class=\"next paginate_button\" id=\"DataTables_Table_0_next\"  href=\"javascript:void(0);\" onclick=\"second_level_load('$var_self2$var_file_url&nstart=2&start=$i$var_filter2$var_filter2$var_sort_link$var_extra2');\"> Next </a>";
			
		} else {
			if($num_pgs==1){
			
			$var_link2 .= "<a tabindex=\"0\" class=\"next paginate_button paginate_button_disabled\" id=\"DataTables_Table_0_next\" > Next </span>";
			}else {
			$var_link2 .= "<a tabindex=\"0\" class=\"next paginate_button\" id=\"DataTables_Table_0_next\"  href=\"javascript:void(0);\" onclick=\"second_level_load('$var_self2$var_file_url&nstart=1&start=2$var_filter2$var_sort_link$var_extra2');\">Next </a>";
			}
		} 
		$page_link2 = "";
		
			if($var_prevlink!='')
			{
				$page_link2 .= "$var_prevlink";
			}
			if($var_link2!='')
			{
				$page_link2 .= "$var_link2";
			}
		
	} else {
		// IF NO RECORDS EXISTS!!
		$var_link2 = "";
	} 
} else { // if nstart is set
	if ($num_totrec2) { // if recs exists!!
		$num_loopctr = 0;
		$num_rem_rec = 0;
		$num_rem_rec = ($num_totrec2 - (($nstart-1) * $rec_limit2 * $pg_limit2));
		$num_loopctr = ceil($num_rem_rec / $rec_limit2);
		$num_tmp2 = $rec_limit2 * $nstart * $pg_limit2;
		$last_start = 0;
		$last_start = ceil($num_totrec2 / $rec_limit2);
		$last_nstart = 0;
		$last_nstart = ceil($num_totrec2 / ($rec_limit2 * $pg_limit2));
		if ($num_tmp2 > $num_totrec2) {
			$num_pgs = $num_loopctr;
			$var_flg2 = "2";
		} else {
			$num_pgs = $pg_limit2;
			if ($num_totrec2 == ($nstart * $rec_limit2 * $pg_limit2)) $var_flg2 = "2";
			else $var_flg2 = "1";
		} 
		$var_link2 = "";
		$var_prevlink = ""; 
		// if sorting is set
		$var_sort_link = "";
		if (isset($sorton2)) $var_sort_link = "&sorton=$sorton2";
		$num_prevnstart = 0;
		$num_prevstart = 0;
		$num_prevnstart = $nstart-1;
		$num_prevstart = ($nstart * $pg_limit2) - $pg_limit2;
		$num_tmp2 = ($num_totrec2 / $rec_limit2);

		if ($nstart <= 1) {
			$pre = $_REQUEST['start']-1;
			$var_prevlink = "";
			//$var_prevlink ="<a tabindex=\"0\" class=\"previous paginate_button\" id=\"DataTables_Table_0_previous\" href=\"$var_self2$var_file_url&nstart=1&start=$pre&$var_filter2$var_sort_link$var_extra2\" >Previous</a>";
			
			$var_prevlink ="<a tabindex=\"0\" class=\"previous paginate_button\" id=\"DataTables_Table_0_previous\" href=\"javascript:void(0);\" onclick=\"second_level_load('$var_self2$var_file_url&nstart=1&start=$pre$var_sort_link$var_extra2');\" >Previous</a>";
			
		} else

			/*$var_prevlink = "<a tabindex=\"0\" class=\"first paginate_button paginate_button\" id=\"DataTables_Table_0_previous\" href=\"$var_self2$var_file_url&nstart=1&start=1$var_filter2$var_sort_link$var_extra2\">First</a>
							 <a tabindex=\"0\" class=\"previous paginate_button paginate_button\" id=\"DataTables_Table_0_previous\" href=\"$var_self2$var_file_url&nstart=$num_prevnstart&start=$num_prevstart$var_filter2$var_sort_link$var_extra2\">Previous</a>";*/
							 
			$var_prevlink = "<a tabindex=\"0\" class=\"first paginate_button paginate_button\" id=\"DataTables_Table_0_previous\" href=\"javascript:void(0);\" onclick=\"second_level_load('$var_self2$var_file_url&nstart=1&start=1$var_filter2$var_sort_link$var_extra2');\">First</a>
							 <a tabindex=\"0\" class=\"previous paginate_button paginate_button\" id=\"DataTables_Table_0_previous\" href=\"javascript:void(0);\" onclick=\"second_level_load('$var_self2$var_file_url&nstart=$num_prevnstart&start=$num_prevstart$var_filter2$var_sort_link$var_extra2');\">Previous</a>";				 
			
		$var_link2 .="<span>";
		for($i = 1;$i <= $num_pgs;$i++) {
			$num_start = $num_prevstart + $i;
			$num_nstart = $nstart + 1;
			if ($num_start == $start) $var_link2 .= "<a tabindex=\"0\" class=\"paginate_active\">$num_start</a> ";
			//ELSE $var_link2 .= "<a tabindex=\"0\" class=\"paginate_button\" href=\"$var_self2$var_file_url&nstart=$nstart&start=$num_start$var_filter2$var_sort_link$var_extra2\">$num_start</a>";
			
			ELSE $var_link2 .= "<a tabindex=\"0\" class=\"paginate_button\" href=\"javascript:void(0);\" onclick=\"second_level_load('$var_self2$var_file_url&nstart=$nstart&start=$num_start$var_filter2$var_sort_link$var_extra2');\">$num_start</a>";
		} 
		$var_link2 .="</span>";
		$num_start++;
		if ($var_flag != "0" and $var_flg2 != "2") {
		
			/*$var_link2 .= "<a tabindex=\"0\" class=\"next paginate_button\" id=\"DataTables_Table_0_next\" href=\"$var_self2$var_file_url&nstart=$num_nstart&start=$num_start$var_filter2$var_sort_link$var_extra2\"> Next</a>
				<a tabindex=\"0\" class=\"last paginate_button\" id=\"DataTables_Table_0_last\" href=\"$var_self2$var_file_url&nstart=$last_nstart&start=$last_start$var_filter2$var_sort_link$var_extra2\">Last</a>";*/
				
			$var_link2 .= "<a tabindex=\"0\" class=\"next paginate_button\" id=\"DataTables_Table_0_next\" href=\"javascript:void(0);\"  onclick=\"second_level_load('$var_self2$var_file_url&nstart=$num_nstart&start=$num_start$var_filter2$var_sort_link$var_extra2');\"> Next</a>
			
				<a tabindex=\"0\" class=\"last paginate_button\" id=\"DataTables_Table_0_last\" href=\"javascript:void(0);\"  onclick=\"second_level_load('$var_self2$var_file_url&nstart=$last_nstart&start=$last_start$var_filter2$var_sort_link$var_extra2');\">Last</a>";

				
				
		} else {
			$var_link2 .= "";
			//echo $_REQUEST['start'];
			//echo $num_pgs;
			$nxpage =$_REQUEST['start']+1;
			if($nxpage<=$num_pgs){
			
			// $var_link2 .= "<a tabindex=\"0\" class=\"next paginate_button\" href=\"$var_self2$var_file_url&nstart=1&start=$nxpage&$var_filter2$var_sort_link$var_extra2\">Next</a>";
			
			 $var_link2 .= "<a tabindex=\"0\" class=\"next paginate_button\" href=\"javascript:void(0);\" onclick=\"second_level_load(' $var_self2$var_file_url&nstart=1&start=$nxpage$var_sort_link$var_extra2');\">Next</a>";
			 }
		} 
		$page_link2 = "";
		if($var_prevlink!='')
		{
		$prepage =$_REQUEST['start']-1;
		if($prepage>=1){
			//$page_link2 .= "<a class=\"previous paginate_button paginate_button_disabled\" id=\"DataTables_Table_0_previous\" href=\"$var_self2$var_file_url&nstart=1&start=$prepage&$var_filter2$var_sort_link$var_extra2\">$var_prevlink</a>";
			$page_link2 .= $var_prevlink;
			}
		}
		if($var_link2!='')
		{
			$page_link2 .= "$var_link2";
		}
		
	} else {
		// IF NO RECORDS EXISTS!!
		$var_link2 = "";
	} 
} 
// if set the paging variables
if (isset($nstart)) $var_pgs = "&nstart=$nstart&start=$start"; //attach this with the sorting links  
// CODE FOR PAGING ENDS OVER HERE

//echo $var_limit2 . 'hi'; 
function createpagecombo1($arr=array()) {
	$par = '';
 	foreach($arr as $key=>$val){
		if($val !=""){
			$par .="&$key=$val";
		}
	}	 
	if(!isset($_REQUEST['n2'])) $_REQUEST['n2']=PAGE_COMBO;
	$page = '10,20,30,40,50,75,100';
	$pagearr=explode(",",$page);
	$selectstr = '';
	$selectstr = "<select name=\"n\" id=\"n\" onchange=\"custuom_paging('".$_REQUEST['file']."','".$par."')\">";
	for($r=0; $r<sizeof($pagearr); $r++) {
		if($_REQUEST['n2']==$pagearr[$r]) {
   			$selectstr .= '<option value="'.$pagearr[$r].'" selected>'.$pagearr[$r].'</option>';
		} else {
			$selectstr .= '<option value="'.$pagearr[$r].'">'.$pagearr[$r].'</option>';
		}
	}
    $selectstr .= '</select>';
	return $selectstr;
}

?>
