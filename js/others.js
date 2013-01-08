/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
                
    $(document).ready(function()
    {
        $('#Email').blur(email_check);
		$('#UserName').keyup(username_check);
		$('#UserName').blur(username_check);
    });
    function email_check()
    {
			if(document.getElementById('Email_ori'))
			{
				if(document.getElementById('Email_ori').value == document.getElementById('Email').value)
				{
                    $('#Email').css('border', '3px #090 solid');
					$('#cross').hide();
					$('#tick').fadeIn();
					return;
				}
			}
           var email = $('#Email').val();
            if(email == "" || email.length < 4 )
            {
                $('#Email').css('border', '3px #CCC solid');
                $('#tick').hide();
            }
            else
            {

                jQuery.ajax({
                       type: "POST",
                       url: "check.php",
                       data: 'action=emailsignup&email='+ email,
                       cache: false,
                       success: function(response)
                       {
                            if(response == 1)
                            {
                                    $('#Email').css('border', '3px #C33 solid');
                                    $('#tick').hide();
                                    $('#cross').fadeIn();
									document.getElementById("chk_err").value = 'error';
                            }
                            else
                            {
                                    $('#Email').css('border', '3px #090 solid');
                                    $('#cross').hide();
                                    $('#tick').fadeIn();
									document.getElementById("chk_err").value = '';
                             }
                        }
                });
            }
	}
	
    function username_check()
    {
			if(document.getElementById('UserName_ori'))
			{
				if(document.getElementById('UserName_ori').value == document.getElementById('UserName').value)
				{
                    $('#UserName').css('border', '3px #090 solid');
					$('#cross').hide();
					$('#tick').fadeIn();
					return;
				}
			}
           var username = $('#UserName').val();
            if(username == "" || username.length < 4 )
            {
                $('#UserName').css('border', '3px #CCC solid');
                $('#tick1').hide();
            }
            else
            {
                jQuery.ajax({
                       type: "POST",
                       url: "check.php",
                       data: 'action=usersignup&username='+ username,
                       cache: false,
                       success: function(response)
                       {
						    if(response == 1)
                            {
                                    $('#UserName').css('border', '3px #C33 solid');
                                    $('#tick1').hide();
                                    $('#cross1').fadeIn();
									document.getElementById("chk_err").value = 'error';
                            }
                            else
                            {
                                    $('#UserName').css('border', '3px #090 solid');
                                    $('#cross1').hide();
                                    $('#tick1').fadeIn();
									document.getElementById("chk_err").value = '';
                             }
                        }
                });
            }
     }
	function upgrade_3_3(uid)
	{
		var r=confirm("Are you sure, you want to upgrade in 3*3");
		if (r==true)
		{
			 jQuery.ajax({
                       type: "POST",
                       url: "upgrade_user.php",
                       data: 'stream=3_3&uid='+uid,
                       cache: false,
                       success: function(response)
                       {
                            if(response == 1)
                            {
                                $('#downgradestream33_div').css('display', 'block');
                                $('#upgradestream33_div').css('display', 'none');
								alert("upgraded in stream 3x3 successfully");
                            }
							else
							{
								alert("This user is not upgrade in stream 3x3");
							}
                        }
             });
		}
	}
	function upgrade_5_3(uid)
	{
		var r=confirm("Are you sure, you want to upgrade in 5*3");
		if (r==true)
		{
			 jQuery.ajax({
                       type: "POST",
                       url: "upgrade_user.php",
                       data: 'stream=5_3&uid='+uid,
                       cache: false,
                       success: function(response)
                       {
                            if(response == 1)
                            {
								$('#downgradestream33_div').css('display', 'block');
                                $('#downgradestream53_div').css('display', 'block');
								$('#upgradestream33_div').css('display', 'none');
                                $('#upgradestream53_div').css('display', 'none');
								alert("upgraded in stream 5x3 successfully");
                            }
							else
							{
								alert("This user is not upgrade in stream 5x3");
							}
                        }
             });
		}
	}
	function upgrade_10_3(uid)
	{
		var r=confirm("Are you sure, you want to upgrade in 10*3");
		if (r==true)
		{
			 jQuery.ajax({
                       type: "POST",
                       url: "upgrade_user.php",
                       data: 'stream=10_3&uid='+uid,
                       cache: false,
                       success: function(response)
                       {
						   	
						   	if(response == 1)
                            {
                                $('#downgradestream33_div').css('display', 'block');
                                $('#downgradestream53_div').css('display', 'block');
								$('#downgradestream103_div').css('display', 'block');
								$('#upgradestream33_div').css('display', 'none');
                                $('#upgradestream53_div').css('display', 'none');
								$('#upgradestream103_div').css('display', 'none');
								alert("upgraded in stream 10x3 successfully");
                            }
							else
							{
								alert("This user is not upgrade in stream 10x3");
							}
                        }
             });
		}
	}
	function downgrade_3_3(uid)
	{
		var r=confirm("Are you sure, you want to downgrade from 3*3");
		if (r==true)
		{
			 jQuery.ajax({
                       type: "POST",
                       url: "downgrade_user.php",
                       data: 'stream=3_3&uid='+uid,
                       cache: false,
                       success: function(response)
                       {
                            if(response == 1)
                            {
                                $('#upgradestream33_div').css('display', 'block');
								$('#upgradestream53_div').css('display', 'block');
								$('#upgradestream103_div').css('display', 'block');
								$('#downgradestream103_div').css('display', 'none');
								$('#downgradestream53_div').css('display', 'none');
								$('#downgradestream33_div').css('display', 'none');
								alert("downgraded from stream 3x3 successfully");
                            }
							else
							{
								alert("This user is not downgrade from stream 3x3");
							}
                        }
             });
		}
	}
	function downgrade_5_3(uid)
	{
		var r=confirm("Are you sure, you want to downgrade from 5*3");
		if (r==true)
		{
			 jQuery.ajax({
                       type: "POST",
                       url: "downgrade_user.php",
                       data: 'stream=5_3&uid='+uid,
                       cache: false,
                       success: function(response)
                       {
						   	
                            if(response == 1)
                            {
                                $('#upgradestream53_div').css('display', 'block');
								$('#upgradestream103_div').css('display', 'block');
								$('#downgradestream103_div').css('display', 'none');
								$('#downgradestream53_div').css('display', 'none');
								alert("downgraded from stream 5x3 successfully");
                            }
							else
							{
								alert("This user is not downgrade from stream 5x3");
							}
                        }
             });
		}
	}
	function downgrade_10_3(uid)
	{
		var r=confirm("Are you sure, you want to downgrade from 10*3");
		if (r==true)
		{
			 jQuery.ajax({
                       type: "POST",
                       url: "downgrade_user.php",
                       data: 'stream=10_3&uid='+uid,
                       cache: false,
                       success: function(response)
                       {
						   	if(response == 1)
                            {
                                $('#upgradestream103_div').css('display', 'block');
								$('#downgradestream103_div').css('display', 'none');
								alert("downgraded from stream 10x3 successfully");
                            }
							else
							{
								alert("This user is not downgrade from stream 10x3");
							}
                        }
             });
		}
	}

