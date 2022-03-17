
<div id="agende" data-toggle="collapse" data-target="#agendar">
        <svg xmlns="http://www.w3.org/2000/svg" width="24.327" height="19.233" viewBox="0 0 24.327 19.233">
            <g id="Icon_feather-mail" data-name="Icon feather-mail" transform="translate(-1.607 -5)">
                <path id="Caminho_129" data-name="Caminho 129" d="M5.154,6H22.387a2.16,2.16,0,0,1,2.154,2.154V21.079a2.16,2.16,0,0,1-2.154,2.154H5.154A2.16,2.16,0,0,1,3,21.079V8.154A2.16,2.16,0,0,1,5.154,6Z" transform="translate(0 0)" fill="none" stroke="#fff" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
                <path id="Caminho_130" data-name="Caminho 130" d="M24.541,9,13.771,16.539,3,9" transform="translate(0 -0.846)" fill="none" stroke="#fff" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
            </g>
        </svg>
    </div>
</main>
<div id="agendar" class="collapse py-4">
    <button type="button" class="close" data-toggle="collapse" data-target="#agendar">x</button>
    <h2 class="text-center mb-3 h4">Agende sua visita </h2>
    <?php echo do_shortcode('[contact-form-7 id="5" title="Formulário Principal" html_class="d-flex flex-wrap"]'); ?>
</div>
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