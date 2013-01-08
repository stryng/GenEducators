<?
//include(CLASS_PATH."DateInterval.class.php");
/*

			/////////////////////////////////////
			/// Funtion list and defination   ///
			/////////////////////////////////////

 0. getconfigure      -->  set the server setting value
 1. genrandomstring   --> It gives random sting . used in user regiter varification code 
 2. alert             -->  javascript alert using php function need alert some value just pass value
 3. currentdate_time  --> returns current time
 4. page_redirect     --> redirect page using javascript just provide page name
 5. curPageName       --> Retrun current page name
 6. price_format      --> return price in general format 
 7. check_value       --> check value if value exist in table or not
 8. get_single_value  -->  Retruns the column value from table for more please go to function defincation 
 9. image_resize      -->  resize and image (png,jpeg,gif)
 10. send_email       -->  Send eamil 
 11. strip_html_tags  -->  escape html tags
 12. string_limit_words --> Return Number of Words ::
 12. getdatescombo      --> Return Number of Words ::
 13. createYears        --> Return year drop down 
 14. createWeeks        --> Return week drop down 
 15. createMonths       --> Return month drop down  
 16. createMonths_int   --> Return month drop down in number format  
 17. createDays         --> Return days
 18. countrycombo1      --> Return country drop down
 19. statecombo1        --> Return state
 20. citycombo1         --> Return state list
 21. get_admin_menu_list  -- > retuent record set of admin menu list
 22. getcountryname       --> Get the country name
 23. getBrowser         --> Get the browser
 24. GeTitle            --> Get title drop down
 25  createDateRangeArray --> return the list of date between two dates in array
 26  timeIntervals        --> This function takes a start time, an end time, and an interval ("step size"). 
                              It returns an array of times separated by that interval between the start time and end time
*/



function getconfigure() 
{

	global $dbobj;
	$consql = array();
	$conquery = "SELECT * FROM system_config where sid=1";
	$consql = $dbobj->select($conquery);
	define('CONF_USERNAME', $consql[0]['user_name']);
	define('CONF_FIRSTNAME', $consql[0]['Con_FirstName']); // not in database
	define('CONF_LASTNAME', $consql[0]['Con_LastName']); // not in database
	define('CONF_EMAIL', $consql[0]['default_email']);
	define('CONF_METATITLE', $consql[0]['site_title']);
	define('CONF_METADESC', $consql[0]['meta_description']);
	define('CONF_METAKEYWORD', $consql[0]['meta_keyowrd']);
	define('CONF_FOOTERKEYWORD', $consql[0]['footer_keyword']); // not in database
	define('CONF_BOOKINGEMAIL', $consql[0]['Con_BookingEmail']); // not in database
}

define("WEEK_START", 0);
define("TITLE_CHAR_LIMIT", 37);
define("MAX_TITLES_DISPLAYED", 5);
define("TIME_DISPLAY_FORMAT", "12hr");
define("CURR_TIME_OFFSET", 0);

function getGUID(){
	if (function_exists('com_create_guid')){
		return com_create_guid();
	}else{
		mt_srand((double)microtime()*10000);//optional for php 4.2.0 and up.
		$charid = strtoupper(md5(uniqid(rand(), true)));
		$hyphen = chr(45);// "-"
		$uuid = chr(123)// "{"
		.substr($charid, 0, 8).$hyphen
		.substr($charid, 8, 4).$hyphen
		.substr($charid,12, 4).$hyphen
		.substr($charid,16, 4).$hyphen
		.substr($charid,20,12)
		.chr(125);// "}"
		return $uuid;
	}
}

function timeIntervals($starttime, $end_time, $interval)
{
  	/*$times = array();
    $intreval = 'PT'.strtoupper($interval);
	$starttime = $start_time;
	$time = new DateTime($starttime);
	
	$interval = new DateInterval($intreval);
	//print_r($interval); die;
	$temptime = $time->format('H:i:s');
	$inc = 0;
	do {
	 	$times[$inc] = $temptime;
		$time->add($interval);
	   	$temptime = $time->format('H:i:s');
		$inc++;
	} while ($temptime <= $end_time);
	
	return $times;*/
	$times = array();
	$meating_time = $interval;
	if (strpos($interval, 'h') && strpos($interval, 'm')) 
	{
		
		$times = explode('h',$interval);
		if(strlen($times[0]) <= 1){
			$times[0] = '0'.$times[0];
		}
		$intervals = '+'.$times[0].' hours '.str_replace('m',"",$times[1]).' minutes';
	} else {
		if (strpos($interval, 'h')) 
		{
			$times = explode('h',$interval);
			if(strlen($times[0]) <= 1){
				$times[0] = '0'.$times[0];
			}
			$intervals = '+'.$times[0].' hours ';
			
		}else if(strpos($interval, 'm')){
			$times = explode('m',$interval);
			$intervals = '+'.$times[0].' minutes ';
		}
	}
	
	$tStart = strtotime($starttime);
	$tEnd = strtotime($end_time);
	$tNow = $tStart;
	
	while($tNow <= $tEnd){
	  $times[$inc] =  date("H:i:s",$tNow);
	  $inc++;
	  $tNow = strtotime($intervals,$tNow);
	}
	return $times;
}
//=================== send mail page admin side usercombo=====================
function adminmembercombo() 
{
	global $dbobj;
	$query = "SELECT Email,UserId,concat(FirstName,' ',LastName) as fullname FROM userdetail ORDER BY UserId DESC";
	$membersql = $dbobj->select($query);
	//print_r($catsql);die;
	$memberstr = "<select data-placeholder=\"Select member...\" name=\"selmember[]\" id=\"txtselmember\" class=\"fullwidth select\" multiple=\"multiple\" tabindex=\"6\" >";
	//$memberstr .= '<option value="00"></option>';
	for($c=0; $c<count($membersql); $c++) {
		$memberstr .= '<option value="'.$membersql[$c]['UserId'].'">'.$membersql[$c]['Email'].' ( '.$membersql[$c]['fullname'].' )</option>';
	}
	$memberstr .= '</select>';
	return $memberstr;
}
function admincustomercombo() 
{
	global $dbobj;
	
	$query = "SELECT customer_id,concat(fname,' ',lname) as fullname,customer_id FROM customer_detail  ORDER BY customer_id DESC";
	
	//$query = "SELECT business_name,sp_id,concat(fname,' ',lname) as fullname FROM service_provider ORDER BY sp_id DESC";
	
	$membersql = $dbobj->select($query);
	//print_r($catsql);die;
	$memberstr = "<select data-placeholder=\"Select member...\" name=\"selmember[]\" id=\"txtselmember\" class=\"fullwidth select\" multiple=\"multiple\" tabindex=\"6\" >";
	//$memberstr .= '<option value="00"></option>';
	for($c=0; $c<count($membersql); $c++) {
		$memberstr .= '<option value="'.$membersql[$c][customer_id].'">'.$membersql[$c][fullname].'</option>';
	}
	$memberstr .= '</select>';
	return $memberstr;
}


