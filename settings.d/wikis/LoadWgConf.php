<?php
// This file is managed by Puppet.
// See puppet/modules/mediawiki/templates/multiwiki/LoadWgConf.php.erb

// Globals that are populated by *dbConf.php
/** @var array $wgLocalDatabases List of all wikis in this wiki farm */
$wgLocalDatabases = array();
/** @var array $wgCentralAuthAutoLoginWikis Dict of wiki_name => db_name */
$wgCentralAuthAutoLoginWikis = array();
/** @var array $wgMediawikiRoot Dict of db_name => src_dir */
$wgMediawikiRoot = array();

foreach ( glob( '/vagrant/settings.d/wikis/dbConf/*dbConf.php' ) as $file ) {
	// Use require rather than require_once as something in the request may have
	// loaded the dbConf files previously.
	require $file;
}

$wgConf->wikis = $wgLocalDatabases;
$wgConf->suffixes = $wgLocalDatabases;

/**
 * siteParamsCallback
 */
function efGetSiteParams( $conf, $wiki ) {
	$site = null;
	$lang = null;
	foreach( $conf->suffixes as $suffix ) {
		if ( substr( $wiki, -strlen( $suffix ) ) == $suffix ) {
			$site = $suffix;
			$lang = substr( $wiki, 0, -strlen( $suffix ) );
			break;
		}
	}
	return array(
		'suffix' => $site,
		'lang' => $lang,
		'params' => array(
			'lang' => $lang,
			'site' => $site,
			'wiki' => $wiki,
		),
		'tags' => array(),
	);
}
$wgConf->siteParamsCallback = 'efGetSiteParams';

$wgConf->settings=array(
	'wgServer' => array(
		'default' => "//dev.wiki.local.wmftest.net:8080",
	),
	'wgCanonicalServer' => array(
		'default' => "http://dev.wiki.local.wmftest.net:8080",
	),
	'wgArticlePath' => array(
		'default' => '/wiki/$1',
	),
	'wgScriptPath' => array(
		'default' => '/w',
	),
	'wgLogo' => array(
		'default' => '/mediawiki-vagrant.png',
	),
	'wgSitename' => array(
		'default' => 'devwiki'
	),
	'wmvExtensions' => array(
		'default' => array(),
	),
);

// Load wgConf settings for all wikis
foreach ( glob( __DIR__ . '/*/wgConf.php' ) as $file) {
	require_once $file;
}
