<?php
// MediaWiki settings for TextExtracts.
// This file is managed by Puppet.
// This file is managed by Puppet
// See puppet/modules/mediawiki/templates/extension.php.erb

// Load extension unless explictly disabled
if ( !isset( $wmvExtensions['TextExtracts'] ) ||
	$wmvExtensions['TextExtracts'] === true
) {
	if ( class_exists( 'ExtensionRegistry' ) &&
		file_exists( "$IP/extensions/TextExtracts/extension.json" )
	) {
		wfLoadExtension( 'TextExtracts' );
	} elseif ( file_exists( "$IP/extensions/TextExtracts/TextExtracts.php" ) ) {
		include_once "$IP/extensions/TextExtracts/TextExtracts.php";
	}

	// Keep track of what extensions are loaded to make `wikihasextension` work
	// Why in the hell doesn't MediaWiki already do this for us?
	$wmvActiveExtensions[] = 'TextExtracts';


}
