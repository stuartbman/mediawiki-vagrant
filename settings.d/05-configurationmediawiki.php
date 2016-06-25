<?php
// MediaWiki settings 

## Prevent new user registrations except by sysops
//$wgGroupPermissions['*']['createaccount'] = false;
//$wgGroupPermissions['user']['read'] = false;

$wgGroupPermissions['*'            ]['edit'] = false;
$wgGroupPermissions['autoconfirmed']['edit'] = true;
$wgGroupPermissions['*'            ]['skipcaptcha'] = false;
$wgGroupPermissions['user'         ]['skipcaptcha'] = true;
$wgGroupPermissions['autoconfirmed']['skipcaptcha'] = true;
$wgGroupPermissions['emailconfirmed']['skipcaptcha'] = true;
$wgGroupPermissions['bot'          ]['skipcaptcha'] = true; // registered bots
$wgGroupPermissions['sysop'        ]['skipcaptcha'] = true;
$ceAllowConfirmedEmail = true;
$wgAutoConfirmAge = 86400 * 10; # Four days times 86400 seconds/day


/* Change the main page url used in things like the logo to an absolute url */
$wgHooks['SkinTemplateOutputPageBeforeExec'][] = 'lfChangeMainPageURL';
function lfChangeMainPageURL( $sk, &$tpl ) {
	$tpl->data['nav_urls']['mainpage']['href'] = "/redirect.php"; // Point the main page url to the check signed in screen
	return true;
}

#Add contribution credits for most recent 2 users on each page
$wgMaxCredits=2;

##Bootswatch Theme
$wgDefaultSkin = "chameleon";
$egChameleonExternalStyleModules = array(
	__DIR__ . '/chameleon-custom/variables.less' => $wgScriptPath,
    __DIR__ . '/chameleon-custom/bootswatch.less' => $wgScriptPath,
);
$egChameleonLayoutFile= __DIR__ . '/chameleon-custom/modclean.xml';


