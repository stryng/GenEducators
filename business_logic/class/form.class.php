<?php  
	/* My Form class */
	class Form {
	
		var $fields;
		var $values;
		var $error;
		function __construct() {
			$this->fields = array();
			$this->basicAttributes();
			$this->values = array();
		}
		
		
		function addField($title, $array) {
			$this->fields["$title"] = $array;
		}
		
		function basicAttributes() {
			return $this->basicAttribute = array("name","class","style","value","hint","error");
		}
			
		function is_multiple($a) {
			if(is_array($a)) { 
				foreach ($a as $v) {
					if (is_array($v)) return true;
				}
			}
			return false;
		}		
		
		function display() {
			if($this->is_multiple($this->values)) $this->values = $this->values[0];

			foreach($this->fields as $title=>$attribute) {
				$attribute["name"]   = isset($attribute["name"])?$attribute["name"]:"";
				$attribute["id"]     = isset($attribute["id"])?$attribute["id"]:$attribute["name"];
				$attribute["type"]   = isset($attribute["type"])?$attribute["type"]:"";
				$attribute["class"]  = isset($attribute["class"])?$attribute["class"]:"";
				@$attribute["value"]  = (isset($attribute["value"]))?$attribute["value"]:$this->values[$attribute["name"]];
				$attribute["validate"] = isset($attribute["validate"])?$attribute["validate"]:"N";
				$attribute["readonly"] = isset($attribute["readonly"])?$attribute["readonly"]:"";
				$attribute["maxlength"] = isset($attribute["maxlength"])?$attribute['maxlength']:255;
 				$attribute["radio_title"] = isset($attribute["radio_title"])?$attribute["radio_title"]:"";
				$attribute["radio_title_class"] = isset($attribute["radio_title_class"])?$attribute["radio_title_class"]:"";
				$attribute["inline"] = isset($attribute["inline"])?$attribute["inline"]:"";
				$attribute["rows"]  = isset($attribute["rows"])?$attribute["rows"]:"3";
				$attribute["cols"]  = isset($attribute["cols"])?$attribute["cols"]:"5";
				$attribute["require_class"] = isset($attribute["require_class"])?$attribute["require_class"]:"require";
				$attribute["hint"] = isset($attribute["hint"])?$attribute["hint"]:"";
				$attribute["save2db"] = isset($attribute["save2db"])?$attribute["save2db"]:"true";
				$require = isset($attribute["validate"])?strtoupper(substr($attribute["validate"],0,1)):"N";

				$html = "";
				if($attribute["name"]!="") {
					$html.='<div class="fieldbox">';
					$html.='<label for="'.$attribute["id"].'" >';
					if($require=="R") $html.="<span class='".$attribute["require_class"]."'>* </span>";
					$html.=$title." : ";
					$html.='</label>';				
				}
				switch($attribute["type"]) {
					case "text":
						$html.='<input ';
						$html.='type="'.$attribute["type"].'" ';
						$html.='name="'.$attribute["name"].'" ';
						$html.='id="'.$attribute["id"].'" ';
						$html.=($attribute["inline"]!="")?' style="'.$attribute["inline"].'"':'';
						$html.='class="'.$attribute["class"].'" ';
						$html.='value="'.$attribute["value"].'" ';
						$html.='maxlength="'.$attribute["maxlength"].'" ';
						$html.='onblur="'.$attribute["onblur"].'" ';
						if($attribute["readonly"]=="yes") 
						$html.='readonly ="readonly"';
						$html.=' />';
					break;
					case "password":
						$html.='<input ';
						$html.='type="'.$attribute["type"].'" ';
						$html.='name="'.$attribute["name"].'" ';
						$html.=($attribute["inline"]!="")?' style="'.$attribute["inline"].'"':'';
						$html.='id="'.$attribute["id"].'" ';
						$html.='class="'.$attribute["class"].'" ';
						$html.='value="'.$attribute["value"].'" ';
						$html.='maxlength="'.$attribute["maxlength"].'" ';
						$html.='onblur="'.$attribute["onblur"].'" ';
						$html.='/>';
					break;
					case "hidden":
						$html.='<input ';
						$html.='type="hidden" ';
						$html.='name="'.$attribute["name"].'" ';
						$html.=($attribute["inline"]!="")?' style="'.$attribute["inline"].'"':'';
						$html.='id="'.$attribute["id"].'" ';
						$html.='class="'.$attribute["class"].'" ';
						$html.='value="'.$attribute["value"].'" ';
						$html.='maxlength="'.$attribute["maxlength"].'" ';
						$html.='/>';
					break;
					case "file":
						$html.='<input ';
						$html.='type="'.$attribute["type"].'" ';
						$html.='name="'.$attribute["name"].'" ';
						$html.=($attribute["inline"]!="")?' style="'.$attribute["inline"].'"':'';
						$html.='id="'.$attribute["id"].'" ';
						$html.='class="'.$attribute["class"].'" ';
						$html.='/>';
					break;
					case "radio":
						$radio_html="";
					//	print_r($_POST);
						foreach($attribute["values"] as $key=>$value){
						//	print_r($value);
							$value["name"]  = isset($value["name"])?$value["name"]:""; 
							$value["id"]    = isset($value["id"])?$value["id"]:$value["name"];
							$value["class"] = isset($value["class"])?$value["class"]:"";
							$value["value"] = isset($value["value"])?$value["value"]:"";
							$value["title"] = isset($value["title"])?$value["title"]:"";
							$value["title_class"] = isset($value["title_class"])?$value["title_class"]:"";							
							$value["checked"] = isset($value["checked"])?$value["checked"]:"";

							$html.='<input ';
							$html.='type="radio" ';
							$html.='name="'.$value["name"].'" ';
							$html.=$value["checked"]!=""?'checked ="'.$value["checked"].'" ':"";
							$html.='id="'.$value["id"].'" ';
							$html.='value="'.$value["value"].'" ';
							if(isset($value["value"]) && isset($_POST[$value["name"]]) && $value["value"]==$_POST[$value["name"]]) $html.=' checked="checked"';
							//if($_POST[$value["name"]] != "") rint
							if($this->values[$value["name"]]==$value["value"]) $html.=' checked="checked"';
							$html.='/> <span class="'.$value["title_class"].'" >'.$value["title"].'</span>';
						}
						//echo $radio_html;
						
					break;
					case "checkbox":
						$radio_html="";
						foreach($attribute["values"] as $key=>$value){
							$value["name"]  = isset($value["name"])?$value["name"]:""; 
							$value["id"]    = isset($value["id"])?$value["id"]:$value["name"];
							$value["class"] = isset($value["class"])?$value["class"]:"";
							$value["value"] = isset($value["value"])?$value["value"]:"";
							$value["title"] = isset($value["title"])?$value["title"]:"";
							$value["title_class"] = isset($value["title_class"])?$value["title_class"]:"";							
							$value["checked"] = isset($value["checked"])?$value["checked"]:"";
													
							$html.='<input ';
							$html.='type="checkbox" ';
							$html.='name="'.$value["name"].'" ';
							$html.='id="'.$value["id"].'" ';
							$html.='value="'.$value["value"].'" ';
							if(isset($value["value"]) && isset($_POST[$value["name"]]) && $value["value"]==$_POST[$value["name"]]) $html.=' checked="checked"';
							if($this->values[$value["name"]]==$value["value"]) $html.=' checked="checked"';
							$html.='/> <span class="'.$value["title_class"].'">'.$value["title"].'</span>';
						}
					break;
					case "dropdown":
						$attribute["name"] = isset($attribute["name"])?$attribute["name"]:"";
						$attribute["id"] = isset($attribute["id"])?$attribute["id"]:$attribute["name"];
						$attribute["value"] = isset($attribute["value"])?$attribute["value"]:$_POST[$attribute["name"]];
						$attribute["class"] = isset($attribute["class"])?$attribute["class"]:"";
						$attribute["onchange"] = isset($attribute["onchange"])?$attribute["onchange"]:"";
						
						$html.='<select name="'.$attribute["name"].'" id="'.$attribute["id"].'" ';
						$html.=($attribute["inline"]!="")?' style="'.$attribute["inline"].'"':'';
						if($attribute["onchange"]!="") $html.='onchange="'.$attribute["onchange"].'"';
						if($attribute["class"]!="") $html.='class="'.$attribute["class"].'"';
						$html.=' >';
						
						if(is_array($attribute["values"])) {
						 $dropdown_values = $attribute["values"];
							for($m=0; $m<sizeof($dropdown_values); $m++) {
								if(is_array($dropdown_values[$m])) { 
								//echo $attribute["value"];exit;
									foreach($dropdown_values[$m] as $key=>$value) {
//										echo "Attribute Value".$attribute["value"]." => ".$key."<br>";
										$html.='<option value="'.$key.'" ';
											if($attribute["value"]==$key) $html.='selected="selected"';
										$html.='>'.$value.'</option>';
									}
								}
							} 
						}
						$html.='</select>';
					break;
					case "textarea":
						$html.='<textarea ';
						$html.='name="'.$attribute["name"].'" ';
						$html.='id="'.$attribute["id"].'" ';
						$html.='class="'.$attribute["class"].'" ';
						$html.='rows="'.$attribute["rows"].'" ';
						$html.='cols="'.$attribute["cols"].'" ';
						$html.='>'.$attribute["value"];
						$html.='</textarea>';
					break;
					case "fieldset":
						$html.=($attribute["value"]=="")?"</fieldset>":'<fieldset class="'.$attribute["class"].'"><legend>'.$attribute["value"].'</legend>';
					break;
					
				}
				
				if($html!="") {
				$html.=($attribute["hint"])?"<span class='hint' id='hint-".$attribute["id"]."'><span>".$attribute['hint']."</span></span>":"";
				@$html.=($attribute["error"])? "<span class='error'>".$attribute["error"]."</span>" : "";
				$html.="</div>";
				print $html;
				}
				
			}
		}
		
		function validate() {
			$return = true;
			foreach($this->fields as $title=>$attribute) {
				$attribute["title"] = $title;
				@$required	= (strtoupper(substr($attribute["validate"],0,1))=="R")?true:false;
				//$attribute["value"] = isset($attribute["value"])?$attribute["value"]:$_POST[$attribute["name"]]; 
				@$value		= $_POST[$attribute["name"]];
				@$file		= $_FILES[$attribute["name"]]["size"];
				@$maxlength	= $attribute["maxlength"];
				$attribute["validate"] = isset($attribute["validate"])?$attribute["validate"]:"N";
				if($maxlength!="") $value = substr($value,0,$maxlength);
				
				if($required && $value=="" && ($file=="" || $file==0) ) { 
					$this->fields["$title"]["error"] = "Required";
					$return = false;
				}
				
				switch(substr($attribute["validate"],1,strlen($attribute["validate"])-1)) {
					case "isEmail":
						if(!preg_match("/^[^0-9][A-z0-9_]+([.][A-z0-9_]+)*[@][A-z0-9_]+([.][A-z0-9_]+)*[.][A-z]{2,4}$/",$value)) {
						$this->fields["$title"]["error"] ="Please supply valid email.";
						$return = false;
						}
					break;
					case "isNumeric":
					   if(!preg_match("/^[0-9]+$/",$value)) {
						$this->fields["$title"]["error"] ="Please supply numeric value.";
						$return = false;
						}
					break;
				}
			}
			return $return;
		}
		
		
		function processOnTable($table) {
		$step=" INSERT INTO `".$table."` SET ";
		$sql="";
			foreach($this->fields as $key=>$attribute) {
				if($attribute["type"]!="fieldset") {
					if($attribute["save2db"]=="true" || $attribute["save2db"]=="") { 
						//print_r($attribute); 		
						switch($attribute["type"]) {
							case "file":
								//echo " Attribute name: ".$attribute["name"]."=> ".$_FILES[$attribute["name"]]["name"];
							$sql.=" , `".$attribute["name"]."` = '".$_FILES[$attribute["name"]]["name"]."' ";
							break;
							case "radio":
							
							foreach($attribute["values"] as $key=>$value) {
								if(isset($_POST[$value["name"]]) && ($_POST[$value["name"]]==$value["value"])) { 
									$val[] = $_POST[$value["name"]];
									$sql.=" ,`".$attribute["name"]."` = '".$_POST[$value["name"]]."' ";
								}	
							}
							break;
							case "checkbox":
							foreach($attribute["values"] as $key=>$value) {
								if(isset($_POST[$value["name"]]) && ($_POST[$value["name"]]==$value["value"])) {
									$val[] = $_POST[$value["name"]];
									$sql.=" ,`".$value["name"]."` = '".$_POST[$value["name"]]."' ";								
								}		
							}
							break;
							default:
							$value = isset($attribute["value"])?$attribute["value"]:$_POST[$attribute["name"]];	
							$sql.=",`".$attribute["name"]."` = '".@$value."' ";
							break;
						}	
					}
				}
			}
			
			$query = $step.substr($sql,1,strlen($sql)-1);
			//echo $query;exit;
			if(mysql_query($query)){
				$return = mysql_insert_id();
			}else{
				$return = (mysql_error()?mysql_error():array());
			}
			return $return;
		}
		
		function updateOnTable($table,$condArray) {
		//print_r($this->fields);
		$step=" UPDATE `".$table."` SET ";
		$sql="";

			foreach($this->fields as $key=>$attribute) {
				$attribute["save2db"] = isset($attribute["save2db"])?$attribute["save2db"]:"true";
				if($attribute["type"]!="fieldset") {
					if($attribute["save2db"]=="true") { 
						$attribute["value"] = isset($attribute["value"])?$attribute["value"]:$this->values[$attribute["name"]];
					//print_r($attribute); 		
						switch($attribute["type"]) {
							case "file":
								//echo " Attribute name: ".$attribute["name"]."=> ".$_FILES[$attribute["name"]]["name"];
							break;
							case "radio":
							
							foreach($attribute["values"] as $key=>$value) {
								if(isset($_POST[$value["name"]]) && ($_POST[$value["name"]]==$value["value"])) { 
									$val[] = $_POST[$value["name"]];
									$sql.=" ,`".$attribute["name"]."` = '".$_POST[$value["name"]]."' ";
								}	
							}
							break;
							case "checkbox":
							foreach($attribute["values"] as $key=>$value) {
								if(isset($_POST[$value["name"]]) && ($_POST[$value["name"]]==$value["value"])) {
									$val[] = $_POST[$value["name"]];
									$sql.=" ,`".$value["name"]."` = '".$attribute["value"]."' ";								
								}		
							}
							break;
							default:
							//echo " Fieldname: ".$attribute["name"]." => ".$this->values[$attribute["name"]];
							$value = isset($attribute["value"])?$attribute["value"]:$_POST[$attribute["name"]];	
							$sql.=",`".$attribute["name"]."` = '".$value."' ";
							break;
						}	
					}	
				}
			}
			if(is_array($condArray)) {
				$sql.=" WHERE 1=1 ";
				for($l=0; $l<sizeof($condArray); $l++) {
					if(is_array($condArray[$l])) {
						foreach($condArray[$l] as $field=>$value) {
							$sql.=" AND `$field` ";	
							$sql.=" = '{$value}'";
						}
					}
				}
			}else $sql.=" WHERE `id` = {$condArray}";
			$query = $step.substr($sql,1,strlen($sql)-1);
			//print_r($condArray);
			//echo $query;exit;
			if(mysql_query($query)){
				$return = "success";
			}else{
				$return = (mysql_error()?mysql_error():array());
			}
			return $return;
		}
		function inser_qry($query)
		{
			if(mysql_query($query)){
				$return = "success";
			}else{
				$return = (mysql_error()?mysql_error():array());
			}
			return $return;
		}
		
		function message($msg,$type) {
			if($msg!="") {
				switch($type) {
					case "error":
						$html = '<div class="nNote nFailure" ><p>'.$msg.'</p></div>';
					break;
					case "message":
						$html = '<div class="display_message '.$type.'" >'.$msg.'</div>';
					break;
					case "success":
						$html = '<div class="nNote nSuccess" ><p>'.$msg.'</p></div>';
					break;
				}
					$_SESSION["MY-MESSAGE"] = $html;
				return true;
			} else return false;
		}
		
		function showMessage() {
			if(@$_SESSION["MY-MESSAGE"]!="") {
				echo $_SESSION["MY-MESSAGE"];
			}
			$_SESSION["MY-MESSAGE"]="";
			unset($_SESSION["MY-MESSAGE"]);
		}
		
		function getArray($sql) {
			if($sql!="") {
				$result = mysql_query($sql);
				$rows = array();
				while($g = mysql_fetch_array($result,MYSQL_ASSOC)) 	$rows[] = $g;
				return is_array($rows)?$rows:(mysql_error()?mysql_error():array());
			}
		}
		
		function getRow($sql) {
			if($sql!="") {
				$result = mysql_query($sql);
				$rows = array();
				$rows =  mysql_fetch_array($result);
				//echo "<br>".$sql."<br>";
				//print_r($rows);
				/*if(!is_array($rows))
				{
				}
				else
				{
					$rows = array();
				}*/
				return is_array($rows)?$rows:(mysql_error()?mysql_error():array());
			}
		}
		
		function dd($array,$prearray,$value="",$key=""){
			$g[] = $prearray;
			if(is_array($array)) { 
				for($i=0;$i<sizeof($array);$i++) {
					$g[] = array($array[$i][$key]=>$array[$i][$value]);
				}
				return $g;
			}
		}

	// Paginatioin Functions 
	function PaginationTable($table) {
		$this->PaginationTable = $table;
	}
	
	function PageLimit($x) {
		$this->PageLimit = $x;
	}
	
	function PageName($page) {
		$this->PageName = $page;
	}
	
	function pageArray($x) {
		$this->TotalArray = $x;
	}
	
	function getPage($x=0) {
		$stages = 10;
		$this->page = $x==0?0:mysql_real_escape_string($x);
		$this->start = ($this->page)?(($this->page - 1) * $this->PageLimit):0;		
	}
	
	function getParray($sql) {
		if($this->sql!="") $sql.=$this->sql;
		$this->count = count($this->getArray($sql));
		$sql.=" LIMIT ".$this->start." ,";
		$sql.=" ".$this->PageLimit;
		//echo $sql;
		return $this->getArray($sql);
	}

	function ShowLimit($title,$array) {
		$link = explode("&",$_SERVER['REQUEST_URI']);
		for($m=0; $m<count($link); $m++) {$t = explode("=",$link[$m]);if(is_array($t)) {for($k=0; $k<count($t); $k++) {$j= $t[$k];if($j=="limit") {$k++;$getLimit = $t[$k];	$k--; $limitKeyword = $link[$m]; }}}}
		
		if($limitKeyword=='') { 
			$this->PageLimit(10);
			$links = $_SERVER['REQUEST_URI'];
		}else{
			$finalLimit = ($getLimit==0 || $getLimit=='')?10:$getLimit; 
			$this->PageLimit($finalLimit);
			$mylink = str_replace($limitKeyword,"",$_SERVER['REQUEST_URI']);
			$links  = substr($mylink,-1)=="&"?substr($mylink,0,strlen($mylink)-1):$mylink;
		}
		$script ='<script type="text/javascript">function getPageLimit() {
					var j = document.getElementById("page_limit").value;window.location = "'.$links.'&limit="+j;
					}
				</script>';
		$html='<label>'.$title.'<label><br />';
		if(is_array($array)) {
			$html.='<select name="page_limit" id="page_limit" onchange="getPageLimit();">';
			for($m=0; $m<count($array); $m++) { $html.='<option value="'.$array[$m].'" ';
									if(@$_GET['limit']==$array[$m]) $html.="selected";
									$html.='>'.$array[$m].'</option>';
					}				
			$html.='</select>';
		}
		$output = $script.$html;
		return $output;									
	}
	
	function search($array) {
		$this->sql = "";
		if(is_array($array)) {
			foreach($array as $field=>$value) {
				switch($field) {
					case "like":
						foreach($value as $key=>$val) 
							if($val!="" || $val!="%%") $sql.=" AND  `$key` LIKE '$val'";
					break;
					case "equal":
						foreach($value as $key=>$val) 
							if($val!="") $sql.=" AND `$key` = '$val' ";
						
					break;
				}
			}
			$this->sql = $sql;
		}	
		return $this->sql;
	}
	
	function pageLinks() {
		$stages = $this->PageLimit;
		$tableName = $this->PaginationTable;
		if(@$_GET['limit']>0) {
			$targetpage = "?".$this->PageName."&limit=".$_GET['limit'];
		}else{
			$targetpage = "?".$this->PageName;
		}
		$limit = $this->PageLimit; 
		
		$total_pages = $this->count;
		
		$rows = $this->TotalArray;
		
		if ($this->page == 0){$this->page = 1;}
		$prev = $this->page - 1;	
		$next = $this->page + 1;							
		$lastpage = ceil($total_pages/$limit);		
		$LastPagem1 = $lastpage - 1;					
		
		
		$paginate = '';
				 if($lastpage > 1) {	
					$paginate .= "<div class='paginate'>";
							// Previous
							$paginate.=($this->page > 1)?'<a href="'.$targetpage.'&page='.$prev.'" class="previous paginate_button">Previous</a>':'<a href="'.$targetpage.'&page='.$prev.'"  class="revious paginate_button paginate_button_disabled">Previous</a>';
						
							// Pages	
			if ($lastpage < 7 + ($stages * 2))	// Not enough pages to breaking it up
			{	
				for ($counter = 1; $counter <= $lastpage; $counter++)
					$paginate.=($counter == $this->page)?'<a class="paginate_button paginate_active">'.$counter.'</a>':'<a href="'.$targetpage.'&page='.$counter.'" class="paginate_button">'.$counter.'</a>';
			}
			elseif($lastpage > 5 + ($stages * 2))	// Enough pages to hide a few?
			{
				// Beginning only hide later pages
				if($this->page < 1 + ($stages * 2))		
				{
					for ($counter = 1; $counter < 4 + ($stages * 2); $counter++)
						$paginate.=($counter == $this->page)?'<span class="current">'.$counter.'</span>':'<a href="'.$targetpage.'&page='.$counter.'" class="paginate_button">'.$counter.'</a>';
	
					$paginate.= "...";
					$paginate.= '<a href="'.$targetpage.'&page='.$LastPagem1.'" class="paginate_button">'.$LastPagem1.'</a>';
					$paginate.= '<a href="'.$targetpage.'&page='.$lastpage.'" class="paginate_button">'.$lastpage.'</a>';		
				}
				// Middle hide some front and some back
				elseif($lastpage - ($stages * 2) > $this->page && $this->page > ($stages * 2))
				{
					$paginate.= '<a href="'.$targetpage.'&page=1" class="paginate_button" >1</a>';
					$paginate.= '<a href="'.$targetpage.'&page=2" class="paginate_button">2</a>';
					$paginate.= "...";
					for ($counter = $this->page - $stages; $counter <= $this->page + $stages; $counter++)
						$paginate.= ($counter == $this->page)?"<span class='current'>$counter</span>":'<a href="'.$targetpage.'&page='.$counter.'" class="paginate_button">'.$counter.'</a>';
	
					$paginate.= "...";
					$paginate.= '<a href="'.$targetpage.'&page='.$LastPagem1.'" class="paginate_button" >'.$LastPagem1.'</a>';
					$paginate.= '<a href="'.$targetpage.'&page='.$lastpage.'" class="paginate_button" >'.$lastpage.'</a>';
				}
				// End only hide early pages
				else
				{
					$paginate.= "<a href='$targetpage&page=1'>1</a>";
					$paginate.= "<a href='$targetpage&page=2'>2</a>";
					$paginate.= "...";
					for ($counter = $lastpage - (2 + ($stages * 2)); $counter <= $lastpage; $counter++)
						$paginate.= ($counter == $this->page)?'<span class="current">'.$counter.'</span>':'<a href="'.$targetpage.'&page='.$counter.'" class="paginate_button">'.$counter.'</a>';
					
				}
			}
	
			$paginate.=($this->page < $counter - 1)?'<a href="'.$targetpage.'&page='.$next.'" class="next paginate_button">Next</a>':'<a class="previous paginate_button paginate_button_disabled">Next</a>';
			$paginate.= "</div>";		
		}
			 return $paginate;
			}
			
		function login($username, $password) {
			global $form;
			$sql="SELECT * FROM `users` WHERE `email` = '{$username}'AND `is_active` = 'Y' AND `is_deleted` = 'N' ";
			$x = $form->getRow($sql);
			if(is_array($x) && sizeof($x)) {
				if($x["password"]==$password) {
					$_SESSION["user_in"]=true;
					$_SESSION["user_id"] = $x["id"];
					$_SESSION["user_type"] = "front-user";
					$_SESSION["user_name"] = $x["first_name"];
					return true;
				}else {
					$this->message('Password does not match','error');
					return false;
				}
			}else{
				 $this->message('Username does not exists.','error');
				 return false;
			}
		}
		
		function isLogged() {
			return ($_SESSION["user_in"]==true)?true:false;
		}
		function logout() {
			$_SESSION["user_in"]=false;
			$_SESSION["user_in"]=0;
			session_destroy();
			return false;
		}
	}
	
	define('PATH_ROOT',"/projects/php/");
	define('PATH_REAL',$_SERVER['DOCUMENT_ROOT']."projects/php/");
?>