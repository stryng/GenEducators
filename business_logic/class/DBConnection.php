<?php

class DBConnection
{
	//====  Database Configuration
	var $user = DB_USERNAME;
	var $password = DB_PASSWORD;
	var $host_id = DB_SERVER;
	var $database_name = DB_DATABASE;
	//====  Database Configuration ends
	function DBConnection()	
	{
		$this->link = @mysql_pconnect ($this->host_id, $this->user,$this->password);
		return $Db=@mysql_select_db($this->database_name);
	}
	function execArrayQuery($sqlQuery)
	{
		return $this->output = @mysql_query($sqlQuery) or die("<b>DB Error...Could not connect to database</b><br>$sqlQuery");
	}

	function next()
	{
		return @mysql_fetch_array($this->output);
	}

	function execUpdateQuery($sql_query)
	{
		$result = @mysql_query($sql_query) or die("DB Error...Could not Execute Following Query\n$sql_query");
		return $result;
	}

	function getRowsCount()
	{
		return mysql_num_rows($this->output);
	}

}

?>