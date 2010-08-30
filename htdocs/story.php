<?php
require_once '../environment.php';

$sFeedUri = 'http://www.stanforddaily.com/feed/';

$aGetVars = array('y', 'm', 'd', 'title');

foreach($_GET as $sKey => $sValue) {
    if (!in_array($sKey, $aGetVars)) {
        echo $sValue; exit();
        redirect_to('/');
    }
}

// create the string that we need to find!
$sNeedle = '/' . $_GET['y'] . '/' . $_GET['m'] . '/' . $_GET['d'] . '/' . $_GET['title'] .'/';

$SimplePie = new SimplePie();
$SimplePie->enable_cache(false);
$SimplePie->set_feed_url($sFeedUri);
$SimplePie->init();
$SimplePie->handle_content_type();

if ($SimplePie->error()) {
    // TODO: Delete that feed??
    $SimplePie->__destruct();
    continue;
}

foreach($SimplePie->get_items() as $oItem) {
    $nTimestamp = strtotime($oItem->get_date());
    $sLink      = $oItem->get_permalink();

    // now get rid of the http://www.stanforddaily.com stuff
    $sLocalUri = mb_substr($sLink, 28);

    if ($sNeedle == $sLocalUri) {
        $aStory = array(
            'title'        => $oItem->get_title(), 
            'authors'      => $oItem->get_authors(), 
            'content'      => $oItem->get_content(), 
            'url'          => $sLink, 
            'local_uri'    => $sLocalUri,
            'published_at' => $nTimestamp
        );

        break;
    }
}

$SimplePie->__destruct();
unset($SimplePie);

if (!isset($aStory)) {
    redirect_to('/');
}

$GLOBALS['aStory'] = $aStory;

render_page($aStory['title'], 'stories/view.story.php');

?>