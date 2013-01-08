<? 
	include_once '../business_logic/config/configure.php';
	if($_REQUEST['file']!="login") {
		if(!isset($_SESSION['admin']['userid'])) {
			//header('location:index.php?file=login');
		?>
			<script type="text/javascript" language="javascript">
			window.location = "index.php?file=login";
			</script>
		<? } 
	}
?>


