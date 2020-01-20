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
								<a href="https://www.exitlag.com/pt/preco">Preço</a>
							</li>
							<li>
								<a href="https://www.exitlag.com/pt/login">Minha conta</a>
							</li>							
							<li>
								<a href="blog.html">Blog</a>
							</li>
							<li>
								<a href="https://www.exitlag.com/pt/download">Download</a>
							</li>
						</ul>
					</div>					
				</div>
				<div class="each-block-footer">
					<div>
						<h3>Conheça</h3>
						<ul>
							<li>
								<a href="https://www.exitlag.com/pt/como-funciona">Como Funciona</a>
							</li>
							<li>
								<a href="jogos.html">Jogos suportados</a>
							</li>
							<li>
								<a href="cadastro.html">Cadastro</a>
							</li>												
						</ul>
					</div>					
				</div>
				<div class="each-block-footer flex">
					<div class="block-content-footer01">
						<h3>Ajuda</h3>
						<ul>
							<li>
								<a href="https://www.exitlag.com/pt/suporte">Suporte</a>
							</li>
							<li>
								<a href="https://www.exitlag.com/pt/perguntas-frequentes">Perguntas Frequentes</a>
							</li>
							<li>
								<a href="https://www.exitlag.com/pt/como-usar">Tutorial</a>
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
				<p>© Copyright 2019 ExitLag. Todos os direitos reservados.</p>
				<div class="contein-lang-copy-right flex">
					<a href="politicas-privacidade.html">Política de Privacidade</a>
					<a href="termos-servico.html">Termos de Serviço</a>
					<select id="lang">
						<option value="Português">Português</option>
						<option value="English">English</option>
					</select>	
				</div>
			</div>
		</div>
	</footer>

<?php wp_footer(); ?>

</body>
</html>