function nextday_calc()
{
	 var http_request = Create_Object(); 

	http_request.onreadystatechange = function()
	{
			if(http_request.readyState == 4)
			{
					//alert(http_request.responseText);
				/*	document.getElementById("next_volunteers_cnt").value = cnt;
					document.getElementById("next_volunteers["+(cnt-1)+"]").innerHTML = "";
					document.getElementById("img_1["+current+"]").style.backgroundColor = "#333333";
					document.getElementById("next_volunteers["+(cnt-1)+"]").innerHTML = http_request.responseText;
				*/
				 document.getElementById("headervalue").innerHTML = http_request.responseText;
				 document.getElementById("headervalue").style.display = 'none';
				 document.getElementById("headervalue").style.display = 'block';
			}
	}
	//var parameters = "?myaction=add&vnumber="+current+"&cnt="+cnt;
	var parameters = "";
	http_request.open("GET",HTTP_URL+"admin/nextdaycomm_calc.php" + parameters, true);
	http_request.send(null);

}
function nextday_calc2()
{
	 var http_request = Create_Object(); 

	http_request.onreadystatechange = function()
	{
			if(http_request.readyState == 4)
			{
					//alert(http_request.responseText);
				/*	document.getElementById("next_volunteers_cnt").value = cnt;
					document.getElementById("next_volunteers["+(cnt-1)+"]").innerHTML = "";
					document.getElementById("img_1["+current+"]").style.backgroundColor = "#333333";
					document.getElementById("next_volunteers["+(cnt-1)+"]").innerHTML = http_request.responseText;
				*/
				 document.getElementById("headervalue").innerHTML = http_request.responseText;
				 document.getElementById("headervalue").style.display = 'none';
				 document.getElementById("headervalue").style.display = 'block';
			}
	}
	//var parameters = "?myaction=add&vnumber="+current+"&cnt="+cnt;
	var parameters = "";
	http_request.open("GET",HTTP_URL+"admin/headerval.php" + parameters, true);
	http_request.send(null);

}
function nextday_calc_endu()
{
	 var http_request = Create_Object(); 

	http_request.onreadystatechange = function()
	{
			if(http_request.readyState == 4)
			{
				 document.getElementById("headervalue").innerHTML = http_request.responseText;
				 document.getElementById("headervalue").style.display = 'none';
				 document.getElementById("headervalue").style.display = 'block';
			}
	}
	//var parameters = "?myaction=add&vnumber="+current+"&cnt="+cnt;
	var parameters = "";
	http_request.open("GET",HTTP_URL+"nextdaycomm_calc.php" + parameters, true);
	http_request.send(null);

}
function nextday_calc_endu2()
{
	 var http_request = Create_Object(); 

	http_request.onreadystatechange = function()
	{
			if(http_request.readyState == 4)
			{
				 document.getElementById("headervalue").innerHTML = http_request.responseText;
				 document.getElementById("headervalue").style.display = 'none';
				 document.getElementById("headervalue").style.display = 'block';
			}
	}
	//var parameters = "?myaction=add&vnumber="+current+"&cnt="+cnt;
	var parameters = "";
	http_request.open("GET",HTTP_URL+"headerval.php" + parameters, true);
	http_request.send(null);

}

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
function volunteers_namae_comp_view(current,level,aid,divname)
{
/*	if((level+"").length == 3)
	{
		alert('You can see upto level 3 only');
		return;
	}
*/	//alert(current+" "+level+" "+aid+" "+divname);
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
                http_request.open("GET",HTTP_URL+"lastvolunteer_name_comp_view.php" + parameters, true);
                http_request.send(null);
	}
}

