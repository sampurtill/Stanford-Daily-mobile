<?php
function render_page($sTitle, $sPage, $sTemplate = 'default') {
    $sTemplateFile = $sPage;

    $sPageTitle = $sTitle . ' - ' . TITLE_POSTFIX;

    require 'layout/view.' . $sTemplate . '.php';
}

function escape($sStr) {
    $sStr = htmlspecialchars($sStr, ENT_QUOTES); //, 'UTF-8');
    return $sStr;
}

function redirect_to($sPath) {
        header('Location: ' . $sPath);
        exit();
    }

?>