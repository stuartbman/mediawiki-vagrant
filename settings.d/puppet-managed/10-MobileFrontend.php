<?php
// MediaWiki settings for MobileFrontend.
// This file is managed by Puppet.
// This file is managed by Puppet
// See puppet/modules/mediawiki/templates/extension.php.erb

// Load extension unless explictly disabled
if ( !isset( $wmvExtensions['MobileFrontend'] ) ||
	$wmvExtensions['MobileFrontend'] === true
) {
	if ( class_exists( 'ExtensionRegistry' ) &&
		file_exists( "$IP/extensions/MobileFrontend/extension.json" )
	) {
		wfLoadExtension( 'MobileFrontend' );
	} elseif ( file_exists( "$IP/extensions/MobileFrontend/MobileFrontend.php" ) ) {
		include_once "$IP/extensions/MobileFrontend/MobileFrontend.php";
	}

	// Keep track of what extensions are loaded to make `wikihasextension` work
	// Why in the hell doesn't MediaWiki already do this for us?
	$wmvActiveExtensions[] = 'MobileFrontend';

$wgMFAutodetectMobileView = true;
$wgMFEnableBeta = true;
$wgMFLogEvents = true;
$wgMFNearby = true;
}
