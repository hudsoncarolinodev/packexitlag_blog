<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package packexitlag_blog
 */

?>
<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
	<script src="<?php echo get_template_directory_uri(); ?>/js/scripts.js"></script>
	<script src="<?php echo get_template_directory_uri(); ?>/js/js-forms.js"></script>
	<footer class="footer">
		<div class="container">
			<div class="container-footer flex">
				<div class="each-block-footer flex">
					<div class="logo-footer">
						<img src="<?php echo get_template_directory_uri(); ?>/img/logo-rodape.png" alt="ExitLag">
					</div>
					<div>
						<h3>Exitlag</h3>
						<ul>							
							<li>
								<a href="https://www.exitlag.com/en/pricing">Pricing</a>
							</li>
							<li>
								<a href="https://www.exitlag.com/en/login">My Account</a>
							</li>							
							<li>
								<a href="https://www.exitlag.com/en/download">Download</a>
							</li>
						</ul>
					</div>					
				</div>
				<div class="each-block-footer">
					<div>
						<h3>About</h3>
						<ul>
							<li>
								<a href="https://www.exitlag.com/en/how-it-works">How it works</a>
							</li>
							<li>
								<a href="https://www.exitlag.com/en/games">Games</a>
							</li>
							<li>
								<a href="https://www.exitlag.com/en/free-trial">Free trial</a>
							</li>												
						</ul>
					</div>					
				</div>
				<div class="each-block-footer flex">
					<div class="block-content-footer01">
						<h3>Help</h3>
						<ul>
							<li>
								<a href="https://www.exitlag.com/en/support">Support</a>
							</li>
							<li>
								<a href="https://www.exitlag.com/en/faq">Faq</a>
							</li>
							<li>
								<a href="https://www.exitlag.com/en/step-by-step">Step-by-Step</a>
							</li>												
						</ul>
					</div>
					<div class="socials-footer">
						<a target="_blank" href="https://www.facebook.com/exitlag/">
							<i class="fab fa-facebook-f"></i>
						</a>
						<a target="_blank" href="https://twitter.com/exitlag">
							<i class="fab fa-twitter"></i>
						</a>
						<a target="_blank" href="https://www.youtube.com/channel/UC_zoJlBdjmrwHR5SziyGBfg">
							<i class="fab fa-youtube"></i>
						</a>
						<a target="_blank" href="https://discordapp.com/invite/5PTYhBm">
							<i class="fab fa-discord"></i>
						</a>						
					</div>			
				</div>		
			</div>
			<div class="copy-right flex">
				<p>© Copyright 2019 ExitLag. All rights reserved</p>
				<div class="contein-lang-copy-right flex">
					<a href="https://www.exitlag.com/en/privacy-policy">Privacy Policy</a>
					<a href="https://www.exitlag.com/en/terms-of-service">Terms Of Service</a>
					<select id="lang">
						<option value="English">English</option>
						<option value="Português">Português</option>
					</select>	
				</div>
			</div>
		</div>
	</footer>
<script>
$(document).ready(function(){
    $("#lang").change(function(){
        var linguagem = $(this).children("option:selected").val();
        if(linguagem == "English"){
        	window.location.href = "http://localhost/projetos/packexitlag_blog/en/";
        }else{
        	window.location.href = "http://localhost/projetos/packexitlag_blog/pt/";
        }
    });
});
</script>
<?php wp_footer(); ?>

</body>
</html>
