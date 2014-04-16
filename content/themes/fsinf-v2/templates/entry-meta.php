<!-- <time class="published" datetime="<?php echo get_the_time('c'); ?>"><?php echo get_the_date(); ?></time>
<p class="byline author vcard"><?php echo __('By', 'roots'); ?> <a href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>" rel="author" class="fn"><?php echo get_the_author(); ?></a></p>
 -->

 <p class="meta text-muted text-uppercase">
<span class="glyphicon glyphicon-calendar"></span> <time datetime="<?php echo get_the_time('c'); ?>" pubdate="" data-updated=""><?php echo get_the_date(); ?></time>
<?php echo __('by', 'roots'); ?>
<!-- <span class="glyphicon glyphicon-user"></span> --> <span class="byline author vcard"><a  href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>" rel="author" class="fn"><?php echo get_the_author(); ?></a></span>
</p>