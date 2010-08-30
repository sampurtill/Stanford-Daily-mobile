<?php
require_once '../environment.php';

$sFeedUri = 'http://www.stanforddaily.com/feed/';

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

$GLOBALS['aStories'] = array();

$sFeedTitle = $SimplePie->get_title();

foreach($SimplePie->get_items() as $oItem) {
    $nTimestamp = strtotime($oItem->get_date());

    // Don't import posts from the "FUTURE"
    if ($nTimestamp > time()) {
        continue;
    }

    // Set vars
    $sTitle = $oItem->get_title();
    $sLink  = $oItem->get_permalink();
    
    // now get rid of the http://stanforddaily stuff
    $sLocalUri = mb_substr($sLink, 28);

    if (mb_strlen($sTitle) > 0) {
        $aStories[] = array(
            'title'        => $sTitle, 
            'authors'      => $oItem->get_authors(),
            'description'  => $oItem->get_description(), 
            'url'          => $sLink, 
            'local_uri'    => $sLocalUri,
            'published_at' => $nTimestamp
        );
    }
}

$SimplePie->__destruct();
unset($SimplePie);

$_GLOBAL['aStories'] = $aStories;

// #2: Get the weather
$sWeatherFeed = 'http://www.wunderground.com/auto/rss_full/CA/Palo_Alto.xml';

$SimplePie = new SimplePie();
$SimplePie->enable_cache(false);
$SimplePie->set_feed_url($sWeatherFeed);
$SimplePie->init();
$SimplePie->handle_content_type();

if ($SimplePie->error()) {
    // TODO: Delete that feed??
    $SimplePie->__destruct();
    continue;
}

$aWeather = $SimplePie->get_items();
foreach($aWeather as $oItem) {
    $sTitle = $oItem->get_title();

    if (stristr($sTitle, 'Current Condition')) {
        $GLOBALS['sWeather'] = mb_substr($sTitle, 21); break;
    }

    /*if (preg_match('/^Current Conditions : (-?[0-9]{1,3}[.][0-9])/', $sTitle, $aMatches)) {
        $GLOBALS['sCurrentTemp'] = $aMatches[1]; break;
    }*/
}

$SimplePie->__destruct();
unset($SimplePie);

render_page('Headlines', 'stories/view.feed.php');
?>