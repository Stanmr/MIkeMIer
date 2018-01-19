<?php 
	$eltdf_proofing_gallery_download_link = get_post_meta(get_the_ID(), 'eltdf_proofing_gallery_download_link_meta', true);
	$skin = azalea_eltdf_get_meta_field_intersect('proofing_gallery_skin');
?>
<div class="eltdf-pgs-gallery-download-holder">
	<div class="eltdf-pgs-gallery-download-inner">
		<?php 
			if($eltdf_proofing_gallery_download_link !== ''){ ?>
				<div class="eltdf-pgs-download-button">
					<?php echo azalea_eltdf_get_button_html(array(
						'link' 		=> $eltdf_proofing_gallery_download_link,
						'text' 		=> esc_html__('Download', 'eltdf-core'),
						'target' 	=> '_blank',
						'type'		=> 'solid'
					)); ?>
				</div>				
			<?php } ?>
	</div>
</div>