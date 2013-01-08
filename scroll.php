<?php

	include_once 'business_logic/config/configure.php';

	require_once("business_logic/class/form.class.php");

	$form = new Form();

		

$sql = "SELECT 	CONCAT(u.FirstName,' ',LEFT(u.LastName,1)) as name,

				count(ifNull(referals.userref,0)) as number,

				c.printable_name

		FROM ( 

			 SELECT  i.inviter as userref FROM userdetail as i INNER JOIN

			  userdetail as c ON c.UserId = i.inviter where c.active = 1 and c.entry <> '' and i.active = 1 and i.entry <> '' GROUP BY i.UserId

		   ) as referals inner join userdetail u on u.UserId= referals.userref 

		   inner join country c on u.country=c.iso

		where u.UserId not in (1) and u.active = 1 and u.entry <> ''

		group by u.UserId

		order by number desc";

		//echo 'Aqui estosy.</br>';

		$resPat=mysql_query($sql);

	

		

		

?>



<html>

<head><title></title>

</head>

<body style="background-color:transparent">

<script>

var titlea = new Array();

var texta = new Array();

var linka = new Array();

var trgfrma = new Array();

var heightarr = new Array();

var cyposarr = new Array();

cyposarr[0]=0;

cyposarr[1]=1;

cyposarr[2]=2;

</script>




<?php //echo $counter?>
<marquee direction="up" scrollamount="3"  onmouseover="this.stop();" onmouseout="this.start();" >
<?php $sql="select * from userdetail u WHERE u.active = 1";

							  $res=mysql_query($sql);
							  
							  $i = 1; 
							  
							  while($result_member = mysql_fetch_object($res)) {			  
							  ?>
							  
							  <div style="font-size: 12px; font-family:Arial, Helvetica, sans-serif;"> <?php echo $i; ?>. <b>Name</b> :  <?php echo $result_member->FirstName.' '.$result_member->LastName;?> 
							  
							  <div style="margin-left:13px; margin-bottom:10px;"> <b>Country</b> : <?php  $country = $result_member->Country; 
							  $result_country = mysql_fetch_object(mysql_query("select * from country where iso = '$country'"));
							  echo $result_country->name;
							  ?></div>
							  
							  </div>
							  
						<?php $i++; } ?></marquee>
<script language="javascript" charset="utf-8" src="js/scroller_nscroller.js"></script>

</body>

</html>