function volunteers_namae_comp_view_5_3(current,level,aid,divname)
{
/*	if((level+"").length == 3)
	{
		alert('You can see upto level 3 only');
		return;
	}
*/	//alert(current+" "+level+" "+aid+" "+divname);
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
                http_request.open("GET",HTTP_URL+"lastvolunteer_name_comp_view_5_3.php" + parameters, true);
                http_request.send(null);
	}
}

function volunteers_namae_comp_view_10_3(current,level,aid,divname)
{
/*	if((level+"").length == 3)
	{
		alert('You can see upto level 3 only');
		return;
	}
*/	//alert(current+" "+level+" "+aid+" "+divname);
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
                http_request.open("GET",HTTP_URL+"lastvolunteer_name_comp_view_10_3.php" + parameters, true);
                http_request.send(null);
	}
}


function fcn_search()
{
	var search_word = document.getElementById("search_word").value;
	var targetpage = document.getElementById("targetpage").value;
	
	var page = document.getElementById("page").value;
	if(document.getElementById("sel_value").value != "")
	{
		alert("Please uncheck selected user first");
		return false;
	}

	var http_request = Create_Object();  // The variable that makes Ajax possible!
		http_request.onreadystatechange = function(){
				if(http_request.readyState == 4){
						//alert(http_request.responseText);
						document.getElementById("memberlist1").innerHTML = "";
						document.getElementById("memberlist1").innerHTML = http_request.responseText;
						
				}
		}
		var parameters = "?search_word="+search_word+"&page="+page+"&targetpage="+targetpage;
		http_request.open("POST",HTTP_URL+"admin/memberlist.php" + parameters, true);
		http_request.send(null);
}

