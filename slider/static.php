<style type="text/css">

	#mediaplayer_wrapper

	{

		background: #8e8caa;

		background: -moz-linear-gradient(top, #787594 0%, #8e8caa 100%);

		background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,#787594), color-stop(100%,#8e8caa));

		background: -webkit-linear-gradient(top, #787594 0%,#8e8caa 100%);

		background: -o-linear-gradient(top, #787594 0%,#8e8caa 100%);

		background: -ms-linear-gradient(top, #787594 0%,#8e8caa 100%);

		background: linear-gradient(top, #787594 0%,#8e8caa 100%);

		filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#787594', endColorstr='#8e8caa',GradientType=0 );



	}

</style>
<script type="text/javascript">
function MM_CheckFlashVersion(reqVerStr,msg){
  with(navigator){
    var isIE  = (appVersion.indexOf("MSIE") != -1 && userAgent.indexOf("Opera") == -1);
    var isWin = (appVersion.toLowerCase().indexOf("win") != -1);
    if (!isIE || !isWin){  
      var flashVer = -1;
      if (plugins && plugins.length > 0){
        var desc = plugins["Shockwave Flash"] ? plugins["Shockwave Flash"].description : "";
        desc = plugins["Shockwave Flash 2.0"] ? plugins["Shockwave Flash 2.0"].description : desc;
        if (desc == "") flashVer = -1;
        else{
          var descArr = desc.split(" ");
          var tempArrMajor = descArr[2].split(".");
          var verMajor = tempArrMajor[0];
          var tempArrMinor = (descArr[3] != "") ? descArr[3].split("r") : descArr[4].split("r");
          var verMinor = (tempArrMinor[1] > 0) ? tempArrMinor[1] : 0;
          flashVer =  parseFloat(verMajor + "." + verMinor);
        }
      }
      // WebTV has Flash Player 4 or lower -- too low for video
      else if (userAgent.toLowerCase().indexOf("webtv") != -1) flashVer = 4.0;

      var verArr = reqVerStr.split(",");
      var reqVer = parseFloat(verArr[0] + "." + verArr[2]);
  
      if (flashVer < reqVer){
        if (confirm(msg))
          window.location = "http://www.macromedia.com/shockwave/download/download.cgi?P1_Prod_Version=ShockwaveFlash";
      }
    }
  } 
}
</script>
<body onLoad="MM_CheckFlashVersion('7,0,0,0','Content on this page requires a newer version of Macromedia Flash Player. Do you want to download it now?');"><div class="wrapper col2">

  <div id="featured_slide_inner">

   	<div class="banner_innerpage">

		<div class="content" style="display: block; margin:0 auto; width:980px; position:relative;">

							

														

							<!--<div id="tompetty_somethinggoodcoming_460_h264">Loading the player ...</div>

							<script type="text/javascript">

							jwplayer("tompetty_somethinggoodcoming_460_h264").setup({

							flashplayer: "http://olehorvli.com/jwplayer/player.swf",

							file: "http://192.168.1.116/affiliworx/global_network FLV.flv",

							image: "http://olehorvli.com/video/tompetty_somethinggoodcoming_460_h264.jpg",

							height: 233,

							width: 400

							});

							</script>-->

							<div style="float:left;">

									 <div id="silverlightControlHost">

									   <object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,0,0" width="460" height="345" id="FLVPlayer">
                                         <param name="movie" value="FLVPlayer_Progressive.swf" />
                                         <param name="salign" value="lt" />
                                         <param name="quality" value="high" />
                                         <param name="scale" value="noscale" />
                                         <param name="FlashVars" value="&MM_ComponentVersion=1&skinName=Clear_Skin_1&streamName=video&autoPlay=true&autoRewind=false" />
                                         <embed src="FLVPlayer_Progressive.swf" flashvars="&MM_ComponentVersion=1&skinName=Clear_Skin_1&streamName=video&autoPlay=true&autoRewind=false" quality="high" scale="noscale" width="460" height="345" name="FLVPlayer" salign="LT" type="application/x-shockwave-flash" pluginspage="http://www.macromedia.com/go/getflashplayer" />                                       
</object>
									
									   <iframe style="visibility:hidden;height:0;width:0;border:0px"></iframe>

							  </div> 

							</div>

							<div style="position: relative; width: 100%; height: 400px;">

								<div style="float:left;">

									<iframe src="http://www.slideshare.net/slideshow/embed_code/15858479" width="476" height="345" frameborder="0" marginwidth="0" marginheight="0" scrolling="no"></iframe>

								</div>

							</div>



							

							<?php /*?><div id="mediaplayer_wrapper" style="position: relative; width: 450px; height: 250px; margin:0 auto;">

							<object width="50%" height="50%" type="application/x-shockwave-flash" data="jwplayer/player.swf" bgcolor="#000000" id="mediaplayer" name="mediaplayer" tabindex="0"><param name="allowfullscreen" value="true"><param name="allowscriptaccess" value="always"><param name="seamlesstabbing" value="true"><param name="wmode" value="opaque"><param name="flashvars" value="netstreambasepath=http%3A%2F%2F192.168.1.116%2Faffiliworx%2Flogin.php&amp;id=mediaplayer&amp;repeat=always&amp;file=http%3A%2F%2F192.168.1.116%2Faffiliworx%2Fglobal_network%20FLV.flv&amp;autostart=true&amp;controlbar.position=over"></object>

							</div>



									<script type="text/javascript">

									jwplayer('mediaplayer').setup({

									'flashplayer': 'jwplayer/player.swf',

									'id': 'playerID',

									'width': '940',

									'height': '530',

									'autoplay':'true',

									'repeat': 'always',

									'file': 'http://192.168.1.116/affiliworx/global_network FLV.flv'

									});

									</script><?php */?>

									 <!--i have change 'width':'480'.hight:270 ppp -->

							<!--<div class="slideshow-container">

								<div id="loading" class="loader"></div>

								<div id="slideshow" class="slideshow"></div>

								<div id="controls" class="controls"></div>

								<div id="caption" class="caption-container"></div>

							</div>-->

						</div>

       </div>

  </div>

</div>