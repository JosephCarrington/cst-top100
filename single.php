<?php get_header(); ?>
<div class="container-wrap">
  <div class="container main-content">
    <?php if(have_posts()) : while(have_posts()) : the_post(); ?>
      <div class="clinician">
        <div class="main-info">
          <div class="name-and-creds">
            <div class="name">
              <h2><?php the_title();
                $creds = wp_get_post_terms(get_the_ID(), 'credential');
                $x = 1;
                foreach($creds as $cred) {
                  if($x == 1) {
                    echo ", ";
                  }
                  echo($cred->name);
                  if($x < count($creds)) {
                    echo(', ');
                  }
                  $x ++;
                } ?>
              </h2>
            </div>
          </div>
          <div class="location">
            <?php $locations = wp_get_post_terms(get_the_ID(), 'state-city');
            $x = 1;
            foreach($locations as $location) {
              echo($location->name);
              if($x < count($locations)) {
                echo(', ');
              }
              $x ++;
            } ?>
          </div>
        </div>
        <div class="details-wrapper">
          <div class="details">
            <div class="headshot">
              <?php if(has_post_thumbnail()) {
                the_post_thumbnail();
              } ?>
            </div>
            <div class="blurb">
              <h3><?php echo(__('About', 'clinician')); ?> <?php the_title(); ?></h3>
              <?php the_content(); ?>
            </div>
            <div class="other-details">
              <?php echo(get_post_meta(get_the_ID(), 'wpcf-other-details', true)); ?>
            </div>
          </div>
          <div class="connect-and-photos">
            <div class="header">
              <h3><?php echo(__('Connect with', 'clinician')); ?> <?php the_title(); ?></h3>
              <div><?php echo(get_post_meta(get_the_ID(), 'wpcf-address', true)); ?></div>
              <div class="phone"><strong><?php echo(__('Ph', 'clinician')); ?>:</strong> <a href="tel:<?php echo(get_post_meta(get_the_ID(), 'wpcf-phone', true)); ?>"><?php echo(get_post_meta(get_the_ID(), 'wpcf-phone', true)); ?></a></div>
            </div>
            <?php
              $twitter = get_post_meta(get_the_ID(), 'wpcf-twitter', true);
              $linkedin = get_post_meta(get_the_ID(), 'wpcf-linkedin', true);
              $facebook = get_post_meta(get_the_ID(), 'wpcf-facebook', true);
              if($twitter != '' || $linkedin != '' || $facebook != '') {
                ?>
                <div class="social">
                  <?php if($twitter != '') {
                    ?>
                      <div class="twitter">
                        <a href="<?php echo $twitter; ?>">
                          <i class="fa fa-twitter" aria-hidden="true"></i>
                        </a>
                      </div>
                    <?php
                  }
                  ?>
                  <?php if($linkedin != '') {
                    ?>
                      <div class="linkedin">
                        <a href="<?php echo $linkedin; ?>">
                          <i class="fa fa-linkedin-square" aria-hidden="true"></i>
                        </a>
                      </div>
                    <?php
                  }
                  ?>

                  <?php if($facebook != '') {
                    ?>
                      <div class="facebook">
                        <a href="<?php echo $facebook; ?>">
                          <i class="fa fa-facebook-square" aria-hidden="true"></i>
                        </a>
                      </div>
                    <?php
                  }
                  ?>
                </div>
                <?php
              }

              $contact = get_post_meta(get_the_ID(), 'wpcf-contact-link', true);
              if($contact != '') {
                ?>
                <a class="contact" href="<?php echo($contact); ?>"><?php echo(__('Contact this clinician', 'clinician')); ?></a>
                <?php
              }
            ?>
            <div class="map">
              Map coming soon, Rachel
            </div>
            <?php
              $otherPhotos = get_post_meta(get_the_ID(), 'wpcf-additional-photos', false);
              if(count($otherPhotos) > 0) {
                ?>
                <div class="other-photos">
                  <h3><?php echo(__('Photos of', 'clinician')); ?> <?php the_title(); ?></h3>
                  <?php
                  foreach($otherPhotos as $photo) {
                    ?>
                    <img src="<?php echo $photo; ?>" alt="Photo of <?php the_title(); ?>" />
                    <?php
                  }
                  ?>
                </div>
                <?php
              }
            ?>
          </div>
        </div>
      </div>
    <?php endwhile; endif; ?>
  </div>
</div>
<?php get_footer(); ?>
