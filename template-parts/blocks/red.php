<?php 
	$min_title =  get_field('red_block_min_title');
	$large_title = get_field('red_block_large_title');
    $rate_first =  get_field('red_block_rate_first');
	$description_first = get_field('red_block_description_first');
    $rate_sec =  get_field('red_block_rate_sec');
	$description_sec = get_field('red_block_description_sec');
    $rate_third =  get_field('red_block_rate_third');
	$description_third = get_field('red_block_description_third');
?>

<div class="red_block">
    <div class="grid-container">
        <div class="row">
            <div class="grid-x grid-padding-x">
                <div class="large-8 medium-12 small-12 cell">
                    <?php if (!empty($min_title)) : ?> <div class="min_title fade-3 fadeOut"><?php echo $min_title; ?></div> <?php endif; ?>
                    <?php if (!empty($large_title)) : ?> <div class="large_title fade-3 fadeOut"><?php echo $large_title; ?></div><?php endif; ?>
                </div>
                <div class="large-4 cell"></div>
                <div class="with_padding large-4 medium-4 small-12 cell">
                    <?php if (!empty($rate_first)) : ?> <div class="rate_red_block fade-3 fadeOut"><?php echo $rate_first; ?>%</div> <?php endif; ?>
                    <?php if (!empty($description_first)) : ?> <div class="description_red_block fade-3 fadeOut"><?php echo $description_first; ?></div><?php endif; ?>
                </div>
                <div class="with_padding large-4 medium-4 small-12 cell">
                    <?php if (!empty($rate_sec)) : ?> <div class="rate_red_block fade-3 fadeOut"><?php echo $rate_sec; ?>%</div> <?php endif; ?>
                    <?php if (!empty($description_sec)) : ?> <div class="description_red_block fade-3 fadeOut"><?php echo $description_sec; ?></div><?php endif; ?>
                </div>
                <div class="large-4 medium-4 small-12 cell">
                    <?php if (!empty($rate_third)) : ?> <div class="rate_red_block fade-3 fadeOut"><?php echo $rate_third; ?>%</div> <?php endif; ?>
                    <?php if (!empty($description_third)) : ?> <div class="description_red_block fade-3 fadeOut"><?php echo $description_third; ?></div><?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>