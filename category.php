<?php 
  // Category Archive page for the default post type.
  get_header(); 
  global $query_string;
  query_posts( $query_string . '&showposts=-1' );
 ?>

	<section class="content">

		<header>
			<h1><?php single_cat_title(); ?></h1>
		</header>

		<?php while ( have_posts() ) : the_post(); ?>
		
      <article>
      
	      <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
        <p class="dateTime"><time datetime="<?php the_time( 'Y-m-d' ); ?>" pubdate><?php the_time('F j, Y'); ?></time> by <?php the_author(); ?> in <?php the_category(','); ?>. <?php the_tags( 'Tagged: ', ' • ' ); ?></p>
	      
	      <?php the_excerpt(); ?>
	      <p class="readMore"><a href="<?php the_permalink(); ?>">Read more &gt;&gt;</a></p>
      
      </article>

      <hr />

			<div class="pagination">
				<p class="prevPost"><?php previous_posts_link('&laquo; %link'); ?></p>
				<p class="nextPost"><?php next_posts_link('%link &raquo;'); ?></p>
			</div>

		<?php	endwhile; ?>

	</section>

<?php get_sidebar(); ?>
<?php get_footer(); ?>