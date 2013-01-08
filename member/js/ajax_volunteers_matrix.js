function Create_Object()
{
	try{
		// Opera 8.0+, Firefox, Safari
		ajaxRequest = new XMLHttpRequest();
	} catch (e){
		// Internet Explorer Browsers
		try{
			ajaxRequest = new ActiveXObject("Msxml2.XMLHTTP");
		} catch (e) {
			try{
				ajaxRequest = new ActiveXObject("Microsoft.XMLHTTP");
			} catch (e){
				// Something went wrong
				alert("Your browser broke!");
				return false;
			}
		}
	}
	return ajaxRequest;
}

function volunteers(current,level,aid)
{
	var id = document.getElementById(aid).innerHTML;
	//alert(level);
	if(id=="+&nbsp;&nbsp;")
	{
		document.getElementById(aid).innerHTML ="-&nbsp;&nbsp;";
		document.getElementById("ul_volunteers_name").style.display ="block";
		document.getElementById("next_volunteers_name[1]").style.display ="block";
	}
	else
	{
			document.getElementById(aid).innerHTML = "+&nbsp;&nbsp;";
			
			document.getElementById("ul_volunteers_name").style.display ="none";
			document.getElementById("next_volunteers_name[1]").style.display ="none";
	}
	
	if(current != 0 || current != null)
	{
			if(level == 2 && adminsession ==0)
			{
				alert("You can not see more than level 3");
				return;
			}

                var http_request = Create_Object();  // The variable that makes Ajax possible!
				//var cnt = parseInt(document.getElementById("next_volunteers_cnt").value)+1;
				var cnt = parseInt(level)+1;

                // Create a function that will receive data sent from the server
                http_request.onreadystatechange = function(){
                        if(http_request.readyState == 4){
                                //alert(http_request.responseText);
								document.getElementById("next_volunteers_cnt").value = cnt;
								document.getElementById("next_volunteers_name["+(cnt-1)+"]").innerHTML = "";
                                document.getElementById("next_volunteers_name["+(cnt-1)+"]").innerHTML = http_request.responseText;
								
                        }
                }
	}
	
}