function fcn_search()
{
	var search_word = document.getElementById("search_word").value;
	var targetpage = document.getElementById("targetpage").value;
	
	var page = document.getElementById("page").value;
	if(document.getElementById("sel_value").value != "")
	{
		alert("Please uncheck selected user first");
		return false;
	}

	var http_request = Create_Object();  // The variable that makes Ajax possible!
		http_request.onreadystatechange = function(){
				if(http_request.readyState == 4){
						//alert(http_request.responseText);
						document.getElementById("memberlist1").innerHTML = "";
						document.getElementById("memberlist1").innerHTML = http_request.responseText;
						
				}
		}
		var parameters = "?search_word="+search_word+"&page="+page+"&targetpage="+targetpage;
		http_request.open("POST",HTTP_URL+"admin/memberlist.php" + parameters, true);
		http_request.send(null);
}
//-------------------------------------------------

function fcn_search_message1()
{

	var search_word = document.getElementById("search_word").value;
	var targetpage = document.getElementById("targetpage").value;
	var edit_id = document.getElementById("uid").value;
	
	var sel_value = "";
	
	if(document.getElementById("sel_value") != null ){
		sel_value = document.getElementById("sel_value").value;
	}
	
	
	
	var page = document.getElementById("page").value;
	//if(document.getElementById("sel_value").value != "")
	//{
	//	alert("Please uncheck selected user first");
	//	return false;
	//}

	var http_request = Create_Object();  // The variable that makes Ajax possible!
		http_request.onreadystatechange = function(){
				if(http_request.readyState == 4){
						//alert(http_request.responseText);
						document.getElementById("memberlist1").innerHTML = "";
						document.getElementById("memberlist1").innerHTML = http_request.responseText;
						
				}
		}
		var parameters = "?search_word="+search_word+"&page="+page+"&targetpage="+targetpage+"&uid="+edit_id+"&sel_value="+sel_value;
		//alert(parameters);
		http_request.open("POST",HTTP_URL+"admin/memberlist_message.php" + parameters, true);
		http_request.send(null);
}


function fcn_search_message()
{
	
	var search_word = document.getElementById("search_word").value;
	var targetpage = document.getElementById("targetpage").value;
	

	var page = document.getElementById("page").value;
	if(document.getElementById("sel_value").value != "")
	{
		alert("Please uncheck selected user first");
		return false;
	}

	var http_request = Create_Object();  // The variable that makes Ajax possible!
		http_request.onreadystatechange = function(){
				if(http_request.readyState == 4){
						//alert(http_request.responseText);
						document.getElementById("memberlist1").innerHTML = "";
						document.getElementById("memberlist1").innerHTML = http_request.responseText;
						
				}
		}
		var parameters = "?search_word="+search_word+"&page="+page+"&targetpage="+targetpage;
		//alert(HTTP_URL+"admin/memberlist_message.php" + parameters);
		http_request.open("POST",HTTP_URL+"admin/memberlist_message.php" + parameters, true);
		http_request.send(null);
}
function fcn_pagination_msg(parms)
{
	var targetpage = document.getElementById("targetpage").value;
	var sel_value = document.getElementById("sel_value").value;
	
	var http_request = Create_Object();  // The variable that makes Ajax possible!
		http_request.onreadystatechange = function(){
				if(http_request.readyState == 4){
						//alert(http_request.responseText);
						document.getElementById("memberlist1").innerHTML = "";
						document.getElementById("memberlist1").innerHTML = http_request.responseText;
						
				}
		}
		var parameters = "?"+parms+"&targetpage="+targetpage+"&sel_value="+sel_value;
		http_request.open("POST",HTTP_URL+"admin/memberlist_message.php" + parameters, true);
		http_request.send(null);
}
//-------------------------------------------------


