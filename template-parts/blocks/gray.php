<?php 
	$min_title =  get_field('gray_block_min_title');
	$large_title = get_field('gray_block_large_title');
    
    $title_first_par =  get_field('gray_block_title_first_par');
	$description_first_par = get_field('gray_block_description_first_par');

    $title_sec_par =  get_field('gray_block_title_sec_par');
	$description_sec_par = get_field('gray_block_description_sec_par');
?>

<div class="gray_block">
    <div class="grid-container">
        <div class="row">
            <div class="grid-x grid-padding-x">

                <div class="large-4 cell">
                    <?php if (!empty($min_title)) : ?> <div class="min_title fade-3 fadeOut"><?php echo $min_title; ?></div> <?php endif; ?>
                    <?php if (!empty($large_title)) : ?> <div class="large_title fade-3 fadeOut"><?php echo $large_title; ?></div><?php endif; ?>
                </div>

                <div class="large-8 cell">
                    <?php if (!empty($title_first_par)) : ?> <div class="title_gray_block fade-3 fadeOut"><?php echo $title_first_par; ?></div> <?php endif; ?>
                    <?php if (!empty($description_first_par)) : ?> <div class="description_gray_block fade-3 fadeOut"><?php echo $description_first_par; ?></div><?php endif; ?>

                    <?php if (!empty($title_sec_par)) : ?> <div class="title_gray_block fade-3 fadeOut"><?php echo $title_sec_par; ?></div> <?php endif; ?>
                    <?php if (!empty($description_sec_par)) : ?> <div class="description_gray_block fade-3 fadeOut"><?php echo $description_sec_par; ?></div><?php endif; ?>
                </div>

            </div>
        </div>
    </div>
</div>