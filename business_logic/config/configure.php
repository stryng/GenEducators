<?php
	#####################################
	#  Session Setting					#
	#####################################
	
	session_start();

	#####################################
	#  Database Configration			#
	#####################################
	
	define('DB_SERVER','localhost');
	define('DB_USERNAME','root');
	define('DB_PASSWORD','slackware');
	define('DB_DATABASE','geneduca_educa');

	#####################################
	#  Site Configration				#
	#####################################
	$host =  $_SERVER['HTTP_HOST'];
	if($host=="www.geneducators.com")
	{
		define('SERVER_URL','http://www.geneducators.com/');
		define('SERVER_PATH','/opt/lampp/htdocs/geneducators/');
		define('HTTP_URL','http://www.geneducators.com/');
		define('HTTPS_URL','http://www.geneducators.com/');
	}
	else
	{
		?>
		<script type="text/javascript" language="javascript">
		window.location = "http://www.geneducators.com/"
		</script>
		<?
		die();
	}
	
	//define('MOBILE_URL','http://192.168.1.116/affiliworx_newone/mobile/');
	
	define('ADMIN_URL',SERVER_URL.'webadmin/');
	define('ADMIN_PATH',SERVER_PATH.'webadmin/');
	
	define('MEMBER_URL',SERVER_URL.'member/');
	define('MEMBER_PATH',SERVER_PATH.'member/');
	
	define('WEB_URL',SERVER_URL.'/');
	define('WEB_PATH',SERVER_PATH.'/');

	
	
	define('FUNCTION_PATH',SERVER_PATH.'business_logic/function/');
	define('CLASS_PATH',SERVER_PATH.'business_logic/class/');
	define('CONFIG_PATH',SERVER_PATH.'business_logic/config/');
	
	define('JAVASCRIPT_PATH',SERVER_PATH.'js/');
	define("ADMIN_IMAGES_PATH", ADMIN_PATH.'images/');
	define("RIGHT_SECTION",SERVER_PATH.'right/');
	define("BOTTOM_SECTION",SERVER_PATH.'bottom/');
	
	define("AP_URL","https://sandbox.Payza.com/sandbox/payprocess.aspx");
	define("AP_MERCHANT","seller_1_minesh.patel@spaculus.com");

	define("STP_URL","https://solidtrustpay.com/htdocs/handle.php");
	define("STP_MERCHANT","2gether");
	define("CONF_METATITLE","Affiliworx");
	
	#####################################
	#  image upload Path               	#
	#####################################

	
	define("IMAGE_PATH",SERVER_PATH."upload/");
	define("IMAGE_URL",SERVER_URL."upload/");
	
	#####################################
	#  Include File Settings			#
	#####################################

	include_once CLASS_PATH.'dbclass.php';
	$dbobj = new dbclass;
	
	include_once FUNCTION_PATH.'function.php';
	
	
	#####################################
	#  site configuration           	#
	#####################################
	
	date_default_timezone_set("Asia/Kolkata");
	$query = "select * from site_settings where enable_disable = 'Active'";
	$sql = $dbobj->select($query);
	//print_r($sql); die;
	for($i=0;$i<count($sql);$i++)
	{
		if($sql[$i]['setting_type'] == "Maximum Appointment per Day")
		{
			define('MAX_APPOINTMENT_PER_DAY', $sql[$i]['setting_value']);
		}
		if($sql[$i]['setting_type'] == "Currency")
		{
			define("CURRENCY",$sql[$i]['setting_value']);
		}
		if($sql[$i]['setting_type'] == "Time Zone")
		{
			date_default_timezone_set($sql[$i]['setting_value']);
		}
		if($sql[$i]['setting_type'] == "Key For Google Map")
		{
			define("G_MAP_API",$sql[$i]['setting_value']);
		}
		if($sql[$i]['setting_type'] == "FB Key")
		{
			define("FB_KEY",$sql[$i]['setting_value']);
		}
		if($sql[$i]['setting_type'] == "FB Page")
		{
			define("FB_PAGE",$sql[$i]['setting_value']);
		}
		if($sql[$i]['setting_type'] == "Twitter Key")
		{
			define("TWITTER_KEY",$sql[$i]['setting_value']);
		}
		if($sql[$i]['setting_type'] == "Footer Site Link")
		{
			define("FOOTER_SITE_LINK",$sql[$i]['setting_value']);
		}
		if($sql[$i]['setting_type'] == "Footer Site Name")
		{
			define("FOOTER_SITE_NAME",$sql[$i]['setting_value']);
		}
		if($sql[$i]['setting_type'] == "copy_right")
		{
			define("COPY_RIGHT",$sql[$i]['setting_value']);
		}
		if($sql[$i]['setting_type'] == "Google_Analytics")
		{
			define("Google_Analytics",$sql[$i]['setting_value']);
		}
		if($sql[$i]['setting_type'] == "Select Another Country")
		{
			define("Select_Another_Country",$sql[$i]['setting_value']);
		}
		if($sql[$i]['setting_type'] == "Side Deal Count")
		{
			define("SIDE_DEAL_COUNT",$sql[$i]['setting_value']);
		}
		if($sql[$i]['setting_type'] == "Recent Deal Count")
		{
			define("RECENT_DEAL_COUNT",$sql[$i]['setting_value']);
		}
		if($sql[$i]['setting_type'] == "Max Image Size")
		{
			define("MAX_IMAGE_SIZE",$sql[$i]['setting_value']);
		}
		if($sql[$i]['setting_type'] == "Max number of Deal Days")
		{
			define("MAX_NUMBER_OF_DEAL_DAYS",$sql[$i]['setting_value']);
		}
		if($sql[$i]['setting_type'] == "Site Title")
		{
			define('CONF_METATITLE', stripcslashes($sql[$i]['setting_value']));
		}
		if($sql[$i]['setting_type'] == "deal limit")
		{
			define('DEAL_LIMIT', $sql[$i]['setting_value']);
		}
		if($sql[$i]['setting_type'] == "today deals - title")
		{
			define('TODAY_TITLE', stripcslashes($sql[$i]['setting_value']));
		}
		if($sql[$i]['setting_type'] == "today deals - meta tag")
		{
			define('TODAY_MATA_TAG', stripcslashes($sql[$i]['setting_value']));
		}
		if($sql[$i]['setting_type'] == "today deals - description")
		{
			define('TODAY_DESCRIPTION', stripcslashes($sql[$i]['setting_value']));
		}
		if($sql[$i]['setting_type'] == "active deals - title")
		{
			define('ACTIVE_TITLE', stripcslashes($sql[$i]['setting_value']));
		}
		if($sql[$i]['setting_type'] == "active deals - meta tag")
		{
			define('ACTIVE_MATA_TAG', stripcslashes($sql[$i]['setting_value']));
		}
		if($sql[$i]['setting_type'] == "active deals - description")
		{
			define('ACTIVE_DESCRIPTION', stripcslashes($sql[$i]['setting_value']));
		}
		if($sql[$i]['setting_type'] == "upcoming deals - title")
		{
			define('UPCOMING_TITLE', stripcslashes($sql[$i]['setting_value']));
		}
		if($sql[$i]['setting_type'] == "upcoming - meta tag")
		{
			define('UPCOMING_MATA_TAG', stripcslashes($sql[$i]['setting_value']));
		}
		if($sql[$i]['setting_type'] == "upcoming - description")
		{
			define('UPCOMING_DESCRIPTION', stripcslashes($sql[$i]['setting_value']));
		}
		if($sql[$i]['setting_type'] == "home page - title")
		{
			define('HOME_TITLE', stripcslashes($sql[$i]['setting_value']));
		}
		if($sql[$i]['setting_type'] == "home page - meta tag")
		{
			define('HOME_MATA_TAG', stripcslashes($sql[$i]['setting_value']));
		}
		if($sql[$i]['setting_type'] == "home page - description")
		{
			define('HOME_DESCRIPTION', stripcslashes($sql[$i]['setting_value']));
		}
		if($sql[$i]['setting_type'] == "recent deal - title")
		{
			define('RECENT_TITLE', stripcslashes($sql[$i]['setting_value']));
		}
		if($sql[$i]['setting_type'] == "recent deal - meta tag")
		{
			define('RECENT_MATA_TAG', stripcslashes($sql[$i]['setting_value']));
		}
		if($sql[$i]['setting_type'] == "recent deal - description")
		{
			define('RECENT_DESCRIPTION', stripcslashes($sql[$i]['setting_value']));
		}
		if($sql[$i]['setting_type'] == "Select Language")
		{
			define('DEFAULT_LANGUAGE', stripcslashes($sql[$i]['setting_value']));
		}
		if($sql[$i]['setting_type'] == "Negative coupon count for front end")
		{
			define('COUPON_COUNT', stripcslashes($sql[$i]['setting_value']));
		}
		if($sql[$i]['setting_type'] == "send email to user for coupon expiration after these many days")
		{
			define('COUPON_REMAINING_DAYS', stripcslashes($sql[$i]['setting_value']));
		}
		

		
	}

	if(!defined("CURRENCY"))
	{
		define("CURRENCY","USD");
	}
	define("AMOUNT3x3",33);

	#####################################
	#  Configure Paging Variables		#
	#####################################
	
	$record_limit=10; // for paging
	$pg_limit=5;  // for paging
	define('PAGE_COMBO',$record_limit);

	#####################################
	#  Image Parameters					#
	#####################################
	
	define('IMAGE_HEIGHT','100');
	define('IMAGE_WIDTH','100');

	#####################################
	#  File Settings					#
	#####################################

	define('INDEX_FILE','index.php?file=');

	#####################################
	#  Mail Header Settings			    #
	#####################################

	$FromEmail = "php.developer@spaculus.com";
	$ReplyTo   = "php.developer@spaculus.com";

	#####################################
	#  Mail Version		                #
	#####################################

	$headers  = 'MIME-Version: 1.0' . "\r\n";
	$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

	#####################################
	#  General Setting					#
	#####################################
	
	error_reporting(E_ALL ^ E_NOTICE); // display all errors except notices
	@ini_set('display_errors', '1'); // display all errors
	@ini_set('register_globals', 'Off'); // make globals off runtime
	
	define('EMAIL_SEPARATOR', '------------------------------------------------------');
	define('CHARSET', 'iso-8859-1');


	getconfigure();
	
	
	
?>
