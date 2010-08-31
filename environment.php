<?php
error_reporting(E_ERROR | E_WARNING | E_PARSE);

define('APP_CONFIG_FILE_VERSION', 1);

define('APP_NAME', 'Stanford Daily Mobile');
define('APP_SESSION', 'daily_mobile');

define('APP_VERSION_MAJOR', '0');
define('APP_VERSION_MINOR', '1');
define('APP_VERSION_MICRO', '0');
define('APP_VERSION_PATCH', 'dev');

define('APP_RELEASE_NAME', '');
define('APP_VERSION_DATE', '');

define('APP_VERSION_STAMP', strtotime(APP_VERSION_DATE));

define('APP_VERSION', APP_VERSION_MAJOR . '.'
                    . APP_VERSION_MINOR . '.'
                    . APP_VERSION_MICRO . '-'
                    . APP_VERSION_PATCH);

define('APP_FULL_NAME', APP_NAME . ' ' . APP_VERSION);
define('APP_ROOT', getDirName(__FILE__));

define('TITLE_POSTFIX',    'The Stanford Daily Mobile');
define('META_DESCRIPTION', 'The Stanford Daily on your BlackBerry');

date_default_timezone_set('America/Los_Angeles');

set_include_path(
    '.'
    . PATH_SEPARATOR . APP_ROOT . '/includes/simplepie'
    . PATH_SEPARATOR . APP_ROOT . '/includes/core'
    . PATH_SEPARATOR . APP_ROOT . '/includes/views'
);

require_once 'simplepie.inc.php';
require_once 'core.funcs.php';

// === HELPER =========================================================

function getDirName($sPath) {
    $sPath = str_replace('\\', '/', $sPath);
    return substr($sPath, 0, strrpos($sPath, '/'));
}

function getRequestBasePath($sPath) {
    return substr($sPath, 0, strrpos($sPath, '/'));
}
?>