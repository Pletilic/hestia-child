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

			<div class="column_1">	

				<h2 class="nav__title">KONTAKT</h2>
				
				<address>
					CVR: 123456789<br>
					KØBENHAVNERGADE 123<br>
					1234 KØBENHAVN<br>
					TLF: 12 34 56 78<br>
					EMAIL: SRENT@SRENT.DK
				</address>

			</div>
		
			<div class="column_2">

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

			</div>		
				
			<div class="column_3">
				
				<h2 class="nav__title">SOCIALE MEDIER</h2>
					
				<ul class="nav__ul nav__ul--extra">

					<li>
						<a href="#">FACEBOOK</a>
					</li>
						
					<li>
						<a href="#">INSTAGRAM</a>
					</li>

				</ul>

			</div>
		
		</div>

		<div class="legal">
					<p>&copy; 2022 SR ENTERTAINMENT<br></p>
		</div>

	</footer>
	
	<style>

		.footer {
			display: grid;
			grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
			gap: 5px;
			margin: 0 auto;
			padding-top: 50px;
			padding-left: 8vw;
			background-color: #000000;
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

		.footer > * {
			flex:  1 100%;
		}

		.footer a {
			text-decoration: none;
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

	</style>

</body>
</html>
