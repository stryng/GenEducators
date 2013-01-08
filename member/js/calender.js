//===== Calendar =====//
	
	 post_data = [];
	if(date_close_start_Array.length >0)
	{
		for(i=0;i<date_close_start_Array.length;i++)
		{
			if(date_close_start_Array[i])
			{
				var temp_arr = date_close_start_Array[i].split("-");
				//alert(temp_arr[0]+" == "+temp_arr[1]+" == "+temp_arr[2]);
				post_data.push({
							id: 'close_'+i,
							title: 'Closed',
							start: new Date(temp_arr[0],temp_arr[1], temp_arr[2]),
							end: new Date(temp_arr[0],temp_arr[1], temp_arr[2], 24),
							allDay: false,
							className:"testclass",
							editable: false,
							 resourceId: 'resource1',
							eventDay: temp_arr[3],
				});
			}
		}
	}
	if(event_date_Array.length >0)
	{
		for(i=0;i<=event_date_Array.length;i++)
		{
			if(event_date_Array[i])
			{
				//alert(event_date_Array[i]+"===="+i+"===="+event_date_end_Array[i]);
				var temp_arr = event_date_Array[i].split("-");
				var temp_end_arr = event_date_end_Array[i].split("-");
				//alert("===start==="+temp_arr[0]+" == "+temp_arr[1]+" == "+temp_arr[2]+" == "+temp_arr[3]+" == "+temp_arr[4]);
				//alert("===end==="+temp_end_arr[0]+" == "+temp_end_arr[1]+" == "+temp_end_arr[2]+" == "+temp_end_arr[3]+" == "+temp_end_arr[4]);
				post_data.push({
							title: 'Events',
							id: 'event_'+event_ID_Array[i],
							start: new Date(temp_arr[0], temp_arr[1], temp_arr[2], temp_arr[3], temp_arr[4]),
							end: new Date(temp_end_arr[0], temp_end_arr[1], temp_end_arr[2], temp_end_arr[3], temp_end_arr[4]),
							className:"fc-today",
							resourceId: 'resource1',
							allDay: false
				});
			}
		}
	}
	
	$(document).ready(function() {
		
		
							   
	   	 function unavailable(date) {
		 	 var sunday = 0, monday = 1, tuesday = 2, wednesday = 3, thursday = 4, friday = 5, saturday = 6;

			if (date.getDay() == sunday) {
				return [false, '']; // Closed day of week
			}
			if (date.getDay() == saturday) {
				return [false, '']; // Closed day of week
			}
			
			
			var closedDates = unavailableDates;
			
			for (var i = 0; i < closedDates.length; i++) {
				if (date.getDate() == closedDates[i][0] && date.getMonth() + 1 == closedDates[i][1] && date.getFullYear() == closedDates[i][2]) 
				{
					return [false, '']; // Closed date
				}
			}
			return [true, '']; // Open
		}
					   
		/*$( "#txtstart_date" ).datepicker({ 
			defaultDate: +7,
			showOtherMonths:true,
			autoSize: true,
			appendText: '(dd-mm-yyyy)',
			dateFormat: 'dd-mm-yy'
		});	*/
	   	/*	
		var dates = $( "#fromDate, #toDate" ).datepicker({
				dateFormat: 'yy-mm-dd',
				minDate : 0,
				onSelect: function( selectedDate ) {
					var option = this.id == "fromDate" ? "minDate" : "maxDate",
						instance = $( this ).data( "datepicker" ),
						date = $.datepicker.parseDate(
							instance.settings.dateFormat ||
							$.datepicker._defaults.dateFormat,
							selectedDate, instance.settings );
					dates.not( this ).datepicker( "option", option, date );
				}
			});*/
			
		
	
                var date = new Date();
                var d = date.getDate();
                var m = date.getMonth();
                var y = date.getFullYear();
		
                var calendar = $('#calendar').fullCalendar({
                    header: {
                        left: 'prev,next',
                        center: 'title',
                        right: 'month,agendaWeek,agendaDay,resourceDay'
						
                    },
					minTime:'7:00am',
   					maxTime:'9:00pm',
					allDaySlot:false,
					firstDay: 1,
                    /*titleFormat: 'ddd, MMM dd, yyyy',*/
                    defaultView: 'resourceDay',
                    selectable: true,
                   /*  selectHelper: true,*/
                   /* select: function(start, end, allDay, event, resourceId) {
                        var title = prompt('Event Title:');
                        if (title) {
                            console.log("@@ adding event " + title + ", start " + start + ", end " + end + ", allDay " + allDay + ", resource " + resourceId);
                            calendar.fullCalendar('renderEvent',
                            {
                                title: title,
                                start: start,
                                end: end,
                                allDay: allDay,
                                resourceId: resourceId
                            },
                            true // make the event "stick"
                        );
                        }
                        calendar.fullCalendar('unselect');
                    },
                    eventResize: function(event, dayDelta, minuteDelta) {
                        console.log("@@ resize event " + event.title + ", start " + event.start + ", end " + event.end + ", resource " + event.resourceId);
                    },
                    eventDrop: function( event, dayDelta, minuteDelta, allDay) {
                        console.log("@@ drag/drop event " + event.title + ", start " + event.start + ", end " + event.end + ", resource " + event.resourceId);
                    },*/
					
					eventRender: function (event, element, view) {
					var temp_arr = (event.id).split("_");
					if(temp_arr[0] == "close")
					{
						if(view.name == "agendaWeek" || view.name == "agendaDay")
						{
							//alert((event.eventDay).toLowerCase());
							var dayClass = ".fc-"+(event.eventDay.toLowerCase());
							$(dayClass).addClass('holiday-color');
							$('.fc-widget-header').removeClass('holiday-color');
						}
						else
						{
							
							//alert($(".fc-mon").prop("class"));
						}
					}
					var dayClass = ".fc-sat";
					$(dayClass).addClass('holiday-color');
					$('.fc-widget-header').removeClass('holiday-color');
					var dayClass = ".fc-sun";
					$(dayClass).addClass('holiday-color');
					$('.fc-widget-header').removeClass('holiday-color');
		},
					eventClick : function(event) {
					var temp_arr = (event.id).split("_");
					if(temp_arr[0] == "close")
					{
						alert("You can not book this day");
					}
					else
					{
						if(document.getElementById("calender_per_id").value == '0')
						{							
							return false;
						}
						else
						{
							$.ajax({
								  type: 'POST',
								  url: SERVER_URL+"ajax/clickForm.php?dateofclick="+event.start+"&appont_id="+event.id,
								  data:"",  
								  dataType: "text",
								  success:function (res) {
										document.getElementById("preview_book_ajax").innerHTML = res;
										//window.location = "https://www.sandbox.paypal.com/webscr?cmd=_express-checkout&token=InsertTokenHere";
										//authenticate('../ajax/gen_fcn_output.php?staff_id='+document.getElementById("for_select_service_edit_time").value,'staff_services','staffname','repl_msg');
										chk_staffaway(document.getElementById("staffname"), 'staff_change');
										if(document.getElementById("fcn_call_specific"))
										{
											specific_day_edit(document.getElementById("fcn_call_specific").value,'specific_days','fromdb');
										}

										$( "#txtstart_date" ).datepicker({ 
											defaultDate: +7,
											showOtherMonths:true,
											autoSize: true,
											dateFormat: 'dd-mm-yy',
											minDate:0,
											beforeShowDay: unavailable
										});	
										$( "#txtend_specific_date" ).datepicker({ 
											defaultDate: +7,
											showOtherMonths:true,
											autoSize: true,
											dateFormat: 'dd-mm-yy',
											minDate:0,
											beforeShowDay: unavailable
										});	
										$( "#txtenddate" ).datepicker({ 
											defaultDate: +7,
											showOtherMonths:true,
											autoSize: true,
											dateFormat: 'dd-mm-yy',
											beforeShowDay: unavailable
										});	
										$( "#txtend_week_date" ).datepicker({ 
											defaultDate: +7,
											showOtherMonths:true,
											autoSize: true,
											minDate:0,
											dateFormat: 'dd-mm-yy',
											beforeShowDay: unavailable
										});	
										$( "#txtend_month_date" ).datepicker({ 
											defaultDate: +7,
											showOtherMonths:true,
											autoSize: true,
											minDate:0,
											dateFormat: 'dd-mm-yy',
											beforeShowDay: unavailable
										});	
										$(function() {
											$( "#draggable" ).draggable();
										});
										$("#mask").show();
										var tops_scroll = jQuery(window).scrollTop();
										$("#draggable").css('margin-top',tops_scroll);
										//$("#draggable").css('margin-left',"40%");
										
											$("#txtfirst_name").autocomplete("../ajax/get_customer_list.php", {
														width: 260,
														matchContains: false,
														//mustMatch: true,
														minChars: 1,
														//multiple: true,
														//highlight: false,
														//multipleSeparator: ",",
														selectFirst: false
												});
											$("#txtfirst_name_1").autocomplete("../ajax/get_customer_list.php", {
														width: 260,
														matchContains: true,
														//mustMatch: true,
														minChars: 1,
														//multiple: true,
														//highlight: false,
														//multipleSeparator: ",",
														selectFirst: false
												});
				
								   },
								  error:function (res) {
								  }	
							});	
						}
					}
		},
					eventDrop: function(event,dayDelta,minuteDelta,allDay,revertFunc) {
			//alert(event.title + " was moved " +dayDelta + " days and " +minuteDelta + " minutes.");
	
			/*if (allDay) {
				alert("Event is now all-day");
			}else{
				alert("Event has a time-of-day");
			}*/
	
			if (confirm("Are you sure about this change?")) {
				$.ajax({
						  type: 'POST',
						  url: SERVER_URL+"ajax/clickForm.php?Save_updates_drop=true&date_update="+dayDelta+"&time_update="+minuteDelta+"&appont_id="+event.id,
						  data:"",  
						  dataType: "text",
						  success:function (res) {
							  	var res_text = res;
								if(res_text.toString() == 'you_can_not_change')
								{
									alert("you can not change");
									revertFunc();
								}
						   },
						  error:function (res) {
						  }	
					});
			}
			else
			{
				revertFunc();
			}
	
		},
		 			eventResize: function(event,dayDelta,minuteDelta,revertFunc) {

			/*alert(
				"The end date of " + event.title+event.id + "has been moved " +
				dayDelta + " days and " +
				minuteDelta + " minutes."
			);*/
	
			if (confirm("Are you sure about this change?")) {
				$.ajax({
						  type: 'POST',
						  url: SERVER_URL+"ajax/clickForm.php?Save_updates_drag=true&date_update="+dayDelta+"&time_update="+minuteDelta+"&appont_id="+event.id,
						  data:"",  
						  dataType: "text",
						  success:function (res) {
							  	var res_text = res;
								if(res_text.toString() == 'you_can_not_change')
								{
									alert("you can not change");
									revertFunc();
								}
						   },
						  error:function (res) {
						  }	
					});
				
			}
			else
			{
				revertFunc();
			}
	
		},
					dayClick: function(date, allDay, jsEvent, view) {
			var cur_date = date.getFullYear()+"-"+date.getMonth()+"-"+date.getDate();
			var flg_date = true;
			if(date_close_start_Array.length >0)
			{
				for(i=0;i<date_close_start_Array.length;i++)
				{
					var temp_arr = date_close_start_Array[i].split("-");
					//alert(cur_date+" == "+date_close_start_Array[i]);
					var temp_var = temp_arr[0]+"-"+temp_arr[1]+"-"+temp_arr[2];
					if(cur_date == temp_var)
					{
						flg_date = false;
					}
				}
			}
			if(flg_date)
			{
					/*if (allDay) {
						alert('Clicked on the entire day: ' + date);
					}else{
						alert('Clicked on the slot: ' + date);
					}*/
				// change the day's background color just for fun
				if(document.getElementById("calender_per_id").value == '0')
				{							
					return false;
				}
				else
				{
					$.ajax({
						  type: 'POST',
						  url: SERVER_URL+"ajax/clickForm.php?dateofclick="+date,
						  data:"",  
						  dataType: "text",
						  success:function (res) {
								document.getElementById("preview_book_ajax").innerHTML = res;
								//chk_staffaway(document.getElementById("staffname"), 'staff_change');
								  $( "#txtstart_date" ).datepicker({ 
									defaultDate: +7,
									showOtherMonths:true,
									autoSize: true,
									minDate:0,
									dateFormat: 'dd-mm-yy',
									beforeShowDay: unavailable
								});		
								  $( "#txtend_specific_date" ).datepicker({ 
									defaultDate: +7,
									showOtherMonths:true,
									autoSize: true,
									dateFormat: 'dd-mm-yy',
									minDate:0,
									beforeShowDay: unavailable
								});	
								  $( "#txtenddate" ).datepicker({ 
									defaultDate: +7,
									showOtherMonths:true,
									autoSize: true,
									minDate:0,
									dateFormat: 'dd-mm-yy',
									beforeShowDay: unavailable
								});	
								  $( "#txtend_week_date" ).datepicker({ 
									defaultDate: +7,
									showOtherMonths:true,
									autoSize: true,
									minDate:0,
									dateFormat: 'dd-mm-yy',
									beforeShowDay: unavailable
								});	
								  $( "#txtend_month_date" ).datepicker({ 
									defaultDate: +7,
									showOtherMonths:true,
									autoSize: true,
									minDate:0,
									dateFormat: 'dd-mm-yy',
									beforeShowDay: unavailable
								});	
								$(function() {
									$( "#draggable" ).draggable();
								});
								$("#mask").show();
								var tops_scroll = jQuery(window).scrollTop();
								$("#draggable").css('margin-top',tops_scroll);
								$("#draggable").css('margin-left',"40%");
								
									$("#txtfirst_name").autocomplete("../ajax/get_customer_list.php", {
												width: 260,
												matchContains: true,
												//mustMatch: true,
												minChars: 1,
												//multiple: true,
												//highlight: false,
												//multipleSeparator: ",",
												selectFirst: false
										});
									$("#txtfirst_name_1").autocomplete("../ajax/get_customer_list.php", {
												width: 260,
												matchContains: true,
												//mustMatch: true,
												minChars: 1,
												//multiple: true,
												//highlight: false,
												//multipleSeparator: ",",
												selectFirst: false
										});
		
						   },
						  error:function (res) {
						  }	
					});
					}
					$(this).css('background-color', '#8BB8E0');
				}
				else
				{
					alert("You can not book on this day");
				}
		},
                    editable: true,
                    resources: [
                        {
                            name: 'Resource 1',
                            id:	'resource1'
                        },
                        {
                            name: 'Resource 2',
                            id:	'resource2'
                        },
                        {
                            name: 'Resource 3',
                            id:	'resource3'
                        }
                    ],
                    events: post_data
					
                });
				
				
				
				
				$('a.tracking').mouseenter(function () {
		$('.sub_tracking').show(200);
		$('.sub_business_setting').hide(200);
		$('.submessageclass').hide(200);
		$('.sub_customer').hide(200);
	});
	
	$('.sub_tracking').mouseleave(function () {
		$('.sub_tracking').hide(200);
	});
	
	$('a.business_setting').mouseenter(function () {
		$('.sub_business_setting').show(200);
		$('.sub_tracking').hide(200);
		$('.submessageclass').hide(200);
		$('.sub_customer').hide(200);
	});
	
	$('.sub_business_setting').mouseleave(function () {
		$('.sub_business_setting').hide(200);
	});
	
	
	$('a.customer').mouseenter(function () {
		$('.sub_customer').show(200);
		$('.sub_business_setting').hide(200);
		$('.sub_tracking').hide(200);
		$('.submessageclass').hide(200);
		
	});
	
	$('.sub_customer').mouseleave(function () {
		$('.sub_customer').hide(200);
	});
	
	$('#msg').mouseleave(function () {										   
		$('.submessageclass').show(200);
		$('.sub_tracking').hide(200);
		$('.sub_location').hide(200);
		$('.sub_business_setting').hide(200);
		$('.sub_customer').hide(200);
	});
	
	$('a.messageclass').mouseenter(function () {
		$('.submessageclass').show(200);
		$('.subproduct').hide(200);
		$('.sub_location').hide(200);
		$('.sub_business_setting').hide(200);
		$('.sub_customer').hide(200);
	});
	
	
	
	$('a.dash').mouseenter(function () {
		$('.sub_tracking').hide(200);
		$('.sub_business_setting').hide(200);
		$('.submessageclass').hide(200);
		$('.sub_customer').hide(200);
	});
	
	$('a.site').mouseenter(function () {
		$('.sub_tracking').hide(200);
		$('.sub_business_setting').hide(200);
		$('.submessageclass').hide(200);
		$('.sub_customer').hide(200);
		
	});
	$('.mainNav').mouseleave(function () {
		$('.sub_tracking').hide(200);
		$('.sub_business_setting').hide(200);
		$('.submessageclass').hide(200);
		$('.sub_customer').hide(200);
	});
	
	/* Business Setting Menu Start  */
	
	/* $('a.business_setting').mouseenter(function () {
		$('.sub_location').show(200);
		$('.sub_business_setting').hide(200);
	});
	
	$('ul.sub_business_setting').mouseleave(function () {
		$('.sub_business_setting').hide(200);
	});
	
	
	$('a.business_setting').mouseenter(function () {
		$('.sub_business_setting').show(200);
		$('.sub_location').hide(200);
	});
	
	$('.sub_business_setting').mouseleave(function () {
		$('.sub_business_setting').hide(200);
	});
	
	
	$('a.dash').mouseenter(function () {
		$('.sub_tracking').hide(200);
		$('.sub_location').hide(200);
	});
	
	$('a.site').mouseenter(function () {
		$('.sub_tracking').hide(200);
		$('.sub_location').hide(200);
	});
	$('.mainNav').mouseleave(function () {
		$('.sub_tracking').hide(200);
		$('.sub_location').hide(200);
	});
	*/
	
	/* Business Setting Menu End  */
	
	
	
	
	/// Menu Link end 
	
	
	$(document).bind('click', function(e) {
		var $clicked = $(e.target);
		if (! $clicked.parents().hasClass("leftUserDrop"))
		$(".leftUser").slideUp(200);
	});
	
	$('a.lefttrackingDrop').click(function () {
		$('.lefttracking').slideToggle(200);
	});
	$(document).bind('click', function(e) {
		var $clicked = $(e.target);
		if (! $clicked.parents().hasClass("lefttrackingDrop"))
		$(".lefttracking").slideUp(200);
	});
	
		
            
			
	});
	
	