function membercombo($uid="") 
{
	global $dbobj;
	//$query = "SELECT *,concat(firstname,' ',lastname) as fullname FROM userdetail where inviter = '".$uid."' ORDER BY userid DESC";
	$query = "SELECT business_name,sp_id,concat(fname,' ',lname) as fullname FROM service_provider ORDER BY sp_id DESC";
	$membersql = $dbobj->select($query);
	//print_r($catsql);die;
	$memberstr = "<select data-placeholder=\"Select member...\" name=\"selmember[]\" id=\"txtselmember\" class=\"fullwidth select\" multiple=\"multiple\" tabindex=\"6\" >";
	//$memberstr .= '<option value="00"></option>';
	for($c=0; $c<count($membersql); $c++) {
		$memberstr .= '<option value="'.$membersql[$c][userid].'">'.$membersql[$c][fullname].' ( '.$membersql[$c][username].' )</option>';
		/*if($catsql[$c][0]==$selectedcategory) {
			$categorystr .= '<option value="'.$membersql[$c][0].'" selected>'.$membersql[$c][2].'</option>';
		} else {
			$categorystr .= '<option value="'.$membersql[$c][0].'">'.$membersql[$c][2].'</option>';
		}*/
	}
	$memberstr .= '</select>';
	return $memberstr;
}
// Get contry name by id
function getcountryname($id="") 
{
		global $dbobj;
        $userquery = "SELECT Country_Name FROM country_master where Country_ID = '".$id."'";
		$city = $dbobj->select($userquery);
		return $city[0]['Country_Name'];
}
// Get contry drop down
function newcountrycombo($selectedcountry="",$onchangeevent="") {
	global $dbobj;

	if($selectedcountry == "" ) {
		$conquery = "SELECT * FROM country_master where default_country = '1' order by Country_Name ";
	}else{
		$conquery = "SELECT * FROM country_master where country_id = '".$selectedcountry."' order by Country_Name ";
	
	}
	
	$consql = $dbobj->select($conquery);
	if( $onchangeevent != "")
	{
		$countrystr = "<select name=\"selcountry\" class=\"email_input_fild_select\" id=\"selcountry\" ".$onchangeevent." >";
	}
	else
	{
		$countrystr = "<select name=\"selcountry\" class=\"email_input_fild_select\" id=\"selcountry\" >";
	}
	//$countrystr .= '<option value="" >Select Country</option>';
	for($c=0; $c<count($consql); $c++) {
		if($consql[$c][0]==$selectedcountry) {
			$countrystr .= '<option value="'.$consql[$c][0].'" selected>'.$consql[$c][1].'</option>';
		} else {
			$countrystr .= '<option value="'.$consql[$c][0].'">'.$consql[$c][1].'</option>';
		}
	}
	$countrystr .= '</select>';
	return $countrystr;
}



function createDateRangeArray($strDateFrom,$strDateTo)
{
    // takes two dates formatted as YYYY-MM-DD and creates an
    // inclusive array of the dates between the from and to dates.

    // could test validity of dates here but I'm already doing
    // that in the main script

    $aryRange=array();

    $iDateFrom=mktime(1,0,0,substr($strDateFrom,5,2),     substr($strDateFrom,8,2),substr($strDateFrom,0,4));
    $iDateTo=mktime(1,0,0,substr($strDateTo,5,2),     substr($strDateTo,8,2),substr($strDateTo,0,4));

    if ($iDateTo>=$iDateFrom)
    {
        array_push($aryRange,date('Y-m-d',$iDateFrom)); // first entry
        while ($iDateFrom<$iDateTo)
        {
            $iDateFrom+=86400; // add 24 hours
            array_push($aryRange,date('Y-m-d',$iDateFrom));
        }
    }
    return $aryRange;
}


