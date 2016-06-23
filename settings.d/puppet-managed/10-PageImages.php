<?php
// MediaWiki settings for PageImages.
// This file is managed by Puppet.
// This file is managed by Puppet
// See puppet/modules/mediawiki/templates/extension.php.erb

// Load extension unless explictly disabled
if ( !isset( $wmvExtensions['PageImages'] ) ||
	$wmvExtensions['PageImages'] === true
) {
	if ( class_exists( 'ExtensionRegistry' ) &&
		file_exists( "$IP/extensions/PageImages/extension.json" )
	) {
		wfLoadExtension( 'PageImages' );
	} elseif ( file_exists( "$IP/extensions/PageImages/PageImages.php" ) ) {
		include_once "$IP/extensions/PageImages/PageImages.php";
	}

	// Keep track of what extensions are loaded to make `wikihasextension` work
	// Why in the hell doesn't MediaWiki already do this for us?
	$wmvActiveExtensions[] = 'PageImages';


}
