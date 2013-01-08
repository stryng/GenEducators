<?php
	include_once 'business_logic/config/configure.php';
	require_once("business_logic/class/form.class.php");
	$form = new Form();

	$file = fopen("test.txt","w");
	fwrite($fp, implode(",",$_POST));
	//some code to be executed
	
	fclose($file);

	$qry = "INSERT INTO `affiliwork_live`.`country` (`iso`, `name`, `printable_name`, `iso3`, `numcode`) VALUES ('44', 'aaadffdsaf', 'aadfdas', 'asd', '444')";
	$form->inser_qry($qry);
?>