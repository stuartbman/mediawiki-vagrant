<?php
// MediaWiki settings for VisualEditor.
// This file is managed by Puppet.
// This file is managed by Puppet
// See puppet/modules/mediawiki/templates/extension.php.erb

// Load extension unless explictly disabled
if ( !isset( $wmvExtensions['VisualEditor'] ) ||
	$wmvExtensions['VisualEditor'] === true
) {
	if ( class_exists( 'ExtensionRegistry' ) &&
		file_exists( "$IP/extensions/VisualEditor/extension.json" )
	) {
		wfLoadExtension( 'VisualEditor' );
	} elseif ( file_exists( "$IP/extensions/VisualEditor/VisualEditor.php" ) ) {
		include_once "$IP/extensions/VisualEditor/VisualEditor.php";
	}

	// Keep track of what extensions are loaded to make `wikihasextension` work
	// Why in the hell doesn't MediaWiki already do this for us?
	$wmvActiveExtensions[] = 'VisualEditor';

// http://www.mediawiki.org/wiki/Extension:VisualEditor#Basic_setup_instructions
$wgVisualEditorAvailableNamespaces = [ NS_MAIN => true, NS_USER => true, NS_FILE => true ];
$wgVisualEditorUseSingleEditTab = true;
$wgDefaultUserOptions['visualeditor-enable'] = 1;
$wgVisualEditorParsoidURL = 'http://localhost:8000';

}