// get country list
function newcountrycombo_admin($selectedcountry="",$onchangeevent="") {
	global $dbobj;

	$conquery = "SELECT * FROM country_master order by default_country DESC ";
	
	
	$consql = $dbobj->select($conquery);
   
	$countrystr = "<select name=\"Country\" class=\"email_input_fild_select\" id=\"Country\" $onchangeevent>";
	for($c=0; $c<count($consql); $c++) {
		if($consql[$c][0]==$selectedcountry) {
			$countrystr .= '<option value="'.$consql[$c][0].'" selected>'.$consql[$c][1].'</option>';
		} else {
			$countrystr .= '<option value="'.$consql[$c][0].'">'.$consql[$c][1].'</option>';
		}
	}
	$countrystr .= '</select>';
	return $countrystr;
}

// get State list
function newstatecombo_admin($countryID="",$selectedState="",$onchangeevent="") {
	global $dbobj;

	if($countryID == "" ) {
		$conquery = "SELECT state_id,state_name FROM state_master where 	default_state = '1' and Is_Delete = 'N' order by state_name ";
	}else{
		$conquery = "SELECT state_id,state_name FROM state_master where country_id = '".$countryID."'  and Is_Delete = 'N'  order by state_name ";
		//echo $conquery; die;
	}
	//echo $conquery; die;
	$consql = $dbobj->select($conquery);
	if( $onchangeevent != "")
	{
		$countrystr = "<select name=\"State\" class=\"email_input_fild_select\" id=\"State\" ".$onchangeevent." >";
	}
	else
	{
		$countrystr = "<select name=\"State\" class=\"email_input_fild_select\" id=\"State\" >";
	}
	//$countrystr .= '<option value="" >Select Country</option>';
	for($c=0; $c<count($consql); $c++) {
		if($consql[$c][0]==$selectedState) {
			$countrystr .= '<option value="'.$consql[$c][0].'" selected>'.$consql[$c][1].'</option>';
		} else {
			$countrystr .= '<option value="'.$consql[$c][0].'">'.$consql[$c][1].'</option>';
		}
	}
	$countrystr .= '</select>';
	return $countrystr;
}
// get city list
function newcitycombo_admin($countryID="",$State="",$selectedcity="",$onchangeevent="")
{
	global $dbobj;

	
	
	if($countryID == "" && $State == "") {
		//$conquery = "SELECT state_id,state_name FROM state_master where 	default_state = '1' and Is_Delete = 'N' order by state_name ";
		$conquery = "SELECT city_id,city_name FROM city_master order by default_city DESC ";
	}else{
		//$conquery = "SELECT state_id,state_name FROM state_master where country_id = '".$countryID."'  and Is_Delete = 'N'  order by state_name ";
		$conquery = "SELECT city_id,city_name FROM city_master where country_id = '".$countryID."' and state_id = '".$State."'  order by default_city DESC ";
		//echo $conquery; die;
	}
	$consql = $dbobj->select($conquery);
   
	$countrystr = "<select name=\"City\" class=\"email_input_fild_select\" id=\"City\" $onchangeevent>";
	for($c=0; $c<count($consql); $c++) {
		if($consql[$c][0]==$selectedcountry) {
			$countrystr .= '<option value="'.$consql[$c][0].'" selected>'.$consql[$c][1].'</option>';
		} else {
			$countrystr .= '<option value="'.$consql[$c][0].'">'.$consql[$c][1].'</option>';
		}
	}
	$countrystr .= '</select>';
	return $countrystr;
	
}
function GeTitle($selected)
{
	$title = array("Select","Mr","Mrs","Miss","Ms","Dr");
	//print_r($title);
	$countrystr = "<select name=\"contact_title\"  id=\"contact_title\" >";
	for($c=0; $c<count($title); $c++) {
		if($title[$c]==$selected) {
			$countrystr .= '<option value="'.$title[$c].'" selected>'.$title[$c].'</option>';
		} else {
			$countrystr .= '<option value="'.$title[$c].'">'.$title[$c].'</option>';
		}
	}
	$countrystr .= '</select>';
	return $countrystr;
}
// Make randon number
	function genrandomstring($length = 8, $seeds = 'alphanum')
{
	$seedings['alpha'] = 'abcdefghijklmnopqrstuvwqyz';
	$seedings['numeric'] = '0123456789';
	$seedings['alphanum'] = 'abcdefghijklmnopqrstuvwqyz0123456789';
	$seedings['hexidec'] = '0123456789abcdef';
	
	if (isset($seedings[$seeds]))
	{
		$seeds = $seedings[$seeds];
	}
	
	list($usec, $sec) = explode(' ', microtime());
	$seed = (float) $sec + ((float) $usec * 100000);
	mt_srand($seed);
	$str = '';
	$seeds_count = strlen($seeds);
	for ($i = 0; $length > $i; $i++)
	{
		$str .= $seeds{mt_rand(0, $seeds_count - 1)};
	}
	return strtoupper($str);
}
function get_dayhrmin($minutes){
		
		$res[0] = floor ($minutes / 1440);
		$res[1] = floor (($minutes - $d * 1440) / 60);
		$res[2] = $minutes - ($d * 1440) - ($h * 60);
		//print_r($res); die;
		return  $res;
}
function get_coder($length){
	return strtoupper(substr(md5(uniqid(rand(), true)),$length, $length));
}
function getBrowser() 
{
		 
		$u_agent = $_SERVER['HTTP_USER_AGENT']; 
		$bname = 'Unknown';
		$platform = 'Unknown';
		$version= "";
		
		//First get the platform?
		if (preg_match('/linux/i', $u_agent)) {
		$platform = 'linux';
		}
		elseif (preg_match('/macintosh|mac os x/i', $u_agent)) {
		$platform = 'mac';
		}
		elseif (preg_match('/windows|win32/i', $u_agent)) {
		$platform = 'windows';
		}
		
		// Next get the name of the useragent yes seperately and for good reason
		if(preg_match('/MSIE/i',$u_agent) && !preg_match('/Opera/i',$u_agent)) 
		{ 
		$bname = 'Internet Explorer'; 
		$ub = "MSIE"; 
		} 
		elseif(preg_match('/Firefox/i',$u_agent)) 
		{ 
		$bname = 'Mozilla Firefox'; 
		$ub = "Firefox"; 
		} 
		elseif(preg_match('/Chrome/i',$u_agent)) 
		{ 
		$bname = 'Google Chrome'; 
		$ub = "Chrome"; 
		} 
		elseif(preg_match('/Safari/i',$u_agent)) 
		{ 
		$bname = 'Apple Safari'; 
		$ub = "Safari"; 
		} 
		elseif(preg_match('/Opera/i',$u_agent)) 
		{ 
		$bname = 'Opera'; 
		$ub = "Opera"; 
		} 
		elseif(preg_match('/Netscape/i',$u_agent)) 
		{ 
		$bname = 'Netscape'; 
		$ub = "Netscape"; 
		} 
		
		// finally get the correct version number
		$known = array('Version', $ub, 'other');
		$pattern = '#(?<browser>' . join('|', $known) .
		')[/ ]+(?<version>[0-9.|a-zA-Z.]*)#';
		if (!preg_match_all($pattern, $u_agent, $matches)) {
		// we have no matching number just continue
		}
		
		// see how many we have
		$i = count($matches['browser']);
		if ($i != 1) {
		//we will have two since we are not using 'other' argument yet
		//see if version is before or after the name
		if (strripos($u_agent,"Version") < strripos($u_agent,$ub)){
		$version= $matches['version'][0];
		}
		else {
		$version= $matches['version'][1];
		}
		}
		else {
		$version= $matches['version'][0];
		}
		
		// check if we have a number
		if ($version==null || $version=="") {$version="?";}
		
		return array(
		'userAgent' => $u_agent,
		'name'      => $bname,
		'version'   => $version,
		'platform'  => $platform,
		'pattern'    => $pattern
		);
} 
// Alert Message
	function alert($message)
{
	echo "<script>";
	echo "alert('$message');";
	echo "</script>";
}

