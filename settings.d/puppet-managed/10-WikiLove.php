<?php
// MediaWiki settings for WikiLove.
// This file is managed by Puppet.
// This file is managed by Puppet
// See puppet/modules/mediawiki/templates/extension.php.erb

// Load extension unless explictly disabled
if ( !isset( $wmvExtensions['WikiLove'] ) ||
	$wmvExtensions['WikiLove'] === true
) {
	if ( class_exists( 'ExtensionRegistry' ) &&
		file_exists( "$IP/extensions/WikiLove/extension.json" )
	) {
		wfLoadExtension( 'WikiLove' );
	} elseif ( file_exists( "$IP/extensions/WikiLove/WikiLove.php" ) ) {
		include_once "$IP/extensions/WikiLove/WikiLove.php";
	}

	// Keep track of what extensions are loaded to make `wikihasextension` work
	// Why in the hell doesn't MediaWiki already do this for us?
	$wmvActiveExtensions[] = 'WikiLove';

$wgWikiLoveGlobal = true;
}
