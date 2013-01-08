<?php
$row = array();
if(isset($_REQUEST['txtpage_contentid']) && !empty($_REQUEST['txtpage_contentid'])) {
	$txtpage_contentid=$_REQUEST['txtpage_contentid'];
	$query = "SELECT * FROM page_content where Pag_Id='".$txtpage_contentid."'";
	$row = $form->getRow($query);
}
$msg = "";

		$str_msg = "";
		$form->values 			=  (sizeof($_POST)>0)?$_POST:$row;
		$form->fields 			=  array(
			"Page Title"  		=> array("name"=>"Pag_Title","type"=>"text", "validate"=>"R"),
			"Page Description"  => array("name"=>"editor","type"=>"textarea","save2db"=>"false", "validate"=>"R","value"=>$row['Pag_Desc']),
			"Page MetaKeyword" 	=> array("name"=>"Pag_MetaKeyword","type"=>"text", "validate"=>"R"),
			"Page MetaDescription" => array("name"=>"Pag_MetaDesc","type"=>"text", "validate"=>"R"),
			"Page Status"  		=> array("name"=>"Pag_Status","type"=>"dropdown","values"=>array(array("Active"=>"Active"),array("Inactive"=>"Inactive"))),
		);
		
		
		if(sizeof($_POST)>0) {

			if($form->validate())
			{
				$table = 'page_content';

				$form->addField("page_description",array("name"=>"Pag_Desc","type"=>"hidden","value"=>$_POST['editor']));
				if($txtpage_contentid>0)
				{
					$idx = $form->updateOnTable($table,array(array("Pag_Id"=>$txtpage_contentid)));
					if($idx=="success") 
						echo '<script>document.location="index.php?file=page_content_listing&msg=Updated Successfully."</script>';
				}else{
					$idx = $form->processOnTable($table);
					?>
					<script language="javascript" type="text/javascript">
						window.location = "index.php?file=page_content_listing";
					</script>
					<?php
					header("location:index.php?file=page_content_listing&msg=Updated Successfully");
					die;
				}
			}
		}

?>
<!-- Content begins -->
	<style>
	label[for=Pag_Desc] { display:none;}
	.cleditorMain
	{
		width:50% !important;
		background:none repeat scroll 0 0 #F7F7F7;
		border:1px solid #F0F0F0;
		float:left;
	}
	</style>
<script type="text/javascript">
	function backbtnclick()
	{
		window.location = "<?=SERVER_URL?>index.php?file=page_content_listing";
	}
	
	function check_form(f, event){
	
			var result = vl_FormEventHandler(event);
			return result;
	}
</script>
<style type="text/css">
.vlErrorMsg
{
	padding-left:0px;
}
.vlNoErrorMsg {
	padding-left: 0px;
}
</style>


 		<div id="content">
		<!-- Main content -->
		<div class="wrapper check">
			<div class="fluid">
				<div class="widget grid12">
              		<div class="whead">
                    	<h6>
							Invite a Friend
						</h6>
						<div class="whead">
							<ul class="titleToolbar">
								<li><a onclick="javascript:window.location='<?=INDEX_FILE?>page_content_listing'">Back</a></li>
							</ul> 
							<div class="clear"></div>
						</div>						
					</div> <!-- End whead -->	
					<div class="body" style="padding:0px;">
						<form id="form1" name="form1" action="" method="post" class="myform">
                            <div style="margin-left:25px">
								<p>
								<?php echo $form->showMessage(); 
								if($str_msg == "")
								{
									$form->display();
									?>
									<div class="fieldbox">
										<input type="submit" value="Submit" class="buttonH button_green"  />
										<a href="index.php?file=page_content_listing" class="buttonS bRed">Back</a>
									</div>
									<?php
								}
								?>
								</p>
								
							</div>
							
							<div id="repl_message">
							</div>
						</form>
					</div><!-- Body end -->
				</div> <!-- widget End -->
			</div><!-- fluid End -->	
		</div><!-- wrapper End -->
		</div> <!-- Content -->
<script type="text/javascript">
	document.getElementById("editor").value = document.getElementById("Pag_Desc").value;
</script>