// current time
	function currentdate_time()
{
	$time_now=mktime(date('h')+5,date('i')+30,date('s'));
	$dt = date('d-m-Y h:i:s A',$time_now);
	return $dt;
}

// Page Redirect
	function page_redirect($page)
{
	print "<script>";
	print "top.location = '$page'";
	print "</script>";
}

//Currrnt Page Name
	function curPageName()
{return substr($_SERVER["SCRIPT_NAME"],strrpos($_SERVER["SCRIPT_NAME"],"/")+1);}

//Price Format
	function price_format($price_val) 
{
	$final_price=number_format($price_val,2);
	return '£'.$final_price;
}

//Check Vlaue for email avalabile or not
	function check_value($table,$col,$val)
	{
		$r = "";
		$sql="select * from $table where $col = '$val' ";
		$ref= mysql_query($sql) or die(" :: ERROR ::".mysql_error());
		$num = mysql_num_rows($ref);
		if($num > 0)
		{
			$r = "0";
		}
		else
		{
			$r = "1";
		}
		return $r;
	}
	
	function check_email_address($Email,$customer_detail="true",$service_provider="true",$sp_staff_detail_login_email="true",$sp_staff_detail_email="true")
	{
		$result = array();
		//$result[0] == Messgae , $result[1] == TableName in which match Accurs  ,$result[2] == field name    
		if($customer_detail=="true")
		{
			$sql="SELECT * FROM customer_detail WHERE `email` = '".$Email."'";
			$ref= mysql_query($sql) or die(" :: ERROR ::".mysql_error());
			$num = mysql_num_rows($ref);
			if($num > 0)
			{
				$result[0] = "EXIST";
				$result[1] = "customer_detail";
				$result[2] = "email";
			}
		}
		if($service_provider=="true")
		{
			$sql="SELECT * FROM service_provider WHERE email = '".$Email."'";
			$ref= mysql_query($sql) or die(" :: ERROR ::".mysql_error());
			$num = mysql_num_rows($ref);
			if($num > 0)
			{
				$result[0] = "EXIST";
				$result[1] = "service_provider";
				$result[2] = "email";
			}
		}
		if($sp_staff_detail_login_email=="true")
		{
			$sql="SELECT * FROM sp_staff_detail WHERE login_email = '".$Email."'";
			$ref= mysql_query($sql) or die(" :: ERROR ::".mysql_error());
			$num = mysql_num_rows($ref);
			if($num > 0)
			{
				$result[0] = "EXIST";
				$result[1] = "sp_staff_detail";
				$result[2] = "login_email";
			}
		}
		if($sp_staff_detail_email =="true")
		{
			$sql="SELECT * FROM sp_staff_detail WHERE email = '".$Email."'";
			$ref= mysql_query($sql) or die(" :: ERROR ::".mysql_error());
			$num = mysql_num_rows($ref);
			if($num > 0)
			{
				$result[0] = "EXIST";
				$result[1] = "sp_staff_detail";
				$result[2] = "email";
			}
		}
		if(empty($result))
		{
			$result[0] = "NOT-EXIST";
		}
		return $result;
	}


