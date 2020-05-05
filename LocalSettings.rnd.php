<?php

$wgSitename = 'Sun* R&D Wiki';
$wgMetaNamespace = 'Sun*_R&D_Wiki';

$wgScriptPath = '';

// HD logo
$wgLogoHD = [
    '2x' => "$wgResourceBasePath/resources/assets/wiki_2x.png",
];

// Favicon
$wgFavicon = "$wgScriptPath/resources/assets/favicon.ico";
$wgAppleTouchIcon = "$wgScriptPath/resources/assets/apple-touch-icon.png";

// Session
$wgSessionCacheType = CACHE_DB;
$wgObjectCacheSessionExpiry = 30 * 86400;

// Turn on uploads
$wgEnableUploads = false;

// Pages without auth required
$wgWhitelistRead = [
    'Special:CreateAccount',
    'Special:UserLogin',
    'Special:GoogleLoginReturn',
];

// Permissions
$wgGroupPermissions['*']['autocreateaccount'] = true;
$wgGroupPermissions['sysop']['createaccount'] = true;

$wgGroupPermissions['*']['read'] = false;
$wgAuthManagerAutoConfig['primaryauth'] = [];

//Enabled built-in extensions
wfLoadExtension('CiteThisPage');
wfLoadExtension('Renameuser');
wfLoadExtension('MultimediaViewer');
wfLoadExtension('TextExtracts');
wfLoadExtension('PageImages');

// GoogleLogin
wfLoadExtension('GoogleLogin');

$wgGLAppId = null;
$wgGLSecret = null;

$wgGroupPermissions['sysop']['Managegooglelogindomains'] = true ;
$wgGLAuthoritativeMode = true;
$wgGLAllowedDomains = ['sun-asterisk.com'];
$wgGLAllowedDomainsStrict = true;

// WikiEditor
wfLoadExtension('WikiEditor');

$wgHiddenPrefs[] = 'usebetatoolbar';

// PagesList
require_once "$IP/extensions/PagesList/PagesList.php";

$wgPagesListShowLastUser = true;
$wgPagesListShowLastModification = true;
$wgPagesListDataTablesOptions = [
    'iDisplayLength' => 20,
];

// More extensions
wfLoadExtension('CommonsMetadata');
wfLoadExtension('NewestPages');
wfLoadExtension('EmbedVideo');

// Popup previews
wfLoadExtension('Popups');

$wgPopupsHideOptInOnPreferencesPage = true;
$wgPopupsOptInDefaultState = '1';