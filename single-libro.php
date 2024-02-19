<?php get_header(); ?>

<section class="content content-libro">
    <div class="content-libro-img col6-12 col12-12-s">
        <?php
        // Check if a featured image exists
        if (has_post_thumbnail()) {
            the_post_thumbnail('large'); // You can specify the image size here
        }
        ?>
    </div>
    <div class="content-libro-info col6-12 col12-12-s">
        <h1><?php the_title(); ?></h1>
        <ul>
            <li><h2>Autor/es</h2></li>
            <li><?php echo get_field('autores'); ?></li>
            <li><?php echo get_field('ano'); ?></li>
            <li>Género</li> <!-- Assuming you want to display the genre in the future -->
        </ul>
    </div>
</section>

<?php get_footer(); ?>