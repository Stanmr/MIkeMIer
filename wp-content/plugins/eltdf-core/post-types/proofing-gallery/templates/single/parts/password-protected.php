<div <?php azalea_eltdf_class_attribute($classes) ?> <?php azalea_eltdf_inline_style($style); ?>>
	<div class="eltdf-password-protected-holder-inner">
		<form action="<?php echo esc_url(site_url('wp-login.php?action=postpass', 'login_post')); ?>" method="post">
			<h2 class="eltdf-password-protected-title"><?php esc_html_e('Password Protected Page', 'eltdf-core') ?></h2>
			<h6 class="eltdf-password-protected-subtitle"><?php esc_html_e('To view it please enter your password below', 'eltdf-core') ?></h6>
			<div class="eltdf-password-protected-fields">
				<input name="post_password" id="<?php echo esc_attr($label); ?>" type="password" placeholder="<?php esc_html_e('Password', 'eltdf-core') ?>" size="20" maxlength="20" />
				<input type="submit" name="Submit" value="&#xe000;"/>
			</div>
		</form>
	</div>
</div>