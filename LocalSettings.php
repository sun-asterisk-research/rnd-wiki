<?php

// Protect against web entry
if (!defined('MEDIAWIKI')) {
    exit;
}

// Uncomment this to disable output compression
// $wgDisableOutputCompression = true;

$wgSitename = 'wiki';
$wgMetaNamespace = 'Wiki';

/**
 * The URL base path to the directory containing the wiki;
 * defaults for all runtime URL paths are based off of this.
 * For more information on customizing the URLs
 * (like /w/index.php/Page_title to /wiki/Page_title) please see:
 * https://www.mediawiki.org/wiki/Manual:Short_URL
 */
$wgScriptPath = '/wiki';

// The protocol and server name to use in fully-qualified URLs
$wgServer = false;

// The URL path to static resources (images, scripts, etc.)
$wgResourceBasePath = $wgScriptPath;

// The URL path to the logo.  Make sure you change this from the default,
// or else you'll overwrite your logo when you upgrade!
$wgLogo = "$wgResourceBasePath/resources/assets/wiki.png";

// UPO means: this is also a user preference option

$wgEnableEmail = true;
$wgEnableUserEmail = false; // UPO

$wgEmergencyContact = false;
$wgPasswordSender = false;
$wgNoReplyAddress = false;

$wgEnotifUserTalk = false; // UPO
$wgEnotifWatchlist = false; // UPO
$wgEmailAuthentication = true;

// Database settings
$wgDBtype = 'mysql';
$wgDBserver = 'mysql';
$wgDBname = 'mediawiki';
$wgDBuser = 'mediawiki';
$wgDBpassword = 'secret';

// MySQL specific settings
$wgDBprefix = '';

// MySQL table options to use during installation or update
$wgDBTableOptions = 'ENGINE=InnoDB, DEFAULT CHARSET=binary';

// Shared memory settings
$wgMainCacheType = CACHE_ACCEL;

$wgMemCachedServers = [];

/**
 * To enable image uploads, make sure the 'images' directory
 * is writable, then set this to true:
 */
$wgEnableUploads = true;
$wgUseImageMagick = true;
$wgImageMagickConvertCommand = '/usr/bin/convert';

// InstantCommons allows wiki to use images from https://commons.wikimedia.org
$wgUseInstantCommons = false;

/**
 * Periodically send a pingback to https://www.mediawiki.org/ with basic data
 * about this MediaWiki instance. The Wikimedia Foundation shares this data
 * with MediaWiki developers to help guide future development efforts.
 */
$wgPingback = false;

/*
 * If you use ImageMagick (or any other shell command) on a
 * Linux server, this will need to be set to the name of an
 * available UTF-8 locale
 */
$wgShellLocale = 'C.UTF-8';

/**
 * Set $wgCacheDirectory to a writable directory on the web server
 * to make your wiki go slightly faster. The directory should not
 * be publicly accessible from the web.
 */
$wgCacheDirectory = "$IP/cache";

// Site language code, should be one of the list in ./languages/data/Names.php
$wgLanguageCode = 'en';

$wgSecretKey = null;

// Changing this will log out all existing sessions.
$wgAuthenticationTokenVersion = '1';

// Site upgrade key. Must be set to a string (default provided) to turn on the
// web installer while LocalSettings.php is in place
$wgUpgradeKey = null;

/**
 * For attaching licensing metadata to pages, and displaying an
 * appropriate copyright notice / icon. GNU Free Documentation
 * License and Creative Commons licenses are supported so far.
 */
$wgRightsPage = null; // Set to the title of a wiki page that describes your license/copyright
$wgRightsUrl = null;
$wgRightsText = null;
$wgRightsIcon = null;

// Path to the GNU diff3 utility. Used for conflict resolution.
$wgDiff3 = '/usr/bin/diff3';

// Default skin. Use the internal symbolic
// names, ie 'vector', 'monobook':
$wgDefaultSkin = 'vector';

// Enabled skins.
wfLoadSkin('MonoBook');
wfLoadSkin('Timeless');
wfLoadSkin('Vector');

// Load extra config files
$userLocalSettings = glob('./LocalSettings.*.php');
foreach ($userLocalSettings as $file) {
    include_once $file;
}

// Load settings from env variables
foreach ($_ENV as $env => $value) {
    if (strpos($env, 'wg') === 0 && $value != '') {
        $$env = $value;
    }
}
