<?php
// MediaWiki settings for Vector.
// This file is managed by Puppet.
if ( class_exists( 'ExtensionRegistry' ) && file_exists( "$IP/skins/Vector/skin.json" ) ) {
	wfLoadSkin( 'Vector' );
} else {
	include_once "$IP/skins/Vector/Vector.php";
}




