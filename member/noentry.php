<? 
	require_once('../business_logic/config/configure.php');
	//if($_REQUEST['file']!="login") {
	//echo $_SESSION['sess_sp_id']; die;
		if(!isset($_SESSION['userid']) && $_SESSION['userid'] =="") {
			//header('location:index.php?file=login');
			?>
			<script type="text/javascript" language="javascript">
				window.location = "../login.php";
			</script>
			<?
			die;
		 }
?>