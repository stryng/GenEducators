<? 

	include_once 'business_logic/config/configure.php'; 

	require_once CLASS_PATH.'admin_page_content.php';

	$page_obj = new admin_page_content;



	include('js_css_files.php')

?>

	<style type="text/css">

	#container

	{

		background:none;

	}

	#featured_slide_inner

	{

		height:100%;

	}

	.col2

	{

		height:530px;

		background:#000000;

	}

	.col0

	{

		color:#000000;

		background:#000000;

	}

	.color1

	{

		color:#43AEEC;

		font:400 24px/25px 'Lato',sans-serif;

	}

	</style>

</head>





<body id="top">

	<?php include('top/top_login.php') ?>

	

	<!-- ####################################################################################################### -->

	

	<?php include('top/top_menu.php') ?>

	

	<!-- ####################################################################################################### -->

	

	<?php //include('slider/static.php') ?>

	

	<!-- ####################################################################################################### -->

	

	<div class="wrapper col3">

		<div id="container">

			<div id="content">

				<div class="full_box">

					<h2>

						<?

						$page = $page_obj->get_page_content_single_detail(11);

						echo $page['0']['Pag_Title'];

						$page_des = strip_tags($page[0]['Pag_Desc']);

						?>

					</h2>

					<div class="full_box_inner">

						<p>

							<?php /*?><span class="firstLetter"><span><?php echo substr($page_des,0,4) ?></span></span><?php */?>

							<?=$page[0]['Pag_Desc']?>

						</p>

					</div>

				</div>

			</div>

		</div>

</div>

	

	<!-- ####################################################################################################### -->

	<?php include('bottom/bottom_blue_line.php') ?>

	

	<!-- ####################################################################################################### -->

	<?php include('bottom/bottom_link.php') ?>



	<!-- ####################################################################################################### -->

	<?php include('bottom/copyright.php') ?>



</body>

</html>