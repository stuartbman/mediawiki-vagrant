<?php
// MediaWiki settings for Nuke.
// This file is managed by Puppet.
// This file is managed by Puppet
// See puppet/modules/mediawiki/templates/extension.php.erb

// Load extension unless explictly disabled
if ( !isset( $wmvExtensions['Nuke'] ) ||
	$wmvExtensions['Nuke'] === true
) {
	if ( class_exists( 'ExtensionRegistry' ) &&
		file_exists( "$IP/extensions/Nuke/extension.json" )
	) {
		wfLoadExtension( 'Nuke' );
	} elseif ( file_exists( "$IP/extensions/Nuke/Nuke.php" ) ) {
		include_once "$IP/extensions/Nuke/Nuke.php";
	}

	// Keep track of what extensions are loaded to make `wikihasextension` work
	// Why in the hell doesn't MediaWiki already do this for us?
	$wmvActiveExtensions[] = 'Nuke';


}
