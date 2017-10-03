<?php /*
Plugin Name: CST: Top 100 Clinicians
Version: 0.0.1
Description: List the top 100 (or more! or less!) clinicians in a field, by state! Requires you to have set up the CPT and fields with some other plugin though.
Author: Joseph Carrington
Author URI: http://www.josephcarrington.com
*/
add_filter('single_template', function($single) {
  global $wp_query, $post;
  if($post->post_type == 'clinician') {
    add_action('wp_head', function() {
      // wp_enqueue_style('bootstrap_css', 'https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css');
      wp_enqueue_style('google_fonts', 'https://fonts.googleapis.com/css?family=Raleway:400,400i,700');
      wp_enqueue_style('fontawesome', 'https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css');
      wp_enqueue_style('cst_clinician', plugin_dir_url(__FILE__) . 'cst_clinician.css');

      // wp_enqueue_script('popper', 'https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js', ['jquery']);
      // wp_enqueue_script('bootstrap_js', 'https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js', ['jquery', 'popper']);
    });
    if(file_exists(plugin_dir_path(__FILE__) . 'single.php')) {
      return plugin_dir_path(__FILE__) . 'single.php';
    }
  }
});