function fcn_transfer()
{
	
	var search_word = document.getElementById("search_word").value;
	var targetpage = document.getElementById("targetpage").value;
	
	var page = document.getElementById("page").value;
	if(document.getElementById("sel_value").value != "")
	{
		alert("Please uncheck selected user first");
		return false;
	}

	var http_request = Create_Object();  // The variable that makes Ajax possible!
		http_request.onreadystatechange = function(){
				if(http_request.readyState == 4){
						//alert(http_request.responseText);
						document.getElementById("memberlist1").innerHTML = "";
						document.getElementById("memberlist1").innerHTML = http_request.responseText;
						
				}
		}
		var parameters = "?search_word="+search_word+"&page="+page+"&targetpage="+targetpage;
		http_request.open("POST",HTTP_URL+"admin/memberlist_function.php" + parameters, true);
		http_request.send(null);
}
function fcn_search2(str1)
{
	var search_word2 = document.getElementById("search_word2").value;
	var targetpage = document.getElementById("targetpage").value;
	var page2 = document.getElementById("page2").value;
	if(document.getElementById("sel_value2").value != "")
	{
		alert("Please uncheck selected user first");
		return false;
	}

	var http_request = Create_Object();  // The variable that makes Ajax possible!
		http_request.onreadystatechange = function(){
				if(http_request.readyState == 4){
						//alert(http_request.responseText);
						document.getElementById("memberlist2").innerHTML = "";
						document.getElementById("memberlist2").innerHTML = http_request.responseText;
						document.getElementById("str1").value = str1;
						
				}
		}
		var parameters = "?search_word2="+search_word2+"&page2="+page2+"&targetpage="+targetpage+"&str1="+str1;
		http_request.open("POST",HTTP_URL+"admin/memberlist2.php" + parameters, true);
		http_request.send(null);
}
function fcn_pagination2(parms)
{
	var targetpage = document.getElementById("targetpage").value;
	var http_request = Create_Object();  // The variable that makes Ajax possible!
		http_request.onreadystatechange = function(){
				if(http_request.readyState == 4){
						//alert(http_request.responseText);
						document.getElementById("memberlist2").innerHTML = "";
						document.getElementById("memberlist2").innerHTML = http_request.responseText;
						
				}
		}
		var parameters = "?"+parms+"&targetpage="+targetpage;
		http_request.open("POST",HTTP_URL+"admin/memberlist2.php" + parameters, true);
		http_request.send(null);
}

