<?php
// MediaWiki settings for ParserFunctions.
// This file is managed by Puppet.
// This file is managed by Puppet
// See puppet/modules/mediawiki/templates/extension.php.erb

// Load extension unless explictly disabled
if ( !isset( $wmvExtensions['ParserFunctions'] ) ||
	$wmvExtensions['ParserFunctions'] === true
) {
	if ( class_exists( 'ExtensionRegistry' ) &&
		file_exists( "$IP/extensions/ParserFunctions/extension.json" )
	) {
		wfLoadExtension( 'ParserFunctions' );
	} elseif ( file_exists( "$IP/extensions/ParserFunctions/ParserFunctions.php" ) ) {
		include_once "$IP/extensions/ParserFunctions/ParserFunctions.php";
	}

	// Keep track of what extensions are loaded to make `wikihasextension` work
	// Why in the hell doesn't MediaWiki already do this for us?
	$wmvActiveExtensions[] = 'ParserFunctions';


}
