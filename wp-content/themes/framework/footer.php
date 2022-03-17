
<footer id="footer" class="footer" style="--bg-footer: <?php echo get_field('bg_footer', 'option'); ?>">
	<div class="container">
			<div class="row justify-content-center">
				<div class="logos d-flex py-5">
					<div class="logo">
						<?php if(get_field('logo_footer', 'option')){ ?>
							<img class="lazy-load img-fluid" src="<?php echo get_field('logo_footer', 'option')['url']; ?>" alt="<?php bloginfo('name'); ?>" title="<?php bloginfo('name'); ?>">
						<?php } ?>
					</div>
				</div>
			</div>
		</div>
</footer>
<!-- #footer -->
<?php wp_footer(); ?>
</body>

</html>