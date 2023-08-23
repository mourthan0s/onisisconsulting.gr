<?php 
	$rate_over =  get_field('rate_block_rate_over');
	$description_over = get_field('rate_block_description_over');

    $rate_of =  get_field('rate_block_rate_of');
	$description_of = get_field('rate_block_description_of');
?>

<div class="grid-container">
    <div class="row">
        <div class="grid-x grid-padding-x">
            <div class="large-2 cell"></div>
            <div class="rate_block large-7 cell">
                <div class="rate_over">
                    <?php if (!empty($rate_over)) : ?> <div class="title_rate_block"><?php echo $rate_over; ?>%</div> <?php endif; ?>
                    <?php if (!empty($description_over)) : ?> <div class="description_rate_block"><?php echo $description_over; ?></div><?php endif; ?>
                </div>
                <div class="rate_of">
                    <?php if (!empty($rate_of)) : ?> <div class="title_rate_block"><?php echo $rate_of; ?>x</div> <?php endif; ?>
                    <?php if (!empty($description_of)) : ?> <div class="description_rate_block"><?php echo $description_of; ?></div><?php endif; ?>
                </div>
            </div>
            <div class="large-3 cell"></div>
        </div>
    </div>
</div>