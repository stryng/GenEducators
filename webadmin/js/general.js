/*function custuom_paging(vfilename){
	b=document.getElementById('n').value;
	//a="index.php?file="+vfilename+"&n="+b;
	a="index.php?file="+vfilename+"&n="+b;
	//alert(a);
	document.location.href=a;
}*/
function custuom_paging(vfilename,par){
	b=document.getElementById('n').value;
	a="index.php?file="+vfilename+"&n="+b+par;
	document.location.href=a;
}
function custuom_pagingtracking(vfilename,val){
	b=document.getElementById('n').value;
	//a="index.php?file="+vfilename+"&n="+b;
	a="index.php?file="+vfilename+"&n="+b+val;
	//alert(a);
	document.location.href=a;
}
function custuom_paging_merchant(vfilename,mrchnt){
	
	b=document.getElementById('n').value;
	a=vfilename+"&n="+b;
	document.location.href=a;
}

function setchecked(elemName,status){

	elem = document.getElementsByName(elemName);
	
	$(document).ready(function() {
		
		for(i=0;i<elem.length;i++){
			
			//alert($("label[for='chk"+i+"']").addClass);
			//elem[i].checked=status;
			if(status == 1){
				//alert(elem[i].checked);
				elem[i].checked=status;
				//$("label[for='chk"+i+"']").addClass('checked');
				//elem[i].childNode.className = 'ui-checkbox ui-checkbox-state-checked ui-checkbox-checked';
			}else{
				//alert(elem[i].checked);	
				elem[i].checked=status;
				//$("label[for='chk"+i+"']").removeClass('checked');
				//elem[i].childNode.className = '';	
			}
		}
	});	
}

function setaction(elename, actionval, actionmsg, formname) {
	vchkcnt=0;
	elem = document.getElementsByName(elename);
	for(i=0;i<elem.length;i++)
	{
		if(elem[i].checked)
		{	vchkcnt++;	}
	}
	if(vchkcnt==0) 
	{
		//selecet_record();
		alert('Please select record')
	} 
	else 
	{
		//Operation(actionmsg,actionval,formname);
		
		var r=confirm(actionmsg);
		if (r==true)
		  {
		    
			document.getElementById('action').value=actionval;
		 	document.getElementById(formname).submit();
		  }
		 else
		  {
		  }
	}
}

function deleteSingle(elename, actionval, actionmsg, formname,selectedVal) {
	vchkcnt=0;
	
	elem = document.getElementsByName(elename);
	for(i=0;i<elem.length;i++)
	{
		if(elem[i].checked)
		{	
			elem[i].checked = false;
		}
	}
	elem[selectedVal].checked = true;
	var r=confirm(actionmsg);
	if (r==true)
	 {
		document.getElementById('action').value=actionval;
		document.getElementById(formname).submit();
	 }
	 else
	  {
	  }
	/*if(vchkcnt==0) 
	{
		//selecet_record();
		alert('Please select record')
	} 
	else 
	{
		//Operation(actionmsg,actionval,formname);
		
		
	}*/
}




function funcancel(filename) {
	ans=confirm('Are you sure, you want to cancel?');
	if(ans) {
		document.location.href="index.php?file="+filename;
	} 
}

function adminbackurl(filename) {
	//ans=confirm('Are you sure, you want to cancel?');
	document.location.href="index.php?file="+filename;
	
}
function adminfuncancel(filename) {
	ans=confirm('Are you sure, you want to cancel?');
	if(ans) {
		document.location.href="index.php?file="+filename;
	} 
}
function merchantfuncancel(filename) {
	ans=confirm('Are you sure, you want to cancel?');
	if(ans) {
		document.location.href=filename;
	} 
}
function adminfuncancelnew(filename) {
	ans=confirm('Are you sure, you want to cancel?');
	if(ans) {
		document.location.href=filename;
	} 
}
function funcancel_front(filename) {
	ans=confirm('Are you sure, you want to cancel?');
	if(ans) {
		document.location.href=filename;
	} 
}

function LTrim(strText)
{
	while (strText.substring(0,1) == ' ')
			strText = strText.substring(1, strText.length);
	return strText;
} 

