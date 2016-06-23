<?php
// MediaWiki settings for Scribunto.
// This file is managed by Puppet.
// This file is managed by Puppet
// See puppet/modules/mediawiki/templates/extension.php.erb

// Load extension unless explictly disabled
if ( !isset( $wmvExtensions['Scribunto'] ) ||
	$wmvExtensions['Scribunto'] === true
) {
	if ( class_exists( 'ExtensionRegistry' ) &&
		file_exists( "$IP/extensions/Scribunto/extension.json" )
	) {
		wfLoadExtension( 'Scribunto' );
	} elseif ( file_exists( "$IP/extensions/Scribunto/Scribunto.php" ) ) {
		include_once "$IP/extensions/Scribunto/Scribunto.php";
	}

	// Keep track of what extensions are loaded to make `wikihasextension` work
	// Why in the hell doesn't MediaWiki already do this for us?
	$wmvActiveExtensions[] = 'Scribunto';

$wgScribuntoEngineConf["luasandbox"]["profilerPeriod"] = false;
$wgScribuntoDefaultEngine = "luasandbox";
$wgScribuntoUseGeSHi      = true;
$wgScribuntoUseCodeEditor = true;
}
