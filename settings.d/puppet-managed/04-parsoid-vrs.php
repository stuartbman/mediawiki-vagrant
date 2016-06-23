<?php
// MediaWiki settings for parsoid-vrs.
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

$wgVirtualRestConfig['modules']['parsoid'] = array(
	'url' => 'http://localhost:8000',
	'domain' => 'dev.wiki.local.wmftest.net',
	'forwardCookies' => true,
	'restbaseCompat' => false
);



