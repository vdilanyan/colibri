<?php
while (have_rows("social_links", "option")):
	the_row();
	if (get_sub_field("link")): ?>
		<li>
			<a href="<?php the_sub_field("link"); ?>" target="_blank" class="transition fa-icon">
				<?php the_sub_field("icon"); ?>
			</a>
		</li><?php
	endif;
endwhile;