<?php get_header(); ?>

<section class="content content-main">

            <div class="content-video col8-12 col12-12-m">
                <iframe width="560" height="315" src="https://www.youtube.com/embed/zqLEO5tIuYs?si=_0YwaoUizrYutZ17" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
            </div>

            <div class="content-txt col8-12 col10-12-m col12-12-s">
                <h1>Lorem ipsum dolor, sit amet consectetur adipisicing elit.</h1>
            </div>

        </section>

        <section class="content content-grid">

        <?php
$args = array(
    'post_type' => 'libro',
    'posts_per_page' => 8
);

$query = new WP_Query($args);

if ($query->have_posts()) :
    while ($query->have_posts()) : $query->the_post();
        ?>
        <div class="content-grid-item col3-12 col4-12-m col6-12-s">
            <a href="<?php the_permalink(); ?>">
                <div class="content-grid-item-img">
                    <?php if (has_post_thumbnail()) :
                        the_post_thumbnail('thumbnail'); 
                    else : ?>
                        <img src="<?php echo get_template_directory_uri() . '/img/default.jpg'; ?>" alt="Default Image">
                    <?php endif; ?>
                </div>
                <div class="content-grid-item-title">
                    <h2><?php the_title(); ?></h2> 
                </div>
            </a>
        </div>
    <?php
    endwhile;
    wp_reset_postdata(); // Reset post data query
else :
    ?>
    <p><?php _e('No hay libros disponibles.'); ?></p>
<?php endif; ?>


        </section>


<?php get_footer(); ?>