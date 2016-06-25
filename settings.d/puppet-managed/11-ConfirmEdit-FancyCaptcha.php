<?php
// MediaWiki settings for ConfirmEdit FancyCaptcha.
// This file is managed by Puppet.
require_once "$IP/extensions/ConfirmEdit/FancyCaptcha.php";
$wgCaptchaClass = "FancyCaptcha";
$wgCaptchaDirectory = "$IP/images/temp/captcha";
$wgCaptchaDirectoryLevels = 0;
$wgCaptchaSecret = "FOO";

