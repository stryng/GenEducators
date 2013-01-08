<?
	if(strlen($_REQUEST['action'])!=0) 
	{
		$db = new Form(); 
		//echo "Hello"; die;
		$name=$_REQUEST['txtname'];
		$pwd=$_REQUEST['txtpwd'];
		//echo "SELECT status, Con_Id, Con_UserName,field_right_ids FROM configure where Con_UserName='".$name."' and Con_Password='".$pwd."'"; die;
		//echo "SELECT sid, user_name,status FROM  system_config where user_name='".$name."' and password='".$pwd."'"; die;
		//echo "SELECT AdminId as sid, username as user_name,'active' as status FROM  admin_logindetail where username='".$name."' and password='".$pwd."'<br>";
			$rs_main = $db->getRow("SELECT * FROM  admin_logindetail where username='".$name."' and password='".$pwd."'");
			if(sizeof($rs_main)>0) {
					$_SESSION['admin']['usertype'] = "admin";
					$_SESSION['admin']['username'] = $rs_main['username'];
					$_SESSION['admin']['userid'] = $rs_main['AdminId'];
					/*$_SESSION['admin_username'] = $rs_main['username'];
					$_SESSION['admin_userid'] = $rs_main['AdminId'];*/
					?>
					<script language="javascript">
						document.location.href="index.php?file=welcome";
					</script><?
					die();
			} else {
				$msg="Invalid User name or Password";
			} 
	
	}

?>

<!-- Top line begins -->
<div id="top">
	<div class="wrapper">
    	<a href="#" title="" class="logo"><img src="../images/logo.png" alt="" height="25" /></a>
        <!-- Right top nav -->
        <div class="clear"></div>
    </div>
</div>
<!-- Top line ends -->
<div class="loginWrapper">
	<!-- Current user form -->
    <form action="index.php?file=login&action=process" method="post" name="frmlogin" id="login" class="validate">
	    <div class="loginPic" style="height:95px;margin:-25px 0px 0px 0px;">
            <a href="#" title="" style="margin: 41px 0px 0px 0px;"><img src="../images/logo.png" alt="" height="25" /></a>
            <span id="titlelogin">&nbsp;</span>
			<?php /*?><span id="titleforgot" style="display:none;">&nbsp;</span>
			<h6 class="red" style="margin:-26px 0px 0px 0px;"><?=$msg?></h6><?php */?>
        </div>
		
		<input type="text" name="txtname" placeholder="User Name" class="loginEmail required" />
		<input type="password" name="txtpwd" placeholder="Your Password" class="loginPassword required" />
			
		
		<div class="logControl">
            <input type="submit" name="submit" value="Login" class="buttonM bBlue" />
            <div class="clear"></div>
        </div>
		
    </form>
	
    
</div>


