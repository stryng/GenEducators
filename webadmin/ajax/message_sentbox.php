<?php

	include("../../buisness_logic/config/configure.php");
 	include("../../buisness_logic/class/DBConnection.php");
	$db2 = new DBConnection();
	$db3 = new DBConnection();
	$db4 = new DBConnection();
	$db5 = new DBConnection();
	
	$user = $_SESSION['sess_adminid'] ;

	$n2=$_REQUEST['n2'];
	$sorton2=$_REQUEST['sorton2'];
	$sorttype2=$_REQUEST['sorttype2'];
	$option2=$_REQUEST['option2'];
	$keyword2=$_REQUEST['keyword2'];	
	 
	
	$sql_2 = mysql_fetch_array(mysql_query("select count(*) as tot from message_in where userid = '".$_SESSION['sess_adminid']."' "));
	$num_totrec2 = $sql_2["tot"];
	
	$var_extra2 = $var_extra2 . "&num_totrec2=" . $num_totrec2;
	$var_extra2 = $var_extra2 . "&n2=" . $n2;
	
	include(FUNCTION_PATH."second_level_paging.php");	
	if (!isset($sorton2)) $sorton2 = "message_id";	
	if (!isset($sorttype2)) $sorttype2 = "ASC";
	
	
	$sentsql = "select *  from message_in where userid = '".$_SESSION['sess_adminid']."' ORDER BY msg_datetime desc ".$var_limit2;	 
	$sentres = $db3->execArrayQuery($sentsql);	
	$sentcount = $db3->getRowsCount($sentres);
			  
?>

<table cellpadding="0" cellspacing="0" width="100%" class="tDefault checkAll tMedia" id="checkAllsent">
  <thead>
    <tr>
      <th width="5%"><span class="sentIcon check sentcheck">
        <input type="checkbox" id="titleCheck" name="titleCheck" />
        </span> </th>
      <th width="13%">To Name</th>
      <th width="15%">Email</th>
      <th width="15%">Subject</th>
      <th width="25%">Description</th>
      <th width="12%">Date/Time</th>
     <!-- <th width="5%">Id</th>-->
    </tr>
  </thead>
  <tbody>
    <?php			
			if($sentcount > 0)
			{
				while($sentrow=$db3->next())
				{
					if($sentrow['status'] == 'Unread'){?>
    <tr class="checkmsg" style="font-weight:bold;" >
      <? }else{?>
    <tr class="checkmsg">
      <? }?>
      <td><input type="checkbox" name="chknew[]" class="chkbox"  id="chknew<?php echo $sentrow['message_id'];?>" value="<?php echo $sentrow['message_id'];?>"/>
      </td>
      <?php
								//echo $sentrow['message_id']."===";
								$href = 'index.php?file=message_sent&ref='.base64_encode($sentrow['message_id']); 			 
								if($sentrow['to_u_id'] != '0')
								{ 					
									$qry_db_out = "SELECT concat(firstname,' ',lastname) as fullname,username FROM userdetail where userid = '".$sentrow['to_u_id']."' ORDER BY userid DESC";	 
								}else{
									$qry_db_out = "select user_name,default_email from system_config where sid = '0'";
								}
								//echo $qry_db_out;
								$db2->execArrayQuery($qry_db_out);
								$po_rows = $db2->next(); 
							?>
      <td align="center"><a href="<?php echo $href; ?>" > <?php echo $po_rows['fullname']; ?> </a> </td>
      <td align="center"><a href="<?php echo $href; ?>" > <?php echo $po_rows['username']; ?> </a> </td>
      <td align="center"><a href="<?php echo $href; ?>" > <?php echo $sentrow['msg_sub']?> </a> </td>
      <td align="center"><a href="<?php echo $href; ?>" >
        <?php
								 $desc = htmlentities(strip_tags($sentrow['msg_desc'])); 
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
									$db_date = $sentrow['msg_datetime'];
									$date1=explode('-',$sentrow['msg_datetime']); 
									echo substr($date1[2],0,2)."-".$date1[1]."-".$date1[0]; 	
									$a = explode(' ',$db_date);
									echo  " &nbsp;/&nbsp;" .$a[1];
								 ?>
        </a> </td>
      <!--<td align="center"><?php echo $sentrow['message_id']?></td>-->
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
          <div class="dataTables_paginate paging_full_numbers" id="dynamic_paginate"> <?php echo $page_link2;?> </div>
        </div></td>
    </tr>
  </tfoot>
  </tbody>
  
</table>
