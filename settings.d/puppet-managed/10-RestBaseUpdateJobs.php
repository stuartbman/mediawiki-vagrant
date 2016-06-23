<?php
// MediaWiki settings for RestBaseUpdateJobs.
// This file is managed by Puppet.
// This file is managed by Puppet
// See puppet/modules/mediawiki/templates/extension.php.erb

// Load extension unless explictly disabled
if ( !isset( $wmvExtensions['RestBaseUpdateJobs'] ) ||
	$wmvExtensions['RestBaseUpdateJobs'] === true
) {
	if ( class_exists( 'ExtensionRegistry' ) &&
		file_exists( "$IP/extensions/RestBaseUpdateJobs/extension.json" )
	) {
		wfLoadExtension( 'RestBaseUpdateJobs' );
	} elseif ( file_exists( "$IP/extensions/RestBaseUpdateJobs/RestbaseUpdate.php" ) ) {
		include_once "$IP/extensions/RestBaseUpdateJobs/RestbaseUpdate.php";
	}

	// Keep track of what extensions are loaded to make `wikihasextension` work
	// Why in the hell doesn't MediaWiki already do this for us?
	$wmvActiveExtensions[] = 'RestBaseUpdateJobs';

$wgRestbaseDomain = "dev.wiki.local.wmftest.net";
$wgRestbaseServer = "http://127.0.0.1:7231";
}
