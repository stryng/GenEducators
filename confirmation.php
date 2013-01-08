<?
	include_once 'business_logic/config/configure.php';
	require_once("business_logic/class/form.class.php");
	//$db = new DBConnection;
		
	
	if(!isset($_GET['uid']) || !isset($_GET['passkey']))
	{
		header("location:".SERVER_URL."login.php");
		die();
	}
	$msg = "";
	
	$form = new Form();
	
	// Passkey that got from link
		$passkey=$_GET['passkey'];
	
		//$tbl_name1="temp_members_db";
	
		// Retrieve data from table where row that match this passkey
		
		
		 
		$sql1="SELECT * FROM userdetail WHERE usercode ='".$passkey."' and UserId = '".$_GET['uid']."'";
		$row = $form->getRow($sql1);
		// If successfully queried
		if(is_array($row) && sizeof($row)>0)
		{
				if(isset($row['Placement']) && $row['Placement'] == "")
				{
					include_once("ap_confirmation.php");
					$msg  = userdetails($form,$_GET['uid'],$passkey);
				}
				if($msg == "")
				{
					$msg = "Your Registration is done successfully";
				}
		}
		else
		{
			$msg = "Please contact administrator";
		}
?>
<script type="text/javascript">
	alert("<?=$msg?>");
	window.location= "<?=SERVER_URL?>index.php";
</script>