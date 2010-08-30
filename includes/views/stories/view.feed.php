<?php if (isset($GLOBALS['sWeather'])) { ?>
  <div id="weather">
    <?php echo $GLOBALS['sWeather']; ?> at Stanford, CA
  </div>
<?php } ?>
<div id="content">
  <?php $i = 0; ?>
  <?php foreach($GLOBALS['aStories'] as $aStory) { ?>
    <div class="story_title"><a href="<?php echo $aStory['local_uri']; ?>"><?php echo escape($aStory['title']); ?></a></div>
    <div class="author">
      <?php foreach($aStory['authors'] as $aAuthor) { ?>
        <?php echo escape($aAuthor->name); ?>
      <?php } ?>
    </div>
    <?php if ($i < 5) { ?>
      <div class="description"><?php echo escape($aStory['description']); ?></div>
    <?php } ?>
    <?php $i++; ?>
  <?php } ?>
</div>