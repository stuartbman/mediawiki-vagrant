<?php
// This file is managed by Puppet.
// See puppet/modules/mediawiki/templates/wiki/wgConf.php.erb

$wgConf->settings['wgServer']['wiki'] = '//dev.wiki.local.wmftest.net:8080';
$wgConf->settings['wgCanonicalServer']['wiki'] = 'http://dev.wiki.local.wmftest.net:8080';
$wgConf->settings['wgArticlePath']['wiki'] = '/wiki/$1';
$wgConf->settings['wgScriptPath']['wiki'] = '/w';
$wgConf->settings['wgSitename']['wiki'] = 'devwiki';
$wgConf->settings['wgCacheDirectory']['wiki'] = '/var/cache/mediawiki/devwiki';
$wgConf->settings['wgFileCacheDirectory']['wiki'] = '/var/cache/mediawiki/devwiki';
$wgConf->settings['wgUploadDirectory']['wiki'] = '/srv/images';
$wgConf->settings['wgUploadPath']['wiki'] = '/images';
$wgConf->settings['wgDebugLogFile']['wiki'] = '/vagrant/logs/mediawiki-wiki-debug.log';

