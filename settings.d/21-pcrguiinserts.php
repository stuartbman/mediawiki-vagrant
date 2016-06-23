<?php
// MediaWiki settings for PCRGUI Inserts
// Information: https://www.mediawiki.org/wiki/Extension:PCR_GUI_Inserts

require_once "$IP/extensions/PCRGUIInserts/PCRGUIInserts.php";

$wgPCRguii_Inserts['addHeadItem']['on'] = true;

//Add items for <head> of each page here

$wgPCRguii_Inserts['addHeadItem']['content'] = array
    (
	"<script>
		  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
		  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
		  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
		  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

		  ga('create', 'UA-40917870-1', 'auto');
	</script>",
	"<link href='http://fonts.googleapis.com/css?family=Open+Sans|Varela+Round' rel='stylesheet' type='text/css'>",
	"<meta name='theme-color' content='#13A89E'>",
	"<script type='text/javascript' src='//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-526d24af267495ba' async='async'></script>",
    "<script type='text/javascript'>
		var googletag = googletag || {};
		googletag.cmd = googletag.cmd || [];
		(function() {
		var gads = document.createElement('script');
		gads.async = true;
		gads.type = 'text/javascript';
		var useSSL = 'https:' == document.location.protocol;
		gads.src = (useSSL ? 'https:' : 'http:') + 
		'//www.googletagservices.com/tag/js/gpt.js';
		var node = document.getElementsByTagName('script')[0];
		node.parentNode.insertBefore(gads, node);
		})();
	</script>

	<script type='text/javascript'>
		googletag.cmd.push(function() {
		googletag.defineSlot('/22885534/Sidebar', [120, 600], 'div-gpt-ad-1394820988908-0').addService(googletag.pubads());
		googletag.pubads().enableSingleRequest();
		googletag.enableServices();
		});
	</script>",
	
	"<script type='text/javascript'>
		var googletag = googletag || {};
		googletag.cmd = googletag.cmd || [];
		(function() {
			var gads = document.createElement('script');
			gads.async = true;
			gads.type = 'text/javascript';
			var useSSL = 'https:' == document.location.protocol;
			gads.src = (useSSL ? 'https:' : 'http:') + 
			'//www.googletagservices.com/tag/js/gpt.js';
			var node = document.getElementsByTagName('script')[0];
			node.parentNode.insertBefore(gads, node);
		})();
	</script>
	<script type='text/javascript'>
		googletag.cmd.push(function() {
		googletag.defineSlot('/22885534/Wide-Responsive', [[160, 600], [300, 250], [300, 600]], 'div-gpt-ad-1421837453414-0').addService(googletag.pubads());
		googletag.pubads().enableSingleRequest();
		googletag.enableServices();
		});
	</script>",
	
	"<script type='text/javascript'>
		var userId = mw.config.get( 'wgUserId' );
		ga('set', '&uid', userId ); // Set the user ID using signed-in user_id.
	</script>",
	
	// Change link of logo to university home page, or main page, or leave if not logged in.
	"<script type='text/javascript'>
		$(document).ready(function(){
			var userId = mw.config.get( 'wgUserId' );
			
			if (userId != null) {	// If user isn't logged in, don't change link
				var universityURL = mw.config.get( 'wgUniversityURL' );
				
				var logo = document.getElementById('p-logo');
				var anchor = logo.getElementsByTagName('a');
				anchor[0].setAttribute('href', '/wiki/index.php/' + universityURL);
			}
		});
	</script>",
	
	"<script type='text/javascript'>
		ga('send', 'pageview');	// Send page view to analytics
	</script>"
    );

$wgPCRguii_Inserts['SkinBuildSidebar']['on'] = true;
 
$wgPCRguii_Inserts['SkinBuildSidebar']['content'] = array
	(
		array("","<div id='div-gpt-ad-1394820988908-0' style='width:120px; height:600px;'>
			<script type='text/javascript'>
				googletag.cmd.push(function() { googletag.display('div-gpt-ad-1394820988908-0'); });
			</script>
		</div>")
	);