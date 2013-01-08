<?php
	include_once '../business_logic/config/configure.php';
	require_once("../business_logic/class/form.class.php");
	include_once 'noentry.php';
	$reqest_page_h =$_GET['file'];
	$form = new Form();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
<title>G.E.N. Founders</title>
<link href="css/styles.css" rel="stylesheet" type="text/css" />
<link href="css/form.css" rel="stylesheet" type="text/css" />
<style type="text/css">
.myform div.fieldbox input[type=submit]
{	
	border: 1px solid #68a341; box-shadow: 0 1px 2px 0 #a4ca6c inset; -webkit-box-shadow: 0 1px 2px 0 #a4ca6c inset; -moz-box-shadow: 0 1px 2px 0 #a4ca6c inset;
	background: #96c161 !important;
	background: -moz-linear-gradient(top,  #96c161 0%, #609c3d 100%) !important;
	background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,#96c161), color-stop(100%,#609c3d)) !important;
	background: -webkit-linear-gradient(top, #96c161 0%,#609c3d 100%) !important;
	background: -o-linear-gradient(top, #96c161 0%,#609c3d 100%) !important;
	background: -ms-linear-gradient(top, #96c161 0%,#609c3d 100%) !important;
	background: linear-gradient(top, #96c161 0%,#609c3d 100%) !important;
}
</style>
<script type="text/javascript">
	var SERVER_URL = "<?=SERVER_URL?>";
	var MEMBER_URL = "<?=MEMBER_URL?>";
	var ADMIN_URL = "<?=ADMIN_URL?>";
	var HTTP_URL = "<?=HTTP_URL?>";
	var adminsession = "<?=(isset($_SESSION['admin']['userid'])?1:0)?>";
</script>
<!--[if IE]> <link href="css/ie.css" rel="stylesheet" type="text/css"> <![endif]-->
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.min.js"></script>
<script type="text/javascript" src="js/plugins/forms/ui.spinner.js"></script>
<script type="text/javascript" src="js/plugins/forms/jquery.mousewheel.js"></script>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js"></script>
<script type="text/javascript" src="js/plugins/charts/excanvas.min.js"></script>
<script type="text/javascript" src="js/plugins/charts/jquery.flot.js"></script>
<script type="text/javascript" src="js/plugins/charts/jquery.flot.orderBars.js"></script>
<script type="text/javascript" src="js/plugins/charts/jquery.flot.pie.js"></script>
<script type="text/javascript" src="js/plugins/charts/jquery.flot.resize.js"></script>
<script type="text/javascript" src="js/plugins/charts/jquery.sparkline.min.js"></script>
<script type="text/javascript" src="js/plugins/tables/jquery.dataTables.js"></script>
<script type="text/javascript" src="js/plugins/tables/jquery.sortable.js"></script>
<script type="text/javascript" src="js/plugins/tables/jquery.resizable.js"></script>
<script type="text/javascript" src="js/plugins/forms/autogrowtextarea.js"></script>
<script type="text/javascript" src="js/plugins/forms/jquery.uniform.js"></script>
<script type="text/javascript" src="js/plugins/forms/jquery.inputlimiter.min.js"></script>
<script type="text/javascript" src="js/plugins/forms/jquery.tagsinput.min.js"></script>
<script type="text/javascript" src="js/plugins/forms/jquery.maskedinput.min.js"></script>
<script type="text/javascript" src="js/plugins/forms/jquery.autotab.js"></script>
<script type="text/javascript" src="js/plugins/forms/jquery.chosen.min.js"></script>
<script type="text/javascript" src="js/plugins/forms/jquery.dualListBox.js"></script>
<script type="text/javascript" src="js/plugins/forms/jquery.cleditor.js"></script>
<script type="text/javascript" src="js/plugins/forms/jquery.ibutton.js"></script>
<script type="text/javascript" src="js/plugins/forms/jquery.validationEngine-en.js"></script>
<script type="text/javascript" src="js/plugins/forms/jquery.validationEngine.js"></script>
<script type="text/javascript" src="js/plugins/uploader/plupload.js"></script>
<script type="text/javascript" src="js/plugins/uploader/plupload.html4.js"></script>
<script type="text/javascript" src="js/plugins/uploader/plupload.html5.js"></script>
<script type="text/javascript" src="js/plugins/uploader/jquery.plupload.queue.js"></script>
<script type="text/javascript" src="js/plugins/wizards/jquery.form.wizard.js"></script>
<script type="text/javascript" src="js/plugins/wizards/jquery.validate.js"></script>
<script type="text/javascript" src="js/plugins/wizards/jquery.form.js"></script>
<script type="text/javascript" src="js/plugins/ui/jquery.collapsible.min.js"></script>
<script type="text/javascript" src="js/plugins/ui/jquery.breadcrumbs.js"></script>
<script type="text/javascript" src="js/plugins/ui/jquery.tipsy.js"></script>
<script type="text/javascript" src="js/plugins/ui/jquery.progress.js"></script>
<script type="text/javascript" src="js/plugins/ui/jquery.timeentry.min.js"></script>
<script type="text/javascript" src="js/plugins/ui/jquery.colorpicker.js"></script>
<script type="text/javascript" src="js/plugins/ui/jquery.jgrowl.js"></script>
<script type="text/javascript" src="js/plugins/ui/jquery.fancybox.js"></script>
<script type="text/javascript" src="js/plugins/ui/jquery.fileTree.js"></script>
<script type="text/javascript" src="js/plugins/ui/jquery.sourcerer.js"></script>
<script type="text/javascript" src="js/plugins/others/jquery.fullcalendar.js"></script>
<script type="text/javascript" src="js/plugins/others/jquery.elfinder.js"></script>
<script type="text/javascript" src="js/plugins/ui/jquery.easytabs.min.js"></script>
<script type="text/javascript" src="js/files/bootstrap.js"></script>
<script type="text/javascript" src="js/files/functions.js"></script>
<script type="text/javascript" src="js/general.js"></script>
<script type="text/javascript" src="js/files/login.js"></script>
<script language="javascript">
		
		function getXMLHTTP() { //fuction to return the xml http object
						var xmlhttp=false;	
						try{
							xmlhttp=new XMLHttpRequest();
						}
						catch(e)	{		
							try{			
								xmlhttp= new ActiveXObject("Microsoft.XMLHTTP");
							}
							catch(e){
								try{
								xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
								}
								catch(e1){
									xmlhttp=false;
								}
							}
						}
							
						return xmlhttp;
					}

		</script>
		<style type="text/css">
		.button_green
		{
			    background: -moz-linear-gradient(center top , #96C161 0%, #609C3D 100%) repeat scroll 0 0 transparent !important;
				border: 1px solid #68A341 !important;
				box-shadow: 0 1px 2px 0 #A4CA6C inset !important;
				width:80px !important;
				float:left;
				padding:5px 10px 7px 11px !important;
				margin:0 10px 0 0 !important;
		}
		</style>
</head>
<body>
<!-- Top line begins -->
<?php 
			if($_GET['file']!='login')
			{
				?>
				<div id="top">
				  <?php include_once "top/top_navigation.php" ?>
				</div>
				<!-- Sidebar begins -->
				<div id="sidebar">
				  <?php include_once "left/left_main_menu.php" ?>
				</div>
				<?php
			} 
		 	if(isset($_GET['file'])) 
			{
				include_once ADMIN_PATH."middle/".$_REQUEST['file'].'.php';
			}
			else 
			{
				include_once ADMIN_PATH."middle/welcome.php";
			}	
		?>
<?php 
			if($_GET['file']!='login')
			{ 
		?>
<? //include 'bottom/bottom.php'; ?>
<?  } ?>
</body>
</html>
<script type="text/javascript">		
	<?		
	if($msg != 'admin@gen.com') {
	if(isset($msg) && !empty($msg)){
		?>
		$.jGrowl('<?=$msg?>');
		<?
	}
	if(isset($_GET['msg']) && !empty($_GET['msg']))
	{
		?>
		$.jGrowl('Record(s) successfully updated .');
		<?
	} }
	?>
</script> 