// get table coumn value
	function get_single_value($table_col,$table_name,$comp_field,$field_val) 
{
	
	global $dbobj;
	$query = "SELECT $table_col FROM $table_name where $comp_field='".$field_val."'";
	$sql = $dbobj->select($query);
	//echo $sql[0][0]."asds"; die;
	if(empty($sql)) {
		return '';
	} else {
		return $sql[0][0];
	}
	
}

// resize image and crop
function image_resize($filename,$path,$width,$height) {

	getimagesize($filename);
	list($width_orig, $height_orig) = getimagesize($filename);
	
	$ratio_orig = $width_orig/$height_orig;

	if ($width/$height > $ratio_orig) {
	   $width = $height*$ratio_orig;
	} else {
	   $height = $width/$ratio_orig;
	}
	
	$length=strlen($filename);
	$name=substr($filename,$length-3,$length);
	
	$image_p = imagecreatetruecolor($width, $height);

	if($name=='jpg' || $name=='JPG' || $name=='peg' || $name=='PEG' || $name=='PJPEG' || $name=='pjpeg') {
		
		ini_set("memory_limit","150M");
		$image = imagecreatefromjpeg($filename);
		imagecopyresampled($image_p, $image, 0, 0, 0, 0, $width, $height, $width_orig, $height_orig);
		
		
		imagejpeg($image_p, $path);

	} else if($name=='png' || $name=='PNG' || $name=='x-png' || $name=='X-PNG')
	{
		ini_set("memory_limit","150M");
		
		$image = imagecreatefrompng($filename);
		setTransparency_gen($image,$image_p,$name);
		//echo "$image_p, $image, 0, 0, 0, 0, $width, $height, $width_orig, $height_orig";
		imagecopyresampled($image_p, $image, 0, 0, 0, 0, $width, $height, $width_orig, $height_orig);
		imagepng($image_p, $path);
	}
	else {
		ini_set("memory_limit","150M");
		$image = imagecreatefromgif($filename);
		imagecopyresampled($image_p, $image, 0, 0, 0, 0, $width, $height, $width_orig, $height_orig);
		imagegif($image_p, $path);
	}
}

// send eamil
	function send_email($to, $from, $subject,$message,$attachments)
{
	$headers = "From: "."<".$from.">\n";
	$headers .= "Reply-To: "."<".$from.">\n";
	$headers .= "Return-Path: "."<".$from.">\n";
	$headers .= "Message-ID: <".time()."-".$from.">\n";
	$headers .= 'Cc:salim@vcantech.com' . "\r\n";
	$headers .= "X-Mailer: PHP v".phpversion();
	$email_txt = $message;
	$semi_rand = md5(time());
	$mime_boundary = "==Multipart_Boundary_x{$semi_rand}x";
	$headers .= "\nMIME-Version: 1.0\n" .
	"Content-Type: multipart/mixed;\n" .
	" boundary=\"{$mime_boundary}\"";
	$email_txt .= $msg_txt;
	$email_message .= "This is a multi-part message in MIME format.\n\n" .
	"--{$mime_boundary}\n" .
	"Content-Type:text/html; charset=\"iso-8859-1\"\n" .
	"Content-Transfer-Encoding: 7bit\n\n" .
	$email_txt . "\n\n";
	for($i=0; $i < count($attachments); $i++)
	{
		if (is_file($attachments[$i]))
		{
			
			$fileatt = $attachments[$i];
			$fileatt_type = "application/octet-stream";
			$start= strrpos($attachments[$i], '/') == -1 ? strrpos($attachments[$i], '//') : strrpos($attachments[$i], '/')+1;
			$fileatt_name = substr($attachments[$i], $start, strlen($attachments[$i]));
			$file = fopen($fileatt,'rb');
			$data = fread($file,filesize($fileatt));
			fclose($file);
			$data = chunk_split(base64_encode($data));
			$email_message .= "--{$mime_boundary}\n" .
			"Content-Type: {$fileatt_type};\n" .
			" name=\"{$fileatt_name}\"\n" .
			"Content-Transfer-Encoding: base64\n\n" .
			$data . "\n\n";
		}
	}
	$email_message .= "--{$mime_boundary}--\n";
	return @mail($to, $subject, $email_message, $headers);
}

//Check Input string : if nay HTML and Special Character then Remove
function input_string_check($text){
	return strip_tags(mysql_escape_string($text));	
}

 

