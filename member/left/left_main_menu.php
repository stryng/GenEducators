<?php
		$uidstr = "'".$_SESSION['userid']."'";

		$sql = "select * from userdetail where UserId = '".$_SESSION['userid']."' and Placement = 'Placement'";
		$rows_user = $form->getRow($sql);
		if(is_array($rows_user) && sizeof($rows_user)>0 && $rows_user['Placement'] == "Placement")
		{
			$_SESSION['userwaiting'] = true;
		}
		
		$sql = "select * from userdetail where UserId = '".$_SESSION['userid']."'";
		$rows_user = $form->getRow($sql);
		if(sizeof($rows_user)>0 && $rows_user['Placement'] == "")
		{
				$qry = "select * from nodetree where u1 = '".$_SESSION['userid']."' or u2 = '".$_SESSION['userid']."' or u3 = '".$_SESSION['userid']."' or usertb_id = '".$_SESSION['userid']."'";
				$rows_user = $form->getRow($qry);
				if(sizeof($rows_user)>0)
				{
					$_SESSION['notintree'][$_SESSION['userid']] = false;
				}
				else
				{
					$_SESSION['notintree'][$_SESSION['userid']] = true;
				}
		}
		
		
		
		
		$sql = "select * from m_payment_fee where usertb_id = '".$_SESSION['userid']."' and (activedeactive = 'deactive' or payment_done = 'NO')";
		$rowct = $form->getRow($sql);
		$numct = sizeof($rowct);
		
		$sql = "select * from m_payment_fee_5_3 where usertb_id = '".$_SESSION['userid']."' and (activedeactive = 'deactive' or payment_done = 'NO')";
		$rowft = $form->getRow($sql);
		$numft = sizeof($rowft);
		
		
		$sql = "select * from m_payment_fee_10_3 where usertb_id = '".$_SESSION['userid']."' and (activedeactive = 'deactive' or payment_done = 'NO')";
		$rowtt = $form->getRow($sql);
		$numtt = sizeof($rowtt);
																	
		
		$qry = "select * from m_payment_fee where usertb_id = '".$_SESSION['userid']."' and activedeactive ='active'";// payment_datetime like '".date('Y-m-d')."%'";
		$rw_cnt = $form->getRow($qry);
		if(sizeof($rw_cnt))
		{
			$_SESSION[$uidstr]['useractive'] = true;
		}
		
		
		$sql = "select balance FROM m_earn_history where usertb_id = '".$_SESSION['userid']."' ORDER BY `earn_id` DESC limit 1";
		$rows_bal = $form->getRow($sql);

		$sql = "select payment_val From m_daily_payment where usertb_id = '".$_SESSION['userid']."' ORDER BY `dailypayment_id` DESC limit 1";
		$row_pay = $form->getRow($sql);
		$total = 0;
		if(is_array($row_pay) && sizeof($row_pay)>0 && is_array($rows_bal) && sizeof($rows_bal)>0 )
		{
			$total = $rows_bal['balance'] + $row_pay['payment_val'];
		}
		else if(is_array($rows_bal) && sizeof($rows_bal)>0 )
		{
			$total = $rows_bal['balance'];
		}
		else if(is_array($row_pay) && sizeof($row_pay)>0)
		{
			$total = $row_pay['payment_val'];
		}
		
		$msg = "";
		
		$sql = "select * from userdetail where UserId = '".$_SESSION['userid']."'";
		$rows_user = $form->getRow($sql);
		if($rows_user['Placement'] == "Placement" && $rows_user['entry'] == 'prepaid')
			$_SESSION[$uidstr]['userwaiting'] = true;
?>
<div class="mainNav">
  <?php /*?>
	  <div class="user"><a title="" class="leftUserDrop"> <img src="images/userLogin2.png" alt="" width="72px" height="70px"> </a> <span>admin</span>
		<ul class="leftUser">
		  <li><a href="index.php?file=configure_detail&amp;txtsystem_configid=1" title="" class="sProfile">My profile</a></li>
		  <!--<li><a href="#" title="" class="sSettings">Settings</a></li>-->
		  <li><a href="index.php?file=logoff_admin" title="" class="sLogout">Logout</a></li>
		</ul>
	  </div><?php 
	  */
  ?>
  <!-- Responsive nav -->
  <div class="altNav">
    <?php /*?><div class="userSearch">
      <form action="">
        <input type="text" placeholder="search..." name="userSearch">
        <input type="submit" value="">
      </form>
    </div><?php */?>
    <!-- User nav -->
    <ul class="userNav">
      <li><a href="#" title="" class="profile"></a></li>
      <li><a href="#" title="" class="messages"></a></li>
      <li><a href="#" title="" class="settings"></a></li>
      <li><a href="#" title="" class="logout"></a></li>
    </ul>
  </div>
  <!-- Main nav  class="active" -->
  <ul class="nav">
     		<li><a  href="index.php?file=welcome" title="" class="home"><img src="images/icons/color/home.png " alt=""><span>Home</span></a></li>
            
			<li><a title="" href="index.php?file=volunteers" class="tracking"><img src="images/icons/color/sitemap.png " alt=""><span>Matricies</span></a>
				<ul class="sub_tracking">
					<li><a href="index.php?file=volunteers" title="">Matricies</a></li>
                    <li><a href="index.php?file=yesterday_lvl_summery" title="">Summary</a></li>
			  </ul>
			</li>
			<li><a title="" class="business_setting"><img src="images/icons/color/sitemap.png" alt=""><span>Ticket</span></a>
				<ul class="sub_business_setting">
						<li><a href="index.php?file=message_create" title="">New Ticket</a></li>
						<li><a href="index.php?file=message" title="">Inbox</a></li>
				</ul>
			</li>
			<li><a title="" href="index.php?file=friends_list" ><img src="images/icons/color/sitemap.png" alt=""><span>View Friends</span></a></li>
			<li><a title="" href="index.php?file=profile&userid=<?=$_SESSION['userid']?>" ><img src="images/icons/color/sitemap.png" alt=""><span>View Profile</span></a></li>
			<li><a title="" href="index.php?file=pay-plan" ><img src="images/icons/color/sitemap.png" alt=""><span>Pay Plan</span></a></li>
			<li><a title="" href="index.php?file=webinars-calls" ><img src="images/icons/color/sitemap.png" alt=""><span>Webinars / Calls</span></a></li>
            
            <!--<li><a title="" class="business_setting"><img src="images/icons/color/b_set_ic.png " alt=""><span>Business Settings</span></a>
                <ul class="sub_business_setting">
                    <li><a href="index.php?file=buisness_detail" title="">My Business Details</a></li>
                    <li><a href="index.php?file=sp_operating_hours" title="">Operating Hours</a></li>
                    <li><a href="index.php?file=sp_colse_dates_listing" title="">Closed Dates</a></li>
                    <li><a href="index.php?file=app_notifications" title="">Appointment Notifications</a></li>
                    <li><a href="index.php?file=confirmation_message_listing" title="">Confirmation Message</a></li>
                    <li><a href="index.php?file=app_reminders" title="">Appointment Reminders</a></li>
                    <li><a href="index.php?file=additional_req" title="">Additional Requests</a></li>
                    <li><a href="index.php?file=sp_lead_time" title="">Appointment Lead Time</a></li>
                    <li><a href="index.php?file=start_time" title="">Online Start Times</a></li>
                    <li><a href="index.php?file=online_cancellations_detail" title="">Online Cancellations</a></li>
                </ul>
            </li>-->
    
  </ul>
  


</div>
