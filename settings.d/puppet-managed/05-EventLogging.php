<?php
// MediaWiki settings for EventLogging.
// This file is managed by Puppet.
// This file is managed by Puppet
// See puppet/modules/mediawiki/templates/extension.php.erb

// Load extension unless explictly disabled
if ( !isset( $wmvExtensions['EventLogging'] ) ||
	$wmvExtensions['EventLogging'] === true
) {
	if ( class_exists( 'ExtensionRegistry' ) &&
		file_exists( "$IP/extensions/EventLogging/extension.json" )
	) {
		wfLoadExtension( 'EventLogging' );
	} elseif ( file_exists( "$IP/extensions/EventLogging/EventLogging.php" ) ) {
		include_once "$IP/extensions/EventLogging/EventLogging.php";
	}

	// Keep track of what extensions are loaded to make `wikihasextension` work
	// Why in the hell doesn't MediaWiki already do this for us?
	$wmvActiveExtensions[] = 'EventLogging';

$wgEventLoggingBaseUri = "//localhost:8080/event.gif";
}