function volunteers2(current,level,aid)
{
	var id = document.getElementById(aid).innerHTML;
	//alert(id);
	if(id=="+&nbsp;&nbsp;")
	{
		document.getElementById(aid).innerHTML ="-&nbsp;&nbsp;";
		document.getElementById("ul_volunteers_name2").style.display ="block";
		document.getElementById("next_volunteers_name2[1]").style.display ="block";
		
	}
	else
	{
			document.getElementById(aid).innerHTML = "+&nbsp;&nbsp;";
			document.getElementById("ul_volunteers_name2").style.display ="none";
		//	document.getElementById("next_volunteers[1]").style.display ="none";
			document.getElementById("next_volunteers_name2[1]").style.display ="none";
		//	document.getElementById("next_volunteers3[1]").style.display ="none";
	}
	
	if(current != 0 || current != null)
	{
			if(level == 2 && adminsession ==0)
			{
				alert("You can not see more than level 3");
				return;
			}
                var http_request = Create_Object();  // The variable that makes Ajax possible!
				//var cnt = parseInt(document.getElementById("next_volunteers_cnt").value)+1;
				var cnt = parseInt(level)+1;

                // Create a function that will receive data sent from the server
                http_request.onreadystatechange = function(){
                        if(http_request.readyState == 4){
                                //alert(http_request.responseText);
								document.getElementById("next_volunteers_cnt").value = cnt;
								document.getElementById("next_volunteers_name2["+(cnt-1)+"]").innerHTML = "";
                                document.getElementById("next_volunteers_name2["+(cnt-1)+"]").innerHTML = http_request.responseText;
								
                        }
                }
	}
	
}
function volunteers3(current,level,aid)
{
	var id = document.getElementById(aid).innerHTML;
	//alert(id);
	if(id=="+&nbsp;&nbsp;")
	{
		document.getElementById(aid).innerHTML ="-&nbsp;&nbsp;";
		document.getElementById("ul_volunteers_name3").style.display ="block";
		document.getElementById("next_volunteers_name3[1]").style.display ="block";
	}
	else
	{
			document.getElementById(aid).innerHTML = "+&nbsp;&nbsp;";
			document.getElementById("ul_volunteers_name3").style.display ="none";
			//document.getElementById("next_volunteers[1]").style.display ="none";
			//document.getElementById("next_volunteers2[1]").style.display ="none";
			document.getElementById("next_volunteers_name3[1]").style.display ="none";
	}
	
	if(current != 0 || current != null)
	{
			if(level == 2 && adminsession ==0)
			{
				alert("You can not see more than level 3");
				return;
			}
                var http_request = Create_Object();  // The variable that makes Ajax possible!
				//var cnt = parseInt(document.getElementById("next_volunteers_cnt").value)+1;
				var cnt = parseInt(level)+1;

                // Create a function that will receive data sent from the server
                http_request.onreadystatechange = function(){
                        if(http_request.readyState == 4){
                                //alert(http_request.responseText);
								document.getElementById("next_volunteers_cnt").value = cnt;
								document.getElementById("next_volunteers_name3["+(cnt-1)+"]").innerHTML = "";
                                document.getElementById("next_volunteers_name3["+(cnt-1)+"]").innerHTML = http_request.responseText;
								
                        }
                }
	}
	
}
function addmore_volunteers_name1(current,level,aid,cntlvl)
{
	if(cntlvl >= 2 && adminsession ==0)
	{
		alert("You can not see more than level 3");
		return;
	}

	//alert(aid);
	var id = document.getElementById(aid).innerHTML;
	if(id=="+&nbsp;&nbsp;")
	{
			document.getElementById(aid).innerHTML ="-&nbsp;&nbsp;";
			document.getElementById("next_volunteers_name["+level+"]").style.display = "block";
	}
	else if(id=="-&nbsp;&nbsp;")
	{
		document.getElementById(aid).innerHTML ="+&nbsp;&nbsp;";
		document.getElementById("next_volunteers_name["+level+"]").style.display = "none";
		return;
	}
	if(current != 0 || current != null)
	{
                var http_request = Create_Object();  // The variable that makes Ajax possible!
				//var cnt = parseInt(document.getElementById("next_volunteers_cnt").value)+1;
				var cnt = document.getElementById("volnumbers"+level).value;
				
				// Create a function that will receive data sent from the server
				//alert(level);
                http_request.onreadystatechange = function(){
                        if(http_request.readyState == 4){
                                //alert(http_request.responseText);
								cnt = level+""+1;
								//document.getElementById("volnumbers"+level).value = cnt;
								//document.getElementById("next_volunteers_name_cnt").value = cnt;
								document.getElementById("next_volunteers_name["+level+"]").innerHTML = "";
							    document.getElementById("next_volunteers_name["+level+"]").innerHTML = http_request.responseText;
								
                        }
                }
				var parameters = "?myaction=add&vnumber="+current+"&cnt="+cnt+"&cntlvl="+cntlvl;
                http_request.open("GET",HTTP_URL+"member/ajax/lastvolunteer_name1.php" + parameters, true);
                http_request.send(null);
	}
	
}
function addmore_volunteers_name2(current,level,aid,cntlvl)
{
	if(cntlvl >= 2 && adminsession ==0)
	{
		alert("You can not see more than level 3");
		return;
	}
	
	//alert(aid);
	var id = document.getElementById(aid).innerHTML;
	//alert(id);
	if(id=="+&nbsp;&nbsp;")
	{
			document.getElementById(aid).innerHTML ="-&nbsp;&nbsp;";
			document.getElementById("next_volunteers_name2["+level+"]").style.display = "block";
	}
	else if(id=="-&nbsp;&nbsp;")
	{
		document.getElementById(aid).innerHTML ="+&nbsp;&nbsp;";
		document.getElementById("next_volunteers_name2["+level+"]").style.display = "none";
		return;
	}
/*
	if(id=="+&nbsp;&nbsp;")
	{
		if(aid=='vo1'+level)
		{
			document.getElementById(aid).innerHTML ="-&nbsp;&nbsp;";
			document.getElementById("next_volunteers_name2["+level+"]").style.display ="block";
		}

		if(aid=='vo2'+level)
		{
			document.getElementById(aid).innerHTML ="-&nbsp;&nbsp;";
			document.getElementById("next_volunteers_name2["+level+"]").style.display ="block";
		}
		if(aid=='vo3'+level)
		{
			document.getElementById(aid).innerHTML ="-&nbsp;&nbsp;";
			document.getElementById("next_volunteers_name2["+level+"]").style.display ="block";
		}
		
		if(aid=='volunteers_expand1')
		{
			document.getElementById(aid).innerHTML ="-&nbsp;&nbsp;";
			document.getElementById("volunteers_expand2").innerHTML="+&nbsp;&nbsp;"
			document.getElementById("volunteers_expand3").innerHTML="+&nbsp;&nbsp;"
			document.getElementById("next_volunteers_name2[1]").style.display ="block";
		}
		if(aid=='volunteers_expand2')
		{
			document.getElementById(aid).innerHTML ="-&nbsp;&nbsp;";
			document.getElementById("volunteers_expand1").innerHTML="+&nbsp;&nbsp;"
			document.getElementById("volunteers_expand3").innerHTML="+&nbsp;&nbsp;"
			document.getElementById("next_volunteers_name2[1]").style.display ="block";
			
		}
		if(aid=='volunteers_expand3')
		{
			document.getElementById(aid).innerHTML ="-&nbsp;&nbsp;";
			document.getElementById("volunteers_expand1").innerHTML="+&nbsp;&nbsp;"
			document.getElementById("volunteers_expand2").innerHTML="+&nbsp;&nbsp;"
			document.getElementById("next_volunteers_name2[1]").style.display ="block";
		}
		
	}
	else
	{
			document.getElementById(aid).innerHTML = "+&nbsp;&nbsp;";
			if(aid=='vo1'+level)
			{
				document.getElementById(aid).innerHTML ="+&nbsp;&nbsp;";
				document.getElementById("next_volunteers_name2["+level+"]").style.display ="none";
			}
			if(aid=='vo2'+level)
			{
				document.getElementById(aid).innerHTML ="+&nbsp;&nbsp;";
				document.getElementById("next_volunteers_name2["+level+"]").style.display ="none";
			}
			if(aid=='vo3'+level)
			{
				document.getElementById(aid).innerHTML ="+&nbsp;&nbsp;";
				document.getElementById("next_volunteers_name2["+level+"]").style.display ="none";
			}
			
			if(aid=='volunteers_expand1')
			{
				document.getElementById(aid).innerHTML ="+&nbsp;&nbsp;";
				document.getElementById("next_volunteers_name2[1]").style.display ="none";
			}
			if(aid=='volunteers_expand2')
			{
				document.getElementById(aid).innerHTML ="+&nbsp;&nbsp;";
				document.getElementById("next_volunteers_name2[1]").style.display ="none";
			}
			if(aid=='volunteers_expand3')
			{
				document.getElementById(aid).innerHTML ="+&nbsp;&nbsp;";
				document.getElementById("next_volunteers_name2[1]").style.display ="none";
			}
			//document.getElementById("next_volunteers[4]").style.display ="none";
			//document.getElementById("hideul").style.display ="none";
	}
	*/
	if(current != 0 || current != null)
	{
			if(level == 2 && adminsession ==0)
			{
				alert("You can not see more than level 3");
				return;
			}
                var http_request = Create_Object();  // The variable that makes Ajax possible!
				//var cnt = parseInt(document.getElementById("next_volunteers_cnt").value)+1;
				//var cnt = document.getElementById("volnumbers2").value+2;
				var cnt = document.getElementById("volnumbers2"+level).value;
                // Create a function that will receive data sent from the server
				http_request.onreadystatechange = function(){
                        if(http_request.readyState == 4){
                                //alert(http_request.responseText);
								cnt = level+""+1;
								//cnt = document.getElementById("volnumbers2").value+2;
								//document.getElementById("volnumbers").value = document.getElementById("volnumbers2").value+2;
								//document.getElementById("next_volunteers_name2_cnt").value = cnt;
								document.getElementById("next_volunteers_name2["+level+"]").innerHTML = "";
							    document.getElementById("next_volunteers_name2["+level+"]").innerHTML = http_request.responseText;
								
                        }
                }
				
                var parameters = "?myaction=add&vnumber="+current+"&cnt="+cnt+"&cntlvl="+cntlvl;
                http_request.open("GET",HTTP_URL+"member/ajax/lastvolunteer_name1.php" + parameters, true);
                http_request.send(null);
	}
	
}
function addmore_volunteers_name3(current,level,aid,cntlvl)
{
	if(cntlvl >= 2 && adminsession ==0)
	{
		alert("You can not see more than level 3");
		return;
	}
	
	//alert(aid);
	var id = document.getElementById(aid).innerHTML;
	if(id=="+&nbsp;&nbsp;")
	{
			document.getElementById(aid).innerHTML ="-&nbsp;&nbsp;";
			document.getElementById("next_volunteers_name3["+level+"]").style.display = "block";
	}
	else if(id=="-&nbsp;&nbsp;")
	{
		document.getElementById(aid).innerHTML ="+&nbsp;&nbsp;";
		document.getElementById("next_volunteers_name3["+level+"]").style.display = "none";
		return;
	}
/*
	//alert(id);
	if(id=="+&nbsp;&nbsp;")
	{
		if(aid=='vo1'+level)
		{
			document.getElementById(aid).innerHTML ="-&nbsp;&nbsp;";
			document.getElementById("next_volunteers_name3["+level+"]").style.display ="block";
		}

		if(aid=='vo2'+level)
		{
			document.getElementById(aid).innerHTML ="-&nbsp;&nbsp;";
			document.getElementById("next_volunteers_name3["+level+"]").style.display ="block";
		}
		if(aid=='vo3'+level)
		{
			document.getElementById(aid).innerHTML ="-&nbsp;&nbsp;";
			document.getElementById("next_volunteers_name3["+level+"]").style.display ="block";
		}
		
		if(aid=='volunteers_expand1')
		{
			document.getElementById(aid).innerHTML ="-&nbsp;&nbsp;";
			document.getElementById("volunteers_expand2").innerHTML="+&nbsp;&nbsp;"
			document.getElementById("volunteers_expand3").innerHTML="+&nbsp;&nbsp;"
			document.getElementById("next_volunteers_name3[1]").style.display ="block";
		}
		if(aid=='volunteers_expand2')
		{
			document.getElementById(aid).innerHTML ="-&nbsp;&nbsp;";
			document.getElementById("volunteers_expand1").innerHTML="+&nbsp;&nbsp;"
			document.getElementById("volunteers_expand3").innerHTML="+&nbsp;&nbsp;"
			document.getElementById("next_volunteers_name3[1]").style.display ="block";
			
		}
		if(aid=='volunteers_expand3')
		{
			document.getElementById(aid).innerHTML ="-&nbsp;&nbsp;";
			document.getElementById("volunteers_expand1").innerHTML="+&nbsp;&nbsp;"
			document.getElementById("volunteers_expand2").innerHTML="+&nbsp;&nbsp;"
			document.getElementById("next_volunteers_name3[1]").style.display ="block";
		}
		
	}
	else
	{
			document.getElementById(aid).innerHTML = "+&nbsp;&nbsp;";
			if(aid=='vo1'+level)
			{
				document.getElementById(aid).innerHTML ="+&nbsp;&nbsp;";
				document.getElementById("next_volunteers_name3["+level+"]").style.display ="none";
			}
			if(aid=='vo2'+level)
			{
				document.getElementById(aid).innerHTML ="+&nbsp;&nbsp;";
				document.getElementById("next_volunteers_name3["+level+"]").style.display ="none";
			}
			if(aid=='vo3'+level)
			{
				document.getElementById(aid).innerHTML ="+&nbsp;&nbsp;";
				document.getElementById("next_volunteers_name3["+level+"]").style.display ="none";
			}
			
			if(aid=='volunteers_expand1')
			{
				document.getElementById(aid).innerHTML ="+&nbsp;&nbsp;";
				document.getElementById("next_volunteers_name3[1]").style.display ="none";
			}
			if(aid=='volunteers_expand2')
			{
				document.getElementById(aid).innerHTML ="+&nbsp;&nbsp;";
				document.getElementById("next_volunteers_name3[1]").style.display ="none";
			}
			if(aid=='volunteers_expand3')
			{
				document.getElementById(aid).innerHTML ="+&nbsp;&nbsp;";
				document.getElementById("next_volunteers_name3[1]").style.display ="none";
			}
			//document.getElementById("next_volunteers[4]").style.display ="none";
			//document.getElementById("hideul").style.display ="none";
	}
	*/
	if(current != 0 || current != null)
	{
			if(level == 2 && adminsession ==0)
			{
				alert("You can not see more than level 3");
				return;
			}
                var http_request = Create_Object();  // The variable that makes Ajax possible!
				//var cnt = parseInt(document.getElementById("next_volunteers_cnt").value)+1;
				//var cnt = parseInt(level)+1;
				var cnt = document.getElementById("volnumbers3"+level).value;
                // Create a function that will receive data sent from the server

                http_request.onreadystatechange = function(){
                        if(http_request.readyState == 4){
							
								cnt = level+""+1;
                                //alert(http_request.responseText);
								//cnt = parseInt(document.getElementById("volnumbers").value)+1;
								//document.getElementById("volnumbers").value = (parseInt(document.getElementById("volnumbers").value)+1);
								//document.getElementById("next_volunteers_name3_cnt").value = cnt;
								document.getElementById("next_volunteers_name3["+level+"]").innerHTML = "";
							    document.getElementById("next_volunteers_name3["+level+"]").innerHTML = http_request.responseText;
								
                        }
                }
				
                var parameters = "?myaction=add&vnumber="+current+"&cnt="+cnt+"&cntlvl="+cntlvl;
                http_request.open("GET",HTTP_URL+"member/ajax/lastvolunteer_name1.php" + parameters, true);
                http_request.send(null);
	}
	
}
function addmore_volunteers2_name(current,level,aid)
{
	var id = document.getElementById(aid).innerHTML;
	//alert(id);
	if(id=="+&nbsp;&nbsp;")
	{
		if(aid=='vo4'+level)
		{
			document.getElementById(aid).innerHTML ="-&nbsp;&nbsp;";
			document.getElementById("next_volunteers2["+level+"]").style.display ="block";
		}

		if(aid=='vo5'+level)
		{
			document.getElementById(aid).innerHTML ="-&nbsp;&nbsp;";
			document.getElementById("next_volunteers2["+level+"]").style.display ="block";
		}
		if(aid=='vo6'+level)
		{
			document.getElementById(aid).innerHTML ="-&nbsp;&nbsp;";
			document.getElementById("next_volunteers2["+level+"]").style.display ="block";
		}
		
		if(aid=='volunteers2_expand1')
		{
			document.getElementById(aid).innerHTML ="-&nbsp;&nbsp;";
			document.getElementById("next_volunteers2[1]").style.display ="block";
		}
		if(aid=='volunteers2_expand2')
		{
			document.getElementById(aid).innerHTML ="-&nbsp;&nbsp;";
			
			document.getElementById("next_volunteers2[1]").style.display ="block";
		}
		if(aid=='volunteers2_expand3')
		{
			document.getElementById(aid).innerHTML ="-&nbsp;&nbsp;";
			
			document.getElementById("next_volunteers2[1]").style.display ="block";
		}
	}
	else
	{
			document.getElementById(aid).innerHTML = "+&nbsp;&nbsp;";
			if(aid=='vo4'+level)
			{
				document.getElementById(aid).innerHTML ="+&nbsp;&nbsp;";
				document.getElementById("next_volunteers2["+level+"]").style.display ="none";
			}
			if(aid=='vo5'+level)
			{
				document.getElementById(aid).innerHTML ="+&nbsp;&nbsp;";
				document.getElementById("next_volunteers2["+level+"]").style.display ="none";
			}
			if(aid=='vo6'+level)
			{
				document.getElementById(aid).innerHTML ="+&nbsp;&nbsp;";
				document.getElementById("next_volunteers2["+level+"]").style.display ="none";
			}
			
			if(aid=='volunteers2_expand1')
			{
				document.getElementById(aid).innerHTML ="+&nbsp;&nbsp;";
				document.getElementById("next_volunteers2[1]").style.display ="none";
			}
			if(aid=='volunteers2_expand2')
			{
				document.getElementById(aid).innerHTML ="+&nbsp;&nbsp;";
				document.getElementById("next_volunteers2[1]").style.display ="none";
			}
			if(aid=='volunteers2_expand3')
			{
				document.getElementById(aid).innerHTML ="+&nbsp;&nbsp;";
				document.getElementById("next_volunteers2[1]").style.display ="none";
			}
	}
	if(current != 0 || current != null)
	{
			if(level == 2 && adminsession ==0)
			{
				alert("You can not see more than level 3");
				return;
			}
                var http_request = Create_Object();  // The variable that makes Ajax possible!
                // Create a function that will receive data sent from the server
				var cnt = parseInt(level)+1;
				http_request.onreadystatechange = function(){
                        if(http_request.readyState == 4){
                                //alert(http_request.responseText);
								document.getElementById("next_volunteers2_cnt").value = cnt;
								document.getElementById("next_volunteers2["+(cnt-1)+"]").innerHTML = "";
                                document.getElementById("next_volunteers2["+(cnt-1)+"]").innerHTML = http_request.responseText;
                        }
                }
                var parameters = "?myaction=add&vnumber="+current+"&cnt="+cnt;
                http_request.open("GET",HTTP_URL+"member/ajax/lastvolunteer_name2.php" + parameters, true);
                http_request.send(null);
	}
}
function addmore_volunteers3_name(current,level,aid)
{
	
	var id = document.getElementById(aid).innerHTML;
	//alert(id);
	
	if(id=="+&nbsp;&nbsp;")
	{
		if(aid=='vo7'+level)
		{
			document.getElementById(aid).innerHTML ="-&nbsp;&nbsp;";
			document.getElementById("next_volunteers3["+level+"]").style.display ="block";
			
		}

		if(aid=='vo8'+level)
		{
			document.getElementById(aid).innerHTML ="-&nbsp;&nbsp;";
			document.getElementById("next_volunteers3["+level+"]").style.display ="block";
		}
		if(aid=='vo9'+level)
		{
			document.getElementById(aid).innerHTML ="-&nbsp;&nbsp;";
			document.getElementById("next_volunteers3["+level+"]").style.display ="block";
		}
		
		if(aid=='volunteers3_expand1')
		{
			document.getElementById(aid).innerHTML ="-&nbsp;&nbsp;";
			document.getElementById("volunteers3_expand2").innerHTML ="+&nbsp;&nbsp;";
			document.getElementById("volunteers3_expand3").innerHTML ="+&nbsp;&nbsp;";	
			document.getElementById("next_volunteers3[1]").style.display ="block";
		}
		if(aid=='volunteers3_expand2')
		{
			document.getElementById(aid).innerHTML ="-&nbsp;&nbsp;";
			document.getElementById("volunteers3_expand1").innerHTML ="+&nbsp;&nbsp;";
			document.getElementById("volunteers3_expand3").innerHTML ="+&nbsp;&nbsp;";
			document.getElementById("next_volunteers3[1]").style.display ="block";
		}
		if(aid=='volunteers3_expand3')
		{
			document.getElementById(aid).innerHTML ="-&nbsp;&nbsp;";
			document.getElementById("volunteers3_expand1").innerHTML ="+&nbsp;&nbsp;";
			document.getElementById("volunteers3_expand2").innerHTML ="+&nbsp;&nbsp;";
			document.getElementById("next_volunteers3[1]").style.display ="block";
		}
	}
	else
	{
			document.getElementById(aid).innerHTML = "+&nbsp;&nbsp;";
			if(aid=='vo7'+level)
			{
				document.getElementById(aid).innerHTML ="+&nbsp;&nbsp;";
				document.getElementById("next_volunteers3["+level+"]").style.display ="none";
			}
			if(aid=='vo8'+level)
			{
				document.getElementById(aid).innerHTML ="+&nbsp;&nbsp;";
				document.getElementById("next_volunteers3["+level+"]").style.display ="none";
			}
			if(aid=='vo9'+level)
			{
				document.getElementById(aid).innerHTML ="+&nbsp;&nbsp;";
				document.getElementById("next_volunteers3["+level+"]").style.display ="none";
			}
			
			if(aid=='volunteers3_expand1')
			{
				document.getElementById(aid).innerHTML ="+&nbsp;&nbsp;";
				document.getElementById("next_volunteers3[1]").style.display ="none";
			}
			if(aid=='volunteers3_expand2')
			{
				document.getElementById(aid).innerHTML ="+&nbsp;&nbsp;";
				document.getElementById("next_volunteers3[1]").style.display ="none";
			}
			if(aid=='volunteers3_expand3')
			{
				document.getElementById(aid).innerHTML ="+&nbsp;&nbsp;";
				document.getElementById("next_volunteers3[1]").style.display ="none";
			}
	}
	if(current != 0 || current != null)
	{
			if(level == 2 && adminsession ==0)
			{
				alert("You can not see more than level 3");
				return;
			}
                var http_request = Create_Object();  // The variable that makes Ajax possible!
                // Create a function that will receive data sent from the server
				var cnt = parseInt(level)+1;
                http_request.onreadystatechange = function(){
                        if(http_request.readyState == 4){
                                //alert(http_request.responseText);
								document.getElementById("next_volunteers3_cnt").value = cnt;
								document.getElementById("next_volunteers3["+(cnt-1)+"]").innerHTML = "";
                                document.getElementById("next_volunteers3["+(cnt-1)+"]").innerHTML = http_request.responseText;
                        }
                }
                var parameters = "?myaction=add&vnumber="+current+"&cnt="+cnt;
                http_request.open("GET",HTTP_URL+"member/ajax/lastvolunteer_name3.php" + parameters, true);
                http_request.send(null);
	}
}
function volunteers_namae_5_3(current,level,aid,divname)
{
	if((level+"").length == 3 && adminsession ==0)
	{
		alert('You can see upto level 3 only');
		return;
	}
	//alert(current+" "+level+" "+aid+" "+divname);
	var id = document.getElementById(aid).innerHTML;
	if(id=="+&nbsp;&nbsp;")
	{
			document.getElementById(aid).innerHTML ="-&nbsp;&nbsp;";
			document.getElementById(divname+"["+level+"]").style.display = "block";
	}
	else if(id=="-&nbsp;&nbsp;")
	{
		document.getElementById(aid).innerHTML ="+&nbsp;&nbsp;";
		document.getElementById(divname+"["+level+"]").style.display = "none";
		return;
	}

	if(current != 0 || current != null)
	{
			/*if(level == 3)
			{
				alert("You can not see more than level 3");
				return;
			}*/
                var http_request = Create_Object();  // The variable that makes Ajax possible!
				//var cnt = parseInt(document.getElementById("next_volunteers_cnt").value)+1;
				var cnt = document.getElementById(divname).value;
				//alert(cnt);
				// Create a function that will receive data sent from the server
				//alert(level);
                http_request.onreadystatechange = function(){
                        if(http_request.readyState == 4){
                                //alert(http_request.responseText);
								cnt = level+""+1;
								//document.getElementById("volnumbers"+level).value = cnt;
								document.getElementById(divname+"["+level+"]").innerHTML = "";
							    document.getElementById(divname+"["+level+"]").innerHTML = http_request.responseText;
								
                        }
                }
				//alert(cnt);
				var parameters = "?myaction=add&vnumber="+current+"&cnt="+level;
				//alert(parameters);
                http_request.open("GET",HTTP_URL+"member/ajax/lastvolunteer_name_5_3_1.php" + parameters, true);
                http_request.send(null);
	}
}
		 
