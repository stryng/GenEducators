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
var temp=new Array();
var temp1=0;
var temp2=0;
var temp3=0;
function addmore_volunteers(current,level,treenumber,ele_name)
{
	
	
	temp11=0;
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
				//alert(treenumber);
				if(temp[treenumber] > 0 && temp[treenumber] != "undefined")
				{
					document.getElementById("img_"+treenumber+"["+temp[treenumber]+"]").style.backgroundColor = "";
				}
                http_request.onreadystatechange = function(){
                        if(http_request.readyState == 4){
                               	//alert(http_request.responseText);
								document.getElementById(ele_name).value = cnt;
								document.getElementById("next_volunteers"+treenumber+"["+(cnt-1)+"]").innerHTML = "";
								document.getElementById("img_"+treenumber+"["+current+"]").style.backgroundColor = "#333333";
								document.getElementById("next_volunteers"+treenumber+"["+(cnt-1)+"]").innerHTML = http_request.responseText;
                        }
                }
                var parameters = "?myaction=add&vnumber="+current+"&cnt="+cnt+"&treenumber="+treenumber+"&ele_name="+ele_name;
                http_request.open("GET",HTTP_URL+"member/ajax/lastvolunteer.php" + parameters, true);
                http_request.send(null);
	}
	temp[treenumber] = current;
}
var temp2=0;
var temp21=0;
function addmore_volunteers2(current,level)
{
	temp21=0;
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
				if(temp2 > 0 && temp2 != "undefined")
				{
					document.getElementById("img_2["+temp2+"]").style.backgroundColor = "#fff";
				}
				http_request.onreadystatechange = function(){
                        if(http_request.readyState == 4){
                                //alert(http_request.responseText);
								document.getElementById("next_volunteers2_cnt").value = cnt;
								document.getElementById("next_volunteers2["+(cnt-1)+"]").innerHTML = "";
								document.getElementById("img_2["+current+"]").style.backgroundColor = "#333333";
                                document.getElementById("next_volunteers2["+(cnt-1)+"]").innerHTML = http_request.responseText;
                        }
                }
                var parameters = "?myaction=add&vnumber="+current+"&cnt="+cnt;
                http_request.open("GET",HTTP_URL+"lastvolunteer2.php" + parameters, true);
                http_request.send(null);
	}
	temp2 = current;
}
var temp3=0;
var temp31=0;
function addmore_volunteers3(current,level)
{
	temp31=0;
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
				if(temp3 > 0 && temp3 != "undefined")
				{
					document.getElementById("img_3["+temp3+"]").style.backgroundColor = "#fff";
				}
                http_request.onreadystatechange = function(){
                        if(http_request.readyState == 4){
                                //alert(http_request.responseText);
								document.getElementById("next_volunteers3_cnt").value = cnt;
								document.getElementById("next_volunteers3["+(cnt-1)+"]").innerHTML = "";
								document.getElementById("img_3["+current+"]").style.backgroundColor = "#333333";
                                document.getElementById("next_volunteers3["+(cnt-1)+"]").innerHTML = http_request.responseText;
                        }
                }
                var parameters = "?myaction=add&vnumber="+current+"&cnt="+cnt;
                http_request.open("GET",HTTP_URL+"lastvolunteer3.php" + parameters, true);
                http_request.send(null);
	}
	temp3=current;
}
var temp_5_3=0;
var temp11_5_3=0;

