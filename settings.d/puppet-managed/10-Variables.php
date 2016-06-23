<?php
// MediaWiki settings for Variables.
// This file is managed by Puppet.
// This file is managed by Puppet
// See puppet/modules/mediawiki/templates/extension.php.erb

// Load extension unless explictly disabled
if ( !isset( $wmvExtensions['Variables'] ) ||
	$wmvExtensions['Variables'] === true
) {
	if ( class_exists( 'ExtensionRegistry' ) &&
		file_exists( "$IP/extensions/Variables/extension.json" )
	) {
		wfLoadExtension( 'Variables' );
	} elseif ( file_exists( "$IP/extensions/Variables/Variables.php" ) ) {
		include_once "$IP/extensions/Variables/Variables.php";
	}

	// Keep track of what extensions are loaded to make `wikihasextension` work
	// Why in the hell doesn't MediaWiki already do this for us?
	$wmvActiveExtensions[] = 'Variables';


}
