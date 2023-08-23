<?php 
	$title =  get_field('simple_text_title');
	$description = get_field('simple_text_title_description');
	// $hasSidebar = get_field('simple_text_title_show_sidebar');
?>

<div class="grid-container">
	<div class="row">
		<div class="grid-x grid-padding-x">
			<div class="large-2 cell"></div>
			<div class="simple-text-with-title large-7 cell">
				<?php if (!empty($title)) : ?> <div class="fade-3 fadeOut title"><?php echo $title; ?></div> <?php endif; ?>
				<?php if (!empty($description)) : ?> <div class="fade-3 fadeOut description"><?php echo $description; ?></div><?php endif; ?>
			</div>
			<div class="large-3 cell">
				<div class="services-sidebar"> 
					<?php if(get_field('simple_text_title_show_sidebar')) { ?>
						<div class="services-sidebar-title fade-3 fadeOut"><?php echo pll__('related_consulting_services', 'onisis'); ?></div>
						<?php $services = get_field('choose_service', get_the_ID()); ?>
						<ul class="fade-3 fadeOut">
							<?php foreach ($services as $service) { ?>
								<li><a href="<?php echo get_permalink($service->ID)?>"><?php echo $service->post_title;?></a></li>
							<?php } ?>
						</ul>
					<?php } ?>
				</div>
			</div>
		</div>
	</div>
</div>