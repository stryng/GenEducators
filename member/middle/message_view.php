<?php
	$user = $_SESSION['userid'];
	if(isset($_GET['ref']) && !empty($_GET['ref'])){
		$msgid = base64_decode($_GET['ref']);
		$update="  update message_in SET status='Read' WHERE `message_id` = ".$msgid;
		$form->inser_qry($update);
	}else{
		?>
		<script language="javascript" type="text/javascript">
			window.location = "index.php?file=message";
		</script>
		<?php
	}
	
  	$sql = "select *  from message_in where message_id='".$msgid."'";
	$row = $form->getRow($sql);

 	$msg_desc = $row['msg_desc'] ;
	$u1 = $row['userid'];
	//echo  $u1; die;
	if($u1 != '0')
	{
		//$sql1 = "select *,concat(firstname,' ',lastname) as fullname from userdetail where userid = '".$u1."'";
		$sql1 = "SELECT *,concat(FirstName,' ',LastName) as fullname,Email as username FROM userdetail where UserId = '".$u1."'";
		$fromuser = $form->getRow($sql1);
		
		$useremail = $fromuser['username'];
		$touserid = $fromuser['UserId'] ;
		
	}
	else
	{
		$sql1 = "select *,username as fullname,email as default_email from admin_logindetail where AdminId = '1'";
		$fromuser = $form->getRow($sql1);
		
		$useremail = $fromuser['default_email'];
		$touserid = $fromuser['AdminId'] ;	
	}	
	//echo $sql1;die;
	
		
	//print_r($fromuser);
	//$sql2="select *  from userdetail where userid='".$row['to_u_id']."' ";
	$sql2 = "SELECT * FROM userdetail where UserId = '".$row['to_u_id']."'";
	$touser = $form->getRow($sql2);

#################################
####### REPLY MESSAGE ###########	
#################################
		$str_msg = "";
		$form->values 			=  (sizeof($_POST)>0)?$_POST:array();
		$form->fields 			=  array(
			"userid"  			=> array("name"=>"userid","type"=>"hidden","value"=>$_SESSION['userid']),
			"token"  			=> array("name"=>"token","type"=>"hidden","value"=>$row['token']),
			"taken_status"		=> array("name"=>"taken_status","type"=>"hidden","value"=>0),
			"msg_status"		=> array("name"=>"msg_status","type"=>"hidden","value"=>2),
			"Subject" 			=> array("name"=>"msg_sub","type"=>"text","value"=>"Re.".$row['msg_sub'], "validate"=>"R", "class"=>'large'),
			"msg_desc" 			=> array("name"=>"msg_desc","type"=>"hidden"),
			"Message"  			=> array("name"=>"editor","type"=>"textarea","validate"=>"R", "class"=>'large',"save2db"=>"false"),
			"to_u_id"  			=> array("name"=>"to_u_id","type"=>"hidden","value"=>$touserid),
			"to_admin"  		=> array("name"=>"to_admin","type"=>"hidden","value"=>"yes"),
			"msg_datetime"  	=> array("name"=>"msg_datetime","type"=>"hidden","value"=>date('Y-m-d H:i:s')),
		);
		
		
		if(sizeof($_POST)>0) {
			if($form->validate())
			{
						$table = 'message_in';
						$_POST['msg_desc'] = $_POST['editor'];
						$idx = $form->processOnTable($table);
						?>
						<script language="javascript" type="text/javascript">
							window.location = "index.php?file=message&suc";
						</script>
						<?php
						header("location:index.php?file=message&suc");
						die;
			}
		}

	
?>
<script type="text/javascript">
$(document).ready(function(){
	$("#editoerror").css("display","none");
	
	$("#btn_reply").click(function(){
		
		//==== editor validation 
		var editor = $("#editor").val();
		//alert(editor);
		if(editor == "" ){ $("#editoerror").css("display","block"); }
		else{$("#editoerror").css("display","none"); }
		
		if(editor == ""){
			return false;
		}else{
				return true;
		}
	});
	
});
	function backbtnclick()
	{
		window.location = "<?=MEMBER_URL?>index.php?file=message";
	}
