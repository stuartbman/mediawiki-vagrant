<?php
// MediaWiki settings for ConfirmEdit.
// This file is managed by Puppet.
// This file is managed by Puppet
// See puppet/modules/mediawiki/templates/extension.php.erb

// Load extension unless explictly disabled

wfLoadExtensions( array( 'ConfirmEdit', 'ConfirmEdit/ReCaptchaNoCaptcha' ) );

$wgCaptchaClass = 'ReCaptchaNoCaptcha';
$wgReCaptchaSiteKey = '6LcpMvASAAAAACwsHoEh1nupALgL5fMFOTwCPis2';
$wgReCaptchaSecretKey = '6LcpMvASAAAAAFxqH0qCF7nC0a2ia0bnRYiR8PpD';
