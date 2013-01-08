<?php
	if(isset($_GET['stream']) && $_GET['stream'] == "5_3")
	{
		?>
		<script type="text/javascript">
			window.location="index.php?file=volunteers&marics=53&msg=Under progress";
		</script>
		<?php
	}
	else if(isset($_GET['stream']) && $_GET['stream'] == "10_3")
	{
		?>
		<script type="text/javascript">
			window.location="index.php?file=volunteers&marics=103&msg=Under progress";
		</script>
		<?php
	}
	else
	{
		?>
		<script type="text/javascript">
			window.location="index.php?file=volunteers&marics=33&msg=Under progress";
		</script>
		<?php
	}

?>