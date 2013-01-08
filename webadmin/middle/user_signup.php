<?php 
	if(isset($_REQUEST['msg']) && !empty($_REQUEST['msg'])) $msg=$_REQUEST['msg'];

	$table = "userdetail";
	$title = "Member Details";
	$selected = "Active";
	function chk_type($search_word)
	{
			$findme = ' ';
			$pos = strpos($search_word, $findme);
			if(strlen($search_word)>0 ){
				if ($pos !== false) {
					$keyword = explode(' ',$search_word);
					$type = "and ( FirstName like '%".trim(strtolower ($keyword[0]))."%' or LastName like '%".trim(strtolower ($keyword[1]))."%' ) ";
				}else{
					$findme = '@';
					$pos = strpos($search_word, $findme);
					if ($pos !== false) {
						if(is_numeric($search_word))
						{
							$type = "and UserId = '".$search_word."'";
						}
						else
						{
							$type = "and Email like '%".$search_word."%'";
						}
					}else{
						if(is_numeric($search_word))
						{
							$type = "and UserId = '".$search_word."' ";
						}
						else
						{
							$type = "and( FirstName like '%".trim(strtolower ($search_word))."%' or LastName like '%".trim(strtolower ($search_word))."%' )";
						}
					}
				}	
			}else{
				$type = " and active = ".$selected;		
			}
			return $type;
	}
	$rtn_type = "";
	if( isset($_REQUEST['keyword']) && $_REQUEST['keyword'] != "")
	{
		$selected = isset($_REQUEST['status'])?$_REQUEST['status']:"";
		$search_word = trim($_REQUEST['keyword']);
		$rtn_type = chk_type($search_word);
		$keyword = explode(' ',$search_word);
	}

	$form = new Form();
	$form->PaginationTable($table);
	$form->PageName = isset($_GET['keyword'])?"file=member_list&keyword=".$_GET['keyword']:"file=member_list";;
	$limit = (isset($_GET['limit']) && $_GET['limit']>0)?$_GET['limit']:5;
	$form->PageLimit($limit);	
	$form->getPage($_GET['page']);
	$sql  = "SELECT * FROM `{$table}` WHERE 1 $rtn_type  and active = '1'";
	$rows = $form->getParray($sql);
?>
<script language="javascript">
	function getSearch() {
		var page = '<?php echo isset($_GET['page'])?$_GET['page']:0; ?>';
		window.location = '?file=user_signup&page='+page+'&keyword='+document.getElementById('keyword').value;
	}
	function inviterid(id)
	{
		//alert("name inviter id "+id);
		document.getElementById('inviter').value = id;
	}
</script>
<style type="text/css">
	#content
	{
		padding-bottom:0px !important;
	}
</style>
<!-- full width -->
<div id="content">
  <div class="wrapper">
		<div class="widget" >
			<div class="whead">
				<h6>
					<span class="ico  gray arrow_bidirectional"></span><?php echo $title; ?>
				</h6>
				<div class="clear"></div> 
				
			</div> <!-- whead end -->
			
			<div class="tablePars">
				<div class="dataTables_filter"> 
				  <div >
					<form name="searchform" id="searchform" method="post" action="index.php?file=user_signup<?=$str_url?>">
						<table width="100%">
							<tr>
								<td>
								<div class="floatleft padleft20">
								<span> Search Member </span>
									<input type="hidden" name="option" id="option" value="business_name"/>
									<input type="text" size="30" class="border_blue width_set textfield" name="keyword"  id="keyword" value="<? echo isset($_REQUEST['keyword'])?$_REQUEST['keyword']:""; ?>">
							</div>
							<div class="floatleft padleft20">
								<!-- <input type="submit" style="display:none;" /> -->
								<a  onclick="javascript:getSearch();" class="buttonS bBlue mb10">Search</a>
								<a href="<?=INDEX_FILE?>user_signup" class="buttonS bRed mb10">Refresh</a>
							</div>
							<div style="clear:both;"></div>
								</td>
								<td style="float:right;" align="right"  width="100">
									<?php echo $form->ShowLimit("Show Entries:",array("5","10",20,30,40,50)); ?>
								</td>
							</tr>
						</table>
					</form>
				  </div>
				</div> <!-- dataTables_filter End -->
				<div class="dataTables_length">
			</div>
		 	</div> <!-- tablePars End -->
      		<div class="clear"></div>
			
			 <div class="hiddenpars">
        		<form class="tableName toolbar" id="frm_usersignup" name="frm_usersignup" method="post" action="<?=INDEX_FILE?>user_signup<?=$str_url?>">
				  <input type="hidden" name="action" id="action" />
				  <table cellpadding="0" cellspacing="0" width="100%" class="tDefault checkAll check" id="checkAll">
					<thead>
						  <tr>
								<td></td>
								<td>UserId</td>
								<td>Name</td>
								<td>Email</td>
						  </tr>
					</thead>
					<tbody>
					  	<?php  
								$inviter = "inviter";
								$sec_table = "m_payment_fee";

								if(is_array($rows) && sizeof($rows)) { 
									foreach($rows as $row) { 
											?>	
											<tr>
												<td><?php
														if($cnt_i == 0)
														{
															$selected_userid = $row['UserId'];
															?>
															<input type="radio" name="radio_value" id="radio_value" value="<? echo $row['UserId']; ?>" onClick="inviterid('<?=$row['UserId']; ?>')"  checked="checked" /></td>
															<?
															$cnt_i++;
														}
														else
														{
														?>
															<input type="radio" name="radio_value" id="radio_value" value="<? echo $row['UserId']; ?>" onClick="inviterid('<?=$row['UserId']; ?>')"  /></td>
														<?
															$cnt_i++;
														}?>
												</td>
												<td><?=$row["UserId"];?></td>
												<td><?=$row['FirstName'];?>&nbsp;<?=$row['LastName'];?></td>
												<td><?=$row['Email'];?></td>
											</tr>
											<?php
									}
								}else{ 
					?>
							<tr>
								<td>No record found</td>
							</tr>
						<?php } ?>
					 </tbody>
				  </table>
				</form>
        		<div class="fg-toolbar tableFooter">
          			<div class="dataTables_paginate paging_full_numbers" id="dynamic_paginate"> 
					 <?php echo $form->pageLinks();  ?>
					 </div>
        		</div>
      		</div> <!-- hiddenpars End -->
		</div>
	</div>
</div> <!-- content end -->

	<div class="clear"></div>
	<? //include("user_insert.php");
		include("user_signup_details.php");
	?>
</div> <!-- wrapper end -->
<!-- End full width -->
