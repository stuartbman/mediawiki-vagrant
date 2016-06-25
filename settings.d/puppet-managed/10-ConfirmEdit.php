<?php
// MediaWiki settings for ConfirmEdit.
// This file is managed by Puppet.
// This file is managed by Puppet
// See puppet/modules/mediawiki/templates/extension.php.erb

// Load extension unless explictly disabled
if ( !isset( $wmvExtensions['ConfirmEdit'] ) ||
	$wmvExtensions['ConfirmEdit'] === true
) {
	if ( class_exists( 'ExtensionRegistry' ) &&
		file_exists( "$IP/extensions/ConfirmEdit/extension.json" )
	) {
		wfLoadExtension( 'ConfirmEdit' );
	} elseif ( file_exists( "$IP/extensions/ConfirmEdit/ConfirmEdit.php" ) ) {
		include_once "$IP/extensions/ConfirmEdit/ConfirmEdit.php";
	}

	// Keep track of what extensions are loaded to make `wikihasextension` work
	// Why in the hell doesn't MediaWiki already do this for us?
	$wmvActiveExtensions[] = 'ConfirmEdit';


}
