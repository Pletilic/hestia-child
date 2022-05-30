<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the "wrapper" div and all content after.
 *
 * @package Hestia
 * @since Hestia 1.0
 */
?>
<?php wp_footer(); ?>

	<footer>

		<div class="footer">

			<div class="footer__addr">		
				<h2 class="nav__title">KONTAKT</h2>
				
				<address>
					CVR: 123456789<br>
					KØBENHAVNERGADE 123<br>
					1234 KØBENHAVN<br>
					TLF: 12 34 56 78<br>
					EMAIL: SRENT@SRENT.DK
				</address>
			</div>
		
			<ul class="footer__nav">
				<li class="nav__item">
					<h2 class="nav__title">INFO</h2>

					<ul class="nav__ul">
						<li>
							<a href="#">FAQ</a>
						</li>

						<li>
							<a href="#">HANDELS- OG LEJEBETINGELSER</a>
						</li>

						<li>
							<a href="#">PRIVATLIVSPOLITIK</a>
						</li>

					</ul>
				
				</li>
				
				<li class="nav__item nav__item--extra">
				
					<h2 class="nav__title">SOCIALE MEDIER</h2>
					
					<ul class="nav__ul nav__ul--extra">
						<li>
							<a href="#">FACEBOOK</a>
						</li>
						
						<li>
							<a href="#">INSTAGRAM</a>
						</li>

				</li>
				
			</ul>

		</div>

		<div class="legal">
				<p>&copy; 2022 SR ENTERTAINMENT<br></p>
		</div>

	</footer>
	
	<style>

		.footer {
			display: flex;
			flex-flow: row wrap;
			padding: 30px 30px 20px 30px;
			background-color: #000000;
		}

		.footer > * {
			flex:  1 100%;
		}

		.nav__title {
			font-weight: 500;
			font-size: 20px;
		}

		.footer address {
			font-style: normal;
			font-family: Oswald;
			color: #F8F8FF;
		}

		.footer h2 {
			color: #F8F8FF;
		}

		.footer ul {
			list-style: none;
			padding-left: 0;
		}

		.footer li {
			line-height: 2em;
		}

		.footer a {
			text-decoration: none;
		}

		.footer__nav {
			display: flex;
			flex-flow: row wrap;
		}

		.footer__nav > * {
			flex: 1 50%;
			margin-right: 1.25em;
		}

		.nav__ul a {
			color: #999;
		}

		.nav__ul--extra {
			column-count: 1;
			column-gap: 1.25em;
		}

		.legal {
			text-align: center;
			background-color: #000000;
			color: #F8F8FF;
			font-family: Oswald;
		}

		@media screen and (min-width: 40.375em) {
			.footer__nav > * {
				flex: 1;
			}
		}
		
		.nav__item--extra {
			flex-grow: 2;
		}
		
		.footer__addr {
			flex: 1 0px;
		}
		
		.footer__nav {
			flex: 2 0px;
		}

	</style>

</body>
</html>