function RTrim(strText)
{
	while (strText.substring(strText.length-1,strText.length) == ' ')
			strText = strText.substring(0, strText.length-1);
	return strText;
}

function Trim(strText)
{
	return RTrim(LTrim(strText));
}

function validateBlank(formName,fieldName,msg){
	var	doc = "document."
	var input = eval("document."+formName+"."+fieldName+".value");
	var lenth = input.length ;
	var ctr=0 ;
	if(input==""){		
		alert(msg);
		eval(doc+formName+"."+fieldName+".focus()")
		return false;		
	}
	return true
}

function chkForm(frm) 
{

	for (var i=1; i<chkForm.arguments.length; i++)
	{
		fld=chkForm.arguments[i];
		i++;
		type=chkForm.arguments[i];
		i++;
 		txt=chkForm.arguments[i];
		switch (type) 
		{
			case 'validateblank' : 
			{	    
				if(Trim(document.forms[frm].elements[fld].value) == "")
				{ 
					alert(txt);
					document.forms[frm].elements[fld].focus();
					return false;
				}
			 }
		     break;
			 case 'validatecheckbox' : 
			{	    
				if(document.forms[frm].elements[fld].checked != true)
				{ 
					alert(txt);
					document.forms[frm].elements[fld].focus();
					return false;
				}
			 }
		     break;
			 case 'validateSelectmblank' :
			 {
				imselflg=false;
			 	for(imsel=0;imsel<document.forms[frm].elements[fld].length;imsel++)
				{
					if(document.forms[frm].elements[fld].options[imsel].selected && document.forms[frm].elements[fld].options[imsel].value!="")
					{
						imselflg=true;
						break; 
					}
				}
				if(imselflg==false)
				{
					alert(txt);
					return false;
				}
			 }
			 break;
			 case 'validateCheckboxblank' :
			 {
			 	imselflg=false;
				elem = document.getElementsByName(fld);
				for(imsel=0;imsel<elem.length;imsel++)
				{
					if(elem[imsel].checked)
					{
						imselflg=true;
						break;
					}
				}
				if(!imselflg)
				{
					alert(txt);
					return false;
				}
			 }
			 break;
			 case 'validateRadioblank' : 
			 {
				var a=1;
				for (j=0; j<document.forms[frm].elements[fld].length; j++) 
				{
						
					if (document.forms[frm].elements[fld][j].checked) 
						a=0;
				}
				if(a==1)
				{
					alert(txt);
					return false;
				}	  
			}
			break;
			case 'validateemail' : 
	 		{
				var emailstring = document.forms[frm].elements[fld].value;
				var ampIndex = emailstring.indexOf("@");
				var afterAmp = emailstring.substring((ampIndex + 1), emailstring.length);
				var dotIndex = afterAmp.indexOf(".");
				dotIndex = dotIndex + ampIndex + 1;
				afterAmp = emailstring.substring((ampIndex + 1), dotIndex);
				var afterDot = emailstring.substring((dotIndex + 1), emailstring.length);
				var beforeAmp = emailstring.substring(0,(ampIndex));
				var email_regex = /^\w(?:\w|-|\.(?!\.|@))*@\w(?:\w|-|\.(?!\.))*\.\w{2,3}/ 
				if ((emailstring.indexOf("@") != "-1") && (emailstring.length > 5) && (afterAmp.length > 0) && (beforeAmp.length > 1) && (afterDot.length > 1) && (email_regex.test(emailstring)) ) {				  
				} else {
					if (txt != '')
					{
						alert(txt);
					}
					else
					{
						alert("Please check your email address!");
					}
					document.forms[frm].elements[fld].focus();
					return false;
			  }
		 }
		 break;
     	 case 'validateinteger' :
		 {
			if(!validateNumber(document.forms[frm].elements[fld].value))
			{
				alert(txt);
				document.forms[frm].elements[fld].focus();
				return false;
			}
			if(parseInt(document.forms[frm].elements[fld].value)<=0)
			{
				alert(txt);
				document.forms[frm].elements[fld].focus();
				return false;
			}
	 	}
	 	break;
     	case 'validatenumber':
	 	{
			if(document.forms[frm].elements[fld].disabled)
				continue;
			chk1="!@#$%^*()-+=|\~`{}[]: <>?/,abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
			chk3="0123456789";
			for(k=0;k!=document.forms[frm].elements[fld].value.length;k++)
			{
				ch1= document.forms[frm].elements[fld].value.charAt(k);
				ch2= document.forms[frm].elements[fld].value.charAt(0);
				rtn1=chk1.indexOf(ch1);
				rtn3=chk3.indexOf(ch2);
				if(rtn3 < 0)
				{
					alert(txt);
					document.forms[frm].elements[fld].focus();
					return false;
					break;
			 	}
				else if(rtn1!=-1)
				{
					alert(txt); 
					document.forms[frm].elements[fld].focus();
					return false;
					break;	
				}
			}
 	  	}
	 	break;
	 	case 'validateFloatNumber' :
	 	{
			if (document.forms[frm].elements[fld].value.length<1)
			{
				return true;
			}
			chk1="1234567890.";
			for(j=0;j!=document.forms[frm].elements[fld].value.length;j++)
			{
				ch1=document.forms[frm].elements[fld].value.charAt(j);
				rtn1=chk1.indexOf(ch1);
				if(rtn1==-1)
				{
					alert(txt);
					document.forms[frm].elements[fld].focus();
					return false;
					break;
				}
			}
	 	}
	 	break;
	 	case 'validatealpha' :
	 	{
			chk1 = "#$%^*-+=|\~`{};<>?\'\"\\ABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890:,./()[]@_";
	 		chk3="abcdefghijklmnopqrstuvwxyz";
			for(j=0;j!=document.forms[frm].elements[fld].value.length;j++)
			{
				ch1= document.forms[frm].elements[fld].value.charAt(j);
				ch2= document.forms[frm].elements[fld].value.charAt(0);
				rtn1=chk1.indexOf(ch1);
				rtn3=chk3.indexOf(ch2);
				if(rtn3 < 0)
				{
					alert(txt);
					document.forms[frm].elements[fld].focus();
					return false;
					break;
				}
				else if(rtn1!=-1)
				{
					alert(txt);
					document.forms[frm].elements[fld].focus();
					return false;
					break;	
				}			
			}
 		} 
		break;
		case 'validatealphanumeric' :
		{
			chk1 = "#$%^*-+=|\~`{};<>?\'\"\\ABCDEFGHIJKLMNOPQRSTUVWXYZ0:,./()[]@_";
			chk3="abcdefghijklmnopqrstuvwxyz123456789";
			for(j=0;j!=document.forms[frm].elements[fld].value.length;j++)
			{
				ch1= document.forms[frm].elements[fld].value.charAt(j);
				ch2= document.forms[frm].elements[fld].value.charAt(0);
				rtn1=chk1.indexOf(ch1);
				rtn3=chk3.indexOf(ch2);
				if(rtn3 < 0)
				{
					alert(txt);
					document.forms[frm].elements[fld].focus();
					return false;
					break;
				}
				else if(rtn1!=-1)
				{
					alert(txt);
					document.forms[frm].elements[fld].focus();
					return false;
					break;	
				}			
			}
 		} 
		break;
		case 'validatepassword' :
		{ 
			if(document.forms[frm].elements[fld].value.length>0)
			{
				chk1 = " -+=|~{};<>?:,./()[]^\`\'\"\\";
				chk3="abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890#$%*@";

				for(j=0;j!=document.forms[frm].elements[fld].value.length;j++)
				{
					ch1= document.forms[frm].elements[fld].value.charAt(j);
					ch2= document.forms[frm].elements[fld].value.charAt(0);
					rtn1=chk1.indexOf(ch1);
					rtn3=chk3.indexOf(ch2);
					if(rtn3 < 0)
					{
						alert(txt);
						document.forms[frm].elements[fld].focus();			
						return false;
						break;
					}
					else if(rtn1!=-1)
					{			
						alert(txt);
						document.forms[frm].elements[fld].focus();
						return false;
						break;	
					}
			  	}
		 	}
		 	else
		 	{
				alert(txt);
				document.forms[frm].elements[fld].focus();
				return false;
				break;
			}
		}
		break;
	}
}
return true;
}

