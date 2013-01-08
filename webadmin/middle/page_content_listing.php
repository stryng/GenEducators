<?
require_once CLASS_PATH.'admin_page_content.php';
$obj = new admin_page_content;
$action = $_REQUEST['action'];
if(isset($action) && !empty($action)) {
	$msg='';
	$msg=$obj->funoperation();
}
if(isset($_REQUEST['msgtextpage_content']) && !empty($_REQUEST['msgtextpage_content'])) {
	$msg=$_REQUEST['msgtextpage_content'];
}
$n=$_REQUEST['n'];
$sorton=$_REQUEST['sorton'];
$sorttype=$_REQUEST['sorttype'];
$keyword=$_REQUEST['keyword'];
$option=$_REQUEST['option'];

$num_totrec = $obj->count_page_content_detail($option, $keyword);

$var_extra = $var_extra . "&num_totrec=" . $num_totrec;
$var_extra = $var_extra . "&n=" . $n;

include(FUNCTION_PATH."paging.php");

if (!isset($sorton)) $sorton = "Pag_Id";

if (!isset($sorttype)) $sorttype = "ASC";

$db_res = $obj->get_page_content_detail($sorton, $sorttype, $option, $keyword, $var_limit);

?>
<script language="javascript">
function status_edit(v_value) {
	document.location.href="index.php?file=page_content_detail&txtpage_contentid="+v_value;
}
</script>

<!-- full width -->
        <div id="content">
  	  	<div class="wrapper">
		<div class="widget" >
    		<div class="whead">
				<h6>
					<span class="ico  gray arrow_bidirectional"></span>Page Content
				</h6>
                <!-- <a class="buttonH bGreen" onclick="setaction('chk[]','active', 'Are you sure, you want to active selected records?', 'frmconfigure')">Active</a>
                <a class="buttonH bRed" onclick="setaction('chk[]','inactive', 'Are you sure, you want to inactive selected records?', 'frmconfigure')">Inactive</a> -->
                <a class="buttonH bGreen" href="index.php?file=page_content_detail">Add</a>
                <!--<a class="buttonH bRed" onclick="setaction('chk[]','delete', 'Are you sure, you want to delete selected records?', 'frmbt_master')">Delete</a>-->
                
                
                <!-- <a class="buttonH bGreen" href="javascript:setchecked('chk[]',1)">Check All</a>
                <a class="buttonH bRed" href="javascript:setchecked('chk[]',0)">Uncheck All</a>-->
				<div class="clear"></div> 
				
			</div> <!-- whead end -->
			<div class="tablePars">
				<div class="dataTables_filter"> 
				  <div style="display:none">
                 	<!-- <form  name="searchform" id="searchform" method="post" action="index.php?file=customer-detial<?=$str_url?>"> 
							<div class="floatleft padleft20"> 
								<span> Customer Search </span>
                                <input type="hidden" name="option" id="option" value="Name"/>
                                <input type="text" class="border_blue width_set textfield" size="30" name="keyword"  value="<?=$keyword;?>">
							</div>
							<div class="floatleft padleft20"> 
								<a  onclick="javascript:document.getElementById('searchform').submit()" class="buttonS bBlue mb10">Search</a> 
								<a href="<?=INDEX_FILE?>customer-detial" class="buttonS bRed mb10">Refresh</a> 
							</div>
							<?php /*?><div style="floatleft padleft20">
							  <input type="submit" name="Search" value="Search" class="buttonS bBlue mb10">
							  <a class="buttonS bRed mb10" href="<?=INDEX_FILE?>state_master_listing"/>Refresh</a>
							</div><?php */?>
							<div style="clear:both;"></div>
							
					</form>-->
				  </div>
				</div> <!-- dataTables_filter End -->
				<div class="dataTables_length">
				  <label>
				  	<span class="showentries">Show Entries:</span>
				 	 <div ><?php  echo createpagecombo();?></div>
				  </label>
				</div>
		 	</div> <!-- tablePars End -->
			
			<div class="clear"></div>
			<?
			  if($msg != ""){ ?>
					<script>
					showSuccess('<?=$msg?>',3000);
					</script>
			  <? } ?>	
			 <div class="hiddenpars">
        		<form class="tableName toolbar" id="frmbt_master" name="frmbt_master" method="post" action="<?=INDEX_FILE?>page_content_listing">
				  <input type="hidden" name="action" id="action" />
                  <table cellpadding="0" cellspacing="0" width="100%" class="tDefault checkAll check" id="checkAll">
					<thead>
					  <tr>
						<td><span class="titleIcon check"><input type="checkbox" id="titleCheck" name="titleCheck" /></span></td>
						<td >Page Title</td>
						<td >Status</td>
                        <td width="50px">Action</td>
					  </tr>
					</thead>
					<tbody>
						<? for($i = 0;$i < count($db_res);$i++) { ?>
                          <tr>
                            <td><input type="checkbox" name="chk[]" class="chkbox"  id="chk<?=$i?>" value="<?=$db_res[$i]["Pag_Id"];?>"/></td>
                            <td><?=$db_res[$i]['Pag_Title'];?></td>
                            <td><?=$db_res[$i]['Pag_Status'];?></td>
                            <td>
                                <a onclick="status_edit(<?=$db_res[$i]['Pag_Id'];?>)" class="tablectrl_small bBlue tipS" title="Edit"><span class="iconb" data-icon="&#xe1db"></span></a>
                                <!--<a onclick="deleteSingle('chk[]','delete', 'Are you sure, you want to delete selected records?', 'frmbt_master','chk<?=$i?>')"  class="tablectrl_small bRed tipS" title="delete"><span class="iconb" data-icon="&#xe136;"></span></a>-->
		                    </td>
                          </tr>
                         <? } ?>
					</tbody>
				  </table>
				</form>
        		<div class="fg-toolbar tableFooter">
          			<div class="dataTables_paginate paging_full_numbers" id="dynamic_paginate"> <?php echo $page_link;?> </div>
        		</div>
				<div class="dataTables_paginate paging_full_numbers" style="float:right">
					<?php echo "Total Records ".$num_totrec; ?>
				</div>
      		</div> <!-- hiddenpars End -->
	  
		</div>
	</div> <!-- content end -->
   </div>
        <!--- dsad dsa dsad asd sd sdad sad as  --->
        
<!-- End full width -->

