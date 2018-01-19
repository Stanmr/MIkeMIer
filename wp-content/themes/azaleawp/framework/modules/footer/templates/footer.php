<?php azalea_eltdf_get_content_bottom_area(); ?>
</div> <!-- close div.content_inner -->
	</div>  <!-- close div.content -->
		<?php if($display_footer) { ?>
			<footer class="eltdf-page-footer">
				<?php
					if($display_footer_top) {
						azalea_eltdf_get_footer_top();
					}
					if($display_footer_bottom) {
						azalea_eltdf_get_footer_bottom();
					}
				?>
			</footer>
		<?php } else { ?>
			<?php wp_footer(); ?>
		<?php } ?>
	</div> <!-- close div.eltdf-wrapper-inner  -->
</div> <!-- close div.eltdf-wrapper -->
<?php wp_footer(); ?>
</body>
</html>