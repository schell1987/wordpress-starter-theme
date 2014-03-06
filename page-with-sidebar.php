<?php 
/*

Template Name: Page With Sidebar

*/
get_header(); the_post(); ?>
        
    <section class="content clearfix">
               
      <header>
        <h1><?php the_title(); ?></h1>
      </header>

				<?php 
					if ( has_post_thumbnail() ) {
					  the_post_thumbnail('thumbnail', array('class' => 'alignleft'));
					} 
				?>

      <?php the_content(); ?>
      
    </section>

<?php get_sidebar(); ?>
<?php get_footer(); ?>