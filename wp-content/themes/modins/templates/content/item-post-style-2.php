<?php 
   global $post;

   $thumbnail = (isset($thumbnail_size) && $thumbnail_size) ? $thumbnail_size : 'post-thumbnail';
   $excerpt_words = (isset($excerpt_words) && $excerpt_words) ? $excerpt_words : '0';

   $desc = modins_limit_words($excerpt_words, get_the_excerpt(), '');

   $meta_classes = 'post-two__meta';
   if(empty(get_the_date())){
      $meta_classes = 'post-two__meta schedule-date';
   }
   $content_classes = 'post-two__content';
   $content_classes .= has_post_thumbnail() ? ' has-thumbnail' : ' has-no-thumbnail';
?>

<article <?php post_class('post post-two__single'); ?>>
   <div class="post-two__content-wrap">
      <div class="<?php echo esc_attr($content_classes) ?>">
         <div class="<?php echo esc_attr($meta_classes) ?>">
            <?php modins_posted_on_width_avata(); ?>
         </div> 
         <h3 class="post-two__title">
            <a href="<?php echo esc_url( get_permalink() ) ?>" rel="bookmark"><?php the_title() ?></a>
         </h3>
         <?php if($desc){ ?>
            <div class="post-two__desc">
               <?php echo esc_html($desc) ?>
            </div>   
         <?php } ?>

         <a class="post-two__read-more" href="<?php echo esc_url( get_permalink() ) ?>">
            <?php echo esc_html__('Read more', 'modins'); ?><i class="las la-arrow-right"></i> 
         </a>
      </div>

      <?php if(has_post_thumbnail()){ ?>
         <div class="post-two__thumbnail">
            <a href="<?php echo esc_url( get_permalink() ) ?>">
               <?php the_post_thumbnail( $thumbnail, array( 'alt' => get_the_title() ) ); ?>
            </a>
            <?php if( get_the_date() ){ ?>
               <div class="post-two__date">
                  <span class="date"><?php echo esc_html( get_the_date('d')) ?></span>
                  <span class="month"><?php echo esc_html( get_the_date('M')) ?></span>
               </div>
            <?php } ?>
         </div>   
      <?php } ?>
   </div>      

</article>