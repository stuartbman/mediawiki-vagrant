<?php
// MediaWiki settings for SyntaxHighlight GeSHi.
// This file is managed by Puppet.
// This file is managed by Puppet
// See puppet/modules/mediawiki/templates/extension.php.erb

// Load extension unless explictly disabled
if ( !isset( $wmvExtensions['SyntaxHighlight_GeSHi'] ) ||
	$wmvExtensions['SyntaxHighlight_GeSHi'] === true
) {
	if ( class_exists( 'ExtensionRegistry' ) &&
		file_exists( "$IP/extensions/SyntaxHighlight_GeSHi/extension.json" )
	) {
		wfLoadExtension( 'SyntaxHighlight_GeSHi' );
	} elseif ( file_exists( "$IP/extensions/SyntaxHighlight_GeSHi/SyntaxHighlight_GeSHi.php" ) ) {
		include_once "$IP/extensions/SyntaxHighlight_GeSHi/SyntaxHighlight_GeSHi.php";
	}

	// Keep track of what extensions are loaded to make `wikihasextension` work
	// Why in the hell doesn't MediaWiki already do this for us?
	$wmvActiveExtensions[] = 'SyntaxHighlight_GeSHi';


}
