<?php
// Organism Footer
?>
<footer>
	<div class="o-h2">
		<h2><?= $site->FooterTitle() ?></h2>
	</div>
	<div class="columns">
		<div class="column">
			<h3><?= $site->FooterColumn1Title() ?></h3>
			<div class="griddy">
				<?php
					$socials = explode(', ', htmlspecialchars($site->FooterSocials()->value()));
					$pattern_square = '\[(.*?)\]';
					$pattern_round  = "\((.*?)\)";
					$pattern = "/".$pattern_square.$pattern_round."/";
					
					foreach($socials as $social) {	
						preg_match($pattern, $social, $matches);
						$words = $matches[1];
						$url   = $matches[2];
						?>
						<li>
							<a href="<?= $url ?>">
							<svg class="icon">
								<use xlink:href="#<?= strtolower($words) ?>"></use>
							</svg> <?= $words ?>
							</a>
						</li>
						<?php
					}
				?>
			</div>
		</div>
		<div class="column">
			<h3><?= $site->FooterColumn2Title() ?></h3>
			<p>
			<?php
				if($site->has('ContactEmail')):
			?>
			email: <a href="mailto:<?= $site->ContactEmail()->value() ?>"><?= $site->ContactEmail() ?></a><br>
			<?php
				endif; //contact email
				if($site->has('ContactPhone')):
			?>
			phone: <a href="tel:<?= $site->ContactPhone()->value() ?>"><?php
				if($site->ContactPhoneHumanFriendly()->exists()):
						echo($site->ContactPhoneHumanFriendly());
					else:
						echo($site->ContactPhone());
					endif;
						?></a><br>
			<?php
				endif;
			?>
			</p>
			<form>
				<p>Contact Form</p>
			</form>
		</div>
		<div class="column">
			<h3><?= $site->FooterColumn3Title() ?></h3>
			<?=
					kirbytext($site->NewsletterDescription());
			?>
			<form>
				<p>email input</p>
				<?=
						kirbytext($site->NewsletterDisclaimer());
				?>
				<p>
					Signup button
				</p>
			</form>
		</div>
	</div>
	<div class="legal">
		<p><a href="">Imprint,</a> <a href="">Privacy Policy.</a> &copy; (Copyright) 2021 Wenzel Massag, all rights reserved.</p>
	</div>
</footer>