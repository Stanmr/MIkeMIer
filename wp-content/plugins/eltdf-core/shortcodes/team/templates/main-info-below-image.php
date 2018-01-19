<?php
/**
 * Team info on hover shortcode template
 */
?>
<div class="eltdf-team main-info-below-image <?php echo esc_attr($skin) ?>">
	<div class="eltdf-team-inner">
		<?php if ($team_image !== '') { ?>
			<div class="eltdf-team-image">
                <?php echo wp_get_attachment_image($team_image,'full');?>
			</div>
		<?php } ?>

		<?php if ($team_name !== '' || $team_position !== '' || $team_description != "") { ?>
			<div class="eltdf-team-info">
				<?php if ($team_name !== '' || $team_position !== '') { ?>
					<div class="eltdf-team-title-holder <?php echo esc_attr($team_social_icon_type) ?>">
						<?php if ($team_name !== '') { ?>
							<<?php echo esc_attr($team_name_tag); ?> class="eltdf-team-name">
								<?php echo esc_attr($team_name); ?>
							</<?php echo esc_attr($team_name_tag); ?>>
						<?php } ?>
						<?php if ($team_position !== "") { ?>
							<div class="eltdf-team-position"><?php echo esc_attr($team_position) ?></div>
						<?php } ?>
					</div>
				<?php } ?>

				<?php if ($team_description != "") { ?>
					<div class='eltdf-team-text'>
						<div class='eltdf-team-text-inner'>
							<div class='eltdf-team-description'>
								<p><?php echo esc_attr($team_description) ?></p>
							</div>
						</div>
					</div>
				<?php }
			} ?>

		<div class="eltdf-team-social-holder-between">
			<div class="eltdf-team-social <?php echo esc_attr($team_social_icon_type) ?>">
				<div class="eltdf-team-social-inner">
					<div class="eltdf-team-social-wrapp">

						<?php foreach( $team_social_icons as $team_social_icon ) {
							print $team_social_icon;
						} ?>

					</div>
				</div>
			</div>
		</div>

		</div>
	</div>
</div>