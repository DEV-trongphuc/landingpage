<?php get_header(); ?>
<?php global $post; ?>
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
<div class="entry-content" itemprop="mainContentOfPage">
<div class="entry-attachment">
<?php if ( wp_attachment_is_image( $post->ID ) ) : $att_image = wp_get_attachment_image_src( $post->ID, 'full' ); ?>
<p class="attachment"><a href="<?php echo esc_url( wp_get_attachment_url( $post->ID ) ); ?>" title="<?php the_title_attribute(); ?>" rel="attachment"><img src="<?php echo esc_url( $att_image[0] ); ?>" width="<?php echo esc_attr( $att_image[1] ); ?>" height="<?php echo esc_attr( $att_image[2] ); ?>" class="attachment-full" alt="<?php echo esc_attr( $post->post_excerpt ); ?>" itemprop="image"></a></p>
<?php else : ?>
<a href="<?php echo esc_url( wp_get_attachment_url( $post->ID ) ); ?>" title="<?php echo esc_attr( get_the_title( $post->ID ), 1 ); ?>" rel="attachment"><?php echo esc_url( basename( $post->guid ) ); ?></a>
<?php endif; ?>
</div>
<div class="entry-caption"><?php if ( !empty( $post->post_excerpt ) ) { the_excerpt(); } ?></div>
<?php if ( has_post_thumbnail() ) { the_post_thumbnail( 'full', array( 'itemprop' => 'image' ) ); } ?>
</div>
</article>
<?php comments_template(); ?>
<?php endwhile; endif; ?>
<?php get_footer(); ?>