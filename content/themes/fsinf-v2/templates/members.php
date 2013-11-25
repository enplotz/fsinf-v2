<?php
/*
Template Name: Members
*/
get_template_part('templates/page', 'header'); ?>
<?php get_template_part('templates/content', 'page'); ?>

<?php
add_filter('get_avatar','change_avatar_css');

function change_avatar_css($class) {
  $class = str_replace("class='avatar", "class='author_gravatar dp img-circle ", $class) ;
  return $class;
}
?>

<!-- Authors Details here -->
<?php
  $user_fields = array(
                    'user_login',
                    'user_nicename',
                    'user_email',
                    'user_url',
                    'semester',
                    'job_in_fs'
                  );
  $capabilities_query = array(
    'meta_query' => array(
      'relation' => 'OR',
      array(
        'key'     => 'wp_capabilities',
        'value'   => 'administrator',
        'compare' => 'LIKE'
      ),
      array(
        'key'     => 'wp_capabilities',
        'value'   => 'fs_mitglied',
        'compare' => 'LIKE'
      ),
      array(
        'key'     => 'wp_capabilities',
        'value'   => 'fs_manager',
        'compare' => 'LIKE'
      )
    ),
    'fields' => 'all_with_meta'
   );
  $user_query = new WP_User_Query($capabilities_query);
  $fs = $user_query->results;
  // Set default avatar (values = default, wavatar, identicon, monsterid)
  $avatar = 'wavatar';
?>

<?php
  foreach($fs as $member):
    //var_dump($member);
?>
    <div class="row">
    <div class="col-lg-12">
        <div class="media media-profile">
        <?php
    // Get link to author page
    $user_link = get_author_posts_url($member->ID);
?>
            <a class="pull-left" href='<?= $user_link ?>'>
                <?php echo get_avatar($member->user_email, '100', $avatar); ?>
            </a>
            <div class="media-body">
                <h4 class="media-heading">
<?php if($member->user_url != ""): ?>
                    <a title ='Website' href='<?= $member->user_url ;?>'>
                      <span class="glyphicon glyphicon-globe"></span>
                      </a>
<?php endif; ?>
                  <?= $member->display_name; ?>
                  <small>
<?php if($member->get('semester') != ""): ?>
                  <span class="label label-default"><?= $member->get('semester')?>. Semester</span>
<?php endif; ?>
                  </small>
                </h4>
                <h5><?= $member->get('job_in_fs'); ?></h5>
                <hr style="margin:8px auto">
                <p><?= $member->get('description'); ?>
                </p>
            </div><!-- media-body -->
        </div> <!-- media -->
    </div> <!-- col-lg-12 -->
</div>
<?php
//   if(constant("WP_DEBUG")){
//     if( $all_meta_for_user = get_user_meta( $member->ID ) )
//       array_map( function( $a ){ return $a[0]; }, get_user_meta( $curauth->ID ) );

//     print_r( $all_meta_for_user );
//   }
?>
<?php
  endforeach;
?>
        <!-- END Authors Details -->