function volunteers_namae_10_3(current,level,aid,divname)
{
	if((level+"").length == 3 && adminsession ==0)
	{
		var str1 = (level+"").substring(((level+"").length)-2,(level+"").length);
		if(str1 == 10)
		{
		}
		else
		{
			alert('You can see upto level 3 only');
			return;
		}
	}

//	alert(aid);
	var id = document.getElementById(aid).innerHTML;
	if(id=="+&nbsp;&nbsp;")
	{
			document.getElementById(aid).innerHTML ="-&nbsp;&nbsp;";
			document.getElementById(divname+"["+level+"]").style.display = "block";
	}
	else if(id=="-&nbsp;&nbsp;")
	{
		document.getElementById(aid).innerHTML ="+&nbsp;&nbsp;";
		document.getElementById(divname+"["+level+"]").style.display = "none";
		return;
	}

	if(current != 0 || current != null)
	{
		/*	if(level == 2)
			{
				alert("You can not see more than level 3");
				return;
			}*/
                var http_request = Create_Object();  // The variable that makes Ajax possible!
				//var cnt = parseInt(document.getElementById("next_volunteers_cnt").value)+1;
				var cnt = document.getElementById(divname).value;
				//alert(cnt);
				// Create a function that will receive data sent from the server
				//alert(level);
                http_request.onreadystatechange = function(){
                        if(http_request.readyState == 4){
                                //alert(http_request.responseText);
								cnt = level+""+1;
								//document.getElementById("volnumbers"+level).value = cnt;
								document.getElementById(divname+"["+level+"]").innerHTML = "";
							    document.getElementById(divname+"["+level+"]").innerHTML = http_request.responseText;
								
                        }
                }
				var parameters = "?myaction=add&vnumber="+current+"&cnt="+level;
                http_request.open("GET",HTTP_URL+"member/ajax/lastvolunteer_name_10_3_1.php" + parameters, true);
                http_request.send(null);
	}
		
}