function do_submit(form){
		//alert(form);
		document.getElementById(form).submit();
}

function hideShowTime(elemnt,startTimeID,endTimeID) 
{
	if($('#'+elemnt).is(':checked'))
	{
		$('#'+startTimeID).timeEntry('enable'); 
		$('#'+endTimeID).timeEntry('enable')
	}else{
		
		$('#'+startTimeID).timeEntry('disable'); 
		$('#'+endTimeID).timeEntry('disable')
	}

}
function popup_hide()
{
	$("#mask").hide();
	$(".fc-widget-content").css('background-color', '');
	document.getElementById('preview_book_ajax').innerHTML='';
}
function chk_staffaway(obj, call_from)
{
	sel_staff_id = "";
	if(obj)
		sel_staff_id = obj.value;
	var flg_staff_date = true;
	var flg_date = true;
	var flg_flg = true;
	var temparr = (document.getElementById("txtstart_date").value).split("-");
	var sel_date = temparr[2]+"-"+temparr[1]+"-"+temparr[0];
	if(staff_date_close_start_Array.length >0)
	{
		for(i=0;i<staff_date_close_start_Array.length;i++)
		{
			var arr_temp = (staff_date_close_start_Array[i]).split("==staffid===");
			//alert(sel_date+" == "+arr_temp[0] +" && "+sel_staff_id +" == "+ arr_temp[1]);
			if(sel_date == arr_temp[0] && sel_staff_id == arr_temp[1])
			{
				flg_staff_date = false;
			}
		}
	}
	if(date_close_start_Array.length >0)
	{
		for(i=0;i<date_close_start_Array.length;i++)
		{
			var arr_temp = (date_close_start_Array[i]).split("-");
			//alert(sel_date+" == "+date_close_start_Array[i]);
			var str_date = arr_temp[0]+"-"+(parseInt(arr_temp[1])+1)+"-"+arr_temp[2];
			if(sel_date == str_date)
			{
				flg_date = false;
			}
		}
	}
	if(flg_staff_date && call_from == "sel_date")
	{
		if(flg_date)
		{
			if(document.getElementById("repl_message") != null)
			{
				document.getElementById("repl_message").innerHTML = "";
				$("#repl_message").hide();
			}
			authenticate('../ajax/echeck_date_availability.php','repl_message','hours|minut|txtstart_date|day_time|staffname|action','repl_msg')
		}
		else
		{
			if(document.getElementById("repl_message") != null)
			{
				$("#repl_message").show();
				document.getElementById("repl_message").innerHTML = "You can not book on this day";
			}
				flg_flg = false;
		}
	}
	else if(flg_staff_date && call_from == "staff_change")
	{
		if(flg_date)
		{
			if(document.getElementById("repl_message") != null)
			{
				document.getElementById("repl_message").innerHTML = "";
				$("#repl_message").hide();
			}
			authenticate('../ajax/gen_fcn_output.php?service_id='+document.getElementById("for_select_service_edit_time").value,'staff_services','staffname','repl_msg');
			//authenticate('../ajax/gen_fcn_output.php','staff_services','staffname','repl_msg');
		}
		else
		{
			if(document.getElementById("repl_message") != null)
			{
				$("#repl_message").show();
				document.getElementById("repl_message").innerHTML = "You can not book on this day";
			}
			flg_flg = false;
			
		}
	}
	else if(!flg_date && flg_flg)
	{
		if(document.getElementById("repl_message") != null)
		{
			$("#repl_message").show();
			document.getElementById("repl_message").innerHTML = "You can not book on this day";
		}
	}
	else
	{
		if(document.getElementById("repl_message") != null)
		{
			$("#repl_message").show();
			document.getElementById("repl_message").innerHTML = "Staff is away on "+document.getElementById("txtstart_date").value;
		}
	}
}
function hideshow_repeat_details(obj)
{
	var val = obj.value;
	if(val == "n")
	{
		document.getElementById("repeat_daily").style.display = 'none';
		document.getElementById("repeat_weekly").style.display = 'none';
		document.getElementById("repeat_monthly").style.display = 'none';
		document.getElementById("repeat_specific").style.display = 'none';
	}
	else if(val == "d")
	{
		document.getElementById("repeat_daily").style.display = 'block';
		document.getElementById("repeat_weekly").style.display = 'none';
		document.getElementById("repeat_monthly").style.display = 'none';
		document.getElementById("repeat_specific").style.display = 'none';
	}
	else if(val == "w")
	{
		document.getElementById("repeat_daily").style.display = 'none';
		document.getElementById("repeat_weekly").style.display = 'block';
		document.getElementById("repeat_monthly").style.display = 'none';
		document.getElementById("repeat_specific").style.display = 'none';

	}
	else if(val == "m")
	{
		document.getElementById("repeat_daily").style.display = 'none';
		document.getElementById("repeat_weekly").style.display = 'none';
		document.getElementById("repeat_monthly").style.display = 'block';
		document.getElementById("repeat_specific").style.display = 'none';

	}
	else if(val == "s")
	{
		alert("dsfdsafdsaf");
		document.getElementById("repeat_daily").style.display = 'none';
		document.getElementById("repeat_weekly").style.display = 'none';
		document.getElementById("repeat_monthly").style.display = 'none';
		document.getElementById("repeat_specific").style.display = 'block';
		specific_day(document.getElementById("txtstart_date"),'specific_days')
	}
	else
	{
		document.getElementById("repeat_daily").style.display = 'none';
		document.getElementById("repeat_weekly").style.display = 'none';
		document.getElementById("repeat_monthly").style.display = 'none';
		document.getElementById("repeat_specific").style.display = 'none';
	}
	
}
function autocomplete_fillup_details(val)
{
		$.ajax({
			  type: 'POST',
			  url: SERVER_URL+"ajax/get_customer_list.php",
			  data:{'json':'{"userid": "' + val + '"}'},
			  dataType: "text",
			  success:function (res) {
				  	if(res != "")
					{
						var temp_data = res.split('^^^^^^^^^');
						var title_len = document.getElementById("txttitle").length;
						for(i=0;i<title_len;i++)
						{
							if(document.getElementById("txttitle").options[i].value == temp_data[0])
							{
								document.getElementById("txttitle").options[i].select = true;
							}
							else
							{
								document.getElementById("txttitle").options[i].select = false;
							}
						}
						document.getElementById("sp_customer_id").value = val;
						document.getElementById("txtfirst_name").value = temp_data[1];
						document.getElementById("txtlast_name").value = temp_data[2];
						document.getElementById("txtphone").value = temp_data[3];
						document.getElementById("txtext").value = temp_data[4];
						document.getElementById("txtemail").value = temp_data[5];
					}
			  }
		});
}
function disp_tab_popup(tabname)
{
	if(tabname == 'customer_tab')
	{
		document.getElementById('creditcard_tab').className = '';
		document.getElementById('recurring_tab').className = '';
		document.getElementById('customer').style.display = 'block';
		document.getElementById('creditcard').style.display = 'none';
		document.getElementById('recurring').style.display = 'none';
	}
	else if(tabname == 'creditcard_tab')
	{
		document.getElementById('customer_tab').className = '';
		document.getElementById('recurring_tab').className = '';
		document.getElementById('customer').style.display = 'none';
		document.getElementById('creditcard').style.display = 'block';
		document.getElementById('recurring').style.display = 'none';
	}
	else if(tabname == 'recurring_tab')
	{
		document.getElementById('customer_tab').className = '';
		document.getElementById('creditcard_tab').className = '';
		document.getElementById('customer').style.display = 'none';
		document.getElementById('creditcard').style.display = 'none';
		document.getElementById('recurring').style.display = 'block';
	}
	document.getElementById(tabname).className = 'active_tab';
}
function check_and_submit()
{
	if(document.getElementById("repeat").value == "s")
	{
		var txt_sel_arr = document.getElementById("txt_sel_arr").value;
		document.getElementById("end_date_of_specific_days").value = "";
		document.getElementById("start_date_of_specific_days").value = "";
		document.getElementById("day_time_of_specific_days").value = "";
		var hours = document.getElementById("hours").value;
		var minut = document.getElementById("minut").value;
		for(i=0;i<txt_sel_arr;i++)

		{
			if(document.getElementById("txtondate["+i+"]"))
			{
				if(document.getElementById("day_time_arr["+i+"]"))
				{
					if(document.getElementById("day_time_of_specific_days").value != "")
					{
						document.getElementById("day_time_of_specific_days").value = document.getElementById("day_time_of_specific_days").value+","+(document.getElementById("day_time_arr["+i+"]").value);
						//alert("s if"+document.getElementById("start_date_of_specific_days").value);
					}
					else
					{
						document.getElementById("day_time_of_specific_days").value = (document.getElementById("day_time_arr["+i+"]").value);
						//alert("s else"+document.getElementById("start_date_of_specific_days").value);
					}
				}
				else
				{
					document.getElementById("day_time_of_specific_days").value = "0.0";
				}


				if(document.getElementById("start_date_of_specific_days").value != "")
				{
					document.getElementById("start_date_of_specific_days").value = document.getElementById("start_date_of_specific_days").value+","+((document.getElementById("txtondate["+i+"]").value));
					document.getElementById("end_date_of_specific_days").value = document.getElementById("end_date_of_specific_days").value+","+((document.getElementById("txtondate["+i+"]").value));
					//alert("s if"+document.getElementById("start_date_of_specific_days").value);
				}
				else
				{
					document.getElementById("start_date_of_specific_days").value = ((document.getElementById("txtondate["+i+"]").value));
					document.getElementById("end_date_of_specific_days").value = ((document.getElementById("txtondate["+i+"]").value));
					//alert("s else"+document.getElementById("start_date_of_specific_days").value);
				}
			}/*
			if(document.getElementById("txtondateend["+i+"]"))
			{
				if(document.getElementById("end_date_of_specific_days").value != "")
				{
					document.getElementById("end_date_of_specific_days").value = document.getElementById("end_date_of_specific_days").value+","+document.getElementById("txtondateend["+i+"]").value;
					//alert("e if"+document.getElementById("end_date_of_specific_days").value);
				}
				else
				{
					document.getElementById("end_date_of_specific_days").value = document.getElementById("txtondateend["+i+"]").value;
					//alert("e else"+document.getElementById("end_date_of_specific_days").value);
				}
			}*/
		}
	}
	if(document.getElementById("repl_message").innerHTML == "")
	{
		authenticate('../ajax/save.php','repl_message','txtstart_date|staffname|EventName|rand_number|servicename|txtrevenue|hours|minut|day_time|txtfirst_name|txtlast_name|txttitle|txtphone|txtext|txtemail|txtmemo|cardholder|cardnumber|expiry|cctype|ccv|repeat|repeat_every|radio_enddate|txtenddate|radio_endrepeat|repeats|repeat_every_week|mon|tue|wed|thu|fri|sat|sun|radio_endweek|txtend_week_date|radio_endweekrepeat|repeats_week|repeat_every_month|monday|day19|radio_endmonth|txtend_month_date|radio_endmonthrepeat|repeats_month|txtend_specific_date|specific_details|sp_customer_id|start_date_of_specific_days|day_time_of_specific_days|end_date_of_specific_days|action','repl_msg')
	}
	else
	{
		alert("Please select/insert proper data");
	}
}
function function_select_redio(ele_id)
{
	document.getElementById(ele_id).checked = "checked";
}
function specific_day(obj,specific_days)
{
					var hours = document.getElementById("hours").value;
					var minut = document.getElementById("minut").value;
					var day_time = document.getElementById("day_time").value;
					var staffname = document.getElementById("staffname").value;
					//alert(document.getElementById("txt_sel_datearr").value);
					  var txt_sel_datearr = (document.getElementById("txt_sel_datearr").value).split(",");
					  var txtstart_date = document.getElementById("txtstart_date").value;
					  var txt_sel_arr = document.getElementById("txt_sel_arr").value;
					  var flg = true;
					  for(i=0; i<txt_sel_datearr.length;i++)
					  {
						  	//alert(txt_sel_datearr[i]);
							if(txt_sel_datearr[i]==obj.value)
							{
								flg = false;
								break;
							}
					  }
					  if(flg)
					  {
							//alert(SERVER_URL+"ajax/check_specific_day_cal.php?dateofclick="+obj.value+"&hours="+hours+"&minut="+minut+"&day_time="+day_time+"&staffname="+staffname+"&txt_sel_datearr="+txt_sel_datearr+"&txtstart_date="+txtstart_date+"&txt_sel_arr="+txt_sel_arr);
							$.ajax({
								  type: 'POST',
								  url: SERVER_URL+"ajax/check_specific_day_cal.php?dateofclick="+obj.value+"&hours="+hours+"&minut="+minut+"&day_time="+day_time+"&staffname="+staffname+"&txt_sel_datearr="+txt_sel_datearr+"&txtstart_date="+txtstart_date+"&txt_sel_arr="+txt_sel_arr,
								  data:"",  
								  dataType: "text",
								  success:function (res) {
									  document.getElementById("txt_sel_arr").value = parseInt(txt_sel_arr)+1;
									  document.getElementById("txt_sel_datearr").value = document.getElementById("txt_sel_datearr").value+","+obj.value
									  document.getElementById("main_div_for_specific").innerHTML = document.getElementById("main_div_for_specific").innerHTML+res;
									},
								  error:function (res) {
								  }	
							});
					  }
					  else
					  {
						  alert(obj.value +"date is already seleted previously");
					  }
}
function specific_day_edit(s_date_val,specific_days,from_db)
{
					var s_date_val = s_date_val.split(",");
					for(j=0;j<(s_date_val.length-1);j++)
					{
							var hours = document.getElementById("hours").value;
							var minut = document.getElementById("minut").value;
							var day_time = document.getElementById("day_time").value;
							var staffname = document.getElementById("staffname").value;
							//alert(document.getElementById("txt_sel_datearr").value);
							  var txt_sel_datearr = (document.getElementById("txt_sel_datearr").value).split(",");
							  var txtstart_date = document.getElementById("txtstart_date").value;
							  var txt_sel_arr = document.getElementById("txt_sel_arr").value;
							  var flg = true;
							  for(i=0; i<(txt_sel_datearr.length-1);i++)
							  {
									//alert(txt_sel_datearr[i]+"==="+s_date_val[j]);
									if(txt_sel_datearr[i] != "" && s_date_val[j] != "")
									{
										if(txt_sel_datearr[i]==s_date_val[j])
										{
											flg = false;
											break;
										}
									}
							  }
							  if(flg)
							  {
									//alert(SERVER_URL+"ajax/check_specific_day_cal.php?dateofclick="+s_date_val[j]+"&hours="+hours+"&minut="+minut+"&day_time="+day_time+"&staffname="+staffname+"&txt_sel_datearr="+txt_sel_datearr+"&txtstart_date="+txtstart_date+"&txt_sel_arr="+j+"&from_db="+from_db);
									$.ajax({
										  type: 'POST',
										  url: SERVER_URL+"ajax/check_specific_day_cal.php?dateofclick="+s_date_val[j]+"&hours="+hours+"&minut="+minut+"&day_time="+day_time+"&staffname="+staffname+"&txt_sel_datearr="+txt_sel_datearr+"&txtstart_date="+txtstart_date+"&txt_sel_arr="+j+"&from_db="+from_db,
										  data:"",  
										  dataType: "text",
										  success:function (res) {
											  document.getElementById("txt_sel_arr").value = j;
											  document.getElementById("txt_sel_datearr").value = document.getElementById("txt_sel_datearr").value+","+s_date_val[j];
											  document.getElementById("main_div_for_specific").innerHTML = document.getElementById("main_div_for_specific").innerHTML+res;
											},
										  error:function (res) {
										  }	
									});
							  }
							  else
							  {
								  alert(s_date_val[j] +"date is already seleted previously");
							  }
					}
}
function print_detail(app_id)
{
	//alert(app_id);
	window.open(SERVER_URL+"service-proivder/print-appointment.php?appointmentid="+app_id);
}

