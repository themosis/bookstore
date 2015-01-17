	<footer>
		<div class="wrapper">
			<div class="footer--copyright">
				<p>&copy; Copyright Bookstore <?php echo(date('Y')); ?></p>
			</div>
			<div class="footer--navigation">
				<?php 
                    wp_nav_menu(array(
                        'theme_location' => 'footer-nav',
                        'container'      => false
                    ));
                ?>
			</div>
		</div>
	</footer>
	<?php wp_footer(); ?>
    </body>
</html>