function formSubmit(frm)
{
	document.getElementById(frm).submit();
	//alert(frm);
}



function authenticate(AjaxPage,LoadImageId,FrmElementList,SrcHtmlElement) {
		//alert("AjaxPage: "+AjaxPage+" LoadImageId : "+LoadImageId+" FrmElementList:  "+FrmElementList+" SrcHtmlElement: "+SrcHtmlElement)
		/*$("#"+loadImageId).show();
		var el = "username|password";
		var arr = el.split("|");
		
		"username" : $("#"+username).vla() , ;
		
		$.ajax
		({
			type: "POST",
			url: AjaxPage,
			dataType: 'json',
			async: false,
			data: {'json':'{"userName": "' + userName + '", "password" : "' + password + '"}'},
			success: function (data)
			{
			$("#"+loadImageId).hide();
			}
		});*/
		
		//alert(AjaxPage);
		// show loading image 
		$("#"+LoadImageId).show();
		
		if(FrmElementList.indexOf('|') != -1)
		{
			var FrmElementList = FrmElementList.split("|");
			var temp = "";
			for( i=0 ;i < FrmElementList.length; i++ )
			{
				var value = $("#"+FrmElementList[i]).val();	
				temp = temp + ',"' +  FrmElementList[i] + '": "' + value +'"' ; 
			}
			
			var post_data ={'json':'{' + temp.substring(1) + '}'};
			
		}
		else
		{
			var value = $("#"+FrmElementList).val();
			var post_data ={'json':'{"' + FrmElementList + '": "' + value + '"}'};
		}
		//alert(value);
		// call tha ajax page
		$.ajax
		({
		  
			type: "POST",
			url: AjaxPage,
			dataType: 'json',
			async: false,
			//data: {'json':'{"email": "' + value + '"}'},
			data:  post_data ,
			success: function(data){  
				  //alert(LoadImageId+"==="+data);
				  //$("#"+LoadImageId).hide();
				  $("#"+LoadImageId).html(data);
			}
		}); 

	
}
/*============================== delete message ===========================*/

