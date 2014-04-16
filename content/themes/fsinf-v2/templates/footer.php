<!-- <footer class="content-info container" role="contentinfo">
  <div class="row">
    <div class="col-lg-8">
      <?php //dynamic_sidebar('sidebar-footer'); ?>
    </div>
  </div>
</footer> -->

<footer role="contentinfo"><div class="container">
    <p class="text-muted credits">
    <?php dynamic_sidebar('sidebar-footer'); ?>
  <small>
      <span class="credit">Powered by <a href="https://wordpress.org">Wordpress</a></span>,
      <span class="credit">theme by <a href="http://roots.io">roots</a></span>.
  </small>
</p>
</div>
</footer>
<?php wp_footer(); ?>