function fcn_pagination(parms)
{
	var targetpage = document.getElementById("targetpage").value;
	var http_request = Create_Object();  // The variable that makes Ajax possible!
		http_request.onreadystatechange = function(){
				if(http_request.readyState == 4){
						//alert(http_request.responseText);
						document.getElementById("memberlist1").innerHTML = "";
						document.getElementById("memberlist1").innerHTML = http_request.responseText;
						
				}
		}
		var parameters = "?"+parms+"&targetpage="+targetpage;
		http_request.open("POST",HTTP_URL+"admin/memberlist_function.php" + parameters, true);
		http_request.send(null);
}


	function fcn_rep_user_sel(obj,chk)
	{
		if(obj.checked == true)
		{
			if(document.getElementById("tot_users"))
			{
				var tot_users = parseInt(document.getElementById("tot_users").value);

				for(i=0;i<tot_users;i++)
				{
					if(document.getElementById("rep_user["+i+"]").value == obj.value)
					{
						document.getElementById("sel_value").value = obj.value;
						continue;
					}
					else
					{
						document.getElementById("rep_user["+i+"]").disabled = true;
					}
				}
			}
			document.getElementById("paginationid").style.display = "none";
		}
		else if(chk != "")
		{
			if(document.getElementById("tot_users"))
			{
				var tot_users = parseInt(document.getElementById("tot_users").value);

				for(i=0;i<tot_users;i++)
				{
					if(document.getElementById("rep_user["+i+"]").value == obj.value)
					{
						obj.checked = true;
						document.getElementById("sel_value").value = obj.value;
						continue;
					}
					else
					{
						document.getElementById("rep_user["+i+"]").disabled = true;
					}
				}
			}
			document.getElementById("paginationid").style.display = "none";
		}
		else
		{
			if(document.getElementById("tot_users"))
			{
				var tot_users = document.getElementById("tot_users").value;
				for(i=0;i<tot_users;i++)
				{
					if(document.getElementById("rep_user["+i+"]").value == obj.value)
					{
						document.getElementById("sel_value").value = "";
						continue;
					}
					else
					{
						document.getElementById("rep_user["+i+"]").disabled = false;
					}
				}
			}
			document.getElementById("paginationid").style.display= "block";
		}
	}
	function fcn_rep_user_sel_transfer(obj,chk)
	{
		if(obj.checked == true)
		{
			if(document.getElementById("tot_users"))
			{
				var tot_users = parseInt(document.getElementById("tot_users").value);

				for(i=0;i<tot_users;i++)
				{
					if(document.getElementById("rep_user["+i+"]").value == obj.value)
					{
						document.getElementById("txtuid").value = obj.value;
						continue;
					}
					else
					{
						document.getElementById("rep_user["+i+"]").disabled = true;
					}
				}
			}
			document.getElementById("paginationid").style.display = "none";
		}
		else if(chk != "")
		{
			if(document.getElementById("tot_users"))
			{
				var tot_users = parseInt(document.getElementById("tot_users").value);

				for(i=0;i<tot_users;i++)
				{
					if(document.getElementById("rep_user["+i+"]").value == obj.value)
					{
						obj.checked = true;
						document.getElementById("txtuid").value = obj.value;
						continue;
					}
					else
					{
						document.getElementById("rep_user["+i+"]").disabled = true;
					}
				}
			}
			document.getElementById("paginationid").style.display = "none";
		}
		else
		{
			if(document.getElementById("tot_users"))
			{
				var tot_users = document.getElementById("tot_users").value;
				for(i=0;i<tot_users;i++)
				{
					if(document.getElementById("rep_user["+i+"]").value == obj.value)
					{
						document.getElementById("txtuid").value = "";
						continue;
					}
					else
					{
						document.getElementById("rep_user["+i+"]").disabled = false;
					}
				}
			}
			document.getElementById("paginationid").style.display= "block";
		}
	}
	function fcn_rep_user_sel2(obj,chk)
	{
		if(obj.checked == true)
		{
			if(document.getElementById("tot_users2"))
			{
				var tot_users = document.getElementById("tot_users2").value;
				for(i=0;i<tot_users;i++)
				{
					if(document.getElementById("rep_with["+i+"]").value == obj.value)
					{
						document.getElementById("sel_value2").value = obj.value;
						continue;
					}
					else
					{
						document.getElementById("rep_with["+i+"]").disabled = true;
					}
				}
			}
			document.getElementById("paginationid2").style.display = "none";
		}
		else if(chk != "")
		{
			if(document.getElementById("tot_users"))
			{
				var tot_users = parseInt(document.getElementById("tot_users2").value);
				
				for(i=0;i<tot_users;i++)
				{
					if(document.getElementById("rep_with["+i+"]").value == obj.value)
					{
						obj.checked = true;
						document.getElementById("sel_value2").value = obj.value;
						continue;
					}
					else
					{
						document.getElementById("rep_with["+i+"]").disabled = true;
					}
				}
			}
			document.getElementById("paginationid2").style.display = "none";
		}
		else
		{
			if(document.getElementById("tot_users2"))
			{
				var tot_users = document.getElementById("tot_users2").value;
				for(i=0;i<tot_users;i++)
				{
					if(document.getElementById("rep_with["+i+"]").value == obj.value)
					{
						document.getElementById("sel_value2").value = "";
						continue;
					}
					else
					{
						document.getElementById("rep_with["+i+"]").disabled = false;
					}
				}
			}
			document.getElementById("paginationid2").style.display= "block";
		}
	}
	
