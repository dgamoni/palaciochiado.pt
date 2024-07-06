<?php 
	$id = $post->ID;
	$class = '';
	
  if (!is_single($id)) {
    $class = 'footer--border';
  }
?>
<footer class="footer <?php echo $class; ?>">
	<div class="footer__content">

		<div class="footer__logo">
			<img src="<?php echo get_template_directory_uri() . '/dist/images/logos/palacio_logo_footer.png' ?>">
		</div>

		<div class="footer__info">
			<?php
				if(is_active_sidebar('footer-sidebar-1')){
					dynamic_sidebar('footer-sidebar-1');
				}
			?>

			<?php
				if(is_active_sidebar('footer-sidebar-2')){
					dynamic_sidebar('footer-sidebar-2');
				}
			?>
			<div style="display: none">
			<?php
				if(is_active_sidebar('footer-newsletter')){
					dynamic_sidebar('footer-newsletter');
				}
			?>
			</div>

			<?php
				if(is_active_sidebar('footer-terms')){
					dynamic_sidebar('footer-terms');
				}
			?>
		</div>

		<ul class="footer__social">
			<li><a href="https://www.instagram.com/palaciochiado/" target="blank" class="icon-instagram"></a></li>
			<li><a href="https://www.facebook.com/palaciochiado/" target="blank" class="icon-facebook"></a></li>
		</ul>

	</div>
</footer>
