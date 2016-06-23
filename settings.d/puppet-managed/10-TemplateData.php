<?php
// MediaWiki settings for TemplateData.
// This file is managed by Puppet.
// This file is managed by Puppet
// See puppet/modules/mediawiki/templates/extension.php.erb

// Load extension unless explictly disabled
if ( !isset( $wmvExtensions['TemplateData'] ) ||
	$wmvExtensions['TemplateData'] === true
) {
	if ( class_exists( 'ExtensionRegistry' ) &&
		file_exists( "$IP/extensions/TemplateData/extension.json" )
	) {
		wfLoadExtension( 'TemplateData' );
	} elseif ( file_exists( "$IP/extensions/TemplateData/TemplateData.php" ) ) {
		include_once "$IP/extensions/TemplateData/TemplateData.php";
	}

	// Keep track of what extensions are loaded to make `wikihasextension` work
	// Why in the hell doesn't MediaWiki already do this for us?
	$wmvActiveExtensions[] = 'TemplateData';

$wgTemplateDataUseGUI = true;
}
