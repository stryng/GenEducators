<? 

if(isset($_SESSION['admin']['userid'])) {

        @session_unset($_SESSION['usertype']);
		@session_unset($_SESSION['admin']['usertype']);
		@session_unset($_SESSION['username']);
		@session_unset($_SESSION['admin']['username']);
		@session_unset($_SESSION['uid']);
		@session_unset($_SESSION['admin']['uid']);
		@session_unset($_SESSION['admin']['userid']);
        session_destroy();
}

if(!isset($_SESSION['admin']['userid'])) { ?>
	<script language="javascript">
	//header('location:noentry.php');
	document.location.href='index.php?file=login';
	</script>
<? }
?>