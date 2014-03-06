<?php get_header(); the_post(); ?>
        
  <section class="content">

    <article class="clearfix">
    
      <header>
        <h1><?php the_title(); ?></h1>
      </header>

      <time datetime="<?php the_time( 'Y-m-d' ); ?>" pubdate><?php the_time('F j, Y'); ?></time> By <?php the_author(); ?> in <?php the_category(','); ?>. <?php the_tags( 'Tagged: ', ' • ' ); ?>

      <?php 
        if ( has_post_thumbnail() ) {
          the_post_thumbnail('thumbnail', array('class' => 'alignleft'));
        } 
      ?>

      <?php the_content(); ?>
    
    </article>

    <hr />

    <div class="pagination">
      <p class="prevPost"><?php previous_post_link('&lt;&lt; %link'); ?></p>
      <p class="nextPost"><?php next_post_link('%link &gt;&gt;'); ?></p>
    </div>
    
  </section>

<?php get_sidebar(); ?>
<?php get_footer(); ?>