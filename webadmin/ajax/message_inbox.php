<?php
/*$inboxsql = "select *  from message_in where msg_status='1' and to_u_id = '".$user."'  ORDER BY msg_datetime desc ";
$inboxres = $db5->execArrayQuery($inboxsql);	
$inboxcount = $db5->getRowsCount($inboxres);*/

	include("../../buisness_logic/config/configure.php");
 	include("../../buisness_logic/class/DBConnection.php");
	$db2 = new DBConnection();
	$db3 = new DBConnection();
	$db4 = new DBConnection();
	$db5 = new DBConnection();
	
	$user = $_SESSION['sess_adminid'] ;
	
	$n=$_REQUEST['n'];
	$sorton=$_REQUEST['sorton'];
	$sorttype=$_REQUEST['sorttype'];
	$option=$_REQUEST['option'];
	$keyword=$_REQUEST['keyword'];	 
	
	$sql_c = mysql_fetch_array(mysql_query("select count(*) as tot from message_in where msg_status='1' and to_u_id = '".$_SESSION['sess_adminid']."'"));
	$num_totrec = $sql_c["tot"];
		
	$var_extra = $var_extra . "&num_totrec=" . $num_totrec;
	$var_extra = $var_extra . "&n=" . $n;
	
	include(FUNCTION_PATH."first_level_paging.php");	
	if (!isset($sorton)) $sorton = "message_id";	
	if (!isset($sorttype)) $sorttype = "ASC";
	
	$inboxsql = "select *  from message_in where msg_status='1' and to_u_id = '".$_SESSION['sess_adminid']."' ORDER BY status desc,msg_datetime desc ".$var_limit;	
	$inboxres = $db5->execArrayQuery($inboxsql);	
	$inboxcount = $db5->getRowsCount($inboxres);	
 
?> 
 <table cellpadding="0" cellspacing="0" width="100%" class="tDefault checkAll tMedia" id="checkAllinbox">
  <thead>
    <tr>
      <th width="5%"><span class="titleIcon check">
         <input type="checkbox" id="inboxCheck" name="inboxCheck" />
      </span></th>
      <th width="13%">From Name</th>
      <th width="15%">Email</th>
      <th width="15%">Subject</th>
      <th width="25%">Description</th>
      <th width="12%">Date/Time</th>
	  <!--<th width="5%">id</th>-->
    </tr>
  </thead>
  <tbody>
    <?php
					 
			if($inboxcount > 0)
			{
				while($inboxrow=$db5->next())
				{
					if($inboxrow['status'] == 'Unread'){?>
    <tr class="checkmsg" style="font-weight:bold;" >
      <? }else{?>
    <tr class="checkmsg">
      <? }?>
      <td><input type="checkbox" name="chknew[]" class="chkbox"  id="chknew<?php echo $inboxrow['message_id'];?>" value="<?php echo $inboxrow['message_id'];?>"/>
      </td>
      <?php
								$href = 'index.php?file=message_view&ref='.base64_encode($inboxrow['message_id']);  						 
								if($inboxrow['userid'] != '0')
								{ 					
									$qry_db_out = "SELECT concat(firstname,' ',lastname) as fullname,username FROM userdetail where userid = '".$inboxrow['userid']."' ORDER BY userid DESC";	 
								}else{
									$qry_db_out = "select user_name,default_email from system_config where sid = '0'";
								}
								$db2->execArrayQuery($qry_db_out);
								$po_rows = $db2->next(); 
							?>
      <td align="center"><a href="<?php echo $href; ?>" > <?php echo $po_rows['fullname']; ?> </a> </td>
      <td align="center"><a href="<?php echo $href; ?>" > <?php echo $po_rows['username']; ?> </a> </td>
      <td align="center"><a href="<?php echo $href; ?>" > <?php echo $inboxrow['msg_sub']?> </a> </td>
      <td align="center"><a href="<?php echo $href; ?>" >
        <?php
								 $desc = htmlentities(strip_tags($inboxrow['msg_desc'])); 
								  if(strlen($desc) > 40) {
									$desc=substr($desc,0,40);
									$desc.=".....";
								  }
								  if($desc == "")
								  {
									$desc = " - ";
								  }
								  // echo with html teg like "<p>" htmlentities()
								  echo $desc;
								?>
        </a> </td>
      <td align="center"><a href="<?php echo $href; ?>" >
        <?php   
									$db_date = $inboxrow['msg_datetime'];
									$date1=explode('-',$inboxrow['msg_datetime']); 
									echo substr($date1[2],0,2)."-".$date1[1]."-".$date1[0]; 	
									$a = explode(' ',$db_date);
									echo  " &nbsp;/&nbsp;" .$a[1];
								 ?>
        </a> </td>
     <!-- <td align="center"><?php echo $inboxrow['message_id']?></td>-->
    </tr>
    <?php 
					} 
				 }
				 else
				 {
					?>
    <tr>
      <td align="center" colspan="6">No record found</td>
    </tr>
    <?php	
				 }
				 ?>
  <tfoot>
    <tr>
      <td colspan="7"><div>
          <div class="dataTables_paginate paging_full_numbers" id="dynamic_paginate"> <?php echo $page_link;?> </div>
        </div></td>
    </tr>
  </tfoot>
  </tbody>
  
</table>
