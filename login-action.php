<?php
	require_once('business_logic/config/configure.php');
	require_once("business_logic/class/form.class.php");
	//echo $_REQUEST['action']; die;
	$form = new Form();
	if(isset($_REQUEST['action']) && $_REQUEST['action'] == 'login') 
	{
			$name= mysql_real_escape_string( $_REQUEST['txtEmial'] );
			$pwd= mysql_real_escape_string( $_REQUEST['txtPassword'] );
			
			$qry = "SELECT * FROM userdetail WHERE ( UserName = '".$_POST['txtEmial']."' or login = '".$_POST['txtEmial']."' ) and Password= '".md5($_POST['txtPassword'])."' and active =1";
			$row = $form->getRow($qry);
			if(is_array($row) && sizeof($row)>0) 
			{
				$_SESSION['usertype'] = "enduser";
				$_SESSION['username'] = $row['UserName'];
				$_SESSION['userid'] = $row['UserId'];
				$_SESSION['inviter']  = $row['inviter'];
				$qry_login = "INSERT INTO loginlogout_detail (`usertb_id` ,`login_datetime`,last_active_datetime,`session_id`)VALUES ('".$row['UserId']."', '".date("Y-m-d H:i:s")."', '".date("Y-m-d H:i:s")."','".session_id()."')";
				//echo $qry_login;die;
				$form->inser_qry($qry_login);
			
				$qry = "select  activedeactive,payment_datetime from m_payment_fee where  usertb_id = ".$row['UserId']." and activedeactive = 'active' and payment_done = 'YES'";
				$rows = $form->inser_qry($qry);
				if(is_array($rows) && sizeof($rows)>0)
				{
					$uidstr = "'".$_SESSION['userid']."'";
					$_SESSION[$uidstr]['useractive']  = true;
				}
				else
				{
					//header("Location:status.php");
				}
				//print_r($_SESSION);die;
				//header("Location:video.php");
				header("Location:member/index.php");
				die;
			} 
		 	else 
			{
				$msg="Invalid UserName or Password";
				//login.php
				?>
				<script language="javascript">
					document.location.href="login.php?msg=<?=$msg?>";
				</script>
				<?
				die;
			} 
		
		
	
	}
	
	else if($_REQUEST['action'] == 'forgot')
	{
			$txtfemail = $_REQUEST['txtfemail'];
			$query = "SELECT UserId,Email,FirstName,LastName FROM  userdetail where Email='".$txtfemail."'";
			$rs_main = $form->getRow($query);
			
			if(sizeof($rs_main)>0) 
			{
					$conquery="select * from email_template where temp_id='1'"; 
					$consql = $form->getArray($conquery);

					$template_content = $consql[0]['content'];
					$Subject =$consql[0]['subject'];

					$FromEmail = $consql[0]['email'];
					
					
					/*$headers = 'MIME-Version: 1.0' . "\r\n";
					$headers .='Content-type: text/html; charset=iso-8859-1' . "\r\n"; 
					*/$headers .= "From: Affiliworx<".$FromEmail.">\r\n";
					
					
					$userid=$rs_main['UserId'];
					$ToName = $rs_main['FirstName']." ".$rs_main['LastName'];
					$ToEmail = $rs_main['Email'];

					$a=$ToName;
					$temp_final = str_replace('xxname_of_userxx',$a,$template_content );
					
					$a=$ToEmail;
					$temp_final = str_replace('xxusernamexx',$a,$temp_final );
					
					$a= '<a href='.SERVER_URL.'changepassword.php?user_id='.base64_encode($userid).' target="_blank">Click Here To Reset Your Password</a>';
					$temp_final = str_replace('xxloginurlxx',$a,$temp_final);
					
					$a = "<a href='".SERVER_URL."'>'".CONF_METATITLE."'";
					$temp_final = str_replace('xxsitenamexx.',$a,$temp_final );
					$HTMLMsg = $temp_final;
								
					include('mail_template/mail-template.php');
					/*echo $html_body;
					echo "<br>".$headers;
					 die;	*/
					if(@mail($ToEmail,$Subject,$html_body,$headers))
					{
						$msg=$forgot= "Please Check Your Email.(If you dont receive email in your Inbox, please check your junk/spam folder. Also, add our email address - ".$FromEmail." to your safe sender list)";
					
					}
					else
					{
						$msg=$forgot="Please Check Your Email.(If you dont receive email in your Inbox, please check your junk/spam folder. Also, add our email address - ".$FromEmail." to your safe sender list)";
					
					}
			}
			else
			{
				$afterforgotpassowrd3 = "No Account found with this email address";
				$msg=$forgot= $afterforgotpassowrd3;
			}
	
	}
	
	?>
		<script language="javascript">
			document.location.href="login.php?msg=<?=$msg?>";
		</script>
	<?
	
	
	//echo  $msg; die;
?>
<?php
	include_once 'business_logic/config/configure.php';

	include('js_css_files.php') ?>
<style>
	#header_title {
			height: 70px;
		}
		#container{
			width:385px !important;
		}
		.twothird_box{
			width:345px !important;
		}
</style>
<body id="top">
	<?php include('top/top_login.php') ?>
	
	<!-- ####################################################################################################### -->
	
	<?php include('top/top_menu.php') ?>
	
	<!-- ####################################################################################################### -->
	
	<div class="wrapper col0">
  		<div id="header_title">
  		<!-- use for cms page title -->	
    	<div class="header_inner_title" style="margin-left:240px">
    		<h3>Resend Activation Link </h3>
        </div>
		<!--   User free sign up link -->
        <?php //include('top/free_sign_up.php') ?>
	    <!-- end -->
		</div>
	</div>
	
	<!-- ####################################################################################################### -->
	
	<?php //include('slider/static.php') ?>
	
	<!-- ####################################################################################################### -->
	
	<div class="wrapper col3">
  		<!--<div id="homecontent">
                    <div class="banner_shadow">
                            <img src="images/banner_shadow.png"  alt="" />
    </div>

  </div>-->
			<div class="wrapper col3">
  				<div id="container">
          			<div id="content">
						<div class="twothird_box">
							<div class="twothird_box_inner" style="height:207px;  text-align:center " >
								
									<? echo $msg; ?> 
    							
 						   </div>
						 </div>
						
				   </div>
				</div>
			</div>
	</div>
	
	<!-- ####################################################################################################### -->
	<?php include('bottom/bottom_blue_line.php') ?>
	
	<!-- ####################################################################################################### -->
	<?php include('bottom/bottom_link.php') ?>

	<!-- ####################################################################################################### -->
	<?php include('bottom/copyright.php') ?>

</body>
</html>