<? 
	include_once 'business_logic/config/configure.php'; 
	require_once CLASS_PATH.'admin_page_content.php';
	$page_obj = new admin_page_content;

	include('js_css_files.php')
?>
<style type="text/css">
	#featured_slide_inner
	{
		height:100%;
	}
	.col2
	{
		height:430px;
		background:#000000;
	}
	.col0
	{
		color:#000000;
		background:#000000;
	}
	.color1
	{
		color:#43AEEC;
		font:400 24px/25px 'Lato',sans-serif;
	}
	#container #respond input.lname, #container #respond select.lname
	{
		margin:0px !important;
	}
	#container
	{
		background:none;
	}
	.btn_cls
	{
		margin:5px 0 0 0;
		padding:4px;
		color:#fff;
		width:auto;
		background:url(images/submit_btn.png) top left repeat-x;
		border:1px solid #CCCCCC;
		font-family:"Century Gothic";
		font-size:14px;
		cursor:pointer;

	}
</style>
<script type="text/javascript">
	function gotopage(pagename)
	{
		document.location = pagename;
	}
</script>
<body id="top">
<?php include('top/top_login.php') ?>
<!-- ####################################################################################################### -->
<?php include('top/top_menu.php') ?>
<!-- ####################################################################################################### -->
	
<?php include('slider/static.php') ?>
<!-- ####################################################################################################### -->

<div class="wrapper col3">
		  <div id="homecontent">
			<div class="banner_shadow"> <img src="images/banner_shadow.png"  alt="" /> </div>
			<br class="clear" />
		  </div>
	  		<div id="container">
					<div style="float:left;width:300px;">
								<h2 class="color1">
									<?
									$page_Creative_Ideas = $page_obj->get_page_content_single_detail(3);
									echo $page_Creative_Ideas['0']['Pag_Title'];
									$page_des_Creative_Ideas= $page_Creative_Ideas[0]['Pag_Desc'];
									?>
								</h2>
								<div style="width:200px;float:left;">
									<?=substr($page_des_Creative_Ideas,0,150);?>...
								</div>
								<div class="clear"></div>
									<p style="margin-left:31px">
										<input name="submit" onclick="gotopage('creative-ideas.php')" type="button" class="btn_cls" value="Read More..">
									</p>
								<div class="clear"></div>
					</div>
					<div style="float:left;width:300px;">
								<h2 class="color1">
									<?
									$page_Professional_Research = $page_obj->get_page_content_single_detail(4);
									echo $page_Professional_Research['0']['Pag_Title'];
									$page_des_Professional_Research= $page_Professional_Research[0]['Pag_Desc'];
									?>
								</h2 class="color1">
								<div style="width:200px;float:left;">
									<?=substr($page_des_Professional_Research,0,150);?>...
								</div>
								<div class="clear"></div>
									<p style="margin-left:31px">
										<input name="submit" onclick="gotopage('professional-research.php')" type="button" class="btn_cls" value="Read More..">
									</p>
								<div class="clear"></div>
					</div>
					<?php
						if(!isset($_SESSION['userid']))
						{
							?>
							<div style="float:left;width:300px;">
										<h2 class="color1">
											Login Panel
										</h2>
									<div id="respond">
										<?php if($msg != "" || $_REQUEST['msg']) { ?>
										<div style="margin-left:25px">
											<p class="error">
											  <?=$msg?>
											  <?=$_REQUEST['msg']?>
											</p>
										  </div>
										<? } ?>  
										<div id="login">
										<form action="login-action.php" method="post" class="cmxform" id="frmlogin">
											<input type="hidden" name="action" id="action" value="login" />
											<div style="margin-left:25px">
												<label for="name" class="label">Email</label>
												<p>
												  <input type="email" name="txtEmial" id="txtEmial" value="" size="22" class="lname" required>
												</p>
											  </div>
											<div style="margin-left:25px" >
												<label for="name" class="label">Password</label>
												<p>
												  <input type="password" name="txtPassword" id="txtPassword" value="" size="22" class="lname" required>
												</p>
											</div>
											<p style="margin-left:31px">
												<input name="submit" type="submit" id="submit" class="fl_left" value="Login">
											</p>
											<div class="clear"></div>
											
											<p style="margin-left:25px; margin-top:25px">
												<label for="name" class="label"><a href="javascript: void(0)" id="ShowForgot">Forgot Password</a></label>
											</p>
											
											</form>
										</div>
										<div id="forgot" style="display:none">
											<form action="login-action.php" method="post" class="cmxform" id="frmForgot">
											<input type="hidden" name="action" id="action" value="forgot" />
											
											<div style="margin-left:25px;width:410px">
												<label for="name" class="label">Email</label>
												<p>
												  <input type="email" name="txtfemail" id="txtfemail" value="" size="22" class="lname" required onblur="authenticate('email_forgot.php','repl_message','txtfemail','repl_message')">
												  <label id='repl_message' style="display:none; width: 241px; margin-left: 1px; margin-top: -19px; " ><img src="images/loading.gif" /></label>
												</p>
											  </div>
											<p style="margin-left:31px">
												<input name="submit" type="submit" id="submit" class="fl_left" value="Submit">
											</p>
											
											<div class="clear"></div>
											<div style="margin-left:25px; margin-top:10px">
												<p>
												  NOTE: To reset your password, enter the email that you use to sign in
												</p>
											  </div>
											  <div class="clear"></div>
											<p style="margin-left:25px; margin-top:25px">
												<label for="name" class="label"><a href="javascript: void(0)" id="HideForgot">Back to Login</a></label>
											</p>
											<div class="clear"></div>
											
											
											</form>
										</div>
									</div>
							</div>
							<?php
						}
						?>
					<div class="clear"></div>
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
