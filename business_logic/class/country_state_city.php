<?   
class country_state_city extends dbclass{
		function getCountry()
		{
			$query = "SELECT * FROM country_master";
			$sql = $this->select($query);
			return $sql;		
			
		}
		function getStateList($Country="")
		{
			if(isset($Country) && $Country!="")	
			{
				$query = "SELECT * FROM `state_master` where country_id = '".$Country."' ";
			}else{
				$query = "SELECT * FROM `state_master`";	
			}
			//echo $query; die;
			$sql = $this->select($query);
			return $sql;	
		}
		function getCityList($State="")
		{
			if(isset($State) && $State!="")	
			{
				$query = "SELECT * FROM `city_master` where state_id = '".$State."'";
			}else{
				$query = "SELECT * FROM `city_master`";
			}
			//echo $query; die;
			$sql = $this->select($query);
			return $sql;	
		}
		function getCountryBox($Selected="")
		{
			$box=$this->getCountry();
			$html="<select name='Country' id='Country' onChange=\"getStateList(this.value)\"  >";
			for($i=0;$i<count($box);$i++)
			{
				if($Selected == $box[$i]['Country_ID']){ 
					$check = "selected";	
				}
				else if ($box[$i]['default_country'] == "1" )
				{
					$check = "selected";	
				}
				else{
					$check = "";
				}
				$html.="<option value='".$box[$i]['Country_ID']."'  $check >".$box[$i]['Country_Name']." </option>";
			 }
			$html.="</select>";
			return $html;
			
		}
		function getStateBox($Country="",$Selected="")
		{
			if($Country!="")
			{
				$box=$this->getStateList($Country);
			}else{
				$box=$this->getStateList();
			}
			if( count($box) > 0)
			{
			
				$html="<select name='State' id='State' onChange=\"getCityList(this.value)\"  >";
				for($i=0;$i<count($box);$i++)
				{
					if($Selected == $box[$i]['state_id']){ 
						$check = "selected";
					}else{
						$check = "";
					}
					$html.="<option value='".$box[$i]['state_id']."' $check   >".$box[$i]['state_name']." </option>";
				}
				$html.="</select>";
				
			}
			else
			{
				$html.=" No State found in selected country";
			}	
			return $html;
			
			//return count($box); 
			
		}
		function getCityBox($State="",$Selected="")
		{
			if($State!="")
			{
				$box=$this->getCityList($State);
			}else{
				$box=$this->getCityList();
			}
			$html="<select name='City' id='City' >";
			for($i=0;$i<count($box);$i++)
			{
				if($Selected == $box[$i]['city_id']){ 
					$check = "selected";
				}else{
					$check = "";
				}
				$html.="<option value='".$box[$i]['city_id']."' $check>".$box[$i]['city_name']."</option>";
			}
			$html.="</select>";
			return $html; 
			
		}
	
}
?>
