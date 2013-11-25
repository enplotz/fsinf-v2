<footer class="content-info container" role="contentinfo">
  <div class="row">
    <div class="col-lg-12">
      <?php dynamic_sidebar('sidebar-footer'); ?>
      <!-- <p>&copy; <?php echo date('Y'); ?>  </p> -->
      <p class="copy">&copy; <?php echo date('Y'); ?> Fachschaft Informatik, Universität Konstanz ·
<?php
        $data = json_decode(file_get_contents(WP_DOOR_URL), TRUE);
?>
      <span>
      Raum: E225
      </span>
<?php if ($data["code"] == 0) : ?>
      <span style='color: #009933;' title='<?php echo $data["message"] ?>' class="glyphicon glyphicon-thumbs-up"></span>
<?php else: ?>
      <span style='color: #FF3300;' title='<?php echo $data["message"] ?>' class="glyphicon glyphicon-thumbs-down"></span>
<?php endif; ?>
       · Email: fachschaft (at) inf.uni-konstanz.de · Telefon: 07531-88-3538 · <span class="footer-admin"><a href="<?php echo admin_url(); ?>">admin</a></span>
    </p>
  </footer>
    </div>
  </div>
</footer>

<?php wp_footer(); ?>