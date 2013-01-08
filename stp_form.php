<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
</head>

<body>

<?php /*?><form action="https://solidtrustpay.com/handle.php" method="post">
	<input type=hidden name="testmode" value="on" />   <!-- IMPORTANT!! This line should be commented or deleted when the site is live -->
    <input type=hidden name="merchantAccount" value="mineshpatel" />
    <input type="hidden" name="sci_name" value="mineshpatel">
    	     Amount: <input type=text name="amount" /> <br >
    <input type=hidden name="currency" value="USD" />
    <input type=hidden name="item_id" value="My Best Seller" />

	<input type=hidden name="notify_url" value="http://'<?=$_SERVER['HTTP_HOST']?>" /> <!-- This file should be modified to fit your code-->
	<input type=hidden name="return_url" value="http://'<?=$_SERVER['HTTP_HOST']?>" />
   	<input type=hidden name="cancel_url" value="http://<?=$_SERVER['HTTP_HOST']?>" />

    <input type="submit" style="background:url(../images/stp.gif) no-repeat center  center;width:70px;height:25px;cursor:pointer;" value="" name="cartImage" id="submitstp" />
  </form><?php */?>
  
<form id="frmstp" name="frmstp" action="https://solidtrustpay.com/handle.php" method="post" onsubmit="return confirm(\'Do you wish to proceed with this payment?\')">
	<input type=hidden name="testmode" value="on" />   <!-- IMPORTANT!! This line should be commented or deleted when the site is live -->
	<input type=hidden name="merchantAccount" value="mineshpatel" />
	<input type=hidden name="amount" id="amount" value="33" />
	<input type=hidden name="currency" value="USD" />
	<input type=hidden name="item_id" value="MST Membership Fee" />
	
        <input type=hidden name="user1" value="111" /> <!--additional info -->
	<input type=hidden name="user2" value="Activation>" /> <!--additional info -->
	

	<input type=hidden name="notify_url" value="http://'<?=$_SERVER['HTTP_HOST']?>" /> <!-- This file should be modified to fit your code-->
	<input type=hidden name="return_url" value="http://'<?=$_SERVER['HTTP_HOST']?>" />
    	<input type=hidden name="cancel_url" value="http://<?=$_SERVER['HTTP_HOST']?>" />
	<input type="submit" style="background:url(../images/stp.gif) no-repeat center  center;width:70px;height:25px;cursor:pointer;" value="" name="cartImage" id="submitstp" />
</form>
</body>
</html>
