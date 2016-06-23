<?php
// MediaWiki settings for Cite.
// This file is managed by Puppet.
// This file is managed by Puppet
// See puppet/modules/mediawiki/templates/extension.php.erb

// Load extension unless explictly disabled
if ( !isset( $wmvExtensions['Cite'] ) ||
	$wmvExtensions['Cite'] === true
) {
	if ( class_exists( 'ExtensionRegistry' ) &&
		file_exists( "$IP/extensions/Cite/extension.json" )
	) {
		wfLoadExtension( 'Cite' );
	} elseif ( file_exists( "$IP/extensions/Cite/Cite.php" ) ) {
		include_once "$IP/extensions/Cite/Cite.php";
	}

	// Keep track of what extensions are loaded to make `wikihasextension` work
	// Why in the hell doesn't MediaWiki already do this for us?
	$wmvActiveExtensions[] = 'Cite';

$wgCiteEnablePopups = true;
}
