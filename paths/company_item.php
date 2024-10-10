<?php global $post; ?>
<div class="company_item">
    <div class="company_item__image">
        <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
            <?php the_thumb($post, 'full'); ?>
        </a>
    </div>
    <div class="company_item__contents">
        <h2>
            <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" class="company_item__name">
                <?php the_title(); ?>
            </a>
        </h2>

		
		<?php $specific_skill = get_field('specific_skill',$post->ID); ?>
		<?php if ($specific_skill): ?>
		<p class="company_item__specificskill">
			特定技能対応可
		</p>
		<?php endif; ?>
        <div class="company_item__lines">
            <?php
            $occupations = wp_get_post_terms($post->ID, 'occupation');
            foreach ($occupations as $k => $occupation):
                if ($occupation->parent != 0):
                    unset($occupations[$k]);
                endif;
            endforeach;
            ?>
            <?php if (!empty($occupations)): ?>
                <?php foreach ($occupations as $k => $term): ?>
                    <div class="company_item__line">
                        <div class="company_item__label">
                            <?php echo $term->name; ?>
                        </div>
                        <div class="company_item__value">
                            <?php
                            $sub_terms = get_terms(
                                array(
                                    'taxonomy' => 'occupation',
                                    'parent' => $term->term_id,
                                    'hide_empty' => false,
									'orderby' => 'date',
									'order' => 'DESC',
                                )
                            );
                            ?>
                            <?php foreach ($sub_terms as $k1 => $occupation): ?>
                                <?php echo $occupation->name; ?>
                                <?php echo $k1 != count($sub_terms) - 1 ? '/' : '' ?>
                            <?php endforeach; ?>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
		<?php $categories = wp_get_post_terms($post->ID, 'location'); ?>
		<?php 
		usort($categories, function($a, $b) {
			if ($a->parent == 0 && $b->parent != 0) {
				return -1;
			} elseif ($a->parent != 0 && $b->parent == 0) {
				return 1;
			} else {
				return 0;
			}
		});
		?>
        <?php if (!empty($categories)): ?>
            <div class="company_item__locations" style="margin-top:7.5px;">
                <?php foreach ($categories as $k => $cat): ?>
                    <a href="<?php echo get_term_link($cat); ?>" title="<?php echo $cat->name; ?>" class="company_location">
                        <?php echo $cat->name; ?>
                    </a>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
		
    </div>
</div>