<?php
// This file is managed by Puppet.
// See puppet/modules/mediawiki/templates/wiki/wgConf.php.erb

$wgConf->settings['wgServer']['mobilewiki'] = '//mobile.wiki.local.wmftest.net:8080';
$wgConf->settings['wgCanonicalServer']['mobilewiki'] = 'http://mobile.wiki.local.wmftest.net:8080';
$wgConf->settings['wgArticlePath']['mobilewiki'] = '/wiki/$1';
$wgConf->settings['wgScriptPath']['mobilewiki'] = '/w';
$wgConf->settings['wgSitename']['mobilewiki'] = 'mobile';
$wgConf->settings['wgCacheDirectory']['mobilewiki'] = '/var/cache/mediawiki/mobile';
$wgConf->settings['wgFileCacheDirectory']['mobilewiki'] = '/var/cache/mediawiki/mobile';
$wgConf->settings['wgUploadDirectory']['mobilewiki'] = '/srv/mobileimages';
$wgConf->settings['wgUploadPath']['mobilewiki'] = '/mobileimages';
$wgConf->settings['wgDebugLogFile']['mobilewiki'] = '/vagrant/logs/mediawiki-mobilewiki-debug.log';

