<?php
// MediaWiki settings for CodeEditor.
// This file is managed by Puppet.
// This file is managed by Puppet
// See puppet/modules/mediawiki/templates/extension.php.erb

// Load extension unless explictly disabled
if ( !isset( $wmvExtensions['CodeEditor'] ) ||
	$wmvExtensions['CodeEditor'] === true
) {
	if ( class_exists( 'ExtensionRegistry' ) &&
		file_exists( "$IP/extensions/CodeEditor/extension.json" )
	) {
		wfLoadExtension( 'CodeEditor' );
	} elseif ( file_exists( "$IP/extensions/CodeEditor/CodeEditor.php" ) ) {
		include_once "$IP/extensions/CodeEditor/CodeEditor.php";
	}

	// Keep track of what extensions are loaded to make `wikihasextension` work
	// Why in the hell doesn't MediaWiki already do this for us?
	$wmvActiveExtensions[] = 'CodeEditor';


}
