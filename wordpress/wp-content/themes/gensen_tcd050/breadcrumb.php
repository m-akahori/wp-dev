<?php
global $post, $dp_options, $custom_search_vars;
if ( ! $dp_options ) $dp_options = get_desing_plus_option();
?>
<div id="breadcrumb">
 <ul class="inner clearfix" itemscope itemtype="http://schema.org/BreadcrumbList">
  <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem" class="home"><a itemprop="item" href="<?php echo esc_url(home_url('/')); ?>"><span itemprop="name"><?php _e('Home', 'tcd-w'); ?></span></a><meta itemprop="position" content="1" /></li>

<?php if (is_search() || !empty( $custom_search_vars )) { ?>
  <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem" class="last"><span itemprop="name"><?php echo esc_html( $dp_options['search_results_headline'] ? $dp_options['search_results_headline'] : __( 'Search Results', 'tcd-w' ) ); ?></span><meta itemprop="position" content="2" /></li>

<?php } elseif (is_post_type_archive($dp_options['news_slug'])) { ?>
  <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem" class="last"><span itemprop="name"><?php echo esc_html($dp_options['news_breadcrumb_label']); ?></span><meta itemprop="position" content="2" /></li>

<?php } elseif (is_post_type_archive($dp_options['introduce_slug'])) { ?>
  <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem" class="last"><span itemprop="name"><?php echo esc_html($dp_options['introduce_breadcrumb_label']); ?></span><meta itemprop="position" content="2" /></li>

<?php } elseif (is_category()) { ?>
<?php
        if (!empty($queried_object->term_id)) {
          $ancestors = get_ancestors($queried_object->term_id, 'category', 'taxonomy');
          if ($ancestors) {
            foreach(array_reverse($ancestors) as $term) {
              $term = get_term_by('id', $term, 'category');
              if (!empty($term->term_id)) {
                echo '  <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a itemprop="item" href="'.get_term_link($term, 'category').'"><span itemprop="name">'.esc_html($term->name).'</span></a><meta itemprop="position" content="2" /></li>'."\n";
              }
            }
          }
        }
?>
  <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem" class="last"><span itemprop="name"><?php echo single_cat_title('', false); ?></span><meta itemprop="position" content="3" /></li>

<?php } elseif (is_tax($dp_options['introduce_tag_slug'])) { ?>
  <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem" class="last"><span itemprop="name"><?php echo single_tag_title('', false); ?></span><meta itemprop="position" content="2" /></li>

<?php } elseif (is_tag()) { ?>
  <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem" class="last"><span itemprop="name"><?php echo single_tag_title('', false); ?></span><meta itemprop="position" content="2" /></li>

<?php } elseif (is_tax()) { ?>
<?php
        if (!empty($queried_object->term_id)) {
          $ancestors = get_ancestors($queried_object->term_id, $queried_object->taxonomy, 'taxonomy');
          if ($ancestors) {
            foreach(array_reverse($ancestors) as $term) {
              $term = get_term_by('id', $term, $queried_object->taxonomy);
              if (!empty($term->term_id)) {
                echo '  <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a itemprop="item" href="'.get_term_link($term).'"><span itemprop="name">'.esc_html($term->name).'</span></a><meta itemprop="position" content="2" /></li>'."\n";
              }
            }
          }
        }
?>
  <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem" class="last"><span itemprop="name"><?php echo single_cat_title('', false); ?></span><meta itemprop="position" content="3" /></li>

<?php } elseif (is_day()) { ?>
  <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem" class="last"><span itemprop="name"><?php echo get_the_time(__('F jS, Y', 'tcd-w')); ?></span><meta itemprop="position" content="2" /></li>

<?php } elseif (is_month()) { ?>
  <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem" class="last"><span itemprop="name"><?php echo get_the_time(__('F, Y', 'tcd-w')); ?></span><meta itemprop="position" content="2" /></li>

<?php } elseif (is_year()) { ?>
  <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem" class="last"><span itemprop="name"><?php echo get_the_time(__('Y', 'tcd-w')); ?></span><meta itemprop="position" content="2" /></li>

<?php } elseif (is_author()) { ?>
  <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem" class="last"><span itemprop="name"><?php echo $queried_object->display_name; ?></span><meta itemprop="position" content="2" /></li>

<?php } elseif (is_home()) { ?>
  <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem" class="last"><span itemprop="name"><?php echo esc_html($dp_options['blog_breadcrumb_label']); ?></span><meta itemprop="position" content="2" /></li>

<?php } elseif (is_404()) { ?>
  <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem" class="last"><span itemprop="name"><?php _e("Sorry, but you are looking for something that isn't here.","tcd-w"); ?></span><meta itemprop="position" content="2" /></li>

<?php } elseif (is_singular($dp_options['news_slug'])) { ?>
  <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a itemprop="item" href="<?php echo get_post_type_archive_link($dp_options['news_slug']); ?>"><span itemprop="name"><?php echo esc_html($dp_options['news_breadcrumb_label']); ?></span></a><meta itemprop="position" content="2" /></li>
  <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem" class="last"><span itemprop="name"><?php the_title(); ?></span><meta itemprop="position" content="3" /></li>

<?php } elseif (is_singular($dp_options['introduce_slug'])) { ?>
  <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a itemprop="item" href="<?php echo get_post_type_archive_link($dp_options['introduce_slug']); ?>"><span itemprop="name"><?php echo esc_html($dp_options['introduce_breadcrumb_label']); ?></span></a><meta itemprop="position" content="2" /></li>
  <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem" class="last"><span itemprop="name"><?php the_title(); ?></span><meta itemprop="position" content="3" /></li>

<?php
      } elseif (is_single()) {
        if (get_post_type_archive_link('post') != get_bloginfo( 'url' )) {
          echo '  <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a itemprop="item" href="'.get_post_type_archive_link('post').'"><span itemprop="name">'.esc_html($dp_options['blog_breadcrumb_label']).'</span></a><meta itemprop="position" content="2" /></li>'."\n";
        } else {
          echo '  <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><span itemprop="name">'.esc_html($dp_options['blog_breadcrumb_label']).'</span><meta itemprop="position" content="2" /></li>'."\n";
        }

        if ($dp_options['show_categories']) {
          foreach(explode('-', $dp_options['show_categories']) as $cat) {
            if ($cat == 1) {
              $terms = get_the_terms(get_the_ID(), 'category');
              foreach ($terms as $term) { 
                echo '  <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a itemprop="item" href="'.get_term_link($term).'"><span itemprop="name">'.esc_html($term->name).'</span></a><meta itemprop="position" content="3" /></li>'."\n";
              }
              //echo get_the_term_list(get_the_ID(), 'category', '  <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">', ', ', '</li>'."\n");
            } elseif (!empty($dp_options['use_category'.$cat])) {
              $terms = get_the_terms(get_the_ID(), $dp_options['category'.$cat.'_slug']);
              if($terms){
                foreach ($terms as $term) { 
                  echo '  <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a itemprop="item" href="'.get_term_link($term).'"><span itemprop="name">'.esc_html($term->name).'</span></a><meta itemprop="position" content="3" /></li>'."\n";
                }
              }
              //echo get_the_term_list(get_the_ID(), $dp_options['category'.$cat.'_slug'], '  <li>', ', ', '</li>'."\n");
            }
          }
        } else {
          $terms = get_the_terms(get_the_ID(), 'category');
          foreach ($terms as $term) { 
            echo '  <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a itemprop="item" href="'.get_term_link($term).'"><span itemprop="name">'.esc_html($term->name).'</span></a><meta itemprop="position" content="3" /></li>'."\n";
          }
          //echo get_the_term_list(get_the_ID(), 'category', '  <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">', ', ', '</li>'."\n");
        }
?>
  <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem" class="last"><span itemprop="name"><?php the_title(); ?></span><meta itemprop="position" content="4" /></li>

<?php } elseif (is_page()) { ?>
  <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem" class="last"><span itemprop="name"><?php the_title(); ?></span><meta itemprop="position" content="2" /></li>

<?php } ?>
 </ul>
</div>
