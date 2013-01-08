<? 
	require_once CLASS_PATH.'admin_page_content.php';
	$page_obj = new admin_page_content;
?>

	<!-- Content begins -->
		<div id="content">
			
			<?php /*?><div class="contentTop">
		<!-- Page Title varialbe here set it from middle files -->
		
	
		<div class="clear"></div>
	</div><?php */?>
			
			<!-- Main content -->
				<div class="wrapper">
				   <div class="widget">
						<div class="full_box_inner" style="min-height:100px;">
							<p>
								<?php
									$page = $page_obj->get_page_content_single_detail(8);
									echo $page[0]['Pag_Desc'];
								?>
							</p>
					</div>
					</div>
			  </div>
			<!-- Main content ends -->
		</div>
	<!-- Content ends -->


