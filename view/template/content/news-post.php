<?php Response::setMetaDescription(htmlspecialchars($post->getContentText(20, true))) ?>
<?php Response::addMetaImages($post->getImageUrls()) ?>
<?php NavActions::setNavUri('/news') ?>

<main class="news ancillary">
    <?php $bgStyle = '' ?>
    <?php if ($post->getCover()): ?>
        <?php $bgStyle = preg_match('/https?:\//', $post->getCover()) ?
            ' style="background-image: url(\'' . $post->getCover() . '\')"' :
            ' style="background-image: url(\'/img/blog-covers/' . $post->getCover() . '\')"' ?>
    <?php endif ?>
  <section class="hero hero--news<?php echo $post->getCover() ? '' : ' hero--half-height'?>" <?php echo $bgStyle ?>>
    <div class="inner-wrap inner-wrap--center-hero">
      <h1><?php echo nl2br(htmlentities($post->getTitle())) ?></h1>
      <h2>
        <?php echo $post->getAuthorName() ?>
        <?php echo $post->hasAuthor() && $post->hasDate() ? '&bull;' : '' ?>
        <?php if ($post->hasDate()): ?>
          <span title="<?php echo $post->getDate()->format('F jS, Y') ?>"><?php echo $post->getDate()->format('M j Y') ?></span>
        <?php endif ?>
      </h2>
    </div>
  </section>

  <section>
    <div class="inner-wrap">
      <?php echo $post->getContentHtml() ?>
      <?php echo View::render('content/_postNav', ['post' => $post]) ?>
      <!--/ <?php echo View::render('content/_postSocialShare', ['post' => $post]) ?> /-->
    </div>
  </section>

  <?php if ($post->hasAuthor()): ?>
    <?php echo View::render('content/_postAuthor', ['post' => $post]) ?>
  <?php endif ?>

  <!--/
  <section>
    <div class="inner-wrap">
      <?php echo View::render('nav/_learnFooter') ?>
    </div>
  </section>
  /-->
</main>