function addmore_volunteers_5_3(current,level)
{
	temp11_5_3=0;
	if(current != 0 || current != null)
	{
			if(level == 3 && adminsession ==0)
			{
				alert("You can not see more than level 3");
				return;
			}
                var http_request = Create_Object();  // The variable that makes Ajax possible!
				//var cnt = parseInt(document.getElementById("next_volunteers_cnt").value)+1;
				var cnt = parseInt(level)+1;

                // Create a function that will receive data sent from the server
				if(temp_5_3 > 0 && temp_5_3 != "undefined")
				{
					document.getElementById("img_1["+temp_5_3+"]").style.backgroundColor = "";
				}
                http_request.onreadystatechange = function(){
                        if(http_request.readyState == 4){
                                //alert(http_request.responseText);
								document.getElementById("next_volunteers_cnt").value = cnt;
								document.getElementById("next_volunteers["+(cnt-1)+"]").innerHTML = "";
								document.getElementById("img_1["+current+"]").style.backgroundColor = "#333333";
								document.getElementById("next_volunteers["+(cnt-1)+"]").innerHTML = http_request.responseText;
                        }
                }
                var parameters = "?myaction=add&vnumber="+current+"&cnt="+cnt;
                http_request.open("GET",HTTP_URL+"member/ajax/lastvolunteer_5_3.php" + parameters, true);
                http_request.send(null);
	}
	temp_5_3 = current;
}
//pragnesh code for 10x3
var temp_10_3=0;
var temp11_10_3=0;

function addmore_volunteers_10_3(current,level)
{
	temp11_10_3=0;
	if(current != 0 || current != null)
	{
			if(level == 3 && adminsession ==0)
			{
				alert("You can not see more than level 3");
				return;
			}
                var http_request = Create_Object();  // The variable that makes Ajax possible!
				//var cnt = parseInt(document.getElementById("next_volunteers_cnt").value)+1;
				var cnt = parseInt(level)+1;

                // Create a function that will receive data sent from the server
				if(temp_10_3 > 0 && temp_10_3 != "undefined")
				{
					document.getElementById("img_1["+temp_10_3+"]").style.backgroundColor = "";
				}
                http_request.onreadystatechange = function(){
                        if(http_request.readyState == 4){
                                //alert(http_request.responseText);
								document.getElementById("next_volunteers_cnt").value = cnt;
								document.getElementById("next_volunteers["+(cnt-1)+"]").innerHTML = "";
								document.getElementById("img_1["+current+"]").style.backgroundColor = "#333333";
								document.getElementById("next_volunteers["+(cnt-1)+"]").innerHTML = http_request.responseText;
                        }
                }
                var parameters = "?myaction=add&vnumber="+current+"&cnt="+cnt;
                http_request.open("GET",HTTP_URL+"member/ajax/lastvolunteer_10_3.php" + parameters, true);
                http_request.send(null);
	}
	temp_10_3 = current;
}
var temp_level_10_3=0;

function addmore_volunteers_10_3_1(current,level)
{
	//if(level == 3)
	//{
	//	alert('You can see upto level 3 only');
	//	return;
	//}
		
	if(current != 0 || current != null)
	{
			if(level == 3 && adminsession ==0)
			{
				alert("You can not see more than level 3");
				return;
			}
                var http_request = Create_Object();  // The variable that makes Ajax possible!
				//var cnt = parseInt(document.getElementById("next_volunteers_cnt").value)+1;
				var cnt = parseInt(level)+1;
				if(temp11_10_3 > 0 && temp11_10_3 != "undefined")
				{
					if(temp_level_10_3!=level)
					{
						document.getElementById("img_1["+temp11_10_3+"]").style.backgroundColor = "#333333";
					}
					else
					{
						document.getElementById("img_1["+temp11_10_3+"]").style.backgroundColor = "#fff";
					}
				}
                // Create a function that will receive data sent from the server
                http_request.onreadystatechange = function(){
                        if(http_request.readyState == 4){
                                //alert(http_request.responseText);
								document.getElementById("next_volunteers_cnt").value = cnt;
								document.getElementById("next_volunteers["+(cnt-1)+"]").innerHTML = "";
								document.getElementById("img_1["+current+"]").style.backgroundColor = "#333333";
								document.getElementById("next_volunteers["+(cnt-1)+"]").innerHTML = http_request.responseText;
                        }
                }
                var parameters = "?myaction=add&vnumber="+current+"&cnt="+cnt;
                http_request.open("GET",HTTP_URL+"lastvolunteer_10_3_1.php" + parameters, true);
                http_request.send(null);
	}
	temp11_10_3=current;
	temp_level_10_3=level;
}