<?php
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
	
	//$sql1 = "select *,concat(firstname,' ',lastname) as fullname from userdetail where userid = '".$u1."'";
	$sql1 = "SELECT *,concat(FirstName,' ',LastName) as fullname,Email as username FROM userdetail where UserId = '".$u1."'";	 
	$fromuser = $form->getRow($sql1);
?>
<script type="text/javascript">
	function backurl()
	{
		window.location = "<?=ADMIN_URL?>index.php?file=message";
	}
</script>	
<!-- Content begins -->
<div id="content">
  <!--  <div class="contentTop">
        <span class="pageTitle"><span class="icon-link"></span>Message</span>
        	<!--================= include top_title_count file start ===========-->
		
			<!--================= include top_title_count file close ===========
        <div class="clear"></div>
    </div>-->	
    <!-- Breadcrumbs line -->
     <!--<div class="breadtopLine">
        <!--================= include creadcrumbs file start ===========-->
		
		<!--================= include creadcrumbs file close ===========
    </div>-->	
    <!-- Breadcrumbs line -->
    <!-- Main content -->
    <div class="wrapper">
		<div class="widget grid6">
                <div class="whead"><h6>Messages Details</h6>
                <ul class="titleToolbar">
                    <li><a onClick="backurl('index.php?file=message')">Back</a></li>
                </ul>
				<div class="clear"></div>
                </div>
                <ul class="messagesOne">
                    <li class="by_user">
                        <a title="">
							<?php if($fromuser['business_logo'] != "none") {?>
								<img src="<?php echo SERVER_URL.'upload/sp_logo/'.$fromuser['business_logo'];?>" alt="" height="36" width="37" />
							<?php } else { ?>	
								<img src="<?php echo SERVICE_PATH.'images/noface.png';?>" alt="" height="36" width="37" />
							<?php } ?>	
						</a>
                        <div class="messageArea">
                            <span class="aro"></span>
                            <div class="infoRow">
                                <span class="name">To 
									<strong>
										<?php echo $fromuser['fullname']." ( ".$fromuser['username']." ) ";?>
									</strong></span>
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
                </ul>
            </div>
    </div>
</div>
