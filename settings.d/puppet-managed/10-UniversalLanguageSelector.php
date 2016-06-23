<?php
// MediaWiki settings for UniversalLanguageSelector.
// This file is managed by Puppet.
// This file is managed by Puppet
// See puppet/modules/mediawiki/templates/extension.php.erb

// Load extension unless explictly disabled
if ( !isset( $wmvExtensions['UniversalLanguageSelector'] ) ||
	$wmvExtensions['UniversalLanguageSelector'] === true
) {
	if ( class_exists( 'ExtensionRegistry' ) &&
		file_exists( "$IP/extensions/UniversalLanguageSelector/extension.json" )
	) {
		wfLoadExtension( 'UniversalLanguageSelector' );
	} elseif ( file_exists( "$IP/extensions/UniversalLanguageSelector/UniversalLanguageSelector.php" ) ) {
		include_once "$IP/extensions/UniversalLanguageSelector/UniversalLanguageSelector.php";
	}

	// Keep track of what extensions are loaded to make `wikihasextension` work
	// Why in the hell doesn't MediaWiki already do this for us?
	$wmvActiveExtensions[] = 'UniversalLanguageSelector';

$wgULSEnable = true;
}