// replace html tage
function strip_html_tags($text)
{
	
	$text = preg_replace(
	array(
	
	'@<head[^>]*?>.*?</head>@siu',
	
	'@<style[^>]*?>.*?</style>@siu',
	
	'@<script[^>]*?.*?</script>@siu',
	
	'@<object[^>]*?.*?</object>@siu',
	
	'@<embed[^>]*?.*?</embed>@siu',
	
	'@<applet[^>]*?.*?</applet>@siu',
	
	'@<noframes[^>]*?.*?</noframes>@siu',
	
	'@<noscript[^>]*?.*?</noscript>@siu',
	
	'@<noembed[^>]*?.*?</noembed>@siu',
	
	// Add line breaks before and after blocks
	
	'@</?((address)|(blockquote)|(center)|(del))@iu',
	
	'@</?((div)|(h[1-9])|(ins)|(isindex)|(p)|(pre))@iu',
	
	'@</?((dir)|(dl)|(dt)|(dd)|(li)|(menu)|(ol)|(ul))@iu',
	
	'@</?((table)|(th)|(td)|(caption))@iu',
	
	'@</?((form)|(button)|(fieldset)|(legend)|(input))@iu',
	
	'@</?((label)|(select)|(optgroup)|(option)|(textarea))@iu',
	
	'@</?((frameset)|(frame)|(iframe))@iu',
	
	),
	
	array(
	
	' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ',
	
	"\n\$0", "\n\$0", "\n\$0", "\n\$0", "\n\$0", "\n\$0",
	
	"\n\$0", "\n\$0",
	
	),
	
	$text );
	
	echo strip_tags( $text );

}

	// String Limit Words :: Return Number of Words ::
	function string_limit_words($string, $word_limit) 
{
	$words = explode(' ', $string);
	return implode(' ', array_slice($words, 0, $word_limit));
	}
	// Get File Extension ::
	function get_file_extension($file_name)
	{
	return substr(strrchr($file_name,'.'),1);
}





	function getdatescombo()
{
	
	$year=date('Y');

	$curmnth=date('m');
        $select = "<select name=\"day_select\" id=\"day_select\" class=\"textfield\">\n";

	for($i=$curmnth;$i<=12;$i++) {
		$month=$i;

		$TotDay=cal_days_in_month(CAL_GREGORIAN, $month, $year);

        $r = range(1, $TotDay);

        /*** current day ***/
        $selected = is_null($selected) ? date('d') : $selected;

        foreach ($r as $day)
        {

          $wday=date("w", mktime(0, 0,0,$month, $day, $year));
		  $mnth= 	date('F', mktime(0,0,0,$month));
		  if($wday==6){


			 $day_fin=(strlen($day)==1) ? '0'.$day : $day;
				$select .= "<option value=\"$day $mnth $year\"";
        	 //   $select .= ($day==$selected) ? ' selected="selected"' : '';
            	$select .= ">".$day_fin." ".$mnth." ".$year."</option>\n";
				//echo $day_fin." ".$mnth." ".$year."<br>";
			}
        }

		//echo "<br>";
		}

      $select .= '</select>';
	echo $select;
}


	function createYears($start_year, $end_year, $id='year_select', $selected, $para='') 
{
	

        /*** the current year ***/
        $selected = is_null($selected) ? date('Y') : $selected;

        /*** range of years ***/
        $r = range($start_year, $end_year);

        /*** create the select ***/
        $select = '<select name="'.$id.'" id="'.$id.'" class="dropdown" "'.$para.'">';
        foreach( $r as $year )
        {
            $select .= "<option value=\"$year\"";
            $select .= ($year==$selected) ? ' selected="selected"' : '';
            $select .= ">$year</option>\n";
        }
        $select .= '</select>';
        return $select;
}

	function createWeeks($start_year, $end_year, $id='week_select', $selected, $para='') 
{
	

        /*** the current year ***/
       // $selected = is_null($selected) ? date('W') : $selected;

        /*** range of years ***/
        $r = range($start_year, $end_year);

        /*** create the select ***/
        $select = '<select name="'.$id.'" id="'.$id.'" class="dropdown" "'.$para.'">';
        foreach( $r as $year )
        {
            $select .= "<option value=\"$year\"";
            $select .= ($year==$selected) ? ' selected="selected"' : '';
            $select .= ">$year</option>\n";
        }
        $select .= '</select>';
        return $select;
}

	function createMonths($id='month_select', $selected=null, $para='')  
{
	
        /*** array of months ***/
        $months = array(
                1=>'January',
                2=>'February',
                3=>'March',
                4=>'April',
                5=>'May',
                6=>'June',
                7=>'July',
                8=>'August',
                9=>'September',
                10=>'October',
                11=>'November',
                12=>'December');

        /*** current month ***/
        $selected = is_null($selected) ? date('m') : $selected;

        $select = '<select name="'.$id.'" id="'.$id.'" class="textfield" "'.$para.'">'."\n";
        foreach($months as $key=>$mon)
        {
            $key_fin=(strlen($key)==1) ? '0'.$key : $key;
			$select .= "<option value=\"$key_fin\"";
            $select .= ($key==$selected) ? ' selected="selected"' : '';
            $select .= ">$mon</option>\n";
        }
        $select .= '</select>';
        return $select;
}

	function createMonths_int($id='month_int_select', $selected=null)  
{
	
        /*** array of months ***/
        $months = array(
                1=>'January',
                2=>'February',
                3=>'March',
                4=>'April',
                5=>'May',
                6=>'June',
                7=>'July',
                8=>'August',
                9=>'September',
                10=>'October',
                11=>'November',
                12=>'December');

        /*** current month ***/
        $selected = is_null($selected) ? date('m') : $selected;

        $select = '<select name="'.$id.'" id="'.$id.'" class="textfield">'."\n";
        foreach($months as $key=>$mon)
        {
            $key_fin=(strlen($key)==1) ? '0'.$key : $key;
			$select .= "<option value=\"$key_fin\"";
            $select .= ($key==$selected) ? ' selected="selected"' : '';
            $select .= ">$key</option>\n";
        }
        $select .= '</select>';
        return $select;
}

	function createDays($id='day_select', $selected=null)
{
	
        /*** range of days ***/
        $r = range(1, 31);

        /*** current day ***/
        $selected = is_null($selected) ? date('d') : $selected;

        $select = "<select name=\"$id\" id=\"$id\">\n";
        foreach ($r as $day)
        {
            $day_fin=(strlen($day)==1) ? '0'.$day : $day;
			$select .= "<option value=\"$day_fin\"";
            $select .= ($day==$selected) ? ' selected="selected"' : '';
            $select .= ">$day</option>\n";
        }
        $select .= '</select>';
        return $select;
}

	function countrycombo1($selectedcountry="") 
{
	
	global $dbobj;
	if($selectedcountry=="") {
	$selectedcountry=VARIABLE_USA;
	}

	$conquery = "SELECT * FROM country where Cou_Status='Active' and Cou_DeleteFlag='No' order by Cou_Name";
	$consql = $dbobj->select($conquery);
	$countrystr = "<select name=\"selcountry1\" class=\"textfield\" id=\"selcountry1\" onchange=\"xajax_get_state1(this)\">";
	$countrystr .= '<option value="">Select Country</option>';
	$sel=$selectedcountry=='all' ? 'selected' : '';
	$countrystr .= '<option value="all" "'.$sel.'">All</option>';
	for($c=0; $c<count($consql); $c++) {
		if($consql[$c][0]==$selectedcountry) {
			$countrystr .= '<option value="'.$consql[$c][0].'" selected>'.$consql[$c][1].'</option>';
		} else {
			$countrystr .= '<option value="'.$consql[$c][0].'">'.$consql[$c][1].'</option>';
		}
	}
	$countrystr .= '</select>';
	return $countrystr;
}

	function statecombo1($selectedcou="",$selectedstate="") 
{
	
	global $dbobj;

	if($selectedcou!='all') {
	$statequery = "SELECT * FROM county where county_Status='Active' and county_DeleteFlag='No' and county_cou='".$selectedcou."' order by county_Name";
	} else {
	$statequery = "SELECT * FROM county where county_Status='Active' and county_DeleteFlag='No' order by county_Name";
	}
	$statesql = $dbobj->select($statequery);
	$statestr = "<select name=\"selstate1\" class=\"textfield\" id=\"selstate1\">";
	$statestr .= '<option value="">Select County</option>';
	$sel_state=$selectedstate=='all' ? 'selected' : '';
	$statestr .= '<option value="all" "'.$sel_state.'">All</option>';
	for($c=0; $c<count($statesql); $c++) {
		if($statesql[$c][0]==$selectedstate) {
			$statestr .= '<option value="'.$statesql[$c][0].'" selected>'.$statesql[$c][1].'</option>';
		} else {
			$statestr .= '<option value="'.$statesql[$c][0].'">'.$statesql[$c][1].'</option>';
		}
	}
	$statestr .= '</select>';
	return $statestr;
}
	function citycombo1($selectedcity="") 
{
	
		global $dbobj;
        $conquery = "SELECT * FROM city_master order by city_name";
		$consql = $dbobj->select($conquery);
		$cityrystr = "<select name=\"txtcity\" id=\"txtcity\">";
		$cityrystr .= '<option value="" >Select City</option>';
		for($c=0; $c<count($consql); $c++) 
		{
			if($consql[$c][0]==$selectedcity) 
			{
				$cityrystr .= '<option value="'.$consql[$c][0].'" selected>'.$consql[$c][2].'</option>';
			 } 
			else 
			{
				$cityrystr .= '<option value="'.$consql[$c][0].'">'.$consql[$c][2].'</option>';
			}
		}
		$cityrystr .= '</select>';
		
		return $cityrystr;
	
}

	function date_format_display($val) 
	{
		if(!empty($val)) {
		$final=explode("-",$val);
		$final_display=$final[2]."-".$final[1]."-".$final[0];
		return $final_display;
		}
	}

	function date_format_db($val_db) 
{
	if(!empty($val_db)) {
	$final_bd=explode("-",$val_db);
	$final_display_db=$final_bd[2]."-".$final_bd[1]."-".$final_bd[0];
	return $final_display_db;
	}
}



