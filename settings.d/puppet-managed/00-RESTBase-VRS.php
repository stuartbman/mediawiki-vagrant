<?php
// MediaWiki settings for RESTBase-VRS.
// This file is managed by Puppet.


if( !isset( $wgVirtualRestConfig ) ) {
	$wgVirtualRestConfig = array(
		'modules' => array(),
		'global' => array(
			'timeout' => 360,
			'forwardCookies' => false,
			'HTTPProxy' => null
		)
	);
}

$wgVirtualRestConfig['modules']['restbase'] = array(
	'url' => 'http://127.0.0.1:7231',
	'domain' => 'dev.wiki.local.wmftest.net',
	'forwardCookies' => true,
	'parsoidCompat' => false
);