/* $(document).ready(function(){
	$('.fc-event').click(function(){
		alert("tset");
		$(this).addClass('status_cancel');					
	});						   
});
*/


function cancel_appointment(app_id)
{
	
	if(app_id !="")
	{
		var conf = confirm("Are you sure to want to cancel this appointment.");
		if (conf== false)
		{
			return false;	 
		}
		else
		{
			$.ajax({
				  type: 'POST',
				  url: SERVER_URL+"ajax/cancel_appointment.php",
				  data:{'app_id':app_id},
				  dataType: "text",
				  async:   true,
				  success:function (res) {
							popup_hide();
						//alert(res);
						//if(res == 'cancel')
						//{
							//$('div.status_cancel .fc-event-inner .fc-event-bg').css('background','#FF0000 !important');	
						//}
						
				  }
			});	  
		}	
	}
	else
	{
		popup_hide();
	}
}


function authenticate(AjaxPage,LoadImageId,FrmElementList,SrcHtmlElement) 
	{
			//alert(AjaxPage);
			// show loading image 
			$("#"+LoadImageId).show();
			
			if(FrmElementList.indexOf('|') != -1)
			{
				var FrmElementList = FrmElementList.split("|");
				var temp = "";
				for( i=0 ;i < FrmElementList.length; i++ )
				{
					if($("#"+FrmElementList[i]).attr('type') == "checkbox")
					{
						
						if($("#"+FrmElementList[i]).attr('checked') == "checked")
						{
							var value = $("#"+FrmElementList[i]).val();	
							temp = temp + ',"' +  FrmElementList[i] + '": "' + value +'"' ; 
						}
					}
					else if($("#"+FrmElementList[i]).attr('type') == "radio")
					{
						
						if($("#"+FrmElementList[i]).attr('checked') == "checked")
						{
							var value = $("#"+FrmElementList[i]).val();	
							temp = temp + ',"' +  FrmElementList[i] + '": "' + value +'"' ; 
						}
					}
					else
					{
						var value = $("#"+FrmElementList[i]).val();	
						temp = temp + ',"' +  FrmElementList[i] + '": "' + value +'"' ; 
					}
				}
				
				var post_data ={'json':'{' + temp.substring(1) + '}'};
				
			}
			else
			{
				var value = $("#"+FrmElementList).val();
				var post_data ={'json':'{"' + FrmElementList + '": "' + value + '"}'};
			}
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
					 //$("#"+LoadImageId).hide();
					 
					  $('#emailflag').val(data);
					  //alert(data);
					  
					  $("#"+LoadImageId).html(data);
					  if(data == "email already exist.")
					  {
						  $("#"+FrmElementList).val('');
					  }
					 
					  if(data=="Booked_appointment_saved")
					  {
						 popup_hide();
							$.ajax({
								url: SERVER_URL+"ajax/events_xml.php",
								dataType: 'json',
								data: {},
								success: function(doc) {
									//doc = "events= event^^^^^^^^2012,11,05,15,00,00^^^^^^^^2012,11,05,15,30,00^^^^^^^^event_439";
									if(doc)
									{
										var str_events = doc.split("events= ");
										//var events = [];
										for(i=1;i<(str_events.length);i++)
										{
											str_events_details = str_events[i].split("^^^^^^^^");
											var Y_m_d_h = str_events_details[1].split(",");
											
											var e_Y_m_d_h = str_events_details[2].split(",");
											
											var newEvent = new Object();
											newEvent.title = str_events_details[0];
											newEvent.start = new Date(Y_m_d_h[0],Y_m_d_h[1],Y_m_d_h[2],Y_m_d_h[3],Y_m_d_h[4]);
											newEvent.end = new Date(e_Y_m_d_h[0],e_Y_m_d_h[1],e_Y_m_d_h[2],e_Y_m_d_h[3],e_Y_m_d_h[4]);
											newEvent.allDay = false;
											newEvent.id = str_events_details[3];
											$('#calendar').fullCalendar( 'renderEvent', newEvent );
										}
									}
								}
								
							});
					  }
				}
			}); 
	}