function deleteaction(elename, actionval, actionmsg, formname)
{
	//alert("===="+elename+"======"+actionval+"===="+actionmsg+"====="+formname);
	vchkcnt=0;
	elem = document.getElementsByName(elename);
	for(i=0;i<elem.length;i++)
	{
		if(elem[i].checked)
		{	vchkcnt++;	}
	}
	if(vchkcnt==0) 
	{
		//selecet_record();
		alert('Please select record')
	} 
	else 
	{
		//Operation(actionmsg,actionval,formname);
		
		var r=confirm(actionmsg);
		if (r==true)
		  {
			if(formname == 'frm_inbox')
			{
				document.getElementById('action').value=actionval;
			}else if(formname == 'frm_sentbox')
			{
				document.getElementById('actionsent').value=actionval;
			}
			else
			{
					document.getElementById('actionreply').value=actionval;
			}
			document.getElementById(formname).submit();
		  }
		 else
		  {
		  }
	}
}
function getStateList(CountryID,selected)
{
	//alert(CountryID);
	if(selected=="")
	{
		var link1="../ajax/country_state_city.php?callfor=state&country="+CountryID;
	}else{
		var link1="../ajax/country_state_city.php?callfor=state&country="+CountryID+"&selected="+selected;
	}
	//alert(link1);
	$.ajax(
	{
		type: "POST",
		url:link1,
		success: function (data)
		{
			$("#StateDiv").html("");	
			$("#StateDiv").html(data);
			$("#State").chosen();
		}
	});
}
function getCityList(StateID,selected)
{
	if(!selected)
	{
		var link1="../ajax/country_state_city.php?callfor=city&state="+StateID;
	}else{
		var link1="../ajax/country_state_city.php?callfor=city&state="+StateID+"&selected="+selected;
	}
	$.ajax(
	{
		type: "POST",
		url:link1,
		success: function (data)
		{
			$("#CityDiv").html("");	
			$("#CityDiv").html(data);
			$("#City").chosen();
		}
	});
}