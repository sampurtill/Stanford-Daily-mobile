<?php
error_reporting(E_ALL);

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

set_include_path(
    '.'
    . PATH_SEPARATOR . APP_ROOT . '/includes/simplepie'
);

// === HELPER =========================================================

function isWindows() {
    return substr(PHP_OS, 0, 3) == 'WIN';
}

function isCLI() {
    return php_sapi_name() == 'cli';
}

function isCGI() {
    return php_sapi_name() == 'cgi';
}

// We do not use PHP's dirname() function, it has strange side effects
function getDirName($sPath) {W
    $sPath = str_replace('\\', '/', $sPath);
    return substr($sPath, 0, strrpos($sPath, '/'));
}
?>