// get category combo
	function newcategorycombo($selectedcategory="") 
{
	
	
	global $dbobj;

	$catquery = "SELECT * FROM category_master order by category_name";
	$catsql = $dbobj->select($catquery);
	$categorystr = "<select name=\"selcategory\"  id=\"selcategory\" >";
	$categorystr .= '<option value="" >Select Category</option>';
	for($c=0; $c<count($catsql); $c++) {
		if($catsql[$c][0]==$selectedcategory) {
			$categorystr .= '<option value="'.$catsql[$c][0].'" selected>'.$catsql[$c][2].'</option>';
		} else {
			$categorystr .= '<option value="'.$catsql[$c][0].'">'.$catsql[$c][2].'</option>';
		}
	}
	$categorystr .= '</select>';
	return $categorystr;
}

//Insert Query Function working
function  fnunction_insert_query($tname , $fieldsand_values , $pk="")
{ 
	$insert_query = "";
	$insert_query = "INSERT INTO $tname SET ";
	$ins_val = "";
	$ins_col = "";
	foreach($fieldsand_values as $fieldname => $its_value)
	{
			if($fieldname != $pk)
			{
				$ins_col = $fieldname."="."'".mysql_real_escape_string($its_value)."' ,";
				$insert_query .= $ins_col;
			}
	}
	
	$insert_query = substr($insert_query,0,-1);
	//echo $insert_query;
	return mysql_query($insert_query);
}
//UPDATE Query Function working
function  fnunction_update_query($tname , $fieldsand_values , $pk="")
{ 
	$update_query = "";
	$update_query = "UPDATE $tname SET ";
	$ins_val = "";
	$ins_col = "";
	foreach($fieldsand_values as $fieldname => $its_value)
	{
			if($fieldname != $pk)
			{
				$ins_col = $fieldname."="."'".mysql_real_escape_string($its_value)."' ,";
				$update_query .= $ins_col;
			}
	}

	$update_query = substr($update_query,0,-1);
	
	$ins_col = " where ".$pk."="."'".mysql_real_escape_string($fieldsand_values[$pk])."'";
	$update_query .= $ins_col;
	//die;
	//echo $update_query;
	return mysql_query($update_query);
}