</script>
<style type="text/css">
label[for=userid ] { display:none;}
label[for=token ] { display:none;}
label[for=taken_status] { display:none;}
label[for=msg_status] { display:none;}
label[for=msg_desc] { display:none;}
label[for=to_admin] { display:none;}
label[for=to_u_id] { display:none;}
label[for=msg_datetime] { display:none;}
#msg_sub
{
	width:254px !important;
}
.cleditorMain
{
	width:50% !important;
	background:none repeat scroll 0 0 #F7F7F7;
	border:1px solid #F0F0F0;
	float:left;
}
.mareditor{
	margin:0% 0% 0% 2%;
}
input[type=text] {
	margin-bottom:0px !important;
}
.fieldbox label
{
	float:left;
	width:180px;
}
.cuserror{
	margin:0% 0% -2% 26% !important;
	width:100%;
	color:#A73939;
	font-size: 11px;
	white-space: nowrap;
}
.fluid [class*="grid"]
{
	margin-left:0 !important;
}
.fluid .grid6
{
	/*width:90%;*/
}
</style>
<!-- Content begins -->
<div id="content">
    <!-- Breadcrumbs line -->
    <div class="wrapper">
    	<div class="fluid">
        
            <!--========================= Messages detail ======================================-->
            <div class="widget grid6">
                <div class="whead"><h6>Messages Details</h6>
					<a class="buttonH bGreyish" onClick="backurl('index.php?file=message')" >Back</a>
				<div class="clear"></div>
                </div>
               
                <ul class="messagesOne">
                    <li class="by_user">
                        <a title="">
							<?php 
								//echo $fromuser['business_logo'] ; die;
							if($fromuser['business_logo'] != "") {?>
								<img src="<?php echo '../upload/sp_logo/'.$fromuser['business_logo'];?>" alt="" height="36" width="37" />
							<?php } else { ?>	
								<img src="<?php echo '../images/noface.png';?>" alt="" height="36" width="37" />
							<?php } ?>	
						</a>
                        <div class="messageArea">
                            <span class="aro"></span>
                            <div class="infoRow">
                                <span class="name">To 
									<strong>
										<?php echo $fromuser['fullname']." ( ".$useremail." ) ";?>
									</strong> From me</span>
                                <span class="time">
									<a href="<?php echo $href; ?>" > 
									  <?php   
										$db_date = $row['msg_datetime'];
										$date1=explode('-',$row['msg_datetime']); 
										echo substr($date1[2],0,2)."-".$date1[1]."-".$date1[0]; 	
										$a = explode(' ',$db_date);
										echo  " &nbsp;/&nbsp;" .$a[1];
									 ?>
									</a>
								</span>
                                <div class="clear"></div>
                            </div>
							<div class="infoRow">
                                <span class="name"><strong>Subject :</strong>&nbsp;&nbsp;&nbsp;</span>
								<?php echo $row['msg_sub']; ?> 
                                <div class="clear"></div>
                            </div>
                            <?php echo $row['msg_desc'];//htmlentities(strip_tags($row['msg_desc']));?>
                        </div>
                        <div class="clear"></div>
                    </li>
                
                    <li class="divider"><span></span></li>
                	<?php
					$toksql = "select *  from  message_in where token='".$row['token']."' order by msg_datetime desc limit 0,5 ";
					$tok = $form->getArray($toksql);
					for($i=0;$i<sizeof($tok);$i++)
					{
						if($tok[$i]['message_id'] != $msgid)
						{
							if($tok[$i]['userid'] != '0')
							{
								$tokusersql1 = "SELECT concat(FirstName,' ',LastName) as fullname,Email as username FROM userdetail where UserId = '".$tok[$i]['userid']."' ";
							}else{
								$tokusersql1 = "select *,username as fullname,email as default_email from admin_logindetail where AdminId = '0'";
							}
							$fname = $form->getRow($tokusersql1);
							if($tok[$i]['userid'] == $_SESSION['sess_sp_id'])
							{
								?>
								<li class="by_me">
									<a href="#" title="">
										<?php if($fname['business_logo'] != "none") {?>
											<img src="<?php echo '../upload/sp_logo/'.$fname['business_logo'];?>" alt="" height="36" width="37" />
										<?php } else { ?>	
											<img src="<?php echo '../images/noface.png';?>" alt="" height="36" width="37" />
										<?php } ?>
									</a>
									<div class="messageArea">
										<span class="aro"></span>
										<div class="infoRow">
											<span class="name"><strong>
												<?php echo $fname['firstname'];?>
											</strong> says:</span>
											<span class="time">
												<?php   
													$db_date = $tok[$i]['msg_datetime'];
													$date1=explode('-',$row['msg_datetime']); 
													echo substr($date1[2],0,2)."-".$date1[1]."-".$date1[0]; 	
													$a = explode(' ',$db_date);
													echo  " &nbsp;/&nbsp;" .$a[1];
												 ?>
											</span>
											<div class="clear"></div>
										</div>
										<?php echo $tok[$i]['msg_desc']; ?>
									</div>
									<div class="clear"></div>
								</li>
								<?php
							}
							else
							{
								?>
								<li class="by_user">
									<a href="#" title="">
										<?php if($fname['business_logo'] != "none") {?>
											<img src="<?php echo '../upload/sp_logo/'.$fname['business_logo'];?>" alt="" height="36" width="37" />
										<?php } else { ?>	
											<img src="<?php echo '../images/noface.png';?>" alt="" height="36" width="37" />
										<?php } ?>
									</a>
									<div class="messageArea">
										<span class="aro"></span>
										<div class="infoRow">
											<span class="name"><strong>
												<?php echo $fname['firstname'];?>
											</strong> says:</span>
											<span class="time">
												<?php   
													$db_date = $tok[$i]['msg_datetime'];
													$date1=explode('-',$row['msg_datetime']); 
													echo substr($date1[2],0,2)."-".$date1[1]."-".$date1[0]; 	
													$a = explode(' ',$db_date);
													echo  " &nbsp;/&nbsp;" .$a[1];
												 ?>
											</span>
											<div class="clear"></div>
										</div>
										<?php echo $tok[$i]['msg_desc']; ?>
									</div>
									<div class="clear"></div>
								</li>
								<?php
							}	
						}
					}?>
                </ul>
            </div>
            
            <!--========================= REPLY MESSAGE =======================-->
			<!--<div class="clear"></div>-->
			<div class="widget grid6">
                    <div class="whead"><h6>Reply</h6><div class="clear"></div></div>
						<form id="form1" name="form1" class="main myform" method="post">
                            <div style="margin-left:25px">
								<p>
								<?php echo $form->showMessage(); 
								if($str_msg == "")
								{
									$form->display();
									?>
									<div class="fieldbox">
										<div class="clear"></div>
										<input type="submit" name="btn_send" id="btn_send" value="Send" class="buttonH button_green"/>
										<a href="index.php?file=message" class="buttonS bRed">Back</a>
									</div>
									<?php
								}
								?>
								</p>
								
							</div>
							
							<div id="repl_message">
							</div>
						</form>
         	</div>
		 
		 </div>
	</div>
</div>