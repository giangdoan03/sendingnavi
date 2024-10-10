<section id="banner">
        <picture>
            <source media='(max-width: 767px)'
                srcset='<?php echo get_stylesheet_directory_uri(); ?>/module-t/images/mv-sp.jpg' />
            <source media='(min-width: 768px)'
                srcset='<?php echo get_stylesheet_directory_uri(); ?>/module-t/images/mv-1920.jpg' />
            <img class='sizes' src='<?php echo get_stylesheet_directory_uri(); ?>/module-t/images/mv-1920.jpg' alt='' />
        </picture>
        <div class="container">
            <?php get_template_part("paths/form"); ?>
        </div>
    </section>