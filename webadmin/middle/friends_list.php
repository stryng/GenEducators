<?php	if(isset($_REQUEST['msg']) && !empty($_REQUEST['msg'])) $msg=$_REQUEST['msg'];

	$table = "userdetail";
	$title = "Member Listing";
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
	$rtn_type .= " AND inviter='".$_SESSION['admin']['userid']."'";
	$form = new Form();
	$form->PaginationTable($table);
	$form->PageName = (isset($_REQUEST['keyword'])&& $_REQUEST['keyword']!="")?"file=friends_list&keyword=".$_REQUEST['keyword']:"file=friends_list";;
	$limit = (isset($_GET['limit']) && $_GET['limit']>0)?$_GET['limit']:10;
	$form->PageLimit($limit);	
	if(isset($_POST['keyword']) && $_POST['keyword']!= "")
	{
		$_GET['page'] == 0;
	}
	$form->getPage($_GET['page']);
	$sql  = "SELECT * FROM `{$table}` WHERE 1 $rtn_type ";
	$db_res = $form->getParray($sql);
	//echo sizeof($db_res);
?>
<div id="content">
  	  	<div class="wrapper">
		<div class="widget" >
        <?
		/*	$n=$_REQUEST['n'];
			$sorton=$_REQUEST['sorton'];
			$sorttype=$_REQUEST['sorttype']; 
			
			$tableName="userdetail";
			
			$sec_table = 'm_payment_fee';
			
			$num_totrec = $obj->count_member_detail($tableName,$_SESSION['admin']['userid']);
			
			$var_extra = $var_extra . "&num_totrec=" . $num_totrec;
			$var_extra = $var_extra . "&n=" . $n;
			
			include(FUNCTION_PATH."paging.php");
			
			if (!isset($sorton)) $sorton = "UserId";
			
			if (!isset($sorttype)) $sorttype = "ASC";
			
			$db_res = $obj->get_member_detail($tableName, $sorton, $sorttype,$var_limit,$_SESSION['admin']['userid']);

			*/
		?>
			<div class="whead">
				<h6>
					<span class="ico  gray arrow_bidirectional"></span>Member Listing
				</h6>
                 <a class="buttonH bGreen"  title="Add Product" href="<?=INDEX_FILE?>invitefriends">Invite Friend</a>
                        
				<div class="clear"></div> 
			</div> <!-- whead end -->
			<div class="tablePars">
				<div class="dataTables_filter set_tble_search"> 
				  <div>
                 	<form  name="searchform" id="searchform" method="post" action="index.php?file=friends_list<?=$str_url?>" class="myform" > 
							<div class="floatleft"> 
								<span> Member Search </span>
                                <input type="hidden" name="option" id="option" value="Name"/>
                                <input type="text" class="border_blue width_set textfield" size="30" name="keyword"  value="<?=$_REQUEST['keyword'];?>">
							</div>
							<div class="floatleft padleft20"> 
								<a  onclick="javascript:document.getElementById('searchform').submit()" class="buttonS bBlue mb10">Search</a> 
								<a href="<?=INDEX_FILE?>friends_list" class="buttonS bRed mb10">Refresh</a> 
							</div>
							<div style="floatleft padleft20">
							 <?php echo $form->ShowLimit("Show Entries:",array("5","10",20,30,40,50)); ?>
							</div>
							<div style="clear:both;"></div>
					</form>
				  </div>
				</div> <!-- dataTables_filter End -->
				<?php /*?><div class="dataTables_length tble_drop_set">
				  <label>
                  	<div class="floatR"><?php  echo createpagecombo();?></div>
				  	<span class="showentries floatR">Show Entries:</span>
				  </label>
				</div><?php */?>
            <div class="clear"></div>
		 	</div> <!-- tablePars End -->
			<div class="clear"></div>
			<?
			  if($msg != ""){ ?>
					<script>
					showSuccess('<?=$msg?>',3000);
					</script>
			  <? } ?>	
			 <div class="hiddenpars">
        		<form class="tableName toolbar" id="frmbt_master" name="frmbt_master" method="post" action="<?=INDEX_FILE?>friends_list<?=$str_url?>">
				  <table cellpadding="0" cellspacing="0" width="100%" class="tDefault checkAll check" id="checkAll">
					<thead>
					  <tr>
						<td>10*3</td>
						<td>5*3</td>
                        <td>ID</td>
                        <td>Name</td>
                        <td>Phone</td>
                        <td>Email</td>
                        <td>Skype</td>
                        <td>Friends</td>
                        <td>Status</td>
					  </tr>
					</thead>
					<tbody>
					<? 
					$inviter = "inviter";
					$sec_table = "m_payment_fee";
					if(count($db_res)>0)
					{
							for($i = 0;$i < count($db_res);$i++)
							{ 
								$qry = "select count(*) as total from userdetail,m_payment_fee mp where inviter = '".$db_res[$i]['UserId']."' and UserId=mp.usertb_id and mp.payment_done = 'YES'";
								$fri = $form->getRow($qry);
								
								if(isset($member['level'][$rows['UserId']]))
								{?>
											<tr> 
												<td align="center"> <? if($db_res[$i]['usercode_10_3']==0) { echo "No"; } else { echo $db_res[$i]['usercode_10_3']; } ?> </td>
												<td align="center"> <? if($db_res[$i]['usercode_5_3']==0) { echo "No"; } else { echo $db_res[$i]['usercode_5_3']; } ?> </td>
												<td align="center"> <?=$db_res[$i]['UserId']; ?> </td>
												<td align="left"><?=$db_res[$i]['FirstName'];?> &nbsp;<?=$db_res[$i]['LastName'];?></td>
												<td align="left"> <?=$db_res[$i]['Phone']; ?> </td>
												<td align="left"> <?=$db_res[$i]['Email']; ?> </td>
												<td align="left"> <?=$db_res[$i]['skype']; ?> </td>
												<td align="left">
													<?php 
														echo $fri['total'];
														//if($rows['Gender']=='M') { echo "Male"; } else {echo "Female";}
													?>
												</td>
												<td align="left"><?php if($db_res[$i]['active']=='1') { echo "Activated"; } else {echo "Deactivated";}?></td>
											</tr>
									<?
								}
								else
								{
									?>
									<tr>
												<td align="center"> <? if($db_res[$i]['usercode_10_3']==0) { echo "No"; } else { echo $db_res[$i]['usercode_10_3']; } ?> </td>
												<td align="center"> <? if($db_res[$i]['usercode_5_3']==0) { echo "No"; } else { echo $db_res[$i]['usercode_5_3']; } ?> </td>
												<td align="center"> <?=$db_res[$i]['UserId']; ?> </td>
												<td align="left"><?=$db_res[$i]['FirstName'];?> &nbsp;<?=$db_res[$i]['LastName'];?></td>
												<td align="left"> <?=$db_res[$i]['Phone']; ?> </td>
												<td align="left"> <?=$db_res[$i]['Email']; ?> </td>
												<td align="left"> <?=$db_res[$i]['skype']; ?> </td>
												<td align="left">
													<?php  echo $fri['total']; //if($rows['Gender']=='M') { echo "Male"; } else {echo "Female";}?>
												</td>
												<td align="left"><?php if($db_res[$i]['active']=='1') { echo "Activated"; } else {echo "Deactivated";}?></td>
											</tr>
									<?
								}
							}
					}
					else
					{
						?>
						<tr>
							<td align="center" colspan="6">No records found </td>
						</tr>
						<?
					} ?>
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
	</div> <!-- content end -->
   </div>
