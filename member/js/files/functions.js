$(function() {
	
	//===== File manager =====//	
		
	$().ready(function() {
		var elf = $('#fileManager').elfinder({
			// lang: 'ru',             // language (OPTIONAL)
			url : 'php/connector.php'  // connector URL (REQUIRED)
		}).elfinder('instance');			
	});	
	
	
	//===== ShowCode plugin for <pre> tag =====//
	$('.code').sourcerer('js html css php'); // Display all languages
	
	
	//===== Left navigation styling =====//
	
	$('.subNav li a.this').parent('li').addClass('activeli');


	//===== Login pic hover animation =====//
	
	$(".loginPic").ready(
		function() { 
		
		$('.logleft, .logback').animate({left:0, opacity:1},200); 
		$('.logright').animate({right:0, opacity:1},200); },
		
		function() { 
		$('.logleft, .logback').animate({left:0, opacity:0},200);
		$('.logright').animate({right:0, opacity:0},200); }
	);
	
	/*$(".loginPic").hover(
		function() { 
		
		$('.logleft, .logback').animate({left:10, opacity:1},200); 
		$('.logright').animate({right:10, opacity:1},200); },
		
		function() { 
		$('.logleft, .logback').animate({left:0, opacity:0},200);
		$('.logright').animate({right:0, opacity:0},200); }
	);*/
	
	
	//===== Image gallery control buttons =====//
	
	$(".gallery ul li").hover(
		function() { $(this).children(".actions").show("fade", 200); },
		function() { $(this).children(".actions").hide("fade", 200); }
	);
	
	
	//===== Autocomplete =====//
	
	var availableTags = [ "ActionScript", "AppleScript", "Asp", "BASIC", "C", "C++", "Clojure", "COBOL", "ColdFusion", "Erlang", "Fortran", "Groovy", "Haskell", "Java", "JavaScript", "Lisp", "Perl", "PHP", "Python", "Ruby", "Scala", "Scheme" ];
	$( ".ac" ).autocomplete({
		source: availableTags
	});	


	//===== jQuery file tree =====//
	
	$('.filetree').fileTree({
        root: '../images/',
        script: 'php/jqueryFileTree.php',
        expandSpeed: 200,
        collapseSpeed: 200,
        multiFolder: true
    }, function(file) {
        alert(file);
    });
	
	
	//===== Sortable columns =====//
	
	$("table").tablesorter();
	
	
	//===== Resizable columns =====//
	
	$("#resize, #resize2").colResizable({
		liveDrag:true,
		draggingClass:"dragging" 
	});
	
	
	//===== Bootstrap functions =====//
	
	// Loading button
    $('#loading').click(function () {
        var btn = $(this)
        btn.button('loading')
        setTimeout(function () {
          btn.button('reset')
        }, 3000)
      });
	
	// Dropdown
	$('.dropdown-toggle').dropdown();
	
	
	//===== Animated progress bars (ID dependency) =====//
	
	var percent = $('#bar1').attr('title');
	$('#bar1').animate({width: percent},1000);
	
	var percent = $('#bar2').attr('title');
	$('#bar2').animate({width: percent},1000);

	var percent = $('#bar3').attr('title');
	$('#bar3').animate({width: percent},1000);

	var percent = $('#bar4').attr('title');
	$('#bar4').animate({width: percent},1000);

	var percent = $('#bar5').attr('title');
	$('#bar5').animate({width: percent},1000);

	var percent = $('#bar6').attr('title');
	$('#bar6').animate({width: percent},1000);
	
	var percent = $('#bar7').attr('title');
	$('#bar7').animate({width: percent},1000);
	
	var percent = $('#bar8').attr('title');
	$('#bar8').animate({width: percent},1000);
	
	var percent = $('#bar9').attr('title');
	$('#bar9').animate({width: percent},1000);

	var percent = $('#bar10').attr('title');
	$('#bar10').animate({width: percent},1000);


	//===== Fancybox =====//
	
	$(".lightbox").fancybox({
	'padding': 2
	});
	
	
	//===== Color picker =====//
	
	$('#cPicker').ColorPicker({
		color: '#e62e90',
		onShow: function (colpkr) {
			$(colpkr).fadeIn(500);
			return false;
		},
		onHide: function (colpkr) {
			$(colpkr).fadeOut(500);
			return false;
		},
		onChange: function (hsb, hex, rgb) {
			$('#cPicker div').css('backgroundColor', '#' + hex);
		}
	});
	
	$('#flatPicker').ColorPicker({flat: true});


	//===== Time picker =====//
	
	$('.timepicker').timeEntry({
		show24Hours: false, // 24 hours format
		showSeconds: false, // Show seconds?
		defaultTime: '09:00AM',
		spinnerImage: 'images/elements/ui/spinner.png', // Arrows image
		spinnerSize: [19, 26, 0], // Image size
		spinnerIncDecOnly: true // Only up and down arrows
	});
	
	
	$('.start_time').timeEntry({
		show24Hours: false, // 24 hours format
		showSeconds: false, // Show seconds?
		defaultTime: '09:00AM',
		spinnerImage: 'images/elements/ui/spinner.png', // Arrows image
		spinnerSize: [19, 26, 0], // Image size
		spinnerIncDecOnly: true // Only up and down arrows
	});
	
	$('.end_time').timeEntry({
		show24Hours: false, // 24 hours format
		showSeconds: false, // Show seconds?
		defaultTime: '05:30PM',
		spinnerImage: 'images/elements/ui/spinner.png', // Arrows image
		spinnerSize: [19, 26, 0], // Image size
		spinnerIncDecOnly: true // Only up and down arrows
	});
	

	//===== Usual validation engine=====//

	$("#usualValidate").validate({
		rules: {
			firstname: "required",
			minChars: {
				required: true,
				minlength: 3
			},
			maxChars: {
				required: true,
				maxlength: 6
			},
			mini: {
				required: true,
				min: 3
			},
			maxi: {
				required: true,
				max: 6
			},
			range: {
				required: true,
				range: [6, 16]
			},
			emailField: {
				required: true,
				email: true
			},
			urlField: {
				required: true,
				url: true
			},
			dateField: {
				required: true,
				date: true
			},
			digitsOnly: {
				required: true,
				digits: true
			},
			enterPass: {
				required: true,
				minlength: 5
			},
			repeatPass: {
				required: true,
				minlength: 5,
				equalTo: "#enterPass"
			},
			customMessage: "required",
			topic: {
				required: "#newsletter:checked",
				minlength: 2
			},
			agree: "required"
		},
		messages: {
			customMessage: {
				required: "Bazinga! This message is editable",
			},
			agree: "Please accept our policy"
		}
	});
	
	$("#SecondFormValidate").validate({
		rules: {
			firstname: "required",
			minChars: {
				required: true,
				minlength: 3
			},
			maxChars: {
				required: true,
				maxlength: 6
			},
			mini: {
				required: true,
				min: 3
			},
			maxi: {
				required: true,
				max: 6
			},
			range: {
				required: true,
				range: [6, 16]
			},
			emailField: {
				required: true,
				email: true
			},
			urlField: {
				required: true,
				url: true
			},
			dateField: {
				required: true,
				date: true
			},
			digitsOnly: {
				required: true,
				digits: true
			},
			enterPass: {
				required: true,
				minlength: 5
			},
			repeatPass: {
				required: true,
				minlength: 5,
				equalTo: "#enterPass"
			},
			customMessage: "required",
			topic: {
				required: "#allow_email:checked"
			},
			agree: "required"
		},
		messages: {
			customMessage: {
				required: "Bazinga! This message is editable",
			},
			agree: "Please accept our policy"
		}
	});
	
	
	//====== login validation ======//
	
	$("#login").validate({
		rules: {
			firstname: "required",
			minChars: {
				required: true,
				minlength: 3
			},
			maxChars: {
				required: true,
				maxlength: 6
			},
			mini: {
				required: true,
				min: 3
			},
			maxi: {
				required: true,
				max: 6
			},
			range: {
				required: true,
				range: [6, 16]
			},
			emailField: {
				required: true,
				email: true
			},
			urlField: {
				required: true,
				url: true
			},
			dateField: {
				required: true,
				date: true
			},
			digitsOnly: {
				required: true,
				digits: true
			},
			enterPass: {
				required: true,
				minlength: 5
			},
			repeatPass: {
				required: true,
				minlength: 5,
				equalTo: "#enterPass"
			},
			customMessage: "required",
			topic: {
				required: "#newsletter:checked",
				minlength: 2
			},
			agree: "required"
		},
		messages: {
			customMessage: {
				required: "Bazinga! This message is editable",
			},
			agree: "Please accept our policy"
		}
	});
	
	//====== recover validation ======//
	
	$("#recover").validate({
		rules: {
			firstname: "required",
			minChars: {
				required: true,
				minlength: 3
			},
			maxChars: {
				required: true,
				maxlength: 6
			},
			mini: {
				required: true,
				min: 3
			},
			maxi: {
				required: true,
				max: 6
			},
			range: {
				required: true,
				range: [6, 16]
			},
			emailField: {
				required: true,
				email: true
			},
			urlField: {
				required: true,
				url: true
			},
			dateField: {
				required: true,
				date: true
			},
			digitsOnly: {
				required: true,
				digits: true
			},
			enterPass: {
				required: true,
				minlength: 5
			},
			repeatPass: {
				required: true,
				minlength: 5,
				equalTo: "#enterPass"
			},
			customMessage: "required",
			topic: {
				required: "#newsletter:checked",
				minlength: 2
			},
			agree: "required"
		},
		messages: {
			customMessage: {
				required: "Bazinga! This message is editable",
			},
			agree: "Please accept our policy"
		}
	});
	
	//===== Validation engine =====//
	
	$("#validate").validationEngine();

	
	//===== iButtons =====//
	
	$('.on_off :checkbox, .on_off :radio').iButton({
		labelOn: "",
		labelOff: "",
		enableDrag: false 
	});
	
	$('.yes_no :checkbox, .yes_no :radio').iButton({
		labelOn: "On",
		labelOff: "Off",
		enableDrag: false
	});
	
	$('.enabled_disabled :checkbox, .enabled_disabled :radio').iButton({
		labelOn: "Enabled",
		labelOff: "Disabled",
		enableDrag: false
	});
	
	
	
	//===== Notification boxes =====//
	
	$(".nNote").click(function() {
		$(this).fadeTo(200, 0.00, function(){ //fade
			$(this).slideUp(200, function() { //slide up
				$(this).remove(); //then remove from the DOM
			});
		});
	});	
	
	
	//===== Animate current li when closing button clicked =====//
	
	$(".remove").click(function() {
		$(this).parent('li').fadeTo(200, 0.00, function(){ //fade
			$(this).slideUp(200, function() { //slide up
				$(this).remove(); //then remove from the DOM
			});
		});
	});	
	
	
	
	//===== Check all checbboxes =====//
	$(".titleIcon input:checkbox").click(function() {				  
		var checkedStatus = this.checked;
		$("#checkAll tbody tr td:first-child input:checkbox").each(function() {
			this.checked = checkedStatus;
				if (checkedStatus == this.checked) {
					$(this).closest('.checker > span').removeClass('checked');
					$(this).closest('table tbody tr').removeClass('thisRow');
				}
				if (this.checked) {
					$(this).closest('.checker > span').addClass('checked');
					$(this).closest('table tbody tr').addClass('thisRow');
				}
		});
	});	
	
	$(function() {
    $('#checkAll tbody tr td:first-child input[type=checkbox]').change(function() {
        $(this).closest('tr').toggleClass("thisRow", this.checked);
		});
	});

	/*==========  check all check box in inbox page reply section =====*/
	$(".sentIcon input:checkbox").click(function() {
		var checkedStatus = this.checked;
		$("#checkAllsent tbody tr td:first-child input:checkbox").each(function() {
			this.checked = checkedStatus;
				if (checkedStatus == this.checked) {
					$(this).closest('.checker > span').removeClass('checked');
					$(this).closest('table tbody tr').removeClass('thisRow');
				}
				if (this.checked) {
					$(this).closest('.checker > span').addClass('checked');
					$(this).closest('table tbody tr').addClass('thisRow');
				}
		});
	});	
	
	$(function() {
    $('#checkAllsent tbody tr td:first-child input[type=checkbox]').change(function() {
        $(this).closest('tr').toggleClass("thisRow", this.checked);
		});
	});
	
	$(".replyIcon input:checkbox").click(function() {
		var checkedStatus = this.checked;
		$("#check_reply tbody tr td:first-child input:checkbox").each(function() {
			this.checked = checkedStatus;
				if (checkedStatus == this.checked) {
					$(this).closest('.checker > span').removeClass('checked');
					$(this).closest('table tbody tr').removeClass('thisRow');
				}
				if (this.checked) {
					$(this).closest('.checker > span').addClass('checked');
					$(this).closest('table tbody tr').addClass('thisRow');
				}
		});
	});	
	
	$(function() {
    $('#check_reply tbody tr td:first-child input[type=checkbox]').change(function() {
        $(this).closest('tr').toggleClass("thisRow", this.checked);
		});
	});
	
	
	$(".titleIcon input:checkbox").click(function() {				  
		var checkedStatus = this.checked;
		$("#checkAllinbox tbody tr td:first-child input:checkbox").each(function() {
			this.checked = checkedStatus;
				if (checkedStatus == this.checked) {
					$(this).closest('.checker > span').removeClass('checked');
					$(this).closest('table tbody tr').removeClass('thisRow');
				}
				if (this.checked) {
					$(this).closest('.checker > span').addClass('checked');
					$(this).closest('table tbody tr').addClass('thisRow');
				}
		});
	});
	
	
	$(function() {
    	$('#checkAllinbox tbody tr td:first-child input[type=checkbox]').change(function() {
       		$(this).closest('tr').toggleClass("thisRow", this.checked);
		});
	});
	
	//===== File uploader =====//
	
	$("#uploader").pluploadQueue({
		runtimes : 'html5,html4',
		url : 'php/upload.php',
		max_file_size : '100kb',
		unique_names : true,
		filters : [
			{title : "Image files", extensions : "jpg,gif,png"}
		]
	});
	
	
	//===== Wizards =====//
	
	$("#wizard1").formwizard({
		formPluginEnabled: true, 
		validationEnabled: false,
		focusFirstInput : false,
		disableUIStyles : true,
	
		formOptions :{
			success: function(data){$("#status1").fadeTo(500,1,function(){ $(this).html("<span>Form was submitted!</span>").fadeTo(5000, 0); })},
			beforeSubmit: function(data){$("#w1").html("<span>Form was submitted with ajax. Data sent to the server: " + $.param(data) + "</span>");},
			resetForm: true
		}
	});
	
	$("#wizard2").formwizard({ 
		formPluginEnabled: true,
		validationEnabled: true,
		focusFirstInput : false,
		disableUIStyles : true,
	
		formOptions :{
			success: function(data){$("#status2").fadeTo(500,1,function(){ $(this).html("<span>Form was submitted!</span>").fadeTo(5000, 0); })},
			beforeSubmit: function(data){$("#w2").html("<span>Form was submitted with ajax. Data sent to the server: " + $.param(data) + "</span>");},
			dataType: 'json',
			resetForm: true
		},
		validationOptions : {
			rules: {
				bazinga: "required",
				email: { required: true, email: true }
			},
			messages: {
				bazinga: "Bazinga. This note is editable",
				email: { required: "Please specify your email", email: "Correct format is name@domain.com" }
			}
		}
	});
	
	$("#wizard3").formwizard({
		formPluginEnabled: false, 
		validationEnabled: false,
		focusFirstInput : false,
		disableUIStyles : true
	});
	
	
	
	//===== WYSIWYG editor =====//
	
	$("#editor").cleditor({
		width:"100%", 
		height:"250px",
		/*bodyStyle: "margin: 10px; font: 12px Arial,Verdana; cursor:text",
		useCSS:true*/
		bodyStyle: "margin: 10px; font: 12px Arial,Verdana; cursor:text",
		useCSS:true,
		controls:     // controls to add to the toolbar
                        "source | bold italic underline  "
       
		
	});
	
	
	//===== Dual select boxes =====//
	
	$.configureBoxes();


	//===== Chosen plugin =====//
		
	$(".select").chosen(); 
	
	
	//===== Autotabs. Inline data rows =====//

	$('.onlyNums input').autotab_magic().autotab_filter('numeric');
	$('.onlyText input').autotab_magic().autotab_filter('text');
	$('.onlyAlpha input').autotab_magic().autotab_filter('alpha');
	$('.onlyRegex input').autotab_magic().autotab_filter({ format: 'custom', pattern: '[^0-9\.]' });
	$('.allUpper input').autotab_magic().autotab_filter({ format: 'alphanumeric', uppercase: true });
	
	
	//===== Masked input =====//
	
	$.mask.definitions['~'] = "[+-]";
	$(".maskDate").mask("99/99/9999",{completed:function(){alert("Callback when completed");}});
	$(".maskPhone").mask("(999) 999-9999");
	$(".maskPhoneExt").mask("(999) 999-9999? x99999");
	$(".maskIntPhone").mask("+33 999 999 999");
	$(".maskTin").mask("99-9999999");
	$(".maskSsn").mask("999-99-9999");
	$(".maskProd").mask("a*-999-a999", { placeholder: " " });
	$(".maskEye").mask("~9.99 ~9.99 999");
	$(".maskPo").mask("PO: aaa-999-***");
	$(".maskPct").mask("99%");
	
	
	//===== Tags =====//	
		
	$('.tags').tagsInput({width:'100%'});
	
	
	//===== Input limiter =====//
	
	$('.lim').inputlimiter({
		limit: 140,
		boxId: 'limitingtext',
		boxAttach: false
	});
	
	$('.limnewdirect').inputlimiter({
		limit: 140,
		boxId: 'limitingtext',
		boxAttach: false
	});
	
	
	//===== Placeholder =====//
	
	$('input[placeholder], textarea[placeholder]').placeholder();
	
	
	//===== Autogrowing textarea =====//
	
	$('.auto').elastic();
	$('.auto').trigger('update');


	//===== Full width sidebar dropdown =====//
	
	$('.fulldd li').click(function () {
		$(this).children("ul").slideToggle(150);
	});
	$(document).bind('click', function(e) {
		var $clicked = $(e.target);
		if (! $clicked.parents().hasClass("has"))
		$('.fulldd li').children("ul").slideUp(150);
	});
	
	
	//===== Top panel search field =====//
	
	$('.userNav a.search').click(function () {
		$('.topSearch').fadeToggle(150);
	});
	
	
	//===== 2 responsive buttons (320px - 480px) =====//
	
	$('.iTop').click(function () {
		$('#sidebar').slideToggle(100);
	});
	
	$('.iButton').click(function () {
		$('.altMenu').slideToggle(100);
	});

	
	//===== Animated dropdown for the right links group on breadcrumbs line =====//
	
	$('.breadLinks ul li').click(function () {
		$(this).children("ul").slideToggle(150);
	});
	$(document).bind('click', function(e) {
		var $clicked = $(e.target);
		if (! $clicked.parents().hasClass("has"))
		$('.breadLinks ul li').children("ul").slideUp(150);
	});
	
	
	//===== Easy tabs =====//
	
	$('#tab-container').easytabs({
		animationSpeed: 300,
		collapsible: false,
		tabActiveClass: "clicked"
	});
		
	
	//===== Tabs =====//
		
	$.fn.contentTabs = function(){ 
	
		$(this).find(".tab_content").hide(); //Hide all content
		$(this).find("ul.tabs li:first").addClass("activeTab").show(); //Activate first tab
		$(this).find(".tab_content:first").show(); //Show first tab content
	
		$("ul.tabs li").click(function() {
			$(this).parent().parent().find("ul.tabs li").removeClass("activeTab"); //Remove any "active" class
			$(this).addClass("activeTab"); //Add "active" class to selected tab
			$(this).parent().parent().find(".tab_content").hide(); //Hide all tab content
			var activeTab = $(this).find("a").attr("href"); //Find the rel attribute value to identify the active tab + content
			$(activeTab).show(); //Fade in the active content
			return false;
		});
	
	};
	$("div[class^='widget']").contentTabs(); //Run function on any div with class name of "Content Tabs"


	//===== Dynamic data table =====//
	
	oTable = $('.dTable').dataTable({
		"bJQueryUI": false,
		"bAutoWidth": false,
		"sPaginationType": "full_numbers",
		"sDom": '<"H"fl>t<"F"ip>'
	});
	

	//===== Dynamic table toolbars =====//		
	
	$('#dyn .tOptions').click(function () {
		$('#dyn .tablePars').slideToggle(200);
	});	
	
	$('#dyn2 .tOptions').click(function () {
		$('#dyn2 .tablePars').slideToggle(200);
	});	
	
	
	$('.tOptions').click(function () {
		$(this).toggleClass("act");
	});
	

	//== Adding class to :last-child elements ==//
		
	$(".subNav li:last-child a, .formRow:last-child, .userList li:last-child, table tbody tr:last-child td, .breadLinks ul li ul li:last-child, .fulldd li ul li:last-child, .niceList li:last-child").addClass("noBorderB")

	
	//===== Add classes for sub sidebar detection =====//
	
	if ($('div').hasClass('secNav')) {
		$('#sidebar').addClass('with');
		//$('#content').addClass('withSide');
	}
	else {
		$('#sidebar').addClass('without');
		$('#content').css('margin-left','100px');//.addClass('withoutSide');
		$('#footer > .wrapper').addClass('fullOne');
		};


	//===== Collapsible elements management =====//
	
	$('.exp').collapsible({
		defaultOpen: 'current',
		cookieName: 'navAct',
		cssOpen: 'subOpened',
		cssClose: 'subClosed',
		speed: 200
	});

	$('.opened').collapsible({
		defaultOpen: 'opened,toggleOpened',
		cssOpen: 'inactive',
		cssClose: 'normal',
		speed: 200
	});
	
	$('.closed').collapsible({
		defaultOpen: '',
		cssOpen: 'inactive',
		cssClose: 'normal',
		speed: 200
	});
	
	
	//===== Accordion =====//		
	
	$('div.menu_body:eq(0)').show();
	$('.acc .whead:eq(0)').show().css({color:"#2B6893"});
	
	$(".acc .whead").click(function() {	
		$(this).css({color:"#2B6893"}).next("div.menu_body").slideToggle(200).siblings("div.menu_body").slideUp("slow");
		$(this).siblings().css({color:"#404040"});
	});



	//===== Breadcrumbs =====//
	
	$('#breadcrumbs').xBreadcrumbs();
	
	
		//===== Sparklines =====//
	
	$('.balBars').sparkline(
	'html', {type: 'bar', barColor: '#db6464', height: '18px'}
	 );
	 

	//===== Admin maenu effects =====//		
	


	
	
	
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
	
	
	//===== Tooltips =====//

	$('.tipN').tipsy({gravity: 'n',fade: true, html:true});
	$('.tipS').tipsy({gravity: 's',fade: true, html:true});
	$('.tipW').tipsy({gravity: 'w',fade: true, html:true});
	$('.tipE').tipsy({gravity: 'e',fade: true, html:true});
	
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
			if (date.getDate() == closedDates[i][0] && date.getMonth() + 1 == closedDates[i][1] &&
			date.getFullYear() == closedDates[i][2]) {
			return [false, '']; // Closed date
			}
			}
			return [true, '']; // Open
		}
	
	$('.fc-button-content').click(function () {
					$('.fc-mon').removeClass('holiday-color');
					$('.fc-tue').removeClass('holiday-color');
					$('.fc-wed').removeClass('holiday-color');
					$('.fc-thu').removeClass('holiday-color');
					$('.fc-fri').removeClass('holiday-color');
	});



	//===== Spinner options =====//
	
	var itemList = [
		{url: "http://ejohn.org", title: "John Resig"},
		{url: "http://bassistance.de/", title: "J&ouml;rn Zaefferer"},
		{url: "http://snook.ca/jonathan/", title: "Jonathan Snook"},
		{url: "http://rdworth.org/", title: "Richard Worth"},
		{url: "http://www.paulbakaus.com/", title: "Paul Bakaus"},
		{url: "http://www.yehudakatz.com/", title: "Yehuda Katz"},
		{url: "http://www.azarask.in/", title: "Aza Raskin"},
		{url: "http://www.karlswedberg.com/", title: "Karl Swedberg"},
		{url: "http://scottjehl.com/", title: "Scott Jehl"},
		{url: "http://jdsharp.us/", title: "Jonathan Sharp"},
		{url: "http://www.kevinhoyt.org/", title: "Kevin Hoyt"},
		{url: "http://www.codylindley.com/", title: "Cody Lindley"},
		{url: "http://malsup.com/jquery/", title: "Mike Alsup"}
	];

	var opts = {
		's1': {decimals:2},
		's2': {stepping: 0.25},
		's3': {currency: '$'},
		's4': {},
		's5': {
			//
			// Two methods of adding external items to the spinner
			//
			// method 1: on initalisation call the add method directly and format html manually
			init: function(e, ui) {
				for (var i=0; i<itemList.length; i++) {
					ui.add('<a href="'+ itemList[i].url +'" target="_blank">'+ itemList[i].title +'</a>');
				}
			},

			// method 2: use the format and items options in combination
			format: '<a href="%(url)" target="_blank">%(title)</a>',
			items: itemList
		}
	};

	for (var n in opts)
		$("#"+n).spinner(opts[n]);

	$("button").click(function(e){
		var ns = $(this).attr('id').match(/(s\d)\-(\w+)$/);
		if (ns != null)
			$('#'+ns[1]).spinner( (ns[2] == 'create') ? opts[ns[1]] : ns[2]);
	});
	


	//===== jQuery UI dialog =====//
	
    $('#dialog').dialog({
        autoOpen: false,
        width: 400,
        buttons: {
            "Gotcha": function () {
                $(this).dialog("close");
            },
            "Cancel": function () {
                $(this).dialog("close");
            }
        }
    });
	
    // Dialog Link
    $('#dialog_open').click(function () {
        $('#dialog').dialog('open');
        return false;
    });
	
	// Dialog
    $('#formDialog').dialog({
        autoOpen: false,
        width: 400,
        buttons: {
            "Nice stuff": function () {
                $(this).dialog("close");
            },
            "Cancel": function () {
                $(this).dialog("close");
            }
        }
    });
	
    // Dialog Link
    $('#formDialog_open').click(function () {
        $('#formDialog').dialog('open');
        return false;
    });
	
	// Dialog
    $('#customDialog').dialog({
        autoOpen: false,
        width: 650,
        buttons: {
            "Very cool!": function () {
                $(this).dialog("close");
            },
            "Cancel": function () {
                $(this).dialog("close");
            }
        }
    });
	
    // Dialog Link
    $('#customDialog_open').click(function () {
        $('#customDialog').dialog('open');
        return false;
    });
	
	
	

	
	
	//===== Vertical sliders =====//
	
	$( "#eq > span" ).each(function() {
		// read initial values from markup and remove that
		var value = parseInt( $( this ).text(), 10 );
		$( this ).empty().slider({
			value: value,
			range: "min",
			animate: true,
			orientation: "vertical"
		});
	});
	
	
	//table thead td span
	
	/*$( "table > thead > td > span" ).click(function() {
		// read initial values from markup and remove that
		alert('dd');
	});*/
	
	
	//===== Modal =====//
	
    $('#dialog-modal').dialog({
		autoOpen: false, 
		width: 400,
		modal: true,
		buttons: {
				"Yep!": function() {
					$( this ).dialog( "close" );
				}
			}
		});
		
    $('#modal_open').click(function () {
        $('#dialog-modal').dialog('open');
        return false;
    });
	
	
	//===== jQuery UI stuff =====//
	
	// default mode
	$('#progress1').anim_progressbar();
	
	// from second #5 till 15
	var iNow = new Date().setTime(new Date().getTime() + 5 * 1000); // now plus 5 secs
	var iEnd = new Date().setTime(new Date().getTime() + 15 * 1000); // now plus 15 secs
	$('#progress2').anim_progressbar({start: iNow, finish: iEnd, interval: 1});
	
	// Progressbar
    $("#progress").progressbar({
        value: 80
    });
	
    // Modal Link
    $('#modal_link').click(function () {
        $('#dialog-message').dialog('open');
        return false;
    });
	
	// Datepicker
    $('.inlinedate').datepicker({
        inline: true,
		showOtherMonths:true,
		dateFormat: 'yy-mm-dd'
    });
	
	$( ".datepicker" ).datepicker({ 
		defaultDate: +7,
		showOtherMonths:true,
		autoSize: true,
		appendText: '(dd-mm-yyyy)',
		dateFormat: 'dd-mm-yy'
	});	
	
	$( "#txtstart_date" ).datepicker({ 
		defaultDate: +7,
		showOtherMonths:true,
		autoSize: true,
		appendText: '(dd-mm-yyyy)',
		dateFormat: 'dd-mm-yy'
	});	
	
	/*$(function() {
			var dates = $( "#fromDate, #toDate" ).datepicker({
				defaultDate: "+1w",
				changeMonth: false,
				showOtherMonths:true,
				numberOfMonths: 3,
				onSelect: function( selectedDate ) {
					var option = this.id == "fromDate" ? "minDate" : "maxDate",
						instance = $( this ).data( "datepicker" ),
						date = $.datepicker.parseDate(
							instance.settings.dateFormat ||
							$.datepicker._defaults.dateFormat,
							selectedDate, instance.settings );
					dates.not( this ).datepicker( "option", option, date );
				}
			});
		});*/
	
		$(function() {
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
			});
		});
	
	
	
	
	$( ".uSlider" ).slider(); /* Usual slider */
	
	
	$( ".uRange" ).slider({ /* Range slider */
		range: true,
		min: 0,
		max: 500,
		values: [ 75, 300 ],
		slide: function( event, ui ) {
			$( "#rangeAmount" ).val( "$" + ui.values[ 0 ] + " - $" + ui.values[ 1 ] );
		}
	});
	$( "#rangeAmount" ).val( "$" + $( ".uRange" ).slider( "values", 0 ) +" - $" + $( ".uRange" ).slider( "values", 1 ));
	

	$( ".uMin" ).slider({ /* Slider with minimum */
		range: "min",
		value: 37,
		min: 1,
		max: 700,
		slide: function( event, ui ) {
			$( "#minRangeAmount" ).val( "$" + ui.value );
		}
	});
	$( "#minRangeAmount" ).val( "$" + $( ".uMin" ).slider( "value" ) );


	$( ".uMax" ).slider({ /* Slider with maximum */
		range: "max",
		min: 1,
		max: 100,
		value: 20,
		slide: function( event, ui ) {
			$( "#maxRangeAmount" ).val( ui.value );
		}
	});
	$( "#maxRangeAmount" ).val( $( ".uMax" ).slider( "value" ) );	




	//===== Add class on #content resize. Needed for responsive grid =====//
	
	$('#content').resize(function () {
	  var width = $(this).width();
		if (width < 769) {
			$(this).addClass('under');
		}
		else { $(this).removeClass('under') }
	}).resize(); // Run resize on window load
	
	
	//===== Button for showing up sidebar on iPad portrait mode. Appears on right top =====//
				
	$("ul.userNav li a.sidebar").click(function() { 
		$(".secNav").toggleClass('display');
	});


	//===== Form elements styling =====//
	
	$("select, .check, .check :checkbox, input:radio, input:file").uniform();

	
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
						
					//alert(res);
					//if(res == 'cancel')
					//{
						//$('div.status_cancel .fc-event-inner .fc-event-bg').css('background','#FF0000 !important');	
					//}
					
			  }
		});	  
	} 
  	
}
function change_cal(ele_name)
{
	window.location = SERVER_URL+"service-proivder/index.php?file=calender&staff_id="+document.getElementById(ele_name).value;
}