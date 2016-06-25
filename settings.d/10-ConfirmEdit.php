<?php
// MediaWiki settings for ConfirmEdit.
// See puppet/modules/mediawiki/templates/extension.php.erb

// Load extension unless explictly disabled

wfLoadExtensions( array( 'ConfirmEdit', 'ConfirmEdit/ReCaptchaNoCaptcha' ) );

$wgCaptchaClass = 'ReCaptchaNoCaptcha';
$wgReCaptchaSiteKey = '6LcpMvASAAAAACwsHoEh1nupALgL5fMFOTwCPis2';
$wgReCaptchaSecretKey = '6LcpMvASAAAAAFxqH0qCF7nC0a2ia0bnRYiR8PpD';

$wgCaptchaTriggers['edit']          = false; 
$wgCaptchaTriggers['create']        = false; 
$wgCaptchaTriggers['addurl']        = true; 
$wgCaptchaTriggers['createaccount'] = true;
$wgCaptchaTriggers['badlogin']      = true;