<?php
	$text_quote =  get_field('white_block_text_quote');
?>

<div class="white_block">
    <div class="grid-container">
        <div class="row">
            <div class="grid-x grid-padding-x">

                <div class="large-12 cell">
                    <?php if (!empty($text_quote)) : ?> <div class="text_quote fade-3 fadeOut"><?php echo $text_quote; ?></div> <?php endif; ?>
                </div>

            </div>
        </div>
    </div>
</div>