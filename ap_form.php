<?php
	include_once 'business_logic/config/configure.php';
        define("AP_URL","https://sandbox.Payza.com/sandbox/payprocess.aspx");
	define("AP_MERCHANT","seller_1_minesh.patel@spaculus.com");
?>
<?php /*?><form id="frmap" name="frmap" method="post" action="<?=AP_URL?>" onsubmit="return confirm(\'Do you wish to proceed with this payment?\')">
<input type="hidden" name="ap_purchasetype" value="other" />
<input type="hidden" name="ap_merchant" value="<?=AP_MERCHANT?>" />
<input type="hidden" name="ap_itemname" value="subscription"/>
<input type="hidden" name="ap_quantity" value="1" />
<input type="hidden" name="ap_amount" value='5'/>
<input type="hidden" name="ap_currency" value="USD" />
<input type="hidden" name="ap_returnurl" value="http://<?=$_SERVER['HTTP_HOST']?>/affiliworx/ap_confirm.php" />
<input type="hidden" name="ap_cancelurl" value="http://<?=$_SERVER['HTTP_HOST']?>" />
<input type="hidden" name="apc_1" value="test1" />	<!--additional info -->
<input type="hidden" name="apc_2" value="Membership Fee" />	<!--additional info -->
<input type="hidden" name="apc_3" value='stream3x3' /><!--additional info -->								

<input type="submit" style="background:url(images/asub.gif) no-repeat center  center;width:130px;height:28px;cursor:pointer; border:0px" value="" name="submit" id="submitap" />

</form><?php */?>



<form id="frmap" name="frmap" method="post" action="<?=AP_URL?>" onsubmit="return confirm('Do you wish to proceed with this payment?')">
<input type="hidden" name="ap_purchasetype" value="other" />
<input type="hidden" name="ap_merchant" value="<?=AP_MERCHANT?>" />
<input type="hidden" name="ap_itemname" value="MST Membership Fee"/>
<input type="hidden" name="ap_quantity" value="1" />
<input type="hidden" name="ap_amount" id="ap_amount" value="20"/>
<input type="hidden" name="ap_currency" value="USD" />
<input type="hidden" name="ap_returnurl" value="http://<?=$_SERVER['HTTP_HOST']?>/affiliworx/ap_confirm.php" />
<input type="hidden" name="ap_cancelurl" value="http://<?=$_SERVER['HTTP_HOST']?>/affiliworx/ap_form.php" />
<input type="hidden" name="apc_1" value="test123" />	<!--additional info -->
<input type="hidden" name="apc_2" value="Activationcharge" />	<!--additional info -->


<input type="submit" style="background:url(images/alertpay.jpg) no-repeat center  center;width:70px;height:25px;cursor:pointer;" value="" name="submit" id="submitap" />

</form>