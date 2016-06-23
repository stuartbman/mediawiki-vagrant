<?php
// MediaWiki settings for Citoid.
// This file is managed by Puppet.
// This file is managed by Puppet
// See puppet/modules/mediawiki/templates/extension.php.erb

// Load extension unless explictly disabled
if ( !isset( $wmvExtensions['Citoid'] ) ||
	$wmvExtensions['Citoid'] === true
) {
	if ( class_exists( 'ExtensionRegistry' ) &&
		file_exists( "$IP/extensions/Citoid/extension.json" )
	) {
		wfLoadExtension( 'Citoid' );
	} elseif ( file_exists( "$IP/extensions/Citoid/Citoid.php" ) ) {
		include_once "$IP/extensions/Citoid/Citoid.php";
	}

	// Keep track of what extensions are loaded to make `wikihasextension` work
	// Why in the hell doesn't MediaWiki already do this for us?
	$wmvActiveExtensions[] = 'Citoid';

$wgCitoidServiceUrl = "//$wgServerName:1970/api";
}
