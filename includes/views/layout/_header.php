<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title><?php echo $sPageTitle; ?></title>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="description" content="<?php echo META_DESCRIPTION; ?>" />

<link rel="stylesheet" type="text/css" href="http://real.us.yimg.com/lib/yui/3.0.0/build/cssreset/reset-min.css" />
<link href="/style/daily.css" rel="stylesheet" type="text/css" />

<link rel="shortcut icon" href="/favicon.ico" type="image/vnd.microsoft.icon" />
<link rel="icon" href="/favicon.ico" type="image/vnd.microsoft.icon" />

<?php if (stristr($_SERVER['HTTP_USER_AGENT'], 'iPhone')) { ?>
  <meta name="viewport" content="width=300; initial-scale=1.0; maximum-scale=1.0; user-scalable=0;"/>
  <link media="only screen and (max-device-width: 480px)" rel="stylesheet" type="text/css" href="/style/iphone.css"/>
<?php } else if (stristr($_SERVER['HTTP_USER_AGENT'], 'BlackBerry')) { ?>
  <meta name="HandheldFriendly" content="true" />
  <meta name="viewport" content="width=device-width" />
<?php } ?>

</head>

<body>
<div id="logo"><a href="/"><img src="/images/daily_<?php echo (stristr($_SERVER['HTTP_USER_AGENT'], 'iPhone') ? 'bb' : 'med') . '.png'; ?>" align="center" alt="The Stanford Daily" /></a></div>