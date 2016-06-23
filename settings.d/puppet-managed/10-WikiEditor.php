<?php
// MediaWiki settings for WikiEditor.
// This file is managed by Puppet.
// This file is managed by Puppet
// See puppet/modules/mediawiki/templates/extension.php.erb

// Load extension unless explictly disabled
if ( !isset( $wmvExtensions['WikiEditor'] ) ||
	$wmvExtensions['WikiEditor'] === true
) {
	if ( class_exists( 'ExtensionRegistry' ) &&
		file_exists( "$IP/extensions/WikiEditor/extension.json" )
	) {
		wfLoadExtension( 'WikiEditor' );
	} elseif ( file_exists( "$IP/extensions/WikiEditor/WikiEditor.php" ) ) {
		include_once "$IP/extensions/WikiEditor/WikiEditor.php";
	}

	// Keep track of what extensions are loaded to make `wikihasextension` work
	// Why in the hell doesn't MediaWiki already do this for us?
	$wmvActiveExtensions[] = 'WikiEditor';

$wgDefaultUserOptions["usebetatoolbar"] = 1;
$wgDefaultUserOptions["usebetatoolbar-cgd"] = 1;
}
