<?php
  $aStory = $GLOBALS['aStory'];
?>

<div id="title"><?php echo $aStory['title']; ?></div>

<div class="author">
  By 
  <?php foreach($aStory['authors'] as $aAuthor) { ?>
    <?php echo $aAuthor->name; ?>
  <?php } ?>
</div>

<div class="published_at">
  Published on <?php echo strftime('%B %d, %Y at %I:%M %p', $aStory['published_at']); ?>
</div>

<div class="story">
  <?php echo $aStory['content']; ?>
</div>

<div class="back_to_home">
  <a href="/">&lt;&lt; Back to Home Page</a> | <a href="<?php echo $aStory['url']; ?>">View story on StanfordDaily.com</a>
</div>