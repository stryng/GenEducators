<?
	include_once '../business_logic/config/configure.php';
	require_once("../business_logic/class/form.class.php");
	//include_once 'noentry.php';
	$form = new Form();
	//print_r($_SESSION);die;
if(!isset($_SESSION['admin']['username']))
{
	header("Location:".ADMIN_URL."index.php?file=login");
	die;
}
else
{
	$_SESSION['usertype'] = "enduser";
	$_SESSION['username'] = $_GET['user_name'];
	$_SESSION['userid'] = $_GET['user_id'];
	$uidstr = "'".$_SESSION['userid']."'";
	$qry = "select usertb_id from m_payment_fee where  usertb_id = '".$_GET['user_id']."' and activedeactive = 'active' and payment_done = 'YES'";
	$row = $form->getArray($qry);
	if(sizeof($row)>0)
	{
		$_SESSION[$uidstr]['useractive']  = true;
	}
	header("Location:".MEMBER_URL."index.php");
}
?>