//Insert Query Function
function  fn_insert_query($tname , $pk , $fields)
{ 
	$insert_query = "";		
	$insert_query = "INSERT INTO $tname SET ";
	$ins_val = "";
	$ins_col = "";
	$f1 = explode("|",$fields);
	foreach($f1 as $v1)
	{
			if($v1 != $pk)
			{	
				$ins_col = $v1."="."'$".$v1."' ,";
				$insert_query .= $ins_col;
			}
	}
	
	$insert_query = substr($insert_query,0,-1);
	return $insert_query;
}
	
 // Update Query Function :: 
	function  fn_update_query($tname , $pk , $fields)
{
		$update_query = "";
		$update_query = "UPDATE $tname SET ";
		$up_val = "";
		$up_col = "";
		$up_where = "";
		$f2 = explode("|",$fields);
		foreach($f2 as $v2)
		{
				if($v2 != $pk)
				{						
		  			$up_col = $v2."="."'$".$v2."' ,";	 			 
					$update_query .= $up_col;				
					
				}	
		}	
			
		$update_query = substr($update_query,0,-1); 		
		$up_where = " WHERE ".$pk."="."'$".$pk."' ,";
		$update_query = $update_query.$up_where;
		$update_query = substr($update_query,0,-1); 		
		return $update_query;	    
}
	

	
//Upload File 

	function uploadfile($temp,$filename,$path)
{			
		move_uploaded_file($temp,$path.$filename);	
		return "<br>".$path.$filename."<br>";
}
	


//GET ROW FROM ANOTHER WHERE ID IS SAME
function getRow($table,$pk,$pkvalue,$returnvlue="")

{
		if($table != "" && $pk != "" && $pkvalue != "")
			$sqlRow = 'select * from '.$table.' where '.$pk.' = '.$pkvalue;
			$recRow = mysql_query($sqlRow) or die(mysql_error());
			$rowRow = mysql_fetch_array($recRow);
		if($returnvlue)
			return $rowRow[$returnvlue];
		else
			return $rowRow;
}		






	//Function for fetching data from another table
	function FindFileExt($filename)
{
	

	$filename = stripslashes($filename);

    $i = strrpos($filename,".");

    if (!$i) { return ""; }

    $l = strlen($filename) - $i;

    $extension = substr($filename,$i+1,$l);

	echo $extension = strtolower($extension);

}	

	//Get Current Time 
	function getCurrentTime()
{
	

	$time_now=mktime(date('h')+5,date('i')+30,date('s'));

	$time=date('jS M, Y')." " .date('h:i:s A',$time_now);

	return $time;

}



function encode_decode_process($data,$type) 
{
	 

	$pwd=$_SESSION["SecurityLogin"];

	$pwd_length = strlen($pwd); 

    for ($i = 0; $i < 255; $i++) 

	{ 

        $key[$i] = ord(substr($pwd, ($i % $pwd_length)+1, 1)); 

        $counter[$i] = $i; 

    } 

    for ($i = 0; $i < 255; $i++) 

	{ 

        $x = ($x + $counter[$i] + $key[$i]) % 256; 

        $temp_swap = $counter[$i]; 

        $counter[$i] = $counter[$x]; 

        $counter[$x] = $temp_swap; 

    } 

	if($type == 'encode') $datacnt=strlen($data)+5; 

	else if($type == 'decode') $datacnt=strlen($data)-5;

	else $datacnt=strlen($data);

	for ($i = 0; $i < $datacnt; $i++) 

	{ 

        $a = ($a + 1) % 256; 

        $j = ($j + $counter[$a]) % 256; 

        $temp = $counter[$a]; 

        $counter[$a] = $counter[$j]; 

        $counter[$j] = $temp; 

        $k = $counter[(($counter[$a] + $counter[$j]) % 256)]; 

        $Zcipher = ord(substr($data, $i, 1)) ^ $k; 

        $Zcrypt .= chr($Zcipher); 

    }

	return $Zcrypt; 

} 

//UPLOAD PDF DOC DOCX files

function uploadTextFile($temp,$path) 

{
		

	move_uploaded_file($temp,$path);

}

//FILE EXTENTION
function findexts ($filename) 

{
	 

	 $filename = strtolower($filename) ; 

	 $exts = split("[/\\.]", $filename) ; 

	 $n = count($exts)-1; 

	 $exts = $exts[$n]; 

	 return $exts; 

} 


function encrypt($string, $key) 
{
		
	$result = '';
	for($i=0; $i<strlen($string); $i++) {
	$char = substr($string, $i, 1);
	$keychar = substr($key, ($i % strlen($key))-1, 1);
	$char = chr(ord($char)+ord($keychar));
	$result.=$char;
	}
	
	return base64_encode($result);
}

function decrypt($string, $key) 
{
		
	$result = '';
	$string = base64_decode($string);
	
	for($i=0; $i<strlen($string); $i++) {
	$char = substr($string, $i, 1);
	$keychar = substr($key, ($i % strlen($key))-1, 1);
	$char = chr(ord($char)-ord($keychar));
	$result.=$char;
	}
	
	return $result;
} 
//========== blow code is for affiliworx starting to add on 15-12-2012 ======================
?>
